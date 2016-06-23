<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Fitness
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(''); ?> <?php if ( !is_home() || !is_front_page() ) {?>id="innerPage"<?php } ?>>
<?php if ( is_home() ) { ?>
<div class="headerhome">  
<?php } else { ?>
<div class="header"> 
<?php } ?>
        <div class="header-inner">
                <div class="logo">
                        <a href="<?php echo home_url('/'); ?>">
                                <h1><?php bloginfo('name'); ?></h1>
                                <span class="tagline"><?php bloginfo( 'description' ); ?></span>                          
                        </a>
                 </div><!-- logo -->                 
                <div class="toggle">
                <a class="toggleMenu" href="#"><?php _e('Menu','fitness-lite'); ?></a>
                </div><!-- toggle -->
                <div class="nav">                  
                    <?php wp_nav_menu( array('theme_location' => 'primary')); ?>
                </div><!-- nav --><div class="clear"></div>
                    </div><!-- header-inner -->
</div><!-- header -->
<?php if ( is_front_page() && is_home() ) { ?>
<!-- Slider Section -->
<?php for($sld=4; $sld<7; $sld++) { ?>
<?php if( get_theme_mod('page-setting'.$sld)) { ?>
<?php $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$sld,true)); ?>
<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
$img_arr[] = $image;
$id_arr[] = $post->ID;
endwhile;
}
}
if(!empty($id_arr)){ ?> 
    <section id="home_slider">
    <div class="slider-wrapper theme-default"><div id="slider" class="nivoSlider">
	<?php 
	$i=1;
	foreach($img_arr as $url){ ?><img src="<?php echo $url; ?>" title="#slidecaption<?php echo $i; ?>" /><?php $i++; }  ?>
    </div>
	<?php 
    $i=1;
    foreach($id_arr as $id){ 
    $title = get_the_title( $id ); 
    $post = get_post($id); 
    $content = apply_filters('the_content', substr(strip_tags($post->post_content), 0, 250)); 
    ?>
    <div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
    <div class="slide_info">
    <h2><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h2>
    <p><?php echo $content; ?></p> 
    <a class="ReadMore" href="<?php the_permalink(); ?>"><?php _e('Read More','fitness-lite'); ?>&raquo;</a>
    </div>
    </div><?php $i++; } ?>
	</div>
	<div class="clear"></div> 
	</section>
	<?php } else { ?>
    <section id="home_slider">
    <div class="slider-wrapper theme-default">
  <div class="nivoSlider" id="slider"><img title="#slidecaption1" src="<?php echo get_template_directory_uri();?>/images/slides/slider1.jpg"><img title="#slidecaption2" src="<?php echo get_template_directory_uri();?>/images/slides/slider2.jpg"><img title="#slidecaption3" src="<?php echo get_template_directory_uri();?>/images/slides/slider3.jpg">
  </div>
  <div class="nivo-html-caption" id="slidecaption1">
    <div class="slide_info">
      <h2><a href="#"><?php _e('Welcome to Fitness Center','fitness-lite');?></a></h2>
      <p><?php _e('Lorem ipsum rhoncus euismod risus tristique imperdiet Morbi fringilla','fitness-lite');?></p>
      <a href="#" class="ReadMore"><?php _e('Read More','fitness-lite');?>&raquo;</a> </div>
  </div>
  <div class="nivo-html-caption" id="slidecaption2">
    <div class="slide_info">
      <h2><a href="#"><?php _e('The Fitness','fitness-lite');?></a></h2>
      <p><?php _e('Lorem ipsum rhoncus euismod risus tristique imperdiet Morbi fringilla','fitness-lite');?></p>
      <a href="#" class="ReadMore"><?php _e('Read More','fitness-lite');?>&raquo;</a> </div>
  </div>
  <div class="nivo-html-caption" id="slidecaption3">
    <div class="slide_info">
      <h2><a href="#"><?php _e('Welcome to Fitness Center','fitness-lite');?></a></h2>
      <p><?php _e('Lorem ipsum rhoncus euismod risus tristique imperdiet Morbi fringilla','fitness-lite');?></p>
      <a href="#" class="ReadMore"><?php _e('Read More','fitness-lite');?>&raquo;</a> </div>
  </div>
</div>
    </section>
	<?php } ?>
	<section id="wrapsecond">
            	<div class="container">
                    <div class="services-wrap">
                      <?php if( get_theme_mod('shortinfo_sb') ) { ?>
                           <?php echo get_theme_mod('shortinfo_sb'); ?>
                      <?php } else { ?>                      
                      <?php echo '<h2>What We Do</h2>
					  <p>We are possionate about our clients results.</p>'; } ?>
						<div class="space50"></div>
                       <!-- Home Boxes Section -->
						<?php
						for($bx=1; $bx<4; $bx++) { 
						if( get_theme_mod('page-setting'.$bx)) { 
						$bxquery = new WP_query('page_id='.get_theme_mod('page-setting'.$bx,true)); 
						while( $bxquery->have_posts() ) : $bxquery->the_post(); 
						?>
                        <div class="one_third <?php if($bx%3==0){ ?>last_column<?php } ?>"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?><h4><?php the_title(); ?></h4><?php echo fitnesslite_content(22); ?><span class="ReadMore"><?php _e('Read More','fitness-lite');?></span>
</a></div>
                        <?php endwhile; }else{?>
<div class="one_third <?php if($bx%3==0){ ?>last_column<?php } ?>"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/thumb_0<?php echo $bx; ?>.jpg"><h4><?php _e('Page Title','fitness-lite'); ?><?php echo $bx; ?></h4><p><?php _e('Phasellus viverra aliquet magna quis interduming. Sed quis fringilla massa. In ut porttitor felis necing iaculis mi. Proin tempo...','fitness-lite');?></p><span class="ReadMore"><?php _e('Read More','fitness-lite');?></span>
</a></div>                        
                        
                         <?php }}?>
                       <!-- Home Boxes Section -->
               </div><!-- services-wrap-->
              <div class="clear"></div>
            </div><!-- container -->
       </section><div class="clear"></div>
<?php
}
elseif ( is_front_page() ) { 
?>
<!-- Slider Section -->
<?php for($sld=4; $sld<7; $sld++) { ?>
<?php if( get_theme_mod('page-setting'.$sld)) { ?>
<?php $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$sld,true)); ?>
<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
$img_arr[] = $image;
$id_arr[] = $post->ID;
endwhile;
}
}
 
