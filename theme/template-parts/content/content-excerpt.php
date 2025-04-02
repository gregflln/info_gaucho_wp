<?php
/**
 * Template part for displaying post excerpts in archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package info_gaucho
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('group relative overflow-hidden rounded-lg transition-all duration-300 hover:translate-y-[-4px]'); ?>>
    <a href="<?php the_permalink(); ?>" class="absolute inset-0 z-10" aria-label="<?php the_title_attribute(); ?>"></a>
    
    <div class="grid grid-cols-1 md:grid-cols-12 gap-0 md:gap-6">
        <?php if (has_post_thumbnail()) : ?>
        <div class="md:col-span-4 aspect-[4/3] overflow-hidden rounded-l-lg md:rounded-lg">
            <?php the_post_thumbnail('medium_large', array(
                'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.03]',
                'alt' => get_the_title()
            )); ?>
        </div>
        <?php endif; ?>
        
        <div class="<?php echo has_post_thumbnail() ? 'md:col-span-8' : 'md:col-span-12'; ?> flex flex-col p-5 md:p-0 md:py-2">
            <!-- Category -->
            <?php
            $categories = get_the_category();
            if (!empty($categories)) :
            ?>
            <div class="mb-2">
                <span class="text-xs font-medium uppercase tracking-wide text-primary-600 opacity-90">
                    <?php echo esc_html($categories[0]->name); ?>
                </span>
            </div>
            <?php endif; ?>
            
            <!-- Title -->
            <h2 class="entry-title text-base md:text-lg font-medium mb-2 leading-tight group-hover:text-primary-500 transition-colors duration-200">
                <?php the_title(); ?>
            </h2>
            
            <!-- Date -->
            <time datetime="<?php echo get_the_date('c'); ?>" class="text-xs text-neutral-400 mb-3">
                <?php echo get_the_date(); ?>
            </time>
            
            <!-- Excerpt -->
            <div class="entry-summary text-sm text-neutral-300 leading-relaxed line-clamp-2 md:line-clamp-3">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>
    
    <!-- Subtle card bottom border -->
    <div class="absolute bottom-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-neutral-700/30 to-transparent"></div>
    
    <!-- Featured Label for Sticky Posts -->
    <?php if (is_sticky()) : ?>
    <div class="absolute top-3 right-3 z-20">
        <span class="px-2 py-1 bg-primary-600/90 text-neutral-100 text-xs font-medium rounded-md backdrop-blur-sm">
            <?php esc_html_e('À la une', 'info_gaucho'); ?>
        </span>
    </div>
    <?php endif; ?>
</article>