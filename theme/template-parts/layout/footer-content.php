<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package info_gaucho
 */
?>

<footer class="bg-neutral-900 text-neutral-300 border-t border-neutral-800 self-end w-full" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Pied de page</h2>
    
    <div class="container mx-auto px-4 py-8 md:py-12">
        <!-- Section principale -->
        <div class="flex flex-col md:flex-row justify-between gap-8 md:gap-16">
            <!-- Logo et catégories -->
            <div class="space-y-8 md:w-1/2">
                <!-- Logo et description -->
                <div class="space-y-4">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block">
                        <img class="h-16 w-auto" src="/wp-content/uploads/2025/03/Logo-blanc-transparent.png" alt="Logo Info Gaucho">
                    </a>
                    <p class="text-sm text-neutral-400 max-w-sm">
                        Info Gaucho - Actualité militante Orléanaise.
                    </p>
                </div>
                
                <!-- Navigation et infos -->
                <div class="grid grid-cols-2 gap-x-8 gap-y-6">
    <div>
        <h3 class="text-base font-bold text-white mb-4 uppercase tracking-wider">catégories</h3>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'menu-1',
            'container' => false,
            'menu_class' => 'space-y-2',
            'fallback_cb' => false,
            'depth' => 1,
            'link_before' => '<span class="text-neutral-400 hover:text-red-600 transition-colors duration-200">',
            'link_after' => '</span>',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
        ));
        ?>
    </div>

    <div>
        <h3 class="text-base font-bold text-white mb-4 uppercase tracking-wider">informations</h3>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'menu-2',
            'container' => false,
            'menu_class' => 'space-y-2',
            'fallback_cb' => false,
            'depth' => 1,
            'link_before' => '<span class="text-neutral-400 hover:text-red-600 transition-colors duration-200">',
            'link_after' => '</span>',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
        ));
        ?>
    </div>
</div>


            </div>
            
            <!-- Réseaux sociaux et contact -->
            <div class="md:w-1/2 space-y-8">
                <!-- Réseaux sociaux mis en évidence -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-6 uppercase tracking-wider relative inline-block">
                        suivez nous sur nos réseaux !
                        <span class="absolute -bottom-2 left-0 w-1/2 h-1 bg-red-600"></span>
                    </h3>
                    
                    <div class="grid grid-cols-3 sm:grid-cols-6 gap-4">
                        <a href="https://www.instagram.com/infogaucho/" target="_blank" rel="noopener noreferrer" 
                           class="group">
                            <div class="bg-neutral-800 hover:bg-red-600 p-4 rounded-md transition-transform duration-300 transform group-hover:-translate-y-1 flex justify-center items-center">
                                <span class="sr-only">Instagram</span>
                                <img class="h-8 w-8 filter invert" src="/wp-content/uploads/2025/03/1161953_instagram_icon.svg" alt="Instagram">
                            </div>
                        </a>

                        <a href="https://www.tiktok.com/@info.gaucho" target="_blank" rel="noopener noreferrer" 
                           class="group">
                            <div class="bg-neutral-800 hover:bg-red-600 p-4 rounded-md transition-transform duration-300 transform group-hover:-translate-y-1 flex justify-center items-center">
                                <span class="sr-only">TikTok</span>
                                <img class="h-8 w-8 filter invert" src="/wp-content/uploads/2025/03/5588510_editting_multimedia_social-media_tiktok_video_icon.svg" alt="TikTok">
                            </div>
                        </a>

                        <a href="https://www.youtube.com/@infogaucho" target="_blank" rel="noopener noreferrer" 
                           class="group">
                            <div class="bg-neutral-800 hover:bg-red-600 p-4 rounded-md transition-transform duration-300 transform group-hover:-translate-y-1 flex justify-center items-center">
                                <span class="sr-only">YouTube</span>
                                <img class="h-8 w-8 filter invert" src="/wp-content/uploads/2025/03/5305164_play_video_youtube_youtube-logo_icon.svg" alt="YouTube">
                            </div>
                        </a>

                        <a href="https://x.com/info_gaucho" target="_blank" rel="noopener noreferrer" 
                           class="group">
                            <div class="bg-neutral-800 hover:bg-red-600 p-4 rounded-md transition-transform duration-300 transform group-hover:-translate-y-1 flex justify-center items-center">
                                <span class="sr-only">X (Twitter)</span>
                                <img class="h-8 w-8 filter invert" src="/wp-content/uploads/2025/03/5305170_bird_social-media_social-network_tweet_twitter_icon.svg" alt="X">
                            </div>
                        </a>

                        <a href="https://www.facebook.com/Infogaucho/" target="_blank" rel="noopener noreferrer" 
                           class="group">
                            <div class="bg-neutral-800 hover:bg-red-600 p-4 rounded-md transition-transform duration-300 transform group-hover:-translate-y-1 flex justify-center items-center">
                                <span class="sr-only">Facebook</span>
                                <img class="h-8 w-8 filter invert" src="/wp-content/uploads/2025/03/Facebook-1-Streamline-Plump.svg" alt="Facebook">
                            </div>
                        </a>

                        <a href="https://bsky.app/profile/infogaucho.bsky.social" target="_blank" rel="noopener noreferrer" 
                           class="group">
                            <div class="bg-neutral-800 hover:bg-red-600 p-4 rounded-md transition-transform duration-300 transform group-hover:-translate-y-1 flex justify-center items-center">
                                <span class="sr-only">Bluesky</span>
                                <img class="h-8 w-8 filter invert" src="/wp-content/uploads/2025/03/Bluesky-Streamline-Simple-Icons-1.svg" alt="Bluesky">
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-6 uppercase tracking-wider relative inline-block">
                        vous voulez nous contacter ?
                        <span class="absolute -bottom-2 left-0 w-1/2 h-1 bg-red-600"></span>
                    </h3>
                    
                    <div x-data="{ showTooltip: false }" class="relative mb-6">
                        <button @click="navigator.clipboard.writeText('contact@infogaucho.fr'); showTooltip = true; setTimeout(() => showTooltip = false, 2000)"
                                class="flex items-center space-x-2 text-neutral-300 hover:text-white transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>contact@info-gaucho.fr</span>
                        </button>
                        <div x-show="showTooltip" class="absolute mt-2 px-2 py-1 bg-red-600 text-white text-xs rounded">Copié !</div>
                    </div>
                    
                    <a href="mailto:contact@info-gaucho.fr"
                       class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-6 rounded transform transition-transform duration-300 hover:-translate-y-1 uppercase">
                       envoyez nous un email
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-12 pt-6 text-center border-t border-neutral-800">
            <p class="text-xs text-neutral-500">
                &copy; <?php echo date('Y'); ?> Info Gaucho | Actualité militante Orléanaise | Tous droits réservés
            </p>
        </div>
    </div>
</footer>