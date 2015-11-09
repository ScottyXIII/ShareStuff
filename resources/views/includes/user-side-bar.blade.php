<?php foreach (\App\SideBars::get() as $side_bar): ?>
	<?php if ($side_bar->active == 1): ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4> <?php echo $side_bar->title; ?> </h4> 
			</div>
			<div class="panel-body">
				<?php $include = "includes/".$side_bar->include; ?>
				@include($include)
			</div>
		</div>
	<?php endif; ?>
<?php endforeach; ?>
