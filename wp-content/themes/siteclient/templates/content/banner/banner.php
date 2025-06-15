<?php
$banner_title = get_sub_field('banner_title');
$banner_image = get_field('banner_image');
?>
<?php if (!empty($banner_title) && !empty($banner_image)): ?>
<section class="banner__container">
  <?php endif; ?>
  <?php if (!empty($banner_title)) : ?>
    <h2 class="banner__title"><?= esc_html($banner_title); ?></h2>
  <?php endif;

  if (!empty($banner_image)) : ?>
    <div class="banner__image-container">
      <?= responsive_image($banner_image, ['classes' => 'banner__image-single']) ?>
    </div>
  <?php endif; ?>
  <?php if (!empty($banner_title) && !empty($banner_image)): ?>
</section>
<?php endif; ?>
