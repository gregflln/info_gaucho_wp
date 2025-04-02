<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package info_gaucho
 */

get_header();
?>

	<section id="primary">
		<main id="main">
		

		<?php if ( have_posts() ) : ?>

			
			<header class="page-header mb-10 md:mb-12 border-b border-neutral-700 pb-6">
                    <?php
                    single_term_title( '<h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-neutral-100 leading-tight">', '</h1>' );
					
					?>
                </header>
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'excerpt' );

				// End the loop.
			endwhile;

			// Previous/next page navigation.
			info_gaucho_the_posts_navigation();

		else :

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
