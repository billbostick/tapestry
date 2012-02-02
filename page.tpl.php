<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>">
<!-- $Id: page.tpl.php 11 2008-02-21 13:24:51Z bill $ -->
<head>
  <title><?php print $head_title ?></title>
  <?php print $head ?>
  <?php print $styles ?>
  <?php print $scripts ?>
  <style type="text/css" media="print">@import "<?php print base_path() . path_to_theme() ?>/print.css";</style>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
<?php
	$sidebar_mode = theme_get_setting('tapestry_sidebarmode');
	if (!$sidebar_mode) {
		$sidebar_mode = 'center';
	}

	$outsidebar_loc = theme_get_setting('tapestry_outsidebar');
	if (!$outsidebar_loc) {
		$outsidebar_loc = 'left';
	}

 	$page_width = theme_get_setting('tapestry_fixedwidth');
	if (!$page_width) {
		$page_width = 900;
	}

	$sidebar_count = 0;
	if ($sidebar_left)
	{
		$sidebar_count++;
		$left_sidebar_width = theme_get_setting('tapestry_leftsidebarwidth');
		if (!$left_sidebar_width) {
			$left_sidebar_width = 200;
		}
	} else {
		$left_sidebar_width = 0;
	}

	if ($sidebar_right)
	{
		$sidebar_count++;
		$right_sidebar_width = theme_get_setting('tapestry_rightsidebarwidth');
		if (!$right_sidebar_width) {
			$right_sidebar_width = 200;
		}
	} else {
		$right_sidebar_width = 0;
	}

	if ($sidebar_outside)
	{
		$sidebar_count++;
		$outside_sidebar_width = theme_get_setting('tapestry_outsidebarwidth');
		if (!$outside_sidebar_width) {
			$outside_sidebar_width = 200;
		}
	} else {
		$outside_sidebar_width = 0;
	}

	$suckerfish_align = theme_get_setting('tapestry_suckerfishalign');
	if (!$suckerfish_align) {
		$suckerfish_align = 'right';
	}
	
	$main_content_side_margins = 10;
	$main_content_width = $page_width - $left_sidebar_width - $right_sidebar_width - $outside_sidebar_width - ($main_content_side_margins * 2);

	$inside_content_width = $page_width - $outside_sidebar_width;

	$drop_shadow_width = $page_width + 24;
	$round_container_width = $page_width - 38;
?>
	<style type="text/css">
		#banner, #container, #headercontainer, #header-region-container, #footer-region-container, #suckerfish-container { 
			width: <?php print $page_width ?>px;
		}
		#page-right, #round-right {
			width: <?php print $drop_shadow_width ?>px;
		}
        #sidebar-left {
			width: <?php print $left_sidebar_width ?>px;
		}

        #sidebar-right {
			width: <?php print $right_sidebar_width ?>px;
		}
        #sidebar-outside {
			width: <?php print $outside_sidebar_width ?>px;
		}
		#inside-content {
			width: <?php print $inside_content_width ?>px;
		}
		#mainContent { 
			width: <?php print $main_content_width ?>px;
			padding-left: <?php print $main_content_side_margins ?>px;
			padding-right: <?php print $main_content_side_margins ?>px;
		}
		#round-container { 
			width: <?php print $round_container_width ?>px;
		}
<?php if ($sidebar_mode == 'left') { ?>
        #sidebar-right {
			float: left;
		}
<?php } else if ($sidebar_mode == 'right') { ?>
        #sidebar-left {
			float: right;
		}
<?php } ?>
<?php if ($outsidebar_loc == 'right') { ?>
		#sidebar-outside {
			float: right;
			clear: right;
		}

		#inside-content {
			float: left;
		}
<?php } ?>
	</style>
<?php if ($suckerfish_align == 'left') { ?>
	<style type="text/css">
		#suckerfishmenu {
			float: left;
		}
	</style>
<?php } else if ($suckerfish_align == 'center') { ?>
	<style type="text/css">
		#suckerfish-container {
			display: table-cell;
		}
		#suckerfishmenu {
			margin: 0 auto;
			display: table;
			float: none;
		}
	</style>
