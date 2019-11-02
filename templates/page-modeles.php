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
                <option value='maison-cottage'>Jumelé Cottage</option>
                <option value='maison-plein-pied'>Jumelé plein pied</option>
            </select>
            <select name='chambres' id='chambres'>
                <option value='tous'>Tous</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3+'>3 et +</option>
            </select>
            <select name='sbd' id='sdb'>
                <option value='tous'>Tous</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3+'>3 et +</option>
            </select>
            <select name='superficie' id='superficie'>
                <option value='tous'>Tous</option>
                <option value='1000-1400'>1000 à 1400p2</option>
                <option value='1401-1800'>1401 à 1800p2</option>
                <option value='1801+'>1801p2 et +</option>
            </select>
            <button class='btn' type='submit'>Rechercher</button>
        </form>

    </section>

    <section id="sec-modeles"></section>
    <?php

get_footer();