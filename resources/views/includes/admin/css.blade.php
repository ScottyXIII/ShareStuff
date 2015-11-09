@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-3">
      @include("admin-nav")
    </div>
    <div class="col-md-8">

<h1>Manage Themes</h1>
<hr >
<p> This is where the admin can Edit and upload css files to use as themes</p>

<br /> 

<form enctype="multipart/form-data" class="form-horizontal container" role="form" method="POST" action="{{ url('/admin/theme/add') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <div class="col-sm-3">
      <label class="">NewTheme Name</label>
      <br />
      <input type="input" name="themeName" class="form-control" size="10" id="" value="">
      <br />
      <input type="file" id="themeFile" name="theme">
      <p class="help-block">themes are .css files</p>
      <button type="submit" class="btn btn">Upload New Theme</button>
    </div>
  </div>
</form>

<br />
<div class="panel panel-default">
<table class="table">
   <thead> 
   	<tr> 
   	 <th> Theme </th> 
   	 <th> Rename/Delete</th> 
   	</tr> 
   </thead>
   <tbody> 
   	<?php foreach($themes as $theme): ?>
      <tr>
     	 <td><?php echo $theme->theme_name; ?></td> 
     	 <td>
     	  <a href="<?php echo URL('/admin/theme/view').'/'.$theme->id; ?>"> <button class='btn btn-success btn-xs' type="submit" name="" value="rename"><span class="fa fa-times"><span class="glyphicon glyphicon-edit"></span>rename</button></a>
        <button class='btn btn-danger btn-xs' type="submit" name="delete-theme" value="delete" data-id="<?php echo $theme->id; ?>" data-name="<?php echo $theme->theme_name; ?>"><span class="fa fa-times"><span class="glyphicon glyphicon-trash"></span>delete</button>
     	 </td> 
      </tr> 
    <?php endforeach; ?>
   </tbody>

</table>
</div>


<br /> 
 


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

$('button[name="delete-theme"]').on('click', function(e){

    e.preventDefault();
    var id = $(this).data('id');
    var name = $(this).data('name');

    $('#confirm-delete-message').html('Are you sure you want to delete ');
    $('#confirm-delete-message').append('<b>'+name+'</b>');

    $('#confirm').removeClass('hide');

    var url = $('#delete').attr('href');
    $('#delete').attr('href', url+'/admin/theme/delete/'+id); 

    $('#confirm').modal({ keyboard: false })
        .one('click', '#delete', function (e) {
          
    });

});



</script>


 
@endsection
    </div>
  </div>
</div>