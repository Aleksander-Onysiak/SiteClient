<?php $title = get_sub_field('text'); ?>
<?php $description = get_sub_field('text'); ?>
<?php if ($title || $description): ?>

    <div class="text-media__content-container">
        <?php if (!empty($title)): ?>
            <h3 class="text-title">
                <?= $title ?>
            </h3>
        <?php endif; ?>
        <?php if (!empty($description)): ?>
            <div class="text-content">
                <?= $description ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
