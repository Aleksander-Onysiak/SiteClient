<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- Favicon standard -->
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon_pack/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon_pack/favicon-16x16.png">
    <link rel="shortcut icon" href="/favicon_pack/favicon.ico">

    <!-- Apple -->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon_pack/apple-touch-icon.png">

    <!-- Android / PWA -->
    <link rel="manifest" href="/favicon_pack/site.webmanifest">
    <meta name="theme-color" content="#ffffff">

    <!-- Windows -->
    <meta name="le_vieux_moulin-TileColor" content="#ffffff">
    <meta name="le_vieux_moulin-config" content="/browserconfig.xml">

    <title><?= wp_title('-', false, 'right') . get_bloginfo('name') ?></title>
    <link rel="stylesheet"  type="text/css" href="<?= dw_asset('css') ?>">
    <script src="<?= dw_asset('js') ?>" defer></script>
    <?php wp_head(); ?>
</head>
<body>
<h1 class="sr-only">Le Vieux Moulin</h1>

<header>
    <nav class="nav">
        <h2 class="sr-only">Navigation principale</h2>
        <?php
        wp_nav_menu([
            'theme_location' => 'header',
            'menu_class' => 'nav__container',
            'container' => false,
            'depth' => 2,
            'walker' => new Custom_Walker_Nav_Menu()
        ]);
        ?>
    </nav>
</header>
<main>
