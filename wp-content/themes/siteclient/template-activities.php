<?php /* Template Name: Template "Mes activités" */ ?>

<?= get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div><?php the_content(); ?></div>
<?php endwhile; endif; ?>

<?php
// Activités futures
$future_activities = new WP_Query([
    'post_type' => 'activity',
    'posts_per_page' => 5,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'meta_query' => [
        [
            'key' => 'type_activite',
            'value' => 'Futur',
            'compare' => '='
        ]
    ]
]);

// Anciennes activités
$past_activities = new WP_Query([
    'post_type' => 'activity',
    'posts_per_page' => 5,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'meta_query' => [
        [
            'key' => 'type_activite',
            'value' => 'Ancien',
            'compare' => '='
        ]
    ]
]);
?>

<h1 role="heading" aria-level="1" class="projects__main_title">Toutes nos activités</h1>

<section class="activities">
    <h2 class="activities__title">Nos futures activités</h2>
    <?php if ($future_activities->have_posts()) :
        while ($future_activities->have_posts()) : $future_activities->the_post(); ?>
            <article tabindex="0" class="activity__card">
                <div class="opacity">
                    <a class="activity__card-link-sro" href="<?= get_the_permalink(); ?>" title="Voir cette activité">
                        <div class="activity__card-text-container">
                            <img class="activity__card-image" src="<?= get_the_post_thumbnail_url(); ?>" alt="" width="300" height="300">
                            <h2 class="activity__card-title"><?= get_the_title(); ?></h2>
                            <p class="activity__card-link">Voir l’activité</p>
                        </div>
                    </a>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); endif; ?>
</section>

<section class="activities">
    <h2 class="activities__title">Nos anciennes activités</h2>
    <?php if ($past_activities->have_posts()) :
        while ($past_activities->have_posts()) : $past_activities->the_post(); ?>
            <article tabindex="0" class="activity__card">
                <div class="opacity">
                    <a class="activity__card-link-sro" href="<?= get_the_permalink(); ?>" title="Voir cette activité">
                        <div class="activity__card-text-container">
                            <img class="activity__card-image" src="<?= get_the_post_thumbnail_url(); ?>" alt="" width="300" height="300">
                            <h2 class="activity__card-title"><?= get_the_title(); ?></h2>
                            <p class="activity__card-link">Voir l’activité</p>
                        </div>
                    </a>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); endif; ?>
</section>

<?= get_footer(); ?>
