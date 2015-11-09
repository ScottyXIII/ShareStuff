<?php foreach ($users as $user): ?>
	<p><a href="<?php echo URL('/?user='.$user->id); ?>'"><?php echo $user->name; ?></a> <span style="float:right;"><?php echo \App\User::numberOfPosts($user->id); ?></span></p>
<?php endforeach; ?>
