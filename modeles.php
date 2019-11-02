
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

    wp_register_script('modeles', plugins_url('js/modeles.js', __FILE__), array('jquery'), '1.0.0', true);
    wp_enqueue_script('modeles');

    /*Pass Ajax Url to modeles.js*/
    wp_localize_script('modeles', 'ajaxurl', admin_url('admin-ajax.php') );

}
add_action('wp_enqueue_scripts', 'register');

add_action('wp_ajax_get_modeles', 'get_modeles');
add_action('wp_ajax_nopriv_get_modeles', 'get_modeles');

function get_modeles(){
    $args = [
        'post_type' => 'modeles',
        'post_per_pages' => -1
    ];

    if (isset($_POST["modeles"]) && !empty($_POST["modeles"]) && $_POST["modeles"] != "tous"){
        $tax_query = ['relation' => 'OR'];
        $tax_query[] = [
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => [$_POST["modeles"]],
        ];
        $args = [
            'post_type' => 'modeles',
            'post_per_pages' => -1,
            'tax_query' => $tax_query,
        ];
    }

    $ajax_query_modeles = new WP_Query( $args );

    echo "<div class='flex'>";
    if ($ajax_query_modeles->have_posts()){
        while ($ajax_query_modeles->have_posts() ){
            $ajax_query_modeles->the_post();
            echo "<div>";
            the_post_thumbnail( 'thumbnail' );
            echo "</div>";
        }
    }
    else{
        echo "Aucun ne résultat ne correspond à la recherche";
    }
    echo "</div>";
    die();
}

//Template personnalisé pour le plugin
function override_template_modeles( $modeles_template )
{
    if (is_page( 'modeles' )) {
        $modeles_template = dirname( __FILE__ ) . '/templates/page-modeles.php';
    }
    return $modeles_template;
}
add_filter('template_include', 'override_template_modeles');


