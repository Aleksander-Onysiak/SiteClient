<?= get_header(); ?>

<?php include('templates/partials/stage.php'); ?>

<section class="project">
    <h2 class="page-project_title"><?= esc_html(get_the_title()); ?></h2>
    <?php if (have_rows('projects')): ?>
        <?php while (have_rows('projects')): the_row();
            $title = get_sub_field('title');
            $description = get_sub_field('description', false, false);
            $image = get_sub_field('image');
            ?>
            <article class="project_item">
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
            </article>
        <?php endwhile; ?>
    <?php else : ?>
    <?php endif; ?>
</section>

<?php include('templates/flexible.php'); ?>

<?php if (have_rows('sponsors-section')): ?>
    <section class="sponsors-section">
        <?php while (have_rows('sponsors-section')): the_row();
            $title = get_sub_field('sponsors-header');
            $sponsor_description = get_sub_field('sponsor-description');
            $sponsors = get_sub_field('sponsors');

            if ($title): ?>
                <h2 class="sponsors-header"><?= esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if ($sponsor_description): ?>
                <p class="sponsors-description"><?= esc_html($sponsor_description); ?></p>
            <?php endif; ?>

            <?php if (have_rows('sponsors')): ?>
                <div class="sponsors-container">
                    <?php while (have_rows('sponsors')): the_row();
                        $logo = get_sub_field('sponsor-image');
                        $link = get_sub_field('sponsor-link');
                        ?>
                        <?php if ($logo || $link): ?>
                            <div class="sponsor-card">
                                <a class="sponsor-card__link"
                                   href="<?= esc_url($link); ?>"
                                   title="Ce lien vous amènera vers la page du sponsor">
                                    <?php if (!empty($logo)): ?>
                                        <div class="sponsor-card-logo">
                                            <img src="<?= esc_url($logo['url']); ?>"
                                                 alt="<?= esc_attr($logo['alt']); ?>"
                                                 class="sponsor-card__logo-img">
                                        </div>
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </section>
<?php else: ?>

<?php endif; ?>

<?php
    $future_projets = new WP_Query([
        'post_type' => 'project',
        'posts_per_page' => 5,
        'meta_query' => [
            [
                'key' => 'type_projet',
                'value' => 'Futur',
                'compare' => '='
            ]
        ],
        'post_status' => 'publish',
    ]);
        ?>
<section class="front_activities">
  <h2 role="heading" aria-level="2" class="front_activities__title">Nos futurs projets</h2>
  <p class="front_activities__description">Toujours à l’écoute des envies et des idées de chacun, de nouveaux projets prennent régulièrement forme au Vieux Moulin. Ces initiatives sont pensées pour répondre aux besoins actuels, encourager l’autonomie et créer des moments de partage et de découverte dans un cadre bienveillant.</p>
  <div class="front_activities__wrapper">
    <?php if ($future_projets->have_posts()) :
      while ($future_projets->have_posts()) : $future_projets->the_post(); ?>
        <article tabindex="0" class="front_activity__card front_activity__card--blue">
          <div class="front_activity__card-text-container">
            <img class="front_activity__card-image" src="<?= get_the_post_thumbnail_url() ?>" alt=""
                 width="300" height="300">
            <h3 role="heading" aria-level="3"
                class="front_activity__card-title"><?= get_the_title(); ?></h3>
            <div class="front_activity__card-excrept"><?= get_the_excerpt(); ?></div>
            <p class="front_activity__card-link front_activity__card-link--blue">Voir le projet</p>
          </div>
          <a class="front_activity__card-link-sro" href="<?= get_the_permalink(); ?>"
             title="Ce lien vous amènera vers la page du projet">
            Vers la page du projet
          </a>
        </article>
      <?php endwhile;
      wp_reset_postdata(); endif; ?>
  </div>
</section>

<?= get_footer(); ?>
