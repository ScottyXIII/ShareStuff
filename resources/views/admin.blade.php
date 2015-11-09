@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-3">
			@include("admin-nav")
		</div>
		<div class="col-md-8">
			<?php if (isset($_GET['page'])): ?>
				<?php if ($_GET['page'] == "users"): ?>
					@include("includes/admin/manage-users")
				<?php elseif ($_GET['page'] == "posts"): ?>
					@include("includes/admin/manage-posts")
				<?php elseif ($_GET['page'] == "settings"): ?>
					@include("includes/admin/settings")
				<?php elseif ($_GET['page'] == "css"): ?>
					@include("includes/admin/css")
				<?php endif; ?> 
			<?php else: ?>
				@include("includes/admin/settings")
			<?php endif; ?>
		</div>
	</div>
</div>
@endsection
