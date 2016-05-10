<?php 
/*
 * Template for the output of the Section Begin Widget
 * Override by placing a file called `understrap_section_begin_template.php`
 * the folder `widget-templates` in your active theme
 */

?> 
<div class="wrapper <?php esc_attr_e( $instance['css_class'] ); ?>">
    <div class="<?php esc_attr_e( $container_class ); ?>">
      <div class="row">

        <?php if ( ! empty( $instance['title'] ) ) : ?>
          <div class="section-title">
          <?php echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title']; ?>
          </div>
        <?php endif; ?>

        <div class="section-content">

<?php