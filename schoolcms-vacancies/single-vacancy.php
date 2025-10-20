<?php get_header(); ?>



	<?php get_template_part('page-banner-holder'); ?>



<div class="container body-container">

<div class="row">



		<div class="<?php echo 'col bodyContent' ;?>">		

		<!-- breadcrumbs -->	

		<div class="breadcrumbs">

<?php if(function_exists('bcn_display')) {	bcn_display();	} ?>
			

		</div>

			<?php while ( have_posts() ) :

				the_post();

				$post_type = get_post_type( $post_id );

				 include('content/content-vacancy.php');





			endwhile; // End of the loop.?>



		</div>

		

	</div>



</div> <!-- /container -->







<?php get_footer(); ?>

