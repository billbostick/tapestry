<?php
// $Id: template.php 11 2008-02-21 13:24:51Z bill $
// www.roopletheme.com

if (is_null(theme_get_setting('tapestry_style'))) {
  global $theme_key;

  // Save default theme settings
  $defaults = array(
    'tapestry_style' => 'gerberdaisy',
    'tapestry_usefixedwidth' => 1,
    'tapestry_suckerfishmenus' => 0,
    'tapestry_suckerfishalign' => 'right',
    'tapestry_fixedwidth' => '850',
    'tapestry_fontfamily' => 0,
    'tapestry_customfont' => '',
    'tapestry_uselocalcontent' => '0',
    'tapestry_localcontentfile' => '',
    'tapestry_breadcrumb' => 0,
    'tapestry_themelogo' => 0,
    'tapestry_useicons' => 0,
    'tapestry_ie6icons' => 1,
    'tapestry_leftsidebarwidth' => '210',
    'tapestry_rightsidebarwidth' => '210',
    'tapestry_sidebarmode' => 'center',
    'tapestry_outsidebar' => 'left',
    'tapestry_outsidebarwidth' => '180',
    'tapestry_iepngfix' => 0,
  );

  variable_set(
    str_replace('/', '_', 'theme_'. $theme_key .'_settings'),
    array_merge(theme_get_settings($theme_key), $defaults)
  );
  // Force refresh of Drupal internals
  theme_get_setting('', TRUE);
}

function get_tapestry_style() {
  $style = theme_get_setting('tapestry_style');
  if (!$style)
  {
    $style = 'gerberdaisy';
  }
  if (isset($_COOKIE["tapestrystyle"])) {
    $style = $_COOKIE["tapestrystyle"];
  }
  return $style;
}

drupal_add_css(drupal_get_path('theme', 'tapestry') . '/css/' . get_tapestry_style() . '.css', 'theme');

drupal_add_css(drupal_get_path('theme', 'tapestry') . '/css/suckerfish.css', 'theme');

if (theme_get_setting('tapestry_iepngfix')) {
   drupal_add_js(drupal_get_path('theme', 'tapestry') . '/js/jquery.pngFix.js', 'theme');
}

if (theme_get_setting('tapestry_themelogo')) {
	function _phptemplate_variables($hook, $variables = array()) {
		$styled_logo = '/images/' . get_tapestry_style() . '/logo.png';
		$variables['logo'] = base_path() . drupal_get_path('theme', 'tapestry') . $styled_logo;
		return $variables;
   }
}

if (theme_get_setting('tapestry_uselocalcontent')) {
   $local_content = drupal_get_path('theme', 'tapestry') . '/' . theme_get_setting('tapestry_localcontentfile');
	 if (file_exists($local_content)) {
	    drupal_add_css($local_content, 'theme');
	 }
}

function tapestry_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    $styled_breadcrumb = '/images/' . get_tapestry_style() . '/bullet-breadcrumb.png';
  	$output = '<div class="breadcrumb">';
	$count = count($breadcrumb);
	$i = 1;
	foreach ($breadcrumb as $crumb) {
		$output .= $crumb;
		$i++;
		if ($i <= $count) {	
			$bullet = base_path() . path_to_theme() . $styled_breadcrumb;
			$output .= ' <image src="' . $bullet . '" /> ';
		}
	}
	$output .= '</div>';
    return $output;
  }
}

function phptemplate_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
  $class = ($menu ? 'expanded' : ($has_children ? 'collapsed' : 'leaf'));
  if (!empty($extra_class)) {
    $class .= ' '. $extra_class;
  }
  if ($in_active_trail) {
    $class .= ' active-trail';
  }
  $class .= ' item-'. strtolower(str_replace(' ', '_', strip_tags($link)));
  return '<li class="'. $class .'">'. $link . $menu ."</li>\n";
}
