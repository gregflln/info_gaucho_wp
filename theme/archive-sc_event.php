<?php
/**
 * The template for displaying archive pages for the 'sc-envents' post type.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package YourThemeName // Remplacez par le nom de votre thème
 * @version 1.0.0
 */

// Assurez-vous que le thème est en mode sombre si nécessaire globalement
// Vous pourriez avoir une option de thème ou le forcer ici pour cette page spécifique si besoin.
// Exemple: add_filter('body_class', function($classes) { $classes[] = 'dark'; return $classes; });

get_header();
?>

    <?php // Utiliser une couleur de fond sombre pour toute la zone de contenu ?>
    <section id="primary">
		<main id="main">

            <?php if ( have_posts() ) : ?>

                <header class="page-header mb-10 md:mb-12 border-b border-neutral-700 pb-6">
                    <?php
                    // Utilise le nom du Custom Post Type comme titre
                    post_type_archive_title( '<h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-neutral-100 leading-tight">', '</h1>' );

                    // Affiche la description de l'archive si elle existe (définie dans l'admin pour le CPT)
                    the_archive_description( '<div class="archive-description text-base text-neutral-400 mt-3 md:mt-4 max-w-2xl">', '</div>' );
                    ?>
                </header><?php // Grille responsive pour afficher les événements ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();
                        ?>

                        <?php // Utilisation de <article> pour chaque événement ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class('bg-neutral-800 relative rounded-xl shadow-xl overflow-hidden group min-h-[280px] md:min-h-[320px] transition-all duration-300 hover:shadow-primary-500/30'); ?>>
    <?php // Lien sur toute la carte ?>
    <a href="<?php the_permalink(); ?>" class="absolute inset-0 w-full h-full z-20" aria-hidden="true"></a>
    
    <?php // Image en arrière-plan avec overlay ?>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="absolute inset-0 w-full h-full z-0">
            <?php the_post_thumbnail('large', [
                'class' => 'w-full h-full object-cover opacity-30 transition-all duration-500 group-hover:opacity-40 group-hover:scale-105',
                'loading' => 'lazy'
            ]); ?>
            <div class="absolute inset-0 bg-gradient-to-t from-neutral-900 via-neutral-900/90 to-neutral-800/70"></div>
        </div>
    <?php else : ?>
        <div class="absolute inset-0 bg-gradient-to-br from-neutral-800 to-neutral-900"></div>
    <?php endif; ?>

    <div class="relative z-10 p-6 md:p-8 flex flex-col h-full">
        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
            <?php // Titre de l'événement à gauche ?>
            <header class="entry-header order-2 md:order-1 flex-1">
                <?php the_title( '<h2 class="entry-title text-xl md:text-2xl capitalize text-white leading-tight relative z-30"><span class="relative z-30">', '</span></h2>' ); ?>
            </header>
            
            <?php // Date de l'événement en haut à droite ?>
            <div class="event-date-container order-1 md:order-2 md:ml-4 self-start">
                <?php
                // Si vous utilisez Sugar Calendar, vous pouvez extraire la date comme ceci:
                $event = sugar_calendar_get_event( get_the_ID() );
                if ( ! empty( $event ) ) :
                    $start_date = $event->start_date;
                    
                    // Formatage de la date
                    $date_format = get_option( 'date_format' );
                    
                    // Jour et mois séparés pour le design
                    $day = date_i18n( 'j', $start_date );
                    $month = date_i18n( 'M', $start_date );
                    $year = date_i18n( 'Y', $start_date );
                ?>
                    <div class="inline-flex flex-col bg-neutral-900/80 border border-primary-500/30 rounded-lg p-3 text-center shadow-lg relative z-30">
                        <span class="text-primary-400 text-sm font-medium uppercase tracking-wider"><?php echo esc_html( $month ); ?></span>
                        <span class="text-white text-3xl font-bold leading-none"><?php echo esc_html( $day ); ?></span>
                        <span class="text-neutral-400 text-xs font-bold"><?php echo esc_html( $year ); ?></span>
                    </div>
                <?php else : ?>
                    <div class="inline-flex flex-col bg-neutral-900/80 border border-primary-500/30 rounded-lg p-3 text-center shadow-lg relative z-30">
                        <span class="text-primary-400 text-sm font-medium uppercase tracking-wider"><?php echo get_the_date('M'); ?></span>
                        <span class="text-white text-3xl font-bold leading-none"><?php echo get_the_date('j'); ?></span>
                        <span class="text-neutral-400 text-xs font-bold"><?php echo get_the_date('Y'); ?></span>
                    </div>
                <?php endif; ?>
                
                <?php // Emplacement de l'événement, uniquement l'icône ?>
                <?php 
                if ( ! empty( $event ) && ! empty( $event->location ) ) : ?>
                    <div class="mt-3 flex justify-center text-neutral-300 relative z-30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-label="Lieu de l'événement">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php // Footer avec bouton d'action et heure stylisée en bas à droite ?>
        <footer class="bg-primary font-bold uppercase entry-footer mt-auto flex flex-col md:flex-row justify-end items-end">
            <div class="relative z-30">
                <span class="inline-flex items-center justify-center bg-primary-600 text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-neutral-900 focus:ring-primary-500 transition-all duration-200 relative z-30">
                    <?php esc_html_e( 'Voir l\'événement', 'your-theme-text-domain' ); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </span>
            </div>
            
            <?php // Heure stylisée en bas à droite ?>
            <?php if ( ! empty( $event ) && ( ! empty( $event->start_time ) || ! empty( $event->end_time ) ) ) : 
                $time_format = get_option( 'time_format' );
                $start_time = ! empty( $event->start_time ) ? date_i18n( $time_format, strtotime( $event->start_time ) ) : '';
                $end_time = ! empty( $event->end_time ) ? date_i18n( $time_format, strtotime( $event->end_time ) ) : '';
            ?>
                <div class="bg-neutral-900/80 border-l-4 border-primary-500 px-4 py-2 rounded-lg shadow-lg relative z-30 self-end">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-white font-bold">
                            <?php 
                            if ( ! empty( $start_time ) ) {
                                echo esc_html( $start_time );
                                if ( ! empty( $end_time ) ) {
                                    echo ' - ' . esc_html( $end_time );
                                }
                            }
                            ?>
                        </span>
                    </div>
                </div>
            <?php endif; ?>
        </footer>
    </div>
