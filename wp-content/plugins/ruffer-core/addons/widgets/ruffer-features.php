<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Features Box Widget .
 *
 */
class Ruffer_Features extends Widget_Base {

	public function get_name() {
		return 'rufferfeatures';
	}

	public function get_title() {
		return __( 'Ruffer Features', 'ruffer' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'ruffer' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'checklist_section',
			[
				'label' 	=> __( 'Features', 'ruffer' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout',
			[
				'label' 		=> __( 'Style', 'ruffer' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options'		=> [
					'1'  			=> __( 'Style One', 'ruffer' ),
					'2' 			=> __( 'Style Two', 'ruffer' ),
					'3' 			=> __( 'Style Three', 'ruffer' ),
					'4' 			=> __( 'Style Four', 'ruffer' ),
					'5' 			=> __( 'Style Five', 'ruffer' ),
					'6' 			=> __( 'Style Six', 'ruffer' ),
				],
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
			'features',
			[
				'label' 		=> __( 'Steps', 'ruffer' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'ruffer' ),
					],
				],
				'condition'		=> [ 'layout' => [ '1','3' ] ],
			]
		);
         //-----------------------------style 2 -----------------------------2//
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
				'condition'		=> [ 'layout' => [ '2', '6' ] ],
			]
		);

		 //-----------------------------style 3 -----------------------------2//
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
		$repeater->add_control(
			'icon',
			[
				'label' 		=> __( 'Icon', 'ruffer' ),
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
			'features3',
			[
				'label' 		=> __( 'Steps', 'ruffer' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'ruffer' ),
					],
				],
				'condition'		=> [ 'layout' => [ '4','5' ] ],
			]
		);

        $this->end_controls_section();

        /*-----------------------------------------Feedback styling------------------------------------*/

		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Content Styling', 'ruffer' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs2'
		);
