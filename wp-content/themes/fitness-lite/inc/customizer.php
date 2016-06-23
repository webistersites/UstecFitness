<?php
/**
 * SKT Fitness Theme Customizer
 *
 * @package SKT Fitness
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fitnesslite_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class fitnesslite_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	class WP_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');
	
	$wp_customize->add_section(
        'logo_sec',
        array(
            'title' => __('Logo (PRO Version)', 'fitness-lite'),
            'priority' => 1,
 			'description' => sprintf( __( 'Logo Settings available in <br /> %s.', 'fitness-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'fitness-lite' )
						)
					),			
        )
    );  
    $wp_customize->add_setting('fitnesslite_options[logo-info]',array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new fitnesslite_Info( $wp_customize, 'logo_section', array(
        'section' => 'logo_sec',
        'settings' => 'fitnesslite_options[logo-info]',
        'priority' => null
        ) )
    );
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#ff4e1c',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','fitness-lite'),
 			'description' => sprintf( __( 'More color options in <br /> %s.', 'fitness-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'fitness-lite' )
						)
					),			
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_section('slider_below_desc',array(
		'title'	=> __('Slider Below Info','fitness-lite'),
		'description'	=> __('Title & Description Below The Slider','fitness-lite'),
		'priority'	=> null
	));
	$wp_customize->add_setting('shortinfo_sb',array(
			'default'	=> __('<h2>What We Do</h2>
<p>We are possionate about our clients results.</p>','fitness-lite'),
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'shortinfo_sb', array(
				'label'	=> __('','fitness-lite'),
				'setting'	=> 'shortinfo_sb',
				'section'	=> 'slider_below_desc'
			)
		)
	);	

// Home Boxes 	
	$wp_customize->add_section('page_boxes',array(
		'title'	=> __('Home Boxes','fitness-lite'),
 			'description' => sprintf( __( 'Featured Image Dimensions : ( 270 X 200 )<br/> Select Featured Image for these pages <br /> How to set featured image %s', 'fitness-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_THEME_FEATURED_SET_VIDEO_URL.'"' ), __( 'Click Here ?', 'fitness-lite' )
						)
					),
		'priority'	=> null
	));
	
	$wp_customize->add_setting(
    'page-setting1',
		array(
			'sanitize_callback' => 'fitnesslite_sanitize_integer',
		)
	);
 
	$wp_customize->add_control(
		'page-setting1',
		array(
			'type' => 'dropdown-pages',
			'label' => __('Select page for box one:','fitness-lite'),
			'section' => 'page_boxes',
		)
	);
	
	$wp_customize->add_setting('page-setting2',array(
			'sanitize_callback'	=> 'fitnesslite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box two:','fitness-lite'),
			'section'	=> 'page_boxes'	
	));
	
	$wp_customize->add_setting('page-setting3',array(
			'sanitize_callback'	=> 'fitnesslite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box three:','fitness-lite'),
			'section'	=> 'page_boxes'
	));
	
// Home Boxes
	$wp_customize->add_section('slider_section',array(
		'title'	=> __('Slider Settings','fitness-lite'),
		'description' => sprintf( __( 'Slider Image Dimensions ( 1400 X 682 )<br/> Select Featured Image for these pages <br /> How to set featured image <a href="%1$s" target="_blank">Click Here ?</a><br/><br/> More slider settings available in <a href="%2$s" target="_blank">PRO Version</a>', 'fitness-lite' ),
			esc_url( '"'.SKT_THEME_FEATURED_SET_VIDEO_URL.'"' ),
			esc_url( '"'.SKT_PRO_THEME_URL.'"' )
		),			   	
		'priority'		=> null
	));
// Slider Section

	$wp_customize->add_setting('page-setting4',array(
			'sanitize_callback'	=> 'fitnesslite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting4',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','fitness-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting5',array(
			'sanitize_callback'	=> 'fitnesslite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting5',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','fitness-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting6',array(
			'sanitize_callback'	=> 'fitnesslite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting6',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','fitness-lite'),
			'section'	=> 'slider_section'
	));	
 
// Slider Section

	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Social Settings','fitness-lite'),
 			'description' => sprintf( __( 'Add social icons link here. More social icons availabel in <br /> %s.', 'fitness-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'fitness-lite' )
						)
					),			
			'priority'		=> null
	));
	$wp_customize->add_setting('fb_link',array(
			'default'	=> '#facebook',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','fitness-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> '#twitter',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','fitness-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> '#gplus',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','fitness-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> '#linkedin',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','fitness-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	$wp_customize->add_section('footer_area',array(
			'title'	=> __('Footer Area','fitness-lite'),
			'priority'	=> null
	));
	$wp_customize->add_setting('fitnesslite_options[credit-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new fitnesslite_Info( $wp_customize, 'cred_section', array(
        'section' => 'footer_area',
        'settings' => 'fitnesslite_options[credit-info]'
        ) )
    );
	$wp_customize->add_setting('menu_title',array(
			'default'	=> __('Quick Links','fitness-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('menu_title',array(
			'label'	=> __('Add title for menu','fitness-lite'),
			'section'	=> 'footer_area',
			'setting'	=> 'menu_title'
	));	
	
	$wp_customize->add_setting('footer_menu',array(
			'default'	=> __('<li><a href="#">Home</a></li><li><a href="#">About Us</a></li> <li><a href="#">Portfolio</a></li><li><a href="#">Contact Us</a></li>','fitness-lite'),
			'sanitize_callback'	=> 'wp_kses_post'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'footer_menu', array(
				'label'	=> __('','fitness-lite'),
				'section'	=> 'footer_area',
				'setting'	=> 'footer_menu'
			)
		)
	);
	
	$wp_customize->add_setting('news_title',array(
			'default'	=> __('Recent Posts','fitness-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('news_title',array(
			'label'	=> __('Add title for latest news','fitness-lite'),
			'section'	=> 'footer_area',
			'setting'	=> 'news_title'
	));	
	
	$wp_customize->add_setting('social_title',array(
			'default'	=> __('Follow Us','fitness-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('social_title',array(
			'label'	=> __('Add title for footer social icons','fitness-lite'),
			'section'	=> 'footer_area',
			'setting'	=> 'social_title'
	));	
	
	$wp_customize->add_setting('contact_title',array(
			'default'	=> __('Fitness Center','fitness-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('contact_title',array(
			'label'	=> __('Add title for footer contact info','fitness-lite'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_title'
	));	
	
	
	$wp_customize->add_section('contact_sec',array(
			'title'	=> __('Contact Details','fitness-lite'),
			'description'	=> __('Add you contact details here','fitness-lite'),
			'priority'	=> null
	));	
	
	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> __('100 King St, Melbourne PIC 4000, Australia','fitness-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'contact_add', array(
				'label'	=> __('Add contact address here','fitness-lite'),
				'section'	=> 'contact_sec',
				'setting'	=> 'contact_add'
			)
		)
	);
	$wp_customize->add_setting('contact_no',array(
			'default'	=> __('+123 456 7890','fitness-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> __('Add contact number here.','fitness-lite'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_no'
	));
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> 'contact@company.com',
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> __('Add you email here','fitness-lite'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_mail'
	));
	
	$wp_customize->add_section(
        'theme_layout_sec',
        array(
            'title' => __('Layout Settings (PRO Version)', 'fitness-lite'),
            'priority' => null,
 			'description' => sprintf( __( 'Layout Settings available in <br /> %s.', 'fitness-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'fitness-lite' )
						)
					),
        )
    );  
    $wp_customize->add_setting('fitnesslite_options[layout-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new fitnesslite_Info( $wp_customize, 'layout_section', array(
        'section' => 'theme_layout_sec',
        'settings' => 'fitnesslite_options[layout-info]',
        'priority' => null
        ) )
    );
	
	$wp_customize->add_section(
        'theme_font_sec',
        array(
            'title' => __('Fonts Settings (PRO Version)', 'fitness-lite'),
            'priority' => null,
 			'description' => sprintf( __( 'Font Settings available in <br /> %s.', 'fitness-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'fitness-lite' )
						)
					),			
        )
    );  
    $wp_customize->add_setting('fitnesslite_options[font-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new fitnesslite_Info( $wp_customize, 'font_section', array(
        'section' => 'theme_font_sec',
        'settings' => 'fitnesslite_options[font-info]',
        'priority' => null
        ) )
    );
	
    $wp_customize->add_section(
        'theme_doc_sec',
        array(
            'title' => __('Documentation &amp; Support', 'fitness-lite'),
            'priority' => null,
 			'description' => sprintf( __( 'For documentation and support check this link : <br /> %s.', 'fitness-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_THEME_DOC.'"' ), __( 'fitness Documentation', 'fitness-lite' )
						)
					),			
        )
    );  
    $wp_customize->add_setting('fitnesslite_options[info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new fitnesslite_Info( $wp_customize, 'doc_section', array(
        'section' => 'theme_doc_sec',
        'settings' => 'fitnesslite_options[info]',
        'priority' => 10
        ) )
    );		
}
add_action( 'customize_register', 'fitnesslite_customize_register' );

//Integer
function fitnesslite_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function fitnesslite_custom_css(){
		?>
        	<style type="text/css"> 
					
					a, .blog_lists h2 a:hover,
					#sidebar ul li a:hover,
					.recent-post h6:hover,					
					.cols-4 ul li a:hover, .cols-4 ul li.current_page_item a,
					#wrapsecond h2 span,
					.services-wrap .one_third h4 span,
					.copyright-txt span,
					.phone-no strong,
					.cols-4 h5 span
					{ color:<?php echo esc_attr(get_theme_mod('color_scheme','#ff4e1c')); ?>;}
					 
					.social-icons a:hover, 
					.pagination ul li .current, .pagination ul li a:hover, 
					#commentform input#submit:hover,
					.ReadMore:hover,
					.nivo-controlNav a.active, .bookbtn,
					.services-wrap .one_third:hover .ReadMore,
					h3.widget-title,
					.MoreLink:hover,
					.wpcf7 input[type="submit"]
					{ background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#ff4e1c')); ?>;}
					
					.ReadMore, .MoreLink,
					.services-wrap .one_third:hover
					{ border-color:<?php echo esc_attr(get_theme_mod('color_scheme','#ff4e1c')); ?>;}
					
			</style> 
<?php 
}
         
add_action('wp_head','fitnesslite_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fitnesslite_customize_preview_js() {
	wp_enqueue_script( 'fitnesslite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'fitnesslite_customize_preview_js' );


function fitnesslite_custom_customize_enqueue() {
	wp_enqueue_script( 'fitness-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'fitnesslite_custom_customize_enqueue' );