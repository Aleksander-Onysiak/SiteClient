<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <meta http-equiv="x-ua-compatible" content="ie=edge"/>

  <title><?= wp_title('-', false, 'right') . get_bloginfo('name') ?></title>

  <!-- Lien vers ma feuille de style css minifier -->
  <link rel="stylesheet" type="text/css" href="<?= dw_asset('css') ?>">
  <!-- Lien vers mon script js minifier -->
  <script src="<?= dw_asset('js') ?>" defer></script>

  <!-- META BASE -->
  <meta name="description"
        content="Le Vieux Moulin est une ASBL ayant pour activité : Hébergement et accompagnement de jeunes placés."/>
  <meta itemprop="name" content="Le Vieux Moulin - ASBL"/>
  <meta name="author" content="Aleksander Onysiak"/>
  <meta name="keywords" content="ASBL, Hébergement,Aleksander Onysiak, Accompagnement, Jeunes"/>

  <!-- meta OpenGraph -->
  <meta property="og:title" content="<?= get_the_title() ?> - <?= get_bloginfo('name'); ?>"/>
  <meta property="og:description"
        content="Le Vieux Moulin est une ASBL ayant pour activité : Hébergement et accompagnement de jeunes placés."/>
  <meta property="og:locale" content="fr_BE"/>
  <meta property="og:type" content="website"/>
  <meta property="og:site_name" content="Le Vieux Moulin - ASBL"/>
  <meta property="og:url" content="https://vm.aleksanderonysiak.be"/>
  <link rel="canonical" href="https://vm.aleksanderonysiak.be"/>
  <meta property="article:modified_time" content="2025-06-13:00:00+00:00"/>
  <meta name="twitter:site" content="@heardcase"/>
  <meta name="twitter:creator" content="@heardcase"/>

  <!-- FAVICON -->
  <link rel="icon" type="image/png" href="/wp-content/themes/siteclient/src/img/favicon/favicon-96x96.png"
        sizes="96x96"/>
  <link rel="icon" type="image/svg+xml" href="/wp-content/themes/siteclient/src/img/favicon/favicon.svg"/>
  <link rel="shortcut icon" href="/wp-content/themes/siteclient/src/img/favicon/favicon.ico"/>
  <link rel="apple-touch-icon" sizes="180x180"
        href="/wp-content/themes/siteclient/src/img/favicon/apple-touch-icon.png"/>
  <meta name="apple-mobile-web-app-title" content="Le Vieux Moulin - ASBL"/>
  <link rel="manifest" href="/wp-content/themes/siteclient/src/img/favicon/site.webmanifest"/>
</head>
<body>
<h1 class="sr-only"><?= get_the_title() ?></h1>

<?php
$activePage = get_field('active_page');
?>

<header class="header">
  <nav class="nav">
    <h2 class="sr-only nav_h">Menu principal</h2>
    <input type="checkbox" id="menu-toggle" class="nav__toggle"/>
    <label for="menu-toggle" class="nav__burger" aria-label="Ouvrir le menu">
      <span></span><span></span><span></span>
    </label>
    <div class="nav__container">
      <div class="nav__container-top-background">
        <ul class="nav__container-top">
          <?php foreach (dw_get_navigation_links('header-top') as $link): ?>
            <li class="nav__container-top-li">
              <a title="<?= $link->title; ?>" href="<?= $link->href; ?>" <?php if ($link->target !== "") {
                echo "target='$link->target'";
              } ?>
                 class="nav__container-top-a <?= get_the_title() === $link->label ? 'nav__container_link--active-small' : ''; ?> <?= $link->class ?>"><?= $link->label; ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="nav__container-under-background">
        <ul class="nav__container-under">
          <li class="nav__container-li">
            <a href="/" title="Se diriger vers la page d'accueil" class="nav__container-logo-a">
              <img class="nav__container-logo-img" src="/wp-content/themes/siteclient/src/img/img.png" height="64" width="64" alt="">
            </a>
          </li>
          <?php foreach (dw_get_navigation_links('header') as $link): ?>
            <li class="nav__container-li <?= $link->class ?>">
              <a title="<?= $link->title; ?>" href="<?= $link->href; ?>" <?php if ($link->target !== "") {
                echo "target='$link->target'";
              } ?>
                 class="nav__container-a <?= get_the_title() === $link->label ? 'nav__container_link--active' : ''; ?>"><?= $link->label; ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>

<main>
