<?php
get_header(); ?>
    <div class="front-page__stage">
        <?php include('templates/partials/stage.php'); ?>
        <button type="button" class="front-page__div-btn">En savoir plus sur notre mission</button>
    </div>

<?php include('templates/flexible.php'); ?>

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
    <h2 class="activities__title">Nos futures activités</h2>
    <section class="activities">
        <?php if ($future_activities->have_posts()) :
            while ($future_activities->have_posts()) : $future_activities->the_post(); ?>
                <div tabindex="0" class="activity__card">
                    <a class="activity__card-link-sro" href="<?= get_the_permalink(); ?>"
                       title="Voir cette activité">
                        <div class="activity__card-text-container">
                            <img class="activity__card-image" src="<?= get_the_post_thumbnail_url(); ?>" alt=""
                                 width="300" height="300">
                            <h3 class="activity__card-title"><?= get_the_title(); ?></h3>
                            <p class="activity__card-link">Voir l’activité</p>
                        </div>
                    </a>
                </div>
            <?php endwhile;
            wp_reset_postdata(); endif; ?>
    </section>

<?php get_footer(); ?>