<?php 
/*
 * Template for the output of the About Widget
 * Override by placing a file called `cbb_about_template.php`
 * in the folder `plugins/customizer-building-blocks/widget-templates` in your active theme
 */

$css_class = 'cbb-about ' . $css_class;
$button_css_class = 'button ' . $button_css_class;

?>
<div class="<?php esc_attr_e( $css_class ); ?>">

  <?php 
  if ( ! empty( $instance['title'] ) ) {
    echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
  }
  ?>

  <div class="about-text">
    <?php echo $text_escaped; ?>
  </div>

  <?php if ( ! empty( $instance['cta_text'] ) || ! empty( $instance['button_text'] ) ) : ?>
  <div class="about-cta">
    <?php if ( ! empty( $instance['cta_text'] ) ) : ?>
    <p><?php esc_html_e( $instance['cta_text'] ); ?></p>
    <?php endif; ?>

    <?php if ( ! empty( $instance['button_text'] ) ) : ?>
    <a href="<?php echo esc_url( $instance['button_href'] ); ?>" class="<?php esc_attr_e( $button_css_class ); ?>"><?php esc_html_e( $instance['button_text'] ); ?></a>
    <?php endif; ?>
  </div>
  <?php endif; ?>

</div>
