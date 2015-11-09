@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-3">
      @include('admin-nav')
    </div>
   
  <h1>Manage Themes</h1>
  <hr >
  <p>This is where the admin can Edit and upload css files to use as themes</p>

  <br /> 

  <form class="form-horizontal col-md-8" role="form" method="POST" action="<?php echo url('/admin/theme/update/'.$theme->id); ?>">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <label class="col-sm-2">Theme Name</label>
        <div class="col-sm-3">
          <input type="input" name="themeName" class="form-control" id="themeName" value="<?php echo $theme->theme_name; ?>">
        </div>
      </div>
      <button type="submit" class="btn btn">Update Settings</button>
  </form>
  </div>
</div>
@endsection



			