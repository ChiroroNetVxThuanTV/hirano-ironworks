<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title><?php single_post_title(); ?>｜<?php bloginfo('name'); ?></title>
<meta name="viewport" content="width=device-width">
<meta name="format-detection" content="telephone=no">
<?php if(is_page('recruit')): ?>
<link href="<?php echo get_template_directory_uri(); ?>/recruit/common/css/swiper-bundle.min.css" rel="stylesheet" type="text/css" media="all">
<?php endif; ?>
<link href="<?php echo get_template_directory_uri(); ?>/recruit/common/css/common.css?d=<?php echo date('YmdHis'); ?>" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo get_template_directory_uri(); ?>/recruit/common/css/page.css?d=<?php echo date('YmdHis'); ?>" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo get_template_directory_uri(); ?>/recruit/common/css/sp.css?d=<?php echo date('YmdHis'); ?>" rel="stylesheet" type="text/css" media="all">
<?php wp_enqueue_script('func', get_stylesheet_directory_uri() . '/recruit/common/js/function.js',array('jquery'), '1.0'); ?>
<?php if(is_page('recruit')): ?>
<?php wp_enqueue_script('swip', get_stylesheet_directory_uri() . '/recruit/common/js/swiper-bundle.min.js',array('func'), '1.0'); ?>
<?php wp_enqueue_script('topj', get_stylesheet_directory_uri() . '/recruit/common/js/top.js',array('swip'), '1.0'); ?>
<?php endif; ?>
<?php wp_head(); ?>
</head>

<div id="header">
  <header>
    <div class="wrap">
      <div class="spheader">
        <h1><a href="<?php echo home_url('/'); ?>recruit/"><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/logo.png" alt="平野鐵工所採用情報"></a></h1>
        <div class="menubt sp"> <span class="top"></span> <span class="middle"></span> <span class="bottom"></span>
          <div class="text-menu">メニュー</div>
        </div>
      </div>
      <nav>
        <ul>
          <li><a href="<?php echo home_url('/'); ?>recruit/profile/">PROFILE</a></li>
          <li><a href="<?php echo home_url('/'); ?>recruit/voice/">VOICE</a></li>
          <li><a href="<?php echo home_url('/'); ?>recruit/requirements/">REQUIREMENTS</a></li>
          <li><a href="<?php echo home_url('/'); ?>recruit/entry/">ENTRY</a></li>
          <li><a href="<?php echo home_url('/'); ?>">CORPORATE SITE</a></li>
        </ul>
      </nav>
    </div>
  </header>
</div>
