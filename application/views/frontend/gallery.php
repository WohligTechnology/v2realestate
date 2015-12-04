<section id="portfolio" class="container pad-left">
  <div class="fullwidth-section kill-bottom-padding">
    <div class="container">
      <div class="row" style="margin-bottom: 40px;">
        <div class="col-md-8 col-md-offset-2 text-center pdn wdy">
          <h1 class="weight-800 kill-top-margin uppercase">Projects</h1>
          <h4 class="weight-400">Have a look at what we've been up to. View some of our best work.</h4>
        </div>
      </div>


    <div class="row text-center">
      <div class="col-md-12" id="isotope-filter">
        <a data-filter="*" href="#" class="btn btn-sm btn-outline btn-primary active">Show All</a>
        <?php foreach($project as $row) { ?>
        <a data-filter=".project<?php echo $row->id;?>" href="#" class="btn btn-primary btn-sm btn-outline">
					<i class="fa <?php echo $row->icon; ?>"></i><?php echo $row->name; ?></a>
        <?php } ?>
      </div>
    </div>



			<div class="row">
				<div id="isotope">
          <?php foreach($project as $row) { ?>
            <?php foreach($row->images as $image) { ?>
					<div class="col-sm-3 project pdn">
						<div class="portfolio-hover">
							<div class="portfolio-hover-buttons">
								<a href="<?php echo site_url("website/project?id=$row->id") ?>" on-click="">View Project</a><a data-pp="prettyPhoto[portfolio]" href="<?php echo base_url("uploads/$image->image");?>" title=""><i class="im-expand2"></i></a>
							</div>
						</div>
						<div class="img-thumb" style="background-image: url('<?php echo base_url("uploads/$image->image");?>');">
						</div>
					</div>
          <?php } ?>
          <?php } ?>

				</div>
			</div>
		</div>
	</div>
</section>
