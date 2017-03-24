<h3><?php echo $heading_title; ?></h3>
<link href="catalog/view/theme/default/stylesheet/instagram.css" rel="stylesheet">
<div id="rp_slideshow<?php echo $module; ?>" class="owl-carousel" style="opacity: 1;">
  <?php  $i=1;  foreach ($instagram->items as $items) {  if($i<=$limit){ ?>
  <div class="item text-center">
 <img src="<?php echo $items->images->standard_resolution->url; ?>" class="img-responsive" alt="">
          <h4><a href="<?php echo $items->link; ?>" target="_blank"><?php if($items->caption){echo $items->caption->from->full_name;} else if($items->location){ echo $items->location->name;} else {echo 'IMG';} ?></a><span class="like_outer"><?php echo $items->likes->count; ?><i class="fa fa-heart likes" aria-hidden="true"></i></span></h4>
          <?php if($items->caption){  echo '<p>'.$items->caption->text.'</p>';} ?>
        <?php if($items->likes){  } ?>
  </div>
  <?php } $i++; } ?>
</div>
          
<script type="text/javascript"><!--
$('#rp_slideshow<?php echo $module; ?>').owlCarousel({
	items: 4,
	autoPlay: 3000,
	navigation: true,
	navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
	pagination: true
});
--></script>
