<?php
get_header(); ?>
<?php include('templates/partials/stage.php'); ?>
<section class="activity_header">
  <h2 class="activity_title"><?= esc_html(get_the_title()); ?></h2>
  <div class="activity_description"><?php echo do_shortcode(get_the_content()); ?></div>
</section>

<?php include('templates/flexible.php'); ?>
<?php include('templates/sponsors/sponsor.php'); ?>


<?php
// Activités futures
$future_activities = new WP_Query([
  'post_type' => 'activity',
  'posts_per_page' => 5,
  'post_status' => 'publish',
  'orderby' => 'date',
  'order' => 'DESC',
]);
?>
<section class="front_activities">
  <h2 class="front_activities__title">Nos futures activités</h2><p class="front_activities__description">Au Vieux Moulin, les activités occupent une place centrale dans la vie quotidienne. Elles sont pensées pour répondre aux besoins et aux envies de chacun, en favorisant l’autonomie, l’épanouissement personnel et la convivialité. Qu’elles soient créatives, sportives, culturelles ou liées à la vie quotidienne, toutes contribuent à renforcer la confiance en soi, le bien-être et le plaisir de vivre ensemble. Cette diversité permet à chaque personne de découvrir, d’apprendre et de s’impliquer à son rythme dans un environnement respectueux et bienveillant.</p>
  <div class="front_activities__wrapper">
  <?php if ($future_activities->have_posts()) :
    while ($future_activities->have_posts()) : $future_activities->the_post(); ?>
      <article tabindex="0" class="front_activity__card">
          <div class="front_activity__card-text-container">
            <img class="front_activity__card-image" src="<?= get_the_post_thumbnail_url(); ?>" alt=""
                 width="300" height="300">
            <h3 class="front_activity__card-title"><?= get_the_title(); ?></h3>
            <p class="front_activity__card-link">Voir l’activité</p>
          </div>
        <a class="front_activity__card-link-sro" href="<?= get_the_permalink(); ?>"
           title="Voir cette activité">
          Voir cette activité
        </a>
      </article>
    <?php endwhile;
    wp_reset_postdata(); endif; ?>
  </div>
</section>

<?php get_footer(); ?>
