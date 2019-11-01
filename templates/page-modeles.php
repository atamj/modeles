<?php
/*
 Template Name: Page Modèles
*/

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
?>
<?php get_header();

    ?>
    <section id="sec-filtres">
        <?php
        form();
        ?>

    </section>
    <section id="sec-modeles">
        <?php

        $args = [
            'post_type' => 'modeles',
            'post_per_pages' => -1
        ];
        $query_modeles = new WP_Query( $args );
        if ($query_modeles->have_posts()){
            echo "<div class='grid'>";
            while ($query_modeles->have_posts() ){
                $query_modeles->the_post();
                echo "<div>";
                the_post_thumbnail( 'thumbnail' );
                echo "</div>";
            }
            echo "</div>";
        }

        if(isset($_GET['modeles'])){
            echo "<h1>bonjours</h1>";
        }
        ?>
    </section>
    <section id="content" <?php Avada()->layout->add_class( 'content_class' ); ?> <?php Avada()->layout->add_style( 'content_style' ); ?>>
        <?php if ( category_description() ) : ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class( 'fusion-archive-description' ); ?>>
                <div class="post-content">
                    <?php echo category_description(); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php get_template_part( 'templates/blog', 'layout' ); ?>
    </section>
    <?php

get_footer();