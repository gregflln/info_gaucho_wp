<?php
/**
 * Template part pour l'affichage d'un article/page dans une liste
 * (accueil, catégories, recherche...)
 */

// Détermine si c'est une page ou un article
$is_page = get_post_type() === 'page';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('relative flex flex-col sm:flex-row-reverse border border-neutral-800 rounded-lg overflow-hidden transition-all duration-300 hover:border-red-600/50 mb-4 sm:mb-6'); ?>>
    
    <?php if (!$is_page && has_post_thumbnail()) : ?>
    <!-- Image (en haut sur mobile, à gauche sur desktop) - uniquement pour les articles -->
    <a href="<?php the_permalink(); ?>" class="relative block w-full sm:w-2/5 lg:w-1/3 shrink-0 md:max-w-64">
        <div class="aspect-video sm:aspect-square relative overflow-hidden">
            <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover transition-transform duration-500 hover:scale-105']); ?>
        </div>
        
        <!-- Étiquette "À la une" positionnée sur l'image -->
        <?php if (is_sticky()) : ?>
        <div class="absolute top-0 left-0 bg-red-600 text-neutral-100 text-xs font-bold uppercase px-3 py-2">
            <?php _e('À la une', 'votre-theme'); ?>
        </div>
        <?php endif; ?>
    </a>
    <?php elseif (!$is_page) : ?>
    <!-- Placeholder graphique si pas d'image (uniquement pour les articles) -->
    <div class="relative w-full sm:w-2/5 lg:w-1/3 shrink-0 md:max-w-64">
        <div class="aspect-video sm:aspect-square flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-neutral-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>
        
        <!-- Étiquette "À la une" positionnée sur le placeholder -->
        <?php if (is_sticky()) : ?>
        <div class="absolute top-0 left-0 bg-red-600 text-neutral-100 text-xs font-bold uppercase px-3 py-2">
            <?php _e('À la une', 'votre-theme'); ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <div class="p-4 sm:p-5 flex-1 flex flex-col justify-between">
        <!-- Indicateur type de contenu + catégories -->
        <div class="mb-2 sm:mb-3 flex flex-wrap gap-2">
            <?php if ($is_page) : ?>
                <span class="text-xs font-bold uppercase bg-neutral-700 text-neutral-100 px-3 py-1">
                    <?php _e('Page', 'votre-theme'); ?>
                </span>
                
                <!-- Étiquette "À la une" pour les pages (puisqu'elles n'ont pas d'image) -->
                <?php if (is_sticky()) : ?>
                <span class="text-xs font-bold uppercase bg-red-600 text-neutral-100 px-3 py-1">
                    <?php _e('À la une', 'votre-theme'); ?>
                </span>
                <?php endif; ?>
            <?php elseif (has_category()) : ?>
                <?php
                $categories = get_the_category();
                foreach ($categories as $category) {
                    echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="text-xs font-bold uppercase bg-primary text-white hover:bg-white hover:text-primary px-3 py-1 transition-colors duration-300">' . esc_html($category->name) . '</a>';
                }
                ?>
            <?php endif; ?>
        </div>
        
        <!-- Titre -->
        <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-neutral-100 mb-2 sm:mb-3 line-clamp-2">
            <a href="<?php the_permalink(); ?>" class="hover:text-red-600 transition-colors duration-300"><?php the_title(); ?></a>
        </h2>
        
        <!-- Extrait -->
        <div class="text-neutral-400 mb-3 line-clamp-2 sm:line-clamp-3">
            <?php echo get_the_excerpt(); ?>
        </div>
        
        <!-- Métadonnées -->
        <div class="mt-auto flex items-center justify-between text-xs sm:text-sm text-neutral-500">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
            </div>
            
            <?php if (!$is_page && function_exists('get_comments_number')) : ?>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
                <span><?php echo get_comments_number(); ?></span>
            </div>
            <?php endif; ?>
        </div>
    </div>
</article>