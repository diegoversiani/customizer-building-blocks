<?php 
/*
 * Template for the output of the Featured Widget
 * Override by placing a file called `cbb_featured_template.php`
 * in the folder `plugins/customizer-building-blocks/widget-templates` in your active theme
 */

$css_class = 'four columns ' . $css_class;
$button_css_class = 'button ' . $button_css_class;

?>
<div class="cbb-featured <?php esc_attr_e( $css_class ); ?>">
    
  <?php if ( ! empty( $instance['image_url'] )) : ?>
  <img class="cbb-featured__image" src="<?php echo esc_url( $instance['image_url'] ); ?>" alt="<?php esc_attr_e( $instance['title'] ); ?>">
  <?php endif; ?>

  <?php if ( ! empty( $instance['icon_class'] ) ) : ?>
  <span class="cbb-featured__icon <?php esc_attr_e( $instance['icon_class'] ); ?>"></span>
  <?php endif; ?>

  <?php 
  if ( ! empty( $instance['title'] ) ) {
    echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
  }
  ?>

  <?php if ( ! empty( $instance['text'] )) : ?>
  <p><?php esc_html_e( $instance['text'] ); ?></p>
  <?php endif; ?>

  <?php if ( ! empty( $instance['button_text'] )) : ?>
    <a href="<?php echo esc_url( $instance['button_href'] ); ?>" class="cbb-featured__button <?php esc_attr_e( $button_css_class ); ?>"><?php esc_html_e( $instance['button_text'] ); ?></a>
  <?php endif; ?>

</div>
