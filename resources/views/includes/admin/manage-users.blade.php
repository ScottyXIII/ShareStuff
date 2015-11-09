@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-3">
      @include("admin-nav")
    </div>
    <div class="col-md-8">

      <h1>Manage Users</h1>
      <hr >
			
      <p> This is where the admin can views/edit delete users</p>
      
      <div class="panel panel-default">
        <table class="table">
           <thead> 
           	<tr> 
           	 <th> User </th> 
           	 <th> Rename/Delete</th> 
           	</tr> 
           </thead>
           <tbody> 
           	<?php foreach($users as $user): ?>
              <tr>
              	<td> 
                    <a href="<?php echo URL('admin/users/view/2'); ?>"><?php echo $user->name; ?></a>
                 </td> 
                 <td>
                    <a href="<?php echo URL('admin/users/edit/'.$user->id); ?>"> <button class='btn btn-success btn-xs' type="button" name="" value="edit"><span class="fa fa-times"><span class="glyphicon glyphicon-user"></span> Edit User</button></a>
                    <a href="<?php echo URL('admin/messages/user/'.$user->id);?>"><button class='btn btn-success btn-xs btn-info' type="button" name="" value="rename"><span class="fa fa-times"><span class="glyphicon glyphicon-envelope"></span> Message User</button></a>
                    <a href="<?php echo URL('admin/users/password/'.$user->id);?>"><button class='btn btn-success btn-xs btn-warning' type="button" name="" value="rename"><span class="fa fa-times"><span class="glyphicon glyphicon-lock"></span> Change Password</button></a>
                 	  <a href="<?php echo URL('admin/users/delete/'.$user->id); ?>" ><button class='btn btn-danger btn-xs' type="submit" name="delete-user" data-id="<?php echo $user->id; ?>" data-name="<?php echo $user->name; ?>"> <span class="fa fa-times"><span class="glyphicon glyphicon-trash"></span> Delete</button></a>
              	</td> 
           	</tr> 
             <?php endforeach; ?>
           </tbody>
        </table>
      </div>




<div id="confirm" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete Theme </h4>
      </div>
      <div class="modal-body">
        <p id="confirm-delete-message"> Are you sure you want to delete </p>
      </div>
      <div class="modal-footer">
        <a id="delete" href="<?php echo url(); ?>"> <button type="button" class="btn btn-primary">Yes</button></a>
        <button id="delete-no" type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.js"></script>


<script> 

$('button[name="delete-user"]').on('click', function(e){

    e.preventDefault();
    var id = $(this).data('id');
    var name = $(this).data('name');

    $('#confirm-delete-message').html('Are you sure you want to delete ');
    $('#confirm-delete-message').append('<b>'+name+'</b>');

    $('#confirm').removeClass('hide');

    var url = $('#delete').attr('href');
    $('#delete').attr('href', url+'/admin/users/delete/'+id); 

    $('#confirm').modal({ keyboard: false })
        .one('click', '#delete', function (e) {
          
    });

});



</script>
      @endsection
      </div>
  </div>
</div>