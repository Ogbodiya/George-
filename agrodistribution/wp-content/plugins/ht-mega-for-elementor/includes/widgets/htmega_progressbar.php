<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTMega_Elementor_Widget_Progress_Bar extends Widget_Base {

    public function get_name() {
        return 'htmega-progressbar-addons';
    }
    
    public function get_title() {
        return __( 'Progress Bar', 'htmega-addons' );
    }

    public function get_icon() {
        return 'htmega-icon eicon-skill-bar';
    }
    public function get_categories() {
        return [ 'htmega-addons' ];
    }

    public function get_script_depends() {
        return [
            'easy-pie-chart',
            'htmega-widgets-scripts',
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'progressbar_content',
            [
                'label' => __( 'Progress Bar', 'htmega-addons' ),
            ]
        );
        
            $this->add_control(
                'htmega_progress_bar_style',
                [
                    'label' => __( 'Style', 'htmega-addons' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'horizontal',
                    'options' => [
                        'horizontal' => __( 'Horizontal', 'htmega-addons' ),
                        'vertical'   => __( 'Vertical', 'htmega-addons' ),
                        'circle'     => __( 'Circle', 'htmega-addons' ),
                    ],
                ]
            );

            $this->add_control(
                'htmega_progress_bar_type',
                [
                    'label' => __( 'Tyle', 'htmega-addons' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'normal',
                    'options' => [
                        'striped' => __( 'Striped', 'htmega-addons' ),
                        'normal'   => __( 'Normal', 'htmega-addons' ),
                    ],
                    'condition' =>[
                        'htmega_progress_bar_style!'=>'circle',
                    ]
                ]
            );

            $this->add_control(
                'striped_animated',
                [
                    'label' => __( 'Striped Animated', 'plugin-domain' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' =>[
                        'htmega_progress_bar_type' =>'striped',
                    ],
                ]
            );

            // Accordion One Repeater
            $this->add_control(
                'htmega_progressbar_list',
                [
                    'label' => __( 'Progress Bar', 'htmega-addons' ),
                    'type' => Controls_Manager::REPEATER,
                    'condition' =>[
                        'htmega_progress_bar_style!' =>'circle',
                    ],
                    'default' => [
                        [
                            'htmega_progressbar_title'         => __('WordPress','htmega-addons'),
                            'htmega_progressbar_color'         => '#18012c',
                            'htmega_progressbar_value_color'   => '#000000',
                        ],
                        [
                            'htmega_progressbar_title'         => __('Joomla','htmega-addons'),
                            'htmega_progressbar_color'         => '#18012c',
                            'htmega_progressbar_value_color'   => '#000000',
                        ],
                        [
                            'htmega_progressbar_title'         => __('Photoshop','htmega-addons'),
                            'htmega_progressbar_color'         => '#18012c',
                            'htmega_progressbar_value_color'   => '#000000',
                        ],
                    ],

                    'fields' => [
                        [
                            'name'        => 'htmega_progressbar_title',
                            'label'       => __( 'Title', 'htmega-addons' ),
                            'type'        => Controls_Manager::TEXT,
                            'default'     => __( 'WordPress' , 'htmega-addons' ),
                        ],

                        [
                            'name'        => 'htmega_progressbar_value',
                            'label' => __( 'Progress Bar Value', 'htmega-addons' ),
                            'type' => Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'default' => [
                                'unit' => '%',
                                'size' => 50,
                            ]
                        ],

                        [
                            'name' =>'htmega_progressbar_color',
                            'label'     => __( 'Progress bar color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .progress-bar' => 'background-color: {{VALUE}};',
                            ],
                        ],
                            
                        [
                            'name'      =>'htmega_progressbar_value_color',
                            'label'     => __( 'Progress bar value color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .percent-label' => 'color: {{VALUE}};',
                            ],
                        ],

                        [
                            'name'      =>'htmega_progressbar_value_bg_color',
                            'label'     => __( 'Progress bar value background color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .percent-label' => 'background-color: {{VALUE}};',
                            ],
                        ],

                        [
                            'name' =>'progressbar_before_after',
                            'label' => __( 'Value Indicator', 'htmega-addons' ),
                            'type' => Controls_Manager::SWITCHER,
                            'return_value' => 'yes',
                            'default' => 'no',
                        ],

                        [
                            'name' =>'progressbar_value_before_after_color',
                            'label'     => __( 'Indicator color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}}.htmega-progressbar-value-bottom .progress span.percent-label::after' => 'border-top: 5px solid {{VALUE}};',
                            ],
                            'condition' => [
                                'progressbar_before_after' =>'yes',
                            ],
                            'separator' => 'before',
                        ]

                    ],
                    'title_field' => '{{{ htmega_progressbar_title }}}',
                ]
            );

            // Accordion Two Repeater
            $this->add_control(
                'htmega_progressbar_list_two',
                [
                    'label' => __( 'Progress Bar', 'htmega-addons' ),
                    'type' => Controls_Manager::REPEATER,
                    'condition' =>[
                        'htmega_progress_bar_style' =>'circle',
                    ],
                    'default' => [
                        [
                            'htmega_progressbar_title'         => __('WordPress','htmega-addons'),
                        ],
                    ],

                    'fields' => [
                        [
                            'name'        => 'htmega_progressbar_title',
                            'label'       => __( 'Title', 'htmega-addons' ),
                            'type'        => Controls_Manager::TEXT,
                            'default'     => __( 'WordPress' , 'htmega-addons' ),
                        ],

                        [
                            'name'        => 'htmega_progressbar_value',
                            'label' => __( 'Progress Bar Value', 'htmega-addons' ),
                            'type' => Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'default' => [
                                'unit' => '%',
                                'size' => 50,
                            ]
                        ],

                        [
                            'name'        => 'htmega_progressbar_lineweight',
                            'label' => __( 'Progress Bar Width', 'htmega-addons' ),
                            'type' => Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 10,
                            ],
                        ],

                        [
                            'name'        => 'htmega_progressbar_size',
                            'label' => __( 'Progress Bar Size', 'htmega-addons' ),
                            'type' => Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 130,
                            ],
                        ],

                        [
                            'name'      =>'htmega_progressbar_two_color',
                            'label'     => __( 'Progress bar color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'default'   =>'#1cb9da',
                        ],

                        [
                            'name'      =>'htmega_progressbar_track_color',
                            'label'     => __( 'Progress bar track color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'default'   =>'#dcd9d9',
                        ],

                        [
                            'name'      =>'htmega_progressbar_two_value_color',
                            'label'     => __( 'Progress bar value color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .radial-progress span' => 'color: {{VALUE}};',
                            ],
                        ],

                        [
                            'name'      =>'htmega_progressbar_two_value_bg_color',
                            'label'     => __( 'Progress bar value background color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .radial-progress span' => 'background-color: {{VALUE}};',
                            ],
                        ],
                            
                        [
                            'name' => 'progressbar_single_items_padding',
                            'label' => __( 'Padding', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .radial-progressbg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ],

                        [
                            'name' => 'progressbar_single_items_border',
                            'label' => __( 'Border', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .radial-progressbg' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};border-style:solid;',
                            ],
                            'separator' => 'before',
                        ],

                        [
                            'name'      =>'progressbar_single_items_border_color',
                            'label'     => __( 'Border color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .radial-progressbg' => 'border-color: {{VALUE}};',
                            ],
                        ],
                            
                        [
                            'name' =>'progressbar_single_items_border_radius',
                            'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} {{CURRENT_ITEM}} .radial-progressbg' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                            'separator' => 'before',
                        ]

                    ],
                    'title_field' => '{{{ htmega_progressbar_title }}}',
                ]
            );

        $this->end_controls_section();

        // Style tab Title section
        $this->start_controls_section(
            'htmega_progressbar_title_style',
            [
                'label' => __( 'Title Style', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'titlebackground',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} p.htmega_progress_title',
                ]
            );

            $this->add_responsive_control(
                'progressbar_title_padding',
                [
                    'label' => __( 'Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} p.htmega_progress_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .radial-progress-single h5.radial-progress-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'progressbar_title_margin',
                [
                    'label' => __( 'Margin', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} p.htmega_progress_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .radial-progress-single h5.radial-progress-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'progressbar_title_border',
                    'label' => __( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} p.htmega_progress_title',
                ]
            );

            $this->add_responsive_control(
                'progressbar_title_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} p.htmega_progress_title' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                        '{{WRAPPER}} .radial-progress-single h5.radial-progress-title' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'progressbar_title_box_shadow',
                    'label' => __( 'Box Shadow', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} p.htmega_progress_title',
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'progressbar_progressbar_title_color',
                [
                    'label'     => __( 'Color', 'htmega-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} p.htmega_progress_title' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .radial-progress-single h5.radial-progress-title' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'progressbar_title_typography',
                    'label' => __( 'Typography', 'htmega-addons' ),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} p.htmega_progress_title',
                    'separator' => 'before',
                ]
            );

        $this->end_controls_section(); // Progress Bar title style tab end

        // Progress Bar value style tab start
        $this->start_controls_section(
            'htmega_progressbar_value_style',
            [
                'label'     => __( 'Value', 'htmega-addons' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'progress_value_postion',
                [
                    'label' => __( 'Position', 'htmega-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Inner', 'htmega-addons' ),
                    'label_off' => __( 'Outer', 'htmega-addons' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_responsive_control(
                'progressbar_value_padding',
                [
                    'label' => __( 'Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .progress span.percent-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .radial-progress-single .radial-progress span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'progressbar_value_border',
                    'label' => __( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .progress span.percent-label',
                ]
            );

            $this->add_responsive_control(
                'progressbar_value_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .progress span.percent-label' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                        '{{WRAPPER}} .radial-progress-single .radial-progress span' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'progressbar_value_box_shadow',
                    'label' => __( 'Box Shadow', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .progress span.percent-label',
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'progressbar_value_typography',
                    'label' => __( 'Typography', 'htmega-addons' ),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .htmega-single-skill .progress span.percent-label',
                    'separator' => 'before',
                ]
            );

        $this->end_controls_section(); // Progress Bar value style tab end



        // Progress Bar value style tab start
        $this->start_controls_section(
            'htmega_progressbar_items_style',
            [
                'label'     => __( 'Items Style', 'htmega-addons' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'htmega_progress_height',
                [
                    'label' => __( 'Height', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 5,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-single-skill .progress' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'htmega_progress_bar_style' =>'horizontal',
                    ],

                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'progressbarbackground',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-single-skill .progress',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'progressbar_items_border',
                    'label' => __( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-single-skill .progress', 
                ]
            );

            $this->add_responsive_control(
                'progressbar_items_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-single-skill .progress' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                        '{{WRAPPER}} .htmega-single-skill .progress-bar' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                        '{{WRAPPER}} .radial-progress-single' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'progressbar_items_box_shadow',
                    'label' => __( 'Box Shadow', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-single-skill .progress',
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'progressbar_items_padding',
                [
                    'label' => __( 'Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-single-skill .progress-bar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .radial-progress-single' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'progress_bar_indicator',
                [
                    'label' => __( 'Progress Indicator', 'htmega-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' =>[
                        'htmega_progress_bar_style!' => 'circle',
                    ],
                    'separator' => 'before',
                ]
            );


            $this->add_control(
                'indicatordimention',
                [
                    'label' => __( 'Indicator Size', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 24,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-progress-indicator .progress .progress-bar::after' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'progress_bar_indicator' =>'yes',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'indicatorbackground',
                    'label' => __( 'Indicator Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-progress-indicator .progress .progress-bar::after',
                    'condition' => [
                        'progress_bar_indicator' =>'yes',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'progressbar_indicator_border',
                    'label' => __( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-progress-indicator .progress .progress-bar::after',
                    'condition' => [
                        'progress_bar_indicator' =>'yes',
                    ],
                ]
            );

            $this->add_responsive_control(
                'progressbar_indicator_border_radius',
                [
                    'label' => esc_html__( 'Indicator Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-progress-indicator .progress .progress-bar::after' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                    'condition' => [
                        'progress_bar_indicator' =>'yes',
                    ],
                ]
            );


        $this->end_controls_section(); // Progress Bar value style tab end


    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();
        $progressbar_list = $settings['htmega_progressbar_list'];
        $progressbar_list_two = $settings['htmega_progressbar_list_two'];
        $progress_type_class = '';

        $this->add_render_attribute( 'htmega_progress_skill', 'class', 'htmega-single-skill' );
        $this->add_render_attribute( 'htmega_progress_skill', 'class', 'htmega-progress-bar-'.$settings['htmega_progress_bar_style'] );

        if( $settings['progress_bar_indicator'] == 'yes' ){
            $this->add_render_attribute( 'htmega_progress_skill', 'class', 'htmega-progress-indicator' );
        }
        if( $settings['progress_value_postion'] == 'yes' ){
            $this->add_render_attribute( 'htmega_progress_skill', 'class', 'htmega-progress-value-inner' );
            $this->add_render_attribute( 'htmega_progress_circle', 'class', 'htmega-progress-value-inner' );
        }

        if( $settings['htmega_progress_bar_type'] == 'striped' ){
            $progress_type_class = 'progress-bar-striped ';
        }

        if( $settings['striped_animated'] == 'yes' ){
            $progress_type_class .= 'progress-bar-animated';
        }


        if( $settings['htmega_progress_bar_style'] == 'circle' ){
            if( $progressbar_list_two ){
                $this->add_render_attribute( 'htmega_progress_circle', 'class', 'radial-progress-single' );
                foreach ( $progressbar_list_two as $item ) {
                    $this->add_render_attribute( 'htmega_progress_circle', 'class', 'elementor-repeater-item-'. $item['_id'] );

                    $items_value_size = $item['htmega_progressbar_size']['size'] - ( $item['htmega_progressbar_lineweight']['size']+8 );
                    ?>  
                    <div <?php echo $this->get_render_attribute_string( 'htmega_progress_circle' ); ?>>
                        <div class="radial-progressbg">
                            <div class="radial-progress" data-percent="<?php echo esc_attr__( $item['htmega_progressbar_value']['size'] );?>" data-bar-color="<?php echo esc_attr__($item['htmega_progressbar_two_color'],'htmega-addons');?>" data-track-color="<?php echo esc_attr__($item['htmega_progressbar_track_color'],'htmega-addons');?>" data-line-width="<?php echo esc_attr__($item['htmega_progressbar_lineweight']['size'],'htmega-addons');?>" data-size="<?php echo esc_attr__($item['htmega_progressbar_size']['size'],'htmega-addons');?>">
                                <span style="<?php echo 'line-height:'.$items_value_size.'px;';echo 'width:'.$items_value_size.'px;';echo 'height:'.$items_value_size.'px;';?>"><?php echo esc_attr__( $item['htmega_progressbar_value']['size'] ).'%';?></span>
                            </div>
                        </div>
                        <h5 class="radial-progress-title"><?php echo esc_attr__( $item['htmega_progressbar_title'],'htmega-addons' );?></h5>
                    </div>
                    <?php
                }
            }
        }else{
            if( $progressbar_list ){
                foreach ( $progressbar_list as $item ) {
                    $this->add_render_attribute( 'htmega_progress_skill', 'class', 'elementor-repeater-item-'. $item['_id'] );
                    if( $item['progressbar_before_after'] == 'yes' ){
                        $this->add_render_attribute( 'htmega_progress_skill', 'class', 'htmega-progressbar-value-bottom' );
                    }
                    ?>
                    <div <?php echo $this->get_render_attribute_string( 'htmega_progress_skill' ); ?> >
                        <p class="htmega_progress_title"><?php echo esc_attr__( $item['htmega_progressbar_title'],'htmega-addons' );?></p>
                        <div class="progress">
                            <div class="progress-bar wow <?php echo esc_attr__( $progress_type_class,'htmega-addons' ).' '; if( $settings['htmega_progress_bar_style'] == 'vertical' ){ echo 'fadeInUp'; }else{ echo 'fadeInLeft'; } ?>" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar"
                                style="<?php if( $settings['htmega_progress_bar_style'] == 'vertical' ){ echo 'height:'.esc_attr__( $item['htmega_progressbar_value']['size'] ).'%';} else{ echo 'width:'.esc_attr__( $item['htmega_progressbar_value']['size'] ).'%'; }?>;" aria-valuenow="<?php echo esc_attr__( $item['htmega_progressbar_value']['size'] );?>" aria-valuemin="0" aria-valuemax="100">
                                <span class="percent-label">
                                    <?php echo esc_attr__( $item['htmega_progressbar_value']['size'] ).'%';?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php
                } // End foreach
            }
        }
    }
}

