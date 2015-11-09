@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
				<?php if (!!$search_info): ?>
				<div style="margin:40px 0px 40px 0px;">
					<h3> <?php echo $search_info; ?> </h3>
				</div>

				<?php endif; ?> 
				<?php foreach($posts as $post): ?>
					<div class="panel panel-default">
						<div class="panel-heading"><?php echo $post->title; ?> 	<p style="float:right"><?php echo $post->created_at; ?></p>	</div>
							<div class="panel-body">
							 	<h3><a href="<?php echo $post->link; ?>" target="_blank"> <?php echo $post->title; ?></a></h3>
						 		<?php if ($post->type->name == "youtube"): ?>
						 			<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $post->link; ?>" frameborder="0" allowfullscreen></iframe>
						 		<?php endif; ?>
						 		<P><?php echo $post->info;?></P>
							 	<P>Posted by: <a href='<?php echo URL('/?user='.$post->user()->id); ?>'><?php echo $post->user()->name;?></a></P>
							 	<P>Categories:
								 	<?php foreach ($post->categories as $categories): ?>
								 		<span> <a href='<?php echo URL('/?category='.$categories->id); ?>'><?php echo $categories->name; ?></a>,</span>
								 	<?php endforeach; ?>
							 	</P>
							</div>
					</div>
				<?php endforeach; ?>
		</div>
		<div class="col-md-3">
			@include('includes/user-side-bar')
		</div>
	</div>
</div>
@endsection
