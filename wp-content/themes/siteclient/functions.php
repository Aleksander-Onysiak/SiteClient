<?php

use SiteClient_Theme\Forms\ContactForm;

function hdc_trad_load_textdomain(): void
{
    load_theme_textdomain('hdc-trad', get_template_directory() . '/locales');
}

add_action('init', 'init_remove_support', 100);
function init_remove_support()
{
    remove_post_type_support('post', 'editor');
    remove_post_type_support('page', 'editor');
    remove_post_type_support('product', 'editor');
}

// Permet d'ajouter la possibilité d'uploader des extensions de fichiers non compatibles de base.
// Exemple : ici nous ajoutons le format SVG en tant que type d'image compatible pour l'upload.
function my_own_mime_types($mimes)
{
    // Ajout du mime type pour les fichiers SVG
    $mimes['svg'] = 'image/svg+xml';

    // Retourne le tableau des types MIME mis à jour
    return $mimes;
}

// Ajoute notre fonction de filtrage à l'action 'upload_mimes' pour permettre l'upload des fichiers SVG.
add_filter('upload_mimes', 'my_own_mime_types');

register_taxonomy('project_type', ['project'], [
    'labels' => [
        'name' => 'Types de projets',
        'singular_name' => 'Type de projet',
        'menu_name' => 'Types de projet',
        'all_items' => 'Tous les types',
        'edit_item' => 'Modifier le projet',
        'view_item' => 'Voir le type',
        'update_item' => 'Mettre à jour le type',
        'add_new_item' => 'Ajouter un nouveau type',
        'new_item_name' => 'Nom du nouveau type',
        'search_items' => 'Rechercher un type',
        'not_found' => 'Aucun type trouvé',
    ],
    'description' => 'Projets Design Web',
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_tagcloud' => false,
    'rewrite' => ['slug' => 'type-projet'],
]);


add_action('after_setup_theme', 'hdc_trad_load_textdomain');

function __hdc(string $translation, array $replacements = [])
{
    $base = __($translation, 'hdc-trad');

    foreach ($replacements as $key => $value) {
        $variable = ':' . $key;
        $base = str_replace($variable, $value, $base);
    }
    return $base;
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once(__DIR__ . '/forms/ContactForm.php');

function dw_handle_contact_form_submit()
{
    (new SiteClient_Theme\Forms\ContactForm())
        ->rule('name', 'required')
        ->rule('email', 'required')
        ->rule('email', 'valid_email')
        ->rule('subject', 'required')
        ->rule('message', 'required')
        ->rule('message', 'no_test')
        ->sanitize('name', 'sanitize_text_field')
        ->sanitize('email', 'sanitize_text_field')
        ->sanitize('subject', 'sanitize_text_field')
        ->sanitize('message', 'sanitize_text_field')
        ->handle($_POST);
}

//function __hepl(string $key): string
//{
//    return __($key, 'hepl-trad');
//}
//Disable Wordpress' default Gutenberg Editor:
add_filter('use_block_editor_for_post', '__return_false', 10);
// Disable Gutenberg on the back end.
add_filter('use_block_editor_for_post', '__return_false');
// Disable Gutenberg for widgets.
add_filter('use_widgets_block_editor', '__return_false');
add_action('wp_enqueue_scripts', function () {
    // Remove CSS on the front end.
    wp_dequeue_style('wp-block-library');
    // Remove Gutenberg theme.
    wp_dequeue_style('wp-block-library-theme');
    // Remove inline global CSS on the front end.
    wp_dequeue_style('global-styles');
}, 20);

add_theme_support('post-thumbnails', ['project', 'activity']);

register_post_type('project', [
        'label' => 'Projets',
        'description' => 'Description des projets',
        'public' => true,
        'hierarchical' => 6,
        'menu_icon' => 'dashicons-welcome-view-site',
        'show_in_nav_menus' => true,
        'rewrite' => ['slug' => 'projets'],
        'has_archive' => true,
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail',
        ],
    ]
);

