<?php
/**
 * Plugin Name: Understrap Widgets
 * Plugin URI: http://github.com/dvlopes/understrap-widgets
 * Description: Adds common WordPress widgets to be used as building blocks for Understrap Theme Framework or any Bootstrap theme.
 * Text Domain: understrap_widgets
 * Domain Path: /languages
 * Version: 0.0.1
 * Author: Diego Versiani
 * Author URI: http://dvlopes.github.io/
 * License: GPL2
 */

// CONSTANTS
if (!defined('UNDERSTRAP_WIDGETS_DIR')) define('UNDERSTRAP_WIDGETS_DIR', plugin_dir_path( __FILE__ ));
if (!defined('UNDERSTRAP_WIDGET_TEMPLATES_FOLDER')) define('UNDERSTRAP_WIDGET_TEMPLATES_FOLDER', 'widget-templates' );

// == SETUP
add_action( 'widgets_init', 'understrap_widgets_plugin_init');
function understrap_widgets_plugin_init () {
  require_once( UNDERSTRAP_WIDGETS_DIR . 'widgets/understrap_about_widget.php' );
  require_once( UNDERSTRAP_WIDGETS_DIR . 'widgets/understrap_cta_widget.php' );
  require_once( UNDERSTRAP_WIDGETS_DIR . 'widgets/understrap_featured_widget.php' );
  require_once( UNDERSTRAP_WIDGETS_DIR . 'widgets/understrap_section_begin_widget.php' );
  require_once( UNDERSTRAP_WIDGETS_DIR . 'widgets/understrap_section_end_widget.php' );
  require_once( UNDERSTRAP_WIDGETS_DIR . 'widgets/understrap_social_networks_widget.php' );
  require_once( UNDERSTRAP_WIDGETS_DIR . 'widgets/understrap_text_widget.php' );
  
  register_widget( 'UnderstrapAbout_Widget' );
  register_widget( 'UnderstrapCTA_Widget' );
  register_widget( 'UnderstrapFeatured_Widget' );
  register_widget( 'UnderstrapSectionBegin_Widget' );
  register_widget( 'UnderstrapSectionEnd_Widget' );
  register_widget( 'UnderstrapSocialNetworks_Widget' );
  register_widget( 'UnderstrapText_Widget' );

}
// !== SETUP

// == FUNCTIONS
// is_understrap_widgets_ativated
if (! function_exists( 'is_understrap_widgets_ativated' )) {
  function is_understrap_widgets_ativated () {
    return true;
  }
}

if (! function_exists( 'understrap_widgets_sanitize_css_classes' )) {
  function understrap_widgets_sanitize_css_classes ( $classes ) {
    $individual_classes = explode(' ', $classes);

    foreach ($individual_classes as $class) {
      $sanitized_classes .= sanitize_html_class( $class ) . ' ';
    }

    return trim( $sanitized_classes );
  }
}
// !== FUNCTIONS
