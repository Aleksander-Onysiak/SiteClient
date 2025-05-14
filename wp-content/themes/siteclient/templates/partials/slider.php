<?php
$title = get_sub_field('title');
$slider = get_sub_field('slider');

if (!empty($slider)): ?>
<section>
    <h2 class="slider__title">
        <?= $title ?>
    </h2>
    <div class="slider°°container">
        <?php foreach ($slider as $image): ?>
            <?= responsive_image($image, [
                'lazy' => true,
                'classes' => 'slider__image'
            ]) ?>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</section>
