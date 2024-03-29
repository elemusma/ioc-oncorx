<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 

if(get_field('header', 'options')) { the_field('header', 'options'); }

if(get_field('custom_css')) { 
?> 
<style>
<?php the_field('custom_css'); ?>
</style>
<?php 
}
wp_head(); 
?>
</head>
<body <?php body_class(); ?>>
<?php
if(get_field('body','options')) { the_field('body','options'); }
echo '<div class="blank-space"></div>';
echo '<header class="position-relative pt-3 pb-3 z-3 box-shadow bg-white w-100" style="top:0;left:0;">';

echo '<div class="nav">';
echo '<div class="container">';
echo '<div class="row align-items-center justify-content-end">';
echo '<div class="col-lg-4 col-8">';
echo '<a href="' . home_url() . '">';

$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",[
    'class'=>'w-100',
    'style'=>'height:75px;object-fit:contain;'
]); 
}

echo '</a>';
echo '</div>';

echo '<div class="col-lg-4 col-4">';

wp_nav_menu(array(
    'menu' => 'Contact',
    'menu_class'=>'menu d-md-flex flex-wrap list-unstyled justify-content-end mb-0'
));

echo '</div>';
// echo '<div class="col-lg-4 col-6 desktop-hidden">';
// echo '<a id="navToggle" class="nav-toggle">';
// echo '<div>';
// echo '<div class="line-1 bg-accent"></div>';
// echo '<div class="line-2 bg-accent"></div>';
// echo '<div class="line-3 bg-accent"></div>';
// echo '</div>';
// echo '</a>';
// echo '</div>';
echo '<div id="navMenuOverlay" class="position-fixed z-2"></div>';
echo '<div class="col-lg-4 col-md-8 col-11 nav-items bg-white desktop-hidden" id="navItems">';

echo '<div class="pt-5 pb-5">';
echo '<div class="close-menu">';
echo '<div>';
echo '<span id="navMenuClose" class="close h1">X</span>';
echo '</div>';
echo '</div>';
echo '<a href="' . home_url() . '">';

$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto','style'=>'max-width:250px;']);
}

echo '</a>';
echo '</div>';
wp_nav_menu(array(
'menu' => 'primary',
'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-center mb-0'
)); 
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '</header>';

// if(!is_single()){
    echo '<section class="hero position-relative">';
    // if(is_front_page()) {

    //     $globalPlaceholderImg = get_field('global_placeholder_image','options');
    // if(is_page()){
    // if(has_post_thumbnail()){
    the_post_thumbnail('full', array('class' => 'w-100 h-100 bg-img position-absolute'));
    // } else {
    // echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute']);
    // }
    // } else {
    // echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute']);
    // }

    if(is_front_page()){
        echo '<div class="position-absolute w-100 h-100" style="background: rgb(255,255,255);
        background: linear-gradient(90deg, rgba(255,255,255,1) 20%, rgba(0,0,0,0) 100%);top:0;left:0;"></div>';
    }

    echo '<div class="hero-padding" style="padding:25px 0px;">';
    // echo '<div class="position-relative">';
    // echo '<div class="multiply overlay position-absolute w-100 h-100 bg-img"></div>';
    // echo '<div class="position-relative">';
    echo '<div class="container-fluid">';
    echo '<div class="row">';
    echo '<div class="col-12 pl-lg-0" data-aos="fade-right">';
    echo '<h1 class="pt-3 pb-3 pl-lg-5 mb-0 text-accent">' . get_the_title() . '</h1>';

    echo '<div class="divider mt-4 mb-4" style="width:100%;max-width:650px;"></div>';

    echo '<div class="pl-lg-5">';
    if ( have_posts() ) : while ( have_posts() ) : the_post();
    the_content();
    endwhile;
    endif;
    echo '</div>';

    echo '</div>';
    echo '</div>';
    echo '</div>';
    // echo '</div>';
    // echo '</div>';
    echo '</div>';
    // }



    // if(!is_front_page()) {
    // echo '<div class="container pt-5 pb-5 text-white text-center">';
    // echo '<div class="row">';
    // echo '<div class="col-md-12">';
    // if(is_page() || !is_front_page()){
    // echo '<h1 class="">' . get_the_title() . '</h1>';
    // } elseif(is_single()){
    // echo '<h1 class="">' . get_single_post_title() . '</h1>';
    // } elseif(is_author()){
    // echo '<h1 class="">Author: ' . get_the_author() . '</h1>';
    // } elseif(is_tag()){
    // echo '<h1 class="">' . get_single_tag_title() . '</h1>';
    // } elseif(is_category()){
    // echo '<h1 class="">' . get_single_cat_title() . '</h1>';
    // } elseif(is_archive()){
    // echo '<h1 class="">' . get_archive_title() . '</h1>';
    // }
    // elseif(!is_front_page() && is_home()){
    // echo '<h1 class="">' . get_the_title(133) . '</h1>';
    // }
    // echo '</div>';
    // echo '</div>';
    // echo '</div>';
    // }

    echo '</section>';
// }
?>