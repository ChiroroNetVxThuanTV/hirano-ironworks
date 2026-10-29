<?php get_header(); ?>
	<?php
//  $myPostID=$_GET['myPost'];
//  $myPost=get_post($myPostID);
  ?>

<div id="news">
  <section class="main">
    <img src="<?php echo get_template_directory_uri(); ?>/common/image/mainImage_news.jpg" alt="" class="mainImage">
    <div>
      <div class="title">
        <h1>NEWS<span>新着情報</span></h1>
      </div>
      <div class="pan">
        <ul>
	        <li><a href="<?php echo home_url('/'); ?>">TOP</a></li>
	        <li><a href="../news">新着情報一覧</a></li>
          <li><?php the_title(); ?></li>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="newsdetail">
      <div class="box">
      <?php if(have_posts()): ?>
      <?php while(have_posts()): the_post(); ?>
        <p class="title"><?php the_title(); ?><span><?php the_time('Y.m.d'); ?></span></p>
        <p><?php the_content(); ?></p>
      <?php endwhile; ?>
      <?php endif; ?>
      </div>
      <a href="../news" class="more">一覧に戻る</a>
    </div>
  </section>
</div>


<?php get_footer(); ?>
