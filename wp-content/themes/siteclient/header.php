<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon & PWA assets... -->
    <link rel="stylesheet" href="<?= dw_asset('css') ?>">
    <script src="<?= dw_asset('js') ?>" defer></script>
    <?php wp_head(); ?>
</head>
<body>
<h1 class="sr-only">Le Vieux Moulin</h1>

<header>
    <nav class="nav">
        <h2 class="sr-only">Navigation principale</h2>

        <input type="checkbox" id="menu-toggle" class="nav__toggle"/>
        <label for="menu-toggle" class="nav__burger" aria-label="Ouvrir le menu">
            <span></span><span></span><span></span>
        </label>

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