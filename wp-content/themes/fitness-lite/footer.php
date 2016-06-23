<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Fitness
 */
?>
<div id="footer-wrapper">
    	<div class="container">
             <div class="cols-4 widget-column-1">            	
               <h5><?php echo esc_attr(get_theme_mod('menu_title',__('Quick Links','fitness-lite'))); ?></h5>
                <div class="menu">
                  <ul>
                   <?php echo wp_kses_post(get_theme_mod('footer_menu', __('<li><a href="#">Home</a></li><li><a href="#">About Us</a></li><li><a href="#">Portfolio</a></li><li><a href="#">Contact Us</a></li>','fitness-lite'))); ?>
                  </ul>
                </div>
            </div>                  
			         
             
             <div class="cols-4 widget-column-2">            	
               <h5><?php echo esc_attr(get_theme_mod('news_title',__('Recent Posts','fitness-lite'))); ?></h5>            	
				<?php $args = array( 'posts_per_page' => 2, 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc' );
                    query_posts( $args ); ?>
                    
                  <?php while ( have_posts() ) :  the_post(); ?>
                        <div class="recent-post">
                         <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                         <a href="<?php the_permalink(); ?>"><h6><?php the_title(); ?></h6></a>                         
                         <?php echo fitnesslite_content(8); ?>                         
                        </div>
                 <?php endwhile; ?>
              </div>     
                      
               <div class="cols-4 widget-column-3">
                   <h5><?php echo esc_attr(get_theme_mod('social_title',__('Follow Us','fitness-lite'))); ?></h5>  
                             	
					<div class="clear"></div>                
                  <div class="social-icons">
					<?php if ( '' !== get_theme_mod('fb_link')) { ?>
                    <a title="facebook" class="fa fa-facebook" target="_blank" href="<?php echo esc_url(get_theme_mod('fb_link','#facebook')); ?>"></a> 
                    <?php } ?>
                    
                    <?php if ( '' !== get_theme_mod('twitt_link')) { ?>
                    <a title="twitter" class="fa fa-twitter" target="_blank" href="<?php echo esc_url(get_theme_mod('twitt_link','#twitter')); ?>"></a>
                    <?php } ?> 
                    
                    <?php if ( '' !== get_theme_mod('gplus_link')) { ?>
                    <a title="google-plus" class="fa fa-google-plus" target="_blank" href="<?php echo esc_url(get_theme_mod('gplus_link','#gplus')); ?>"></a>
                    <?php } ?>
                    
                    <?php if ( '' !== get_theme_mod('linked_link')) { ?> 
                    <a title="linkedin" class="fa fa-linkedin" target="_blank" href="<?php echo esc_url(get_theme_mod('linked_link','#linkedin')); ?>"></a>
                    <?php } ?>
                  </div>   
                </div>
                
                <div class="cols-4 widget-column-4">
                   <h5><?php echo esc_attr(get_theme_mod('contact_title',__('Fitness Center','fitness-lite'))); ?></h5> 
                   <p><?php echo esc_attr(get_theme_mod('contact_add',__('100 King St, Melbourne PIC 4000, Australia','fitness-lite'))); ?></p>
              <div class="phone-no"><strong><?php esc_attr_e('Phone','fitness-lite');?>:</strong> <?php echo esc_attr(get_theme_mod('contact_no',__('+123 456 7890','fitness-lite'))); ?> <br  />
             
           <strong> <?php _e('Email','fitness-lite');?>:</strong> <a href="mailto:<?php echo sanitize_email(get_theme_mod('contact_mail','contact@company.com')); ?>"><?php echo esc_attr(get_theme_mod('contact_mail','contact@company.com')); ?></a></div>
                </div><!--end .widget-column-4-->

            <div class="clear"></div>
        </div><!--end .container-->
        
        <div class="copyright-wrapper">
        	<div class="container">
                <div class="design-by"><?php echo fitnesslite_themebytext(); ?></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php wp_footer(); ?>

</body>
</html>