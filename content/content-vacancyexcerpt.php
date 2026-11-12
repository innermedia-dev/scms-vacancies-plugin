<?php $today = new DateTime('today'); 
$deadline = DateTime::createFromFormat('Ymd|', get_field('deadline'));
$week = strtotime('+7 day');
$classes = '';
if($today->format('U') == $deadline->format('U')){
	$classes .= ' expireToday';
} elseif ($deadline->format('U') < $week){
	$classes .= ' expireWeek';
} else {
	$classes .= '';
}
?>
<div class="vacancyArchiveItem<?php echo $classes;?>">
	<div class="row align-items-center">
		<div class="col-lg-4 col-xl-3">
			<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
		</div>
		<div class="col">
			<p class="vacanciesMeta"><span class="date">Posted on: <?php the_time('d-m-Y');?></span>
				<?php if(get_field('deadline')){?>| <span class="loc deadline">Deadline: <?php echo $deadline->format('d-m-Y');;?>
				</span><?php }?></p>
		</div>
		<div class="col-auto">
			<a href="<?php the_permalink();?>" class="button">Details</a>
		</div>
	</div>
</div>