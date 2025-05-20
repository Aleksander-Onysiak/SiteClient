<?php echo '<!-- sponsor.php est bien inclus -->'; ?>
<?php if (have_rows('sponsors-section')): ?>
    <?php echo '<!-- sponsors-section a du contenu -->'; ?>
    <section class="sponsors-container">
        <?php while (have_rows('sponsors-section')): the_row();
            $logo = get_sub_field('sponsor-image');
            $link = get_sub_field('sponsor-link');
            ?>

            <?php if ($logo || $link): ?>
                <div class="sponsor-card">
                    <a class="sponsor-card__link"
                       href="<?= esc_url($link); ?>"
                       title="Ce lien vous amènera vers la page du sponsor">
                        <?php if (!empty($logo)): ?>
                            <div class="sponsor-card-logo">
                                <img src="<?= esc_url($logo['url']); ?>"
                                     alt="<?= esc_attr($logo['alt']); ?>"
                                     class="sponsor-card__logo-img">
                            </div>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endif; ?>

        <?php endwhile; ?>
    </section>

<?php else: ?>
    <?php echo '<!-- sponsors-section est vide -->'; ?>
<?php endif; ?>

