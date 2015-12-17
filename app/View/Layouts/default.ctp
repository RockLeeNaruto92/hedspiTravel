<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch("title"); ?>
	</title>
	<?php
		echo $this->Html->meta("icon");

		echo $this->Html->css("bootstrap");
		echo $this->Html->css("bootstrap.min");
		echo $this->Html->css("coin-slider");
		echo $this->Html->css("style");

		echo $this->Html->script("jquery-1.4.2.min");
		echo $this->Html->script("coin-slider.min");
		echo $this->Html->script("cufon-yui");
		echo $this->Html->script("cufon-aller-700");
		echo $this->Html->script("script");

		echo $this->fetch("meta");
		echo $this->fetch("css");
		echo $this->fetch("script");
	?>
</head>
<body>
	<div class="main">
		<div class="header">
			<?php echo $this->element("header"); ?>
		</div>
		<div class="content">
			<div class="content_resize">
				<div class="mainbar">
					<?php echo $this->element("flash");?>
					<?php echo $this->fetch("content"); ?>
				</div>
				<div class="sidebar">
					<?php echo $this->element("sidebar"); ?>
				</div>
				<div class="clr"></div>
			</div>
		</div>
	</div>
</body>
</html>
