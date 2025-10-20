<?php $today = date('Ymd');?>
<?php $deadline = DateTime::createFromFormat('Ymd', get_field('deadline'));?>
<div class="vacancyArchiveItem">
	<div class="row align-items-center">
		<div class="col-auto">
			<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
		</div>
		<div class="col">
			<p class="vacanciesMeta"><span class="date">Posted on: <?php the_time('d-m-Y');?></span>
				<?php if(get_field('deadline')){?>| <span class="loc deadline<?php if($today == get_field('deadline')) echo 'Today'; elseif($today+7 >= get_field('deadline')) echo 'Week';?>">Deadline: <?php echo $deadline->format('d-m-Y');;?>
				</span><?php }?></p>
		</div>
		<div class="col-auto">
			<a href="<?php the_permalink();?>" class="button">Details</a>
		</div>
	</div>
</div>