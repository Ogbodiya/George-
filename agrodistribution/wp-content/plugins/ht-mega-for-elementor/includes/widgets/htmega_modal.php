<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTMega_Elementor_Widget_Modal extends Widget_Base {

    public function get_name() {
        return 'htmega-modal-addons';
    }
    
    public function get_title() {
        return __( 'Modal', 'htmega-addons' );
    }

    public function get_icon() {
        return 'htmega-icon eicon-eye';
    }

    public function get_categories() {
        return [ 'htmega-addons' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'modal_content',
            [
                'label' => __( 'Modal', 'htmega-addons' ),
            ]
        );
            
            $this->add_control(
                'modal_header_text',
                [
                    'label'   => __( 'Header Content', 'htmega-addons' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __('Modal Header Content','htmega-addons'),
                ]
            );

            $this->add_control(
                'content_source',
                [
                    'label'   => esc_html__( 'Select Content Source', 'htmega-addons' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'custom',
                    'options' => [
                        'custom'    => esc_html__( 'Custom', 'htmega-addons' ),
                        "elementor" => esc_html__( 'Elementor Template', 'htmega-addons' ),
                    ],
                ]
            );

             $this->add_control(
                'template_id',
                [
                    'label'       => __( 'Content', 'htmega-addons' ),
                    'type'        => Controls_Manager::SELECT,
                    'default'     => '0',
                    'options'     => htmega_elementor_template(),
                    'condition'   => [
                        'content_source' => "elementor"
                    ],
                ]
            );

             $this->add_control(
                'custom_content',
                [
                    'label' => __( 'Content', 'htmega-addons' ),
                    'type' => Controls_Manager::WYSIWYG,
                    'title' => __( 'Content', 'htmega-addons' ),
                    'show_label' => false,
                    'condition' => [
                        'content_source' =>'custom',
                    ],
                    'default' => __('Lorem ipsum dolor sit amet, consectetur adipis elit, sed do eiusmod tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitati ulla laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in repre in voluptate velit esse cillum dolore eu.','htmega-addons'),
                ]
            );

            $this->add_control(
                'modal_footer_text',
                [
                    'label'   => __( 'Footer Text', 'htmega-addons' ),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => __('Modal Footer Content','htmega-addons'),
                ]
            );

        $this->end_controls_section(); // Modal Content Area end

        // Modal Button Section area Start
        $this->start_controls_section(
            'modal_button',
            [
                'label' => __( 'Button', 'htmega-addons' ),
            ]
        );
            
            $this->add_control(
                'button_text',
                [
                    'label'   => __( 'Text', 'htmega-addons' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __('Modal Design','htmega-addons'),
                ]
            );

            $this->add_control(
                'button_icon_type',
                [
                    'label' => esc_html__('Icon Type','htmega-addons'),
                    'type' =>Controls_Manager::CHOOSE,
                    'options' =>[
                        'img' =>[
                            'title' =>__('Image','htmega-addons'),
                            'icon' =>'fa fa-picture-o',
                        ],
                        'icon' =>[
                            'title' =>__('Icon','htmega-addons'),
                            'icon' =>'fa fa-info',
                        ]
                    ],
                ]
            );

            $this->add_control(
                'button_image',
                [
                    'label' => __('Image','htmega-addons'),
                    'type'=>Controls_Manager::MEDIA,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'condition' => [
                        'button_icon_type' => 'img',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'button_imagesize',
                    'default' => 'large',
                    'separator' => 'none',
                    'condition' => [
                        'button_icon_type' => 'img',
                    ]
                ]
            );

            $this->add_control(
                'button_icon',
                [
                    'label' =>__('Icon','htmega-addons'),
                    'type'=>Controls_Manager::ICON,
                    'condition' => [
                        'button_icon_type' => 'icon',
                    ]
                ]
            );

        $this->end_controls_section(); // Modal Button end

        // Style tab section
        $this->start_controls_section(
            'modal_button_style',
            [
                'label' => __( 'Button', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs( 'button_style_tabs' );

                $this->start_controls_tab(
                    'button_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'htmega-addons' ),
                    ]
                );
                    $this->add_control(
                        'button_color',
                        [
                            'label' => __( 'Color', 'htmega-addons' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' => '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .htmega-modal-btn button' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'button_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                            'selector' => '{{WRAPPER}} .htmega-modal-btn button',
                            'separator' => 'before',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                            'name' => 'button_box_shadow',
                            'label' => __( 'Box Shadow', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .htmega-modal-btn button',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'button_background',
                            'label' => __( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .htmega-modal-btn button',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'button_border',
                            'label' => __( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .htmega-modal-btn button',
                        ]
                    );

                    $this->add_responsive_control(
                        'button_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-modal-btn button' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'button_padding',
                        [
                            'label' => __( 'Padding', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .htmega-modal-btn button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' =>'before',
                        ]
                    );

                    $this->add_control(
                        'button_icon_distance',
                        [
                            'label' => esc_html__( 'Icon space', 'htmega-addons' ),
                            'type' => Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 200,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .htmega-modal-btn button i' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' =>[
                                'button_icon_type' =>'icon',
                                'button_icon!' =>'',
                            ],
                            'separator' =>'after',
                        ]
                    );

                    $this->add_control(
                        'button_image_distance',
                        [
                            'label' => esc_html__( 'Image space', 'htmega-addons' ),
                            'type' => Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 200,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .htmega-modal-btn button img' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' =>[
                                'button_icon_type' =>'img',
                            ],
                            'separator' =>'after',
                        ]
                    );

                    $this->add_control(
                        'button_width',
                        [
                            'label' => esc_html__( 'Width', 'htmega-addons' ),
                            'type' => Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1200,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .htmega-modal-btn button' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'button_height',
                        [
                            'label' => esc_html__( 'Height', 'htmega-addons' ),
                            'type' => Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 200,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .htmega-modal-btn button' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'button_align',
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
                                '{{WRAPPER}} .htmega-modal-btn' => 'text-align: {{VALUE}};',
                            ],
                            'default' => 'left',
                            'separator' =>'before',
                        ]
                    );

                $this->end_controls_tab(); // Button Normal End

                $this->start_controls_tab(
                    'button_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'htmega-addons' ),
                    ]
                );
                    
                    $this->add_control(
                        'button_hover_color',
                        [
                            'label' => __( 'Color', 'htmega-addons' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' => '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .htmega-modal-btn button:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'button_hover_background',
                            'label' => __( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .htmega-modal-btn button:hover',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'button_hover_border',
                            'label' => __( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .htmega-modal-btn button:hover',
                        ]
                    );

                $this->end_controls_tab(); // Button Hover Tab end

            $this->end_controls_tabs();

        $this->end_controls_section();

        // Style Header tab section
        $this->start_controls_section(
            'modal_header_style',
            [
                'label' => __( 'Header', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'header_color',
                [
                    'label' => __( 'Color', 'htmega-addons' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#444444',
                    'selectors' => [
                        '{{WRAPPER}} .modal-header h5' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'header_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .modal-header h5',
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'header_box_shadow',
                    'label' => __( 'Box Shadow', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .modal-header',
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'header_background',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .modal-header',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'header_border',
                    'label' => __( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .modal-header',
                ]
            );

            $this->add_responsive_control(
                'header_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .modal-header' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'header_margin',
                [
                    'label' => __( 'Margin', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .modal-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'header_padding',
                [
                    'label' => __( 'Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .modal-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

        $this->end_controls_section();

        // Style Footer tab section
        $this->start_controls_section(
            'modal_footer_style',
            [
                'label' => __( 'Footer', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'footer_color',
                [
                    'label' => __( 'Color', 'htmega-addons' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#444444',
                    'selectors' => [
                        '{{WRAPPER}} .modal-footer p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'footer_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .modal-footer h5',
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'footer_background',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .modal-footer',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'footer_border',
                    'label' => __( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .modal-footer',
                ]
            );

            $this->add_responsive_control(
                'footer_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .modal-footer' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'footer_margin',
                [
                    'label' => __( 'Margin', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .modal-footer' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'footer_padding',
                [
                    'label' => __( 'Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .modal-footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_control(
                'footer_close_txt',
                [
                    'label' => __( 'Footer Close Button', 'htmega-addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Close', 'htmega-addons' ),
                ]
            );

            $this->add_control(
                'footer_close_color',
                [
                    'label' => __( 'Color', 'htmega-addons' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-modal-area .btn-secondary' => 'color: {{VALUE}};',
                    ],
                    'condition' =>[
                        'footer_close_txt!'=>'',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'footer_close_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .htmega-modal-area .btn-secondary',
                    'separator' => 'before',
                    'condition' =>[
                        'footer_close_txt!'=>'',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'footer_close_background',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-modal-area .btn-secondary',
                    'condition' =>[
                        'footer_close_txt!'=>'',
                    ]
                ]
            );

        $this->end_controls_section();

        // Style Footer tab section
        $this->start_controls_section(
            'modal_content_style',
            [
                'label' => __( 'Modal Content', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'content_color',
                [
                    'label' => __( 'Color', 'htmega-addons' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#444444',
                    'selectors' => [
                        '{{WRAPPER}} .modal-body' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .modal-body',
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'content_background',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .modal-body',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'content_border',
                    'label' => __( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .modal-body',
                ]
            );

            $this->add_responsive_control(
                'content_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .modal-body' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'content_margin',
                [
                    'label' => __( 'Margin', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .modal-body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'content_padding',
                [
                    'label' => __( 'Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .modal-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'content_align',
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
                        '{{WRAPPER}} .modal-body' => 'text-align: {{VALUE}};',
                    ],
                    'default' => 'left',
                    'separator' =>'before',
                ]
            );

            $this->add_control(
                'content_width',
                [
                    'label' => esc_html__( 'Modal Width', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => 300,
                            'max' => 1200,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-modal-area .modal-dialog' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();

        $id = $this->get_id();
        $this->add_render_attribute( 'htmega_modal_attr', 'class', 'htmega-modal-area modal fade' );
        $this->add_render_attribute( 'htmega_modal_attr', 'id', 'htmegamodal'.$id );
       
        ?>
            
            <div class="htmega-modal-btn">
                <?php
                    $buttontxt = isset( $settings['button_text'] ) ? $settings['button_text'] : '';
                    if( $settings['button_icon_type'] == 'img' && !empty( $settings['button_image']['url'] ) ){
                        $buttontxt = Group_Control_Image_Size::get_attachment_image_html( $settings, 'button_imagesize', 'button_image' ).$buttontxt;
                    }elseif( $settings['button_icon_type'] == 'icon' && !empty( $settings['button_icon'] )){
                        $buttontxt = '<i class=" '.$settings['button_icon'].' "></i>'.$buttontxt;
                    }else{
                        $buttontxt = $buttontxt;
                    }

                    echo sprintf('<button type="button" data-toggle="modal" data-target="#htmegamodal%1$s">%2$s</button>', $id, $buttontxt );
                ?>
            </div>

            <!-- Modal -->
            <div <?php echo $this->get_render_attribute_string( 'htmega_modal_attr' ); ?>>

                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <?php
                                if( !empty( $settings['modal_header_text'] ) ){
                                    echo '<h5>'.esc_html__( $settings['modal_header_text'],'htmega-addons' ).'</h5>';
                                }
                            ?>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>

                        <?php

                            if ( $settings['content_source'] == 'custom' && !empty( $settings['custom_content'] ) ) {
                                echo '<div class="modal-body">'.wp_kses_post( $settings['custom_content'] ).'</div>';
                            } elseif ( $settings['content_source'] == "elementor" && !empty( $settings['template_id'] )) {
                                echo '<div class="modal-body">'.Plugin::instance()->frontend->get_builder_content_for_display( $settings['template_id'] ).'</div>';
                            }
                        ?>

                        <div class="modal-footer">
                            <?php
                                if( !empty( $settings['modal_header_text'] ) ){
                                    echo '<p>'.esc_html__( $settings['modal_footer_text'],'htmega-addons' ).'</p>';
                                }
                                if( !empty( $settings['footer_close_txt'] ) ){
                                    echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">'.esc_html__($settings['footer_close_txt'],'htmega-addons').'</button>';
                                }
                            ?>
                        </div>

                    </div>
                </div>

            </div>

        <?php

    }

}