<!--[if IE]>
	<style type="text/css">
		#suckerfish-container {
			display: block;
            text-align: center;
           }
		#suckerfishmenu {
        	display: inline;
            zoom: 1;
            float: none;
		}
	</style>
<![endif]-->
<?php } ?>

<?php if (theme_get_setting('tapestry_fontfamily')) { ?>
	<style type="text/css">
		body {
			font-family : <?php print theme_get_setting('tapestry_fontfamily') ?>;
		}
	</style>
<?php }  ?>

<?php if (theme_get_setting('tapestry_fontfamily') == 'Custom') { ?>
	<?php if (theme_get_setting('tapestry_customfont')) { ?>
		<style type="text/css">
			body {
				font-family : <?php print theme_get_setting('tapestry_customfont') ?>;
			}
		</style>
	<?php }  ?>
<?php }  ?>

<!--[if lte IE 6]>
<style type="text/css" media="all">@import "<?php print base_path() . path_to_theme() ?>/css/ie6.css";</style>
<![endif]-->

<?php if ($suckerfish) { ?>
<?php if (theme_get_setting('tapestry_suckerfishmenus')) { ?>
<!--[if lte IE 6]>
<script type="text/javascript" src="<?php print $GLOBALS['base_url']."/"; print $directory; ?>/js/suckerfish.js"></script>
<![endif]-->
<?php }  ?>
<?php } ?>

<?php $useicons = theme_get_setting('tapestry_useicons'); ?>
<?php if ($useicons) {
	if (isset($_COOKIE["tapestryicons"])) {
		$useicons = (($_COOKIE["tapestryicons"]) == "1");
	}
}
?>
<?php if ($useicons) { ?>
<style type="text/css" media="all">@import "<?php print base_path() . path_to_theme() ?>/css/icons.css";</style>
<?php if (theme_get_setting('tapestry_ie6icons')) { ?>
<!--[if lte IE 6]>
<style type="text/css" media="all">@import "<?php print base_path() . path_to_theme() ?>/css/icons-ie6.css";</style>
<![endif]-->
<?php }  ?>
<?php } ?>

<?php if (theme_get_setting('tapestry_iepngfix')) { ?>
<!--[if lte IE 6]>
<script type="text/javascript"> 
    $(document).ready(function(){ 
        $(document).pngFix(); 
    }); 
</script> 
<![endif]-->
<?php } ?>

<script type="text/javascript" src="<?php print $GLOBALS['base_url']."/"; print $directory; ?>/js/pickstyle.js"></script>
<script type="text/javascript" src="<?php print $GLOBALS['base_url']."/"; print $directory; ?>/js/pickicons.js"></script>

</head>

<body>
  <div id="leaderboard">
  <?php if ($leaderboard) { ?><?php print $leaderboard ?><?php } ?>
  </div>

  <div id="header">
   <div id="headercontainer" class="clear-block">
    <?php if ($logo) { ?>
      <div class="site-logo">
        <a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a>
      </div>
	<?php } ?>
    <?php print $search_box; ?>      
    <?php if ($site_name) { ?>
      <h1 class='site-name'><a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><?php print $site_name ?></a></h1>
    <?php } ?>
    <?php if ($site_slogan) { ?>
      <div class='site-slogan'><?php print $site_slogan ?></div>
	<?php } ?>
	<?php
		$headerregioncount = 0;
		if ($header_left) { $headerregioncount++; }
		if ($header_center) { $headerregioncount++; }
		if ($header_right) { $headerregioncount++; }
	?>
	<?php if ($headerregioncount): ?>
	<?php $headerregionwidth = 'width' . floor(99 / $headerregioncount); ?>
	<div class="clear-block" style="line-height:0;"></div>
	<div id="header-region-container" class="clear-block">
    <div id="header-region" class="clear-block">
		<?php if ($header_left): ?>
		<div id="header-left" class="<?php echo $headerregionwidth ?>"><?php print $header_left; ?></div>
		<?php endif; ?>
		<?php if ($header_center): ?>
		<?php if ($headerregioncount == 3) { ?>
		<div id="header-center" class="width34"><?php print $header_center; ?></div>
		<?php } else { ?>
		<div id="header-center" class="<?php echo $headerregionwidth ?>"><?php print $header_center; ?></div>
		<?php } ?>
		<?php endif; ?>
		<?php if ($header_right): ?>
		<div id="header-right" class="<?php echo $headerregionwidth ?>"><?php print $header_right; ?></div>
		<?php endif; ?>
	</div>
    <!-- /header-region -->
	</div>
	<!-- /header-region-container -->
	<?php endif; ?>


  <?php if ($suckerfish) { ?>
  <div class="clear-block" style="line-height:0;"></div>
  <div id="suckerfish-container"><div id="suckerfishmenu"><?php print $suckerfish ?></div></div>
  <?php } ?>
   </div>
  </div>
  <div id="header-bottom" class="clear-block"></div>
  
  