register_post_type('activity', [
    'label' => 'Activities',
    'description' => 'Description des activités',
    'public' => true,
    'hierarchical' => false, // Corrigé : 'hierarchic' → 'hierarchical' (booléen, pas un entier)
    'menu_icon' => 'dashicons-welcome-view-site',
    'show_in_nav_menus' => true,
    'rewrite' => ['slug' => 'activites'], // sans accent pour éviter les bugs d'URL
    'has_archive' => true,
    'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
]);


// Charger les champs ACF exportés

// Activer l'utilisation des vignettes (image de couverture) sur nos post types:

function dw_contact_form_controller()
{
    new ContactForm($_POST);
}

add_action('admin_post_custom_contact_form', 'dw_contact_form_controller');

//enregistrer un menu de navigation, en fonction de l'endroit où ils sont exploités façon wordpress

register_nav_menu('header', 'Main navigation');
// Créer une nouvelle fonction qui permet de retourner un menu de navigation formaté en un
// tableau d'objets afin de pouvoir l'afficher à notre guise dans le templates.

function dw_get_navigation_links(string $location): array
{
    // Récupérer l'objet WP pour le menu à la location $location
    $locations = get_nav_menu_locations();

    if (!isset($locations[$location])) {
        return [];
    }

    $nav_id = $locations[$location];
    $nav = wp_get_nav_menu_items($nav_id);

    // Transformer le menu en un tableau de liens, chaque lien étant un objet personnalisé

    $links = [];

    foreach ($nav as $post) {
        $link = new stdClass();
        $link->href = $post->url;
        $link->label = $post->title;

        $links[] = $link;
    }

    // Retourner ce tableau d'objets (liens).

    return $links;
}

//ajouter un formulaire


function create_option_page()
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Site Options',
            'menu_title' => 'Site Settings',
            'menu_slug' => 'site-options',
            'capability' => 'edit_posts',
            'redirect' => false
        ]);

        // Sous-pages
        acf_add_options_sub_page([
            'page_title' => 'Company Settings',
            'menu_title' => 'Company',
            'parent_slug' => 'site-options',
        ]);

        acf_add_options_sub_page([
            'page_title' => 'SEO Settings',
            'menu_title' => 'SEO',
            'parent_slug' => 'site-options',
        ]);
    }
}

add_action('acf/init', 'create_option_page');

$manifestPath = get_theme_file_path('dist/.vite/manifest.json');

if (file_exists($manifestPath)) {
    $manifest = json_decode(file_get_contents($manifestPath), true);

    if (isset($manifest['wp-content/theme/siteclient/src/js/main.js'])) {
        wp_enqueue_script('siteclient', get_theme_file_uri('dist/' . $manifest['wp-content/themes/siteclient/src/js/main.js']['file']), [], null, true);
    }

    if (isset($manifest['wp-content/theme/siteclient/src/css/style.scss'])) {
        wp_enqueue_style('portfolio', get_theme_file_uri('dist/' . $manifest['wp-content/themes/siteclient/src/css/style.scss']['file']));
    }
}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_print_comments');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_generator');

