<?php
/**
 * Safari Theme Customizer support
 *
 * @package WordPress
 * @subpackage Safari
 * @since Safari 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @since Safari 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function safari_customize_register($wp_customize) {

    $wp_customize->get_section('header_image')->priority = 27;
    $wp_customize->get_section('static_front_page')->priority = 28;
    $wp_customize->get_section('nav')->priority = 29;

    /** ===============
     * Extends CONTROLS class to add textarea
     */
    class safari_customize_textarea_control extends WP_Customize_Control {

        public $type = 'textarea';

        public function render_content() {
            ?>

            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5" style="width:98%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>

            <?php
        }

    }

    // Displays a list of categories in dropdown
    class WP_Customize_Dropdown_Categories_Control extends WP_Customize_Control {

        public $type = 'dropdown-categories';

        public function render_content() {
            $dropdown = wp_dropdown_categories(
                    array(
                        'name' => '_customize-dropdown-categories-' . $this->id,
                        'echo' => 0,
                        'hide_empty' => false,
                        'show_option_none' => '&mdash; ' . __('Select', 'safari') . ' &mdash;',
                        'hide_if_empty' => false,
                        'selected' => $this->value(),
                    )
            );

            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown);

            printf(
                    '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>', $this->label, $dropdown
            );
        }

    }

    // Add new section for theme layout and color schemes
    $wp_customize->add_section('safari_theme_layout_settings', array(
        'title' => __('Color Scheme', 'safari'),
        'priority' => 31,
    ));

    // Add color scheme options

    $wp_customize->add_setting('safari_bg_color_scheme', array(
        'default' => 'ligt',
        'sanitize_callback' => 'safari_sanitize_bg_color_scheme_option',
    ));

    $wp_customize->add_control('safari_bg_color_scheme', array(
        'label' => 'Background Color Schemes',
        'section' => 'safari_theme_layout_settings',
        'default' => 'light',
        'type' => 'radio',
        'choices' => array(
            'light' => __('Light', 'safari'),
            'dark' => __('Dark', 'safari'),
        ),
    ));

    // Add color scheme options

    $wp_customize->add_setting('safari_color_scheme', array(
        'default' => 'blue',
        'sanitize_callback' => 'safari_sanitize_color_scheme_option',
    ));

    $wp_customize->add_control('safari_color_scheme', array(
        'label' => 'Color Schemes',
        'section' => 'safari_theme_layout_settings',
        'default' => 'red',
        'type' => 'radio',
        'choices' => array(
            'blue' => __('Blue', 'safari'),
            'red' => __('Red', 'safari'),
            'green' => __('Green', 'safari'),
            'gray' => __('Gray', 'safari'),
            'purple' => __('Purple', 'safari'),
            'orange' => __('Orange', 'safari'),
            'brown' => __('Brown', 'safari'),
            'pink' => __('Pink', 'safari'),
        ),
    ));



    // Add new section for custom favicon settings
    $wp_customize->add_section('safari_custom_favicon_setting', array(
        'title' => __('Custom Favicon', 'safari'),
        'priority' => 77,
    ));


    $wp_customize->add_setting('custom_favicon');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'custom_favicon', array(
        'label' => 'Custom Favicon',
        'section' => 'safari_custom_favicon_setting',
        'settings' => 'custom_favicon',
        'priority' => 1,
            )
            )
    );

    // Add new section for custom favicon settings
    $wp_customize->add_section('safari_tracking_code_setting', array(
        'title' => __('Tracking Code', 'safari'),
        'priority' => 76,
    ));

    $wp_customize->add_setting('tracking_code', array('default' => '',
        'sanitize_js_callback' => 'safari_sanitize_escaping',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'tracking_code', array(
        'label' => __('Tracking Code', 'safari'),
        'section' => 'safari_tracking_code_setting',
        'settings' => 'tracking_code',
        'priority' => 2,
    )));


    // Add new section for Social Icons
    $wp_customize->add_section('social_icon_setting', array(
        'title' => __('Social Icons', 'safari'),
        'priority' => 35,
    ));

    // link url
    $wp_customize->add_setting('facebook_link_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('facebook_link_url', array(
        'label' => __('Facebook URL', 'safari'),
        'section' => 'social_icon_setting',
        'settings' => 'facebook_link_url',
        'priority' => 1,
    ));

    // link url
    $wp_customize->add_setting('twitter_link_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('twitter_link_url', array(
        'label' => __('Twitter URL', 'safari'),
        'section' => 'social_icon_setting',
        'settings' => 'twitter_link_url',
        'priority' => 2,
    ));

    // link url
    $wp_customize->add_setting('googleplus_link_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('googleplus_link_url', array(
        'label' => __('Google Plus URL', 'safari'),
        'section' => 'social_icon_setting',
        'settings' => 'googleplus_link_url',
        'priority' => 3,
    ));

    // link url
    $wp_customize->add_setting('pinterest_link_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('pinterest_link_url', array(
        'label' => __('Pinterest URL', 'safari'),
        'section' => 'social_icon_setting',
        'settings' => 'pinterest_link_url',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('github_link_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('github_link_url', array(
        'label' => __('Github URL', 'safari'),
        'section' => 'social_icon_setting',
        'settings' => 'github_link_url',
        'priority' => 5,
    ));

    // link url
    $wp_customize->add_setting('youtube_link_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('youtube_link_url', array(
        'label' => __('Youtube URL', 'safari'),
        'section' => 'social_icon_setting',
        'settings' => 'youtube_link_url',
        'priority' => 6,
    ));

    // Add new section for slider settings
    $wp_customize->add_section('home_slider_setting', array(
        'title' => __('Home Slider', 'safari'),
        'priority' => 36,
    ));

    $wp_customize->add_setting('slider_one', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_one', array(
        'label' => 'Slider 1',
        'section' => 'home_slider_setting',
        'settings' => 'slider_one',
        'priority' => 1,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_one', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_one', array(
        'label' => __('Slider One Title', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_one',
        'priority' => 2,
    ));

    $wp_customize->add_setting('slider_one_url', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_one_url', array(
        'label' => __('Slider One URL', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_url',
        'priority' => 3,
    ));

    $wp_customize->add_setting('slider_one_description', array('default' => '',
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'slider_one_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_description',
        'priority' => 4,
    )));

    $wp_customize->add_setting('slider_one_button_one_text', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_one_button_one_text', array(
        'label' => __('Slider One Button One Text', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_button_one_text',
        'priority' => 5,
    ));

    // link url
    $wp_customize->add_setting('slider_one_button_one_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_one_button_one_url', array(
        'label' => __('Slider One Button One URL', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_button_one_url',
        'priority' => 6,
    ));

    $wp_customize->add_setting('slider_one_button_two_text', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_one_button_two_text', array(
        'label' => __('Slider One Button Two Text', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_button_two_text',
        'priority' => 7,
    ));

    // link url
    $wp_customize->add_setting('slider_one_button_two_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_one_button_two_url', array(
        'label' => __('Slider One Button Two URL', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_button_two_url',
        'priority' => 8,
    ));


    $wp_customize->add_setting('slider_two', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_two', array(
        'label' => 'Slider 2',
        'section' => 'home_slider_setting',
        'settings' => 'slider_two',
        'priority' => 9,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_two', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_two', array(
        'label' => __('Slider Two Title', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_two',
        'priority' => 10,
    ));

    $wp_customize->add_setting('slider_two_url', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_two_url', array(
        'label' => __('Slider Two URL', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_url',
        'priority' => 11,
    ));

    $wp_customize->add_setting('slider_two_description', array('default' => '',
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'slider_two_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_description',
        'priority' => 12,
    )));

    $wp_customize->add_setting('slider_two_button_one_text', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_two_button_one_text', array(
        'label' => __('Slider Two Button One Text', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_button_one_text',
        'priority' => 13,
    ));

    // link url
    $wp_customize->add_setting('slider_two_button_one_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_two_button_one_url', array(
        'label' => __('Slider Two Button One URL', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_button_one_url',
        'priority' => 14,
    ));

    $wp_customize->add_setting('slider_two_button_two_text', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_two_button_two_text', array(
        'label' => __('Slider Two Button Two Text', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_button_two_text',
        'priority' => 15,
    ));

    // link url
    $wp_customize->add_setting('slider_two_button_two_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_two_button_two_url', array(
        'label' => __('Slider Two Button Two URL', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_button_two_url',
        'priority' => 16,
    ));


    $wp_customize->add_setting('slider_three', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_three', array(
        'label' => 'Slider 3',
        'section' => 'home_slider_setting',
        'settings' => 'slider_three',
        'priority' => 17,
            )
            )
    );


    // slider Title
    $wp_customize->add_setting('slider_title_three', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_three', array(
        'label' => __('Slider Three Title', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_three',
        'priority' => 18,
    ));

    $wp_customize->add_setting('slider_three_url', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_three_url', array(
        'label' => __('Slider Three URL', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_three_url',
        'priority' => 19,
    ));

    $wp_customize->add_setting('slider_three_description', array('default' => '',
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'slider_three_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_three_description',
        'priority' => 20,
    )));

    $wp_customize->add_setting('slider_three_button_one_text', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_three_button_one_text', array(
        'label' => __('Slider Three Button One Text', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_three_button_one_text',
        'priority' => 21,
    ));

    // link url
    $wp_customize->add_setting('slider_three_button_one_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_three_button_one_url', array(
        'label' => __('Slider Three Button One URL', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_three_button_one_url',
        'priority' => 22,
    ));

    $wp_customize->add_setting('slider_three_button_two_text', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_three_button_two_text', array(
        'label' => __('Slider Three Button Two Text', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_three_button_two_text',
        'priority' => 23,
    ));

    // link url
    $wp_customize->add_setting('slider_three_button_two_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_three_button_two_url', array(
        'label' => __('Slider Three Button Two URL', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_three_button_two_url',
        'priority' => 24,
    ));

    $wp_customize->add_setting('slider_four', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_four', array(
        'label' => 'Slider 4',
        'section' => 'home_slider_setting',
        'settings' => 'slider_four',
        'priority' => 25,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_four', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_four', array(
        'label' => __('Slider Four Title', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_four',
        'priority' => 26,
    ));

    $wp_customize->add_setting('slider_four_url', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_four_url', array(
        'label' => __('Slider Four URL', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_four_url',
        'priority' => 27,
    ));

    $wp_customize->add_setting('slider_four_description', array('default' => '',
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'slider_four_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_four_description',
        'priority' => 28,
    )));

    $wp_customize->add_setting('slider_four_button_one_text', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_four_button_one_text', array(
        'label' => __('Slider Four Button One Text', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_four_button_one_text',
        'priority' => 29,
    ));

    // link url
    $wp_customize->add_setting('slider_four_button_one_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_four_button_one_url', array(
        'label' => __('Slider Four Button One URL', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_four_button_one_url',
        'priority' => 30,
    ));

    $wp_customize->add_setting('slider_four_button_two_text', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_four_button_two_text', array(
        'label' => __('Slider Four Button Two Text', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_four_button_two_text',
        'priority' => 31,
    ));

    // link url
    $wp_customize->add_setting('slider_four_button_two_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_four_button_two_url', array(
        'label' => __('Slider Four Button Two URL', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_four_button_two_url',
        'priority' => 32,
    ));

    $wp_customize->add_setting('slider_five', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_five', array(
        'label' => 'Slider 5',
        'section' => 'home_slider_setting',
        'settings' => 'slider_five',
        'priority' => 33,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_five', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_five', array(
        'label' => __('Slider Five Title', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_five',
        'priority' => 34,
    ));

    $wp_customize->add_setting('slider_five_url', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_five_url', array(
        'label' => __('Slider Five URL', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_five_url',
        'priority' => 35,
    ));

    $wp_customize->add_setting('slider_five_description', array('default' => '',
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'slider_five_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_five_description',
        'priority' => 36,
    )));


    $wp_customize->add_setting('slider_five_button_one_text', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_five_button_one_text', array(
        'label' => __('Slider Five Button One Text', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_five_button_one_text',
        'priority' => 37,
    ));

    // link url
    $wp_customize->add_setting('slider_five_button_one_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_five_button_one_url', array(
        'label' => __('Slider Five Button One URL', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_five_button_one_url',
        'priority' => 38,
    ));

    $wp_customize->add_setting('slider_five_button_two_text', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_five_button_two_text', array(
        'label' => __('Slider Five Button Two Text', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_five_button_two_text',
        'priority' => 39,
    ));

    // link url
    $wp_customize->add_setting('slider_five_button_two_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_five_button_two_url', array(
        'label' => __('Slider Five Button Two URL', 'safari'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_five_button_two_url',
        'priority' => 40,
    ));

    // Add new section for Home Tagline settings
    $wp_customize->add_section('tagline_setting', array(
        'title' => __('Home Tagline', 'safari'),
        'priority' => 37,
    ));


    // Tagline Title
    $wp_customize->add_setting('tagline_title', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('tagline_title', array(
        'label' => __('Tagline', 'safari'),
        'section' => 'tagline_setting',
        'settings' => 'tagline_title',
    ));

    $wp_customize->add_setting('tagline_description', array('default' => '',
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'tagline_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'tagline_setting',
        'settings' => 'tagline_description',
        'priority' => 20,
    )));


    // Add new section for Home Featured One settings
    $wp_customize->add_section('home_featured_one_setting', array(
        'title' => __('Home Featured #1', 'safari'),
        'priority' => 40,
    ));


    $wp_customize->add_setting('home_featured_one', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_featured_one', array(
        'label' => __('Featured One Icon', 'safari'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_featured_one',
        'priority' => 1,
    ));

    // home Title
    $wp_customize->add_setting('home_title_one', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_one', array(
        'label' => __('Title', 'safari'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_title_one',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_one', array('default' => '',
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'home_description_one', array(
        'label' => __('Description', 'safari'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_description_one',
        'priority' => 3,
    )));

    // link text
    $wp_customize->add_setting('home_one_link_text', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_one_link_text', array(
        'label' => __('Link Text', 'safari'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_one_link_text',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('home_one_link_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_one_link_url', array(
        'label' => __('Link URL', 'safari'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_one_link_url',
        'priority' => 5,
    ));

    // Add new section for Home Featured Two settings
    $wp_customize->add_section('home_featured_two_setting', array(
        'title' => __('Home Featured #2', 'safari'),
        'priority' => 45,
    ));


   $wp_customize->add_setting('home_featured_two', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_featured_two', array(
        'label' => __('Featured Two Icon', 'safari'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_featured_two',
        'priority' => 1,
    ));

    // home Title
    $wp_customize->add_setting('home_title_two', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_two', array(
        'label' => __('Title', 'safari'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_title_two',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_two', array('default' => '',
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'home_description_two', array(
        'label' => __('Description', 'safari'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_description_two',
        'priority' => 3,
    )));

    // link text
    $wp_customize->add_setting('home_two_link_text', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_two_link_text', array(
        'label' => __('Link Text', 'safari'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_two_link_text',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('home_two_link_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_two_link_url', array(
        'label' => __('Link URL', 'safari'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_two_link_url',
        'priority' => 5,
    ));



    // Add new section for Home Featured Three settings
    $wp_customize->add_section('home_featured_three_setting', array(
        'title' => __('Home Featured #3', 'safari'),
        'priority' => 50,
    ));


    $wp_customize->add_setting('home_featured_three', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_featured_three', array(
        'label' => __('Featured Three Icon', 'safari'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_featured_three',
        'priority' => 1,
    ));

    // home Title
    $wp_customize->add_setting('home_title_three', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_three', array(
        'label' => __('Title', 'safari'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_title_three',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_three', array('default' => '',
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'home_description_three', array(
        'label' => __('Description', 'safari'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_description_three',
        'priority' => 3,
    )));

    // link text
    $wp_customize->add_setting('home_three_link_text', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_three_link_text', array(
        'label' => __('Link Text', 'safari'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_three_link_text',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('home_three_link_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_three_link_url', array(
        'label' => __('Link URL', 'safari'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_three_link_url',
        'priority' => 5,
    ));


    // Add new section for Home Featured One settings
    $wp_customize->add_section('home_featured_four_setting', array(
        'title' => __('Home Featured #4', 'safari'),
        'priority' => 51,
    ));


    $wp_customize->add_setting('home_featured_four', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_featured_four', array(
        'label' => __('Featured Four Icon', 'safari'),
        'section' => 'home_featured_four_setting',
        'settings' => 'home_featured_four',
        'priority' => 1,
    ));

    // home Title
    $wp_customize->add_setting('home_title_four', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_four', array(
        'label' => __('Title', 'safari'),
        'section' => 'home_featured_four_setting',
        'settings' => 'home_title_four',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_four', array('default' => '',
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'home_description_four', array(
        'label' => __('Description', 'safari'),
        'section' => 'home_featured_four_setting',
        'settings' => 'home_description_four',
        'priority' => 3,
    )));

    // link text
    $wp_customize->add_setting('home_four_link_text', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_four_link_text', array(
        'label' => __('Link Text', 'safari'),
        'section' => 'home_featured_four_setting',
        'settings' => 'home_four_link_text',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('home_four_link_url', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_four_link_url', array(
        'label' => __('Link URL', 'safari'),
        'section' => 'home_featured_four_setting',
        'settings' => 'home_four_link_url',
        'priority' => 5,
    ));


    // Add new section for displaying Featured Portfolio on Front Page
    $wp_customize->add_section('safari_front_page_portfolio_options', array(
        'title' => __('Portfolio Settings', 'safari'),
        'description' => __('Settings for displaying featured portfolio on Front Page', 'safari'),
        'priority' => 52,
    ));

    // enable featured portfolio on front page?
    $wp_customize->add_setting('safari_front_featured_portfolio_check', array(
        'default' => 0,
        'sanitize_callback' => 'safari_sanitize_checkbox',
    ));
    $wp_customize->add_control('safari_front_featured_portfolio_check', array(
        'label' => __('Show featured portfolio on Front Page', 'safari'),
        'section' => 'safari_front_page_portfolio_options',
        'priority' => 1,
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('safari_hide_sample_portfolio', array(
        'default' => 1,
        'sanitize_callback' => 'safari_sanitize_checkbox',
    ));
    $wp_customize->add_control('safari_hide_sample_portfolio', array(
        'label' => __('Hide sample portfolio on Front Page', 'safari'),
        'section' => 'safari_front_page_portfolio_options',
        'priority' => 2,
        'type' => 'checkbox',
    ));

    // portfolio Title
    $wp_customize->add_setting('safari_portfolio_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('safari_portfolio_title', array(
        'label' => __('Section Title', 'safari'),
        'section' => 'safari_front_page_portfolio_options',
        'settings' => 'safari_portfolio_title',
        'priority' => 3,
    ));

    $wp_customize->add_setting(
            'safari_portfolio_count', array(
        'default' => '3',
        'sanitize_callback' => 'safari_sanitize_portfolio_count_option',
            )
    );

    $wp_customize->add_control(
            'safari_portfolio_count', array(
        'type' => 'select',
        'label' => 'Number of columns',
        'section' => 'safari_front_page_portfolio_options',
        'priority' => 10,
        'choices' => array(
            '1' => 'One',
            '2' => 'Two',
            '3' => 'Three',
            '4' => 'Four',
            '5' => 'Five',
            '6' => 'Six',
        ),
            )
    );


    $wp_customize->add_setting('safari_front_featured_portfolio_count', array(
        'default' => 3,
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('safari_front_featured_portfolio_count', array(
        'label' => __('Number of portfolio to display', 'safari'),
        'section' => 'safari_front_page_portfolio_options',
        'settings' => 'safari_front_featured_portfolio_count',
        'priority' => 20,
    ));


    $wp_customize->add_setting('safari_portfolio_front_count', array(
        'default' => 9,
        'sanitize_callback' => 'safari_sanitize_integer',
    ));
    $wp_customize->add_control('safari_portfolio_front_count', array(
        'label' => __('Portfolio Item Count', 'safari'),
        'section' => 'safari_front_page_portfolio_options',
        'settings' => 'safari_portfolio_front_count',
        'priority' => 40,
    ));
    
    // Add new section for single portfolio settings
    $wp_customize->add_section('safari_single_portfolio_settings', array(
        'title' => __('Single Portfolio Settings', 'safari'),
        'description' => __('Settings for single portfolio', 'safari'),
        'priority' => 53,
    ));

    $wp_customize->add_setting('single_portfolio_featured_image', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'single_portfolio_featured_image', array(
        'label' => 'Single Portfolio Featured Image',
        'section' => 'safari_single_portfolio_settings',
        'settings' => 'single_portfolio_featured_image',
        'priority' => 1,
            )
            )
    );

    $wp_customize->add_setting('single_portfolio_page_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('single_portfolio_page_title', array(
        'label' => __('Section Title', 'safari'),
        'section' => 'safari_single_portfolio_settings',
        'settings' => 'single_portfolio_page_title',
        'priority' => 2,
    ));

    $wp_customize->add_setting('single_portfolio_page_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'single_portfolio_page_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'safari_single_portfolio_settings',
        'settings' => 'single_portfolio_page_description',
        'priority' => 3,
    )));
    
     // Add new section for single portfolio settings
    $wp_customize->add_section('safari_four_column_portfolio_settings', array(
        'title' => __('Portfolio 4 Column Page Settings', 'safari'),
        'description' => __('Settings for single portfolio', 'safari'),
        'priority' => 54,
    ));

    $wp_customize->add_setting('portfolio_four_column_image', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'portfolio_four_column_image', array(
        'label' => 'Single Portfolio Featured Image',
        'section' => 'safari_four_column_portfolio_settings',
        'settings' => 'portfolio_four_column_image',
        'priority' => 1,
            )
            )
    );

    $wp_customize->add_setting('portfolio_four_column_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('portfolio_four_column_title', array(
        'label' => __('Section Title', 'safari'),
        'section' => 'safari_four_column_portfolio_settings',
        'settings' => 'portfolio_four_column_title',
        'priority' => 2,
    ));

    $wp_customize->add_setting('portfolio_four_column_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'portfolio_four_column_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'safari_four_column_portfolio_settings',
        'settings' => 'portfolio_four_column_description',
        'priority' => 3,
    )));
    
    // Add new section for single portfolio settings
    $wp_customize->add_section('safari_three_column_portfolio_settings', array(
        'title' => __('Portfolio 3 Column Page Settings', 'safari'),
        'description' => __('Settings for single portfolio', 'safari'),
        'priority' => 55,
    ));

    $wp_customize->add_setting('portfolio_three_column_image', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'portfolio_three_column_image', array(
        'label' => 'Single Portfolio Featured Image',
        'section' => 'safari_three_column_portfolio_settings',
        'settings' => 'portfolio_three_column_image',
        'priority' => 1,
            )
            )
    );

    $wp_customize->add_setting('portfolio_three_column_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('portfolio_three_column_title', array(
        'label' => __('Section Title', 'safari'),
        'section' => 'safari_three_column_portfolio_settings',
        'settings' => 'portfolio_three_column_title',
        'priority' => 2,
    ));

    $wp_customize->add_setting('portfolio_three_column_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'portfolio_three_column_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'safari_three_column_portfolio_settings',
        'settings' => 'portfolio_three_column_description',
        'priority' => 3,
    )));
    
    // Add new section for single portfolio settings
    $wp_customize->add_section('safari_two_column_portfolio_settings', array(
        'title' => __('Portfolio 3 Column Page Settings', 'safari'),
        'description' => __('Settings for single portfolio', 'safari'),
        'priority' => 56,
    ));

    $wp_customize->add_setting('portfolio_two_column_image', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'portfolio_two_column_image', array(
        'label' => 'Single Portfolio Featured Image',
        'section' => 'safari_two_column_portfolio_settings',
        'settings' => 'portfolio_two_column_image',
        'priority' => 1,
            )
            )
    );

    $wp_customize->add_setting('portfolio_two_column_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('portfolio_two_column_title', array(
        'label' => __('Section Title', 'safari'),
        'section' => 'safari_two_column_portfolio_settings',
        'settings' => 'portfolio_two_column_title',
        'priority' => 2,
    ));

    $wp_customize->add_setting('portfolio_two_column_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'portfolio_two_column_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'safari_two_column_portfolio_settings',
        'settings' => 'portfolio_two_column_description',
        'priority' => 3,
    )));


    // Add new section for Counter settings
    $wp_customize->add_section('safari_counter_setting', array(
        'title' => __('Counter Settings', 'safari'),
        'priority' => 57,
    ));

    // home Title
    $wp_customize->add_setting('counter_title_one', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('counter_title_one', array(
        'label' => __('Title One', 'safari'),
        'section' => 'safari_counter_setting',
        'settings' => 'counter_title_one',
        'priority' => 1,
    ));

    $wp_customize->add_setting('counter_description_one', array('default' => '',
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'counter_description_one', array(
        'label' => __('Description One', 'safari'),
        'section' => 'safari_counter_setting',
        'settings' => 'counter_description_one',
        'priority' => 2,
    )));


    // Title
    $wp_customize->add_setting('counter_title_two', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('counter_title_two', array(
        'label' => __('Title Two', 'safari'),
        'section' => 'safari_counter_setting',
        'settings' => 'counter_title_two',
        'priority' => 3,
    ));

    $wp_customize->add_setting('counter_description_two', array('default' => '',
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'counter_description_two', array(
        'label' => __('Description Two', 'safari'),
        'section' => 'safari_counter_setting',
        'settings' => 'counter_description_two',
        'priority' => 4,
    )));


    // Title
    $wp_customize->add_setting('counter_title_three', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('counter_title_three', array(
        'label' => __('Title Three', 'safari'),
        'section' => 'safari_counter_setting',
        'settings' => 'counter_title_three',
        'priority' => 5,
    ));

    $wp_customize->add_setting('counter_description_three', array('default' => '',
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'counter_description_three', array(
        'label' => __('Description Three', 'safari'),
        'section' => 'safari_counter_setting',
        'settings' => 'counter_description_three',
        'priority' => 6,
    )));

    // Title
    $wp_customize->add_setting('counter_title_four', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('counter_title_four', array(
        'label' => __('Title Four', 'safari'),
        'section' => 'safari_counter_setting',
        'settings' => 'counter_title_four',
        'priority' => 7,
    ));

    $wp_customize->add_setting('counter_description_four', array('default' => '',
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'counter_description_four', array(
        'label' => __('Description Four', 'safari'),
        'section' => 'safari_counter_setting',
        'settings' => 'counter_description_four',
        'priority' => 8,
    )));
    
    // Add new section for blog settings
    $wp_customize->add_section('safari_blog_page_settings', array(
        'title' => __('Blog Settings', 'safari'),
        'description' => __('Settings for blog page', 'safari'),
        'priority' => 58,
    ));

    $wp_customize->add_setting('blog_featured_image', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'blog_featured_image', array(
        'label' => 'Blog Featured Image',
        'section' => 'safari_blog_page_settings',
        'settings' => 'blog_featured_image',
        'priority' => 1,
            )
            )
    );

    $wp_customize->add_setting('blog_page_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('blog_page_title', array(
        'label' => __('Section Title', 'safari'),
        'section' => 'safari_blog_page_settings',
        'settings' => 'blog_page_title',
        'priority' => 2,
    ));

    $wp_customize->add_setting('blog_page_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'blog_page_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'safari_blog_page_settings',
        'settings' => 'blog_page_description',
        'priority' => 3,
    )));
    
    // Add new section for blog settings
    $wp_customize->add_section('safari_single_post_page_settings', array(
        'title' => __('Single Post Settings', 'safari'),
        'description' => __('Settings for single post', 'safari'),
        'priority' => 59,
    ));

    $wp_customize->add_setting('single_post_featured_image', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'single_post_featured_image', array(
        'label' => 'Blog Featured Image',
        'section' => 'safari_blog_page_settings',
        'settings' => 'single_post_featured_image',
        'priority' => 1,
            )
            )
    );

    $wp_customize->add_setting('sinlge_post_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('sinlge_post_title', array(
        'label' => __('Section Title', 'safari'),
        'section' => 'safari_single_post_page_settings',
        'settings' => 'sinlge_post_title',
        'priority' => 2,
    ));

    $wp_customize->add_setting('single_post_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'single_post_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'safari_single_post_page_settings',
        'settings' => 'single_post_description',
        'priority' => 3,
    )));



    // Add new section for displaying Featured Posts on Front Page
    $wp_customize->add_section('safari_front_page_post_options', array(
        'title' => __('Featured Posts', 'safari'),
        'description' => __('Settings for displaying featured posts on Front Page', 'safari'),
        'priority' => 60,
    ));

    // enable featured posts on front page?
    $wp_customize->add_setting('safari_front_featured_posts_check', array(
        'default' => 1,
        'sanitize_callback' => 'safari_sanitize_checkbox',
    ));
    $wp_customize->add_control('safari_front_featured_posts_check', array(
        'label' => __('Show featured posts on Front Page', 'safari'),
        'section' => 'safari_front_page_post_options',
        'priority' => 1,
        'type' => 'checkbox',
    ));

    // post Title
    $wp_customize->add_setting('safari_post_title', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('safari_post_title', array(
        'label' => __('Section Title', 'safari'),
        'section' => 'safari_front_page_post_options',
        'settings' => 'safari_post_title',
        'priority' => 2,
    ));

    // post Title
    $wp_customize->add_setting('safari_post_menu_title', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('safari_post_menu_title', array(
        'label' => __('Menu Title', 'safari'),
        'section' => 'safari_front_page_post_options',
        'settings' => 'safari_post_menu_title',
        'priority' => 3,
    ));

    // select number of posts for featured posts on front page
    $wp_customize->add_setting('safari_front_featured_posts_count', array(
        'default' => 3,
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('safari_front_featured_posts_count', array(
        'label' => __('Number of posts to display', 'safari'),
        'section' => 'safari_front_page_post_options',
        'settings' => 'safari_front_featured_posts_count',
        'priority' => 20,
    ));
    // select category for featured posts 
    $wp_customize->add_setting('safari_front_featured_posts_cat', array('default' => 0,));
    $wp_customize->add_control(new WP_Customize_Dropdown_Categories_Control($wp_customize, 'safari_front_featured_posts_cat', array(
        'label' => __('Post Category', 'safari'),
        'section' => 'safari_front_page_post_options',
        'type' => 'dropdown-categories',
        'settings' => 'safari_front_featured_posts_cat',
        'priority' => 30,
    )));


    // Add new section team setting
    $wp_customize->add_section('safari_team_settings', array(
        'title' => __('Team Settings', 'safari'),
        'description' => __('Settings for team', 'safari'),
        'priority' => 61,
    ));

    // enable team member on front page?
    $wp_customize->add_setting('safari_front_team_members_check', array(
        'default' => 0,
        'sanitize_callback' => 'safari_sanitize_checkbox',
    ));
    $wp_customize->add_control('safari_front_team_members_check', array(
        'label' => __('Show Team Members on Front Page', 'safari'),
        'section' => 'safari_team_settings',
        'priority' => 1,
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('safari_team_title', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('safari_team_title', array(
        'label' => __('Section Title', 'safari'),
        'section' => 'safari_team_settings',
        'settings' => 'safari_team_title',
        'priority' => 3,
    ));

    $wp_customize->add_setting('team_description', array('default' => '',
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'team_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'safari_team_settings',
        'settings' => 'team_description',
        'priority' => 4,
    )));

    $wp_customize->add_setting(
            'safari_team_members_count', array(
        'default' => '3',
        'sanitize_callback' => 'safari_sanitize_team_member_count_option',
            )
    );

    $wp_customize->add_control(
            'safari_team_members_count', array(
        'type' => 'select',
        'label' => 'Number of columns',
        'section' => 'safari_team_settings',
        'priority' => 10,
        'choices' => array(
            '1' => 'One',
            '2' => 'Two',
            '3' => 'Three',
            '4' => 'Four',
        ),
            )
    );


    // Add new section for Testimonial slider settings
    $wp_customize->add_section('testimonial_slider_setting', array(
        'title' => __('Testimonial Slider', 'safari'),
        'priority' => 62,
    ));


    $wp_customize->add_setting('tslider_one_description', array('default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'tslider_one_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_one_description',
        'priority' => 2,
    )));

    $wp_customize->add_setting('client_name_one', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_one', array(
        'label' => __('Client Name', 'safari'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_one',
        'priority' => 3,
    ));

    $wp_customize->add_setting('client_name_url_one', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_url_one', array(
        'label' => __('URL', 'safari'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_url_one',
        'priority' => 4,
    ));


    $wp_customize->add_setting('tslider_two_description', array('default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'tslider_two_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_two_description',
        'priority' => 6,
    )));

    $wp_customize->add_setting('client_name_two', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_two', array(
        'label' => __('Client Name', 'safari'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_two',
        'priority' => 7,
    ));

    $wp_customize->add_setting('client_name_url_two', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_url_two', array(
        'label' => __('URL', 'safari'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_url_two',
        'priority' => 8,
    ));


    $wp_customize->add_setting('tslider_three_description', array('default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'tslider_three_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_three_description',
        'priority' => 10,
    )));

    $wp_customize->add_setting('client_name_three', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_three', array(
        'label' => __('Client Name', 'safari'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_three',
        'priority' => 11,
    ));

    $wp_customize->add_setting('client_name_url_three', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_url_three', array(
        'label' => __('URL', 'safari'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_url_three',
        'priority' => 12,
    ));


    $wp_customize->add_setting('tslider_four_description', array('default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'tslider_four_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_four_description',
        'priority' => 14,
    )));

    $wp_customize->add_setting('client_name_four', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_four', array(
        'label' => __('Client Name', 'safari'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_four',
        'priority' => 15,
    ));

    $wp_customize->add_setting('client_name_url_four', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_url_four', array(
        'label' => __('URL', 'safari'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_url_four',
        'priority' => 16,
    ));


    $wp_customize->add_setting('tslider_five_description', array('default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'tslider_five_description', array(
        'label' => __('Description', 'safari'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_five_description',
        'priority' => 18,
    )));

    $wp_customize->add_setting('client_name_five', array(
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_five', array(
        'label' => __('Client Name', 'safari'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_five',
        'priority' => 19,
    ));

    $wp_customize->add_setting('client_name_url_five', array('default' => __('', 'safari'),
        'sanitize_callback' => 'safari_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_url_five', array(
        'label' => __('URL', 'safari'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_url_five',
        'priority' => 20,
    ));


    // Add footer text section
    $wp_customize->add_section('safari_footer', array(
        'title' => 'Footer Text', // The title of section
        'priority' => 75,
    ));

    $wp_customize->add_setting('safari_footer_footer_text', array(
        'default' => null,
        'sanitize_js_callback' => 'safari_sanitize_escaping',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'safari_footer_footer_text', array(
        'section' => 'safari_footer', // id of section to which the setting belongs
        'settings' => 'safari_footer_footer_text',
    )));


    // Add custom CSS section
    $wp_customize->add_section('safari_custom_css', array(
        'title' => 'Custom CSS', // The title of section
        'priority' => 80,
    ));

    $wp_customize->add_setting('safari_custom_css', array(
        'default' => '',
        'sanitize_callback' => 'safari_sanitize_custom_css',
        'sanitize_js_callback' => 'safari_sanitize_escaping',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new safari_customize_textarea_control($wp_customize, 'safari_custom_css', array(
        'section' => 'safari_custom_css', // id of section to which the setting belongs
        'settings' => 'safari_custom_css',
    )));

    //remove default customizer sections
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('colors');

    // add post message for various customizer settings 
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
}

add_action('customize_register', 'safari_customize_register');

function safari_sanitize_team_member_count_option($grid_count) {
    if (!in_array($grid_count, array('1', '2', '3', '4'))) {
        $grid_count = '3';
    }

    return $grid_count;
}

function safari_sanitize_portfolio_count_option($grid_count) {
    if (!in_array($grid_count, array('1', '2', '3', '4', '5', '6'))) {
        $grid_count = '3';
    }

    return $grid_count;
}

/*
 * 
 * sanitize Text field
 * 
 * @since Safari 1.0
 * 
 */

function safari_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}

/*
 * Sanitize numeric values 
 * 
 * @since Safari 1.0
 */

function safari_sanitize_integer($input) {
    if (is_numeric($input)) {
        return intval($input);
    }
}

/*
 * Escaping for input values
 * 
 * @since Safari 1.0
 */

function safari_sanitize_escaping($input) {
    $input = esc_attr($input);
    return $input;
}

/*
 * Sanitize Custom CSS 
 * 
 * @since Safari 1.0
 */

function safari_sanitize_custom_css($input) {
    $input = wp_kses_stripslashes($input);
    return $input;
}

/*
 * Sanitize Checkbox input values
 * 
 * @since Safari 1.0
 */

function safari_sanitize_checkbox($input) {
    if ($input) {
        $output = '1';
    } else {
        $output = false;
    }
    return $output;
}

/*
 * Sanitize color scheme options 
 * 
 * @since Safari 1.0
 */

function safari_sanitize_color_scheme_option($colorscheme_option) {
    if (!in_array($colorscheme_option, array('blue', 'red', 'green', 'gray', 'purple', 'orange', 'brown', 'pink'))) {
        $colorscheme_option = 'blue';
    }

    return $colorscheme_option;
}

/*
 * Sanitize background color scheme options 
 * 
 * @since Safari 1.0
 */

function safari_sanitize_bg_color_scheme_option($bg_colorscheme_option) {
    if (!in_array($bg_colorscheme_option, array('light', 'dark'))) {
        $bg_colorscheme_option = 'light';
    }

    return $bg_colorscheme_option;
}

/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Safari 1.0
 */
function safari_customize_preview_js() {
    wp_enqueue_script('safari_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), '20131205', true);
}

add_action('customize_preview_init', 'safari_customize_preview_js');

function safari_header_output() {
    ?>
    <!--Customizer CSS--> 
    <style type="text/css">
    <?php echo esc_attr(get_theme_mod('safari_custom_css')); ?>
    </style> 
    <!--/Customizer CSS-->
    <?php
}

// Output custom CSS to live site
add_action('wp_head', 'safari_header_output');

function safari_footer_tracking_code() {
    echo get_theme_mod('tracking_code');
}

add_action('wp_footer', 'safari_footer_tracking_code');
