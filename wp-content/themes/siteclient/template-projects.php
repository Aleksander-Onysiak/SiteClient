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


<h2 class="template_projects__title">Nos futurs projets</h2>
<section class="template_projects">
    <?php if ($future_projets->have_posts()) :
        while ($future_projets->have_posts()) : $future_projets->the_post(); ?>
            <div tabindex="0" class="template_project__card">
                <a class="template_project__card-link" href="<?= get_the_permalink(); ?>"
                   title="Ce lien vous amènera vers la page du projet">
                    <div class="template_project__card-text-container">
                        <img class="template_project__card-image" src="<?= get_the_post_thumbnail_url() ?>" alt=""
                             width="300" height="300">
                        <h3 role="heading" aria-level="3"
                            class="template_project__card-title"><?= get_the_title(); ?></h3>
                        <p class="template_project__card-link">Voir le projet</p>
                    </div>
                </a>
            </div>
        <?php endwhile;
        wp_reset_postdata(); endif; ?>
</section>

<h2 class="template_projects__title">Nos anciens projets</h2>
<section class="template_projects">

    <?php if ($anciens_projets->have_posts()) :
        while ($anciens_projets->have_posts()) : $anciens_projets->the_post(); ?>
            <div tabindex="0" class="template_project__card">
                <a class="template_project__card-link" href="<?= get_the_permalink(); ?>"
                   title="Ce lien vous amènera vers la page du projet">
                    <div class="template_project__card-text-container">
                        <img class="template_project__card-image" src="<?= get_the_post_thumbnail_url() ?>" alt=""
                             width="300" height="300">
                        <h3 role="heading" aria-level="3"
                            class="template_project__card-title"><?= get_the_title(); ?></h3>
                        <p class="template_project__card-link">Voir le projet</p>
                    </div>
                </a>
            </div>
        <?php endwhile;
        wp_reset_postdata(); endif; ?>
</section>

<?= get_footer(); ?>
