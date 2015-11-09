@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-3">
      @include("admin-nav")
    </div>
    <div class="col-md-8">

     <h1>View a User</h1>
     <br />
      <p>Name: <?php echo $name; ?></p>
      <p>Email: <?php echo $email; ?></p>
      <p>Date Joined: <?php echo $date_joined; ?></p>
      
      @endsection
    </div>
  </div>
</div>


			