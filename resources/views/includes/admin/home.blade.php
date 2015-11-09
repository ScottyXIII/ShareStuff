@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-3">
      @include('admin-nav')
    </div>
   
   <p> Home will shwo at a glimps the site stats - number of users, posts, messeges sent, top 5 posters. last 5 new users. any pending user deletions, Any bans(posting, message, add categories)  </p>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
   <style> 
   .widget {
	    border-radius: 3px;
	    margin-bottom: 20px;
	    color: #fff;
	    padding: 15px;
	    overflow: hidden;
	}
	.widget.widget-stats {
    	position: relative;
	}
	.bg-green {
    	background: #00acac!important;
	}
	.widget {
	    border-radius: 3px;
	    margin-bottom: 20px;
	    color: #fff;
	    padding: 15px;
	    overflow: hidden;
	}
	.widget-stats .stats-icon {
	    font-size: 42px;
	    height: 56px;
	    width: 56px;
	    text-align: center;
	    line-height: 56px;
	    margin-left: 15px;
	    color: #fff;
	    position: absolute;
	    right: 15px;
	    top: 15px;
	    opacity: .2;
	    filter: alpha(opacity=20);
	}
	.stats-link a{
		display:block;margin:15px -15px -15px;
		padding:7px 15px;
		background:url(../img/transparent/black-0.4.png);
		background:rgba(0,0,0,.4);
		text-align:right;
		color:#ddd;
		font-weight:300;
		text-decoration:none;
	}
	.stats-link a:hover{
		background:url(../img/transparent/black-0.6.png);
		background:rgba(0,0,0,.6);
		color:#fff;
	}

	.list-group-item {
		background-color: inherit !important;
		border:none;
	}
	a.list-group-item {
		color:white;
	}
	.badge {
		background:rgba(0,0,0,.4);
	}


	.graph-legend-name {
	   	color: black !important;
	    display: block;
	    font-size: 1.1em;
	    font-weight: 300;
	}
	.graph-legend-lable {
	 	color: #333333 !important;
	    font-size: 1.0em;
	}
	.graph-legend-value {
		display:block;
		font-size:2.0em;
		font-weight:600;
	}

   </style>

   <div class="col-md-3 col-sm-6">
		<div class="widget widget-stats bg-green">
			<div class="stats-icon"><i class="fa fa-users"></i></div>
			<div class="stats-info">
				<h4>TOTAL USERS</h4>
				<p><?php echo $total_users; ?></p>	
			</div>
			<div class="stats-link">
				<a href="<?php echo url('admin/users'); ?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
			</div>
		</div>
	</div>

	   <div class="col-md-3 col-sm-6">
		<div class="widget widget-stats bg-green">
			<div class="stats-icon"><i class="fa fa-desktop"></i></div>
			<div class="stats-info">
				<h4>USERS LOGGED IN</h4>
				<p><?php echo $logged_in; ?></p>	
			</div>
			<div class="stats-link">
				<a href="<?php echo url('admin/users'); ?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
			</div>
		</div>
	</div>
	   <div class="col-md-3 col-sm-6">
		<div class="widget widget-stats bg-green">
			<div class="stats-icon"><i class="fa fa-pencil"></i></div>
			<div class="stats-info">
				<h4>TOTAL POSTS</h4>
				<p><?php echo $total_posts; ?></p>	
			</div>
			<div class="stats-link">
				<a href="<?php echo url('admin/posts'); ?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
			</div>
		</div>
	</div>

	<div class="col-md-5 col-sm-6">
		<div class="widget widget-stats bg-green">
			<div class="stats-icon"><i class="fa fa-pie-chart"></i></div>
			<div class="stats-info">
				<h4>SITE STATS</h4>
				<hr style="margin-top:30px; opacity:0.2;">
				
				<div class="list-group">
					<div class="col-md-12">
						<span class="graph-legend-name">New users</span>
			          	
			          	<div class="list-group-item col-md-4">
							<span class="graph-legend-lable">Today</span>
							<span class="graph-legend-value"><?php echo $new_users_day; ?></span>
						</div>
						
						<div class="list-group-item col-md-4">
							<span class="graph-legend-lable">This week</span>
							<span class="graph-legend-value"><?php echo $new_users_week; ?></span>
						</div>
						
						<div class="list-group-item col-md-4">
							<span class="graph-legend-lable">This month</span>
							<span class="graph-legend-value"><?php echo $new_users_month; ?></span>
						</div>
					</div>

					<div class="list-group-item">
						<span class="graph-legend-name">New Posts</span>
						
						<div class="list-group-item col-md-4">
							<span class="graph-legend-lable">Today</span>
							<span class="graph-legend-value"><?php echo $new_posts_day; ?></span>
						</div>
						
						<div class="list-group-item col-md-4">
							<span class="graph-legend-lable">This week</span>
							<span class="graph-legend-value"><?php echo $new_posts_week; ?></span>
						</div>
						
						<div class="list-group-item col-md-4">
							<span class="graph-legend-lable">This month</span>
							<span class="graph-legend-value"><?php echo $new_posts_month; ?></span>
						</div>
					</div>

					<div class="list-group-item">
						<span class="graph-legend-name">Total Categories</span>
						<span class="graph-legend-value"><?php echo $total_categories; ?></span>
					</div>

					<div class="list-group-item">
						<span class="graph-legend-name">Unread Admin Messages</span>
						<span class="graph-legend-value"><?php echo $unread_admin_messages; ?></span>
					</div>
	       		</div>	
			</div>
			<div class="stats-link">
				<a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
			</div>
		</div>
	</div>

    <div class="col-md-4 col-sm-6">
		<div class="widget widget-stats bg-green">
			<div class="stats-icon"><i class="fa fa-user-plus"></i></div>
			<div class="stats-info">
			<h4>NEWEST USERS</h4> 
				<hr style="opacity:0.2;">
				<div class="list-group">
		            <?php foreach ($latest_users as $user): ?>
		            <a href="<?php echo url('admin/users/edit/'.$user->id); ?>" class="list-group-item">
		                <span class="badge">just now</span>
		                <i class="fa fa-fw fa-user"></i> <?php echo $user->name; ?>
		            </a>
		            <?php endforeach; ?>
	    		</div>	
			</div>
			<div class="stats-link">
				<a href="<?php echo url('admin/users'); ?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
			</div>
		</div>
	</div>

	<div class="col-md-9 col-md-offset-3">
		<div class="widget widget-stats bg-green">
			<div class="stats-icon"><i class="fa fa-envelope"></i></div>
			<div class="stats-info">
				<h4>Unread Admin Messages</h4> 
				<hr style="opacity:0.2;">
				<div class="list-group">
		             <?php if ($admin_messages->count() > 0): ?>
		             <?php foreach($admin_messages as $message): ?>
		             <a href="<?php echo url('admin/messages/read/'.$message->id); ?>" class="list-group-item">
		                <span class="badge"> <i class="fa fa-fw fa-user"></i> <?php echo $message->user->name; ?></span>
		                <i class="fa fa-fw fa-envelope"></i> <?php echo $message->title; ?>
		            </a>
		           	<?php endforeach; ?>
		        	<?php else: ?>
		            <p> There are no new admin messges </p>
		        	<?php endif; ?>
	       		</div>	
			</div>
			<div class="stats-link">	
				<a href="<?php echo url('admin/messages'); ?>">View All Admin Messages <i class="fa fa-arrow-circle-o-right"></i></a>
			</div>
		</div>
	</div>

   <div class="col-md-6 col-sm-6  col-md-offset-3">
		<div class="widget widget-stats bg-green">
			<div class="stats-icon"><i class="fa fa-user-plus"></i></div>
			<div class="stats-info">
				<h4>NEWST POSTS</h4> 
				<hr style="opacity:0.2;">
				<div class="list-group">
					<?php foreach($latest_posts as $post): ?>
			        	<a href="<?php echo url('admin/posts/edit/'.$post->id); ?>" class="list-group-item">
		                	<span class="badge"><i class="fa fa-fw fa-calendar"></i> <?php echo $post->created_at; ?></span>
		                	<i class="fa fa-fw fa-envelope"></i> <?php echo $post->title; ?>
							<i class="fa fa-fw fa"></i>
		                	<i class="fa fa-fw fa-user"></i> <?php echo $post->user()->name; ?>
		           		</a>
					<?php endforeach; ?>
	        	</div>	
			</div>
			<div class="stats-link">
				<a href="<?php echo url('admin/posts'); ?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
			</div>
		</div>
	</div>

  </div>
</div>
@endsection



      