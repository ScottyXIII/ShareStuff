@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-3">
      @include("admin-nav")
    </div>
    <div class="col-md-9">

      <h1>Manage Posts</h1>
      <hr >
			<p> This is where the admin can views/edit delete posts</p>

      <div class="panel panel-default">
       <table class="table">
         <thead> 
          <tr> 
           <th> Title </th> 
           <th> Info </th>
           <th> User </th>
           <th> Type </th> 
           <th> Link </th>
           <th> Date Posted </th>
           <th> Edit </th>
           <th> Delete </th>
          </tr> 
         </thead>
          <tbody> 
          <?php foreach($posts as $post): ?></p>
            <tr>
              <td>
               <p><?php echo $post->title; ?></p>  
              </td> 
              <td>
               <p><?php echo $post->info; ?></p> 
              </td>
              <td>
               <p><a href="<?php echo url('admin/users/edit/'.$post->user()->id); ?>"><?php echo $post->user()->name; ?></a></p> 
              </td>
              <td>
               <p><?php echo $post->type()->first()->name; ?></p> 
              </td> 
              <td>
               <p><?php echo $post->link; ?></p> 
              </td>  
              <td>
               <p><?php echo $post->created_at; ?></p> 
              </td> 
              <td>
                <a href="<?php echo url('/admin/posts/edit/'.$post->id); ?>"> <button class='btn btn-success btn-xs' type="submit" name="" value="Edit"><span class="fa fa-times"><span class="glyphicon glyphicon-edit"></span>Edit Post</button></a>
              </td>
                <td>
                <a href="<?php echo url(); ?>"> <button class='btn btn-danger btn-xs' type="submit" name="delete-post" data-id="<?php echo $post->id; ?>" data-name="<?php echo $post->title; ?>" ><span class="fa fa-times"><span class="glyphicon glyphicon-edit"></span>Delete Post</button></a>
              </td>
            </tr> 
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      @endsection
    </div>
  </div>
</div>
      		