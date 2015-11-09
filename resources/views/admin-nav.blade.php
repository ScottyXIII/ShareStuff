<ul class="nav nav-pills nav-stacked" style="margin-top:10px;">
	<li role="presentation" class="<?php if ($active_nav == "home") echo "active";?>"> <a href="<?php echo url('/admin'); ?>"><span class="glyphicon glyphicon-home"></span> Home </a></li>
	<li role="presentation" class="<?php if ($active_nav == "messages") echo "active";?>"> <a href="<?php echo url('/admin/messages'); ?>"><span class="glyphicon glyphicon-envelope"></span> Admin Messages </a></li>
 	<li role="presentation" class="<?php if ($active_nav == "settings") echo "active";?>"> <a href="<?php echo url('admin/settings'); ?>"><span class="glyphicon glyphicon-wrench"></span> Website Settings</a></li>
   	<li role="presentation" class="<?php if ($active_nav == "theme") echo "active";?>"> <a href="<?php echo url('admin/theme'); ?>"><span class="glyphicon glyphicon-paperclip"></span> Website Theme Manager</a></li>
  	<li role="presentation" class="<?php if ($active_nav == "users") echo "active";?>"> <a href="<?php echo url('admin/users'); ?>"><span class="glyphicon glyphicon-user"></span> Users Manager</a></li>
  	<li role="presentation" class="<?php if ($active_nav == "posts") echo "active";?>"> <a href="<?php echo url('admin/posts'); ?>"><span class="glyphicon glyphicon-pencil"></span> Posts Manager</a></li>
</ul>