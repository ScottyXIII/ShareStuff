<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
	<link href="<?php if (Auth::guest() || \Auth::user()->Theme()->file_name == "") {echo asset('/css/app.css');} else {echo  asset('/css/'.\Auth::user()->Theme()->file_name); } ?>" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo URL('/'); ?>"><span class="glyphicon glyphicon-home"> </span><?php echo \App\SiteTheme::first()->logo_text; ?></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-center">
					
				</ul>

				<ul class="nav navbar-nav navbar-right">
				@if (!Auth::guest())
				<li><a href='<?php echo url("/message"); ?>'><span class="glyphicon glyphicon-comment"></span> Messages <?php if (Auth::user()->numberUnreadMessages() > 0): ?><span class="badge"> <?php echo Auth::user()->numberUnreadMessages(); ?></span><?php endif; ?> </a></li>
					<li><a href='<?php echo url("/my-posts/"); ?>'><span class="glyphicon glyphicon-pencil"></span> My Posts</a></li>
					<li><a href="{{ url('/new-post') }}"><span class="glyphicon glyphicon-plus"></span> New Post</a></li>
					<li><a href="{{ url('/category/add') }}"><span class="glyphicon glyphicon-tag"></span> Add Category</a></li>
					<form class="navbar-form navbar-left" role="search" method="get">
				        <div class="form-group">
				          <input type="text" class="form-control" placeholder="Search" name="search" <?php if (isset($_GET['search'])): ?> value="<?php echo $_GET['search'];?>" <?php endif; ?> >
				        </div>
				        <button type="submit" class="btn btn-default">Search</button>
			      	</form>
			    @endif
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/new-post') }}"><span class="glyphicon glyphicon-plus"></span> New Post </a></li>
								<li><a href="{{ url('/users') }}"><span class="glyphicon glyphicon-user"></span> Users</a></li>
								<li><a href="{{ url('/message') }}"><span class="glyphicon glyphicon-envelope"></span> Message</a></li>
								<li><a href="{{ url('/settings') }}"><span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
								<?php if (Auth::user()->super_user): ?>
									<li><a href="{{ url('/admin') }}"><span class="glyphicon glyphicon-lock"></span>Admin</a></li>
								<?php endif; ?>
								<li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-off"></span> Logout</a></li>	
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

</body>
</html>
