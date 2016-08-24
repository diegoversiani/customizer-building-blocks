<?php 
/*
 * Template for the output of the About Widget
 * Override by placing a file called `cbb_about_template.php`
 * in the folder `plugins/customizer-building-blocks/widget-templates` in your active theme
 */

$css_class = 'cbb-about ' . $css_class;
$image_class = 'cbb-about__image ';
$button_css_class = 'cbb-about__cta-button button ' . $button_css_class;

?>
<div class="<?php echo esc_attr( $css_class ); ?>">

  <?php if ( ! empty( $instance['image_url'] ) ) : ?>
      <img src="<?php echo esc_url( $instance['image_url'] ); ?>" class="<?php echo esc_attr( $image_class ); ?>">
  <?php endif; ?>

  <?php 
  if ( ! empty( $instance['title'] ) ) {
    echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
  }
  ?>

  <div class="cbb-about__text">
    <?php echo $text_escaped; ?>
  </div>

  <?php if ( ! empty( $instance['cta_text'] ) || ! empty( $instance['button_text'] ) ) : ?>
  <div class="cbb-about__cta">
    <?php if ( ! empty( $instance['cta_text'] ) ) : ?>
    <p><?php echo esc_html( $instance['cta_text'] ); ?></p>
    <?php endif; ?>

    <?php if ( ! empty( $instance['button_text'] ) ) : ?>
    <a href="<?php echo esc_url( $instance['button_href'] ); ?>" class="<?php echo esc_attr( $button_css_class ); ?>"><?php echo esc_html( $instance['button_text'] ); ?></a>
    <?php endif; ?>
  </div>
  <?php endif; ?>

</div>
