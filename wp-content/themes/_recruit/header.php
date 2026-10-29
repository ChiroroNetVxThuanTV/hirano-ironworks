<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="Description" content="">
<meta name="Keywords" content="">
<title><?php if ( !is_home() && !is_front_page() ) : ?><?php echo get_the_title( $ID ); ?>｜<?php endif; ?>採用情報特設サイト - 株式会社平野鐵工所</title>
<meta name="viewport" content="width=device-width">
<meta name="format-detection" content="telephone=no">
<link href="<?php echo get_template_directory_uri(); ?>/common/css/import.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/common/js/slick.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/common/js/function.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
<link href="<?php echo get_template_directory_uri(); ?>/common/image/favicon.ico" rel="shortcut icon">
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<?php wp_head(); ?>
</head>
<body>
<header>
  <a href="<?php echo home_url('/'); ?>recruit" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/common/image/logo.png" alt="株式会社平野鐵工所"></a>
  <a href="<?php echo home_url('/'); ?>recruit/entry" class="entry">ENTRY</a>
  <div class="menubtn">
    <span class="top"></span>
    <span class="middle"></span>
    <span class="bottom"></span>
  </div>
  <nav>
    <ul>
      <li><a href="<?php echo home_url('/'); ?>recruit"><span>HOME</span> - ホーム</a></li>
      <li><a href="<?php echo home_url('/'); ?>recruit/profile"><span>PROFILE</span> - 会社紹介</a></li>
      <li><a href="<?php echo home_url('/'); ?>recruit/voice"><span>VOICE</span> - 先輩の声</a></li>
      <li><a href="https://job.mynavi.jp/20/pc/search/corp238063/outline.html" target="_blank"><span>NEW GRADUATES</span> - 新卒採用</a></li>
      <li><a href="<?php echo home_url('/'); ?>recruit/career"><span>MID-CAREER</span> - 中途採用</a></li>
      <li><a href="<?php echo home_url('/'); ?>recruit/entry"><span>ENTRY</span> - エントリー</a></li>
      <a href="<?php echo home_url('/'); ?>" class="link-co"><img src="http://www.hirano-ironworks.co.jp/wp-content/themes/official/common/image/logo.png" alt="株式会社平野鐵工所">CORPORATE</a>
      <a href="https://job.mynavi.jp/20/pc/search/corp238063/outline.html" target="_blank" class="link-co"><img src="https://job.mynavi.jp/conts/kigyo/2020/logo/banner_entry_160_45.gif" alt="新卒採用"></a>
    </ul>
  </nav>
</header>
