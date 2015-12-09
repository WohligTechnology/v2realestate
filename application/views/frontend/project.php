<div class="fullwidth-section nofootmg" id="blog-fullwidth" style="padding-top: 0">
	<!-- Blog Post -->
	<div class="row">
		<div class="col-md-12">
			<?php $image = $project->images[0]->image; ?>
			<!-- The large image displayed below will always fill the screen and be 75% height. This is determine in the astonish.js file -->
			<div class="img-thumb  post-img-lg bg  visible-xs-block hidden-sm-block" style="background-image: url('<?php echo base_url("uploads/$image");?>');" style="background-size:cover">
				<div class="img-overlay-solid" style="background-color:rgba(60,62,71,0.1);"></div>
				<?php foreach($project->images as $image2) { ?>
				<a class="expand-img" data-pp="prettyPhoto[blog-gallery]" href="<?php echo base_url("uploads/$image2->image");?>" title="<?php echo ($project->name);?>"><i class="im-expand2"></i></a>
				<?php } ?>
			</div>
			<div class="margin-tp hidden-xs-block hidden-sm-block">
				<img src="<?php echo base_url("uploads/$image");?>">
				<div class="img-overlay-solid" style="background-color:rgba(60,62,71,0.1);"></div>
				<?php foreach($project->images as $image2) { ?>
				<a class="expand-img" data-pp="prettyPhoto[blog-gallery]" href="<?php echo base_url("uploads/$image2->image");?>" title="<?php echo ($project->name);?>"><i class="im-expand2"></i></a>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 pad-left">
				<h2><?php echo ($project->name);?></h2>
								<?php echo ($project->desc);?>
			</div>
		</div>
	</div>
</div>
