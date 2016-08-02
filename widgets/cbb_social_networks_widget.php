<?php 

class CBB_SocialNetworks_Widget extends WP_Widget {

  private static $social_networks = array(
    'behance' => 'Behance',
    'bitcoin' => 'Bitcoin',
    'delicious' => 'Delicious',
    'deviantart' => 'DeviantArt',
    'digg' => 'Digg',
    'dribbble' => 'Dribbble',
    'facebook' => 'Facebook',
    'flickr' => 'Flickr',
    'foursquare' => 'Foursquare',
    'github' => 'GitHub',
    'google_plus' => 'Google+',
    'instagram' => 'Instagram',
    'lastfm' => 'LastFM',
    'linkedin' => 'LinkedIn',
    'medium' => 'Medium',
    'pinterest' => 'Pinterest',
    'skype' => 'Skype',
    'soundcloud' => 'Soundcloud',
    'spotify' => 'Spotify',
    'tumblr' => 'Tumblr',
    'twitter' => 'Twitter',
    'vine' => 'Vine',
    'wechat' => 'WeChat',
    'wordpress' => 'WordPress',
    'youtube' => 'YouTube',
    );

  private static $social_networks_icons = array(
    'behance' => 'behance',
    'bitcoin' => 'bitcoin',
    'delicious' => 'delicious',
    'deviantart' => 'deviantart',
    'digg' => 'digg',
    'dribbble' => 'dribbble',
    'facebook' => 'facebook',
    'flickr' => 'flickr',
    'foursquare' => 'foursquare',
    'github' => 'github',
    'google_plus' => 'google-plus',
    'instagram' => 'instagram',
    'lastfm' => 'lastfm',
    'linkedin' => 'linkedin',
    'medium' => 'medium',
    'pinterest' => 'pinterest',
    'skype' => 'skype',
    'soundcloud' => 'soundcloud',
    'spotify' => 'spotify',
    'tumblr' => 'tumblr',
    'twitter' => 'twitter',
    'vine' => 'vine',
    'wechat' => 'wechat',
    'wordpress' => 'wordpress',
    'youtube' => 'youtube',
    );

  public function __construct() {
    $widget_ops = array( 
      'classname' => 'cbb_social_networks_widget',
      'description' => __( 'A list of social networks links for CBB Theme.', 'customizer-building-blocks'),
    );
    parent::__construct( 'cbb_social_networks_widget', __( 'CBB Social Networks List', 'customizer-building-blocks'), $widget_ops );
  }

  public function widget( $args, $instance ) {

    $social_networks = self::$social_networks;
    $social_networks_icons = self::$social_networks_icons;
    
    if ( ! empty( $instance['title_tag'] ) ) {
      $args['before_title'] = '<' . esc_attr( $instance['title_tag'] ) . ' class="widget-title cbb-social-networks-title">';
      $args['after_title'] = '</' . esc_attr( $instance['title_tag'] ) . '>';
    }

    echo $args['before_widget'];

    $template = locate_template( CBB_THEME_TEMPLATES_FOLDER . '/cbb_social_networks_template.php' );
    if ( $template == '' ) $template = CBB_DEFAULT_TEMPLATES_FOLDER . '/cbb_social_networks_template.php';
    include ( $template );

    echo $args['after_widget'];
  }

  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $title_tag = ! empty( $instance['title_tag'] ) ? $instance['title_tag'] : '';
    $css_class = ! empty( $instance['css_class'] ) ? $instance['css_class'] : '';
    $icon_size = ! empty( $instance['icon_size'] ) ? $instance['icon_size'] : '';

    ?>
    
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'customizer-building-blocks' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php esc_attr_e( $title ); ?>">
    </p>

    <p>
    <label><?php _e( 'Title Tags:', 'customizer-building-blocks' ); ?></label>
    <br>
    <select class="widefat" id="<?php echo $this->get_field_id( 'title_tag' ); ?>" name="<?php echo $this->get_field_name( 'title_tag' ); ?>">
      <option value="" <?php esc_attr_e( $title_tag == '' ? 'selected' : '' ); ?>><?php _e( '-- None --', 'customizer-building-blocks' ); ?></option>
      <option value="h1" <?php esc_attr_e( $title_tag == 'h1' ? 'selected' : '' ); ?>><?php _e( 'h1', 'customizer-building-blocks' ); ?></option>
      <option value="h2" <?php esc_attr_e( $title_tag == 'h2' ? 'selected' : '' ); ?>><?php _e( 'h2', 'customizer-building-blocks' ); ?></option>
      <option value="h3" <?php esc_attr_e( $title_tag == 'h3' ? 'selected' : '' ); ?>><?php _e( 'h3', 'customizer-building-blocks' ); ?></option>
      <option value="h4" <?php esc_attr_e( $title_tag == 'h4' ? 'selected' : '' ); ?>><?php _e( 'h4', 'customizer-building-blocks' ); ?></option>
      <option value="h5" <?php esc_attr_e( $title_tag == 'h5' ? 'selected' : '' ); ?>><?php _e( 'h5', 'customizer-building-blocks' ); ?></option>
      <option value="h6" <?php esc_attr_e( $title_tag == 'h6' ? 'selected' : '' ); ?>><?php _e( 'h6', 'customizer-building-blocks' ); ?></option>
      <option value="span" <?php esc_attr_e( $title_tag == 'span' ? 'selected' : '' ); ?>><?php _e( 'span', 'customizer-building-blocks' ); ?></option>
    </select>

