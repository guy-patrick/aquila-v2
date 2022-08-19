<?php
/**
 * Bootstrap the theme
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

class AQUILA_THEME {
    use Traits\Singleton;

    protected function __construct () {
        // load classes
        Assets::get_instance();
        Menus::get_instance();

        // Adding features to Aquila theme
        $this->setup_hooks();
    }

    protected function setup_hooks () {
        // actions
        add_action( 'after_setup_theme', [$this, 'setup_theme'] );
    }

    public function setup_theme () {
        add_theme_support( 'title-tag' );

        $defaults = array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => true,
        );
        add_theme_support( 'custom-logo', $defaults );

        $args = array(
            'default-color' => 'fff',
        );
        add_theme_support( 'custom-background', $args );

        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'customize-selective-refresh-widgets' );

        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'customize-selective-refresh-widgets' );

        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

        add_editor_style();

        add_theme_support( 'wp-block-styles' );

        add_theme_support( 'align-wide' );

        global $content_width;
        if ( ! isset( $content_width ) ) {
            $content_width = 1240;
        }
    }
}