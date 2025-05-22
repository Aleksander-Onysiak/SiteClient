<?php
// À placer où tu veux afficher le QR code dans le template :
$current_url = get_permalink(); // Récupère l'URL de la page actuelle

$qr_shortcode = '[kaya_qrcode title_align="alignnone" dynamic_content="0" ecclevel="L" border="4" color="#000000" bgcolor="#FFFFFF" align="alignnone" css_shadow="0" no_css="0" new_window="0" content_url="' . esc_url($current_url) . '" download_button="0" download_align="alignnone"]';
$image = get_field('qr_code'); // Le nom du champ ACF

echo '<section class="qr-section">';
echo '<h2>Scannez ce QR Code :</h2>';
//echo '<img src="../../src/img/kaya-qr-code.png" alt="kaya-qr-code" width="500" height="600">';
//echo do_shortcode($qr_shortcode); // c’est bien ce shortcode qu’on veut afficher
if ($image):
    ?>
    <div class="qr-code-image">
        <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt'] ?: 'QR Code'); ?>">
    </div>
<?php endif;
echo '</section>';
?>
