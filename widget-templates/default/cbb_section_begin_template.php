<?php 
/*
 * Template for the output of the Section Begin Widget
 * Override by placing a file called `cbb_section_begin_template.php`
 * in the folder `plugins/customizer-building-blocks/widget-templates` in your active theme
 */

$content_wrapper_class =  'container';
$css_class = 'cbb-section row ' . $css_class;



echo $args['before_widget'];

?> 
<div class="<?php echo esc_attr( $css_class ); ?>" <?php if ( isset( $instance['background_image_url'] ) ) { echo 'style="background-image: url(' . $instance['background_image_url'] . ');"'; } ?> >

  <div class="section-wrapper <?php if ( $content_wrapper ) echo esc_attr( $content_wrapper_class ); ?>"> 

    <?php if ( ! empty( $instance['title'] ) ) : ?>
      <div class="section-title">
      <?php echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title']; ?>
      </div>
    <?php endif; ?>

    <div class="section-content">
