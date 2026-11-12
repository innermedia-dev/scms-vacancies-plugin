<?php get_header(); ?>
<div class="container">
		<main class="main">		
			<?php the_archive_title('<h1>','</h1>'); ?>
			<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post(); 					
				    include(IM_VACANCIES_PLUGIN_DIR . '/content/content-vacancyexcerpt.php');		
				endwhile;
				the_posts_pagination();
			endif; ?>
		</main>	
	</div>
</div>
<?php get_footer();
