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
		<div class="col-md-9 col-md-offset-2">
		   <h3> Add a new category to the site </h3>
		   <hr>
		    <form class="form-horizontal" action="<?php echo url('/category/create'); ?>" method="post">
		        <div class="form-group">
		            <label for="link" class="control-label col-xs-3">New Name</label>
		            <div class="col-xs-7">
		                <input type="text" class="form-control"  name="name" placeholder="New category name">
		            </div>
		        </div>
              	<div class="form-group">
		            <div class="col-xs-offset-2 col-xs-10">
		                <button type="submit" class="btn btn-primary">Add</button>
		            </div>
		        </div>
   		    </form>
		</div>
	</div>
</div>
@endsection
