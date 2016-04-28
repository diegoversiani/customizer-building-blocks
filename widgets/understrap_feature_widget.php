<?php 
/**
* Adds UnderstrapFeature_Widget widget.
*/
class UnderstrapFeature_Widget extends WP_Widget {

  /**
   * Sets up the widgets name etc
   */
  public function __construct() {
    $widget_ops = array( 
      'classname' => 'understrap_feature_widget',
      'description' => __( 'A Feature widget for Understrap Theme. Should always be used between Features Begin and Features End widgets.', 'understrap_widgets'),
    );
    parent::__construct( 'understrap_feature_widget', __( 'Understrap Feature', 'understrap_widgets'), $widget_ops );
  }

  /**
   * Front-end display of widget.
   *
   * @see UnderstrapFeature_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    
    ?>

      <div class="<?php echo ( empty( $instance['css_class'] ) ? 'col-sm-4' : esc_attr( $instance['css_class'] ) ); ?> feature">
        <div class="feature-item text-center">
          
          <?php if ( ! empty( $instance['image_url'] )) : ?>
          <img class="img-responsive center-block" src="<?php echo esc_url( $instance['image_url'] ); ?>" alt="<?php esc_attr_e( $instance['title'] ); ?>">
          <?php endif; ?>

          <?php if ( ! empty( $instance['icon_class'] ) ) : ?>
          <div class="icon">
            <span class="fa-stack fa-4x">
              <?php if ( ! empty( $instance['icon_background_class'] ) ) : ?>
              <i class="fa <?php esc_attr_e( $instance['icon_background_class'] ); ?> fa-stack-2x"></i>
              <?php endif; ?>
              <i class="fa fa-stack-1x <?php esc_attr_e( $instance['icon_class'] ); ?>"></i>
            </span>
          </div>
          <?php endif; ?>

          <?php if ( ! empty( $instance['title'] )) : ?>
          <h4><?php esc_html_e( $instance['title'] ); ?></h4>
          <?php endif; ?>

          <?php if ( ! empty( $instance['text'] )) : ?>
          <p><?php esc_html_e( $instance['text'] ); ?></p>
          <?php endif; ?>

          <?php if ( ! empty( $instance['button_text'] )) : ?>
            <a href="<?php echo esc_url( $instance['button_href'] ); ?>" class="btn <?php echo ( empty( $instance['button_css_class'] ) ? 'btn-default' : esc_attr( $instance['button_css_class'] ) ); ?>"><?php esc_html_e( $instance['button_text'] ); ?></a>
          <?php endif; ?>

        </div>
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
    $image_url = ! empty( $instance['image_url'] ) ? $instance['image_url'] : '';
    $icon_class = ! empty( $instance['icon_class'] ) ? $instance['icon_class'] : '';
    $icon_background_class = ! empty( $instance['icon_background_class'] ) ? $instance['icon_background_class'] : '';
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
    <label for="<?php echo $this->get_field_id( 'image_url' ); ?>"><?php _e( 'Image URL:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" type="text" value="<?php esc_attr_e( $image_url ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'icon_class' ); ?>"><?php _e( 'Icon Class:', 'understrap_widgets' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'icon_class' ); ?>" name="<?php echo $this->get_field_name( 'icon_class' ); ?>" type="text" value="<?php esc_attr_e( $icon_class ); ?>">
    <small><?php _e( 'Only shown if image URL is not provided. Accepts any icon class from <a href="https://fortawesome.github.io">FontAwesome</a>. I.e. <code>fa-facebook</code>. To apply custom colors please use css classes.', 'understrap_widgets' ); ?></small>
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'icon_background_class' ); ?>"><?php _e( 'Icon Class:', 'understrap_widgets' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'icon_background_class' ); ?>" name="<?php echo $this->get_field_name( 'icon_background_class' ); ?>" type="text" value="<?php esc_attr_e( $icon_background_class ); ?>">
    <small><?php _e( 'Any icon class from <a href="https://fortawesome.github.io">FontAwesome</a>, but usually <code>fa-circle</code>, <code>fa-circle-o</code>, <code>fa-square</code> or <code>fa-square-o</code>.', 'understrap_widgets' ); ?></small>
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:', 'understrap_widgets' ); ?></label> 
    <textarea class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" rows="4" cols="20"><?php esc_attr_e( $text ); ?></textarea>
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
    // TODO: Sanitize css class names accordingly to w3c specifications

    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $instance['image_url'] = ( ! empty( $new_instance['image_url'] ) ) ? esc_url_raw( $new_instance['image_url'] ) : ''; // url escaped for database insertion
    $instance['icon_class'] = ( ! empty( $new_instance['icon_class'] ) ) ? sanitize_text_field( $new_instance['icon_class'] ) : '';
    $instance['icon_background_class'] = ( ! empty( $new_instance['icon_background_class'] ) ) ? sanitize_text_field( $new_instance['icon_background_class'] ) : '';

    $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? sanitize_text_field( $new_instance['text'] ) : '';
    $instance['button_text'] = ( ! empty( $new_instance['button_text'] ) ) ? sanitize_text_field( $new_instance['button_text'] ) : '';
    $instance['button_href'] = ( ! empty( $new_instance['button_href'] ) ) ? esc_url_raw( $new_instance['button_href'] ) : ''; // url escaped for database insertion

    $instance['css_class'] = ( ! empty( $new_instance['css_class'] ) ) ? sanitize_text_field( $new_instance['css_class'] ) : '';
    $instance['button_css_class'] = ( ! empty( $new_instance['button_css_class'] ) ) ? sanitize_text_field( $new_instance['button_css_class'] ) : '';

    return $instance;
  }
}