    <p>
    <label for="<?php echo $this->get_field_id( 'css_class' ); ?>"><?php _e( 'Custom CSS Classes:', 'customizer-building-blocks' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'css_class' ); ?>" name="<?php echo $this->get_field_name( 'css_class' ); ?>" type="text" value="<?php esc_attr_e( $css_class ); ?>">
    </p>

    <p>
    <label><?php _e( 'Icon Size:', 'customizer-building-blocks' ); ?></label>
    <br>
    <select class="widefat" id="<?php echo $this->get_field_id( 'icon_size' ); ?>" name="<?php echo $this->get_field_name( 'icon_size' ); ?>">
      <option value="" <?php esc_attr_e( $icon_size == '' ? 'selected' : '' ); ?>><?php _e( 'Normal', 'customizer-building-blocks' ); ?></option>
      <option value="fa-lg" <?php esc_attr_e( $icon_size == 'fa-lg' ? 'selected' : '' ); ?>><?php _e( 'Larger', 'customizer-building-blocks' ); ?></option>
      <option value="fa-2x" <?php esc_attr_e( $icon_size == 'fa-2x' ? 'selected' : '' ); ?>><?php _e( '2x', 'customizer-building-blocks' ); ?></option>
      <option value="fa-3x" <?php esc_attr_e( $icon_size == 'fa-3x' ? 'selected' : '' ); ?>><?php _e( '3x', 'customizer-building-blocks' ); ?></option>
      <option value="fa-4x" <?php esc_attr_e( $icon_size == 'fa-4x' ? 'selected' : '' ); ?>><?php _e( '4x', 'customizer-building-blocks' ); ?></option>
      <option value="fa-5x" <?php esc_attr_e( $icon_size == 'fa-5x' ? 'selected' : '' ); ?>><?php _e( '5x', 'customizer-building-blocks' ); ?></option>
    </select>

    <?php

    foreach (self::$social_networks as $key => $social_network_name) {
      
      $social_network_url = $key . '_url';
      $social_network_text = $key . '_text';
      
      ?>

      <p>
      <label for="<?php echo $this->get_field_id( $social_network_url ); ?>"><?php esc_html_e( $social_network_name . _x( ' URL & Text:', 'Suffix for Social Networks name on widget backend form: i.e. Facebook URL & Text:' , 'customizer-building-blocks' ) ); ?></label> 

      <input class="widefat" id="<?php echo $this->get_field_id( $social_network_url ); ?>" name="<?php echo $this->get_field_name( $social_network_url ); ?>" type="text" value="<?php esc_attr_e( $instance[ $social_network_url ] ); ?>" placeholder="<?php echo _x('url', 'Placeholder for URL fields on widget backend form.', 'customizer-building-blocks'); ?>">

      <input class="widefat" id="<?php echo $this->get_field_id( $social_network_text ); ?>" name="<?php echo $this->get_field_name( $social_network_text ); ?>" type="text" value="<?php esc_attr_e( $instance[ $social_network_text ] ); ?>" placeholder="<?php echo _x('text', 'Placeholder for Text fields on widget backend form.', 'customizer-building-blocks'); ?>">
      </p>

      <?php
    }

  }

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $title_tag_allowed = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'span');
    $instance['title_tag'] = ( in_array($new_instance['title_tag'], $title_tag_allowed) ) ? $new_instance['title_tag'] : '';
    
    $instance['css_class'] = ( ! empty( $new_instance['css_class'] ) ) ? customizer_building_blocks_widgets_sanitize_css_classes( $new_instance['css_class'] ) : '';
    
    $icon_size_allowed = array('fa-lg', 'fa-2x', 'fa-3x', 'fa-4x', 'fa-5x');
    $instance['icon_size'] = ( in_array($new_instance['icon_size'], $icon_size_allowed) ) ? $new_instance['icon_size'] : '';
    
    foreach (self::$social_networks as $key => $social_network_name) {
      
      $social_network_url = $key . '_url';
      $social_network_text = $key . '_text';

      $instance[ $social_network_url ] = ( ! empty( $new_instance[ $social_network_url ] ) ) ? esc_url_raw( $new_instance[ $social_network_url ] ) : '';
      $instance[ $social_network_text ] = ( ! empty( $new_instance[ $social_network_text ] ) ) ? esc_attr( $new_instance[ $social_network_text ] ) : '';

    }

    return $instance;
  }
}
