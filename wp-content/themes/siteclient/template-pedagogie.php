<?php /* Template Name: Template "Notre pédagogie" */ ?>

<?= get_header(); ?>

<?php include('templates/partials/stage.php'); ?>

<?php include('templates/flexible.php'); ?>
<?php include('templates/content/text-media/staff.php'); ?>
<?php include('templates/content/banner/banner.php'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div><?php the_content(); ?></div>
<?php endwhile; endif; ?>

<?php
// Activités futures
$future_activities = new WP_Query([
  'post_type' => 'activity',
  'posts_per_page' => 4,
  'post_status' => 'publish',
  'orderby' => 'date',
  'order' => 'DESC',
]);
?>
<section class="front_activities">
  <h2 class="front_activities__title">Découvrez toutes nos activités!</h2>
  <p class="front_activities__description">Au Vieux Moulin, nous proposons des activités variées pour favoriser l’autonomie, la créativité et le bien-être. Chacun peut s’exprimer, découvrir et partager à son rythme, dans un cadre sécurisant et bienveillant.</p>
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

<?= get_footer(); ?>
