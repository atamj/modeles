<?php
/*
Plugin Name:        Page modèles
Description:        Plugin pour la page modèles
Version:            1
Author:             Jaël Atam
Author URI:         portfolio.jaelatam.com
*/

/**
 * Class Modele
 */
class Modele
{
    public function __construct()
    {
        /*Ajout de post type modeles*/
        add_action('init', [$this, 'ajout_post_modeles']);

        /*Enregistrement css et js*/
        add_action('wp_enqueue_scripts', [$this, 'register']);

        /*Récupérer les modèles en ajax*/
        add_action('wp_ajax_get_modeles', [$this, 'get_modeles']);
        add_action('wp_ajax_nopriv_get_modeles', [$this, 'get_modeles']);

        /*Changer le template modèle par celui du plugin*/
        add_filter('template_include', [$this,'override_template_modeles']);

    }

    /*Fonction ajout de post type modeles*/
    public function ajout_post_modeles()
    {
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
            'not_found' => "Aucun modèle trouvé",
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
    /*Fonction d'enregistrement css et js*/
    public function register()
    {

        wp_register_style('modeles', plugins_url('css/modeles.css', __FILE__));
        wp_enqueue_style('modeles');

        if (is_page("modeles")){
            wp_register_script('modeles', plugins_url('js/modeles.js', __FILE__), array('jquery'), '1.0.0', true);
            wp_enqueue_script('modeles');
            /*Pass Ajax Url to modeles.js*/
            wp_localize_script('modeles', 'ajaxurl', admin_url('admin-ajax.php'));
        }

    }
    /*Fonction pour récupérer les modèles en ajax*/
    public function get_modeles(){
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

    /*Fonction pour changer le template modèle par celui du plugin*/
    public function override_template_modeles($modeles_template)
    {
        if (is_page('modeles')) {
            $modeles_template = dirname(__FILE__) . '/templates/page-modeles.php';
        }
        return $modeles_template;
    }
}

new Modele();