//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Title', 'ruffer' ),
			]
		);
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h3'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .wcu-box_title a'	=> '--title-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'ruffer' ),
		 		'selector' 	=> '{{WRAPPER}} h3',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
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
			'overview_content_padding',
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


		//--------------------three--------------------//

		$this->start_controls_tab(
			'style_hover_tab3',
			[
				'label' => esc_html__( 'Description', 'ruffer' ),
				'condition'		=> [ 'layout' => ['1', '2', '3' ] ],
			]
		);
		$this->add_control(
			'counter_color',
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
				'name' 			=> 'counter_typography',
		 		'label' 		=> __( 'Typography', 'ruffer' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'counter_margin',
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
			'counter_padding',
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

        if( $settings['layout'] == '1' ){

        	echo '<div class="about-feature-wrap">';
                foreach( $settings['features'] as $data ) {             
		            echo '<div class="about-feature">';
		            	if( ! empty( $data['image']['url'] ) ){
			                echo '<div class="about-feature_icon">';
			                    echo '<img src="'.$data['image']['url'].'" alt="Icon">';
			                echo '</div>';
			            }
		                echo '<div class="media-body">';
		                	if( ! empty( $data['title'] ) ){
			                    echo '<h3 class="about-feature_title">'.esc_html( $data['title'] ).'</h3>';
			                }
			                if( ! empty( $data['content'] ) ){
			                    echo '<p class="about-feature_text">'.esc_html( $data['content'] ).'</p>';
			                }
		                echo '</div>';
		            echo '</div>';
		        }
	        echo '</div>';
	    }elseif( $settings['layout'] == '2' ){
	    	echo '<div class="row gy-30">';
                foreach( $settings['features2'] as $data ) {                   
	                echo '<div class="col-sm-6">';
	                    echo '<div class="wcu-box">';
	                    	if( ! empty( $data['image']['url'] ) ){
		                        echo '<div class="wcu-box_icon">';
		                            echo '<img src="'.$data['image']['url'].'" alt="img">';
		                        echo '</div>';
		                    }
		                    if( ! empty( $data['title'] ) ){
		                        echo '<div class="wcu-box_details">';
		                            echo '<h3 class="h5 wcu-box_title"><a href="'.esc_url( $data['url'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
		                        echo '</div>';
		                    }
	                    echo '</div>';
	                echo '</div>';
	            }
            echo '</div>';
	    }elseif( $settings['layout'] == '3' ){
	    	 echo '<div class="row gy-30 justify-content-center">';
                
                foreach( $settings['features'] as $data ) {    
	                echo '<div class="col-sm-6 col-xl-4 col-lg-6 col-md-4">';
	                    echo '<div class="about-feature2">';
	                    	if( ! empty( $data['image']['url'] ) ){
		                        echo '<div class="feature_icon">';
		                            echo '<img src="'.$data['image']['url'].'" alt="Icon">';
		                        echo '</div>';
		                    }
	                        echo '<div class="media-body">';
	                        	if( ! empty( $data['title'] ) ){
	                           		echo ' <h3 class="box-title">'.esc_html( $data['title'] ).'</h3>';
	                           	}
	                           	if( ! empty( $data['content'] ) ){
		                            echo '<p class="about-feature_text">'.esc_html( $data['content'] ).'</p>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            }

            echo '</div>';
	    }elseif( $settings['layout'] == '4' ){
	    	echo '<div class="row gy-30 gx-30 justify-content-center">';
                foreach( $settings['features3'] as $data ) {  
	                echo '<div class="col-lg-4 col-md-6">';
	                	if( ! empty( $data['image']['url'] ) ){
		                    echo '<div class="feature-card style2 align-items-center" data-bg-src="'.$data['image']['url'].'" data-overlay="black" data-opacity="8">';

		                    	if( ! empty( $data['icon']['url'] ) ){
			                        echo '<div class="feature_icon">';
			                            echo '<img src="'.$data['icon']['url'].'" alt="Icon">';
			                        echo '</div>';
			                    }
			                    if( ! empty( $data['title'] ) ){
			                        echo '<div class="media-body">';
			                            echo '<h3 class="box-title mb-0">'.esc_html( $data['title'] ).'</h3>';
			                        echo '</div>';
			                    }
		                    echo '</div>';
		                }
	                echo '</div>';
	            }
            echo '</div>';
	    }elseif( $settings['layout'] == '5' ){
	    	echo '<div class="about-feature-wrap3 mb-40">';
                foreach( $settings['features3'] as $data ) {              
	                echo '<div class="about-feature3">';
	                	if( ! empty( $data['icon']['url'] ) ){
		                    echo '<div class="icon">';
		                        echo '<img src="'.$data['icon']['url'].'" alt="Icon">';
		                    echo '</div>';
		                }
		                if( ! empty( $data['title'] ) ){
		                    echo '<div class="media-body">';
		                        echo '<h3 class="about-feature_title">'.esc_html( $data['title'] ).'</h3>';
		                    echo '</div>';
		                }
	                echo '</div>';
	            }
            echo '</div>';
	    }else{
	    	echo '<div class="row wcu-card-slider th-carousel" data-slide-show="3" data-ml-slide-show="2" data-md-slide-show="3" data-sm-slide-show="2" data-dots="false">';
                foreach( $settings['features2'] as $data ) {         
	                echo '<div class="col-sm-6">';
	                    echo '<div class="wcu-card style4">';
	                    	if( ! empty( $data['image']['url'] ) ){
		                        echo '<div class="wcu-card_icon">';
		                            echo '<img src="'.$data['image']['url'].'" alt="img">';
		                        echo '</div>';
		                    }
		                    if( ! empty( $data['title'] ) ){
		                        echo '<div class="wcu-card_details">';
		                            echo '<h3 class="h5 wcu-card_title"><a href="'.esc_url( $data['url'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
		                        echo '</div>';
		                    }
	                    echo '</div>';
	                echo '</div>';
	            }
            echo '</div>';
	    }
	}
}