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
<header class="activity__header">
    <h1 role="heading" aria-level="1" class="template_activities__title">Toutes nos activités</h1>
</header>
<section class="template_activities">
    <?php if ($activities->have_posts()) : ?>
        <?php while ($activities->have_posts()) : $activities->the_post(); ?>
            <div tabindex="0" class="template_activity__card">
                <a class="template_activity__card-link-container" href="<?= esc_url(get_the_permalink()); ?>"
                   title="Voir cette activité">
                    <div class="template_activity__card-text-container">
                        <?= get_the_post_thumbnail(null, 'medium', [
                            'class' => 'template_activity__card-image',
                            'alt' => esc_attr(get_the_title())
                        ]); ?>
                        <h3 class="template_activity__card-title"><?= esc_html(get_the_title()); ?></h3>
                        <p class="template_activity__card-link">Voir l’activité</p>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>Aucune activité trouvée.</p>
    <?php endif; ?>
</section>


<?= get_footer(); ?>
