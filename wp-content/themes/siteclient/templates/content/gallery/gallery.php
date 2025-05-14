<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$link = get_sub_field('link');
$gallery = get_sub_field('gallery');

if (!empty($gallery)): ?>
<section class="gallery_container">
    <h2 class="gallery__title">
        <?= $title ?>
    </h2>
    <p class="gallery__description">
        <?= $description ?>
    </p>
    <div class="gallery__container">
        <?php foreach ($gallery as $image): ?>
            <?= responsive_image($image, [
                'lazy' => true,
                'classes' => 'gallery__image'
            ]) ?>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</section>