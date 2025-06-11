<?php /* Template Name: Template "Support" */ ?>

<?php get_header(); ?>

<?php include('templates/partials/stage.php'); ?>
<?php include('templates/flexible.php'); ?>
<?php include('templates/partials/qr.php'); ?>

<?php
// Activités futures
$activities = new WP_Query([
    'post_type' => 'activity',
    'posts_per_page' => 5,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
]);
?>

<h1 role="heading" aria-level="1" class="activities_title">Nos dernières activités</h1>

<section class="activities">
    <?php if ($activities->have_posts()) : ?>
        <?php while ($activities->have_posts()) : $activities->the_post(); ?>
            <div tabindex="0" class="activity__card">
                <a class="activity__card-link-container" href="<?= esc_url(get_the_permalink()); ?>"
                   title="Voir cette activité">
                    <div class="activity__card-text-container">
                        <?= get_the_post_thumbnail(null, 'medium', [
                            'class' => 'activity__card-image',
                            'alt' => esc_attr(get_the_title())
                        ]); ?>
                        <h3 class="activity__card-title"><?= esc_html(get_the_title()); ?></h3>
                        <p class="activity__card-link">Voir l’activité</p>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>Aucune activité future trouvée.</p>
    <?php endif; ?>
</section>


<?php
$projets = new WP_Query([
    'post_type' => 'project',
    'posts_per_page' => 5,
    'post_status' => 'publish',
    'lang' => '',
]);
?>
<h2 class="projects__title">Nos anciens projets</h2>
<section class="projects">

    <?php if ($projets->have_posts()) :
        while ($projets->have_posts()) : $projets->the_post(); ?>
            <div tabindex="0" class="project__card">
                <a class="project__card-link-sro" href="<?= get_the_permalink(); ?>"
                   title="Ce lien vous amènera vers la page du projet">
                    <div class="project__card-text-container">
                        <img class="project__card-image" src="<?= get_the_post_thumbnail_url() ?>" alt=""
                             width="300" height="300">
                        <h3 role="heading" aria-level="3" class="project__card-title"><?= get_the_title(); ?></h3>
                        <p class="project__card-link">Voir le projet</p>
                    </div>
                </a>
            </div>
        <?php endwhile;
        wp_reset_postdata(); endif; ?>
</section>

<?php get_footer(); ?>
