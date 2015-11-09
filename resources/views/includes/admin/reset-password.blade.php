@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-3">
      @include("admin-nav")
    </div>
    <div class="col-md-8">

      <h1>Reset <?php echo $name; ?>'s password</h1>
      
      <form class="form-horizontal" role="form" method="POST" action="<?php echo url('/admin/users/password/'.$id); ?>"> 
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
              <div class="col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Change Password</button>
              </div>
            </div>
      </form>

      @endsection
    </div>
  </div>
</div>


			