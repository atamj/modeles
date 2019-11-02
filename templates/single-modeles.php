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
        <div>
            <h1>MODÈLE <?php the_title() ?></h1>
            <ul class="flex">
                <li class="ch"></li>
                <li class="sdb"></li>
                <li class="gar"></li>
                <li class="sup"></li>
            </ul>
        </div>

    </section>
    <section id="content" class="flex">
        <div class="resume">
            <h2><?php the_title() ?></h2>
            <?php the_content() ?>

            <a class="btn" href="#">Contactez</a>
        </div>
        <div class="spec">
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
        <h2>RÉALISATION POUR CE MODÈLE</h2>
       
    </section>

<?php
get_footer();