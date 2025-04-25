<?php /*Template Name: Template "Mes projets"*/ ?>

<?= get_header() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div><?php the_content() ?></div>
<?php endwhile; else : ?>

    <p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php
$projets = new WP_Query([
    'post_type' => 'project',
    'post_per_page' => -1,
    'post_status' => 'publish',
]);
?>
<div>
    <p role="heading" aria-level="2" class="projects__main">Tous nos projets</p>
    <p role="heading" aria-level="2" class="projects__second">les plus récents</p>
</div>
    <section id="cards" class="projects">
        <h2 role="heading" aria-level="2" class="projects__title">Mes projets</h2>
        <?php if ($projets->have_posts()) :
            while ($projets->have_posts()) : $projets->the_post(); ?>
                <article tabindex="0" class="project__card">
                    <div class="opacity">
                        <a class="project__card-link-sro" href="<?= get_the_permalink(); ?>" title="Ce lien vous amènera vers la page du projet">
                            <div class="project__card-text-container">
                                <img class="project__card-image" src="<?= get_the_post_thumbnail_url() ?>" alt="" width="300" height="300">
                                <h2 role="heading" aria-level="3" class="project__card-title" ><?= the_title(); ?></h2>
                                <p class="project__card-link">
                                    Voir le projet
                                </p>
                            </div>
                        </a>
                    </div>
                    <!--<img class="projects__image" src="<?= $image; ?>" alt="image du projet">-->
                </article>
            <?php endwhile; endif; ?>
    </section>
    <!--on ferme la boucle-->
<?= get_footer() ?>