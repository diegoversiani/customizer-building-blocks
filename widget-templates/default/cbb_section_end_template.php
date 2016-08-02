<?php 
/*
 * Template for the output of the Section End Widget
 * Override by placing a file called `cbb_section_end_template.php`
 * in the folder `plugins/customizer-building-blocks/widget-templates` in your active theme
 */

// Add closing tags for previous Section Begin Widget
echo '</div></div></div>';



echo $args['after_widget'];
