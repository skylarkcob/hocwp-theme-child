<?php
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', function () {
	load_child_theme_textdomain( basename( __DIR__ ), get_stylesheet_directory() . '/custom/languages' );
} );

final class HT_Child_Custom {
	public $text_domain;

	protected static $instance;

	public static function get_instance() {
		if ( ! ( self::$instance instanceof self ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __construct() {
		if ( self::$instance instanceof self ) {
			return;
		}

		$this->text_domain = basename( get_stylesheet_directory() );

		add_action( 'after_setup_theme', array( $this, 'after_setup_theme_action' ) );
	}

	public function after_setup_theme_action() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
	}
}

function ht_child() {
	return HT_Child_Custom::get_instance();
}

ht_child();