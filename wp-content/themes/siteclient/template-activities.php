<?php /* Template Name: Template "Nos activités" */ ?>

<?= get_header(); ?>

<?php include('templates/partials/stage.php'); ?>

<?php
// Activités futures
$activities = new WP_Query([
  'post_type' => 'activity',
  'posts_per_page' => -1,
  'post_status' => 'publish',
  'order by' => 'date',
  'order' => 'ASC',
]);
?>
<section class="front_activities">
  <h2 role="heading" aria-level="2" class="front_activities__title">Toutes nos activités</h2>
  <p class="front_activities__description">Au Vieux Moulin, les activités occupent une place centrale dans la vie quotidienne. Elles sont pensées pour répondre aux besoins et aux envies de chacun, en favorisant l’autonomie, l’épanouissement personnel et la convivialité. Qu’elles soient créatives, sportives, culturelles ou liées à la vie quotidienne, toutes contribuent à renforcer la confiance en soi, le bien-être et le plaisir de vivre ensemble. Cette diversité permet à chaque personne de découvrir, d’apprendre et de s’impliquer à son rythme dans un environnement respectueux et bienveillant.</p>
  <div class="front_activities__wrapper">
    <?php if ($activities->have_posts()) : ?>
      <?php while ($activities->have_posts()) : $activities->the_post(); ?>
        <article tabindex="0" class="front_activity__card">
          <div class="front_activity__card-text-container">
            <?= get_the_post_thumbnail(null, 'medium', [
              'class' => 'front_activity__card-image',
              'alt' => esc_attr(get_the_title())
            ]); ?>
            <h3 class="front_activity__card-title"><?= esc_html(get_the_title()); ?></h3>
            <p class="front_activity__card-link">Voir l’activité</p>
          </div>
          <a class="front_activity__card-link-sro" href="<?= esc_url(get_the_permalink()); ?>"
             title="Voir cette activité">
            Voir cette activité
          </a>
        </article>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <p>Aucune activité trouvée.</p>
    <?php endif; ?>
  </div>
</section>

<?php include('templates/flexible.php'); ?>

<?= get_footer(); ?>
