<?php 

class UnderstrapCTA_Widget extends WP_Widget {

  public function __construct() {
    $widget_ops = array( 
      'classname' => 'understrap_cta_widget',
      'description' => __( 'A Call To Action widget for Understrap Theme. Can also be used as a Call Out text.', 'understrap_widgets'),
    );
    parent::__construct( 'understrap_cta_widget', __( 'Understrap CTA/Call Out', 'understrap_widgets'), $widget_ops );
  }

  public function widget( $args, $instance ) {

    if ( ! empty( $instance['title_tag'] ) ) {
      $args['before_title'] = '<' . esc_attr( $instance['title_tag'] ) . '>';
      $args['after_title'] = '</' . esc_attr( $instance['title_tag'] ) . '>';
    }

    $button_css_class = ( ! empty( $instance['button_css_class'] ) ) ? $instance['button_css_class'] : 'btn-secondary';

    echo $args['before_widget'];

    ?>
      <div class="cta <?php esc_attr_e( $instance['css_class'] ); ?>">
        <?php 
        if ( ! empty( $instance['title'] ) ) {
          echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
        }
        ?>

        <p><?php echo wp_kses_post( $instance['text'] ); ?></p>

        <?php if ( ! empty( $instance['button_text'] ) ) : ?>
          <a href="<?php echo esc_url( $instance['button_href'] ); ?>" class="btn <?php esc_attr_e( $button_css_class ); ?>"><?php esc_html_e( $instance['button_text'] ); ?></a>
        <?php endif; ?>

      </div>

    <?php
    echo $args['after_widget'];
  }

  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $title_tag = ! empty( $instance['title_tag'] ) ? $instance['title_tag'] : '';
    $text = ! empty( $instance['text'] ) ? $instance['text'] : '';
    $button_text = ! empty( $instance['button_text'] ) ? $instance['button_text'] : '';
    $button_href = ! empty( $instance['button_href'] ) ? $instance['button_href'] : '';
    $css_class = ! empty( $instance['css_class'] ) ? $instance['css_class'] : '';
    $button_css_class = ! empty( $instance['button_css_class'] ) ? $instance['button_css_class'] : '';
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
    <small><?php _e( 'Apply only for the section title, not the widgets inside it.', 'understrap_widgets' ); ?></small>

    <p>
    <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:', 'understrap_widgets' ); ?></label> 
    <textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" rows="4" cols="20"><?php esc_attr_e( $text ); ?></textarea>
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e( 'Button Text:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php esc_attr_e( $button_text ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'button_href' ); ?>"><?php _e( 'Button Action:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'button_href' ); ?>" name="<?php echo $this->get_field_name( 'button_href' ); ?>" type="text" value="<?php esc_attr_e( $button_href ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'css_class' ); ?>"><?php _e( 'Custom CSS Classes:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'css_class' ); ?>" name="<?php echo $this->get_field_name( 'css_class' ); ?>" type="text" value="<?php esc_attr_e( $css_class ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'button_css_class' ); ?>"><?php _e( 'Button CSS Classes:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'button_css_class' ); ?>" name="<?php echo $this->get_field_name( 'button_css_class' ); ?>" type="text" value="<?php esc_attr_e( $button_css_class ); ?>">
    </p>
    <?php 
  }

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $title_tag_allowed = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'span');
    $instance['title_tag'] = ( in_array($new_instance['title_tag'], $title_tag_allowed) ) ? $new_instance['title_tag'] : '';
    $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? wp_kses_post( $new_instance['text'] ) : '';
    $instance['button_text'] = ( ! empty( $new_instance['button_text'] ) ) ? sanitize_text_field( $new_instance['button_text'] ) : '';
    $instance['button_href'] = ( ! empty( $new_instance['button_href'] ) ) ? esc_url_raw( $new_instance['button_href'] ) : '';
    // TODO: Sanitize css class names accordingly to w3c specifications
    $instance['css_class'] = ( ! empty( $new_instance['css_class'] ) ) ? sanitize_text_field( $new_instance['css_class'] ) : '';
    $instance['button_css_class'] = ( ! empty( $new_instance['button_css_class'] ) ) ? sanitize_text_field( $new_instance['button_css_class'] ) : '';

    return $instance;
  }
}