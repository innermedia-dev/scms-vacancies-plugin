<?php get_header(); ?>



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

		

	<?php if ( have_posts() ) :

				while ( have_posts() ) : the_post(); ?>

				<?php include('content/content-vacancyexcerpt.php');?>

				

			<?	endwhile;

				the_posts_pagination();

			else :

			get_template_part( 'template-parts/content', 'none' );



		endif; ?>



	</div>


</div>



</div> <!-- /container -->







<?php get_footer();

