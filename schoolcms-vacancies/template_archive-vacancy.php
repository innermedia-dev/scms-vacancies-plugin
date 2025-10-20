<?php /*Template Name: Vacancy Archive*/
get_header(); ?>



	<?php get_template_part('page-banner-holder'); ?>



<div class="container body-container">

<div class="row">



		<div class="<?php echo 'col bodyContent';?>">		

		<!-- breadcrumbs -->	

		<div class="breadcrumbs">

			<?php if(function_exists('bcn_display')) {	bcn_display();	} ?>
		</div>

			<!-- page title -->

			<h1 class="entry-title"><?php echo get_the_archive_title(); ?></h1>	
				
				
			<?php while ( have_posts() ) :

				the_post();



				get_template_part( 'template-parts/content', 'page' );



			endwhile; // End of the loop.?>
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$today = date('Ymd');
			$wp_query = new WP_Query(
			array(
			  'post_type'=>'vacancy',
			  'posts_per_page'=>5,      
			  'paged'=>$paged,
			  'meta_key'=>'deadline',
			  'orderby'		=> 'meta_value_num',
			  'order'			=> 'ASC',
			  'meta_query' => array(
				array(
				  'key' => 'deadline',
				  'compare' => '>=',
				  'value' => $today,
				  )
				  ),
			)
			);?>

	 <?php if ( $wp_query->have_posts() ) :

				while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

				<?php include('content/content-vacancyexcerpt.php');?>

				

			<?	endwhile;

				the_posts_pagination();

			else :

			get_template_part( 'template-parts/content', 'none' );



		endif; 
		wp_reset_postdata();?>



	</div>


</div>



</div> <!-- /container -->







<?php get_footer();

