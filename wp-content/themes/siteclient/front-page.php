<?php
get_header(); ?>
    <section class="front-container">
        <div>
            <h2 class="title"><a href="index.php">Le Vieux Moulin</a></h2>
            <!--<img class="profile__image" src="<?= esc_url($image); ?>" alt="ma photo personnelle">-->
            <button class="btn-contact__fast">
                <a href="http://SiteClient.test/contact/"><?= __('Nous contacter', 'hdc-trad') ?></a>
            </button>
        </div>
    </section>
<?php get_footer(); ?>