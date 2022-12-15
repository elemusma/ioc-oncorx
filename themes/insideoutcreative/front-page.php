<?php get_header();

// start of intro
if(have_rows('builder')): while(have_rows('builder')): the_row();
$layout = get_sub_field('layout');

if($layout == 'Content Center'){
    if(have_rows('content_center')): while(have_rows('content_center')): the_row();
    $bgImg = get_sub_field('background_image');

        echo '<section class="pt-5 pb-5 position-relative ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '">';
        if($bgImg):
        echo wp_get_attachment_image($bgImg,'full','',['class'=>'position-absolute w-100 h-100','style'=>'top:0;left:0;object-fit:cover;']);
        endif;
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-lg-6 col-md-9 text-center ' . get_sub_field('column_classes') . '" style="' . get_sub_field('column_style') . '">';
        
        echo get_sub_field('content');
        
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
    endwhile; endif;
} elseif($layout == 'Content + Image'){
    if(have_rows('content_image')): while(have_rows('content_image')): the_row();
    $bgImg = get_sub_field('background_image');
    $image = get_sub_field('image');
    $imageSide = get_sub_field('image_side');

        echo '<section class="position-relative content-image ' . get_sub_field('classes') . '" style="padding:100px 0;' . get_sub_field('style') . '">';
        if($bgImg):
        echo wp_get_attachment_image($bgImg['id'],'full','',['class'=>'position-absolute w-100 h-100','style'=>'top:0;left:0;object-fit:cover;']);
        endif;
        echo '<div class="container-fluid">';

        if($imageSide == 'Right'){
            echo '<div class="row">';
            // echo '</div>';
        } else {
            echo '<div class="row flex-lg-row-reverse">';
        }

        echo '<div class="col-md-6 ' . get_sub_field('content_column_classes') . '" style="' . get_sub_field('content_column_style') . '">';
        echo '<div class="h-100 d-flex align-items-center">';
        echo '<div>';
        echo get_sub_field('content');
        echo '</div>';
        echo '</div>';
        
        echo '</div>';

        echo '<div class="col-md-6 text-center" style="">';
        
        if($image):
        echo wp_get_attachment_image($image['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:cover;']);
        endif;
        
        echo '</div>';

        echo '</div>';
        echo '</div>';
        echo '</section>';
    endwhile; endif;
}

endwhile; endif;
// end of intro


// how to use new image hover effect
// echo '<div class="col-6 col-intro-gallery col mb-1 p-1 overflow-h">';
// echo '<div class="position-relative img-hover w-100">';
// echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set">';
// echo wp_get_attachment_image($image['id'], 'full','',['class'=>'w-100 image-intro-gallery','style'=>'object-fit:cover;']);
// echo '</a>';
// echo '</div>';
// echo '</div>';

// // popup trigger
// echo '<span class="btn bg-white text-accent apply-now open-modal" id="apply-now" style="">Apply Now</span>';

// // popup content
// echo '<div class="modal-content apply-now position-fixed w-100 h-100 z-3">';
// echo '<div class="bg-overlay"></div>';
// echo '<div class="bg-content">';
// echo '<div class="bg-content-inner">';
// echo '<div class="close" id="">X</div>';
// echo '<div>';
// echo get_field('popup_content');
// echo '</div>';
// echo '</div>';

// echo '</div>';
// echo '</div>';

get_footer(); ?>