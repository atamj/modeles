<?php
/*
 Template Name: Page Modèles
*/

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
 get_header();

    ?>
    <section id="sec-filtres">

        <form id='filtres_modeles' method='POST'>
            <select name='modeles' id='modeles'>
                <option value='tous'>Tous</option>
                <option value='jumele-cottage'>Jumelé Cottage</option>
                <option value='jumele-plein-pied'>Jumelé plein pied</option>
                <option value='maison-cottage'>Maison Cottage</option>
                <option value='maison-plein-pied'>Maison plein pied</option>
            </select>
            <select name='chambres' id='chambres'>
                <option value='tous'>Tous</option>
                <option value='1-chambres'>1 Chambre</option>
                <option value='2-chambres'>2 Chambres</option>
                <option value='3-chambres'>3 Chambres et +</option>
            </select>
            <select name='sbd' id='sdb'>
                <option value='tous'>Tous</option>
                <option value='1-sdb'>1 Salle de bain</option>
                <option value='2-sdb'>2 Salles de bain</option>
                <option value='3-sdb'>3 Salles de bain et +</option>
            </select>
            <select name='superficie' id='superficie'>
                <option value='tous'>Tous</option>
                <option value='1000-1400'>1000 à 1400p2</option>
                <option value='1401-1800'>1401 à 1800p2</option>
                <option value='1801p2'>1801p2 et +</option>
            </select>
        </form>

    </section>

    <section id="sec-modeles"></section>
    <?php

get_footer();