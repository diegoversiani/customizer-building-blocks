<?php 
/**
* Adds UnderstrapText_Widget widget.
*/
class UnderstrapText_Widget extends WP_Widget {

  /**
   * Sets up the widgets name
   */
  public function __construct() {
    $widget_ops = array( 
      'classname' => 'understrap_text_widget',
      'description' => __( 'Text widget for Understrap Theme.', 'understrap_widgets' ),
    );
    parent::__construct( 'understrap_text_widget', __( 'Understrap Text', 'understrap_widgets' ), $widget_ops );
  }

  /**
   * Front-end display of widget.
   *
   * @see UnderstrapText_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    echo $args['before_widget'];

    $container_class = ( $instance['container_fluid'] ? 'container-fluid' : 'container' );

    $widget_text = ! empty( $instance['text'] ) ? $instance['text'] : '';
    $text_escaped = apply_filters( 'widget_text', $widget_text, $instance, $this );

    ?>
      <div class="<?php echo ( empty ( $instance['css_class'] ) ) ? 'col-xs-12' : esc_attr( $instance['css_class'] ); ?>">
        <?php

        if ( ! empty( $instance['title'] ) ) {
          echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
        }

        echo $text_escaped;

        ?>
      </div>

    <?php
    echo $args['after_widget'];
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $text = ! empty( $instance['text'] ) ? $instance['text'] : '';
    $css_class = ! empty( $instance['css_class'] ) ? $instance['css_class'] : '';
    ?>

    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php esc_attr_e( $title ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:', 'understrap_widgets' ); ?></label> 
    <textarea class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" rows="4" cols="20"><?php esc_attr_e( $text ); ?></textarea>
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'css_class' ); ?>"><?php _e( 'Custom CSS Classes:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'css_class' ); ?>" name="<?php echo $this->get_field_name( 'css_class' ); ?>" type="text" value="<?php esc_attr_e( $css_class ); ?>">
    </p>

    <?php 
  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? wp_kses_post( $new_instance['text'] ) : '';

    // TODO: Sanitize css classes for allowed characters
    $instance['css_class'] = ( ! empty( $new_instance['css_class'] ) ) ? sanitize_text_field( $new_instance['css_class'] ) : '';

    return $instance;
  }
}
