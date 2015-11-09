@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <?php if ($message != null): ?>
      <h1>Reply</h1>
      <hr >
        
      <div class="panel panel-default">
      <div class="panel-heading"> <?php echo $message->created_at; ?> </div>
        <div class="panel-body">
          <h3> <?php  echo $message->title; ?></h3>
          
          <P><?php  echo $message->message; ?></P>
          <hr >
          <P> From: <a href='<?php ?>'><?php echo $message->user->name; ?></a></P>
        </div>
      </div>

      <hr />
    <?php endif; ?>
      <form class="form-horizontal" action="<?php echo URL()."/message/send"; ?>" method="post">
         <?php if ($message != null): ?>
         <input type="hidden" name="user_id" value="<?php echo $message->user->id; ?>" >
         <?php else: ?>
          <input type="hidden" name="user_id" value="<?php echo $to; ?>" >
          <?php endif; ?>
         <input type="hidden" name="sender_id" value="<?php echo \Auth::user()->first()->id; ?>" >
        <div class="form-group">
            <label for="title" class="control-label col-xs-2">Subject</label>
            <div class="col-xs-10">
                <input type="text" class="form-control" name="title" id="title" value="<?php if ($message != null) echo $message->title; ?>">
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
      @endsection
    </div>
  </div>
</div>
      		