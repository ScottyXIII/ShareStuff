@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
				<?php foreach($users as $user): ?>
					<div class="panel panel-default">
						<p> Name: <?php echo $user->name; ?> </p>
						<p> Date joined: <?php echo $user->created_at; ?> </p>
						<p> Number of posts: 7 </p>
						<p> Send Message </p>
					</div>
				<?php endforeach; ?>
		</div>
	</div>
</div>
@endsection
