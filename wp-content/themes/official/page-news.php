<?php get_header(); ?>

<div id="second">

<div class="secondTitle secondTitle01">
    <h2>NEWS<span>お知らせ</span></h2>
    <!-- <img src="<?php echo get_template_directory_uri(); ?>/common/image/news-01.jpg"> -->
    <ol class="pan">
      <li><a href="<?php echo home_url('/'); ?>">TOP</a>&ensp;&gt;&ensp;</li>
      <li>お知らせ</li>
    </ol>
  </div>
  <div class="newsList">
    <?php
        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        query_posts( 'post_type=post&posts_per_page=12&paged=' . $paged );
      ?>
      <?php if (have_posts()) : ?>
  <ul>
    <?php while (have_posts()) :the_post(); ?>
      <?php
            $categories = get_the_category();
            $cat_name = $categories[0]->cat_name;
            $cat_slug = $categories[0]->category_nicename;
      ?>
      <li id="post-<?php the_ID(); ?>">
      <a href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()): ?>
          <?php the_post_thumbnail('newsthumb'); ?>
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/common/image/noimage-01.png">
        <?php endif; ?>
        <div class="newsInfo">
          <div class="cat"><?php echo $cat_name; ?></div>
          <div class="date"><?php the_time('Y/m/d'); ?></div>
        </div>
        <p><?php the_title(); ?></p>
      </a>
    </li>
    <?php endwhile; ?>
  </ul>
  <?php endif; ?>
  
  <?php
        if (function_exists("pagination")):
          pagination();
        endif;
      ?>

    <?php wp_reset_query(); ?>
  
  </div>

  <div class="copy">
    <p><img src="<?php echo get_template_directory_uri(); ?>/common/image/copy_left.png" alt="copyright(c) HIRANO IRON WORKS CO.,LTD."></p>
  </div>
</div>

<?php get_footer(); ?>
