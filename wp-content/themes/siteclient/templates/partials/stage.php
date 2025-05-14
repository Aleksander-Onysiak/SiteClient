<?php
$stage = get_field('stage');
$stage_headline = get_field('headline');
$stage_text = get_field('text');
$stage_image = get_field('background_image');
$stage_link = get_field('link');
?>

<section class="stage">
    <?php if (isset($stage['supline']) && $stage['supline'] !== ""): ?>
        <p class="stage__supline">
            <?= $stage['supline'] ?>
        </p>
    <?php endif; ?>
    <?php if (isset($stage['headline']) && $stage['headline'] !== ""): ?>
        <h2 class="stage__headline">
            <?= $stage['headline'] ?>
        </h2>
    <?php endif; ?>
    <?php if (isset($stage['subline']) && $stage['subline'] !== ""): ?>
        <p class="stage__subline">
            <?= $stage['subline'] ?>
        </p>
    <?php endif; ?>
    <?php if (isset($stage['text']) && $stage['text'] !== ""): ?>
        <p class="stage__description">
            <?= $stage['text'] ?>
        </p>
    <?php endif; ?>
    <?php if (isset($stage['link']) && $stage['link'] !== ""): ?>
        <a class="stage__link"
           href="<?= $stage['link']['url'] ?>"
           title="<?= $stage['link']['title'] ?>">
            <?= $stage['link']['title'] ?>
        </a>
    <?php endif; ?>
    <?php if (isset($stage['image']) && $stage['image'] !== ""): ?>
        <?= responsive_image($stage['image'], ['lazy' => 'true', 'classes' => 'stage__image']) ?>
    <?php endif; ?>
</section>