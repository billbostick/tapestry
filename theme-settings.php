<?php
// $Id: theme-settings.php 11 2008-02-21 13:24:51Z bill $
// www.roopletheme.com

function phptemplate_settings($saved_settings) {

  $settings = theme_get_settings('tapestry');

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

  $settings = array_merge($defaults, $settings);

  $form['tapestry_style'] = array(
    '#type' => 'select',
    '#title' => t('Style'),
    '#default_value' => $settings['tapestry_style'],
    '#options' => array(
	  'allstar' => t('All Star'),
      'bluecollar' => t('Bluecollar'),
      'bogart' => t('Bogart'),
      'bizcasual' => t('Business Casual'),
      'cactusbloom' => t('Cactus Bloom'),
      'dolores' => t('Dolores'),
	  'dustypetrol' => t('Dusty Petrol'),
      'firenze' => t('Firenze'),
      'fusion' => t('Fusion'),
      'gerberdaisy' => t('Gerber Daisy'),
      'haarlemmod' => t('Haarlem Modern'),
      'kalamata' => t('Kalamata Cream'),
      'kobenhavn' => t('Kobenhavn Classic'),
	  'antoinette' => t('Marie Antoinette'),
      'modhome' => t('Modern Home'),
      'modoffice' => t('Modern Office'),
	  'orientexpress' => t('Orient Express'),
      'woodworks' => t('Scandinavian Woodworks'),
      'techoffice' => t('Tech Office'),
      'watermelon' => t('Watermelon'),
    ),
  );

  $form['tapestry_fixedwidth'] = array(
    '#type' => 'textfield',
    '#title' => t('Fixed Width Size'),
    '#default_value' => $settings['tapestry_fixedwidth'],
    '#size' => 5,
    '#maxlength' => 5,
  );

  $form['tapestry_outsidebar'] = array(
    '#type' => 'select',
    '#title' => t('Outside Sidebar Location'),
    '#default_value' => $settings['tapestry_outsidebar'],
    '#options' => array(
      'left' => t('Outside Sidebar on Left'),
      'right' => t('Outside Sidebar on Right'),
    ),
  );

  $form['tapestry_outsidebarwidth'] = array(
    '#type' => 'textfield',
    '#title' => t('Outside Sidebar Width'),
    '#default_value' => $settings['tapestry_outsidebarwidth'],
    '#size' => 5,
    '#maxlength' => 5,
  );

  $form['tapestry_sidebarmode'] = array(
    '#type' => 'select',
    '#title' => t('Inside Sidebar Mode'),
    '#default_value' => $settings['tapestry_sidebarmode'],
    '#options' => array(
      'center' => t('Content Between Inside Sidebars'),
      'left' => t('Inside Sidebars on Left'),
      'right' => t('Inside Sidebars on Right'),
    ),
  );

  $form['tapestry_leftsidebarwidth'] = array(
    '#type' => 'textfield',
    '#title' => t('Left Sidebar Width'),
    '#default_value' => $settings['tapestry_leftsidebarwidth'],
    '#size' => 5,
    '#maxlength' => 5,
  );

  $form['tapestry_rightsidebarwidth'] = array(
    '#type' => 'textfield',
    '#title' => t('Right Sidebar Width'),
    '#default_value' => $settings['tapestry_rightsidebarwidth'],
    '#size' => 5,
    '#maxlength' => 5,
  );

  $form['tapestry_fontfamily'] = array(
    '#type' => 'select',
    '#title' => t('Font Family'),
    '#default_value' => $settings['tapestry_fontfamily'],
    '#options' => array(
     'Arial, Verdana, sans-serif' => t('Arial, Verdana, sans-serif'),
     '"Arial Narrow", Arial, Helvetica, sans-serif' => t('"Arial Narrow", Arial, Helvetica, sans-serif'),
     '"Times New Roman", Times, serif' => t('"Times New Roman", Times, serif'),
     '"Lucida Sans", Verdana, Arial, sans-serif' => t('"Lucida Sans", Verdana, Arial, sans-serif'),
     '"Lucida Grande", Verdana, sans-serif' => t('"Lucida Grande", Verdana, sans-serif'),
     'Tahoma, Verdana, Arial, Helvetica, sans-serif' => t('Tahoma, Verdana, Arial, Helvetica, sans-serif'),
     'Georgia, "Times New Roman", Times, serif' => t('Georgia, "Times New Roman", Times, serif'),
     'Custom' => t('Custom (specify below)'),
    ),
  );

  $form['tapestry_customfont'] = array(
    '#type' => 'textfield',
    '#title' => t('Custom Font-Family Setting'),
    '#default_value' => $settings['tapestry_customfont'],
    '#size' => 40,
    '#maxlength' => 75,
  );

  $form['tapestry_uselocalcontent'] = array(
    '#type' => 'checkbox',
    '#title' => t('Include Local Content File'),
    '#default_value' => $settings['tapestry_uselocalcontent'],
  );

  $form['tapestry_localcontentfile'] = array(
    '#type' => 'textfield',
    '#title' => t('Local Content File Name'),
    '#default_value' => $settings['tapestry_localcontentfile'],
    '#size' => 40,
    '#maxlength' => 75,
  );

  $form['tapestry_suckerfishalign'] = array(
    '#type' => 'select',
    '#title' => t('Suckerfish Menu Alignment'),
    '#default_value' => $settings['tapestry_suckerfishalign'],
    '#options' => array(
      'right' => t('Right'),
      'center' => t('Centered'),
      'left' => t('Left'),
    ),
  );

  $form['tapestry_suckerfishmenus'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable Suckerfish Javascript for IE6'),
    '#default_value' => $settings['tapestry_suckerfishmenus'],
  );

  $form['tapestry_themelogo'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use Themed Logo'),
    '#default_value' => $settings['tapestry_themelogo'],
  );

  $form['tapestry_breadcrumb'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show Breadcrumbs'),
    '#default_value' => $settings['tapestry_breadcrumb'],
  );

  $form['tapestry_useicons'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use Icons'),
    '#default_value' => $settings['tapestry_useicons'],
  );

  $form['tapestry_ie6icons'] = array(
    '#type' => 'checkbox',
    '#title' => t('Alternate Icons for IE5/6'),
    '#default_value' => $settings['tapestry_ie6icons'],
  );

  $form['tapestry_iepngfix'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use IE PNG Fix'),
    '#default_value' => $settings['tapestry_iepngfix'],
  );

  return $form;
}


