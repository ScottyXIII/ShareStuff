<style>
	
	.checkbox {
		padding: 10px;
		margin-left: 10px;
		display: inline-block;
		float:left;
		width: 100px;
	}

</style>

@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-5 col-md-offset-3">
		    <form class="form-horizontal" action="<?php echo URL()."/new-post/create"; ?>" method="post">
		        <div class="form-group">
		            <label for="title" class="control-label col-xs-2">Title</label>
		            <div class="col-xs-10">
		                <input type="text" class="form-control" name="post[title]" id="title" placeholder="title">
		            </div>
		        </div>
		        <div class="form-group">
		            <label for="link" class="control-label col-xs-2">Link</label>
		            <div class="col-xs-10">
		                <input type="text" class="form-control"  name="post[link]" id="link" placeholder="link">
		            </div>
		        </div>
		        <div class="form-group">
		              <label for="info" class="control-label col-xs-2">Info</label>
		            <div class="col-xs-10">
		                <textarea class="form-control" rows="6" cols="50" name="post[info]" id="link" placeholder="Post Info"></textarea>
		            </div>
		        </div>
	            <div class="form-group">
		            <label for="info" class="control-label col-xs-2">Categories</label>
		            <div class="col-xs-10">
		                <?php foreach($categories as $categorie): ?>
		                	 <span class="checkbox"><input type="checkbox" name="categories[]" value="<?php echo($categorie->id); ?>"><?php echo($categorie->name); ?></span>
 						<?php endforeach; ?>
		            </div>
		        </div>
            	<div class="form-group">
		            <div class="col-xs-offset-2 col-xs-10">
		                <input name="image" type="file" />
		            </div>
		        </div>
              	<div class="form-group">
		            <div class="col-xs-offset-2 col-xs-10">
		                <button type="submit" class="btn btn-primary">Post</button>
		            </div>
		        </div>
		       
   		    
   		    </form>

		
		</div>
	</div>
</div>
@endsection
