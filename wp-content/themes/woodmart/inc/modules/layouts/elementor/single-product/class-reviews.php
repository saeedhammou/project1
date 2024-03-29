<?php
/**
 * Reviews map.
 *
 * @package Woodmart
 */

namespace XTS\Modules\Layouts;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}
/**
 * Elementor widget that inserts an embeddable content into the page, from any given URL.
 */
class Reviews extends Widget_Base {
	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'wd_single_product_reviews';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Product reviews', 'woodmart' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wd-icon-sp-reviews';
	}

	/**
	 * Get widget categories.
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'wd-single-product-elements' );
	}

	/**
	 * Show in panel.
	 *
	 * @return bool Whether to show the widget in the panel or not.
	 */
	public function show_in_panel() {
		return Main::is_layout_type( 'single_product' );
	}

	/**
	 * Register the widget controls.
	 */
	protected function register_controls() {
		/**
		 * Content tab.
		 */

		/**
		 * General settings
		 */
		$this->start_controls_section(
			'general_style_section',
			array(
				'label' => esc_html__( 'General', 'woodmart' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'css_classes',
			array(
				'type'         => 'wd_css_class',
				'default'      => 'wd-single-reviews',
				'prefix_class' => '',
			)
		);

		$this->add_control(
			'layout',
			array(
				'label'        => esc_html__( 'Reviews section columns', 'woodmart' ),
				'type'         => Controls_Manager::SELECT,
				'options'      => array(
					'one-column' => esc_html__( 'One column', 'woodmart' ),
					'two-column' => esc_html__( 'Two columns', 'woodmart' ),
				),
				'default'      => 'one-column',
				'prefix_class' => 'wd-layout-',
			)
		);

		$this->add_responsive_control(
			'reviews_columns',
			array(
				'label'          => esc_html__( 'Reviews columns', 'woodmart' ),
				'type'           => Controls_Manager::SELECT,
				'options'        => array(
					'1' => esc_html__( '1', 'woodmart' ),
					'2' => esc_html__( '2', 'woodmart' ),
				),
				'default'        => '1',
				'tablet_default' => '1',
				'mobile_default' => '1',
				'devices'        => array( 'desktop', 'tablet', 'mobile' ),
				'classes'        => 'wd-hide-custom-breakpoints',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 */
	protected function render() {
		foreach ( array( 'desktop', 'tablet', 'mobile' ) as $device ) {
			$key = 'reviews_columns' . ( 'desktop' === $device ? '' : '_' . $device );

			Global_Data::get_instance()->set_data( $key, $this->get_settings_for_display( $key ) );
		}

		Main::setup_preview();

		woodmart_enqueue_inline_style( 'woo-single-prod-el-reviews' );
		woodmart_enqueue_inline_style( 'woo-single-prod-el-reviews-' . woodmart_get_opt( 'reviews_style', 'style-1' ) );
		woodmart_enqueue_inline_style( 'mod-comments' );

		comments_template();

		Main::restore_preview();
	}
}

Plugin::instance()->widgets_manager->register( new Reviews() );
