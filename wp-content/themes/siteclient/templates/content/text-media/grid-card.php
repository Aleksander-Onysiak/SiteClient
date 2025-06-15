<?php
if (get_row_layout() === 'grid-card'):
    $grid_title = get_sub_field('grid_title');
    $grid_description = get_sub_field('grid_description');
    $cards = get_sub_field('grid-card-repeater');

    if ($cards):
        $linkCount = 0;
        foreach ($cards as $card) {
            if (!empty($card['link'])) {
                $linkCount++;
            }
        }
        ?>

        <section class="grid-container">
            <?php if ($grid_title || $grid_description): ?>
                <div class="grid-container__header">
                    <?php if ($grid_title): ?>
                        <h2 class="grid-container__header-title" aria-level="2" role="heading"><?= esc_html($grid_title); ?></h2>
                    <?php endif; ?>
                    <?php if ($grid_description): ?>
                        <p class="grid-container__header-description"><?= esc_html($grid_description); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="grid-cards">
                <?php
                $currentLinkIndex = 0;

                foreach ($cards as $card):
                    $title = $card['title'];
                    $icon = $card['icon'];
                    $link = $card['link'];
                    $description = $card['description'];

                    $classes = ['grid-card'];

                    if ($link) {
                        $classes[] = 'grid-card__link';
                        $currentLinkIndex++;
                        if ($linkCount >= 2 && $currentLinkIndex === 2) {
                            $classes[] = 'grid-card__link2';
                        }
                    }
                    ?>

                    <article class="<?= esc_attr(implode(' ', $classes)); ?>">
                        <div class="grid-card-header">
                            <?php if ($icon): ?>
                                <img class="grid-card-header-img"
                                     src="<?= esc_url($icon['url']); ?>"
                                     alt="<?= esc_attr($icon['alt'] ?: $title); ?>">
                            <?php endif; ?>

                            <?php if ($title): ?>
                                <h3 class="grid-card-header-title"><?= esc_html($title); ?></h3>
                            <?php endif; ?>
                        </div>

                        <div class="grid-card-body">
                            <?php if ($description): ?>
                                <div class="grid-card-description"><?= wp_kses_post($description); ?></div>
                            <?php endif; ?>

                            <?php if ($link): ?>
                                <a class="grid-card-link" href="<?= esc_url($link['url']); ?>"
                                   title="<?= esc_attr($link['title'] ?: $title); ?>"
                                    <?= !empty($link['target']) ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>>
                                    <?= esc_html($link['title'] ?: 'En savoir plus'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </article>

                <?php endforeach; ?>

            </div>
        </section>

    <?php endif;
endif;
?>
