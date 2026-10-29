<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="Description" content="平野鐵工所は、確かな技術と創意工夫を兼ね備えたアイアンフレーム（鉄骨）の設計施工会社です。「鉄とともに、生きる。暮らす。築いていく。」">
<meta name="Keywords" content="平野鐵工所,岡山県,矢掛町,鉄骨,鉄骨施工,鐵工所,鉄工所">
<title>
  <?php if ( !is_home() && !is_front_page() && !is_archive('work') ) {
		echo get_the_title( $ID ); ?>｜
	<?php	} else if ( is_archive('work') ) { ?>
		施工実績｜
	<?php } ?>
    株式会社平野鐵工所
</title>
<meta name="viewport" content="width=device-width">
<meta name="format-detection" content="telephone=no">
<link href="<?php echo get_template_directory_uri(); ?>/common/css/common.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/common/css/page.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/common/css/second.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/common/css/slick.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/common/css/slick-theme.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo get_template_directory_uri(); ?>/common/css/jquery.jaticker_1.0.0.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/common/js/jquery.jaticker_1.0.0.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/common/js/slick.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/common/js/function.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif+JP:500">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Libre+Baskerville:500&text=abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
<link href="<?php echo get_template_directory_uri(); ?>/common/image/favicon.ico" rel="shortcut icon">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135642494-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135642494-1');
</script>
<?php wp_head(); ?>
</head>
<body>
<header>
  <a href="<?php echo home_url('/'); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/common/image/logo.png" alt="平野鐵工所"></a>
  <nav>
    <ul>
      <li><a href="<?php echo home_url('/'); ?>about">About</a></li>
      <li><a href="<?php echo home_url('/'); ?>company">Company</a></li>
      <li><a href="<?php echo home_url('/'); ?>machine">Machine</a></li>
      <li><a href="<?php echo home_url('/'); ?>work">Work</a></li>
      <li><a href="<?php echo home_url('/'); ?>recruit" target="_blank">Recruit</a></li>
      <li><a href="<?php echo home_url('/'); ?>contact"><i class="fas fa-envelope"></i> Contact</a></li>
    </ul>
  </nav>
  <div class="menubtn">
    <span class="top"></span>
    <span class="middle"></span>
    <span class="bottom"></span>
  </div>
</header>
