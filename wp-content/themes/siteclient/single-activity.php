<?php
/* Template Name: Single Activity */
get_header(); ?>
<?php include('templates/partials/stage.php'); ?>
<h1 class="page-project_title"><?= esc_html(get_the_title()); ?></h1>
<div><?php the_content() ?></div>
<section class="activity_section">

    <?php if (have_rows('activity')): ?>
        <?php while (have_rows('activity')): the_row();
            $title = get_sub_field('title');
            $description = get_sub_field('description', false, false);
            $image = get_sub_field('image');
            ?>
            <div class="activity_section_container">
                <div class="activity_section_container_div">
                    <?php if ($title): ?>
                        <h3 class="activity_section_title"><?= esc_html($title); ?></h3>
                    <?php endif; ?>

                    <?php if ($description): ?>
                        <p class="activity_section_description"><?= esc_html($description); ?></p>
                    <?php endif; ?>
                </div>

                <?php if (!empty($image)) : ?>
                    <div class="activity_image_container">
                        <img src="<?= esc_url($image['url']); ?>"
                             alt="<?= esc_attr($image['alt'] ?? $title); ?>"
                             class="activity_section_img">
                    </div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p>Aucune activité trouvée pour cette page.</p>
    <?php endif; ?>
</section>

<section class="front-activities-wrapper">
    <?php
    $activities = new WP_Query([
        'post_type' => 'activity',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'post__not_in' => [get_the_ID()]
    ]);

    if ($activities->have_posts()) :
        ?>
        <div class="front-activity__container">
            <h2 role="heading" aria-level="2" class="front-activity__quote">
                D’autres activités <span>tout aussi intéressantes</span>
            </h2>
        </div>

        <div id="cards" class="front-activities">
            <?php while ($activities->have_posts()) : $activities->the_post(); ?>
                <article tabindex="0" class="front-activity__card">
                    <div class="opacity">
                        <a class="activity__card-link-sro" href="<?= get_permalink(); ?>"
                           title="Ce lien vous amènera vers la page de l'activité">
                            <div class="front-activity__card-text-container">
                                <img class="front-activity__card-image"
                                     src="<?= esc_url(get_the_post_thumbnail_url()); ?>"
                                     alt="<?= esc_attr(get_the_title()); ?>" width="300" height="300">
                                <div class="activity-link">
                                    <h3 role="heading" aria-level="3"
                                        class="front-activity__card-title"><?= esc_html(get_the_title()); ?></h3>
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

<?php get_footer(); ?>
