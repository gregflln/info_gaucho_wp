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

			<div class="hero flex flex-col justify-center items-center align-middle p-16 w-full bg-neutral-800 rounded-xl aspect-video gap-y-4">
				<img class="w-32" src="https://localhost:3000/wp-content/uploads/2025/03/Logo-blanc-transparent.png" alt="logo">
				<p class="font-semibold text-xl">Actualité militante Orléanaise</p>
			</div>
			<h3 class="text-3xl uppercase font-bold text-white">nos dernières actualités</h3>
		<?php
		
		if ( have_posts() ) {

			if ( is_home() && ! is_front_page() ) :
				?>
				<header class="entry-header">
					<h1 class="entry-title"><?php single_post_title(); ?></h1>
				</header><!-- .entry-header -->
				
				<?php
			endif;

			get_template_part( 'template-parts/content/content' );


		} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		}
			
		?>
		

<?php
get_footer();
