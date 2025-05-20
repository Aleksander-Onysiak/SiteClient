<?php /* Template Name: Template "Notre pédagogie" */ ?>

<?= get_header(); ?>

<?php include('templates/partials/stage.php'); ?>
<?php include('templates/content/staff/staff.php'); ?>
<?php include('templates/flexible.php'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div><?php the_content(); ?></div>
<?php endwhile; endif; ?>



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

<h1 role="heading" aria-level="1" class="activities_title">Nos dernières activités</h1>

<section class="activities">
    <?php if ($activities->have_posts()) : ?>
        <?php while ($activities->have_posts()) : $activities->the_post(); ?>
            <div tabindex="0" class="activity__card">
                <a class="activity__card-link-container" href="<?= esc_url(get_the_permalink()); ?>"
                   title="Voir cette activité">
                    <div class="activity__card-text-container">
                        <?= get_the_post_thumbnail(null, 'medium', [
                            'class' => 'activity__card-image',
                            'alt' => esc_attr(get_the_title())
                        ]); ?>
                        <h3 class="activity__card-title"><?= esc_html(get_the_title()); ?></h3>
                        <p class="activity__card-link">Voir l’activité</p>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>Aucune activité future trouvée.</p>
    <?php endif; ?>
</section>

<?= get_footer(); ?>
