<?php
if (have_rows('content')):
    while (have_rows('content')):
        the_row();
        if (get_row_layout() === 'text-media'):
            include('content/text-media/text-media.php');
        elseif (get_row_layout() === 'grid-card'):
            include('content/text-media/grid-card.php');
        elseif (get_row_layout() === 'image'):
            include('content/image/image.php');
        elseif (get_row_layout() === 'video'):
            include('content/video/video.php');
        elseif (get_row_layout() === 'gallery'):
            include('content/gallery/gallery.php');
        elseif (get_row_layout() === 'staff'):
            include('content/staff/staff.php');
        elseif (get_row_layout() === 'slider'):
            include('content/slider/slider.php');
        elseif (get_row_layout() === 'sponsors'):
            include('sponsors/sponsor.php');
        endif;
    endwhile;
endif;