function enqueue_assets_from_vite_manifest(): void
{
    $manifestPath = get_theme_file_path('dist/.vite/manifest.json');

    if (!file_exists($manifestPath)) {
        return;
    }

    $manifest = json_decode(file_get_contents($manifestPath), true);

    $jsKey = 'wp-content/themes/siteclient/dist/assets/main.js';

    $cssKey = 'wp-content/themes/siteclient/src/css/style.scss';

    if (isset($manifest[$jsKey])) {
        wp_enqueue_script(
            'siteclient-main-js',
            get_theme_file_uri('dist/assets/' . $manifest[$jsKey]['file']),
            [],
            null,
            true
        );
    }

    if (isset($manifest[$cssKey])) {
        wp_enqueue_style(
            'siteclient-style',
            get_theme_file_uri('dist/assets/' . $manifest[$cssKey]['file']),
            [],
            null
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_assets_from_vite_manifest');


function dw_asset(string $file): string
{
    $manifestPath = get_theme_file_path('dist/.vite/manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);

        if (isset($manifest['wp-content/themes/siteclient/src/js/main.js']) && $file === 'js') {
            return get_theme_file_uri('dist/' . $manifest['wp-content/themes/siteclient/src/js/main.js']['file']);
        }

        if (isset($manifest['wp-content/themes/siteclient/src/css/style.scss']) && $file === 'css') {
            return get_theme_file_uri('dist/' . $manifest['wp-content/themes/siteclient/src/css/style.scss']['file']);
        }
    }

    return get_template_directory_uri() . '/dist/' . $file;
}

/////
function responsive_image($image, $settings): bool|string
{
    if (empty($image)) {
        return '';
    }

    $image_id = '';

    if (is_numeric($image)) {
        // si c'est un nombre, on considère que cela s'agit d'un ID
        $image_id = $image;
    } elseif (is_array($image) && isset($image['ID'])) {
        // Si c'est un tableau associatif contenant la clé ID, on récupère cet ID
        $image_id = $image['ID'];
    } else {
        // Générer un tag img par défaut
    }

// Récupération des informations de l'image depuis la base de données.
    $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true); // Attribut alt
    $image_post = get_post($image_id); // Object WP_Post de l'image
    $title = $image_post->post_title ?? '';
    $name = $image_post->post_name ?? '';

// Récupération des URLS et attributs pour l'image en taille "full"
// Wordpress génère automatiquement un srcset basé sur les tailles existantes
    $src = wp_get_attachment_image_url($image_id, 'full');
    $srcset = wp_get_attachment_image_srcset($image_id, 'full');
    $sizes = wp_get_attachment_image_sizes($image_id, 'full');

// Gestion de l'attribut de chargement "lazy" ou "eager" selon les paramètres.
    $lazy = $settings['lazy'] ?? 'eager';

// Gestion des classes (si des classes sont fournies dans $settings).
    $classes = '';
    if (!empty($settings['classes'])) {
        $classes = is_array($settings['classes']) ? implode(' ', $settings['classes']) : $settings['classes'];
    }

    ob_start();
    ?>
    <picture>
        <!-- Ici, vous pouvez ajouter manuellement des balises <source> pour d'autres formats (WebP, AVIF, etc.)
             si ces formats sont disponibles via un plugin ou un traitement personnalisé. -->
        <img
                src="<?= esc_url($src) ?>"
                alt="<?= esc_attr($alt) ?>"
                loading="<?= esc_attr($lazy) ?>"
                srcset="<?= esc_attr($srcset) ?>"
                sizes="<?= esc_attr($sizes) ?>"
                class="<?= esc_attr($classes) ?>">
    </picture>
    <?php
    return ob_get_clean();
}

//nav menu
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = [])
    {
        $output .= '<ul class="sub-menu">';
    }

    public function end_lvl(&$output, $depth = 0, $args = [])
    {
        $output .= '</ul>';
    }

    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $classes = empty($item->classes) ? [] : (array)$item->classes;

        $is_current = in_array('current-menu-item', $classes) || in_array('current_page_item', $classes);
        $has_children = in_array('menu-item-has-children', $classes);

        $li_classes = 'nav__container_item' . ($has_children ? ' menu-item-has-children' : '');
        $link_classes = 'nav__container_link' . ($is_current ? ' nav__container_link--active' : '');
        $aria_has_popup = $has_children ? ' aria-haspopup="true" aria-expanded="false"' : '';

        $output .= '<li class="' . esc_attr($li_classes) . '">';
        $output .= '<a href="' . esc_url($item->url) . '" class="' . esc_attr($link_classes) . '"' . $aria_has_popup . '>';
        $output .= esc_html($item->title);
        if ($has_children) {
            $output .= ' <span class="submenu-indicator" aria-hidden="true">▾</span>';
        }
        $output .= '</a>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = [])
    {
        $output .= '</li>';
    }
}