<div id="outer-container">
<div id="page-right">
<div id="page-left">

         <?php if ($banner): ?>
             <div id="banner">
               <?php print $banner; ?>
			 </div>
         <?php endif; ?>

  <div id="container">


      <?php if (theme_get_setting('tapestry_breadcrumb')): ?>
         <?php if ($breadcrumb): ?>
             <div id="breadcrumb">
               <?php print $breadcrumb; ?>
			 </div>
         <?php endif; ?>
      <?php endif; ?>

    <?php if ($primary_links): ?>
    <div id="primary"> <?php print theme('menu_tree', menu_tree('primary-links')); ?> </div>
    <?php endif; ?>
<div class="clear-block"></div>

<div id="inside-content">

  <?php
         $region1count = 0;
         if ($user1) { $region1count++; }
         if ($user2) { $region1count++; }
         if ($user3) { $region1count++; }
      ?>
  <?php if ($region1count): ?>
  <?php $region1width = 'width' . floor(99 / $region1count); ?>
  <div id="region1-container" class="clear-block">
    <div id="region1">
      <?php if ($user1): ?>
      <div id="user1" class="<?php echo $region1width ?>"><?php print $user1; ?></div>
      <?php endif; ?>
      <?php if ($user2): ?>
      <?php if ($region1count == 3) { ?>
      <div id="user2" class="width34"><?php print $user2; ?></div>
      <?php } else { ?>
      <div id="user2" class="<?php echo $region1width ?>"><?php print $user2; ?></div>
      <?php } ?>
      <?php endif; ?>
      <?php if ($user3): ?>
      <div id="user3" class="<?php echo $region1width ?>"><?php print $user3; ?></div>
      <?php endif; ?>
    </div>
    <!-- /region1 -->
  </div>
  <!-- /region1-container -->
  <?php endif; ?>
  <?php
         $region2count = 0;
         if ($user4) { $region2count++; }
         if ($user5) { $region2count++; }
         if ($user6) { $region2count++; }
      ?>
  <?php if ($region2count): ?>
  <?php $region2width = 'width' . floor(99 / $region2count); ?>
  <div id="region2-container" class="clear-block">
    <div id="region2">
      <?php if ($user4): ?>
      <div id="user4" class="<?php echo $region2width ?>"><?php print $user4; ?></div>
      <?php endif; ?>
      <?php if ($user5): ?>
      <?php if ($region2count == 3) { ?>
      <div id="user5" class="width34"><?php print $user5; ?></div>
      <?php } else { ?>
      <div id="user5" class="<?php echo $region2width ?>"><?php print $user5; ?></div>
      <?php } ?>
      <?php endif; ?>
      <?php if ($user6): ?>
      <div id="user6" class="<?php echo $region2width ?>"><?php print $user6; ?></div>
      <?php endif; ?>
    </div>
    <!-- /region2 -->
  </div>
  <!-- /region2-container -->
  <?php endif; ?>
  <?php
         $region3count = 0;
         if ($user7) { $region3count++; }
         if ($user8) { $region3count++; }
         if ($user9) { $region3count++; }
      ?>
  <?php if ($region3count): ?>
  <?php $region3width = 'width' . floor(99 / $region3count); ?>
  <div id="region3-container" class="clear-block">
    <div id="region3">
      <?php if ($user7): ?>
      <div id="user7" class="<?php echo $region3width ?>"><?php print $user7; ?></div>
      <?php endif; ?>
      <?php if ($user8): ?>
      <?php if ($region3count == 3) { ?>
      <div id="user8" class="width34"><?php print $user8; ?></div>
      <?php } else { ?>
      <div id="user8" class="<?php echo $region3width ?>"><?php print $user8; ?></div>
      <?php } ?>
      <?php endif; ?>
      <?php if ($user9): ?>
      <div id="user9" class="<?php echo $region3width ?>"><?php print $user9; ?></div>
      <?php endif; ?>
    </div>
    <!-- /region3 -->
  </div>
  <!-- /region3-container -->
  <?php endif; ?>
  <div class="clear-block">
	<?php
		$sidebar_mode = theme_get_setting('tapestry_sidebarmode'); 
		if ($sidebar_mode == 'right') {
			if ($sidebar_right) { ?><div id="sidebar-right"><?php print $sidebar_right ?></div><?php }
			if ($sidebar_left) { ?><div id="sidebar-left"><?php print $sidebar_left ?></div><?php }
		} else {
			if ($sidebar_left) { ?><div id="sidebar-left"><?php print $sidebar_left ?></div><?php }
			if ($sidebar_right) { ?><div id="sidebar-right"><?php print $sidebar_right ?></div><?php }
		}
	?>
  <div id="mainContent">
      <?php if ($mission) { ?><div id="mission"><?php print $mission ?></div><?php } ?>


