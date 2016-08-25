<?php 

class CBB_SectionFeatured_Widget extends WP_Widget {

  public function __construct() {
    $widget_ops = array( 
      'classname' => 'cbb_section_featured_widget',
      'description' => __( 'A Section of Featured Content.', 'customizer-building-blocks'),
      'customize_selective_refresh' => true
    );
    parent::__construct( 'cbb_section_featured_widget', __( 'CBB Section Featured', 'customizer-building-blocks'), $widget_ops );



    add_action( 'sidebar_admin_setup', 'cbb_widget_admin_setup' );
  }





  public function widget( $args, $instance ) {

    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $feature_title_tag = ! empty( $instance['feature_title_tag'] ) ? $instance['feature_title_tag'] : '';
    $css_class = ! empty( $instance['css_class'] ) ? $instance['css_class'] : '';
    $button_css_class = ! empty( $instance['button_css_class'] ) ? $instance['button_css_class'] : '';
    $content_wrapper = ( $instance['content_wrapper'] ? true : false );
    
    $number_of_items = ! empty( $instance['number_of_items'] ) ? intval( $instance['number_of_items'] ) : 0;

    if ( ! empty( $instance['title_tag'] ) ) {
      $args['before_title'] = '<' . esc_attr( $instance['title_tag'] ) . ' class="widget-title cbb-featured__title">';
      $args['after_title'] = '</' . esc_attr( $instance['title_tag'] ) . '>';
    }
    
    $template = locate_template( CBB_THEME_TEMPLATES_FOLDER . '/cbb_section_featured_template.php' );
    if ( $template == '' ) $template = CBB_DEFAULT_TEMPLATES_FOLDER . '/cbb_section_featured_template.php';
    include ( $template );
  }





  public function form( $instance ) {
    
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $feature_title_tag = ! empty( $instance['feature_title_tag'] ) ? $instance['feature_title_tag'] : '';
    $css_class = ! empty( $instance['css_class'] ) ? $instance['css_class'] : '';
    $button_css_class = ! empty( $instance['button_css_class'] ) ? $instance['button_css_class'] : '';
    $content_wrapper = $instance[ 'content_wrapper' ] ? 'true' : 'false';
    
    $number_of_items = ! empty( $instance['number_of_items'] ) ? intval( $instance['number_of_items'] ) : 1;

    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Section Title:', 'customizer-building-blocks' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
    <input class="checkbox" type="checkbox" <?php checked( $instance[ 'content_wrapper' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'content_wrapper' ); ?>" name="<?php echo $this->get_field_name( 'content_wrapper' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'content_wrapper' ); ?>"><?php _e( 'Add section content wraper?', 'customizer-building-blocks' ); ?></label>
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'css_class' ); ?>"><?php _e( 'Section CSS Classes:', 'customizer-building-blocks' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'css_class' ); ?>" name="<?php echo $this->get_field_name( 'css_class' ); ?>" type="text" value="<?php echo esc_attr( $css_class ); ?>">
    </p>

    <p>
    <label><?php _e( 'Feature Title Tags:', 'customizer-building-blocks' ); ?></label>
    <br>
    <select class="widefat" id="<?php echo $this->get_field_id( 'feature_title_tag' ); ?>" name="<?php echo $this->get_field_name( 'feature_title_tag' ); ?>">
      <option value="" <?php echo esc_attr( $feature_title_tag == '' ? 'selected' : '' ); ?>><?php _e( '-- None --', 'customizer-building-blocks' ); ?></option>
      <option value="h1" <?php echo esc_attr( $feature_title_tag == 'h1' ? 'selected' : '' ); ?>><?php _e( 'h1', 'customizer-building-blocks' ); ?></option>
      <option value="h2" <?php echo esc_attr( $feature_title_tag == 'h2' ? 'selected' : '' ); ?>><?php _e( 'h2', 'customizer-building-blocks' ); ?></option>
      <option value="h3" <?php echo esc_attr( $feature_title_tag == 'h3' ? 'selected' : '' ); ?>><?php _e( 'h3', 'customizer-building-blocks' ); ?></option>
      <option value="h4" <?php echo esc_attr( $feature_title_tag == 'h4' ? 'selected' : '' ); ?>><?php _e( 'h4', 'customizer-building-blocks' ); ?></option>
      <option value="h5" <?php echo esc_attr( $feature_title_tag == 'h5' ? 'selected' : '' ); ?>><?php _e( 'h5', 'customizer-building-blocks' ); ?></option>
      <option value="h6" <?php echo esc_attr( $feature_title_tag == 'h6' ? 'selected' : '' ); ?>><?php _e( 'h6', 'customizer-building-blocks' ); ?></option>
      <option value="span" <?php echo esc_attr( $feature_title_tag == 'span' ? 'selected' : '' ); ?>><?php _e( 'span', 'customizer-building-blocks' ); ?></option>
    </select>
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'button_css_class' ); ?>"><?php _e( 'Button CSS Classes:', 'customizer-building-blocks' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'button_css_class' ); ?>" name="<?php echo $this->get_field_name( 'button_css_class' ); ?>" type="text" value="<?php echo esc_attr( $button_css_class ); ?>">
    </p>

