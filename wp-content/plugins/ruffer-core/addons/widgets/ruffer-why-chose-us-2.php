<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * WCU Widget .
 *
 */
class Ruffer_Chose_Us_2 extends Widget_Base {

	public function get_name() {
		return 'rufferwcu2';
	}

	public function get_title() {
		return __( 'Why Chose Us 2', 'ruffer' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'ruffer' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'heading_section',
			[
				'label'		 	=> __( 'Section Heading', 'ruffer' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Section Title', 'ruffer' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Ut fermentum massa justo', 'ruffer' )
			]
        );
        $this->add_control(
			'section_subtitle',
			[
				'label' 	=> __( 'Section Subtitle', 'ruffer' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Ut fermentum massa justo', 'ruffer' )
			]
        );
        $this->add_control(
			'thumb',
			[
				'label' 		=> __( 'Image', 'ruffer' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->end_controls_section();


        $this->start_controls_section(
			'feature_section',
			[
				'label'		 	=> __( 'Features', 'ruffer' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'ruffer' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'content',
			[
				'label'     => __( 'Content', 'ruffer' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
			]
        );
        $repeater->add_control(
			'url',
			[
				'label'     => __( 'URL', 'ruffer' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'image',
			[
				'label' 		=> __( 'Image', 'ruffer' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'features2',
			[
				'label' 		=> __( 'Steps', 'ruffer' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'ruffer' ),
					],
				],
			]
		);
        $this->end_controls_section();



        //-------------------------------------title styling-------------------------------------//

        $this->start_controls_section(
			'section_title_style_section',
			[
				'label' => __( 'Title Style', 'ruffer' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' 	=> [
                    'section_title!'    => ''
                ]
			]
		);

        $this->add_control(
			'section_title_color',
			[
				'label' 	=> __( 'Title Color', 'ruffer' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title-selector' => 'color: {{VALUE}};',
                ],
			]
        );

        $this->add_control(
			'section_title_highlight_color',
			[
				'label' 	=> __( 'Title Highlighted Color', 'ruffer' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title-selector b' => 'color: {{VALUE}};',
					'{{WRAPPER}} .title-selector span' => 'color: {{VALUE}};',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_title_typography',
				'label' 	=> __( 'Title Typography', 'ruffer' ),
                'selector' 	=> '{{WRAPPER}} .title-selector',
			]
		);

        $this->add_responsive_control(
			'section_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .title-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'section_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .title-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();


        //-------------------------------------subtitle styling-------------------------------------//

        $this->start_controls_section(
			'section_subtitle_style_section',
			[
				'label' => __( 'Subtitle Style', 'ruffer' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_subtitle_color',
			[
				'label' 		=> __( 'Subtitle Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .subtitle-selector' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_subtitle_typography',
				'label' 	=> __( 'Subtitle Typography', 'ruffer' ),
                'selector' 	=> '{{WRAPPER}} .subtitle-selector',
			]
        );

        $this->add_responsive_control(
			'section_subtitle_margin',
			[
				'label' 		=> __( 'Subtitle Margin', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .subtitle-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

			]
        );
        $this->add_responsive_control(
			'section_subtitle_padding',
			[
				'label' 		=> __( 'Subtitle Padding', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .subtitle-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();  
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="why-sec-v3 position-relative space-bottom">';
        	if( ! empty( $settings['thumb']['url'] ) ){
		        echo '<div class="img-half img-right wcu-thumb-3">';
		            echo '<img src="'.$settings['thumb']['url'].'" alt="img">';
		        echo '</div>';
		    }
	        echo '<div class="container">';
	            echo '<div class="row">';
	                echo '<div class="col-xxl-7 col-xl-8">';
	                    echo '<div class="title-area mb-35">';
	                    	if( ! empty( $settings['section_title'] ) ){
		                        echo '<span class="sub-title title-selector">'.esc_html( $settings['section_title'] ).'</span>';
		                    }
		                    if( ! empty( $settings['section_subtitle'] ) ){
		                        echo '<h2 class="sec-title text-white subtitle-selector">'.esc_html( $settings['section_subtitle'] ).'</h2>';
		                    }
	                    echo '</div>';
	                    echo '<div class="wcu-card-slider th-carousel row g-0" data-slide-show="3" data-ml-slide-show="3" data-md-slide-show="3" data-sm-slide-show="2" data-dots="false">';
	                    	foreach( $settings['features2'] as $data ) {  
		                        echo '<div class="col-sm-6">';
		                            echo '<div class="wcu-card-wrap mt-10 bg-white">';
		                                echo '<div class="wcu-card style3">';
		                                	if( ! empty( $data['image']['url'] ) ){
			                                    echo '<div class="wcu-card_icon">';
			                                        echo '<img src="'.$data['image']['url'].'" alt="img">';
			                                    echo '</div>';
			                                }
		                                    echo '<div class="wcu-card_details">';
		                                    	if( ! empty( $data['title'] ) ){
			                                        echo '<h3 class="h5 wcu-card_title"><a href="'.esc_url( $data['url'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
			                                    }
			                                    if( ! empty( $data['content'] ) ){
			                                        echo '<p class="wcu-card_text">'.esc_html( $data['content'] ).'</p>';
			                                    }
		                                    echo '</div>';
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                    }
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
	    echo '</div>';
	}
}