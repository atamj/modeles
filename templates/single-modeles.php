<?php
/*
 Template Name: Single Modèles
*/

// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
get_header();
?>
    <section id="baniere">

        <?php the_post_thumbnail('full') ?>
        <div class="ban-content flex space-around">
            <div class="w-50">
                <h1>MODÈLE <?php the_title() ?></h1>
                <span><?php the_field('etages') ?> étages</span>
            </div>
            <ul class="flex space-around w-50">
                <li class="ch d-inline-block"><?php the_field('chambres') ?></li>
                <li class="sdb d-inline-block"><?php the_field('salle_de_bain') ?></li>
                <li class="gar d-inline-block"><?php the_field('garages') ?></li>
                <li class="sup d-inline-block"><?php the_field('superficie') ?></li>
            </ul>
        </div>

    </section>
    <section id="sec-content" class="flex">
        <div class="resume w-50 p-2">
            <h2><?php the_title() ?></h2>
            <?php the_content() ?>

            <a class="btn" href="#">Contactez</a>
        </div>
        <div class="spec w-50 p-2">
            <h2>SPÉCIFICATIONS</h2>
            <table>
                <tr>
                    <th>TYPE</th>
                    <td><?php the_field('type') ?></td>
                </tr>
                <tr>
                    <th>STYLE</th>
                    <td><?php the_field('style') ?></td>
                </tr>
                <tr>
                    <th>ÉTAGES</th>
                    <td><?php the_field('etages') ?></td>
                </tr>
                <tr>
                    <th>SUPERFICIE</th>
                    <td><?php the_field('superficie') ?></td>
                </tr>
                <tr>
                    <th>CHAMBRES</th>
                    <td><?php the_field('chambres') ?></td>
                </tr>
                <tr>
                    <th>SALLES DE BAIN</th>
                    <td><?php the_field('salle_de_bain') ?></td>
                </tr>
                <tr>
                    <th>GARAGES</th>
                    <td><?php the_field('garages') ?></td>
                </tr>
            </table>
        </div>
    </section>
    <section id="realisations">
        <div class="contenaire">
            <h2>RÉALISATION POUR CE MODÈLE</h2>
            <?php
            $args = [
                'post_type' => 'modeles',
                'post_per_pages' => -1,
                'tax_query' => [
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => get_field('modeles'),
                ],
            ];
            $query_realisations = new WP_Query($args);

            echo "<ul class='flex'>";
            if ($query_realisations->have_posts()) {
                while ($query_realisations->have_posts()) {
                    $query_realisations->the_post();

                    echo "<li>";

                    echo "<a href='".get_the_post_thumbnail_url()."' data-lightbox='realisations' >";
                    the_post_thumbnail('thumbnail');
                    echo "</li>";
                    echo "</a>";
                }
            }
            ?>
            </ul>
            <a class="btn" href="#">Contactez</a>
        </div>
    </section>

<?php
get_footer();