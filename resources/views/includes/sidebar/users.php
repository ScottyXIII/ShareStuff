
<?php foreach (\App\SideBars::get() as $side_bar): ?>
	<?php if ($side_bar->active == 1): ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4> <?php echo $side_bar->title; ?> </h4> 
			</div>
			<div class="panel-body">
				<?php foreach ($users as $user): ?>
					<p><a href="<?php echo URL('/?user='.$user->id); ?>'"><?php echo $user->name; ?></a> <span style="float:right;"><?php echo \App\User::numberOfPosts($user->id); ?></span></p>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
<?php endforeach; ?>
