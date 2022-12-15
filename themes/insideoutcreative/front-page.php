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
    $link = get_sub_field('link');

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

        echo '<div class="col-lg-4 col-md-6 ' . get_sub_field('content_column_classes') . '" style="' . get_sub_field('content_column_style') . '">';
        echo '<div class="h-100 d-flex align-items-center">';
        echo '<div>';
        echo get_sub_field('content');
        echo '</div>';
        echo '</div>';
        
        echo '</div>';

        echo '<div class="col-lg col-md-6 p-0 text-center" style="">';
        
        if($image):
        echo wp_get_attachment_image($image['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:cover;']);
        endif;
        
        echo '</div>';

        echo '</div>';


        echo '</div>';
        echo '</section>';
        
        echo '<section class="mb-5" style="margin-top:-35px;">';
        echo '<div class="container">';
        if($link):
            echo '<div class="row">';
            echo '<div class="col-12 text-center">';
            
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            echo '<a class="btn-main secondary" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
            
            echo '</div>';
            echo '</div>';
        endif;
        echo '</div>';
        echo '</section>';

    endwhile; endif;
} elseif($layout == 'Solutions') {
    if(have_rows('solutions')): while(have_rows('solutions')): the_row();
    $middleImage = get_sub_field('middle_image');

        echo '<section class="position-relative ' . get_sub_field('classes') . '" style="padding:100px 0;' . get_sub_field('style') . '">';
        echo '<div class="container">';
        echo '<div class="row">';
        
        echo '<div class="col-12 text-center pb-4">';
        echo get_sub_field('content');
        echo '</div>';
        echo '</div>';

        echo '<div class="row">';

        if(have_rows('left_side_content')): 
            echo '<div class="col-lg-5">';
            while(have_rows('left_side_content')): the_row();
            $image = get_sub_field('icon');
            echo '<div class="row pb-5 align-items-center">';
                echo '<div class="col-lg-6 small">';
                echo get_sub_field('left_side_inner_content');
                echo '</div>';
                echo '<div class="col-lg-4">';
                echo '<div class="position-relative d-flex align-items-center justify-content-center col-solutions-icon" style="">';
                echo wp_get_attachment_image($image['id'],'full','',['class'=>'','style'=>'width:50px;height:50px;object-fit:contain;']);
                echo '</div>';
                echo '</div>';
                echo '<div class="col-lg-2">';
                    echo '<div class="" style="width:25px;">';
                    echo '<?xml version="1.0" encoding="UTF-8"?>
                    <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 522.6 452.59">
                      <defs>
                        <style>
                          .cls-1 {
                            fill: #28aae1;
                          }
                        </style>
                      </defs>
                      <g id="Layer_1-2" data-name="Layer 1">
                        <polygon class="cls-1" points="261.3 0 0 452.59 522.6 452.59 261.3 0"/>
                      </g>
                    </svg>';
                    echo '</div>';
                echo '</div>';
                echo '</div>'; // end of row
            endwhile; 
            echo '</div>';
        endif;


        if($middleImage):
            echo '<div class="col-lg-2">';
                echo wp_get_attachment_image($middleImage['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:contain;']);
            echo '</div>';
        endif;


        if(have_rows('right_side_content')): 
            echo '<div class="col-lg-5">';
            echo '<div class="row">';
            while(have_rows('right_side_content')): the_row();
        $image = get_sub_field('right_side_inner_icon');
                echo '<div class="col-lg-9 small">';
                echo get_sub_field('right_side_inner_content');
                echo '</div>';
                echo '<div class="col-lg-3">';
                echo wp_get_attachment_image($image['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:contain;']);
                echo '</div>';
            endwhile; 
            echo '</div>';
            echo '</div>';
        endif;

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