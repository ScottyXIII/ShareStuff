@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-3">
      @include("admin-nav")
    </div>
    <div class="col-md-9">
      
      <h1>Edit User</h1>

      <div class="">
        <div class="row">
          <div class="col-md-9 col-md-offset-1">
                <form class="form-horizontal" role="form" method="POST" action="<?php echo url('/admin/users/update/'.$user->id); ?>">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label class="control-label">Name</label>
                    <div class="">
                      <input type="text" class="form-control" name="name" value="<?php echo $user->name; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">E-Mail Address</label>
                    <div class="">
                      <input type="email" class="form-control" name="email" value="<?php echo $user->email; ?>">
                    </div>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="super_user" <?php if($user->super_user == 1) echo 'checked'; ?> > Allow user backend admin privileges. 
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="ban_post" value="<?php echo $ban_post_id;?>" <?php echo \App\Functions::isChecked($user->postBan()); ?> > Ban user from making any more posts 
                    </label>
                  </div>
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="ban_cat" value="<?php echo $ban_cat_id; ?>"<?php echo \App\Functions::isChecked($user->categoriesBan()); ?>> Ban user from adding new categories. (If users are allowed to add categories set via admin)
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="ban_message" value="<?php echo $ban_message_id; ?>" <?php echo \App\Functions::isChecked($user->messageBan()); ?>> Ban user from sending messages to other users.
                    </label>
                  </div>

                  <br /> 
       
                  <div class="form-group">
                    <div class="">
                      <button type="submit" class="btn btn-primary">Update Settings</button>
                    </div>
                  </div>
                </form>
                <br /> 
          </div>
        </div> 
        <h1> <?php echo ucfirst($user->name); ?>'s Posts </h1>
        <p> Number of posts: <?php echo $user->numberOfPosts($user->id); ?> </p> 
        <p> Note when editing or deleting a users post a reason must be given and the user will be contacted. </p> 
        <hr/>

        <div class="panel panel-default">
        <table class="table">
         <thead> 
          <tr> 
           <th> Title </th> 
           <th> Info </th>
           <th> Post </th>
           <th> Type </th> 
           <th> Link </th>
           <th> Date Posted </th>
           <th> Options </th>
          </tr> 
         </thead>
            <tbody> 
            <?php foreach($posts as $post): ?></p>
              <tr>
                <td>
                 <p><?php echo $post->title; ?></p>  
                </td> 
                <td>
                 <p><?php echo $post->info; ?></p> 
                </td>
                <td>
                 <p><?php echo $post->post; ?></p> 
                </td>
                <td>
                 <p><?php echo $post->type()->first()->name; ?></p> 
                </td> 
                <td>
                 <p><?php echo $post->link; ?></p> 
                </td>  
                <td>
                 <p><?php echo $post->created_at; ?></p> 
                </td> 
                <td>
                  <a href="<?php echo url('/admin/posts/edit/'.$post->id); ?>"> <button class='btn btn-success btn-xs' type="submit" name="" value="Edit"><span class="fa fa-times"><span class="glyphicon glyphicon-edit"></span>Edit Post</button></a>
                </td>
                  <td>
                  <a href="<?php echo url(); ?>"> <button class='btn btn-danger btn-xs' type="submit" name="delete-post" data-id="<?php echo $post->id; ?>" data-name="<?php echo $post->title; ?>" ><span class="fa fa-times"><span class="glyphicon glyphicon-edit"></span>Delete Post</button></a>
                </td>
              </tr> 
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
 



<div id="confirm" class="modal fade">
  <form id="delete-post-form" class="form-horizontal container" role="form" method="POST" action="<?php echo url(); ?>" >
    <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Delete <?php echo $user->name; ?>'s Post </h4>
        </div>
        <div class="modal-body"> 
          <label class="control-label">A reason must be given why you are deleting <?php echo $user->name; ?>'s post as a message will be sent. </label>
          <div class="dropdown">
              <select class="selectpicker" name="reason">
                <?php foreach ($delete_post_reasons as $reason): ?>
                <option name="reason" value="<?php echo $reason ?>"> <?php echo $reason ?> </option>
                <?php endforeach; ?>
            </select>
          </div>
          <br>
          <label>Other Reason</label> 
          <div class="">
            <input type="input" name="other_reason" class="form-control" id="other-reason" value="">
          </div> 
          <br >
          <p id="confirm-delete-message"> </p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Yes</button> 
          <button id="delete-no" type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </form>
</div><!-- /.modal -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.js"></script>


<script> 

$('button[name="delete-post"]').on('click', function(e){
 
    e.preventDefault();
    var id = $(this).data('id');
    var name = $(this).data('name');

    $('#confirm-delete-message').html('Are you sure you want to delete ');
    $('#confirm-delete-message').append('<b>'+name+'</b>');

    $('#confirm').removeClass('hide');

    var url = $('#delete-post-form').attr('action');
    $('#delete-post-form').attr('action', url+'/admin/posts/delete/'+id); 

    $('#confirm').modal({ keyboard: false })
        .one('click', '#delete', function (e) {
          
    });

});
</script>

      @endsection
    </div>
  </div>
</div>


			