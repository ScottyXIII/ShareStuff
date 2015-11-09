
@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h1> Messages </h1>
			<hr >
			<div class="panel panel-default">
				<table class="table">
					<thead> 
						<tr> <th> </th> 
							<th> Message </th> 
							<th> Title </th> 
							<th> From </th>
							<th> Date </th>
							<th> Options </th>
						</tr> 
					</thead>
					<tbody> 
						<?php foreach($messages as $message): ?>
							<tr <?php if ($message->read == 0): ?> class="list-group-item-info" <?php endif; ?>>
								<td> 
							    	<input type="checkbox" name="messages[post_editor]">
								</td>
								<td> <p> 
									<?php echo $message->message; ?>
									<?php if ($message->read == 0): ?>
					   					<span class="label label-success">Unread</span>
					   				<?php endif; ?>
					   				</p>
					   			</td> 
					   			<td>
					     			<?php echo $message->title; ?>
								</td> 
								<td>
					     			<?php echo $message->user->name; ?>
								</td> 
								<td>
					     			<?php echo $message->created_at; ?>
								</td> 
								<td width="40%">
									<a href="<?php echo URL('message/read/'.$message->id); ?>"> <button class='btn btn-success btn-xs' type="button"><span class="glyphicon glyphicon-user"></span> Read </button></a> 
									<a href="<?php echo URL('message/reply/'.$message->id); ?>"> <button class='btn btn-info btn-xs' type="button"><span class="glyphicon glyphicon-user"></span> Reply </button></a>
		    						<a href="<?php echo URL('message/mark-read/'.$message->id);?>"><button class='btn btn-warning btn-xs btn-info' type="button" name="" value="rename"><span class="glyphicon glyphicon-envelope"></span> Mark as read </button></a>
		   	  						<button class='btn btn-danger btn-xs' type="submit" name="delete-message" data-id="<?php echo $message->id; ?>" data-name="<?php ?>"><span class="glyphicon glyphicon-trash"></span> Delete </button>
								</td>
							</tr>
						<?php endforeach; ?>
				
					</tbody>
				
				</table>	
				<div class="panel-footer">
					<p> 
						<i>With selected:</i> 
						<a href="<?php echo URL('message/mark-read/'.$message->id);?>">  Mark as read</a> | 
						<a href="<?php echo URL('message/mark-read/'.$message->id);?>"> Delete </a> 
					</p>
				</div> 
			</div>
		</div>
	</div>
</div>


<div id="confirm" class="modal fade">
  <form id="delete-message-form" class="form-horizontal container" role="form" method="POST" action="<?php echo url('/message/delete'); ?>" >
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

	    var url = $('#delete-message-form').attr('action');
	    $('#delete-message-form').attr('action', url+'/'+message_id); 

	    $('#confirm').modal({ keyboard: false })
	        .one('click', '#delete', function (e) {
	          
	    });

	});

</script>

@endsection
