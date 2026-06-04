<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class SK_Testimonial_Carousel_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'sk-testimonial-carousel';
    }

    public function get_title() {
        return 'SK Testimonial Carousel';
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    public function get_style_depends() {
        return [ 'sk-testimonial-carousel-css' ];
    }

    public function get_script_depends() {
        return [ 'sk-testimonial-carousel-js' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => 'Testimonials',
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'rating',
            [
                'label' => 'Rating',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'default' => 5,
            ]
        );

        $repeater->add_control(
            'review_text',
            [
                'label' => 'Review Text',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'This is a sample testimonial text.',
            ]
        );

        $repeater->add_control(
            'client_name',
            [
                'label' => 'Client Name',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Sujar Khanal',
            ]
        );

        $repeater->add_control(
            'client_location',
            [
                'label' => 'Client Location',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Baneshwor, KTM',
            ]
        );

        $repeater->add_control(
            'client_image',
            [
                'label' => 'Client Image',
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'label' => 'Testimonial Items',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'review_text' => 'He is undoubtedly someone who you can trust and rely on.',
                        'client_name' => 'Sujar Khanal',
                        'client_location' => 'Baneshwor, KTM',
                        'rating' => 5,
                    ],
                    [
                        'review_text' => 'She was very clear with the information and advice she gave me.',
                        'client_name' => 'Thomas Khanal',
                        'client_location' => 'Banes',
                        'rating' => 5,
                    ],
                ],
                'title_field' => '{{{ client_name }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'carousel_settings',
            [
                'label' => 'Carousel Settings',
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'slides_per_view',
            [
                'label' => 'Slides Per View',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 2,
                'min' => 1,
                'max' => 4,
            ]
        );

        $this->add_control(
            'slides_per_scroll',
            [
                'label' => 'Slides Per Scroll',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1,
                'min' => 1,
                'max' => 4,
            ]
        );

        $this->add_control(
            'space_between',
            [
                'label' => 'Space Between Slides',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 40,
                'min' => 0,
                'max' => 100,
            ]
        );

        $this->add_control(
            'loop',
            [
                'label' => 'Loop',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Yes',
                'label_off' => 'No',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => 'Autoplay',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Yes',
                'label_off' => 'No',
                'default' => '',
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => 'Autoplay Speed',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3000,
                'min' => 500,
                'step' => 100,
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'label' => 'Pause On Hover',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Yes',
                'label_off' => 'No',
                'default' => 'yes',
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'center_mode',
            [
                'label' => 'Center Mode',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Yes',
                'label_off' => 'No',
                'default' => '',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'navigation_settings',
            [
                'label' => 'Navigation Settings',
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'navigation_type',
            [
                'label' => 'Navigation Type',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'icons',
                'options' => [
                    'none' => 'None',
                    'arrows' => 'Arrows',
                    'text' => 'Text',
                    'icons' => 'SVG Icons',
                ],
            ]
        );

        $this->add_control(
            'prev_text',
            [
                'label' => 'Previous Text',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Prev',
                'condition' => [
                    'navigation_type' => 'text',
                ],
            ]
        );

        $this->add_control(
            'next_text',
            [
                'label' => 'Next Text',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Next',
                'condition' => [
                    'navigation_type' => 'text',
                ],
            ]
        );

        $this->add_control(
            'prev_icon',
            [
                'label' => 'Previous Icon',
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-chevron-left',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'navigation_type' => 'icons',
                ],
            ]
        );

        $this->add_control(
            'next_icon',
            [
                'label' => 'Next Icon',
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-chevron-right',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'navigation_type' => 'icons',
                ],
            ]
        );

        $this->add_responsive_control(
            'nav_horizontal_position',
            [
                'label' => 'Navigation Horizontal Position',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => -300,
                        'max' => 1200,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 70,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sk-navigation' => 'left: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'navigation_type!' => 'none',
                ],
            ]
        );

        $this->add_responsive_control(
            'nav_vertical_position',
            [
                'label' => 'Navigation Vertical Position',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 400,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sk-navigation' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'navigation_type!' => 'none',
                ],
            ]
        );

        $this->add_responsive_control(
            'nav_gap',
            [
                'label' => 'Navigation Gap',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sk-navigation' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'navigation_type!' => 'none',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'pagination_settings',
            [
                'label' => 'Pagination Settings',
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'pagination_type',
            [
                'label' => 'Pagination Type',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'bullets',
                'options' => [
                    'none' => 'None',
                    'bullets' => 'Bullets',
                    'fraction' => 'Fraction',
                    'numbers' => 'Numbers',
                    'progressbar' => 'Progress Bar',
                ],
            ]
        );

        $this->add_responsive_control(
            'pagination_horizontal_position',
            [
                'label' => 'Pagination Horizontal Position',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => -300,
                        'max' => 1200,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sk-pagination' => 'left: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'pagination_type!' => 'none',
                ],
            ]
        );

        $this->add_responsive_control(
            'pagination_vertical_position',
            [
                'label' => 'Pagination Vertical Position',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 400,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sk-pagination' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'pagination_type!' => 'none',
                ],
            ]
        );

        $this->add_responsive_control(
            'pagination_alignment',
            [
                'label' => 'Alignment',
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => 'Left',
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => 'Center',
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => 'Right',
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .sk-pagination' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'pagination_type!' => 'none',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'navigation_style',
            [
                'label' => 'Navigation',
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'navigation_type!' => 'none',
                ],
            ]
        );

        $this->add_responsive_control(
            'nav_size',
            [
                'label' => 'Size',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem' ],
                'default' => [
                    'unit' => 'px',
                    'size' => 42,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sk-nav-button' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; font-size: calc({{SIZE}}{{UNIT}} * .36);',
                    '{{WRAPPER}} .sk-nav-button svg' => 'width: calc({{SIZE}}{{UNIT}} * .36); height: calc({{SIZE}}{{UNIT}} * .36);',
                ],
            ]
        );

        $this->add_control(
            'nav_color',
            [
                'label' => 'Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#111111',
                'selectors' => [
                    '{{WRAPPER}} .sk-nav-button' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sk-nav-button svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'nav_background',
            [
                'label' => 'Background',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sk-nav-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'nav_border',
                'selector' => '{{WRAPPER}} .sk-nav-button',
            ]
        );

        $this->add_responsive_control(
            'nav_border_radius',
            [
                'label' => 'Border Radius',
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} .sk-nav-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'nav_padding',
            [
                'label' => 'Padding',
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} .sk-nav-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'nav_hover_color',
            [
                'label' => 'Hover Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sk-nav-button:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .sk-nav-button:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'nav_hover_background',
            [
                'label' => 'Hover Background',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sk-nav-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'pagination_style',
            [
                'label' => 'Pagination',
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'pagination_type!' => 'none',
                ],
            ]
        );

        $this->add_responsive_control(
            'pagination_bullet_size',
            [
                'label' => 'Bullet Size',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem' ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'pagination_type' => 'bullets',
                ],
            ]
        );

        $this->add_responsive_control(
            'pagination_spacing',
            [
                'label' => 'Spacing',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-bullet, {{WRAPPER}} .sk-pagination-number' => 'margin-left: calc({{SIZE}}{{UNIT}} / 2); margin-right: calc({{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'pagination_typography',
                'selector' => '{{WRAPPER}} .sk-pagination, {{WRAPPER}} .sk-pagination-number',
                'condition' => [
                    'pagination_type' => [ 'numbers', 'fraction' ],
                ],
            ]
        );

        $this->add_control(
            'pagination_color',
            [
                'label' => 'Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sk-pagination, {{WRAPPER}} .sk-pagination-number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pagination_active_color',
            [
                'label' => 'Active Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-bullet-active' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .sk-pagination-number.swiper-pagination-bullet-active, {{WRAPPER}} .swiper-pagination-current' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .swiper-pagination-progressbar .swiper-pagination-progressbar-fill' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pagination_total_color',
            [
                'label' => 'Total Number Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-total' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'pagination_type' => 'fraction',
                ],
            ]
        );

        $this->add_control(
            'progressbar_background',
            [
                'label' => 'Progress Bar Background',
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-progressbar' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'pagination_type' => 'progressbar',
                ],
            ]
        );

        $this->add_responsive_control(
            'progressbar_height',
            [
                'label' => 'Progress Bar Height',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem' ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-progressbar' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'pagination_type' => 'progressbar',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function render_navigation_icon( $settings, $key, $fallback ) {
        if ( ! empty( $settings[ $key ]['value'] ) ) {
            \Elementor\Icons_Manager::render_icon( $settings[ $key ], [ 'aria-hidden' => 'true' ] );
            return;
        }

        echo esc_html( $fallback );
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $slides_per_view = ! empty( $settings['slides_per_view'] ) ? $settings['slides_per_view'] : 2;
        $slides_per_scroll = ! empty( $settings['slides_per_scroll'] ) ? $settings['slides_per_scroll'] : 1;
        $space_between = ! empty( $settings['space_between'] ) ? $settings['space_between'] : 40;
        $navigation_type = ! empty( $settings['navigation_type'] ) ? $settings['navigation_type'] : 'icons';
        $pagination_type = ! empty( $settings['pagination_type'] ) ? $settings['pagination_type'] : 'bullets';
        ?>

        <div class="sk-testimonial-carousel-wrapper"
             data-slides="<?php echo esc_attr( $slides_per_view ); ?>"
             data-scroll="<?php echo esc_attr( $slides_per_scroll ); ?>"
             data-space="<?php echo esc_attr( $space_between ); ?>"
             data-loop="<?php echo esc_attr( ! empty( $settings['loop'] ) && 'yes' === $settings['loop'] ? 'true' : 'false' ); ?>"
             data-autoplay="<?php echo esc_attr( ! empty( $settings['autoplay'] ) && 'yes' === $settings['autoplay'] ? 'true' : 'false' ); ?>"
             data-autoplay-speed="<?php echo esc_attr( ! empty( $settings['autoplay_speed'] ) ? $settings['autoplay_speed'] : 3000 ); ?>"
             data-pause-hover="<?php echo esc_attr( ! empty( $settings['pause_on_hover'] ) && 'yes' === $settings['pause_on_hover'] ? 'true' : 'false' ); ?>"
             data-center="<?php echo esc_attr( ! empty( $settings['center_mode'] ) && 'yes' === $settings['center_mode'] ? 'true' : 'false' ); ?>"
             data-pagination="<?php echo esc_attr( $pagination_type ); ?>">

            <div class="sk-testimonial-carousel swiper sk-pagination-<?php echo esc_attr( $pagination_type ); ?>">
                <div class="swiper-wrapper">

                    <?php foreach ( $settings['testimonials'] as $item ) : ?>
                        <div class="swiper-slide">
                            <div class="sk-testimonial-item">

                                <div class="sk-stars">
                                    <?php
                                    $rating = intval( $item['rating'] );
                                    for ( $i = 1; $i <= 5; $i++ ) {
                                        echo $i <= $rating ? '&#9733;' : '&#9734;';
                                    }
                                    ?>
                                </div>

                                <p class="sk-review">
                                    <?php echo esc_html( $item['review_text'] ); ?>
                                </p>

                                <div class="sk-client">
                                    <?php if ( ! empty( $item['client_image']['url'] ) ) : ?>
                                        <img class="sk-client-image" src="<?php echo esc_url( $item['client_image']['url'] ); ?>" alt="<?php echo esc_attr( $item['client_name'] ); ?>">
                                    <?php endif; ?>
                                    <div class="sk-client-info">
                                        <h4><?php echo esc_html( $item['client_name'] ); ?></h4>
                                        <span><?php echo esc_html( $item['client_location'] ); ?></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

                <?php if ( 'none' !== $pagination_type ) : ?>
                    <div class="sk-pagination swiper-pagination"></div>
                <?php endif; ?>

                <?php if ( 'none' !== $navigation_type ) : ?>
                    <div class="sk-navigation sk-navigation-<?php echo esc_attr( $navigation_type ); ?>">
                        <button class="sk-nav-button sk-prev swiper-button-prev" type="button" aria-label="<?php echo esc_attr__( 'Previous testimonial', 'sk-elementor-widgets' ); ?>">
                            <?php
                            if ( 'text' === $navigation_type ) {
                                echo esc_html( $settings['prev_text'] );
                            } elseif ( 'arrows' === $navigation_type ) {
                                echo '&larr;';
                            } else {
                                $this->render_navigation_icon( $settings, 'prev_icon', '<' );
                            }
                            ?>
                        </button>
                        <button class="sk-nav-button sk-next swiper-button-next" type="button" aria-label="<?php echo esc_attr__( 'Next testimonial', 'sk-elementor-widgets' ); ?>">
                            <?php
                            if ( 'text' === $navigation_type ) {
                                echo esc_html( $settings['next_text'] );
                            } elseif ( 'arrows' === $navigation_type ) {
                                echo '&rarr;';
                            } else {
                                $this->render_navigation_icon( $settings, 'next_icon', '>' );
                            }
                            ?>
                        </button>
                    </div>
                <?php endif; ?>

            </div>
        </div>

        <?php
    }
}
