<?= get_header(); ?>

<?php include('templates/partials/stage.php'); ?>

<h1 class="page-project_title"><?= esc_html(get_the_title()); ?></h1>
<?php the_content(); ?>

<section class="project">
    <?php if (have_rows('projects')): ?>
        <?php while (have_rows('projects')): the_row();


            $title = get_sub_field('title');
            $description = get_sub_field('description');
            $image = get_sub_field('image'); // image ACF (URL)
            ?>
            <div class="project_item">
                <div class="project_content">
                    <?php if ($title): ?>
                        <h3 class="project_content_title"><?= esc_html($title); ?></h3>
                    <?php endif; ?>

                    <?php if ($description): ?>
                        <div class="project_content_description">
                            <?= wp_kses_post($description); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if (!empty($image)) : ?>
                    <div class="project_content_image">
                        <img src="<?= esc_url($image); ?>"
                             alt="<?= esc_attr(get_the_title()); ?>"
                             class="project_content_image-img">
                    </div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p>Aucun contenu trouvé pour ce projet.</p>
    <?php endif; ?>
</section>


<section class="others">
    <?php
    $future_projets = new WP_Query([
        'post_type' => 'project',
        'posts_per_page' => 3,
        'meta_query' => [
            [
                'key' => 'type_projet',
                'value' => 'Futur',
                'compare' => '='
            ]
        ],
        'post_status' => 'publish',
        'post__not_in' => [get_the_ID()] // Exclure le projet actuel
    ]);

    if ($future_projets->have_posts()) :
        ?>
        <div class="front-project__container">
            <h2 role="heading" aria-level="2" class="front-project__quote">
                D’autres projets <span>tout aussi intéressants</span>
            </h2>
        </div>
        <div id="cards" class="other-projects">
            <?php while ($future_projets->have_posts()) : $future_projets->the_post(); ?>
                <article tabindex="0" class="other-project__card">
                    <div class="opacity">
                        <a class="project__card-link-sro" href="<?= get_the_permalink(); ?>"
                           title="Ce lien vous amènera vers la page du projet">
                            <div class="other-project__card-text-container">
                                <img class="other-project__card-image"
                                     src="<?= esc_url(get_the_post_thumbnail_url()); ?>"
                                     alt="<?= esc_attr(get_the_title()); ?>" width="300" height="300">
                                <div class="project-link">
                                    <h3 role="heading" aria-level="3"
                                        class="other-project__card-title"><?= esc_html(get_the_title()); ?></h3>
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
