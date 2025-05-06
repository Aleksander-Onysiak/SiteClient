<?php /* Template Name: Template "Nos projets" */ ?>

<?= get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div><?php the_content(); ?></div>
<?php endwhile; else : ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

<?php
$future_projects = new WP_Query([
    'post_type' => 'projets',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'meta_query' => [
        [
            'key' => 'type_projet', // Champ ACF
            'value' => 'futur',
            'compare' => '='
        ]
    ]
]);

$old_projects = new WP_Query([
    'post_type' => 'projets',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'meta_query' => [
        [
            'key' => 'type_projet', // Champ ACF
            'value' => 'ancien',
            'compare' => '='
        ]
    ]
]);
?>

<div>
    <p role="heading" aria-level="2" class="projects__main">Tous nos projets</p>
</div>

<section id="future-cards" class="projects">
    <h2 role="heading" aria-level="2" class="projects__title">Nos futurs projets</h2>
    <?php if ($future_projects->have_posts()) :
        while ($future_projects->have_posts()) : $future_projects->the_post(); ?>
            <article tabindex="0" class="project__card">
                <div class="opacity">
                    <a class="project__card-link-sro" href="<?= get_the_permalink(); ?>"
                       title="Ce lien vous amènera vers la page du projet">
                        <div class="project__card-text-container">
                            <img class="project__card-image" src="<?= get_the_post_thumbnail_url(); ?>" alt=""
                                 width="300" height="300">
                            <h3 role="heading" aria-level="3" class="project__card-title"><?= get_the_title(); ?></h3>
                            <p class="project__card-link">Voir le projet</p>
                        </div>
                    </a>
                </div>
            </article>
        <?php endwhile;
        wp_reset_postdata();
    else : ?>
        <p>Aucun projet futur trouvé.</p>
    <?php endif; ?>
</section>

<section id="old-cards" class="projects">
    <h2 role="heading" aria-level="2" class="projects__title">Nos anciens projets</h2>
    <?php if ($old_projects->have_posts()) :
        while ($old_projects->have_posts()) : $old_projects->the_post(); ?>
            <article tabindex="0" class="project__card">
                <div class="opacity">
                    <a class="project__card-link-sro" href="<?= get_the_permalink(); ?>"
                       title="Ce lien vous amènera vers la page du projet">
                        <div class="project__card-text-container">
                            <img class="project__card-image" src="<?= get_the_post_thumbnail_url(); ?>" alt=""
                                 width="300" height="300">
                            <h3 role="heading" aria-level="3" class="project__card-title"><?= get_the_title(); ?></h3>
                            <p class="project__card-link">Voir le projet</p>
                        </div>
                    </a>
                </div>
            </article>
        <?php endwhile;
        wp_reset_postdata();
    else : ?>
        <p>Aucun projet ancien trouvé.</p>
    <?php endif; ?>
</section>

<?= get_footer(); ?>
