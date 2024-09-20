<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Blog Post Widget .
 *
 */
class Ruffer_Blog_Post extends Widget_Base {

	public function get_name() {
		return 'rufferblogpost';
	}

	public function get_title() {
		return __( 'Ruffer Blog Post', 'ruffer' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'ruffer' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'blog_post_section',
			[
				'label' => __( 'Blog Post', 'ruffer' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'blog_slider_style',
			[
				'label' 		=> __( 'Blog Style', 'ruffer' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  		=> __( 'Style One', 'ruffer' ),
					'two' 		=> __( 'Style Two', 'ruffer' ),
					'three' 	=> __( 'Style Three', 'ruffer' ),
					'four' 		=> __( 'Style Four', 'ruffer' ),
				],
			]
		);
        $this->add_control(
			'blog_post_count',
			[
				'label' 	=> __( 'No of Post to show', 'ruffer' ),
                'type' 		=> Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => count( get_posts( array('post_type' => 'post', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default'  	=> __( '4', 'ruffer' ),
                'condition'		=> [ 'blog_slider_style!' => ['three' ] ],
			]
        );

		$this->add_control(
			'title_count',
			[
				'label' 	=> __( 'Title Length', 'ruffer' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '5', 'ruffer' ),
			]
		);
		$this->add_control(
			'con_count',
			[
				'label' 	=> __( 'Content Length', 'ruffer' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '5', 'ruffer' ),
			]
		);

        $this->add_control(
			'blog_post_order',
			[
				'label' 	=> __( 'Order', 'ruffer' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ASC'   	=> __('ASC','ruffer'),
                    'DESC'   	=> __('DESC','ruffer'),
                ],
                'default'  	=> 'DESC'
			]
        );

        $this->add_control(
			'blog_post_order_by',
			[
				'label' 	=> __( 'Order By', 'ruffer' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ID'    	=> __( 'ID', 'ruffer' ),
                    'author'    => __( 'Author', 'ruffer' ),
                    'title'    	=> __( 'Title', 'ruffer' ),
                    'date'    	=> __( 'Date', 'ruffer' ),
                    'rand'    	=> __( 'Random', 'ruffer' ),
                ],
                'default'  	=> 'ID'
			]
        );

        $this->add_control(
			'exclude_cats',
			[
				'label' 		=> __( 'Exclude Categories', 'ruffer' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->ruffer_get_categories(),
			]
        );

        $this->add_control(
			'exclude_tags',
			[
				'label' 		=> __( 'Exclude Tags', 'ruffer' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->ruffer_get_tags(),
			]
        );

        $this->add_control(
			'exclude_post_id',
			[
				'label'         => __( 'Exclude Post', 'ruffer' ),
                'type'          => Controls_Manager::SELECT2,
                'multiple'      => true,
				'options'       => $this->ruffer_post_id(),
			]
        );
        $this->add_control(
			'read_more',
			[
				'label' 	=> __( 'Read More Text', 'ruffer' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Read More', 'ruffer' ),
			]
        );
        $this->end_controls_section();

		/*-----------------------------------------general styling------------------------------------*/

		$this->start_controls_section(
			'general_styling',
			[
				'label' 	=> __( 'General Styling', 'ruffer' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'con_bg_color',
			[
				'label' 		=> __( 'Post Background Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-card'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .blog-grid'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .blog-box '	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .blog-block, {{WRAPPER}} .blog-recent'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' 			=> 'border',
				'label' 		=> esc_html__( 'Border', 'ruffer' ),
				'selector' 		=> '{{WRAPPER}} .blog-card, {{WRAPPER}} .blog-grid, {{WRAPPER}} .blog-box, {{WRAPPER}} .blog-block, {{WRAPPER}} .blog-recent',
			]
		);
        $this->add_responsive_control(
			'general_padding',
			[
				'label' 		=> __( ' Padding', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .blog-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .blog-grid' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .blog-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .blog-block, {{WRAPPER}} .blog-recent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->add_responsive_control(
			'general_border_radius',
			[
				'label' 		=> __( ' Border Radius', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .blog-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .blog-grid' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .blog-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .blog-block, {{WRAPPER}} .blog-recent' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        
        $this->end_controls_section();

        /*-----------------------------------------Category styling------------------------------------*/

		$this->start_controls_section(
			'cate_styling',
			[
				'label' 	=> __( 'Category Styling', 'ruffer' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'blog_slider_style' => ['one' ] ],
			]
        );

		$this->add_control(
			'cate_color',
			[
				'label' 		=> __( 'Category Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-grid .tag'	=> 'color: {{VALUE}}!important;',
				],
				'condition'		=> [ 'blog_slider_style' => ['one' ] ],
			]
        );		
        $this->add_control(
			'cate_bg_color',
			[
				'label' 		=> __( 'Category Background Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-grid .tag'	=> 'background-color: {{VALUE}}!important;',
				],
				'condition'		=> [ 'blog_slider_style' => ['one' ] ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'cate_typography',
				'label' 	=> __( 'Meta Typography', 'ruffer' ),
				'selector' 	=> '{{WRAPPER}} .blog-grid .tag',
				'condition'		=> [ 'blog_slider_style' => ['one' ] ],
			]
		);
        
        $this->end_controls_section();


        /*-----------------------------------------meta styling------------------------------------*/

		$this->start_controls_section(
			'meta_style',
			[
				'label' 	=> __( 'Meta', 'ruffer' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' 		=> __( 'Meta Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-meta a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'meta_icon_color',
			[
				'label' 		=> __( 'Meta Icon Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-meta a i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'meta_hvr_color',
			[
				'label' 		=> __( 'Meta HoverColor', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-meta a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'meta_typography',
				'label' 	=> __( 'Meta Typography', 'ruffer' ),
				'selector' 	=> '{{WRAPPER}} .blog-meta a',
			]
		);
		$this->end_controls_section();

		/*-----------------------------------------title styling------------------------------------*/

        $this->start_controls_section(
			'blog_title_styling',
			[
				'label' 	=> __( 'Title Styling', 'ruffer' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'blog_title_color',
			[
				'label' 		=> __( 'Title Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title a'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_control(
			'blog_title_hvr_color',
			[
				'label' 		=> __( 'Title Hover Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title a:hover'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'blog_title_typography',
		 		'label' 		=> esc_html__( 'Title Typography', 'ruffer' ),
		 		'selector' 		=> '{{WRAPPER}} .blog-title a',
		 	]
		);

        $this->add_responsive_control(
			'blog_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'blog_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        //----------------------------------button 1 styling ----------------------------------//

        $this->start_controls_section(
			'button_style_section2',
			[
				'label' 	=> __( 'Button Text Style', 'ruffer' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 
					'blog_slider_style' => ['two', 'three', 'four' ]
				],
			]
        );

         $this->add_control(
			'btn_color2',
			[
				'label' 		=> __( 'Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-box .link-btn'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .blog-card .link-btn'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .blog-block .link-btn'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_hvr_color2',
			[
				'label' 		=> __( 'Hover Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-box .link-btn:hover'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .blog-card .link-btn:hover'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .blog-block .link-btn:hover'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .blog-box  .link-btn:before'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .blog-card .link-btn:before'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .blog-block .link-btn:before'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'button_typography2',
		 		'label' 		=> __( 'Typography', 'ruffer' ),
		 		'selector' 		=> '{{WRAPPER}} .blog-box .link-btn',
		 		'selector' 		=> '{{WRAPPER}} .blog-card .link-btn',
		 		'selector' 		=> '{{WRAPPER}} .blog-block .link-btn',
			]
		);
        $this->add_responsive_control(
			'button_padding2',
			[
				'label' 		=> __( 'Button Padding', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .blog-box .link-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .blog-card .link-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .blog-block .link-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

		 $this->end_controls_section();

        //----------------------------------button 2 styling ----------------------------------//

        $this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Box Style', 'ruffer' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
					'condition'		=> [ 
					'blog_slider_style' => ['three' ]
				],
			]
        );


        $this->add_control(
			'btn_p_color',
			[
				'label' 		=> __( 'Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn.style2' => 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_hvr_color',
			[
				'label' 		=> __( 'Hover Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn.style2:hover'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_control(
			'btn_bg_color',
			[
				'label' 		=> __( 'Background Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn.style2'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_bg_hvr_color',
			[
				'label' 		=> __( 'Background Hover Color', 'ruffer' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn.style2:hover'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .blog-box .as-btn:hover::before'	=> '--theme-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'button_typography',
		 		'label' 		=> __( 'Typography', 'ruffer' ),
		 		'selector' 		=> '{{WRAPPER}} .as-btn.style2',
			]
		);
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'button_border',
				'label' 	=> __( 'Border', 'ruffer' ),
                'selector' 	=> '{{WRAPPER}} .as-btn.style2',
			]
		);        
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'button_border2',
				'label' 	=> __( 'Border Hover', 'ruffer' ),
                'selector' 	=> '{{WRAPPER}} .as-btn.style2:hover',
			]
		);

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn.style2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn.style2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Button Border Radius', 'ruffer' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn.style2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);
        $this->end_controls_section();

		
    }

    public function ruffer_get_categories() {
        $cats = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'ruffer');
        }

        return $catarr;
    }

    public function ruffer_get_tags() {
        $cats = get_terms(array(
            'taxonomy' => 'post_tag',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'ruffer');
        }

        return $catarr;
    }

    // Get Specific Post
    public function ruffer_post_id(){
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => -1,
        );

        $ruffer_post = new WP_Query( $args );

        $postarray = [];

        while( $ruffer_post->have_posts() ){
            $ruffer_post->the_post();
            $postarray[get_the_Id()] = get_the_title();
        }
        wp_reset_postdata();
        return $postarray;
    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        $exclude_post = $settings['exclude_post_id'];

        
        $post_per_page = $settings['blog_slider_style'] == 'three' ? '2' : $settings['blog_post_count'];
        

        if( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $post_per_page ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats']
            );
        } elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $post_per_page ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'tag__not_in'           => $settings['exclude_tags']
            );
        }elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $post_per_page ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'tag__not_in'           => $settings['exclude_tags'],
                'post__not_in'          => $exclude_post
            );
        } elseif( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $post_per_page ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'post__not_in'          => $exclude_post
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $post_per_page ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'tag__not_in'           => $settings['exclude_tags'],
                'post__not_in'          => $exclude_post
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $post_per_page ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'tag__not_in'           => $settings['exclude_tags'],
            );
        } elseif( empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $post_per_page ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'post__not_in'          => $exclude_post
            );
        } else {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $post_per_page ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true
            );
        }


        $blogpost = new WP_Query( $args );

        if( $settings['blog_slider_style'] == 'one' ){

        	echo '<div class="row slider-shadow th-carousel arrow-style2" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1" data-arrows="true">';

                while( $blogpost->have_posts() ) {$blogpost->the_post();
            		$categories = get_the_category();
            		$post_tags = get_the_tags();

	                echo '<div class="col-md-6 col-xl-4">';
	                    echo '<div class="blog-card">';
	                    	if(has_post_thumbnail()){
		                        echo '<div class="blog-img">';
		                            the_post_thumbnail();
		                        echo '</div>';
		                    }
	                        echo '<div class="blog-content">';
	                            echo '<div class="blog-bg-shape">';
	                                echo '<img src="'.RUFFER_PLUGDIRURI . 'assets/img/blog1-bg-shape.png" alt="img">';
	                            echo '</div>';
	                            echo '<div class="blog-meta">';
	                                echo '<a href="'.esc_url( ruffer_blog_date_permalink() ).'"><i class="fal fa-calendar-days"></i>'.esc_html( get_the_date( 'd M, Y' ) ).'</a>';

	                                if( get_comments_number() > 1 ){
			                            $comment_text = __( ' Comments', 'ruffer' );
			                        }else{
			                            $comment_text = __( ' Comment', 'ruffer' );
			                        }
	                                echo '<a href="'.esc_url( get_comments_link( get_the_ID() ) ).'"><i class="far fa-comments"></i>'.esc_html( get_comments_number() ).''.$comment_text.'</a>';
	                            echo '</div>';
	                            if( get_the_title() ){
		                            echo '<h3 class="box-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
		                        }
	                            echo '<p class="blog-text">'.esc_html( wp_trim_words( get_the_content( ), $settings['con_count'], '' ) ).'</p>';
	                            if(!empty($settings['read_more'])){
		                            echo '<div class="blog-bottom">';
		                                echo '<a href="'.esc_url( get_permalink() ).'" class="link-btn">'.esc_html($settings['read_more']).'<i class="fa-solid fa-arrow-up-right ms-2"></i></a>';
		                            echo '</div>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            }
		        wp_reset_postdata();

            echo '</div>';
	    }elseif( $settings['blog_slider_style'] == 'two' ){
	    	echo '<div class="row slider-shadow th-carousel arrow-style2" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1" data-arrows="true">';

                while( $blogpost->have_posts() ) {$blogpost->the_post();
            		$categories = get_the_category();
            		$post_tags = get_the_tags();

	                echo '<div class="col-md-6 col-xl-4">';
	                    echo '<div class="blog-card style2">';
	                    	if(has_post_thumbnail()){
		                        echo '<div class="blog-img">';
		                            the_post_thumbnail();
		                        echo '</div>';
		                    }
	                        echo '<div class="blog-content">';
	                           
	                            echo '<div class="blog-meta">';
	                                echo '<a href="'.esc_url( ruffer_blog_date_permalink() ).'"><i class="fal fa-calendar-days"></i>'.esc_html( get_the_date( 'd M, Y' ) ).'</a>';

	                                if( get_comments_number() > 1 ){
			                            $comment_text = __( ' Comments', 'ruffer' );
			                        }else{
			                            $comment_text = __( ' Comment', 'ruffer' );
			                        }
	                                echo '<a href="'.esc_url( get_comments_link( get_the_ID() ) ).'"><i class="far fa-comments"></i>'.esc_html( get_comments_number() ).''.$comment_text.'</a>';
	                            echo '</div>';
	                            if( get_the_title() ){
		                            echo '<h3 class="box-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
		                        }
	                            echo '<p class="blog-text">'.esc_html( wp_trim_words( get_the_content( ), $settings['con_count'], '' ) ).'</p>';
	                            if(!empty($settings['read_more'])){
		                            echo '<div class="blog-bottom">';
		                                echo '<a href="'.esc_url( get_permalink() ).'" class="link-btn">'.esc_html($settings['read_more']).'<i class="fa-solid fa-arrow-up-right ms-2"></i></a>';
		                            echo '</div>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            }
		        wp_reset_postdata();

            echo '</div>';
	    }elseif( $settings['blog_slider_style'] == 'three' ){
	    	echo '<div class="row gx-30 gy-30">';
                while( $blogpost->have_posts() ) {$blogpost->the_post();
            		$categories = get_the_category();
            		$post_tags = get_the_tags();
	                echo '<div class="col-xl-6">';
	                    echo '<div class="blog-grid-card">';
	                    	if(has_post_thumbnail()){
		                        echo '<div class="blog-img">';
		                            the_post_thumbnail('ruffer_270X267');
		                            echo '<div class="blog-date"> '.esc_html( get_the_date( 'd' ) ).' <br> '.esc_html( get_the_date( 'M' ) ).' </div>';
		                        echo '</div>';
		                    }
	                        echo '<div class="blog-content">';
	                            echo '<div class="blog-meta">';
	                                echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'"><i class="fal fa-user"></i>'.esc_html__('ruffer ', 'ruffer').esc_html( ucwords( get_the_author() ) ).'</a>';


	                                if( get_comments_number() > 1 ){
			                            $comment_text = __( ' Comments', 'ruffer' );
			                        }else{
			                            $comment_text = __( ' Comment', 'ruffer' );
			                        }
			                        echo '<a href="'.esc_url( get_comments_link( get_the_ID() ) ).'"><i class="fal fa-comments"></i>'.esc_html( get_comments_number() ).''.$comment_text.'</a>';
	                            echo '</div>';

	                            if( get_the_title() ){
		                            echo '<h3 class="box-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
		                        }
	                            echo '<p class="blog-text">'.esc_html( wp_trim_words( get_the_content( ), $settings['con_count'], '' ) ).'</p>';
	                            if(!empty($settings['read_more'])){
		                            echo '<div class="blog-bottom">';
		                                echo '<a href="'.esc_url( get_permalink() ).'" class="link-btn">'.esc_html($settings['read_more']).'<i class="fa-solid fa-arrow-up-right ms-2"></i></a>';
		                            echo '</div>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            }
	            wp_reset_postdata();
            echo '</div>';
	    }else{
	    	echo '<div class="row slider-shadow th-carousel arrow-style2" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1" data-arrows="true">';

                while( $blogpost->have_posts() ) {$blogpost->the_post();
            		$categories = get_the_category();
            		$post_tags = get_the_tags();
	                echo '<div class="col-md-6 col-xl-4">';
	                    echo '<div class="blog-card style4">';
	                    	if(has_post_thumbnail()){
		                        echo '<div class="blog-img">';
		                            the_post_thumbnail('ruffer_410X270');
		                            echo '<a class="icon-btn" href="'.esc_url( get_permalink() ).'"><i class="fas fa-long-arrow-right"></i></a>';
		                        echo '</div>';
		                    }

	                        echo '<div class="blog-content">';
	                            echo '<div class="blog-meta">';
	                                echo '<a href="'.esc_url( ruffer_blog_date_permalink() ).'"><i class="fal fa-calendar-days"></i>'.esc_html( get_the_date( 'd M, Y' ) ).'</a>';

	                                if( get_comments_number() > 1 ){
			                            $comment_text = __( ' Comments', 'ruffer' );
			                        }else{
			                            $comment_text = __( ' Comment', 'ruffer' );
			                        }
			                        echo '<a href="'.esc_url( get_comments_link( get_the_ID() ) ).'"><i class="far fa-comments"></i>'.esc_html( get_comments_number() ).''.$comment_text.'</a>';
	                            echo '</div>';
	                            if( get_the_title() ){
		                            echo '<h3 class="box-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
		                        }
	                            echo '<p class="blog-text">'.esc_html( wp_trim_words( get_the_content( ), $settings['con_count'], '' ) ).'</p>';
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>'; 
	            }
	            wp_reset_postdata();
            echo '</div>';
	    }
	}
}