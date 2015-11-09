@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-3">
      @include("admin-nav")
    </div>
    <div class="col-md-8">

      <h1>Send a message to <?php echo $user->name; ?> </h1>
      <hr >

      <form class="form-horizontal" action="<?php echo URL()."/admin/messages/reply"; ?>" method="post">
        <input type="hidden" name="user_id" value="<?php// echo $message->user->id; ?>" >
        <div class="form-group">
            <label for="title" class="control-label col-xs-2">Subject</label>
            <div class="col-xs-10">
                <input type="text" class="form-control" name="title" id="title" value="<?php ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="info" class="control-label col-xs-2">Message</label>
            <div class="col-xs-10">
                <textarea class="form-control" rows="6" cols="50" name="message" id="link" placeholder=""></textarea>
            </div>
        </div>

        <div class="form-group">
          <div class="col-xs-offset-2 col-xs-10">
              <button type="submit" class="btn btn-primary">Send Message</button>
          </div>
        </div>
       
      
      </form>
    </div>
      @endsection
    </div>
  </div>
</div>
      		