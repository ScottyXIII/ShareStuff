
@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3">
      		@include("admin-nav")
		</div>
	    <div class="col-md-8">
			<div class="panel panel-default">
			<div class="panel-heading"> <?php echo $message->created_at; ?>	</div>
				<div class="panel-body">
				 	<h3> <?php  echo $message->title; ?></h3>
			 		
			 		<P><?php  echo $message->message; ?></P>
			 		<hr >
				 	<P> From: <a href='<?php ?>'><?php  echo $message->user->name; ?></a></P>
				  	<a href="<?php echo URL('admin/messages/reply/'.$message->id); ?>"> <button class='btn btn-success btn-xs' type="button"><span class="glyphicon glyphicon-pencil"></span> Reply </button></a>
				 	<a href="<?php //echo URL('admin/users/edit/'.$user->id); ?>"> <button class='btn btn-danger btn-xs' name="delete-message" data-id="<?php echo $message->id; ?>" type="button"><span class="glyphicon glyphicon-trash"></span> Delete </button></a>
				</div>
			</div>
		</div>
	</div>
</div>



<div id="confirm" class="modal fade">
  <form id="delete-post-form" class="form-horizontal container" role="form" method="POST" action="<?php echo url('admin/messages/delete'); ?>" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Delete Message</h4>
        </div>
        <div class="modal-body"> 
          <br >
          <p id="confirm-delete-message"> Are you sure you want to delete this message? </p>
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
