<?php /* Template Name: Template "Nos projets" */ ?>

<?= get_header(); ?>

<?php include('templates/partials/stage.php'); ?>

<?php
$future_projets = new WP_Query([
  'post_type' => 'project',
  'posts_per_page' => 5,
  'post_status' => 'publish',
  'lang' => '',
  'meta_query' => [
    [
      'key' => 'type_projet',
      'value' => 'Futur',
      'compare' => '='
    ]
  ]
]);

$anciens_projets = new WP_Query([
  'post_type' => 'project',
  'posts_per_page' => 5,
  'post_status' => 'publish',
  'lang' => '',
  'meta_query' => [
    [
      'key' => 'type_projet',
      'value' => 'Ancien',
      'compare' => '='
    ]
  ]
]);
?>

<section class="front_activities">
  <h2 role="heading" aria-level="2" class="front_activities__title">Nos futurs projets</h2>
  <p class="front_activities__description">Toujours à l’écoute des envies et des idées de chacun, de nouveaux projets prennent régulièrement forme au Vieux Moulin. Ces initiatives sont pensées pour répondre aux besoins actuels, encourager l’autonomie et créer des moments de partage et de découverte dans un cadre bienveillant.</p>
  <div class="front_activities__wrapper">
    <?php if ($future_projets->have_posts()) :
      while ($future_projets->have_posts()) : $future_projets->the_post(); ?>
        <article tabindex="0" class="front_activity__card front_activity__card--blue">
          <div class="front_activity__card-text-container">
            <img class="front_activity__card-image" src="<?= get_the_post_thumbnail_url() ?>" alt=""
                 width="300" height="300">
            <h3 role="heading" aria-level="3"
                class="front_activity__card-title"><?= get_the_title(); ?></h3>
            <div class="front_activity__card-excrept"><?= get_the_excerpt(); ?></div>
            <p class="front_activity__card-link front_activity__card-link--blue">Voir le projet</p>
          </div>
          <a class="front_activity__card-link-sro" href="<?= get_the_permalink(); ?>"
             title="Ce lien vous amènera vers la page du projet">
            Vers la page du projet
          </a>
        </article>
      <?php endwhile;
      wp_reset_postdata(); endif; ?>
  </div>
</section>

<section class="front_activities">
  <h2 role="heading" aria-level="2" class="front_activities__title">Nos anciens projets</h2>
  <p class="front_activities__description">Au fil des années, de nombreux projets ont vu le jour au Vieux Moulin. Qu’ils soient artistiques, culturels ou solidaires, ces initiatives ont laissé leur empreinte et continuent d’inspirer la vie de l’établissement. Ils témoignent de la créativité, de l’engagement et de la richesse des rencontres qui nous animent.</p>
  <div class="front_activities__wrapper">
    <?php if ($anciens_projets->have_posts()) :
      while ($anciens_projets->have_posts()) : $anciens_projets->the_post(); ?>
        <article tabindex="0" class="front_activity__card front_activity__card--red">
            <div class="front_activity__card-text-container">
              <img class="front_activity__card-image" src="<?= get_the_post_thumbnail_url() ?>" alt=""
                   width="300" height="300">
              <h3 role="heading" aria-level="3"
                  class="front_activity__card-title"><?= get_the_title(); ?></h3>
              <p class="front_activity__card-excrept"><?= get_the_excerpt(); ?></p>
              <p class="front_activity__card-link front_activity__card-link--red">Voir le projet</p>
            </div>
          <a class="front_activity__card-link-sro" href="<?= get_the_permalink(); ?>"
             title="Ce lien vous amènera vers la page du projet">
            Vers la page du projet
          </a>
        </article>
      <?php endwhile;
      wp_reset_postdata(); endif; ?>
  </div>
</section>

<?php include('templates/flexible.php'); ?>

<?= get_footer(); ?>
