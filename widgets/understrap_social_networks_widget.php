<?php 

class UnderstrapSocialNetworks_Widget extends WP_Widget {

  public function __construct() {
    $widget_ops = array( 
      'classname' => 'understrap_social_networks_widget',
      'description' => __( 'A list of social networks links for Understrap Theme.', 'understrap_widgets'),
    );
    parent::__construct( 'understrap_social_networks_widget', __( 'Understrap Social Networks List', 'understrap_widgets'), $widget_ops );
  }

  public function widget( $args, $instance ) {
    
    if ( ! empty( $instance['title_tag'] ) ) {
      $args['before_title'] = '<' . esc_attr( $instance['title_tag'] ) . ' class="social-networks-title">';
      $args['after_title'] = '</' . esc_attr( $instance['title_tag'] ) . '>';
    }

    echo $args['before_widget'];

    ?>

      <div class="social-networks <?php esc_attr_e( $instance['css_class'] ); ?>">
        <?php 
        if ( ! empty( $instance['title'] ) ) {
          echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
        }
        ?>

        <ul class="list-inline">

          <?php if ( ! empty( $instance['facebook_url'] ) ) : ?>
          <li class="list-inline-item"><a href="<?php echo esc_url( $instance['facebook_url'] ); ?>" target="_blank"><i class="fa fa-facebook-square <?php esc_attr_e( $instance['icon_size'] ) ?>"></i></a></li>
          <?php endif; ?>

          <?php if ( ! empty( $instance['instagram_url'] ) ) : ?>
          <li class="list-inline-item"><a href="<?php echo esc_url( $instance['instagram_url'] ); ?>" target="_blank"><i class="fa fa-instagram <?php esc_attr_e( $instance['icon_size'] ) ?>"></i></a></li>
          <?php endif; ?>

          <?php if ( ! empty( $instance['twitter_url'] ) ) : ?>
          <li class="list-inline-item"><a href="<?php echo esc_url( $instance['twitter_url'] ); ?>" target="_blank"><i class="fa fa-twitter <?php esc_attr_e( $instance['icon_size'] ) ?>"></i></a></li>
          <?php endif; ?>

          <?php if ( ! empty( $instance['youtube_url'] ) ) : ?>
          <li class="list-inline-item"><a href="<?php echo esc_url( $instance['youtube_url'] ); ?>" target="_blank"><i class="fa fa-youtube-square <?php esc_attr_e( $instance['icon_size'] ) ?>"></i></a></li>
          <?php endif; ?>
          
        </ul>

      </div>

    <?php
    echo $args['after_widget'];
  }

  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $title_tag = ! empty( $instance['title_tag'] ) ? $instance['title_tag'] : '';
    $css_class = ! empty( $instance['css_class'] ) ? $instance['css_class'] : '';
    $icon_size = ! empty( $instance['icon_size'] ) ? $instance['icon_size'] : '';

    $facebook_url = ! empty( $instance['facebook_url'] ) ? $instance['facebook_url'] : '';
    $instagram_url = ! empty( $instance['instagram_url'] ) ? $instance['instagram_url'] : '';
    $twitter_url = ! empty( $instance['twitter_url'] ) ? $instance['twitter_url'] : '';
    $youtube_url = ! empty( $instance['youtube_url'] ) ? $instance['youtube_url'] : '';

    ?>
    
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php esc_attr_e( $title ); ?>">
    </p>

    <p>
    <label><?php _e( 'Title Tags:', 'understrap_widgets' ); ?></label>
    <br>
    <select class="widefat" id="<?php echo $this->get_field_id( 'title_tag' ); ?>" name="<?php echo $this->get_field_name( 'title_tag' ); ?>">
      <option value="" <?php esc_attr_e( $title_tag == '' ? 'selected' : '' ); ?>><?php _e( '-- None --', 'understrap_widgets' ); ?></option>
      <option value="h1" <?php esc_attr_e( $title_tag == 'h1' ? 'selected' : '' ); ?>><?php _e( 'h1', 'understrap_widgets' ); ?></option>
      <option value="h2" <?php esc_attr_e( $title_tag == 'h2' ? 'selected' : '' ); ?>><?php _e( 'h2', 'understrap_widgets' ); ?></option>
      <option value="h3" <?php esc_attr_e( $title_tag == 'h3' ? 'selected' : '' ); ?>><?php _e( 'h3', 'understrap_widgets' ); ?></option>
      <option value="h4" <?php esc_attr_e( $title_tag == 'h4' ? 'selected' : '' ); ?>><?php _e( 'h4', 'understrap_widgets' ); ?></option>
      <option value="h5" <?php esc_attr_e( $title_tag == 'h5' ? 'selected' : '' ); ?>><?php _e( 'h5', 'understrap_widgets' ); ?></option>
      <option value="h6" <?php esc_attr_e( $title_tag == 'h6' ? 'selected' : '' ); ?>><?php _e( 'h6', 'understrap_widgets' ); ?></option>
      <option value="span" <?php esc_attr_e( $title_tag == 'span' ? 'selected' : '' ); ?>><?php _e( 'span', 'understrap_widgets' ); ?></option>
    </select>

