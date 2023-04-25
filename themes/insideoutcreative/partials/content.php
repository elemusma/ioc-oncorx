<?php

// start of intro
if(have_rows('builder')): while(have_rows('builder')): the_row();
$layout = get_sub_field('layout');

if($layout == 'Content Center'){
    if(have_rows('content_center')): while(have_rows('content_center')): the_row();

        echo '<section class="pt-5 pb-5 position-relative ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '">';
        $bgImg = get_sub_field('background_image');

        if($bgImg){
            echo wp_get_attachment_image($bgImg['id'],'full','',[
                'class'=>'w-100 h-100 position-absolute bg-img',
                'style'=>'top:0;left:0;object-fit:cover;pointer-events:none;'
            ]);
        }
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-lg-6 col-md-9 text-center ' . get_sub_field('column_classes') . '" style="' . get_sub_field('column_style') . '" data-aos="fade-up">';
        
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
        if($imageSide == 'Right'){
            echo '<div class="" data-aos="fade-right">';
            // echo '</div>';
        } else {
            echo '<div class="" data-aos="fade-left">';
        }
        echo '<div class="h-100 d-flex align-items-center">';
        echo '<div>';
        echo get_sub_field('content');
        echo '</div>';
        echo '</div>';

        echo '</div>';


        
        echo '</div>'; // end of col-lg-4

        echo '<div class="col-lg col-md-6 p-0 text-center" style="">';
        
        if($imageSide == 'Right'){
            echo '<div class="" data-aos="fade-left">';
            // echo '</div>';
        } else {
            echo '<div class="" data-aos="fade-right">';
        }

        if($image):
        echo wp_get_attachment_image($image['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:cover;']);
        endif;
        
        echo '</div>';
        echo '</div>'; // end of col-md-6

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
        
        echo '<div class="col-12 text-center pb-4" data-aos="fade-up">';
        echo get_sub_field('content');
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</section>';

        echo '<section class="position-relative ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '">';
        $bgImg = get_sub_field('background_image');

        echo wp_get_attachment_image($bgImg,'full','',['class'=>'w-100 position-absolute bg-img','style'=>'top:2%;left:0;height:88%;object-fit:cover;']);
        echo '<div class="container">';
        echo '<div class="row">';

        if(have_rows('left_side_content')): 
            echo '<div class="col-lg-5 col-solutions-left d-flex flex-wrap align-items-center">';
            $leftSideCounter=0;
            while(have_rows('left_side_content')): the_row();
            $leftSideCounter++;
            $image = get_sub_field('icon');
            echo '<div class="row-icons-solutions">';
            echo '<div class="row pb-5 align-items-center" data-aos="fade-right" data-aos-delay="' . $leftSideCounter . '00">';
                echo '<div class="col-lg-6 col-6 text-accent text-right col-content">';
                echo get_sub_field('left_side_inner_content');
                echo '</div>';
                echo '<div class="col-md-4 col-5">';
                echo '<div class="position-relative d-flex align-items-center justify-content-center col-solutions-icon" style="">';
                echo wp_get_attachment_image($image['id'],'full','',['class'=>'','style'=>'width:75px;height:75px;object-fit:contain;']);
                echo '</div>';
                echo '</div>';
                // echo '<div class="col-lg-2 col-arrow">';
                //     echo '<div class="" style="width:25px;">';
                //     echo '';
                //     echo '</div>';
                // echo '</div>';
                echo '</div>'; // end of row
                echo '</div>';
            endwhile; 
            echo '</div>';
        endif;


        if($middleImage):
            echo '<div class="col-lg-2 col-middle d-flex align-items-center justify-content-center pt-lg-0 pb-lg-0" style="padding-top:100px;padding-bottom:150px;" data-aos="fade-up" data-aos-delay="400">';

            echo '<div class="position-relative pb-5">';
            echo '<div class="position-absolute d-lg-block arrow-top-left">';
            echo '<?xml version="1.0" encoding="UTF-8"?><svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 522.6 452.59"><defs><style>.cls-1 {fill: #28aae1;}</style></defs><g id="Layer_1-2" data-name="Layer 1"><polygon class="cls-1" points="261.3 0 0 452.59 522.6 452.59 261.3 0"/></g></svg>';
            echo '</div>';
            echo '<div class="position-absolute d-lg-block arrow-middle-left">';
            echo '<?xml version="1.0" encoding="UTF-8"?><svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 522.6 452.59"><defs><style>.cls-1 {fill: #28aae1;}</style></defs><g id="Layer_1-2" data-name="Layer 1"><polygon class="cls-1" points="261.3 0 0 452.59 522.6 452.59 261.3 0"/></g></svg>';
            echo '</div>';
            echo '<div class="position-absolute d-lg-block arrow-bottom-left">';
            echo '<?xml version="1.0" encoding="UTF-8"?><svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 522.6 452.59"><defs><style>.cls-1 {fill: #28aae1;}</style></defs><g id="Layer_1-2" data-name="Layer 1"><polygon class="cls-1" points="261.3 0 0 452.59 522.6 452.59 261.3 0"/></g></svg>';
            echo '</div>';
            echo '<div class="position-absolute d-lg-block arrow-top-right">';
            echo '<?xml version="1.0" encoding="UTF-8"?><svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 522.6 452.59"><defs><style>.cls-1 {fill: #28aae1;}</style></defs><g id="Layer_1-2" data-name="Layer 1"><polygon class="cls-1" points="261.3 0 0 452.59 522.6 452.59 261.3 0"/></g></svg>';
            echo '</div>';
            echo '<div class="position-absolute d-lg-block arrow-middle-right">';
            echo '<?xml version="1.0" encoding="UTF-8"?><svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 522.6 452.59"><defs><style>.cls-1 {fill: #28aae1;}</style></defs><g id="Layer_1-2" data-name="Layer 1"><polygon class="cls-1" points="261.3 0 0 452.59 522.6 452.59 261.3 0"/></g></svg>';
            echo '</div>';
            echo '<div class="position-absolute d-lg-block arrow-bottom-right">';
            echo '<?xml version="1.0" encoding="UTF-8"?><svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 522.6 452.59"><defs><style>.cls-1 {fill: #28aae1;}</style></defs><g id="Layer_1-2" data-name="Layer 1"><polygon class="cls-1" points="261.3 0 0 452.59 522.6 452.59 261.3 0"/></g></svg>';
            echo '</div>';

            echo '<div class="position-relative d-flex align-items-center justify-content-center col-solutions-icon" style="">';
                echo wp_get_attachment_image($middleImage['id'],'full','',['class'=>'','style'=>'width:175px;height:175px;object-fit:contain;']);
            echo '</div>';

            echo '</div>';


            echo '</div>';
        endif;


        if(have_rows('right_side_content')): 
            echo '<div class="col-lg-5 col-solutions-right">';
            // echo '<div class="row">';
            $rightSideCounter=0;
            while(have_rows('right_side_content')): the_row();
            $rightSideCounter++;
        $image = get_sub_field('right_side_inner_icon');
        echo '<div class="row-icons-solutions">';
        echo '<div class="row pb-5 align-items-center justify-content-end" data-aos="fade-left" data-aos-delay="' . $rightSideCounter . '00">';
        echo '<div class="col-md-4 col-5">';
        echo '<div class="position-relative d-flex align-items-center justify-content-center col-solutions-icon" style="">';
        echo wp_get_attachment_image($image['id'],'full','',['class'=>'','style'=>'width:75px;height:75px;object-fit:contain;']);
        echo '</div>';
        echo '</div>';
        echo '<div class="col-lg-6 col-7 text-accent col-content">';
        echo get_sub_field('right_side_inner_content');
        echo '</div>';
        // echo '<div class="col-lg-2 col-arrow">';
        //     echo '<div class="" style="width:25px;">';
        //     echo '';
        //     echo '</div>';
        // echo '</div>';
        echo '</div>'; // end of row
        echo '</div>';
            endwhile; 
            // echo '</div>';
            echo '</div>';
        endif;

        echo '</div>';
        echo '</div>';
        echo '</section>';
    endwhile; endif;
} elseif($layout == 'Posts'){
    if(have_rows('posts')): while(have_rows('posts')): the_row();
        echo '<section class="position-relative ' . get_sub_field('classes') . '" style="padding:100px 0;' . get_sub_field('style') . '">';
        echo '<div class="container">';
        echo '<div class="row">';
        
        echo '<div class="col-12 pb-4" data-aos="fade-up">';
        echo get_sub_field('content');
        echo '</div>';
        echo '</div>';

        $posts = get_sub_field('posts');

        if( $posts ):
            echo '<div class="row">';
            $postsCounter=0;
        foreach( $posts as $post ): 
        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post);
        $postsCounter++;
        echo '<div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="' . $postsCounter . '00">';
        echo '<div class="divider mb-4" style="border-width:4px;"></div>';

        echo '<a href="' . get_the_permalink() . '">';
        echo '<div class="img-hover overflow-h">';
        the_post_thumbnail('full',array('class'=>'w-100','style'=>'height:200px;object-fit:cover;'));
        echo '</div>';
        echo '</a>';

        echo '<span class="d-block mt-3 mb-3 small">' . get_the_date() . '</span>';
        echo '<a href="' . get_the_permalink() . '" class="text-black p mb-0 d-block" style=""><strong>' . get_the_title() . '</strong></a>';
        echo '<span class="d-block">' . get_the_excerpt() . '</span>';
        echo '</div>';
        endforeach;
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); 
            echo '</div>';
        endif;

        echo '</div>';
        echo '</section>';
    endwhile; endif;
} elseif ($layout == 'Testimonials'){
    if(have_rows('testimonials_group')): while(have_rows('testimonials_group')): the_row();

// start of testimonials
echo '<section class="pt-5 pb-5 testimonials bg-light position-relative z-1" style="">';
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-12 text-center">';

$testimonialsGroup = get_sub_field('testimonials_content');
$tTitle = $testimonialsGroup['title'];
$tContent = $testimonialsGroup['content'];

echo '<h3 class="">' . $tTitle . '</h3>';

if($tContent) {
echo $tContent;
}
echo '</div>';

if(have_rows('testimonials_repeater')): 
    $counterTestimonial = 0;
    echo '<div class="testimonials-carousel owl-carousel owl-theme">';
    
    while(have_rows('testimonials_repeater')): the_row(); 
$counterTestimonial++;

echo '<div class="col-testimonial mt-2 mb-2 pl-md-0 pr-md-0 pl-5 pr-4" data-aos="fade-up">';

echo '<img src="https://insideoutcreative.io/wp-content/uploads/2022/11/Quotes.png" style="width:25px;height:25px;object-fit:contain;" class="bg-img position-absolute img-quotes" alt="">';
echo '<div class="position-relative pl-5">';

echo '<small class="gray-text-1">';
echo '<p>' . get_sub_field('content') . '</p>';
echo '</small>';

echo '<div class="row align-items-center">';
$testimonialsImage = get_sub_field('headshot'); 
if($testimonialsImage){
echo '<div class="col-lg-3 col-5">';
echo wp_get_attachment_image($testimonialsImage['id'],'full','',['class'=>'img-testimonial h-auto w-100']); 
echo '</div>';
}

echo '<div class="col-lg-9 col-7">';
echo '<small>';
echo '<span class="h6"><strong>' . get_sub_field('name') . '</strong></span><br><span class="d-block">' . get_sub_field('job_title') . '</span>';

echo '</small>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
endwhile; 
    echo '</div>';
endif;

echo '</div>';
echo '</div>';
echo '</section>';
// end of testimonials

    endwhile; endif;
} elseif($layout == 'Content on Left'){
    if(have_rows('content_on_left_group')): while(have_rows('content_on_left_group')): the_row();
    echo '<section class="position-relative content-on-left ' . get_sub_field('classes') . '" style="padding:150px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

$bgImg = get_sub_field('background_image');

if($bgImg){
    echo wp_get_attachment_image($bgImg['id'],'full','',[
        'class'=>'w-100 h-100 position-absolute bg-img',
        'style'=>'top:0;left:0;object-fit:cover;pointer-events:none;'
    ]);
}

echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-lg-6 ' . get_sub_field('column_classes') . '" style="' . get_sub_field('column_style') . '">';
echo '<div data-aos="fade-right">';
    echo get_sub_field('content');

echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '</section>';

    endwhile; endif;
} elseif ( $layout == 'Team' ) {
    if(have_rows('team_group')): while(have_rows('team_group')): the_row();
    echo '<section class="position-relative content-on-left ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    $bgImg = get_sub_field('background_image');

    if($bgImg){
        echo wp_get_attachment_image($bgImg['id'],'full','',[
            'class'=>'w-100 h-100 position-absolute bg-img',
            'style'=>'top:0;left:0;object-fit:cover;pointer-events:none;'
        ]);
    }

    echo '<div class="container">';
    if(have_rows('team_repeater')):
    echo '<div class="row justify-content-center">';
    $teamCounter = 0;
    while(have_rows('team_repeater')): the_row();
    $img = get_sub_field('image');

    $teamCounter++;
    if($teamCounter > 3){
        $teamCounter = 1;
    }
        echo '<div class="col-lg-4 col-md-6 mb-4 text-center">';
        echo '<div data-aos="fade-up" data-aos-delay="' . $teamCounter . '00">';

        echo wp_get_attachment_image($img['id'],'full','',[
            'class'=>'w-auto',
            'style'=>'height:200px;object-fit:cover;object-position:top;'
        ]);

        echo '<div>';
        echo '<span class="d-inline-block">' . get_sub_field('name') . '</span>';
        echo '<div class="small" style="color:#8d8c8a;">';
        echo get_sub_field('description');
        echo '</div>';
        echo '</div>';

        echo '</div>';
        echo '</div>';
    endwhile;
    echo '</div>';
    endif;
    echo '</div>';
    
    echo '</section>';
    endwhile; endif;
} elseif ( $layout == 'Thumbnail + Content' ){
    if(have_rows('thumbnail_content')): while(have_rows('thumbnail_content')): the_row();
    echo '<section class="position-relative content-on-left ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    $bgImg = get_sub_field('background_image');

    if($bgImg){
        echo wp_get_attachment_image($bgImg['id'],'full','',[
            'class'=>'w-100 h-100 position-absolute bg-img',
            'style'=>'top:0;left:0;object-fit:cover;pointer-events:none;'
        ]);
    }

    echo '<div class="container">';

    // if(have_rows('thumbnail_content_repeater')):
    echo '<div class="row justify-content-center ' . get_sub_field('row_classes') . '" style="' . get_sub_field('row_style') . '">';
        // while(have_rows('thumbnail_content_repeater')): the_row();
    echo '<div class="col-lg-4 col-md-6 pt-2 pb-2 ' . get_sub_field('image_column_classes') . '" style="' . get_sub_field('image_column_style') . '"">';
    $image = get_sub_field('image');

    if($image){
        echo wp_get_attachment_image($image['id'],'full','',[
            'class'=>'w-100 h-auto ' . get_sub_field('image_classes'),
            'style'=>'max-width:175px;' . get_sub_field('image_style')
        ]);
    }

    echo '</div>';

    echo '<div class="col-lg-4 col-md-6 pt-2 pb-2 ' . get_sub_field('column_classes') . '" style="' . get_sub_field('column_style') . '">';
    echo '<div>';
        echo '<span class="pt-4 d-inline-block">' . get_sub_field('title') . '</span>';
        echo '<div class="" style="color:#8d8c8a;">';
        echo get_sub_field('content');
        echo '</div>';
        echo '</div>';
    echo '</div>';
    // endwhile;

    echo '</div>';
    // endif;

    echo '</div>';

    echo '</section>';
    endwhile; endif;
}

endwhile; endif;
// end of intro

?>