<?php	$contenttopcountcount = 0;
		if ($content_top_left) { $contenttopcountcount++; }
		if ($content_top_right) { $contenttopcountcount++; }
		?>
<?php if ($contenttopcountcount ) { ?>
  <?php $contenttopwidth = 'width' . floor(99 / $contenttopcountcount); ?>
	<div id="content-top" class="clear-block">
	<?php if ($content_top_left) { ?><div id="content-top-left" class="<?php echo $contenttopwidth ?>"><?php print $content_top_left ?></div><?php } ?>
	<?php if ($content_top_right) { ?><div id="content-top-right" class="<?php echo $contenttopwidth ?>"><?php print $content_top_right ?></div><?php } ?>
	</div>
<?php } ?>

        <h1 class="title"><?php print $title ?></h1>
        <div class="tabs"><?php print $tabs ?></div>
        <?php print $help ?>
        <?php if ($show_messages) { print $messages; } ?>
        <?php print $content; ?>

<?php	$contentbottomcountcount = 0;
		if ($content_bottom_left) { $contentbottomcountcount++; }
		if ($content_bottom_right) { $contentbottomcountcount++; }
		?>
<?php if ($contentbottomcountcount ) { ?>
  <?php $contentbottomwidth = 'width' . floor(99 / $contentbottomcountcount); ?>
	<div id="content-bottom" class="clear-block">
	<?php if ($content_bottom_left) { ?><div id="content-bottom-left" class="<?php echo $contentbottomwidth ?>"><?php print $content_bottom_left ?></div><?php } ?>
	<?php if ($content_bottom_right) { ?><div id="content-bottom-right" class="<?php echo $contentbottomwidth ?>"><?php print $content_bottom_right ?></div><?php } ?>
	</div>
<?php } ?>

	<!-- end #mainContent --></div>
</div>


<?php
         $region4count = 0;
         if ($user10) { $region4count++; }
         if ($user11) { $region4count++; }
         if ($user12) { $region4count++; }
      ?>
<?php if ($region4count): ?>
<?php $region4width = 'width' . floor(99 / $region4count); ?>
<div id="region4-container" class="clear-block">
  <div id="region4">
    <?php if ($user10): ?>
    <div id="user10" class="<?php echo $region4width ?>"><?php print $user10; ?></div>
    <?php endif; ?>
    <?php if ($user11): ?>
    <?php if ($region4count == 3) { ?>
    <div id="user11" class="width34"><?php print $user11; ?></div>
    <?php } else { ?>
    <div id="user11" class="<?php echo $region4width ?>"><?php print $user11; ?></div>
    <?php } ?>
    <?php endif; ?>
    <?php if ($user12): ?>
    <div id="user12" class="<?php echo $region4width ?>"><?php print $user12; ?></div>
    <?php endif; ?>
  </div>
  <!-- /region4 -->
</div>
<!-- /region4-container -->
<?php endif; ?>

