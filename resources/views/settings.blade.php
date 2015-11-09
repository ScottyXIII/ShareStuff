@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/settings/update') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="<?php echo $this_user->name; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="<?php echo $this_user->email; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">New Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm New Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>	
						</div>
						
						<div class="form-group">
							<div class="dropdown col-md-8">
							<label class="col-md-6 control-label">Theme</label>
							    <select name="theme" class="selectpicker">
									<option><?php echo $this_user->Theme()->theme_name; ?></option>
									<?php foreach(\App\Themes::all() as $theme): ?>
										<?php if ($theme->theme_name != $this_user->Theme()->theme_name): ?>
											<option> <?php echo $theme->theme_name; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>		
								</select>
							</div>
						</div>				

						<br /> 
 
 
						<div class="form-group">
							<div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Update Settings</button>
							</div>
						</div>
					</form>
		</div>
		<div class="col-md-3">
			@include('includes/user-side-bar')
		</div>
	</div>
</div>
@endsection
