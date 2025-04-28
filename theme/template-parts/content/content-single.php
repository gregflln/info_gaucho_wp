<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package info_gaucho
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('text-neutral-200'); // Dark background, base text color ?> >

    

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12 max-w-4xl"> <?php // Layout container ?>

    <?php if (has_post_thumbnail()) : ?>
        <div class="mb-8 md:mb-12 lg:mb-16">
             <?php
                // Display the featured image.
                the_post_thumbnail('full', ['class' => 'w-full h-auto object-cover rounded-md shadow-md']);
             ?>
        </div>
    <?php endif; ?>

        <header class="mb-8 md:mb-10">
            <?php the_title('<h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight tracking-tight text-white mb-4 lg:mb-6">', '</h1>'); // Title styling for dark theme ?>

            <?php if (!is_page()) : // Only show meta for posts ?>
                <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-sm text-neutral-400"> <?php // Meta text color for dark theme ?>
                    <span>
                        <time datetime="<?php echo get_the_date(DATE_ISO8601); ?>">
                            <?php echo get_the_date(); ?>
                        </time>
                    </span>
                    <?php if (has_category()) : ?>
                        <span aria-hidden="true">&middot;</span>
                        <span>
                             <?php esc_html_e('In', 'your-theme-textdomain'); ?> <?php the_category(', '); ?>
                        </span>
                    <?php endif; ?>
                     <?php // Optional: Add Reading Time here if needed ?>
                     <?php // Comments link removed ?>
                </div>
            <?php endif; ?>
        </header>

        <div class="entry-content mt-8 lg:mt-12">
            <?php
            // Assumes @tailwindcss/typography plugin with 'prose-invert' for dark mode styling.
            ?>
            <div class="prose prose-lg lg:prose-xl prose-invert max-w-none text-neutral-300 leading-relaxed"> <?php // Apply prose-invert directly, set base text color ?>
                <?php
                the_content();

                wp_link_pages(
                    array(
                        'before'      => '<nav class="mt-10 pt-6 border-t border-neutral-700 flex justify-center space-x-2" aria-label="' . esc_attr__('Page Navigation', 'your-theme-textdomain') . '"><span class="font-medium text-neutral-400 mr-2">' . esc_html__('Pages:', 'your-theme-textdomain') . '</span>', // Dark theme border and text
                        'after'       => '</nav>',
                        'link_before' => '<span class="inline-flex items-center justify-center px-3 py-1 border border-neutral-600 rounded-md text-sm font-medium text-neutral-300 bg-neutral-800 hover:bg-neutral-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">', // Dark theme link styling
                        'link_after'  => '</span>',
                        'pagelink'    => '%',
                        'separator'   => '',
                    )
                );
                ?>
            </div>
        </div>

        <?php if (!is_page()) : // Footer meta only for posts ?>
            <footer class="mt-12 lg:mt-16 pt-8"> <?php // Dark theme border ?>
                <?php if (has_tag()) : ?>
                    <div class="text-sm">
                        <span class="font-semibold text-neutral-300"><?php esc_html_e('Tags:', 'your-theme-textdomain'); ?></span> <?php // Dark theme text ?>
                        <span class="ml-2 text-neutral-400"> <?php // Dark theme text ?>
                            <?php the_tags('', ', ', ''); ?>
                        </span>
                    </div>
                <?php endif; ?>

            </footer>
        <?php endif; ?>

    </div> <?php // End container ?>

    <?php
    // Post Navigation (Previous/Next)
    if (is_singular('post')) :
    ?>
        <nav class="border-t border-neutral-700 px-4 sm:px-6 lg:px-8 py-6 max-w-7xl mx-auto" aria-label="<?php esc_attr_e('Post Navigation', 'your-theme-textdomain'); ?>"> <?php // Dark theme border ?>
            <div class="flex justify-between text-sm font-medium text-red-400"> <?php // Adjusted link color for dark bg ?>
                <div class="text-left">
                    <?php previous_post_link('%link', '<span aria-hidden="true">&larr;</span> %title'); ?>
                </div>
                <div class="text-right">
                    <?php next_post_link('%link', '%title <span aria-hidden="true">&rarr;</span>'); ?>
                </div>
            </div>
        </nav>
    <?php endif; ?>

    <?php // Comments Section Removed ?>

</article>