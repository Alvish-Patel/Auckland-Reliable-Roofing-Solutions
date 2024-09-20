<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
/**
 *
 * Contact Widget .
 *
 */
class Ruffer_Contact_Form extends Widget_Base{

	public function get_name() {
		return 'ruffercontactform';
	}

	public function get_title() {
		return __( 'Contact Form', 'ruffer' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'ruffer' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'contact_section',
			[
				'label' 	=> __( 'Contact Form', 'ruffer' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'layout',
			[
				'label' 		=> __( 'Contact Style', 'ruffer' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'ruffer' ),
					'two' 			=> __( 'Style Two', 'ruffer' ),
				],
			]
		);
		$this->add_control(
			'exclude_post_name',
			[
				'label'         => __( 'Chose a style from here', 'ruffer' ),
                'type'          => Controls_Manager::SELECT,
				'options'       => $this->ruffer_cf7_id(),
			]
        );
        $this->add_control(
			'title',
			[
				'label' 	=> __( 'Title', 'ruffer' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Get in Touch', 'ruffer' ),
                
			]
        );
        $this->add_control(
			'subtitle',
			[
				'label' 	=> __( 'Subtitle', 'ruffer' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Get in Touch', 'ruffer' ),
                'condition'		=> [ 'layout' => [ 'two'] ],
                
			]
        );
        $this->add_control(
			'desc',
			[
				'label' 	=> __( 'Description', 'ruffer' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'  	=> __( 'Get in Touch', 'ruffer' ),
                'condition'		=> [ 'layout' => [ 'two'] ],
                
			]
        );
        $this->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'ruffer' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => [ 'one'] ],
			]
		);
        
		$this->end_controls_section();


        //---------------------------------------Title Style---------------------------------------//

		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'ruffer' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .text-white' => '--white-color: {{VALUE}}',
                ],
			]
        );		
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'ruffer' ),
                'selector' 	=> '{{WRAPPER}} h3',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();
	}

	// Get Specific Post
    public function ruffer_cf7_id(){
        $args = array(
            'post_type'         => 'wpcf7_contact_form',
            'posts_per_page'    => -1,
        );

        $ruffer_cf7 = new WP_Query( $args );

        $postarray = [];

        while( $ruffer_cf7->have_posts() ){
            $ruffer_cf7->the_post();
            $postarray[get_the_title()] = get_the_title();
        }
        wp_reset_postdata();
        return $postarray;
    }

	protected function render() {

		$settings = $this->get_settings_for_display();

		global $wpdb;
        $postTitle = $settings['exclude_post_name']; 
        $postID = $wpdb->get_var($wpdb->prepare("SELECT ID FROM {$wpdb->posts} WHERE   post_type='wpcf7_contact_form' AND post_title = %s",$postTitle));

		echo '<!-----------------------Start Contact Form----------------------->';
			if( $settings['layout'] == 'one' ){

				echo '<div class="appointment-form-wrap bg-theme" data-bg-src="'.esc_url($settings['image']['url']).'">';
					if( ! empty( $settings['title'] ) ){
	                    echo '<h3 class="h5 text-white mb-35">'.wp_kses_post( $settings['title'] ).'</h3>';
	                }
                    echo do_shortcode( '[contact-form-7 id="'.esc_attr($postID).'" title="'.esc_attr($settings['exclude_post_name']).'"]' );

                echo '</div>';
	        }else{
	        	echo '<div class="apppointment-area-2">';
		            echo '<div class="row justify-content-between">';
		                echo '<div class="col-lg-5">';
		                    echo '<div class="title-area mb-25">';
		                    	if( ! empty( $settings['title'] ) ){
			                        echo '<span class="sub-title">'.wp_kses_post( $settings['title'] ).'</span>';
			                    }
			                    if( ! empty( $settings['subtitle'] ) ){
			                        echo '<h2 class="sec-title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
			                    }
		                    echo '</div>';
		                    if( ! empty( $settings['desc'] ) ){
			                    echo '<div class="appointment-wrap mb-lg-0 mb-40">';
			                        echo '<div class="about-info-wrap style4">';
			                            echo wp_kses_post( $settings['desc'] );
			                        echo '</div>';

			                    echo '</div>';
			                }
		                echo '</div>';
		                echo '<div class="col-lg-7">';
		                    echo do_shortcode( '[contact-form-7 id="'.esc_attr($postID).'" title="'.esc_attr($settings['exclude_post_name']).'"]' );
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
	        }

		echo '<!-----------------------End Contact Form----------------------->';
	}
}