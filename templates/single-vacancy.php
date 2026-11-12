<?php get_header(); ?>
<div class="container">
		<main class="main">			
			<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post();
                    the_title('<h1>','</h1>');
				    include(IM_VACANCIES_PLUGIN_DIR . '/content/vacancies-content.php');		
				endwhile;
				the_posts_pagination();
			endif; ?>
		</main>	
	</div>
</div>
<?php get_footer();

