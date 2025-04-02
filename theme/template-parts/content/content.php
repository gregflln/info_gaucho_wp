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
    
    <?php  /* 
	<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
    */
    ?>
    <div>
	
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
        <?php
        get_template_part( 'template-parts/content/content', 'excerpt' );
        ?>
		
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