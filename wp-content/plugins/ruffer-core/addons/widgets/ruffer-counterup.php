<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Counter Up Widget .
 *
 */
class Ruffer_Counterup extends Widget_Base {

	public function get_name() {
		return 'ruffercounterup';
	}

	public function get_title() {
		return __( 'Counter Up', 'ruffer' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'ruffer' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Counterup', 'ruffer' ),
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
				],
			]
		);    
		$repeater = new Repeater();

		$repeater->add_control(
			'counter_number',
			[
				'label'     => __( 'Counter Number', 'ruffer' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( '25', 'ruffer' ),
			]
		);
		$repeater->add_control(
			'counter_suffix',
			[
				'label'     => __( 'Counter Suffix', 'ruffer' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( 'k+', 'ruffer' ),
			]
		);
		$repeater->add_control(
			'counter_text',
			[
				'label'     => __( 'Counter Text', 'ruffer' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( 'Years Of Experience', 'ruffer' ),
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
			'counter',
			[
				'label' 		=> __( 'Counter', 'ruffer' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'counter_text' 		=> __( 'Counter One', 'ruffer' ),
					],
				],
				'title_field' 	=> '{{{ counter_text }}}',
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


		$this->start_controls_tab(
			'style_normal_tab2',
			[
				'label' => esc_html__( 'Number', 'ruffer' ),
			]
		);
        $this->add_control(
			'overview_title_color',
			[
				'label' 		=> __( 'Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .counter-card_number'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'ruffer' ),
		 		'selector' 	=> '{{WRAPPER}} .counter-card_number',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .counter-card_number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .counter-card_number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Ttitle', 'ruffer' ),
			]
		);
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .counter-card_text'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'ruffer' ),
		 		'selector' 	=> '{{WRAPPER}} .counter-card_text',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .counter-card_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .counter-card_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        	echo '<div class="row gy-40 justify-content-between">';
               	foreach( $settings['counter'] as $data ) {  
	                echo '<div class="col-6 col-lg-auto counter-card-wrap">';
	                    echo '<div class="counter-card">';
	                    	if( ! empty( $data['image']['url'] ) ){
		                        echo '<div class="counter-card_icon">';
		                            echo '<img src="'.$data['image']['url'].'" alt="Icon">';
		                        echo '</div>';
		                    }

	                        echo '<div class="media-body">';
	                            if( ! empty( $data['counter_number'] ) ){
			                		$suffix = ( $data['counter_suffix'] ) ? $data['counter_suffix'] : '';

				                    echo '<h2 class="counter-card_number"><span class="counter-number">'.esc_html( $data['counter_number'] ).'</span>'.esc_html($suffix).'</h2>';
				                }
	                            if( !empty( $data['counter_text'] ) ){
				                    echo '<span class="counter-card_text">'.esc_html( $data['counter_text'] ).'</span>';
				                }
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            }
            echo '</div>';
	    }else{
	    	echo '<div class="row gy-40 justify-content-between">';
                foreach( $settings['counter'] as $data ) {  
	                echo '<div class="col-6 col-lg-auto counter-card-wrap style2">';
	                    echo '<div class="counter-card style2">';
	                    	if( ! empty( $data['image']['url'] ) ){
		                        echo '<div class="counter-card_icon">';
		                            echo '<img src="'.$data['image']['url'].'" alt="Icon">';
		                        echo '</div>';
		                    }
	                        echo '<div class="media-body">';
	                            if( ! empty( $data['counter_number'] ) ){
			                		$suffix = ( $data['counter_suffix'] ) ? $data['counter_suffix'] : '';

				                    echo '<h2 class="counter-card_number"><span class="counter-number">'.esc_html( $data['counter_number'] ).'</span>'.esc_html($suffix).'</h2>';
				                }
				                if( !empty( $data['counter_text'] ) ){
		                            echo '<p class="counter-card_text">'.esc_html( $data['counter_text'] ).'</p>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            } 
            echo '</div>';
	    }
	}
}