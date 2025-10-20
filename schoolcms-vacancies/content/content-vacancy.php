<?php if(get_field('online_application')) {
	$apply = $_GET['apply'];
}
$today = date('Ymd');
if(get_field('deadline') < $today){
	$hit_deadline = 1;
} else {
    $hit_deadline = 0;
}
$deadline = DateTime::createFromFormat('Ymd', get_field('deadline'));?>
<div class="row vacanciesTop">
	<div class="col-md-auto order-md-2">
		<div class="return">
		  <a href="<?php bloginfo('url');?>/vacancies/">Back to listings</a>
		</div>
	</div>
	<div class="col-md order-md-1">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</div>
</div>
<div class="row">       
	<div class="sidebar-left col-sm-4">
		<div class="vacanciesHeader"><h2>Job summary</h2></div>
			<div class="jobSummary">
			<?php 
			if(get_field('role')){?>
			<p><strong>Job Role:</strong><br />
			<span><?php the_field('role');?></span></p>
			<?php }
			if(get_field('employment_type')){?>
			<p><strong>Employment Type:</strong><br />
			<span><?php the_field('employment_type');?></span></p>
			<?php }
			if(get_field('salary')){?>
			<p><strong>Salary Range:</strong><br />
			<span><?php the_field('salary');?></span></p>
			<?php }
			if(have_rows('further_information')){
				while(have_rows('further_information')){
					the_row();?>
					<p><?php the_sub_field('label');?>:<br />
					<span><?php the_sub_field('info');?></span></p>
					<?php 
				}
			}
			?>
			<?php if(get_field('qualification') || get_field('experience')):?>
			<div class="vacanciesHeader"><h3>Preferred Candidate</h3></div>
			<?php  if(get_field('qualification')){?>
			<p><strong>Qualification:</strong><br />
			<span><?php the_field('qualification');?></span></p>
			<?php }
			if(get_field('experience')){?>
			<p><strong>Experience:</strong><br />
			<span><?php the_field('experience');?></span></p>
			<?php }?>
			<?php endif;?>
		</div>
	</div>
	<div class="col-md-8">
		<?php if(isset($apply) && get_field('online_application') && $hit_deadline == 0){?>
		<div id="content" class="site-content" role="main">
			<div class="vacanciesHeader row align-items-cente">
				<div class="col">
					<h2 class="descHeader">Apply</h2>
				</div>
				<div class="col-auto">
					<a id="applyNow" class="applyNow button" href="<?php the_permalink();?>" >Back</a>
				</div>			  
			</div>
			<div class="entry-content vacancy-form">
				<?php echo do_shortcode(get_field('application_form'));?>
			</div>
		</div>			
		<?php
		} else {
		?>
		<div id="content" class="site-content" role="main">	
			<div class="vacanciesHeader row align-items-cente">
				<div class="col">
					<h2 class="descHeader">Job Description</h2>
				</div>
				<?php if(get_field('online_application') && $hit_deadline == 0){?>
				<div class="col-auto">
					<a id="applyNow" class="applyNow button" href="<?php the_permalink();?>?apply#main" >Apply Now</a>
				</div>
				<?php }?>
			</div>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">          
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article>
			</div><!-- #content -->

	<?php }?>

		<?php $related_documents = get_field('related_downloads');
						if($related_documents) {
							$i = 0;
							echo '<div class="row documents">';
							while(have_rows('related_downloads')) { the_row();
							$i++;
							if($i % 3 == 1) {$extra = 'clearfix';}else{$extra = '';}
								$document = get_sub_field('documents');
								echo('<div class="document col-md-4 '.$extra.'">');              
								echo ('<div class="related_document_link"><a href="' . $document['url'] . '" target="_blank" class="document-link">
								<i class="fa fa-file-text-o"></i>
								' . $document['title'] . '</a></div>');
								echo('</div>');
							}
							echo '</div>';
						}?>
		</div>	
	</div>
</div>