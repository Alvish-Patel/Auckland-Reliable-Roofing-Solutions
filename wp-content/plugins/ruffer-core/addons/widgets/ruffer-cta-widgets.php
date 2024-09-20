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
class Ruffer_CTA_Widget extends Widget_Base{

	public function get_name() {
		return 'rufferctawidget';
	}

	public function get_title() {
		return __( 'Ruffer CTA', 'ruffer' );
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
			]
        );
        $this->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'ruffer' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Get More Info', 'ruffer' ),
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Button Link', 'ruffer' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'ruffer' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
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

	
	protected function render() {

		$settings = $this->get_settings_for_display();


		echo '<div class="footer-top">';
            echo '<div class="row align-items-center justify-content-between">';
                echo '<div class="col-xl-auto col-lg-7">';
                    echo '<div class="title-area mb-lg-0 text-lg-start text-center">';
                    	if( ! empty( $settings['title'] ) ){
	                        echo '<span class="sub-title style2 text-white">'.wp_kses_post( $settings['title'] ).'</span>';
	                    }
	                    if( ! empty( $settings['subtitle'] ) ){
	                        echo '<h2 class="sec-title text-white mb-0">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
	                    }
                    echo '</div>';
                echo '</div>';
                if(!empty($settings['button_text'])){
	                echo '<div class="col-xl-auto col-lg-4 text-center">';
	                    echo '<a href="'.esc_url( $settings['button_link']['url'] ).'" class="th-btn style2">'.esc_html($settings['button_text']).'<i class="fa-regular fa-arrow-right ms-2"></i></a>';
	                echo '</div>';
	            }
            echo '</div>';
        echo '</div>';
		echo '<!-----------------------End Contact Form----------------------->';
	}
}