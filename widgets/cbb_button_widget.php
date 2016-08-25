<?php 

class CBB_Button_Widget extends WP_Widget {

  public function __construct() {
    $widget_ops = array( 
      'classname' => 'cbb_button_widget',
      'description' => __( 'A simple button widget.', 'customizer-building-blocks'),
      'customize_selective_refresh' => true
    );
    parent::__construct( 'cbb_button_widget', __( 'CBB Button', 'customizer-building-blocks'), $widget_ops );
  }





  public function widget( $args, $instance ) {

    $button_css_class = ( ! empty( $instance['button_css_class'] ) ) ? $instance['button_css_class'] : '';

    echo $args['before_widget'];

    $template = locate_template( CBB_THEME_TEMPLATES_FOLDER . '/cbb_button_template.php' );
    if ( $template == '' ) $template = CBB_DEFAULT_TEMPLATES_FOLDER . '/cbb_button_template.php';
    include ( $template );

    echo $args['after_widget'];
  }





  public function form( $instance ) {
    $button_text = ! empty( $instance['button_text'] ) ? $instance['button_text'] : '';
    $button_href = ! empty( $instance['button_href'] ) ? $instance['button_href'] : '';
    $icon_class = ! empty( $instance['icon_class'] ) ? $instance['icon_class'] : '';
    $button_css_class = ! empty( $instance['button_css_class'] ) ? $instance['button_css_class'] : '';
    ?>


    <p>
    <label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e( 'Button Text:', 'customizer-building-blocks' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'button_href' ); ?>"><?php _e( 'Button Action:', 'customizer-building-blocks' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'button_href' ); ?>" name="<?php echo $this->get_field_name( 'button_href' ); ?>" type="text" value="<?php echo esc_attr( $button_href ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'icon_class' ); ?>"><?php _e( 'Icon Class:', 'customizer-building-blocks' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'icon_class' ); ?>" name="<?php echo $this->get_field_name( 'icon_class' ); ?>" type="text" value="<?php echo esc_attr( $icon_class ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'button_css_class' ); ?>"><?php _e( 'Button CSS Classes:', 'customizer-building-blocks' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'button_css_class' ); ?>" name="<?php echo $this->get_field_name( 'button_css_class' ); ?>" type="text" value="<?php echo esc_attr( $button_css_class ); ?>">
    </p>
    <?php 
  }





  public function update( $new_instance, $old_instance ) {
    $instance = array();



    $instance['button_text'] = ( ! empty( $new_instance['button_text'] ) ) ? sanitize_text_field( $new_instance['button_text'] ) : '';
    $instance['button_href'] = ( ! empty( $new_instance['button_href'] ) ) ? esc_url_raw( $new_instance['button_href'] ) : '';


    
    $instance['icon_class'] = ( ! empty( $new_instance['icon_class'] ) ) ? customizer_building_blocks_widgets_sanitize_css_classes( $new_instance['icon_class'] ) : '';



    $instance['button_css_class'] = ( ! empty( $new_instance['button_css_class'] ) ) ? customizer_building_blocks_widgets_sanitize_css_classes( $new_instance['button_css_class'] ) : '';

    return $instance;
  }
}