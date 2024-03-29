<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTMega_Elementor_Widget_Offcanvas extends Widget_Base {

    public function get_name() {
        return 'htmega-offcanvas-addons';
    }
    
    public function get_title() {
        return __( 'Offcanvas', 'htmega-addons' );
    }

    public function get_icon() {
        return 'htmega-icon eicon-menu-bar';
    }

    public function get_categories() {
        return [ 'htmega-addons' ];
    }

    public function get_script_depends() {
        return [
            'htmega-widgets-scripts',
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'offcanvas_content',
            [
                'label' => __( 'Offcanvas', 'htmega-addons' ),
            ]
        );

            $this->add_control(
                'content_source',
                [
                    'label'   => __( 'Select Source', 'htmega-addons' ),
                    'type'    => Controls_Manager::SELECT,
                    'label_block' => 'true',
                    'default' => 'sidebar',
                    'options' => [
                        'sidebar'   => __( 'Sidebar', 'htmega-addons' ),
                        'elementor' => __( 'Elementor Template', 'htmega-addons' ),
                    ],          
                ]
            );

            $this->add_control(
                'template_id',
                [
                    'label'       => __( 'Select Template', 'htmega-addons' ),
                    'type'        => Controls_Manager::SELECT,
                    'label_block' => 'true',
                    'default'     => '0',
                    'options'     => htmega_elementor_template(),
                    'condition'   => [
                        'content_source' => "elementor"
                    ],
                ]
            );

            $this->add_control(
                'sidebars_id',
                [
                    'label'       => __( 'Select Sidebar', 'htmega-addons' ),
                    'type'        => Controls_Manager::SELECT,
                    'default'     => '0',
                    'options'     => htmega_sidebar_options(),
                    'label_block' => 'true',
                    'condition'   => [
                        'content_source' => 'sidebar'
                    ],
                ]
            );

            $this->add_control(
                'offcanvas_position',
                [
                    'label'   => __( 'Offcanvas Position', 'htmega-addons' ),
                    'type'    => Controls_Manager::SELECT,
                    'label_block' => 'true',
                    'default' => 'left',
                    'options' => [
                        'left'   => __( 'Left', 'htmega-addons' ),
                        'right' => __( 'Right', 'htmega-addons' ),
                        'top' => __( 'Top', 'htmega-addons' ),
                        'bottom' => __( 'Bottom', 'htmega-addons' ),
                    ],          
                ]
            );
            
        $this->end_controls_section();

        $this->start_controls_section(
            'offcanvas_button',
            [
                'label' => __( 'Button', 'htmega-addons' ),
            ]
        );
            $this->add_control(
                'button_text',
                [
                    'label' => __( 'Button Text', 'htmega-addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Offcanvas', 'htmega-addons' ),
                ]
            );

            $this->add_control(
                'button_icon',
                [
                    'label' => __( 'Button Icon', 'htmega-addons' ),
                    'type' => Controls_Manager::ICON,
                    'default' => '',
                ]
            );

            $this->add_control(
                'button_icon_pos',
                [
                    'label'   => __( 'Icon Position', 'htmega-addons' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'left',
                    'options' => [
                        'left'   => __( 'Left', 'htmega-addons' ),
                        'right' => __( 'Right', 'htmega-addons' ),
                    ],
                    'condition'=>[
                        'button_icon!'=>'',
                    ]      
                ]
            );

            $this->add_control(
                'button_icon_space',
                [
                    'label'   => esc_html__( 'Icon Spacing', 'htmega-addons' ),
                    'type'    => Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 5,
                    ],
                    'range' => [
                        'px' => [
                            'max' => 100,
                        ],
                    ],
                    'condition' => [
                        'button_icon!' => '',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .offcanvas.align-icon-right a i' => 'margin-left: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .offcanvas.align-icon-left a i'  => 'margin-right: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'offcanvas_style_section',
            [
                'label' => __( 'Style', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'offcanvas_content_color',
                [
                    'label'     => esc_html__( 'Text Color', 'htmega-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .site-menu *' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'offcanvas_link_color',
                [
                    'label'     => esc_html__( 'Link Color', 'htmega-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .site-menu a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'offcanvas_link_hover_color',
                [
                    'label'     => esc_html__( 'Link Hover Color', 'htmega-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .site-menu a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'offcanvas_padding',
                [
                    'label' => __( 'Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .site-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'offcanvas_background',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .site-menu',
                ]
            );

            $this->add_responsive_control(
                'offcanvas_aligntitle',
                [
                    'label' => __( 'Alignment', 'htmega-addons' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'htmega-addons' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'htmega-addons' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'htmega-addons' ),
                            'icon' => 'fa fa-align-right',
                        ],
                        'justify' => [
                            'title' => __( 'Justified', 'htmega-addons' ),
                            'icon' => 'fa fa-align-justify',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .site-menu' => 'text-align: {{VALUE}};',
                    ],
                    'default' => 'center',
                ]
            );
            
        $this->end_controls_section();

        // Button Style tab section
        $this->start_controls_section(
            'offcanvas_button_style_section',
            [
                'label' => __( 'Button', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs('offcanvas_button_style_tabs');

                // Normal Style
                $this->start_controls_tab(
                    'offcanvas_button_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'htmega-addons' ),
                    ]
                );

                    $this->add_control(
                        'offcanvas_button_color',
                        [
                            'label'     => esc_html__( 'Color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .offcanvas .canvas-btn' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'offcanvas_button_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_4,
                            'selector' => '{{WRAPPER}} .offcanvas .canvas-btn',
                        ]
                    );

                    $this->add_responsive_control(
                        'offcanvas_button_padding',
                        [
                            'label' => __( 'Padding', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .offcanvas .canvas-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'offcanvas_button_border',
                            'label' => __( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .offcanvas .canvas-btn',
                        ]
                    );

                    $this->add_responsive_control(
                        'offcanvas_button_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .offcanvas .canvas-btn' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'offcanvas_button_background',
                            'label' => __( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .offcanvas .canvas-btn',
                        ]
                    );

                $this->end_controls_tab(); // Button Normal style end

                // Button Hover style
                $this->start_controls_tab(
                    'offcanvas_button_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'htmega-addons' ),
                    ]
                );

                    $this->add_control(
                        'offcanvas_button_hover_color',
                        [
                            'label'     => esc_html__( 'Color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .offcanvas .canvas-btn:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'offcanvas_button_hover_background',
                            'label' => __( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .offcanvas .canvas-btn:hover',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'offcanvas_button_hover_border',
                            'label' => __( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .offcanvas .canvas-btn:hover',
                        ]
                    );

                $this->end_controls_tab(); // Button Hover end

            $this->end_controls_tabs();

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();

        $this->add_render_attribute( 'htmega_button', 'class', 'htmega-button' );
        $id = $this->get_id();

        // Button Text
        $buttontxt = $settings['button_text'];
        if( !empty( $settings['button_icon'] ) && $settings['button_icon_pos'] == 'left' ){
            $buttontxt = '<i class=" '.$settings['button_icon'].' "></i>'.$settings['button_text'];
        }elseif( !empty( $settings['button_icon'] ) && $settings['button_icon_pos'] == 'right' ){
            $buttontxt = $settings['button_text'].'<i class=" '.$settings['button_icon'].' "></i>';
        }else{
           $buttontxt = $buttontxt; 
        }
       
        ?>

            <div class="offcanvas align-icon-<?php echo esc_attr__( $settings['button_icon_pos'], 'htmega-addons' ); ?>">
                <a href="#" class="canvas-btn site-menu-<?php echo esc_attr__( $id, 'htmega-addons' ); ?>">
                    <?php echo $buttontxt; ?>
                </a>
            </div>

            <!-- Site Menu Area -->
            <div id="site-menu-<?php echo esc_attr__( $id, 'htmega-addons' ); ?>" class="site-menu align-<?php echo esc_attr__( $settings['offcanvas_position'], 'htmega-addons' ); ?>-active">
                <a href="#site-menu-<?php echo esc_attr__( $id, 'htmega-addons' ); ?>" class="canvas-closebtn site-menu-<?php echo esc_attr__( $id, 'htmega-addons' ); ?>"><i class="fa fa-times"></i></a>
                <?php 
                    if ( $settings['content_source'] == 'sidebar' && !empty( $settings['sidebars_id'] ) ) {
                        dynamic_sidebar( $settings['sidebars_id'] );
                    } elseif ( $settings['content_source'] == 'elementor' && !empty( $settings['template_id'] )) {
                        echo Plugin::instance()->frontend->get_builder_content_for_display( $settings['template_id'] );
                    }
                ?>
            </div>

            <script>
                jQuery(document).ready(function($) {
                    "use strict";

                    $('.canvas-btn.site-menu-<?php echo esc_attr__( $id, 'htmega-addons' ); ?>').on('click' ,function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        if ($this.hasClass('active') && $('#site-menu-<?php echo esc_attr__( $id, 'htmega-addons' ); ?>').hasClass('show-nav')) {
                            $this.removeClass('active');
                            $('#site-menu-<?php echo esc_attr__( $id, 'htmega-addons' ); ?>').removeClass('show-nav');
                            $('body').removeClass('show-overlay');
                        }
                         else {
                            $('.canvas-btn').removeClass('active');
                            $this.addClass('active');
                            $('.site-menu').removeClass('show-nav');
                            $('#site-menu-<?php echo esc_attr__( $id, 'htmega-addons' ); ?>').addClass('show-nav');
                            $('body').addClass('show-overlay');
                        }
                    });
                    
                    $('.canvas-closebtn.site-menu-<?php echo esc_attr__( $id, 'htmega-addons' ); ?>').on('click' ,function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        $('.canvas-btn').removeClass('active');
                        $('#site-menu-<?php echo esc_attr__( $id, 'htmega-addons' ); ?>').removeClass('show-nav');
                        $('body').removeClass('show-overlay');
                    });

                    $('body').on('click' ,function(e) {
                        var $target = e.target;
                        if(!$($target).is('.canvas-btn') && !$($target).parents().is('.site-menu') && !$($target).is('.site-menu')){
                            $('.canvas-btn').removeClass('active');
                            $('.site-menu').removeClass('show-nav');
                            $('body').removeClass('show-overlay');
                        }
                    });

                });
            </script>

        <?php


    }

}

