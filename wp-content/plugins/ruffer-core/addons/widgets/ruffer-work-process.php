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
 * WorkProcess Box Widget .
 *
 */
class Ruffer_WorkProcess_Box extends Widget_Base {

	public function get_name() {
		return 'rufferworkprocess';
	}

	public function get_title() {
		return __( 'Ruffer WorkProcess', 'ruffer' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'ruffer' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'feature_section',
			[
				'label' 	=> __( 'WorkProcess', 'ruffer' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
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
			'image',
			[
				'label' 	=> __( 'Image', 'ruffer' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'steps',
			[
				'label' 		=> __( 'Work Process', 'ruffer' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'ruffer' ),
					],
				],
			]
		);
		$this->add_control(
			'line_image',
			[
				'label' 	=> __( 'Line Image', 'ruffer' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);

        
        $this->end_controls_section();


        /*-----------------------------------------features styling------------------------------------*/

		$this->start_controls_section(
			'sec_style_section',
			[
				'label' 	=> __( 'Title Style', 'ruffer' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'sec_title_color',
			[
				'label' 		=> __( 'Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h2, {{WRAPPER}} h5'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'sec_title_typography',
		 		'label' 		=> __( 'Typography', 'appku' ),
		 		'selector' 	=> '{{WRAPPER}} h2, {{WRAPPER}} h5',
			]
		);

        $this->add_responsive_control(
			'sec_title_margin',
			[
				'label' 		=> __( 'Margin', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h2, {{WRAPPER}} h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'sec_title_padding',
			[
				'label' 		=> __( 'Padding', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h2, {{WRAPPER}} h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();
        /*-----------------------------------------features content styling------------------------------------*/

		$this->start_controls_section(
			'content_section',
			[
				'label' 	=> __( 'Content Style', 'ruffer' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'content_color',
			[
				'label' 		=> __( 'Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} p'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'content_typography',
		 		'label' 		=> __( 'Typography', 'appku' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'content_margin',
			[
				'label' 		=> __( 'Margin', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'content_padding',
			[
				'label' 		=> __( 'Padding', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();



        echo '<div class="process-card-area">';
        	if(!empty($settings['line_image']['url'])){
	            echo '<div class="process-line">';
	                echo '<img src="'.esc_url( $settings['line_image']['url'] ).'" alt="line">';
	            echo '</div>';
	        }
            echo '<div class="row gy-40 justify-content-center">';
            	$i = 0;
            	foreach( $settings['steps'] as $data ) { 
            		$i++;
            		$k = str_pad($i, 2, '0', STR_PAD_LEFT);
	                echo '<div class="col-md-6 col-lg-4 process-card-wrap">';
	                    echo '<div class="process-card">';
	                        echo '<div class="process-card_number">'.esc_html($k).'</div>';
	                        if(!empty($data['image']['url'])){
		                        echo '<div class="process-card_icon">';
		                            echo '<img src="'.esc_url( $data['image']['url'] ).'" alt="Image">';
		                        echo '</div>';
		                    }
		                    if( ! empty( $data['title'] ) ){
		                        echo '<h2 class="box-title">'.esc_html( $data['title'] ).'</h2>';
		                    }
		                    if( ! empty( $data['content'] ) ){
		                        echo '<p class="process-card_text">'.esc_html( $data['content'] ).'</p>';
		                    }
	                    echo '</div>';
	                echo '</div>';
	            }               
           echo ' </div>';
        echo '</div>'; 
	}

}