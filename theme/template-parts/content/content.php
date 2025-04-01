<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package info_gaucho
 */

?>

<?php
// Arguments pour la requête WP_Query pour obtenir les derniers posts
$args = array(
	'post_type'      => 'post',        // On veut des posts (articles)
    'post_status'    => 'publish',     // Seulement les posts publiés
    'posts_per_page' => 6,             // Combien de posts afficher (ajustez si besoin)
    'orderby'        => 'date',        // Trier par date
    'order'          => 'DESC',        // Du plus récent au plus ancien
);

$latest_posts_query = new WP_Query($args);

// La boucle WordPress
if ($latest_posts_query->have_posts()) :
	?>
    
    <?php /* Optionnel : Si vous avez besoin d'une grille ici (remplacez/ajustez grid-cols-* selon vos breakpoints) */ ?>
	<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
	
    <?php while ($latest_posts_query->have_posts()) : $latest_posts_query->the_post(); ?>
        <?php
        // Récupérer la première catégorie
        $categories = get_the_category();
        $category_name = '';
        $category_link = '';
        if (!empty($categories)) {
            // Prend la première catégorie assignée
            $category_name = esc_html($categories[0]->name);
            $category_link = esc_url(get_category_link($categories[0]->term_id));
        }

        // Récupérer l'URL de l'image mise en avant (choisir une taille appropriée, 'medium_large' est souvent un bon compromis)
        // Assurez-vous que cette taille d'image est définie pour être carrée si possible (via add_image_size dans functions.php),
        // sinon l'aspect-ratio CSS fera le travail mais peut couper l'image.
        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
        $fallback_bg_class = 'bg-gray-800'; // Couleur de fond si pas d'image

        ?>
        <article class="group relative block overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 ease-in-out">
            <a href="<?php the_permalink(); ?>" class="block">
                
                <?php // Conteneur pour l'image et les superpositions ?>
                <div class="relative aspect-square w-full <?php echo $thumbnail_url ? '' : esc_attr($fallback_bg_class); ?> bg-cover bg-center"
                     <?php if ($thumbnail_url) : ?>
                         style="background-image: url('<?php echo esc_url($thumbnail_url); ?>');"
                     <?php endif; ?>
                     >

                    <?php // Superposition semi-transparente (optionnel, pour améliorer lisibilité texte) ?>
                    <div class="absolute inset-0 bg-black bg-opacity-10 group-hover:bg-opacity-0 transition-opacity duration-300"></div>

                    <?php // Catégorie en haut à droite ?>
                    <?php if ($category_name) : ?>
                        <div class="absolute top-2 right-2 z-10">
                            <span class="inline-block bg-red-600 text-white text-xs font-medium px-2.5 py-1 rounded-full shadow">
                                <?php echo $category_name; ?>
                            </span>
                            <?php /* // Alternative si vous voulez que la catégorie soit cliquable:
                             <a href="<?php echo $category_link; ?>" class="inline-block bg-red-600 hover:bg-red-700 text-white text-xs font-medium px-2.5 py-1 rounded-full shadow transition-colors duration-200">
                                <?php echo $category_name; ?>
                            </a>
                            */ ?>
                        </div>
                    <?php endif; ?>

                    <?php // Titre en bas centré ?>
                    <div class="absolute bottom-0 left-0 right-0 p-3 z-10 bg-gradient-to-t from-black/80 via-black/60 to-transparent">
                         <h3 class="text-center text-sm sm:text-base font-semibold text-white leading-tight line-clamp-2">
                               <?php the_title(); ?>
                         </h3>
                    </div>
                </div>
            </a>
        </article>
		
		<?php endwhile; ?>

    <?php /* Optionnel : Fin de la div grille */ ?>
    </div>

<?php
    // Restaurer les données originales de la requête globale de WordPress
    wp_reset_postdata();
else :
?>
    <p class="text-center text-gray-400">Aucun article à afficher pour le moment.</p>
<?php
endif;
?>