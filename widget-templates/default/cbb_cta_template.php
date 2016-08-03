<?php 
/*
 * Template for the output of the CallToAction/Callout Widget
 * Override by placing a file called `cbb_cta_template.php`
 * in the folder `plugins/customizer-building-blocks/widget-templates` in your active theme
 */

$css_class = 'cbb-cta ' . $css_class;
$image_class = 'cbb-cta__image ';
$button_css_class = 'cbb-cta__button button ' . $button_css_class;
$icon_class = $instance['icon_class'];

?>
  <div class="<?php esc_attr_e( $css_class ); ?>">

    <?php if ( ! empty( $instance['button_href'] ) && empty( $instance['button_text'] ) ) : ?>
      <a href="<?php echo esc_url( $instance['button_href'] ); ?>">
    <?php endif; ?>



    <?php if ( ! empty( $instance['background_image_url'] ) ) : ?>
      <img src="<?php echo esc_url( $instance['background_image_url'] ); ?>" class="<?php esc_attr_e( $image_class ); ?>">
    <?php endif; ?>

    <?php if ( ! empty( $icon_class ) ) : ?>
    <i class="cbb-cta__icon <?php esc_attr_e( $icon_class ); ?>"></i>
    <?php endif; ?>

    <?php 
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
    }
    ?>

    <p class="cbb-cta__text"><?php echo wp_kses_post( $instance['text'] ); ?></p>

    <?php if ( ! empty( $instance['button_text'] ) ) : ?>
      <a href="<?php echo esc_url( $instance['button_href'] ); ?>" class="<?php esc_attr_e( $button_css_class ); ?>"><?php esc_html_e( $instance['button_text'] ); ?></a>
    <?php endif; ?>



    <?php if ( ! empty( $instance['button_href'] ) && empty( $instance['button_text'] ) ) : ?>
      </a>
    <?php endif; ?>

  </div>
