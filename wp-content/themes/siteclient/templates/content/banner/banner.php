
<?php
if (get_row_layout() === 'banner') {
    $banner_title = get_sub_field('banner_title');
    $banner_image = get_field('banner_image');
    if (!empty($banner_title)) : ?>
        <h2 class="banner-title"><?= esc_html($banner_title); ?></h2>
    <?php endif;

    if (!empty($banner_image)) : ?>
        <div class="banner-image">
            <img
                    src="<?= esc_url($banner_image['url']); ?>"
                    alt="<?= esc_attr($banner_image['alt'] ?: ''); ?>"
                    class="banner-image__img"
            />
        </div>
    <?php endif;
}
?>
