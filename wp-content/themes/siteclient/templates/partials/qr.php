<?php
$current_url = get_permalink();

$qr_shortcode = '[kaya_qrcode title_align="alignnone" dynamic_content="0" ecclevel="L" border="4" color="#000000" bgcolor="#FFFFFF" align="alignnone" css_shadow="0" no_css="0" new_window="0" content_url="' . esc_url($current_url) . '" download_button="0" download_align="alignnone"]';
$image = get_field('qr_code');

echo '<section class="qr-section">';
echo '<h2>Scannez ce QR Code pour nous faire un don :</h2>';
if ($image):
    ?>
    <div class="qr-code-image">
        <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt'] ?: 'QR Code'); ?>">
    </div>
<?php endif;
echo '</section>';
?>
