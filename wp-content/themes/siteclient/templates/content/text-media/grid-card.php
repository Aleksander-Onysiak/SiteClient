<?php
if (get_row_layout() === 'grid-card'):
    if (have_rows('grid-card-repeater')): ?>
        <section class="grid-cards">
            <?php while (have_rows('grid-card-repeater')): the_row();
                $link = get_sub_field('link'); // champ de type "link"
                $title = get_sub_field('title');
                $icon = get_sub_field('icon');
                $description = get_sub_field('description'); // champ WYSIWYG
                ?>
                <div class="grid-card">
                    <?php if ($icon): ?>
                        <div class="grid-card-icon">
                            <img src="<?= esc_url($icon['url']); ?>" alt="<?= esc_attr($icon['alt'] ?: $title); ?>">
                        </div>
                    <?php endif; ?>
                    <?php if ($title): ?>
                        <h3><?= esc_html($title); ?></h3>
                    <?php endif; ?>
                    <?php if ($link): ?>
                        <a href="<?= esc_url($link['url']); ?>"
                           title="<?= esc_attr($link['title'] ?: $title); ?>"
                           class="grid-card-link"
                            <?= $link['target'] ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>>
                            <?php if ($link): ?>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($description): ?>
                        <div class="grid-card-description">
                            <?= wp_kses_post($description); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </section>
    <?php endif;
endif;
?>
