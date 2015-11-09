@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-3">
			@include("admin-nav")
		</div>
		<div class="col-md-8">

<h1>Website Settings</h1>
<hr >

	<form  enctype="multipart/form-data" class="form-horizontal container" role="form" method="POST" action="{{ url('/admin/settings/update') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
 
  		 <div class="checkbox">
		    <label>
		      <input type="checkbox" name="user_priv[add_cat]" <?php echo \App\Functions::isChecked($add_categories);?> > Allow users to add categories. 
		    </label>
  		</div>

		 <div class="checkbox">
		    <label>
		      <input type="checkbox" name="user_priv[search_user]"<?php echo \App\Functions::isChecked($search_users);?> > Allow users to search for other users. 
		    </label>
  		</div>

  		<div class="checkbox">
		    <label>
		      <input type="checkbox" name="user_priv[post_editor]"<?php echo \App\Functions::isChecked($post_editor);?> > Allow users to use the WYSIWYG editor when making a new post. 
		    </label>
  		</div>


  		 <div class="checkbox">
		    <label>
		      <input type="checkbox" name="user_priv[change_theme]"<?php echo \App\Functions::isChecked($change_theme);?> > Allow users to change their css theme. 
		    </label>
  		</div>

		<hr /> 

		<div class="form-group ">
			<div class="dropdown">
				<label class="control-label">Website Default Css Theme</label>
		        <select class="selectpicker" name="default_theme">
				    <option value="<?php echo $default_theme->id; ?>"><?php echo $default_theme->theme_name; ?> </option>
				    <?php foreach($themes as $theme): ?>
				    	<?php if ($theme->theme_name != $default_theme->theme_name): ?>
				    	<option value="<?php echo $theme->id; ?>"><?php echo $theme->theme_name; ?></option>
						<?php endif; ?>
					<?php endforeach; ?>
			    </select>
 
			</div>	
		</div>

		<br /> 

	  	<div class="form-group">
	    <label> Logo Text</label> 
	    <br />
	    <div class="col-sm-6">
  	    	<input type="input" class="form-control" id="logo-text" name="logo-text" value="<?php echo $site_theme->logo_text; ?>">
	    </div>
	  	</div>

	  	<br /> 

		<div class="form-group">
			 <label class="">Upload New logo</label>
			<input type="file" id="logo-upload" name="logo">
      		<p class="help-block">.png or .jpg</p>
		</div> 

		<br /> 
		<div class="form-group">
			<button type="submit" class="btn btn">Update Settings</button>
		</div>
	</form>

			</div>
	</div>
</div>
@endsection