    <p>
    <label><?php _e( 'Number of Items:', 'customizer-building-blocks' ); ?></label>
    <br>
    <select class="widefat" id="<?php echo $this->get_field_id( 'number_of_items' ); ?>" name="<?php echo $this->get_field_name( 'number_of_items' ); ?>">
      <option value="1" <?php echo esc_attr( intval( $number_of_items ) == 1 ? 'selected' : '' ); ?>>1</option>
      <option value="2" <?php echo esc_attr( intval( $number_of_items ) == 2 ? 'selected' : '' ); ?>>2</option>
      <option value="3" <?php echo esc_attr( intval( $number_of_items ) == 3 ? 'selected' : '' ); ?>>3</option>
      <option value="4" <?php echo esc_attr( intval( $number_of_items ) == 4 ? 'selected' : '' ); ?>>4</option>
      <option value="6" <?php echo esc_attr( intval( $number_of_items ) == 6 ? 'selected' : '' ); ?>>6</option>
    </select>
    </p>


    <?php

    for ($i = 1; $i <= $number_of_items; $i++) {
      
      $feature_title = ! empty( $instance['feature_title_' . $i ] ) ? $instance['feature_title_' . $i] : '';
      $feature_image_url = ( isset( $instance['feature_image_url_' . $i] ) ) ? $instance['feature_image_url_' . $i] : '';
      $feature_icon_class = ! empty( $instance['feature_icon_class_' . $i] ) ? $instance['feature_icon_class_' . $i] : '';
      $feature_text = ! empty( $instance['feature_text_' . $i] ) ? $instance['feature_text_' . $i] : '';
      $feature_button_text = ! empty( $instance['feature_button_text_' . $i] ) ? $instance['feature_button_text_' . $i] : '';
      $feature_button_href = ! empty( $instance['feature_button_href_' . $i] ) ? $instance['feature_button_href_' . $i] : '';
      $feature_css_class = ! empty( $instance['feature_css_class_' . $i] ) ? $instance['feature_css_class_' . $i] : '';

      ?>

      <hr style="width:100%">

      <strong>Feature <?php echo $i; ?></strong>

      <p>
      <label for="<?php echo $this->get_field_id( 'feature_title_' . $i ); ?>"><?php _e( 'Feature Title:', 'customizer-building-blocks' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'feature_title_' . $i ); ?>" name="<?php echo $this->get_field_name( 'feature_title_' . $i ); ?>" type="text" value="<?php echo esc_attr( $feature_title ); ?>">
      </p>

      <p>
      <label for="<?php echo $this->get_field_id( 'feature_image_url_' . $i ); ?>"><?php _e( 'Image URL:', 'customizer-building-blocks' ); ?></label>
      <input class="widefat feature_image_url" id="<?php echo $this->get_field_id( 'feature_image_url_' . $i ); ?>" name="<?php echo $this->get_field_name( 'feature_image_url_' . $i ); ?>" value="<?php echo $feature_image_url ?>" type="text">
      <button id="<?php echo $this->get_field_id( 'feature_image_url_' . $i  ) . '_select_button'; ?>" class="button" onclick="select_image_button_click('Select Image','Select Image','image','<?php echo $this->get_field_id( 'feature_image_url_' . $i ) . '_preview'; ?>','<?php echo $this->get_field_id( 'feature_image_url_' . $i );  ?>');"><?php _e( 'Select or upload image', 'customizer-building-blocks' ); ?></button>
      <button id="<?php echo $this->get_field_id( 'feature_image_url_' . $i ) . '_clear_button'; ?>" class="button" onclick="clear_image_button_click('<?php echo $this->get_field_id( 'feature_image_url_' . $i ) . '_preview'; ?>','<?php echo $this->get_field_id( 'feature_image_url_' . $i );  ?>');"><?php _e( 'Clear selection', 'Clear image selection on widget admin form.', 'customizer-building-blocks' ); ?></button>
      <div id="<?php echo $this->get_field_id( 'feature_image_url_' . $i ) . '_preview'; ?>" class="preview_placholder">
      <?php 
        if ($feature_image_url!='') echo '<img style="max-width: 100%;" src="' . $feature_image_url . '">';
      ?>
      </div>
      </p>

      <p>
      <label for="<?php echo $this->get_field_id( 'icon_class_' . $i ); ?>"><?php _e( 'Icon Class:', 'customizer-building-blocks' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'icon_class_' . $i ); ?>" name="<?php echo $this->get_field_name( 'icon_class_' . $i ); ?>" type="text" value="<?php echo esc_attr( $feature_icon_class ); ?>">
      </p>

      <p>
      <label for="<?php echo $this->get_field_id( 'feature_text_' . $i ); ?>"><?php _e( 'Text:', 'customizer-building-blocks' ); ?></label> 
      <textarea class="widefat" id="<?php echo $this->get_field_id( 'feature_text_' . $i ); ?>" name="<?php echo $this->get_field_name( 'feature_text_' . $i ); ?>" rows="4" cols="20"><?php echo esc_attr( $feature_text ); ?></textarea>
      </p>

      <p>
      <label for="<?php echo $this->get_field_id( 'feature_button_text_' . $i ); ?>"><?php _e( 'Button Text:', 'customizer-building-blocks' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'feature_button_text_' . $i ); ?>" name="<?php echo $this->get_field_name( 'feature_button_text_' . $i ); ?>" type="text" value="<?php echo esc_attr( $feature_button_text ); ?>">
      </p>

      <p>
      <label for="<?php echo $this->get_field_id( 'feature_button_href_' . $i ); ?>"><?php _e( 'Button Action:', 'customizer-building-blocks' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'feature_button_href_' . $i ); ?>" name="<?php echo $this->get_field_name( 'feature_button_href_' . $i ); ?>" type="text" value="<?php echo esc_attr( $feature_button_href ); ?>">
      </p>

      <p>
      <label for="<?php echo $this->get_field_id( 'feature_css_class_' . $i ); ?>"><?php _e( 'Feature CSS Classes:', 'customizer-building-blocks' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'feature_css_class_' . $i ); ?>" name="<?php echo $this->get_field_name( 'feature_css_class_' . $i ); ?>" type="text" value="<?php echo esc_attr( $feature_css_class ); ?>">
      </p>

    <?php 

    } // for loop

  } // function form()





  public function update( $new_instance, $old_instance ) {
    $instance = array();

    $number_of_items = intval( $new_instance['number_of_items'] );



    // SECTION OPTIONS

    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $instance['content_wrapper'] = $new_instance['content_wrapper'];
    
    $title_tag_allowed = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'span');
    $instance['feature_title_tag'] = ( in_array($new_instance['feature_title_tag'], $title_tag_allowed) ) ? $new_instance['feature_title_tag'] : '';

    $instance['css_class'] = ( ! empty( $new_instance['css_class'] ) ) ? customizer_building_blocks_widgets_sanitize_css_classes( $new_instance['css_class'] ) : '';
    $instance['button_css_class'] = ( ! empty( $new_instance['button_css_class'] ) ) ? customizer_building_blocks_widgets_sanitize_css_classes( $new_instance['button_css_class'] ) : '';

    $number_of_items_allowed = array('1', '2', '3', '4', '6');
    $instance['number_of_items'] = ( in_array($new_instance['number_of_items'], $number_of_items_allowed) ) ? $number_of_items : 1;


    
    // FEATURE OPTIONS
    
    for ($i = 1; $i <= $number_of_items; $i++) {

      $instance[ 'feature_title_' . $i ] = ( ! empty( $new_instance[ 'feature_title_' . $i ] ) ) ? sanitize_text_field( $new_instance[ 'feature_title_' . $i ] ) : '';

      $instance[ 'feature_image_url_' . $i ] = ( ! empty( $new_instance[ 'feature_image_url_' . $i ] ) ) ? esc_url_raw( $new_instance[ 'feature_image_url_' . $i ] ) : '';
      $instance[ 'feature_icon_class_' . $i ] = ( ! empty( $new_instance[ 'feature_icon_class_' . $i ] ) ) ? customizer_building_blocks_widgets_sanitize_css_classes( $new_instance[ 'feature_icon_class_' . $i ] ) : '';

      $instance[ 'feature_text_' . $i ] = ( ! empty( $new_instance[ 'feature_text_' . $i ] ) ) ? sanitize_text_field( $new_instance[ 'feature_text_' . $i ] ) : '';
      $instance[ 'feature_button_text_' . $i ] = ( ! empty( $new_instance[ 'feature_button_text_' . $i ] ) ) ? sanitize_text_field( $new_instance[ 'feature_button_text_' . $i ] ) : '';
      $instance[ 'feature_button_href_' . $i ] = ( ! empty( $new_instance[ 'feature_button_href_' . $i ] ) ) ? esc_url_raw( $new_instance[ 'feature_button_href_' . $i ] ) : '';
      $instance[ 'feature_css_class_' . $i ] = ( ! empty( $new_instance[ 'feature_css_class_' . $i ] ) ) ? customizer_building_blocks_widgets_sanitize_css_classes( $new_instance[ 'feature_css_class_' . $i ] ) : '';

    }
    

    return $instance;
  }
}
