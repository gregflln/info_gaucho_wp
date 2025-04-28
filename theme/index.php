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

<div
    class="relative w-full rounded-xl aspect-video overflow-hidden max-h-128"
    role="banner" >
    <div
        class="absolute inset-0 bg-cover bg-center z-0"
        style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/poster.webp' ); ?>');"
        aria-hidden="true" ></div>

    <div class="absolute inset-0 bg-neutral-800 opacity-50 z-10"></div> <div class="relative z-20 h-full flex flex-col justify-center items-center p-16 gap-y-4">
        <img
            class="w-32" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo_transparent_blanc.png' ); ?>"
            alt="Logo Info GauchO" >
        <p class="font-semibold text-xl text-white"> Actualité militante Orléanaise
        </p>
    </div>
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
