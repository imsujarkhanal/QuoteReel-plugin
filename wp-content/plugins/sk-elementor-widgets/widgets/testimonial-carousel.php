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
            'rating',
            [
                'label' => 'Rating',
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'default' => 5,
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
            'show_arrows',
            [
                'label' => 'Show Navigation Arrows',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Yes',
                'label_off' => 'No',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_dots',
            [
                'label' => 'Show Pagination Dots',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => 'Yes',
                'label_off' => 'No',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $slides_per_view = ! empty( $settings['slides_per_view'] ) ? $settings['slides_per_view'] : 2;
        $space_between   = ! empty( $settings['space_between'] ) ? $settings['space_between'] : 40;
        ?>

        <div class="sk-testimonial-carousel-wrapper"
             data-slides="<?php echo esc_attr( $slides_per_view ); ?>"
             data-space="<?php echo esc_attr( $space_between ); ?>">

            <div class="sk-testimonial-carousel swiper">
                <div class="swiper-wrapper">

                    <?php foreach ( $settings['testimonials'] as $item ) : ?>
                        <div class="swiper-slide">
                            <div class="sk-testimonial-item">

                                <div class="sk-stars">
                                    <?php
                                    $rating = intval( $item['rating'] );
                                    for ( $i = 1; $i <= 5; $i++ ) {
                                        echo $i <= $rating ? '★' : '☆';
                                    }
                                    ?>
                                </div>

                                <p class="sk-review">
                                    <?php echo esc_html( $item['review_text'] ); ?>
                                </p>

                                <div class="sk-client">
                                    <h4><?php echo esc_html( $item['client_name'] ); ?></h4>
                                    <span><?php echo esc_html( $item['client_location'] ); ?></span>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

                <?php if ( 'yes' === $settings['show_dots'] ) : ?>
                    <div class="sk-pagination swiper-pagination"></div>
                <?php endif; ?>

                <?php if ( 'yes' === $settings['show_arrows'] ) : ?>
                    <div class="sk-navigation">
                        <div class="sk-prev swiper-button-prev"></div>
                        <div class="sk-next swiper-button-next"></div>
                    </div>
                <?php endif; ?>

            </div>
        </div>

        <?php
    }
}