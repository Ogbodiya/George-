<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTMega_Elementor_Widget_Tooltip extends Widget_Base {

    public function get_name() {
        return 'htmega-tooltip-addons';
    }
    
    public function get_title() {
        return __( 'Tooltip', 'htmega-addons' );
    }

    public function get_icon() {
        return 'htmega-icon eicon-alert';
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
            'tooltip_button_content',
            [
                'label' => __( 'Tooltip', 'htmega-addons' ),
            ]
        );
            $this->add_responsive_control(
                'tooltip_type',
                [
                    'label' => esc_html__( 'Button Type', 'htmega-addons' ),
                    'type' => Controls_Manager::CHOOSE,
                    'label_block' => true,
                    'options' => [
                        'icon' => [
                            'title' => esc_html__( 'Icon', 'htmega-addons' ),
                            'icon' => 'fa fa-info',
                        ],
                        'text' => [
                            'title' => esc_html__( 'Text', 'htmega-addons' ),
                            'icon' => 'fa fa-text-width',
                        ],
                        'image' => [
                            'title' => esc_html__( 'Image', 'htmega-addons' ),
                            'icon' => 'fa fa-image',
                        ],
                    ],
                    'default' => 'text',
                ]
            );

            $this->add_control(
                'tooltip_button_txt',
                [
                    'label' => esc_html__( 'Text', 'htmega-addons' ),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => esc_html__( 'Tooltip', 'htmega-addons' ),
                    'condition' => [
                        'tooltip_type' => [ 'text' ]
                    ],
                    'dynamic' => [ 'active' => true ]
                ]
            );

            $this->add_control(
                'tooltip_button_icon',
                [
                    'label' => esc_html__( 'Icon', 'htmega-addons' ),
                    'type' => Controls_Manager::ICON,
                    'default' => 'fa fa-home',
                    'condition' => [
                        'tooltip_type' => [ 'icon' ]
                    ]
                ]
            );

            $this->add_control(
                'tooltip_button_img',
                [
                    'label' => __('Image','htmega-addons'),
                    'type'=>Controls_Manager::MEDIA,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'condition' => [
                        'tooltip_type' => [ 'image' ]
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'tooltip_button_imgsize',
                    'default' => 'large',
                    'separator' => 'none',
                    'condition' => [
                        'tooltip_type' => [ 'image' ]
                    ]
                ]
            );

            $this->add_control(
                'show_link',
                [
                    'label' => __( 'Show Link', 'htmega-addons' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'htmega-addons' ),
                    'label_off' => __( 'Hide', 'htmega-addons' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'button_link',
                [
                    'label' => __( 'Link', 'htmega-addons' ),
                    'type' => Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'htmega-addons' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                    'condition'=>[
                        'show_link'=>'yes',
                    ]
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'tooltip_options',
            [
                'label' => __( 'Tooltip Options', 'htmega-addons' ),
            ]
        );
            $this->add_control(
                'tooltip_text',
                [
                    'label' => esc_html__( 'Tooltip Text', 'htmega-addons' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'label_block' => true,
                    'default' => esc_html__( 'Tooltip content', 'htmega-addons' ),
                    'dynamic' => [ 'active' => true ]
                ]
            );

            $this->add_control(
              'tooltip_dir',
                [
                    'label'         => esc_html__( 'Direction', 'htmega-addons' ),
                    'type'          => Controls_Manager::SELECT,
                    'default'       => 'right',
                    'label_block'   => false,
                    'options'       => [
                        'left'      => esc_html__( 'Left', 'htmega-addons' ),
                        'right'     => esc_html__( 'Right', 'htmega-addons' ),
                        'top'       => esc_html__( 'Top', 'htmega-addons' ),
                        'bottom'    => esc_html__( 'Bottom', 'htmega-addons' ),
                    ],
                ]
            );

            $this->add_control(
                'tooltip_space',
                [
                    'label' => __( 'Space With Button', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1200,
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
                    'selectors' => [
                        '{{WRAPPER}} .bs-tooltip-auto[x-placement^=top]' => 'top: -{{SIZE}}{{UNIT}} !important;',
                        '{{WRAPPER}} .bs-tooltip-top' => 'top: -{{SIZE}}{{UNIT}} !important;',
                        '{{WRAPPER}} .bs-tooltip-auto[x-placement^=bottom]' => 'top: {{SIZE}}{{UNIT}} !important;',
                        '{{WRAPPER}} .bs-tooltip-bottom' => 'top: {{SIZE}}{{UNIT}} !important;',
                        '{{WRAPPER}} .bs-tooltip-auto[x-placement^=right]' => 'left: {{SIZE}}{{UNIT}} !important;',
                        '{{WRAPPER}} .bs-tooltip-right' => 'left: {{SIZE}}{{UNIT}} !important;',
                        '{{WRAPPER}} .bs-tooltip-auto[x-placement^=left]' => 'left: {{SIZE}}{{UNIT}} !important;',
                        '{{WRAPPER}} .bs-tooltip-left' => 'left: -{{SIZE}}{{UNIT}} !important;',
                    ],
                ]
            );

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'tooltip_style_section',
            [
                'label' => __( 'Style', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'tooltip_style_section_align',
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
                        '{{WRAPPER}} .htmega-tooltip' => 'text-align: {{VALUE}};',
                    ],
                    'default' => 'center',
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'tooltip_style_section_padding',
                [
                    'label' => __( 'Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-tooltip' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'tooltip_style_section_margin',
                [
                    'label' => __( 'Margin', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-tooltip' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );
            
        $this->end_controls_section();

        // Button Style tab section
        $this->start_controls_section(
            'tooltip_button_section',
            [
                'label' => __( 'Button', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->start_controls_tabs('button_style_tabs');

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
                                '{{WRAPPER}} .htmega-tooltip span' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .htmega-tooltip span a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'button_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                            'selector' => '{{WRAPPER}} .htmega-tooltip span',
                            'condition'=>[
                                'tooltip_type'=>'text',
                            ]
                        ]
                    );

                    $this->add_control(
                        'button_icon_fontsize',
                        [
                            'label' => __( 'Icon Size', 'htmega-addons' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 20,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tooltip span i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                            'condition'=>[
                                'tooltip_type'=>'icon',
                                'tooltip_button_icon!'=>'',
                            ]
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'button_background',
                            'label' => __( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .htmega-tooltip span',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'button_border',
                            'label' => __( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .htmega-tooltip span',
                        ]
                    );

                    $this->add_responsive_control(
                        'button_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tooltip span' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'button_margin',
                        [
                            'label' => __( 'Margin', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tooltip span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' =>'before',
                        ]
                    );

                    $this->add_responsive_control(
                        'button_padding',
                        [
                            'label' => __( 'Padding', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tooltip span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' =>'before',
                        ]
                    );

                $this->end_controls_tab(); // Normal tab end

                // Hover Tab start
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
                                '{{WRAPPER}} .htmega-tooltip span:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'button_hover_background',
                            'label' => __( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .htmega-tooltip span:hover',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'button_hover_border',
                            'label' => __( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .htmega-tooltip span:hover',
                        ]
                    );

                $this->end_controls_tab();// Hover tab end

            $this->end_controls_tabs();

        $this->end_controls_section();

        // Button Style tab section
        $this->start_controls_section(
            'hover_tooltip_style_section',
            [
                'label' => __( 'Tooltip', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs('hover_popover_style_tabs');

                $this->start_controls_tab(
                    'hover_tooltip_content_tab',
                    [
                        'label' => __( 'Content', 'htmega-addons' ),
                    ]
                );
                    $this->add_control(
                        'hover_tooltip_content_color',
                        [
                            'label' => __( 'Color', 'htmega-addons' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' => '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .tooltip-inner' => 'color: {{VALUE}} !important;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'hover_tooltip_content_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                            'selector' => '{{WRAPPER}} .tooltip-inner',
                        ]
                    );

                    $this->add_responsive_control(
                        'hover_tooltip_content_padding',
                        [
                            'label' => __( 'Padding', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .tooltip-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'separator' =>'before',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'hover_tooltip_content_background',
                            'label' => __( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .tooltip-inner',
                        ]
                    );

                    $this->add_responsive_control(
                        'hover_tooltip_content_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .tooltip-inner' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px !important;',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Arrow Tab End

                // Arrow Tab Start
                $this->start_controls_tab(
                    'hover_tooltip_arrow_tab',
                    [
                        'label' => __( 'Arrow', 'htmega-addons' ),
                    ]
                );
                    $this->add_control(
                        'hover_tooltip_arrow_color',
                        [
                            'label' => __( 'Arrow Color', 'htmega-addons' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' => '#404040',
                            'selectors' => [
                                '{{WRAPPER}} .bs-tooltip-auto[x-placement^=top] .arrow::before' => 'border-top-color: {{VALUE}} !important;',
                                '{{WRAPPER}} .bs-tooltip-top .arrow::before' => 'border-top-color: {{VALUE}} !important;',
                                '{{WRAPPER}} .bs-tooltip-auto[x-placement^=bottom] .arrow::before' => 'border-bottom-color: {{VALUE}} !important;',
                                '{{WRAPPER}} .bs-tooltip-bottom .arrow::before' => 'border-bottom-color: {{VALUE}} !important;',
                                '{{WRAPPER}} .bs-tooltip-auto[x-placement^=left] .arrow::before' => 'border-left-color: {{VALUE}} !important;',
                                '{{WRAPPER}} .bs-tooltip-left .arrow::before' => 'border-left-color: {{VALUE}} !important;',
                                '{{WRAPPER}} .bs-tooltip-auto[x-placement^=right] .arrow::before' => 'border-right-color: {{VALUE}} !important;',
                                '{{WRAPPER}} .bs-tooltip-right .arrow::before' => 'border-right-color: {{VALUE}} !important;',
                            ],
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();
        $id = $this->get_id();
        $this->add_render_attribute( 'htmega_tooltip_attr', 'class', 'htmega-tooltip htmega-tooltip-container-'.$id );
       
        ?>
            <div <?php echo $this->get_render_attribute_string( 'htmega_tooltip_attr' ); ?>>
                <?php

                    $button_txt = '';
                    if( isset( $settings['tooltip_button_txt'] ) ){
                        $button_txt = $settings['tooltip_button_txt'];
                    }
                    if( isset( $settings['tooltip_button_icon'] ) ){
                        $button_txt = '<i class=" '.$settings['tooltip_button_icon'].' "></i>';
                    }
                    if( isset( $settings['tooltip_button_img']['url'] ) ){
                        $button_txt = Group_Control_Image_Size::get_attachment_image_html( $settings, 'tooltip_button_imgsize', 'tooltip_button_img' );
                    }

                    // Button Generate
                    if ( isset(  $settings['button_link']['url'] ) && ! empty( $settings['button_link']['url'] ) ) {
                        $this->add_render_attribute( 'url', 'href', $settings['button_link']['url'] );

                        if ( $settings['button_link']['is_external'] ) {
                            $this->add_render_attribute( 'url', 'target', '_blank' );
                        }

                        if ( ! empty( $settings['button_link']['nofollow'] ) ) {
                            $this->add_render_attribute( 'url', 'rel', 'nofollow' );
                        }

                        $button_txt = sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'url' ), $button_txt );
                    }

                    echo sprintf('<span data-toggle="tooltip" data-container=".htmega-tooltip-container-%4$s" data-placement="%1$s" title="%2$s">%3$s</span>', $settings['tooltip_dir'], $settings['tooltip_text'], $button_txt, $id );
                ?>
            </div>

        <?php

    }

}