    <p>
    <label for="<?php echo $this->get_field_id( 'css_class' ); ?>"><?php _e( 'Custom CSS Classes:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'css_class' ); ?>" name="<?php echo $this->get_field_name( 'css_class' ); ?>" type="text" value="<?php esc_attr_e( $css_class ); ?>">
    </p>

    <p>
    <label><?php _e( 'Icon Size:', 'understrap_widgets' ); ?></label>
    <br>
    <select class="widefat" id="<?php echo $this->get_field_id( 'icon_size' ); ?>" name="<?php echo $this->get_field_name( 'icon_size' ); ?>">
      <option value="" <?php esc_attr_e( $icon_size == '' ? 'selected' : '' ); ?>><?php _e( 'Normal', 'understrap_widgets' ); ?></option>
      <option value="fa-lg" <?php esc_attr_e( $icon_size == 'fa-lg' ? 'selected' : '' ); ?>><?php _e( 'Larger', 'understrap_widgets' ); ?></option>
      <option value="fa-2x" <?php esc_attr_e( $icon_size == 'fa-2x' ? 'selected' : '' ); ?>><?php _e( '2x', 'understrap_widgets' ); ?></option>
      <option value="fa-3x" <?php esc_attr_e( $icon_size == 'fa-3x' ? 'selected' : '' ); ?>><?php _e( '3x', 'understrap_widgets' ); ?></option>
      <option value="fa-4x" <?php esc_attr_e( $icon_size == 'fa-4x' ? 'selected' : '' ); ?>><?php _e( '4x', 'understrap_widgets' ); ?></option>
      <option value="fa-5x" <?php esc_attr_e( $icon_size == 'fa-5x' ? 'selected' : '' ); ?>><?php _e( '5x', 'understrap_widgets' ); ?></option>
    </select>

    <p>
    <label for="<?php echo $this->get_field_id( 'facebook_url' ); ?>"><?php _e( 'Facebook URL:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'facebook_url' ); ?>" name="<?php echo $this->get_field_name( 'facebook_url' ); ?>" type="text" value="<?php esc_attr_e( $facebook_url ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'instagram_url' ); ?>"><?php _e( 'Instagram URL:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'instagram_url' ); ?>" name="<?php echo $this->get_field_name( 'instagram_url' ); ?>" type="text" value="<?php esc_attr_e( $instagram_url ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'twitter_url' ); ?>"><?php _e( 'Twitter URL:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'twitter_url' ); ?>" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" type="text" value="<?php esc_attr_e( $twitter_url ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'youtube_url' ); ?>"><?php _e( 'YouTube URL:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'youtube_url' ); ?>" name="<?php echo $this->get_field_name( 'youtube_url' ); ?>" type="text" value="<?php esc_attr_e( $youtube_url ); ?>">
    </p>

    <?php 
  }

  public function update( $new_instance, $old_instance ) {
    // TODO: Sanitize css class names accordingly to w3c specifications

    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $title_tag_allowed = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'span');
    $instance['title_tag'] = ( in_array($new_instance['title_tag'], $title_tag_allowed) ) ? $new_instance['title_tag'] : '';
    $instance['css_class'] = ( ! empty( $new_instance['css_class'] ) ) ? sanitize_text_field( $new_instance['css_class'] ) : '';

    $icon_size_allowed = array('fa-lg', 'fa-2x', 'fa-3x', 'fa-4x', 'fa-5x');
    $instance['icon_size'] = ( in_array($new_instance['icon_size'], $icon_size_allowed) ) ? $new_instance['icon_size'] : '';
    
    $instance['facebook_url'] = ( ! empty( $new_instance['facebook_url'] ) ) ? esc_url_raw( $new_instance['facebook_url'] ) : '';
    $instance['instagram_url'] = ( ! empty( $new_instance['instagram_url'] ) ) ? esc_url_raw( $new_instance['instagram_url'] ) : '';
    $instance['twitter_url'] = ( ! empty( $new_instance['twitter_url'] ) ) ? esc_url_raw( $new_instance['twitter_url'] ) : '';
    $instance['youtube_url'] = ( ! empty( $new_instance['youtube_url'] ) ) ? esc_url_raw( $new_instance['youtube_url'] ) : '';

    return $instance;
  }
}
