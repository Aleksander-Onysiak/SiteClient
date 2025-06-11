<?php
if (have_rows('content')):
    while (have_rows('content')): the_row();
        if (get_row_layout() === 'documents-files'):
            $title = get_sub_field('documents_title');
            $description = get_sub_field('documents_description');
            ?>

            <section class="document-container">

                <?php if ($title || $description): ?>
                    <div class="document-container__header">
                        <?php if ($title): ?>
                            <h2 class="document-container__header-title"><?= esc_html($title); ?></h2>
                        <?php endif; ?>
                        <?php if ($description): ?>
                            <p class="document-container__header-description"><?= esc_html($description); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if (have_rows('documents-repeater')): ?>
                    <div class="document-cards">
                        <?php while (have_rows('documents-repeater')): the_row(); ?>
                            <?php
                            $document = get_sub_field('document');
                            if ($document):
                                $file_url = $document['url'];
                                $file_title = $document['title'] ?: basename($file_url);
                                $file_target = !empty($document['target']) ? $document['target'] : '_self';
                                ?>
                                <div class="document-card">
                                    <div class="document-card-header">
                                        <p class="document-card-header-title"><?= esc_html($file_title); ?></p>
                                    </div>

                                    <div class="document-card-body">
                                        <a class="document-card-link"
                                           href="<?= esc_url($file_url); ?>"
                                           title="<?= esc_attr($file_title); ?>"
                                           target="<?= esc_attr($file_target); ?>"
                                           download>
                                            Télécharger le fichier
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p>Aucun document à télécharger.</p>
                <?php endif; ?>

            </section>

        <?php endif;

    endwhile;
endif;
?>
