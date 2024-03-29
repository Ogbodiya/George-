<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTMega_Elementor_Widget_SocialShere extends Widget_Base {

    public function get_name() {
        return 'htmega-social-shere-addons';
    }
    
    public function get_title() {
        return __( 'Social Shere', 'htmega-addons' );
    }

    public function get_icon() {
        return 'htmega-icon eicon-share';
    }
    public function get_categories() {
        return [ 'htmega-addons' ];
    }

    public function get_script_depends() {
        return [
            'htmega-goodshare',
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'social_media_sheres',
            [
                'label' => __( 'Social Shere', 'htmega-addons' ),
            ]
        );
        
            $repeater = new Repeater();

            $repeater->start_controls_tabs('social_content_area_tabs');

                $repeater->start_controls_tab(
                    'social_content_tab',
                    [
                        'label' => __( 'Content', 'htmega-addons' ),
                    ]
                );

                    $repeater->add_control(
                        'htmega_social_media',
                        [
                            'label' => __( 'Social Media', 'htmega-addons' ),
                            'type' => Controls_Manager::SELECT,
                            'default' => 'facebook',
                            'options' => [
                                'facebook'      => __( 'Facebook', 'htmega-addons' ),
                                'twitter'       => __( 'Twitter', 'htmega-addons' ),
                                'googleplus'    => __( 'Google+', 'htmega-addons' ),
                                'pinterest'     => __( 'Pinterest', 'htmega-addons' ),
                                'linkedin'      => __( 'Linkedin', 'htmega-addons' ),
                                'tumblr'        => __( 'tumblr', 'htmega-addons' ),
                                'vkontakte'     => __( 'Vkontakte', 'htmega-addons' ),
                                'odnoklassniki' => __( 'Odnoklassniki', 'htmega-addons' ),
                                'moimir'        => __( 'Moimir', 'htmega-addons' ),
                                'livejournal'   => __( 'Live journal', 'htmega-addons' ),
                                'blogger'       => __( 'Blogger', 'htmega-addons' ),
                                'digg'          => __( 'Digg', 'htmega-addons' ),
                                'evernote'      => __( 'Evernote', 'htmega-addons' ),
                                'reddit'        => __( 'Reddit', 'htmega-addons' ),
                                'delicious'     => __( 'Delicious', 'htmega-addons' ),
                                'stumbleupon'   => __( 'Stumbleupon', 'htmega-addons' ),
                                'pocket'        => __( 'Pocket', 'htmega-addons' ),
                                'surfingbird'   => __( 'Surfingbird', 'htmega-addons' ),
                                'liveinternet'  => __( 'Liveinternet', 'htmega-addons' ),
                                'buffer'        => __( 'Buffer', 'htmega-addons' ),
                                'instapaper'    => __( 'Instapaper', 'htmega-addons' ),
                                'xing'          => __( 'Xing', 'htmega-addons' ),
                                'wordpress'     => __( 'WordPress', 'htmega-addons' ),
                                'baidu'         => __( 'Baidu', 'htmega-addons' ),
                                'renren'        => __( 'Renren', 'htmega-addons' ),
                                'weibo'         => __( 'Weibo', 'htmega-addons' ),
                                'skype'         => __( 'Skype', 'htmega-addons' ),
                                'telegram'      => __( 'Telegram', 'htmega-addons' ),
                                'viber'         => __( 'Viber', 'htmega-addons' ),
                                'whatsapp'      => __( 'Whatsapp', 'htmega-addons' ),
                                'line'          => __( 'Line', 'htmega-addons' ),
                            ],
                        ]
                    );

                    $repeater->add_control(
                        'htmega_social_title',
                        [
                            'label'   => esc_html__( 'Title', 'htmega-addons' ),
                            'type'    => Controls_Manager::TEXT,
                            'default' => esc_html__( 'Facebook', 'htmega-addons' ),
                        ]
                    );

                    $repeater->add_control(
                        'htmega_social_icon',
                        [
                            'label'   => esc_html__( 'Icon', 'htmega-addons' ),
                            'type'    => Controls_Manager::ICON,
                            'default' => 'fa fa-facebook',
                        ]
                    );

                $repeater->end_controls_tab(); // Content tab end

                $repeater->start_controls_tab(
                    'social_rep_style',
                    [
                        'label' => __( 'Style', 'htmega-addons' ),
                    ]
                );

                    $repeater->add_control(
                        'normal_style_heading',
                        [
                            'label' => __( 'Normal Style', 'htmega-addons' ),
                            'type' => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );

                    $repeater->add_control(
                        'social_text_color',
                        [
                            'label'     => __( 'Color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $repeater->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'social_rep_background',
                            'label' => __( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}',
                        ]
                    );

                    $repeater->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'social_rep_border',
                            'label' => __( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}',
                        ]
                    );

                    $repeater->add_control(
                        'hover_style_heading',
                        [
                            'label' => __( 'Hover Style', 'htmega-addons' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );


                    $repeater->add_control(
                        'social_text_hover_color',
                        [
                            'label'     => __( 'Hover color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $repeater->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'social_rep_hover_background',
                            'label' => __( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}:hover',
                        ]
                    );

                    $repeater->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'social_rep_hover_border',
                            'label' => __( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}:hover',
                        ]
                    );

                $repeater->end_controls_tab();// End Style tab

                // Start Icon tab
                $repeater->start_controls_tab(
                    'social_rep_icon_style',
                    [
                        'label' => __( 'Icon Style', 'htmega-addons' ),
                    ]
                );
                    
                    $repeater->add_control(
                        'normal_style_icon_heading',
                        [
                            'label' => __( 'Normal Style', 'htmega-addons' ),
                            'type' => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );

                    $repeater->add_control(
                        'social_icon_color',
                        [
                            'label'     => __( 'Color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}} i' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $repeater->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'social_rep_icon_background',
                            'label' => __( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}} i',
                        ]
                    );

                    $repeater->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'social_rep_icon_border',
                            'label' => __( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}} i',
                        ]
                    );

                    $repeater->add_responsive_control(
                        'social_rep_icon_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}} i' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                            'separator'=>'after',
                        ]
                    );

                    $repeater->add_control(
                        'hover_style_icon_heading',
                        [
                            'label' => __( 'Hover Style', 'htmega-addons' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );


                    $repeater->add_control(
                        'social_icon_hover_color',
                        [
                            'label'     => __( 'Hover color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}:hover i' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $repeater->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'social_rep_icon_hover_background',
                            'label' => __( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}:hover i',
                        ]
                    );

                    $repeater->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'social_rep_icon_hover_border',
                            'label' => __( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}:hover i',
                        ]
                    );

                $repeater->end_controls_tab();// End icon Style tab

            $repeater->end_controls_tabs();// Repeater Tabs end

            $this->add_control(
                'htmega_socialmedia_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => array_values( $repeater->get_controls() ),
                    'default' => [
                        [
                            'htmega_social_title' => esc_html__( 'Facebook', 'htmega-addons' ),
                            'htmega_social_icon' => 'fa fa-facebook',
                        ],
                    ],
                    'title_field' => '{{{ htmega_social_title }}}',
                ]
            );

        $this->end_controls_section();

        // Advance Options
        $this->start_controls_section(
            'social_media_sheres_advance_opt',
            [
                'label' => __( 'Advance Options', 'htmega-addons' ),
            ]
        );
            
            $this->add_control(
                'social_view',
                [
                    'label' => esc_html__( 'View', 'htmega-addons' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => false,
                    'options' => [
                        'icon'       => 'Icon',
                        'title'      => 'Title',
                        'icon-title' => 'Icon & Title',
                    ],
                    'default'      => 'icon',
                ]
            );

            $this->add_control(
                'show_label',
                [
                    'label'        => esc_html__( 'Title', 'htmega-addons' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'Show', 'htmega-addons' ),
                    'label_off'    => esc_html__( 'Hide', 'htmega-addons' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                    'condition'    => [
                        'social_view' => 'icon-text',
                    ],
                ]
            );

            $this->add_control(
                'show_counter',
                [
                    'label'        => esc_html__( 'Count', 'htmega-addons' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'Show', 'htmega-addons' ),
                    'label_off'    => esc_html__( 'Hide', 'htmega-addons' ),
                    'return_value' => 'yes',
                    'condition'    => [
                        'social_view!' => 'icon',
                    ],
                ]
            );

        $this->end_controls_section();// End Advance Options

        // Style tab section
        $this->start_controls_section(
            'htmega_socialshere_style_section',
            [
                'label' => __( 'Style', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'social_shere_color',
                [
                    'label'     => __( 'color', 'htmega-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share ul li' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .htmega-social-share ul li span',
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'social_shere_background',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-social-share li',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'social_shere_border',
                    'label' => __( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-social-share li',
                ]
            );

            $this->add_responsive_control(
                'social_shere_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share li' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'social_shere_padding',
                [
                    'label' => __( 'Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'social_shere_margin',
                [
                    'label' => __( 'Margin', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'socialshere_icon_style_section',
            [
                'label' => __( 'Icon', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'social_view' => array( 'icon-title','icon'),
                ]
            ]
        );
            $this->add_control(
                'icon_fontsize',
                [
                    'label' => __( 'Icon Font Size', 'htmega-addons' ),
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
                        '{{WRAPPER}} .htmega-social-share ul li i' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'social_icon_background',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-social-share li i',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'social_icon_border',
                    'label' => __( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-social-share li i',
                ]
            );

            $this->add_responsive_control(
                'social_icon_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share li i' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'social_icon_margin',
                [
                    'label' => __( 'Margin', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share li i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

        $this->end_controls_section();
    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();

        $this->add_render_attribute( 'htmega_socialshere', 'class', 'htmega-social-share htmega-social-style-1' );
        if( $settings['social_view'] == 'icon-title' || $settings['social_view'] == 'title' ){
            $this->add_render_attribute( 'htmega_socialshere', 'class', 'htmega-social-view-'.$settings['social_view'] );
        }
             
        ?>
            <div <?php echo $this->get_render_attribute_string( 'htmega_socialshere' ); ?> >
                <ul>
                    <?php foreach ( $settings['htmega_socialmedia_list'] as $socialmedia ) :?>
                        <li class="elementor-repeater-item-<?php echo $socialmedia['_id']; ?>" data-social="<?php echo esc_attr__( $socialmedia['htmega_social_media'],'htmega-addons' ); ?>" > 
                            <?php
                                if( $settings['social_view'] == 'icon' ){
                                    echo sprintf('<i class="%1$s"></i>', $socialmedia['htmega_social_icon'] );
                                }elseif( $settings['social_view'] == 'title' ){
                                    echo sprintf('<span>%1$s</span>', $socialmedia['htmega_social_title'] );
                                }else{
                                    echo sprintf('<i class="%1$s"></i><span>%2$s</span>', $socialmedia['htmega_social_icon'], $socialmedia['htmega_social_title'] );
                                }

                                if( $settings['show_counter'] == 'yes' ){
                                    echo '<span class="htmega-share-counter" data-counter="'.$socialmedia['htmega_social_media'].'"></span>';
                                }
                            ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php

    }

}

