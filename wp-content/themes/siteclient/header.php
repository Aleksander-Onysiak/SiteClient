<!DOCTYPE html>
<html lang="fr">
<head>
    <meta>
    <title><?= wp_title('-', false, 'right') . get_bloginfo('name') ?></title>
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
    <script src="<?= dw_asset('js') ?>" defer></script>
    <?php wp_head(); ?>
</head>
<body>
<h1 class="sr-only">Le Vieux Moulin</h1>
<header>
    <nav class="nav">
        <h2 class="sr-only">Navigation principale</h2>
        <ul class="nav__container">
            <?php foreach (dw_get_navigation_links('header') as $link): ?>
                <li class="nav__container_item">
                    <a href="<?= $link->href; ?>" class="nav__container_link "><?= $link->label; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

    </nav>
</header>
<main>