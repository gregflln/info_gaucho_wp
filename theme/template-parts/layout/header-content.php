
<header x-data="{ mobileMenuOpen: false }" class="bg-neutral-900 text-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center">

            <a href="<?php echo home_url('/'); ?>" class="flex-shrink-0">
                <img src="http://info-gaucho.local/wp-content/uploads/2025/03/Logo-blanc-transparent.png" 
                     alt="<?php bloginfo('name'); ?>" 
                     class="h-16 w-auto"> 
            </a>

            <div class="hidden md:flex items-center space-x-6 lg:space-x-8">
               <!--
                 <nav aria-label="Main navigation">
                   <ul class="flex space-x-6 lg:space-x-8">
                       <li><a href="<?php echo home_url('/reportages/'); ?>" class="text-sm font-medium uppercase hover:text-red-600 transition duration-150 ease-in-out">Reportages</a></li>
                       <li><a href="<?php echo home_url('/interviews/'); ?>" class="text-sm font-medium uppercase hover:text-red-600 transition duration-150 ease-in-out">Interviews</a></li>
                       <li><a href="<?php echo home_url('/carte-blanche/'); ?>" class="text-sm font-medium uppercase hover:text-red-600 transition duration-150 ease-in-out">Carte Blanche</a></li>
                       <li><a href="<?php echo home_url('/agenda/'); ?>" class="text-sm font-medium uppercase hover:text-red-600 transition duration-150 ease-in-out">Agenda</a></li>
                   </ul>
                </nav>
                -->
                <nav aria-label="Main navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1',
                        'container' => false,
                        'menu_class' => 'flex space-x-6 lg:space-x-8',
                        'fallback_cb' => false,
                        'depth' => 1,
                        'link_before' => '<span class="text-sm font-medium uppercase hover:text-red-600 transition duration-150 ease-in-out">',
                        'link_after' => '</span>',
                        'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    ));
                    ?>
                </nav>


                <form action="<?php echo home_url('/'); ?>" method="get" class="relative hidden md:block">
                    <input 
                        placeholder="Rechercher..." 
                        type="text" 
                        name="s" 
                        id="search-desktop"
                        class="rounded-full bg-neutral-800 px-4 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-75 w-48 transition-all duration-300 ease-in-out focus:w-64"
                        value="<?php echo get_search_query(); ?>">
                    <button type="submit" aria-label="Lancer la recherche" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-neutral-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>

            <div class="md:hidden flex items-center">
                <button 
                    @click="mobileMenuOpen = !mobileMenuOpen" 
                    type="button" 
                    class="inline-flex items-center justify-center p-2 rounded-md text-neutral-300 hover:text-white hover:bg-neutral-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" 
                    aria-controls="mobile-menu" 
                    :aria-expanded="mobileMenuOpen.toString()"> 
                    <span class="sr-only">Ouvrir le menu principal</span>
                    <svg x-show="!mobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileMenuOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" style="display: none;"> 
                         <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div 
        x-show="mobileMenuOpen" 
        @click.away="mobileMenuOpen = false" 
        class="md:hidden" 
        id="mobile-menu"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2"
        style="display: none;" 
        > 
        <div class="list-none px-2 pt-2 pb-3 space-y-1 sm:px-3 border-t border-neutral-700">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'menu-1',
        'container' => false,
        'menu_class' => '',
        'fallback_cb' => false,
        'depth' => 1,
        'link_before' => '<span class="block px-3 py-2 rounded-md text-base font-medium text-neutral-300 hover:text-white hover:bg-neutral-700">',
        'link_after' => '</span>',
        'items_wrap' => '%3$s', // Supprime l'enveloppe <ul> inutile
    ));
    ?>
</div>

        <div class="px-4 pb-4 pt-2">
             <form action="<?php echo home_url('/'); ?>" method="get" class="flex">
                <input 
                    placeholder="Rechercher sur le site..." 
                    type="text" 
                    name="s" 
                    id="search-mobile"
                    class="flex-grow rounded-l-md bg-neutral-800 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-75"
                    value="<?php echo get_search_query(); ?>">
                <button type="submit" aria-label="Lancer la recherche" class="rounded-r-md bg-neutral-800 px-3 py-2 text-neutral-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-75">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</header>