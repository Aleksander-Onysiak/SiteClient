<?php
$stage = get_field('stage');
$stage_headline = get_field('headline');
$stage_text = get_field('text', false, false);
$stage_image = get_field('background_image');
$stage_link = get_field('link');
$stage_size = get_field('size');
?>

<section class="stage <?= is_front_page() ? 'stage__home' : 'stage__small'; ?>">
  <div class="stage__div-text <?= is_front_page() ? 'stage__home__div-text' : ''; ?>">
    <?php if (isset($stage['supline']) && $stage['supline'] !== ""): ?>
      <p class="stage__supline">
        <?= $stage['supline'] ?>
      </p>
    <?php endif; ?>
    <?php if (isset($stage['headline']) && $stage['headline'] !== ""): ?>
      <h2 role="heading" aria-level="2"
          class="stage__headline <?= is_front_page() ? 'stage__home__headline' : ''; ?>">
        <?= $stage['headline'] ?>
      </h2>
    <?php endif; ?>
    <div class="test">
      <?php if (isset($stage['text']) && $stage['text'] !== ""): ?>
        <p class="stage__description <?= is_front_page() ? 'stage__home__description' : ''; ?>">
          <?= $stage['text'] ?>
        </p>
      <?php endif; ?>
    </div>
    <?php if (isset($stage['link']) && $stage['link'] !== ""): ?>
      <a class="stage__link"
         href="<?= $stage['link']['url'] ?>"
         title="<?= $stage['link']['title'] ?>">
        <?= $stage['link']['title'] ?>
      </a>
    <?php endif; ?>
  </div>

  <?php if (isset($stage['image']) && !empty($stage['image'])): ?>
    <div class="stage__div-image">
      <?= responsive_image($stage['image'], [
        'lazy' => 'true',
        'classes' => 'stage__image' . (is_front_page() ? ' stage__home__image' : '')
      ]) ?>
    </div>
  <?php endif; ?>
</section>