</div> <!-- /inside-content -->
<?php if ($sidebar_outside) { ?>
<div id="sidebar-outside"><?php print $sidebar_outside ?></div>
<?php } ?>
<div class="clear-block" style="clear: both;"></div>
<div class="page-bottom clear-block"></div>

<?php
         $region5count = 0;
         if ($user13) { $region5count++; }
         if ($user14) { $region5count++; }
         if ($user15) { $region5count++; }
      ?>
<?php if ($region5count): ?>
  <div id="mastfoot" class="clear-block">
<?php $region5width = 'width' . floor(99 / $region5count); ?>
<div id="region5-container" class="clear-block">
  <div id="region5">
    <?php if ($user13): ?>
    <div id="user13" class="<?php echo $region5width ?>"><?php print $user13; ?></div>
    <?php endif; ?>
    <?php if ($user14): ?>
    <?php if ($region5count == 3) { ?>
    <div id="user14" class="width34"><?php print $user14; ?></div>
    <?php } else { ?>
    <div id="user14" class="<?php echo $region5width ?>"><?php print $user14; ?></div>
    <?php } ?>
    <?php endif; ?>
    <?php if ($user15): ?>
    <div id="user15" class="<?php echo $region5width ?>"><?php print $user15; ?></div>
    <?php endif; ?>
  </div>
  <!-- /region5 -->
</div>
<!-- /region5-container -->
  </div>
  <div id="mastfoot-bottom" class="clear-block"></div>
<?php endif; ?>

  <div id="trailerboard">
  <div id="footer">
 <?php
    $footerregioncount = 0;
    if ($footer_left) { $footerregioncount++; }
    if ($footer_center) { $footerregioncount++; }
    if ($footer_right) { $footerregioncount++; }
?>
        <?php if ($footerregioncount): ?>
        <?php $footerregionwidth = 'width' . floor(99 / $footerregioncount); ?>
        <div id="footer-region-container" class="clear-block">
    <div id="footer-region" class="clear-block">
                <?php if ($footer_left): ?>
                <div id="footer-left" class="<?php echo $footerregionwidth ?>"><?php print $footer_left; ?></div>
                <?php endif; ?>
                <?php if ($footer_center): ?>
                <?php if ($footerregioncount == 3) { ?>
                <div id="footer-center" class="width34"><?php print $footer_center; ?></div>
                <?php } else { ?>
                <div id="footer-center" class="<?php echo $footerregionwidth ?>"><?php print $footer_center; ?></div>
                <?php } ?>
                <?php endif; ?>
                <?php if ($footer_right): ?>
                <div id="footer-right" class="<?php echo $footerregionwidth ?>"><?php print $footer_right; ?></div>
                <?php endif; ?>
        </div>
    <!-- /footer-region -->
        </div>
        <!-- /footer-region-container -->
        <?php endif; ?>
  <?php if ($footer_message) { ?><div id="footer-message"><?php print $footer_message ?></div><?php } ?>
  <!-- end #footer --></div>
<?php
  $style = theme_get_setting('tapestry_style');
  if (!$style)
  {
     $style = 'gerberdaisy';
  }
  if (isset($_COOKIE["tapestrystyle"])) {
    $style = $_COOKIE["tapestrystyle"];
  }
  $logoPath = base_path() . path_to_theme() . '/images/' . $style . '/roopletheme.png';
  $logoRolloverPath = base_path() . path_to_theme() . '/images/' . $style . '/roopletheme-rollover.png'; 
?>
<script type="text/javascript">
<!-- Hide Script
	function move_in(img_name,img_src) {
	document[img_name].src=img_src;
	}

	function move_out(img_name,img_src) {
	document[img_name].src=img_src;
	}
//End Hide Script-->
</script>
<a href="http://www.roopletheme.com" onmouseover="move_in('rtlogo','<?php print $logoRolloverPath ?>')" onmouseout="move_out('rtlogo','<?php print $logoPath ?>')" title="RoopleTheme!" target="_blank"><img class="rtlogo" src="<?php print $logoPath ?>" name="rtlogo" alt="RoopleTheme"/></a>
  </div>

<!-- end #container --></div>
</div></div>

<div id="round-right">
<div id="round-left">
<div id="round-container">
</div></div></div>

</div>

<?php print $closure ?>
</body>
</html>
