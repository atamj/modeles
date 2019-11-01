
<?php
/*
Plugin Name:        Page modèles
Description:        Plugin pour la page modèles
Version:            1
Author:             Jaël Atam
Author URI:         portfolio.jaelatam.com
*/
//Création des post de type modèels
function ajout_post_modeles()
{
    // On ajoute ici le code des prochaines étapes
    $labelsModeles = array(
        'name' => "Modèles",
        'singular_name' => "Modèle",
        'add_new' => "Ajouter un modèle",
        'add_new_item' => "Ajouter un modèle",
        'edit_item' => "Modifier un modèle",
        'new_item' => "Nouveau modèle",
        'all_items' => "Tous les modèles",
        'view_item' => "Voir le modèle",
        'search_items' => "Chercher un modèle",
        'not_found' =>  "Aucun modèle trouvé",
        'menu_name' => "Mes modèles"
    );
    $argModele = array(
        'labels' => $labelsModeles,
        'public' => true,
        'capability_type'    => 'modeles',
        'has_archive' => false,
        'hierarchical' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-admin-multisite',
        'supports' => array('title', 'thumbnail', 'editor', 'revisions', 'page-attributes'),
        'taxonomies' => array('category', 'post_tag'),
    );
    register_post_type('modeles', $argModele);
}
add_action( 'init', 'ajout_post_modeles');

//Enregistrement du css et js du plugin
function register(){

    wp_register_style( 'modeles', plugins_url( 'css/modeles.css', __FILE__ ) );
    wp_enqueue_style( 'modeles' );
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', false, '3.4.1', true );
    wp_enqueue_script('jquery');
    wp_register_script('modeles', plugins_url('js/modeles.js', __FILE__), ['jquery'], '1.0.0', true);
    wp_enqueue_script('modeles');

}
add_action('wp_enqueue_scripts', 'register');

//Template personnalisé pour le plugin
function override_template( $page_template )
{
    if (is_page( 'modeles' )) {
        $page_template = dirname( __FILE__ ) . '/templates/page-modeles.php';
    }
    return $page_template;
}
add_filter('template_include', 'override_template');

//Ajoute un rout REST pour les requète ajax
/*function initRoute(){
    register_rest_route('modeles/v1', '/modeles/(?P\d+)', array(
        'methods' => 'GET',
        'callback' => "modeles",
    ));
}
add_action("rest_api_init","initRoute");*/

//Création du formulaire
function form(){
    $html = "<form id='filtres' method='GET'>
                <select name='modeles' id='modeles'>
                    <option value='tous'>Tous</option>
                    <option value='jumele_ct'>Jumelé Cottage</option>
                    <option value='jumele_pp'>Jumelé plein pied</option>
                    <option value='maison_ct'>Jumelé Cottage</option>
                    <option value='maison_pp'>Jumelé plein pied</option>
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
            </form>";
    echo $html;
}

//Requète pour récupérer tout les modèles
function allModeles(){
    $args = [
        'post_type' => 'modeles',
        'post_per_pages' => -1
    ];
    $query_modeles = new WP_Query( $args );
    return $query_modeles;

    
}



function modeles(){
    if(isset($_GET['modeles'])){
       return json_encode($_GET);
    }
    else{

        allModeles();

    }
}