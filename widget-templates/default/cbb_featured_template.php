<?php 
/*
 * Template for the output of the Featured Widget
 * Override by placing a file called `cbb_featured_template.php`
 * in the folder `plugins/customizer-building-blocks/widget-templates` in your active theme
 */

if ( empty( $css_class ) ) $css_class = 'four columns ' . $css_class;
$button_css_class = 'button ' . $button_css_class;


echo $args['before_widget'];

?>
<div id="<?php echo esc_attr( $args['widget_id'] ); ?>" class="cbb-featured widget  <?php echo esc_attr( $css_class ); ?>">

  <?php if ( ! empty( $instance['image_url'] )) : ?>
  <img class="cbb-featured__image" src="<?php echo esc_url( $instance['image_url'] ); ?>" alt="<?php echo esc_attr( $instance['title'] ); ?>">
  <?php endif; ?>

  <?php if ( ! empty( $instance['icon_class'] ) ) : ?>
  <i class="cbb-featured__icon <?php echo esc_attr( $instance['icon_class'] ); ?>"></i>
  <?php endif; ?>

  <?php 
  if ( ! empty( $instance['title'] ) ) {
    echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
  }
  ?>

  <?php if ( ! empty( $instance['text'] )) : ?>
  <p><?php echo esc_html( $instance['text'] ); ?></p>
  <?php endif; ?>

  <?php if ( ! empty( $instance['button_text'] )) : ?>
    <a href="<?php echo esc_url( $instance['button_href'] ); ?>" class="cbb-featured__button <?php echo esc_attr( $button_css_class ); ?>"><?php echo esc_html( $instance['button_text'] ); ?></a>
  <?php endif; ?>

</div>

<?php echo $args['after_widget']; ?>
