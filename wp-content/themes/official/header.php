<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<?php if(is_home()): ?>
<title><?php bloginfo('name'); ?></title>
<?php elseif(is_404()): ?>
<title>Not found</title>
<?php elseif($post->post_parent):
  $parent_id = get_most_parent_pageID();
  $parent_post = get_post($parent_id);
  $parent_slug = $parent_post->post_name; ?>
  <?php if($parent_slug == 'course'): ?>
    <?php
     $parent_idnext = $post->post_parent;
     $parent_title = get_post($parent_idnext)->post_title;
    ?>
    <title><?php echo $parent_title; ?>－<?php single_post_title(); ?>｜<?php bloginfo('name'); ?></title>
  <?php endif; ?>
<?php else: ?>
<title><?php single_post_title(); ?>｜<?php bloginfo('name'); ?></title>
<?php endif; ?>
<meta name="viewport" content="width=device-width">
<meta name="format-detection" content="telephone=no">
<link href="<?php echo get_template_directory_uri(); ?>/common/css/common.css?d=<?php echo date('YmdHis'); ?>" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo get_template_directory_uri(); ?>/common/css/page.css?d=<?php echo date('YmdHis'); ?>" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo get_template_directory_uri(); ?>/common/css/sp.css?d=<?php echo date('YmdHis'); ?>" rel="stylesheet" type="text/css" media="all">
<?php wp_enqueue_script('func', get_stylesheet_directory_uri() . '/common/js/function.js',array('jquery'), '1.0'); ?>
<?php if(is_home()): ?>
<?php wp_enqueue_script('bxsl', get_stylesheet_directory_uri() . '/common/js/jquery.bxslider.js',array('func'), '1.0'); ?>
<?php wp_enqueue_script('topj', get_stylesheet_directory_uri() . '/common/js/top.js',array('bxsl'), '1.0'); ?>
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body id="ptop">
<div id="header">
<header>
  <div class="inner">
    <div class="spheader">
    <h1><a href="<?php echo home_url('/'); ?>">株式会社平野鐵工所</a></h1>
    <div class="menubt sp">
     <span class="top"></span>
     <span class="middle"></span>
     <span class="bottom"></span>
     <div class="text-menu">メニュー</div>
    </div>
    </div>
    <nav>
    <ul>
      <li><a href="<?php echo home_url('/'); ?>about/">事業概要</a></li>
      <li><a href="<?php echo home_url('/'); ?>company/">会社情報</a></li>
      <li><a href="<?php echo home_url('/'); ?>machine/">設備機器</a></li>
      <li><a href="<?php echo home_url('/'); ?>work/">施工実績</a></li>
      <li><a href="<?php echo home_url('/'); ?>tech/">技報</a></li>
      <li><a href="<?php echo home_url('/'); ?>news/">ニュース</a></li>
      <li><a href="<?php echo home_url('/'); ?>recruit/">採用情報</a></li>
      <li><a href="<?php echo home_url('/'); ?>contact/">お問い合わせ</a></li>
    </ul>
    </nav>
  </div>
</header>
</div>

