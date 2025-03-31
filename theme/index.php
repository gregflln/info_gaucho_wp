<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no `home.php` file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package info_gaucho
 */

get_header();
?>

	<section id="primary">
		<main id="main" class="flex gap-y-8 my-8">

			<div class="hero flex flex-col justify-center items-center align-middle p-16 w-full bg-neutral-800 rounded-xl aspect-video gap-y-4">
				<img class="w-32" src="https://localhost:3000/wp-content/uploads/2025/03/Logo-blanc-transparent.png" alt="logo">
				<p class="font-semibold text-xl">Actualité militante Orléanaise</p>
			</div>

		<?php
		/*
		if ( have_posts() ) {

			if ( is_home() && ! is_front_page() ) :
				?>
				<header class="entry-header">
					<h1 class="entry-title"><?php single_post_title(); ?></h1>
				</header><!-- .entry-header -->
				<?php
			endif;

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/content' );
			}

			// Previous/next page navigation.
			info_gaucho_the_posts_navigation();

		} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		}
			*/
		?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
