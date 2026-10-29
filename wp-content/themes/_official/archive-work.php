<?php
/*
Template Name: 施工実績
*/
get_header(); ?>
      
<div id="work">
  <section class="main">
    <img src="<?php echo get_template_directory_uri(); ?>/common/image/mainImage_work.jpg" alt="" class="mainImage">
    <div>
      <div class="title">
        <h1>WORK<span>施工実績</span></h1>
        <p>高い品質にこだわり抜いた先に見えるもの</p>
      </div>
      <div class="pan">
        <ul>
	        <li><a href="<?php echo home_url('/'); ?>">TOP</a></li>
          <li>施工実績一覧</li>
        </ul>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="worklist">
      <ul>
      <?php if(is_archive()) : query_posts($query_string.'&order=DESC&orderby=meta_value&meta_key=date'); endif ?>
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><div><img src="<?php echo CFS()->get( 'image' ); ?>"></div><span><?php echo the_title(); ?></span></a></li>
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

