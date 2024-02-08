<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTMega_Elementor_Widget_Weather extends Widget_Base {

    public function get_name() {
        return 'htmega-weather-addons';
    }
    
    public function get_title() {
        return __( 'Weather', 'htmega-addons' );
    }

    public function get_icon() {
        return 'htmega-icon eicon-captcha';
    }

    public function get_categories() {
        return [ 'htmega-addons' ];
    }

    public function get_script_depends() {
        return [
            'flatweather',
            'htmega-widgets-scripts',
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'weather_content',
            [
                'label' => __( 'Weather', 'htmega-addons' ),
            ]
        );

            $this->add_control(
                'location',
                [
                    'label'   => __( 'Location', 'htmega-addons' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => 'Dhaka',
                ]
            );

            $this->add_control(
                'country',
                [
                    'label'   => __( 'Country', 'htmega-addons' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => 'Bangladesh',
                ]
            );

            $this->add_control(
                'layout',
                [
                    'label'   => __( 'Layout', 'htmega-addons' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'full',
                    'options' => [
                        'full'     => __( 'Full', 'htmega-addons' ),
                        'partial'  => __( 'Partial', 'htmega-addons' ),
                        'simple'   => __( 'Simple', 'htmega-addons' ),
                        'today'    => __( 'Today', 'htmega-addons' ),
                        'forecast' => __( 'Forecast', 'htmega-addons' ),
                    ],
                ]
            );

            $this->add_control(
                'displaycitynameonly',
                [
                    'label'   => __( 'Hide Country Name', 'htmega-addons' ),
                    'type'    => Controls_Manager::SWITCHER,
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'units',
                [
                    'label'   => __( 'Units', 'htmega-addons' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'metric',
                    'options' => [
                        'auto'     => __( 'Auto', 'htmega-addons' ),
                        'metric'   => __( 'Metric', 'htmega-addons' ),
                        'imperial' => __( 'Imperial', 'htmega-addons' ),
                    ],
                ]
            );

            $this->add_control(
                'timeformat',
                [
                    'label'   => __( 'Time Format', 'htmega-addons' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => '12',
                    'options' => [
                        '12' => __( '12', 'htmega-addons' ),
                        '24' => __( '24', 'htmega-addons' ),
                    ],
                ]
            );

            $this->add_control(
                'forecast',
                [
                    'label' => __( 'Forecast', 'htmega-addons' ),
                    'type'  => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 5,
                        ],
                    ],
                    'default' => [
                        'size' => 5,
                    ],
                ]
            );
            
        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'weather_area_style_section',
            [
                'label' => __( 'Style', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'weather_area_text_color',
                [
                    'label'     => __( 'Color', 'htmega-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-weather .flatWeatherPlugin' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'weather_area_border',
                    'label' => __( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-weather',
                ]
            );

            $this->add_responsive_control(
                'weather_area_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-weather' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );


            $this->add_responsive_control(
                'weather_area_padding',
                [
                    'label'      => __( 'Padding', 'htmega-addons' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-weather' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator'=>'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'weather_area_background',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-weather',
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'weather_area_box_shadow',
                    'label' => __( 'Box Shadow', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-weather',
                ]
            );

        $this->end_controls_section();

        // Title Style
        $this->start_controls_section(
            'weather_title_style_section',
            [
                'label' => __( 'Title', 'htmega-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'weather_title_color',
                [
                    'label'     => __( 'Color', 'htmega-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-weather h2' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'weather_title_typography',
                    'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
                    'selector' => '{{WRAPPER}} .htmega-weather h2',
                ]
            );

            $this->add_responsive_control(
                'weather_title_padding',
                [
                    'label'      => __( 'Padding', 'htmega-addons' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-weather h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'weather_title_margin',
                [
                    'label'      => __( 'Margin', 'htmega-addons' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-weather h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator'=>'after',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name'        => 'weather_title_border',
                    'label' => __( 'Border', 'htmega-addons' ),
                    'selector'    => '{{WRAPPER}} .htmega-weather h2',
                ]
            );

            $this->add_control(
                'weather_title_radius',
                [
                    'label'      => __( 'Radius', 'elementor' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors'  => [
                        '{{WRAPPER}} .htmega-weather h2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'weather_title_background',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-weather h2',
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name'     => 'weather_title_shadow',
                    'label'     => __( 'Box Shadow', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-weather h2',
                ]
            );

        $this->end_controls_section();

        // Day style
        $this->start_controls_section(
            'weather_days_style_section',
            [
                'label' => __( 'Days', 'htmega-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'weather_days_color',
                [
                    'label'     => __( 'Color', 'htmega-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-weather .wiDetail .wiDay, {{WRAPPER}} .htmega-weather .wiDay span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'weather_days_typography',
                    'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
                    'selector' => '{{WRAPPER}} .htmega-weather .wiDetail .wiDay, {{WRAPPER}} .htmega-weather .wiDay span',
                ]
            );

            $this->add_control(
                'weather_days_border_color',
                [
                    'label'     => __( 'Border Color', 'htmega-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-weather ul.wiForecasts li.wiDay' => 'border-color: {{VALUE}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Unit style
        $this->start_controls_section(
            'weather_unit_style_section',
            [
                'label' => __( 'Unit', 'htmega-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'weather_unit_color',
                [
                    'label'     => __( 'Color', 'htmega-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-weather .wiTemperature' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .htmega-weather .wiMax' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .htmega-weather .wiMin' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'weather_unit_typography',
                    'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
                    'selector' => '{{WRAPPER}} .htmega-weather .wiTemperature',
                ]
            );

            $this->add_responsive_control(
                'weather_unit_padding',
                [
                    'label'      => __( 'Padding', 'htmega-addons' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-weather .wiTemperature' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'weather_unit_margin',
                [
                    'label'      => __( 'Margin', 'htmega-addons' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-weather .wiTemperature' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name'        => 'weather_unit_border',
                    'label'      => __( 'Border', 'htmega-addons' ),
                    'selector'    => '{{WRAPPER}} .htmega-weather .wiTemperature',
                ]
            );

            $this->add_control(
                'weather_unit_border_radius',
                [
                    'label'      => __( 'Border Radius', 'elementor' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors'  => [
                        '{{WRAPPER}} .htmega-weather .wiTemperature' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'weather_unit_background',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-weather .wiTemperature',
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name'     => 'weather_unit_box_shadow',
                    'label'      => __( 'Box Shadow', 'elementor' ),
                    'selector' => '{{WRAPPER}} .htmega-weather .wiTemperature',
                ]
            );

        $this->end_controls_section();

        // Icon style
        $this->start_controls_section(
            'weather_icon_style_section',
            [
                'label' => __( 'Icon', 'htmega-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'weather_icon_color',
                [
                    'label'     => __( 'Color', 'htmega-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .htmega-weather .wiIconGroup' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .htmega-weather .wiForecast .wi:before' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .htmega-weather .astronomy .wi:before' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .htmega-weather .atmosphere .wi:before' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'weather_icon_typography',
                    'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
                    'selector' => '{{WRAPPER}} .htmega-weather .wiIconGroup',
                ]
            );

            $this->add_responsive_control(
                'weather_icon_padding',
                [
                    'label'      => __( 'Padding', 'htmega-addons' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-weather .wiIconGroup' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'weather_icon_margin',
                [
                    'label'      => __( 'Margin', 'htmega-addons' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-weather .wiIconGroup' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name'        => 'weather_icon_border',
                    'label'      => __( 'Border', 'htmega-addons' ),
                    'selector'    => '{{WRAPPER}} .htmega-weather .wiIconGroup',
                ]
            );

            $this->add_control(
                'weather_icon_radius',
                [
                    'label'      => __( 'Border Radius', 'elementor' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors'  => [
                        '{{WRAPPER}} .htmega-weather .wiIconGroup' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'weather_icon_background',
                    'label' => __( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-weather .wiIconGroup',
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name'     => 'weather_icon_shadow',
                    'label'      => __( 'Box Shadow', 'elementor' ),
                    'selector' => '{{WRAPPER}} .htmega-weather .wiIconGroup',
                ]
            );

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();
        $this->add_render_attribute( 'htmega_button', 'class', 'htmega-button' );
        $id = $this->get_id();
       
        ?>
            <div id="htmega-weather-<?php echo esc_attr__( $id, 'htmega-addons' ); ?>" class="htmega-weather" ></div>
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    var htmega_weather = $("#htmega-weather-<?php echo esc_attr($id); ?>").flatWeatherPlugin({
                        location: "<?php echo esc_attr( $settings['location'] ); ?>", 
                        country: "<?php echo esc_attr( $settings['country'] ); ?>",     
                        view : "<?php echo esc_attr( $settings['layout'] ); ?>", 
                        displayCityNameOnly : <?php echo ( $settings['displaycitynameonly'] ) ? 'true' : 'false' ?>,
                        timeformat: <?php echo esc_attr( $settings['timeformat'] ); ?>, 
                        forecast: <?php echo esc_attr($settings['forecast']['size']); ?>, 
                        units : "<?php echo esc_attr( $settings['units'] ); ?>",
                        api: "yahoo",
                    });
                });
            </script>
        <?php

    }

}

