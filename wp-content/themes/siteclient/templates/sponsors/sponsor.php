<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <?php if (have_rows('content')): ?>
    <?php while (have_rows('content')): the_row(); ?>
      <?php if (get_row_layout() === 'sponsors_section'): ?>
        <?php
        $sponsors_title = get_sub_field('sponsors_title');
        $sponsor_description = get_sub_field('sponsors_description');
        ?>

        <section class="sponsors-section">
          <?php if ($sponsors_title): ?>
            <h2 class="sponsors-section__title"><?= esc_html($sponsors_title); ?></h2>
          <?php endif; ?>

          <?php if ($sponsor_description): ?>
            <p class="sponsors-section__description"><?= esc_html($sponsor_description); ?></p>
          <?php endif; ?>

          <?php if (have_rows('sponsors_repeater')): ?>
            <div class="sponsors-logos">
              <?php while (have_rows('sponsors_repeater')): the_row(); ?>
                <?php
                $sponsor_image = get_sub_field('sponsor_image'); // corrigé ici
                $sponsor_link = get_sub_field('sponsor_link');
                ?>
                <div class="sponsor-logo">
                  <?php if ($sponsor_image && !empty($sponsor_image['url'])): ?>
                    <?php if ($sponsor_link): ?>
                      <a href="<?= esc_url($sponsor_link); ?>" target="_blank" rel="noopener noreferrer">
                        <img src="<?= esc_url($sponsor_image['url']); ?>"
                             alt="<?= esc_attr($sponsor_image['alt'] ?: 'Sponsor logo'); ?>"/>
                      </a>
                    <?php else: ?>
                      <img src="<?= esc_url($sponsor_image['url']); ?>"
                           alt="<?= esc_attr($sponsor_image['alt'] ?: 'Sponsor logo'); ?>"/>
                    <?php endif; ?>
                  <?php else: ?>
                    <p>Image sponsor manquante.</p>
                  <?php endif; ?>
                </div>
              <?php endwhile; ?>
            </div>
          <?php else: ?>
            <p>Aucun sponsor trouvé.</p>
          <?php endif; ?>
        </section>
      <?php endif; ?>
    <?php endwhile; ?>
  <?php endif; ?>
<?php endwhile; endif; ?>