</article>

								<?php endwhile; ?>

                </div><?php
                // === Pagination ===
                // Utilise the_posts_pagination() pour une navigation accessible.
                // Le style par défaut peut nécessiter du CSS additionnel ou une fonction Walker pour être parfaitement intégré à Tailwind.
                echo '<nav class="pagination mt-12 md:mt-16 text-center" aria-label="' . esc_attr__('Pagination des événements', 'your-theme-text-domain') . '">';
                    the_posts_pagination( array(
                        'mid_size'           => 2, // Nombre de numéros de page de chaque côté de la page courante
                        'prev_text'          => sprintf(
                            '<span class="inline-flex items-center px-3 py-1 border border-neutral-700 text-neutral-300 hover:bg-neutral-700 transition-colors duration-200 rounded-md">%s</span>',
                             '&larr; ' . __( 'Précédent', 'your-theme-text-domain' )
                        ),
                        'next_text'          => sprintf(
                            '<span class="inline-flex items-center px-3 py-1 border border-neutral-700 text-neutral-300 hover:bg-neutral-700 transition-colors duration-200 rounded-md">%s</span>',
                            __( 'Suivant', 'your-theme-text-domain' ) . ' &rarr;'
                        ),
                        'screen_reader_text' => __( 'Navigation des événements', 'your-theme-text-domain' ),
                        // Classes ajoutées aux liens de page - ajustez au besoin
                         'before_page_number' => '<span class="inline-flex items-center justify-center w-8 h-8 mx-1 border border-neutral-700 text-neutral-300 hover:bg-neutral-700 transition-colors duration-200 rounded-md">',
                         'after_page_number'  => '</span>',
                         // Pour styler le numéro courant (peut nécessiter plus de CSS car WP ajoute 'current')
                         // Vous pouvez cibler .page-numbers.current en CSS ou utiliser une Walker
                        // 'current_text' => '<span aria-current="page" class="inline-flex items-center justify-center w-8 h-8 mx-1 border border-primary-500 bg-primary-500 text-white rounded-md"></span>', // Tentative de style Tailwind pour 'current'
                    ) );
                echo '</nav>';
                ?>

            <?php else : ?>

                <?php // Section affichée si aucun événement n'est trouvé ?>
                <section class="no-results not-found p-8 bg-neutral-800 rounded-lg shadow-md text-center">
                    <header class="page-header mb-4">
                        <h1 class="text-2xl font-semibold text-neutral-100"><?php esc_html_e( 'Aucun événement trouvé', 'your-theme-text-domain' ); ?></h1>
                    </header><div class="page-content text-neutral-400">
                        <?php if ( is_search() ) : ?>
                            <p><?php esc_html_e( 'Désolé, mais rien ne correspond à vos termes de recherche. Veuillez réessayer avec des mots-clés différents.', 'your-theme-text-domain' ); ?></p>
                            <?php // get_search_form(); // Vous pouvez inclure un formulaire de recherche ici ?>
                        <?php else : ?>
                            <p><?php esc_html_e( 'Il semble que nous ne trouvions pas ce que vous cherchez. Peut-être qu\'une recherche peut aider?', 'your-theme-text-domain' ); ?></p>
                            <?php // get_search_form(); ?>
                        <?php endif; ?>
                    </div></section><?php endif; ?>

        </main></div><?php
// get_sidebar(); // Décommentez si votre thème utilise une sidebar
get_footer();
?>