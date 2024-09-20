<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background;
/**
 * 
 * Newsletter Widget .
 *
 */
class Ruffer_Newsletter_Widgets extends Widget_Base {

	public function get_name() {
		return 'ruffernewsletter2';
	}

	public function get_title() {
		return __( 'Ruffer Newsletter', 'ruffer' );
	}


	public function get_icon() {
		return 'eicon-code';
    }
    

	public function get_categories() {
		return [ 'ruffer' ];
	}

	
	protected function register_controls() {

		$this->start_controls_section(
			'newsletter_content',
			[
				'label' 	=> __( 'Newsletter', 'ruffer' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'newsletter_title',
			[
				'label' 		=> __( 'Newsletter Title', 'ruffer' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Subscribe to our newsletter', 'ruffer' ),
				'rows'			=> 2,
			]
		);
		$this->add_control(
			'newsletter_placeholder',
			[
				'label' 		=> __( 'Newsletter Placeholder Text', 'ruffer' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Enter Your Email', 'ruffer' ),
				'rows'			=> 2,
			]
		);

        $this->end_controls_section();

        /*-----------------------------------------section Content styling------------------------------------*/

		$this->start_controls_section(
			'section_con_styling',
			[
				'label' 	=> __( 'Content Style', 'digalu' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs1'
		);


		$this->start_controls_tab(
			'style_normal_tab1',
			[
				'label' => esc_html__( 'Title', 'digalu' ),
			]
		);
        $this->add_control(
			's_title_color',
			[
				'label' 		=> __( 'Color', 'digalu' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .text-white'	=> '--white-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 's_title_typography',
		 		'label' 		=> __( 'Typography', 'digalu' ),
		 		'selector' 	=> '{{WRAPPER}} h2',
			]
		);

        $this->add_responsive_control(
			's_title_margin',
			[
				'label' 		=> __( 'Margin', 'digalu' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
        );

        $this->add_responsive_control(
			's_title_padding',
			[
				'label' 		=> __( 'Padding', 'digalu' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'

				],
			]
        );
		$this->end_controls_tab();

	
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="row justify-content-end align-items-center">';
            echo '<div class="col-lg-5 col-md-8">';
            	if(!empty($settings['newsletter_title'])){
	                echo '<div class="title-area mb-0 me-xl-5 text-md-start text-center">';
	                    echo '<h2 class="sec-title h3 text-white">'.esc_html($settings['newsletter_title']).'</h2>';
	                echo '</div>';
	            }
            echo '</div>';
            echo '<div class="col-lg-4 col-md-4 mt-4 mt-md-0 text-md-end">';
                echo '<div class="widget newsletter-widget footer-widget mb-0">';
                    echo '<form class="newsletter-form">';
                        echo '<input class="form-control" type="email" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'" required="">';
                        echo '<button type="submit" class="th-btn"><i class="far fa-paper-plane"></i></button>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';
        echo '</div>';    
	}

}

						