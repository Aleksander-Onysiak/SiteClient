<?php /* Template Name: Template "Support" */ ?>

<?php get_header(); ?>

<?php include('templates/partials/stage.php'); ?>
<?php include('templates/flexible.php'); ?>
<?php include('templates/partials/qr.php'); ?>

<?php
// Activités futures
$activities = new WP_Query([
  'post_type' => 'activity',
  'posts_per_page' => 5,
  'post_status' => 'publish',
  'orderby' => 'date',
  'order' => 'DESC',
]);
?>

<section class="front_activities">
  <h2 role="heading" aria-level="2" class="front_activities__title">Découvrez toutes nos activités!</h2>
  <p class="front_activities__description">Au Vieux Moulin, nous proposons des activités variées pour favoriser l’autonomie, la créativité et le bien-être. Chacun peut s’exprimer, découvrir et partager à son rythme, dans un cadre sécurisant et bienveillant.</p>
  <div class="front_activities__wrapper">
    <?php if ($activities->have_posts()) : ?>
      <?php while ($activities->have_posts()) : $activities->the_post(); ?>
        <article tabindex="0" class="front_activity__card">
          <div class="front_activity__card-text-container">
            <img class="front_activity__card-image" src="<?= get_the_post_thumbnail_url() ?>" alt=""
                 width="300" height="300">
            <h3 role="heading" aria-level="3"
                class="front_activity__card-title"><?= get_the_title(); ?></h3>
            <p class="front_activity__card-link">Voir l’activité</p>
          </div>
          <a class="front_activity__card-link-sro" href="<?= get_the_permalink(); ?>"
             title="Ce lien vous amènera vers la page du projet">
            Vers la page de l’activité
          </a>
        </article>
      <?php endwhile;
      wp_reset_postdata(); endif; ?>
  </div>
</section>

<?php
$projets = new WP_Query([
  'post_type' => 'project',
  'posts_per_page' => 5,
  'post_status' => 'publish',
  'lang' => '',
]);
?>

<section class="front_activities">
  <h2 role="heading" aria-level="2" class="front_activities__title">Découvrez tous nos projets!</h2>
  <p class="front_activities__description">Toujours à l’écoute des envies et des idées de chacun, de nouveaux projets prennent régulièrement forme au Vieux Moulin. Ces initiatives sont pensées pour répondre aux besoins actuels, encourager l’autonomie et créer des moments de partage et de découverte dans un cadre bienveillant.</p>
  <div class="front_activities__wrapper">
    <?php if ($projets->have_posts()) :
      while ($projets->have_posts()) : $projets->the_post(); ?>
        <article tabindex="0" class="front_activity__card front_activity__card--blue">
          <div class="front_activity__card-text-container">
            <img class="front_activity__card-image" src="<?= get_the_post_thumbnail_url() ?>" alt=""
                 width="300" height="300">
            <h3 role="heading" aria-level="3"
                class="front_activity__card-title"><?= get_the_title(); ?></h3>
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

<?php get_footer(); ?>
