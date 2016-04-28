<?php 
/**
* Adds UnderstrapAbout_Widget widget.
*/
class UnderstrapAbout_Widget extends WP_Widget {

  /**
   * Sets up the widgets name
   */
  public function __construct() {
    $widget_ops = array( 
      'classname' => 'understrap_about_widget',
      'description' => __( 'An About section widget for Understrap Theme.', 'understrap_widgets' ),
    );
    parent::__construct( 'understrap_about_widget', __( 'Understrap About', 'understrap_widgets' ), $widget_ops );
  }

  /**
   * Front-end display of widget.
   *
   * @see UnderstrapAbout_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    echo $args['before_widget'];

    $container_class = ( $instance['container_fluid'] ? 'container-fluid' : 'container' );

    ?> 
    <div class="wrapper wrapper-about <?php esc_attr_e( $instance['css_class'] ); ?>">
      <div class="<?php esc_attr_e( $container_class ); ?>">
        <div class="row">
          <div class="col-xs-12 about-content">
            <?php 
            if ( ! empty( $instance['title'] ) ) {
              echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
            }
            ?>
            
            <div class="about-text">
              <?php echo wp_kses_post( $instance['text'] ); ?>
            </div>

            <?php if ( ! empty( $instance['cta_text'] ) || ! empty( $instance['button_text'] ) ) : ?>
            <div class="about-cta">
              <?php if ( ! empty( $instance['cta_text'] ) ) : ?>
              <p><?php esc_html_e( $instance['cta_text'] ); ?></p>
              <?php endif; ?>

              <?php if ( ! empty( $instance['button_text'] ) ) : ?>
              <a href="<?php esc_html_e( $instance['button_href'] ); ?>" class="btn <?php echo ( empty( $instance['button_css_class'] ) ? 'btn-default' : esc_attr( $instance['button_css_class'] ) ); ?>"><?php esc_html_e( $instance['button_text'] ); ?></a>
              <?php endif; ?>
            </div>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>

    <?php
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
    $cta_text = ! empty( $instance['cta_text'] ) ? $instance['cta_text'] : '';
    $button_text = ! empty( $instance['button_text'] ) ? $instance['button_text'] : '';
    $button_href = ! empty( $instance['button_href'] ) ? $instance['button_href'] : '';
    $container_fluid = $instance[ 'container_fluid' ] ? 'true' : 'false';
    $css_class = ! empty( $instance['css_class'] ) ? $instance['css_class'] : '';
    $button_css_class = ! empty( $instance['button_css_class'] ) ? $instance['button_css_class'] : '';

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
    <label for="<?php echo $this->get_field_id( 'cta_text' ); ?>"><?php _e( 'Call To Action Text:', 'understrap_widgets' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'cta_text' ); ?>" name="<?php echo $this->get_field_name( 'cta_text' ); ?>" type="text" value="<?php esc_attr_e( $cta_text ); ?>">
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
    <input class="checkbox" type="checkbox" <?php checked( $instance[ 'container_fluid' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'container_fluid' ); ?>" name="<?php echo $this->get_field_name( 'container_fluid' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'container_fluid' ); ?>"><?php _e( 'Is container-fluid?', 'understrap_widgets' ); ?></label><br>
    <small><?php _e( 'Check to apply boostrap <code>container-fluid</code> class to this widget.', 'understrap_widgets' ); ?></small>
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
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? wp_kses_post( $new_instance['text'] ) : '';
    $instance['cta_text'] = ( ! empty( $new_instance['cta_text'] ) ) ? sanitize_text_field( $new_instance['cta_text'] ) : '';
    $instance['button_text'] = ( ! empty( $new_instance['button_text'] ) ) ? sanitize_text_field( $new_instance['button_text'] ) : '';
    $instance['button_href'] = ( ! empty( $new_instance['button_href'] ) ) ? esc_url_raw( $new_instance['button_href'] ) : ''; // url escaped for database insertion

    $instance['container_fluid'] = $new_instance['container_fluid'];
    // TODO: Sanitize css class names accordingly to w3c specifications
    $instance['css_class'] = ( ! empty( $new_instance['css_class'] ) ) ? sanitize_text_field( $new_instance['css_class'] ) : '';
    $instance['button_css_class'] = ( ! empty( $new_instance['button_css_class'] ) ) ? sanitize_text_field( $new_instance['button_css_class'] ) : '';

    return $instance;
  }
}
