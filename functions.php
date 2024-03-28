<?php
/*
 * All the functions are in the PHP files in the `functions/` folder.
 */

if (!defined('ABSPATH')) {
  exit;
}

require get_template_directory() . '/functions/cleanup.php';
require get_template_directory() . '/functions/setup.php';
require get_template_directory() . '/functions/action-hooks.php';
require get_template_directory() . '/functions/navbar.php';

require get_template_directory() . '/config/enqueues.php';
require get_template_directory() . '/config/acf.php';
require get_template_directory() . '/config/bloat.php';
require get_template_directory() . '/config/cpt.php';
require get_template_directory() . '/config/woocommerce.php';

require get_template_directory() . '/utils/acf_image_utils.php';
require get_template_directory() . '/utils/content_utils.php';
require get_template_directory() . '/utils/excerpt_utils.php';
require get_template_directory() . '/utils/wp_utils.php';

require get_template_directory() . '/ajax/posts_load_more.php';
