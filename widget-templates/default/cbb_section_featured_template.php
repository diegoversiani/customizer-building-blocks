<?php 
/*
 * Template for the output of the Section Begin Widget
 * Override by placing a file called `cbb_section_featured_template.php`
 * in the folder `plugins/customizer-building-blocks/widget-templates` in your active theme
 */

$column_css_classes = array(
  '1' => ' twelve columns',
  '2' => ' six columns',
  '3' => ' four columns',
  '4' => ' three columns',
  '6' => ' two columns',
  );

$content_wrapper_class =  'container';
$css_class = 'cbb-section-featured row ' . $css_class;
$button_css_class = 'button ' . $button_css_class;
$column_css_class = $column_css_classes[ $number_of_items ];



echo $args['before_widget'];

?> 
<div class="<?php echo esc_attr( $css_class ); ?>">

  <?php if ( ! empty( $instance['title'] ) ) : ?>
    <div class="section-title">
    <?php echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title']; ?>
    </div>
  <?php endif; ?>

  <div class="section-content">

    <?php

    for ($i = 1; $i <= $number_of_items; $i++) {

      $feature_title = ! empty( $instance['feature_title_' . $i ] ) ? $instance['feature_title_' . $i] : '';
      $feature_image_url = ( isset( $instance['feature_image_url_' . $i] ) ) ? $instance['feature_image_url_' . $i] : '';
      $feature_icon_class = ! empty( $instance['feature_icon_class_' . $i] ) ? $instance['feature_icon_class_' . $i] : '';
      $feature_text = ! empty( $instance['feature_text_' . $i] ) ? $instance['feature_text_' . $i] : '';
      $feature_button_text = ! empty( $instance['feature_button_text_' . $i] ) ? $instance['feature_button_text_' . $i] : '';
      $feature_button_href = ! empty( $instance['feature_button_href_' . $i] ) ? $instance['feature_button_href_' . $i] : '';

      $feature_css_class = ! empty( $instance['feature_css_class_' . $i] ) ? $instance['feature_css_class_' . $i] : '';
      $feature_css_class = 'cbb-featured ' . $feature_css_class . $column_css_class;

    ?>

      <div class="<?php echo esc_attr( $feature_css_class ); ?>">

        <div class="cbb-featured__content">

          <?php if ( ! empty( $feature_image_url )) : ?>
          <img class="cbb-featured__image" src="<?php echo esc_url( $feature_image_url ); ?>" alt="<?php echo esc_attr( $feature_title ); ?>">
          <?php endif; ?>

          <?php if ( ! empty( $feature_icon_class ) ) : ?>
          <i class="cbb-featured__icon <?php echo esc_attr( $feature_icon_class ); ?>"></i>
          <?php endif; ?>

          <?php 
          if ( ! empty( $feature_title ) ) {
            echo sprintf('<%1$s class="cbb-featured__title">%2$s</%1$s>', $feature_title_tag, $feature_title );
          }
          ?>

          <?php if ( ! empty( $feature_text )) : ?>
          <p><?php echo esc_html( $feature_text ); ?></p>
          <?php endif; ?>

          <?php if ( ! empty( $feature_button_text )) : ?>
            <a href="<?php echo esc_url( $feature_button_href ); ?>" class="cbb-featured__button <?php echo esc_attr( $button_css_class ); ?>"><?php echo esc_html( $feature_button_text ); ?></a>
          <?php endif; ?>

        </div>

      </div>

    <?php } ?>

  </div>

</div>

<?php 

echo $args['after_widget'];
