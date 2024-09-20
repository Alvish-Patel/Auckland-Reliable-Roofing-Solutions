<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Testimonial Slider Widget .
 *
 */
class Ruffer_Testimonial_Slider extends Widget_Base{

	public function get_name() {
		return 'ruffertestimonialslider';
	}

	public function get_title() {
		return __( 'Testimonial Slider', 'ruffer' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'ruffer' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'testimonial_slider_section',
			[
				'label' 	=> __( 'Testimonial Slider', 'ruffer' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout',
			[
				'label' 		=> __( 'Testimonial Style', 'ruffer' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options'		=> [
					'1'  			=> __( 'Style One', 'ruffer' ),
					'2' 			=> __( 'Style Two', 'ruffer' ),
					'3' 			=> __( 'Style Three', 'ruffer' ),
					'4' 			=> __( 'Style Four', 'ruffer' ),
				],
			]
		);
		$this->add_control(
			'title', [
				'label' 		=> __( 'Title', 'ruffer' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ruffer' ),
				'label_block' 	=> true,
				'condition'		=> [ 'layout' => [ '1' ] ],
			]
        );
        $this->add_control(
			'subtitle', [
				'label' 		=> __( 'Subtitle', 'ruffer' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ruffer' ),
				'label_block' 	=> true,
				'condition'		=> [ 'layout' => [ '1' ] ],
			]
        );
		
		//----------------------------feddback repeter start--------------------------------//

		$repeater = new Repeater();

		$repeater->add_control(
			'client_image',
			[
				'label' 		=> __( 'Client Image', 'ruffer' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'client_name', [
				'label' 		=> __( 'Client Name', 'ruffer' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ruffer' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'client_designation', [
				'label' 		=> __( 'Client Designation', 'ruffer' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Chef Leader' , 'ruffer' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'client_feedback', [
				'label' 		=> __( 'Client Feedback', 'ruffer' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ' , 'ruffer' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'client_rating',
			[
				'label' 	=> __( 'Client Rating', 'plumer' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '5',
				'options' 	=> [
					'one'  		=> __( 'One Star', 'plumer' ),
					'two' 		=> __( 'Two Star', 'plumer' ),
					'three' 	=> __( 'Three Star', 'plumer' ),
					'four' 		=> __( 'Four Star', 'plumer' ),
					'five' 	 	=> __( 'Five Star', 'plumer' ),
				],
			]
		);
		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'ruffer' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_name' 		=> __( 'Rubaida Kanom', 'ruffer' ),
						'client_feedback' 	=> __( '“Synergistically transform 24/7 schemas extensible synergy. Progressively develop inexpensive catalysts for change before transparent customer service.”', 'ruffer' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Rubaida Kanom', 'ruffer' ),
						'client_feedback' 	=> __( '“Synergistically transform 24/7 schemas extensible synergy. Progressively develop inexpensive catalysts for change before transparent customer service.”', 'ruffer' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Rubaida Kanom', 'ruffer' ),
						'client_feedback' 	=> __( '“Synergistically transform 24/7 schemas extensible synergy. Progressively develop inexpensive catalysts for change before transparent customer service.”', 'ruffer' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ client_name }}}',
				'condition'		=> [ 'layout' => [ '1', '2' , '4'] ],
			]
		);

		//----------------------------feddback repeter start 2--------------------------------//

		$repeater = new Repeater();

		$repeater->add_control(
			'client_image',
			[
				'label' 		=> __( 'Client Image', 'ruffer' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'client_name', [
				'label' 		=> __( 'Client Name', 'ruffer' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ruffer' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'client_designation', [
				'label' 		=> __( 'Client Designation', 'ruffer' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Chef Leader' , 'ruffer' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'feedback_title', [
				'label' 		=> __( 'Feedback Title', 'ruffer' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ruffer' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'client_feedback', [
				'label' 		=> __( 'Client Feedback', 'ruffer' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ' , 'ruffer' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'client_rating',
			[
				'label' 	=> __( 'Client Rating', 'plumer' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '5',
				'options' 	=> [
					'one'  		=> __( 'One Star', 'plumer' ),
					'two' 		=> __( 'Two Star', 'plumer' ),
					'three' 	=> __( 'Three Star', 'plumer' ),
					'four' 		=> __( 'Four Star', 'plumer' ),
					'five' 	 	=> __( 'Five Star', 'plumer' ),
				],
			]
		);
		$this->add_control(
			'slides_2',
			[
				'label' 		=> __( 'Slides', 'ruffer' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_name' 		=> __( 'Rubaida Kanom', 'ruffer' ),
						'client_feedback' 	=> __( '“Synergistically transform 24/7 schemas extensible synergy. Progressively develop inexpensive catalysts for change before transparent customer service.”', 'ruffer' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Rubaida Kanom', 'ruffer' ),
						'client_feedback' 	=> __( '“Synergistically transform 24/7 schemas extensible synergy. Progressively develop inexpensive catalysts for change before transparent customer service.”', 'ruffer' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Rubaida Kanom', 'ruffer' ),
						'client_feedback' 	=> __( '“Synergistically transform 24/7 schemas extensible synergy. Progressively develop inexpensive catalysts for change before transparent customer service.”', 'ruffer' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ client_name }}}',
				'condition'		=> [ 'layout' => [ '3' ] ],
			]
		);

		$this->add_control(
			'quote',
			[
				'label' 		=> __( 'Quote Image', 'ruffer' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => [ '1', '2', '4' ] ],
			]
		);
		$this->add_control(
			'shape_img',
			[
				'label' 		=> __( 'Shape Image', 'ruffer' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => [ '1' ] ],
			]
		);

		
		$this->end_controls_section();


		 /*-----------------------------------------Feedback styling------------------------------------*/

		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Feedback Styling', 'ruffer' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs2'
		);


		$this->start_controls_tab(
			'style_normal_tab2',
			[
				'label' => esc_html__( 'Nmae', 'ruffer' ),
			]
		);
        $this->add_control(
			'overview_title_color',
			[
				'label' 		=> __( 'Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h3'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'ruffer' ),
		 		'selector' 	=> '{{WRAPPER}} h3',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_title_padding',
			[
				'label' 		=> __( 'Padding', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Designation', 'ruffer' ),
			]
		);
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} span'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .testi-box_desig'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .testi-block_desig'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'ruffer' ),
		 		'selector' 	=> '{{WRAPPER}} span',
		 		'selector' 	=> '{{WRAPPER}} .testi-box_desig',
		 		'selector' 	=> '{{WRAPPER}} .testi-block_desig',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .testi-box_desig' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .testi-block_desig' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_content_padding',
			[
				'label' 		=> __( 'Padding', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .testi-box_desig' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .testi-block_desig' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		//--------------------three--------------------//

		$this->start_controls_tab(
			'style_hover_tab3',
			[
				'label' => esc_html__( 'Feedback', 'ruffer' ),
			]
		);
		$this->add_control(
			'testi_feedback_color',
			[
				'label' 		=> __( 'Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} p'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'testi_feedback_typography',
		 		'label' 		=> __( 'Typography', 'ruffer' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'testi_feedback_margin',
			[
				'label' 		=> __( 'Margin', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testi_feedback_padding',
			[
				'label' 		=> __( 'Padding', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();


		
		echo '<!-----------------------Start Testimonials Area----------------------->';
		if( $settings['layout'] == '1' ){

			echo '<div class="row">';
                echo '<div class="col-xl-4">';
                    echo '<div class="text-xl-start text-center">';
                        echo '<div class="title-area mb-35">';
                        	if( !empty( $settings['title'] ) ){
	                            echo '<span class="sub-title">'.esc_html( $settings['title'] ).'</span>';
	                        }
	                        if( !empty( $settings['subtitle'] ) ){
	                            echo '<h2 class="sec-title text-white">'.esc_html( $settings['subtitle'] ).'</h2>';
	                        }
                        echo '</div>';
                        echo '<div class="testimonial-slider-arrow1">';
                            echo '<button data-slick-prev="#testimonial-slider1" class="slick-arrow slick-prev"><i class="fa-regular fa-arrow-left-long"></i></button>';
                            echo '<button data-slick-next="#testimonial-slider1" class="slick-arrow slick-next"><i class="fa-regular fa-arrow-right-long"></i></button>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="col-xl-8 mt-40 mt-xl-0">';
                    echo '<div class="th-carousel testi-slider1 row" id="testimonial-slider1" data-slide-show="2" data-ml-slide-show="1" data-lg-slide-show="1" data-md-slide-show="1" data-dots="false" data-arrows="false">';

                        foreach( $settings['slides'] as $singleslide ) { 
	                        echo '<div class="col-lg-6">';
	                            echo '<div class="testi-card">';
	                                echo '<div class="testi-card_bg-shape shape-mockup spin d-xl-block d-none" data-right="-35%" data-top="-35%">';
	                                    echo '<img src="'.RUFFER_PLUGDIRURI . 'assets/img/about_1_2shape.png" alt="img">';
	                                echo '</div>';
	                                echo '<div class="testi-card_profile">';
	                                    echo '<div class="media-left">';
	                                    	if( ! empty( $singleslide['client_image']['url'] ) ){
		                                        echo '<div class="testi-card_avater">';
		                                            echo ruffer_img_tag( array(
														'url'	=> esc_url( $singleslide['client_image']['url'] ),
													) );
		                                        echo '</div>';
		                                    }
	                                        if( ! empty( $settings['quote']['url'] ) ){
		                                        echo '<div class="testi-card_quote">';
		                                            echo ruffer_img_tag( array(
														'url'	=> esc_url( $settings['quote']['url'] ),
													) );
		                                        echo '</div>';
		                                    }
	                                    echo '</div>';
	                                    echo '<div class="media-body">';
	                                        if( ! empty( $singleslide['client_name'] ) ) {
					                            echo '<h3 class="testi-card_name">'.esc_html( $singleslide['client_name'] ).'</h3>';
					                        }
					                        if( ! empty( $singleslide['client_designation'] ) ) {
					                            echo '<span class="testi-card_desig">'.esc_html( $singleslide['client_designation'] ).'</span>';
					                        }
					                        if( ! empty( $singleslide['client_feedback'] ) ) {
					                            echo '<p class="testi-card_text">'.esc_html( $singleslide['client_feedback'] ).'</p>';
					                        }
	                                    echo '</div>';
	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	                    }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
	    }elseif( $settings['layout'] == '2' ){
	    	echo '<div class="row slider-shadow th-carousel arrow-style2" data-slide-show="2" data-lg-slide-show="2" data-md-slide-show="1" data-arrows="true">';
                foreach( $settings['slides'] as $singleslide ) {  
	                echo '<div class="col-lg-6">';
	                    echo '<div class="testi-card style2">';
	                        echo '<div class="testi-card_profile">';
	                            echo '<div class="media-left">';
	                            	if( ! empty( $singleslide['client_image']['url'] ) ){
		                                echo '<div class="testi-card_avater">';
		                                    echo ruffer_img_tag( array(
												'url'	=> esc_url( $singleslide['client_image']['url'] ),
											) );
		                                echo '</div>';
		                            }
	                                echo '<div class="testi-box_review">';
	                                    if( $singleslide['client_rating'] == 'one' ){
						                	echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
						                }elseif( $singleslide['client_rating'] == 'two' ){
						                	echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
						                }elseif( $singleslide['client_rating'] == 'three' ){
						                	echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
						                }elseif( $singleslide['client_rating'] == 'four' ){
						                	echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
						                }else{
						                	echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
							                echo '<i class="fa-solid fa-star-sharp"></i>';
						                }
	                                echo '</div>';
	                            echo '</div>';
	                            echo '<div class="media-body">';
	                            	if( ! empty( $singleslide['client_feedback'] ) ) {
		                                echo '<p class="testi-card_text">'.esc_html( $singleslide['client_feedback'] ).'</p>';
		                            }
	                                echo '<div class="media">';
	                                	if( ! empty( $settings['quote']['url'] ) ){
		                                    echo '<div class="testi-box_quote">';
		                                        echo ruffer_img_tag( array(
													'url'	=> esc_url( $settings['quote']['url'] ),
												) );
		                                    echo '</div>';
		                                }
	                                    echo '<div class="media-body">';
	                                        if( ! empty( $singleslide['client_name'] ) ) {
					                            echo '<h3 class="testi-card_name">'.esc_html( $singleslide['client_name'] ).'</h3>';
					                        }
					                        if( ! empty( $singleslide['client_designation'] ) ) {
				                                echo '<span class="testi-card_desig">'.esc_html( $singleslide['client_designation'] ).'</span>';
				                            }
	                                    echo '</div>';
	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            }
            echo '</div>';
	    }elseif( $settings['layout'] == '3' ){
	    	echo '<div class="row slider-shadow th-carousel arrow-style2" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="1" data-arrows="false">';
                foreach( $settings['slides_2'] as $singleslide ) { 
	                echo '<div class="col-xl-6">';
	                    echo '<div class="testi-block">';
	                        echo '<span class="review-rating">';
	                            echo '<span>';
	                                if( $singleslide['client_rating'] == 'one' ){
					                	echo '<i class="fas fa-star"></i>';
						                echo '<i class="far fa-star"></i>';
						                echo '<i class="far fa-star"></i>';
						                echo '<i class="far fa-star"></i>';
						                echo '<i class="far fa-star"></i>';
					                }elseif( $singleslide['client_rating'] == 'two' ){
					                	echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="far fa-star"></i>';
						                echo '<i class="far fa-star"></i>';
						                echo '<i class="far fa-star"></i>';
					                }elseif( $singleslide['client_rating'] == 'three' ){
					                	echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="far fa-star"></i>';
						                echo '<i class="far fa-star"></i>';
					                }elseif( $singleslide['client_rating'] == 'four' ){
					                	echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="far fa-star"></i>';
					                }else{
					                	echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
					                }
	                            echo '</span>';
	                        echo '</span>';
	                        echo '<div class="quote-icon"><i class="fas fa-quote-left"></i></div>';
	                        if( ! empty( $singleslide['feedback_title'] ) ) {
		                        echo '<h6 class="testi-block_subtitle">'.esc_html( $singleslide['feedback_title'] ).'</h6>';
		                    }
		                    if( ! empty( $singleslide['client_feedback'] ) ) {
		                        echo '<p class="testi-block_text">'.esc_html( $singleslide['client_feedback'] ).'</p>';
		                    }
	                        echo '<div class="testi-block_profile">';
	                        	if( ! empty( $singleslide['client_image']['url'] ) ){
		                            echo '<div class="testi-block_avater">';
		                                echo ruffer_img_tag( array(
											'url'	=> esc_url( $singleslide['client_image']['url'] ),
										) );
		                            echo '</div>';
		                        }

	                            echo '<div class="media-body">';
	                            	if( ! empty( $singleslide['client_name'] ) ) {
		                                echo '<h3 class="box-title">'.esc_html( $singleslide['client_name'] ).'</h3>';
		                            }
		                            if( ! empty( $singleslide['client_designation'] ) ) {
		                                echo '<p class="testi-block_desig">'.esc_html( $singleslide['client_designation'] ).'</p>';
		                            }
	                            echo '</div>';
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            }
            echo '</div>';
	    }else{
	    	echo '<div class="row th-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="1" data-arrows="false">';
                foreach( $settings['slides'] as $singleslide ) {  
	                echo '<div class="col-xl-6">';
	                    echo '<div class="testi-block style2">';
	                        echo '<div class="testi-block_profile">';
	                        	if( ! empty( $singleslide['client_image']['url'] ) ){
		                            echo '<div class="testi-block_avater">';
		                                echo ruffer_img_tag( array(
											'url'	=> esc_url( $singleslide['client_image']['url'] ),
										) );
		                            echo '</div>';
		                        }
		                        if( ! empty( $settings['quote']['url'] ) ){
		                            echo '<div class="quote-icon"><img src="'.esc_url( $settings['quote']['url'] ).'" alt="img"></div>';
		                        }
	                        echo '</div>';
	                        echo '<div class="testi-block_content">';
	                        	if( ! empty( $singleslide['client_feedback'] ) ) {
		                            echo '<p class="testi-block_text">'.esc_html( $singleslide['client_feedback'] ).'</p>';
		                        }
		                        if( ! empty( $singleslide['client_name'] ) ) {
		                            echo '<h3 class="box-title">'.esc_html( $singleslide['client_name'] ).'</h3>';
		                        }
		                        if( ! empty( $singleslide['client_designation'] ) ) {
		                            echo '<p class="testi-block_desig">'.esc_html( $singleslide['client_designation'] ).'</p>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            }
                
            echo '</div>';
	    }
		echo '<!-----------------------End Testimonials Area----------------------->';
	}
}