<?php
/**
 * Template part pour afficher un message en cas d'absence de contenu.
 *
 * @package info_gaucho
 */
?>

<section class="flex flex-col items-center justify-center p-8 text-neutral-100">
    <header class="mb-6 text-center">
        <?php if ( is_search() ) : ?>
            <h1 class="text-2xl font-semibold text-neutral-200">
                <?php echo sprintf( esc_html__( 'Résultats de recherche pour : %s', 'info_gaucho' ), '<span class="text-red-600">' . get_search_query() . '</span>' ); ?>
            </h1>
        <?php else : ?>
            <h1 class="text-2xl font-semibold text-neutral-200"><?php esc_html_e( 'Aucun contenu trouvé', 'info_gaucho' ); ?></h1>
        <?php endif; ?>
    </header>

    <div class="max-w-lg text-neutral-400 text-center">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
            <p class="mb-4">
                <?php esc_html_e( 'Votre site affiche les articles récents sur la page d’accueil, mais aucun article n’a été publié.', 'info_gaucho' ); ?>
            </p>
            <a href="<?php echo esc_url( admin_url( 'edit.php' ) ); ?>" class="inline-block px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded">
                <?php esc_html_e( 'Ajouter un article', 'info_gaucho' ); ?>
            </a>
        <?php elseif ( is_search() ) : ?>
            <p class="mb-4">
                <?php esc_html_e( 'Aucun résultat pour votre recherche. Essayez un autre terme.', 'info_gaucho' ); ?>
            </p>
        <?php else : ?>
            <p class="mb-4">
                <?php esc_html_e( 'Désolé, aucun contenu ne correspond à votre demande.', 'info_gaucho' ); ?>
            </p>
        <?php endif; ?>
    </div>
</section>
