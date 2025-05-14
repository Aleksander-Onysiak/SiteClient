<?php /* Template Name: Template "Mes projets" */ ?>

<?= get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div><?php the_content(); ?></div>
<?php endwhile; endif; ?>

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

<h1 role="heading" aria-level="1" class="projects__main_title">Tous nos projets</h1>

<section class="projects">
    <h2 class="projects__title">Nos futurs projets</h2>
    <?php if ($future_projets->have_posts()) :
        while ($future_projets->have_posts()) : $future_projets->the_post(); ?>
            <article tabindex="0" class="project__card">
                <div class="opacity">
                    <a class="project__card-link-sro" href="<?= get_the_permalink(); ?>" title="Ce lien vous amènera vers la page du projet">
                        <div class="project__card-text-container">
                            <img class="project__card-image" src="<?= get_the_post_thumbnail_url() ?>" alt="" width="300" height="300">
                            <h2 role="heading" aria-level="3" class="project__card-title"><?= get_the_title(); ?></h2>
                            <p class="project__card-link">Voir le projet</p>
                        </div>
                    </a>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); endif; ?>
</section>

<section class="projects">
    <h2 class="projects__title">Nos anciens projets</h2>
    <?php if ($anciens_projets->have_posts()) :
        while ($anciens_projets->have_posts()) : $anciens_projets->the_post(); ?>
            <article tabindex="0" class="project__card">
                <div class="opacity">
                    <a class="project__card-link-sro" href="<?= get_the_permalink(); ?>" title="Ce lien vous amènera vers la page du projet">
                        <div class="project__card-text-container">
                            <img class="project__card-image" src="<?= get_the_post_thumbnail_url() ?>" alt="" width="300" height="300">
                            <h2 role="heading" aria-level="3" class="project__card-title"><?= get_the_title(); ?></h2>
                            <p class="project__card-link">Voir le projet</p>
                        </div>
                    </a>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); endif; ?>
</section>

<?= get_footer(); ?>
