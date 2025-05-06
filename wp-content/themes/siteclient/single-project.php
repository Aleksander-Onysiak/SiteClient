<?= get_header(); ?>

<h1 class="page-project_title"><?= esc_html(get_the_title()); ?></h1>

<?php include('templates/partials/stage.php'); ?>

<section class="project_section">
    <?php if (have_rows('projects')): ?>
        <?php while (have_rows('projects')): the_row();

            $title = get_sub_field('title');
            $project_title = get_sub_field('project_title');
            $description = get_sub_field('description');
            $image = get_sub_field('image');       // Image ACF (array)
            ?>
            <div class="project_section_container">
                <div class="project_section_container_div">
                    <?php if ($title): ?>
                        <h3 class="project_section_title"><?= esc_html($title); ?></h3>
                    <?php endif; ?>

                    <?php if ($description): ?>
                        <p class="project_section_description"><?= esc_html($description); ?></p>
                    <?php endif; ?>
                </div>

                <div class="project_image_container">
                    <?php if (!empty($image)) : ?>
                        <img src="<?= esc_url($image['url']); ?>"
                             alt="<?= esc_attr($image['alt'] ?? get_the_title()); ?>"
                             class="project_section_img">
                    <?php endif; ?>

                    <?php if (!empty($image_2)) : ?>
                        <img src="<?= esc_url($image_2['url']); ?>"
                             alt="<?= esc_attr($image_2['alt'] ?? get_the_title()); ?>"
                             class="project_section_img">
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p>Aucun contenu trouvé pour ce projet.</p>
    <?php endif; ?>
</section>

<section>
    <?php
    $projets = new WP_Query([
        'post_type' => 'project',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'post__not_in' => [get_the_ID()] // Exclure le projet actuel
    ]);

    if ($projets->have_posts()) :
        ?>
        <div class="front-project__container">
            <h2 role="heading" aria-level="2" class="front-project__quote">
                D’autres projets <span>tout aussi intéressants</span>
            </h2>
        </div>
        <div id="cards" class="front-projects">
            <?php while ($projets->have_posts()) : $projets->the_post(); ?>
                <article tabindex="0" class="front-project__card">
                    <div class="opacity">
                        <a class="project__card-link-sro" href="<?= get_the_permalink(); ?>"
                           title="Ce lien vous amènera vers la page du projet">
                            <div class="front-project__card-text-container">
                                <img class="front-project__card-image"
                                     src="<?= esc_url(get_the_post_thumbnail_url()); ?>"
                                     alt="<?= esc_attr(get_the_title()); ?>" width="300" height="300">
                                <div class="project-link">
                                    <h3 role="heading" aria-level="3"
                                        class="front-project__card-title"><?= esc_html(get_the_title()); ?></h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
</section>

<?= get_footer(); ?>