if(!empty($id_arr)){ ?> 
    <section id="home_slider">
    <div class="slider-wrapper theme-default"><div id="slider" class="nivoSlider">
	<?php 
	$i=1;
	foreach($img_arr as $url){ ?><img src="<?php echo $url; ?>" title="#slidecaption<?php echo $i; ?>" /><?php $i++; }  ?>
    </div>
	<?php 
    $i=1;
    foreach($id_arr as $id){ 
    $title = get_the_title( $id ); 
    $post = get_post($id); 
    $content = apply_filters('the_content', substr(strip_tags($post->post_content), 0, 250)); 
    ?>
    <div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
    <div class="slide_info">
    <h2><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h2>
    <p><?php echo $content; ?></p> 
    <a class="ReadMore" href="<?php the_permalink(); ?>"><?php _e('Read More','fitness-lite'); ?>&raquo;</a>
    </div>
    </div><?php $i++; } ?>
	</div>
	<div class="clear"></div> 
	</section>
	<?php } else { ?>
    <section id="home_slider">
    <div class="slider-wrapper theme-default">
  <div class="nivoSlider" id="slider"><img title="#slidecaption1" src="<?php echo get_template_directory_uri();?>/images/slides/slider1.jpg"><img title="#slidecaption2" src="<?php echo get_template_directory_uri();?>/images/slides/slider2.jpg"><img title="#slidecaption3" src="<?php echo get_template_directory_uri();?>/images/slides/slider3.jpg">
  </div>
  <div class="nivo-html-caption" id="slidecaption1">
    <div class="slide_info">
      <h2><a href="#"><?php _e('Welcome to Fitness Center','fitness-lite');?></a></h2>
      <p><?php _e('Lorem ipsum rhoncus euismod risus tristique imperdiet Morbi fringilla','fitness-lite');?></p>
      <a href="#" class="ReadMore"><?php _e('Read More','fitness-lite');?>&raquo;</a> </div>
  </div>
  <div class="nivo-html-caption" id="slidecaption2">
    <div class="slide_info">
      <h2><a href="#"><?php _e('The Fitness','fitness-lite');?></a></h2>
      <p><?php _e('Lorem ipsum rhoncus euismod risus tristique imperdiet Morbi fringilla','fitness-lite');?></p>
      <a href="#" class="ReadMore"><?php _e('Read More','fitness-lite');?>&raquo;</a> </div>
  </div>
  <div class="nivo-html-caption" id="slidecaption3">
    <div class="slide_info">
      <h2><a href="#"><?php _e('Welcome to Fitness Center','fitness-lite');?></a></h2>
      <p><?php _e('Lorem ipsum rhoncus euismod risus tristique imperdiet Morbi fringilla','fitness-lite');?></p>
      <a href="#" class="ReadMore"><?php _e('Read More','fitness-lite');?>&raquo;</a> </div>
  </div>
</div>
    </section>
	<?php } ?>
	<section id="wrapsecond">
            	<div class="container">
                    <div class="services-wrap">
                      <?php if( get_theme_mod('shortinfo_sb') ) { ?>
                           <?php echo get_theme_mod('shortinfo_sb'); ?>
                      <?php } else { ?>                      
                      <?php echo '<h2>What We Do</h2>
<p>We are possionate about our clients results.</p>'; } ?>

<div class="space50"></div>
                       <!-- Home Boxes Section -->
						<?php
						for($bx=1; $bx<4; $bx++) { 
						if( get_theme_mod('page-setting'.$bx)) { 
						$bxquery = new WP_query('page_id='.get_theme_mod('page-setting'.$bx,true)); 
						while( $bxquery->have_posts() ) : $bxquery->the_post(); 
						?>
                        <div class="one_third <?php if($bx%3==0){ ?>last_column<?php } ?>"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?><h4><?php the_title(); ?></h4><?php echo fitnesslite_content(22); ?><span class="ReadMore"><?php _e('Read More','fitness-lite');?></span>
</a></div>
                        <?php endwhile; }else{?>
<div class="one_third <?php if($bx%3==0){ ?>last_column<?php } ?>"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/thumb_0<?php echo $bx; ?>.jpg"><h4><?php _e('Page Title','fitness-lite'); ?><?php echo $bx; ?></h4><p><?php _e('Phasellus viverra aliquet magna quis interduming. Sed quis fringilla massa. In ut porttitor felis necing iaculis mi. Proin tempo...','fitness-lite');?></p><span class="ReadMore"><?php _e('Read More','fitness-lite');?></span>
</a></div>                        
                         <?php }}?>
                       <!-- Home Boxes Section -->
               </div><!-- services-wrap-->
              <div class="clear"></div>
            </div><!-- container -->
       </section><div class="clear"></div>
<?php
}
elseif ( is_home() ) {
?>
<section id="home_slider" style="display:none;"></section>
<section id="wrapsecond" style="display:none;"></section>
<div class="space50"></div>
<div class="space50"></div>
<?php
}
?> 