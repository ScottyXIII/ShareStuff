@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-3">
      @include("admin-nav")
    </div>
    <div class="col-md-9">

      <h1>Admin Messages</h1>
      <hr >
      			<p> This is where the admin can viewsany messages sent to them by the sites user's</p>
         
      <h1> Messages </h1>
      <a href="<?php //echo URL('admin/users/edit/'.$user->id); ?>"> <button class='btn btn-info btn-xs' type="button" name="" value="edit"><span class="fa fa-times"><span class="glyphicon glyphicon-envelope"></span> Message all users </button></a>
      <hr >
      <div class="panel panel-default">
        <table class="table">
          <thead> 
            <tr> 
              <th> </th> 
              <th> Message </th> 
              <th> Subject </th> 
              <th> From </th>
              <th> Date </th>
              <th> Options </th>
            </tr> 
          </thead>
          <tbody> 
            <?php foreach($messages as $message): ?>
              <tr>
                <td> 
                    <input type="checkbox" name="user_priv[post_editor]">
                </td>
                <td>
                  <p> 
                    <?php echo $message->message; ?>    
                  </p>
                </td> 
                <td>
                  <p><?php echo $message->title; ?></p>   
                </td> 
                <td>
                   <p><?php echo $message->user->name; ?></p>
                </td> 
                <td>
                   <p><?php echo $message->created_at; ?></p>
                </td> 
                <td>
                  <a href="<?php echo URL('admin/messages/read/'.$message->id); ?>"> <button class='btn btn-success btn-xs' type="button"><span class="glyphicon glyphicon-user"></span> Read </button></a> 
                  <a href="<?php echo URL('admin/messages/reply/'.$message->id); ?>"> <button class='btn btn-primary btn-xs' type="button"><span class="glyphicon glyphicon-user"></span> Reply </button></a>
                  <a href="<?php //echo URL('admin/users/password/'.$user->id);?>"><button class='btn btn-success btn-xs btn-info' type="button" name="" value="rename"><span class="glyphicon glyphicon-envelope"></span> Mark as read </button></a>
                  <a href="<?php //echo URL('admin/users/delete/'.$user->id); ?>" ><button class='btn btn-danger btn-xs' type="submit" name="delete-message" data-id="<?php echo $message->id; ?>" data-name="<?php ?>"><span class="glyphicon glyphicon-trash"></span> Delete </button></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        
        </table>  
        <div class="panel-footer">
          <p> 
            <i>With selected:</i> 
            <a href="">  Mark as read</a> | 
            <a href=""> Delete </a> 
          </p>
        </div> 
      </div>



<div id="confirm" class="modal fade">
  <form id="delete-post-form" class="form-horizontal container" role="form" method="POST" action="<?php echo url('admin/messages/delete'); ?>" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Are you sure?</h4>
        </div>
        <div class="modal-body">
          <br >
          <p id="confirm-delete-message">Are you sure you want to delete this message? </p>
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

$('button[name="delete-message"]').on('click', function(e){
 
    e.preventDefault();
    var message_id = $(this).data('id');

    $('#confirm').removeClass('hide');

    var url = $('#delete-post-form').attr('action');
    $('#delete-post-form').attr('action', url+'/'+message_id); 

    $('#confirm').modal({ keyboard: false })
        .one('click', '#delete', function (e) {
          
    });

});
</script>      

@endsection
    </div>
  </div>
</div>
