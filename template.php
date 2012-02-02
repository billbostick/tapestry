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

function tapestry_regions() {
  return array(
    'leaderboard' => t('leaderboard'),
    'suckerfish' => t('suckerfish menu'),
    'sidebar_left' => t('left sidebar'),
    'sidebar_right' => t('right sidebar'),
    'sidebar_outside' => t('outside sidebar'),
    'content_top_left' => t('content top left'),
    'content_top_right' => t('content top right'),
    'content_bottom_left' => t('content bottom left'),
    'content_bottom_right' => t('content bottom right'),
    'header_left' => t('header left'),
    'header_center' => t('header center'),
    'header_right' => t('header right'),
    'banner' => t('banner'),
    'user1' => t('user1'),
    'user2' => t('user2'),
    'user3' => t('user3'),
    'user4' => t('user4'),
    'user5' => t('user5'),
    'user6' => t('user6'),
    'user7' => t('user7'),
    'user8' => t('user8'),
    'user9' => t('user9'),
    'user10' => t('user10'),
    'user11' => t('user11'),
    'user12' => t('user12'),
    'user13' => t('user13'),
    'user14' => t('user14'),
    'user15' => t('user15'),
    'footer_left' => t('footer left'),
    'footer_center' => t('footer center'),
    'footer_right' => t('footer right')
  );
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

function tapestry_block($block) {
  if (module_exists('blocktheme')) {
    if ( $custom_theme = blocktheme_get_theme($block) ) {
      return _phptemplate_callback($custom_theme,array('block' => $block));
    }
  }
  return phptemplate_block($block);
}

function phptemplate_menu_links($links) {
  if (!count($links)) {
    return '';
  }
  $level_tmp = explode('-', key($links));
  $level = $level_tmp[0];
  $output = "<ul class=\"links-$level\">\n";
  foreach ($links as $index => $link) {
    $output .= '<li';
	$css_id = 'item-' . strtolower(str_replace(' ', '_', strip_tags($link['title'])));
    $output .= ' class="' . $css_id . '"';
    if (stristr($index, 'active')) {
      $output .= ' class="active"';
    }
    $output .= ">". l($link['title'], $link['href'], $link['attributes'], $link['query'], $link['fragment']) ."</li>\n";
  }
  $output .= '</ul>';

  return $output;
}
