@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-3">
      @include('admin-nav')
    </div>
   
  <h1>Edit <?php echo $post->user()->name; ?>'s Posts</h1>
  <hr >
  <p>This is where the admin can Edit posts</p>

  <br /> 

  <form class="form-horizontal col-md-8" role="form" method="POST" action="<?php echo url('admin/posts/update/'.$post->id); ?>">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
      <div class="form-group">
          <label for="title" class="control-label col-xs-2">Title</label>
          <div class="col-xs-10">
              <input type="text" class="form-control" name="post[title]" id="title" placeholder="title" value="<?php echo $post->title; ?>">
          </div>
      </div>
      <div class="form-group">
          <label for="link" class="control-label col-xs-2">Link</label>
          <div class="col-xs-10">
              <input type="text" class="form-control"  name="post[link]" id="link" placeholder="link" value="<?php echo $post->link; ?>">
          </div>
      </div>
      <div class="form-group">
            <label for="info" class="control-label col-xs-2">Info</label>
          <div class="col-xs-10">
              <textarea class="form-control" rows="6" cols="50" name="post[info]" id="link" placeholder="Post Info" value="<?php echo $post->info; ?>"><?php echo $post->info; ?></textarea>
          </div>
      </div>
      <div class="form-group">
        <label for="info" class="control-label col-xs-2">Post</label>
      <div class="col-xs-10">
          <textarea class="form-control" rows="6" cols="50" name="post[post]" id="link" placeholder="" value="<?php echo $post->post; ?>"><?php echo $post->post; ?></textarea>
      </div>
      </div>
        <div class="form-group">
          <label for="info" class="control-label col-xs-2">Categories</label>
          <div class="col-xs-10">
              <?php foreach($post->categories as $categorie): ?>
                 <span class="checkbox"><input type="checkbox" name="categories[]" value="<?php echo($categorie->id); ?>"><?php echo($categorie->name); ?></span>
             <?php endforeach; ?>
          </div>
      </div>
      
      <div class="form-group"> 
          <label class="control-label">A reason must be given why you are editing <?php echo $post->user()->name; ?>'s post as a message will be sent. </label>
        <div class="col-xs-10">
          <div class="dropdown">
              <select class="selectpicker" name="reason">
                <?php foreach ($edit_post_reasons as $reason): ?>
                <option name="reason" value="<?php echo $reason ?>"> <?php echo $reason ?> </option>
                <?php endforeach; ?>
            </select>
          </div>
          <br>
          <label>Other Reason</label> 
          <div class="col-xs-10">
            <input type="input" name="other_reason" class="form-control" id="other-reason" value="">
          </div>
        </div> 
        </div>

      <button type="submit" class="btn btn">Update Settings</button>
  </form>
  </div>
</div>
@endsection



			