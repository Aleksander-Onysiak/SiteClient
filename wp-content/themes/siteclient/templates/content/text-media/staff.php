<?php
$title = get_sub_field('staff_title');
$description = get_sub_field('staff_description');
?>

<?php if ($title): ?>
<section class="staff-cards_section">
  <?php else: ?>
  <div class="staff-cards_section">
    <?php endif; ?>
    <div class="staff-cards_header">
      <?php if ($title): ?>
        <h2 class="staff-cards_header-title"><?= esc_html($title); ?></h2>
      <?php endif; ?>

      <?php if ($description): ?>
        <p class="staff-cards_header-description"><?= esc_html($description); ?></p>
      <?php endif; ?>
    </div>

    <?php if (have_rows('staff_cards')): ?>
      <article class="staff-cards">
        <?php while (have_rows('staff_cards')): the_row(); ?>
          <?php
          $image = get_sub_field('staff_image');
          $job = get_sub_field('staff_job');
          $bio = get_sub_field('staff_bio');
          ?>
          <div class="staff-card">
            <?php if (!empty($image)): ?>
              <img class="staff-card-icon" src="<?= esc_url($image['url']); ?>"
                   alt="<?= esc_attr($image['alt'] ?: $job); ?>">
            <?php endif; ?>

            <?php if (!empty($job)): ?>
              <h3 class="staff-card-job"><?= esc_html($job); ?></h3>
            <?php endif; ?>

            <?php if (!empty($bio)): ?>
              <p class="staff-card-bio"><?= esc_html($bio); ?></p>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      </article>
    <?php endif; ?>
<?php if ($title): ?>
  </section>
<?php else: ?>
  </div>
<?php endif; ?>
