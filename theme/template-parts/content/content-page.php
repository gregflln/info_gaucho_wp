<?php
/**
 * Partie du template pour l'affichage des pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package info_gaucho
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('overflow-hidden mb-8'); ?>>

	<header class="entry-header p-6 border-b border-neutral-800">
		<?php
		if ( ! is_front_page() ) {
			the_title( '<h1 class="entry-title text-2xl md:text-3xl lg:text-4xl font-bold text-neutral-100">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title text-2xl md:text-3xl lg:text-4xl font-bold text-neutral-100">', '</h2>' );
		}
		?>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="thumbnail-wrapper overflow-hidden">
			<?php the_post_thumbnail('large', array('class' => 'w-full h-auto object-cover transition-transform hover:scale-105 duration-300')); ?>
		</div>
	<?php endif; ?>

	<div <?php info_gaucho_content_class('entry-content p-6 text-neutral-300 leading-relaxed'); ?>>
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links my-6 p-4 border-l-4 border-red-600 bg-neutral-800">' . __( 'Pages:', 'info_gaucho' ),
				'after'  => '</div>',
				'link_before' => '<span class="px-2 py-1 mx-1 bg-neutral-700 hover:bg-red-600 rounded transition-colors">',
				'link_after'  => '</span>',
			)
		);
		?>
		
		<?php if ( has_tag() ) : ?>
		<div class="mt-8 pt-6 border-t border-neutral-800">
			<h3 class="text-neutral-400 text-sm mb-2"><?php _e('Mots-clés :', 'info_gaucho'); ?></h3>
			<div class="flex flex-wrap gap-2">
				<?php the_tags('<span class="bg-neutral-800 hover:bg-neutral-700 text-neutral-300 text-xs px-3 py-1 rounded-full transition-colors">', '</span><span class="bg-neutral-800 hover:bg-neutral-700 text-neutral-300 text-xs px-3 py-1 rounded-full transition-colors">', '</span>'); ?>
			</div>
		</div>
		<?php endif; ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->