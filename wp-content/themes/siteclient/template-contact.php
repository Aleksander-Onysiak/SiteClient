<?php /* Template Name: Page "Contact" */ ?>
<?php get_header(); ?>
<?php include('templates/partials/stage.php'); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>

    <main class="contact">
        <header class="contact__header">
            <h1 role="heading" aria-level="1" class="contact__title"><?= get_the_title(); ?></h1>
        </header>

        <section class="contact__form_container">

            <?php if (have_rows('informations')): ?>
                <?php while (have_rows('informations')):
                    the_row();
                    $image = get_sub_field('image');
                    $title = get_sub_field('title');
                    $title_2 = get_sub_field('title_2');
                    $road = get_sub_field('road');
                    $postal_code = get_sub_field('postal_code');
                    $city = get_sub_field('city');
                    $phone = get_sub_field('phone');
                    $email = get_sub_field('email');
                    $facebook = get_sub_field('facebook');
                    ?>

                    <?php if ($image): ?>
                    <div class="contact__form-1">
                    <img class="contact__image" src="<?= esc_url($image['url']); ?>"
                         alt="<?= esc_attr($image['alt']); ?>"/>
                <?php endif; ?>
                    <div class="contact__dl_container">
                        <h2 role="heading" aria-level="2" class="contact__h2">Nos coordonnées</h2>
                        <div class="contact__dl_wrapper">
                            <div class="contact__dl">
                                <dl class="contact__dl-1">
                                    <?php if ($title): ?>
                                        <dt class="contact__dt-1"><?= esc_html($title); ?></dt>
                                    <?php endif; ?>
                                    <?php if ($road): ?>
                                        <dd class="contact__dd-1"><?= esc_html($road); ?></dd>
                                    <?php endif; ?>
                                    <?php if ($postal_code): ?>
                                        <dd class="contact__dd-1"><?= esc_html($postal_code); ?></dd>
                                    <?php endif; ?>
                                    <?php if ($city): ?>
                                        <dd class="contact__dd-1"><?= esc_html($city); ?></dd>
                                    <?php endif; ?>
                                </dl>
                            </div>
                            <div>
                                <dl class="contact__dl-2">
                                    <?php if ($title_2): ?>
                                        <dt class="contact__dt-2"><?= esc_html($title_2); ?></dt>
                                    <?php endif; ?>
                                    <?php if ($phone): ?>
                                        <dd class="contact__dd-2"><?= esc_html($phone); ?></dd>
                                    <?php endif; ?>
                                    <?php if ($email): ?>
                                        <dd class="contact__dd-2"><?= esc_html($email); ?></dd>
                                    <?php endif; ?>
                                </dl>
                            </div>
                        </div>
                        <div class="contact__form_social">
                            <h2>Notre page Facebook</h2>
                            <?php if ($facebook): ?>
                                <a href="<?= esc_html($facebook); ?>" class="contact__form_social-link">Le Vieux Moulin
                                    SRG </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    </div>
                    <div class="contact__form-2">
                        <?php
                        $errors = $_SESSION['dw_contact_form_errors'] ?? [];
                        unset($_SESSION['dw_contact_form_errors']);

                        $success = $_SESSION['dw_contact_form_success'] ?? false;
                        unset($_SESSION['dw_contact_form_success']);
                        ?>

                        <?php if ($success): ?>
                            <p class="contact__success"><?= $success; ?></p>
                        <?php else: ?>
                            <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="POST" class="form">
                                <fieldset class="form__fields form__grid">
                                    <div class="field">
                                        <label for="name" class="field__label">Prénom</label>
                                        <input type="text" name="name" id="name" class="field__input"
                                               placeholder="Nom / Prénom">
                                        <?php if (isset($errors['name'])): ?>
                                            <p class="field__error"><?= $errors['name']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="field">
                                        <label for="email" class="field__label">Adresse mail</label>
                                        <input type="email" name="email" id="email" class="field__input"
                                               placeholder="Email">
                                        <?php if (isset($errors['email'])): ?>
                                            <p class="field__error"><?= $errors['email']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="field field--full-small">
                                        <label for="subject" class="field__label">Sujet</label>
                                        <input type="text" name="subject" id="subject" class="field__input-small"
                                               placeholder="Sujet">
                                        <?php if (isset($errors['subject'])): ?>
                                            <p class="field__error"><?= $errors['subject']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="field field--full">
                                        <label for="message" class="field__label">Message</label>
                                        <textarea name="message" id="message" class="field__input"
                                                  placeholder="Message"></textarea>
                                        <?php if (isset($errors['message'])): ?>
                                            <p class="field__error"><?= $errors['message']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                </fieldset>
                                <div class="form__submit">
                                    <input type="hidden" name="action" value="dw_contact_form_submit">
                                    <button type="submit" class="btn">Envoyer</button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Aucune information pour l'instant</p>
            <?php endif; ?>
        </section>
    </main>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
