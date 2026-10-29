<?php
/*
Template Name: 新着情報
*/
get_header(); ?>
      
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
          <li>新着情報一覧</li>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="newslist">
      <ul>
			<?php $paged = get_query_var('paged'); ?>
      <?php query_posts("posts_per_page=10&paged=$paged"); ?>
      <?php if(have_posts()): while(have_posts()):the_post(); ?>
        <li>
          <a href="<?php the_permalink(); ?>">
            <span><?php the_time('Y.m.d'); ?>&emsp;<?php the_title(); ?></span>
						<?php if( mb_strlen(get_the_excerpt(), 'UTF-8')>80 ) {
							  $excerpt= mb_substr(get_the_excerpt(), 0, 80);
							  echo $excerpt.'...';
							} else {
								echo get_the_excerpt();
							} ?>
          </a>
        </li>
      <?php endwhile; endif; ?>
      </ul>
    </div>
    <div class="pager">
      <?php if (function_exists("pagination")) {
        pagination($additional_loop->max_num_pages);
      } ?>
    </div>
  </section>
</div>

<?php get_footer(); ?>
