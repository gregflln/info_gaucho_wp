<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package info_gaucho
 */

get_header();
?>

<section id="primary" class="flex flex-col justify-center items-center min-h-[60vh] px-4 py-16 md:py-24">
    <main id="main" class="w-full max-w-2xl mx-auto">
        <div class="text-center">
            <!-- 404 Error Number -->
            <p class="text-6xl md:text-8xl font-bold mb-6 text-red-600 opacity-90">404</p>
            
            <!-- Main Error Header -->
            <header class="page-header mb-8">
                <h1 class="page-title text-2xl md:text-3xl font-bold tracking-tight">
                    <?php esc_html_e('Page introuvable', 'info_gaucho'); ?>
                </h1>
            </header>

            <!-- Error Content with Border Accent -->
            <div <?php info_gaucho_content_class('page-content rounded-lg border border-red-800/30 p-6 md:p-8 backdrop-blur-sm'); ?>>
                <p class="text-base md:text-lg mb-6 opacity-90">
                    <?php esc_html_e('Cette page ne peut pas être trouvée. Elle a peut-être été supprimée, renommée, ou n\'a jamais existé.', 'info_gaucho'); ?>
                </p>
                
                <!-- Divider -->
                <div class="w-16 h-1 bg-red-600 opacity-70 mx-auto my-6"></div>
                
            </div>
            
            <!-- Related Posts if Available -->
            <?php
            $recent_posts = wp_get_recent_posts(array(
                'numberposts' => 3,
                'post_status' => 'publish'
            ));
            
            if (!empty($recent_posts)) : ?>
                <div class="mt-16">
                    <h2 class="text-xl font-medium mb-6"><?php esc_html_e('Articles récents', 'info_gaucho'); ?></h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <?php
                        foreach ($recent_posts as $post) :
                            $post_thumbnail = get_the_post_thumbnail_url($post['ID']) ?: '';
                        ?>
                            <a href="<?php echo get_permalink($post['ID']); ?>" class="group block rounded-lg overflow-hidden border border-gray-800/50 hover:border-red-800/50 transition-all duration-200">
                                <?php if ($post_thumbnail) : ?>
                                    <div class="aspect-video overflow-hidden">
                                        <img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php echo esc_attr($post['post_title']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    </div>
                                <?php endif; ?>
                                <div class="p-4">
                                    <h3 class="font-medium text-sm group-hover:text-red-500 transition-colors duration-200"><?php echo esc_html($post['post_title']); ?></h3>
                                    <p class="text-xs opacity-60 mt-2"><?php echo get_the_date('', $post['ID']); ?></p>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Style the search form with Tailwind classes
    const searchForm = document.querySelector('.search-form');
    if (searchForm) {
        searchForm.classList.add('flex', 'w-full', 'max-w-md', 'mx-auto', 'relative');
        
        const searchInput = searchForm.querySelector('input[type="search"]');
        if (searchInput) {
            searchInput.classList.add('w-full', 'px-4', 'py-2', 'rounded-lg', 'border', 'border-gray-700', 'bg-gray-800/50', 'focus:outline-none', 'focus:ring-2', 'focus:ring-red-500/50', 'text-sm');
            searchInput.setAttribute('placeholder', '<?php echo esc_attr_x('Rechercher...', 'placeholder', 'info_gaucho'); ?>');
        }
        
        const searchButton = searchForm.querySelector('input[type="submit"]');
        if (searchButton) {
            // Replace submit button with styled button
            const newButton = document.createElement('button');
            newButton.type = 'submit';
            newButton.classList.add('absolute', 'right-2', 'top-1/2', '-translate-y-1/2', 'text-red-500', 'hover:text-red-400');
            newButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>';
            searchButton.parentNode.replaceChild(newButton, searchButton);
        }
    }
});
</script>

<?php
get_footer();