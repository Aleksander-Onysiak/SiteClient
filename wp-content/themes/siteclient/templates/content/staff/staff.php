<?php if (have_rows('content')): ?>
    <?php while (have_rows('content')): the_row(); ?>

        <?php if (get_row_layout() === 'staff_card'): ?>

            <?php
            $title = get_sub_field('staff_title');
            $cards = get_sub_field('staff_cards');
            ?>

            <?php if ($title): ?>
                <h2 class="staff-cards-title"><?= esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if ($cards): ?>
                <section class="staff-cards">
                    <?php foreach ($cards as $card): ?>
                        <div class="staff-card">
                            <?php if (!empty($card['staff_image'])): ?>
                                <div class="staff-card-icon">
                                    <img src="<?= esc_url($card['staff_image']['url']); ?>"
                                         alt="<?= esc_attr($card['staff_image']['alt'] ?: $card['staff_job']); ?>">
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($card['staff_job'])): ?>
                                <p class="staff-card-job"><?= esc_html($card['staff_job']); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </section>
            <?php endif; ?>

        <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>
