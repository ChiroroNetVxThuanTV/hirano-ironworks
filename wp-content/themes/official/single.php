<?php get_header(); ?>

<div id="second">

    <div class="secondTitle secondTitle01">
    <h2>NEWS<span>お知らせ</span></h2>
    <!-- <img src="<?php echo get_template_directory_uri(); ?>/common/image/news-01.jpg"> -->
    <?php bredcrumb(); ?>
  </div>

  <?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <?php
            $categories = get_the_category();
            $cat_name = $categories[0]->cat_name;
            $cat_slug = $categories[0]->category_nicename;
      ?>
  <div class="newsDetail">
    <div class="inner">
      <h3><?php the_title(); ?></h3>
      <p class="date"><?php the_time('Y/m/d'); ?><span class="cat"><?php echo $cat_name; ?></span></p>
      <div class="clear">
        <?php the_content(); ?>
      </div>
    </div>
    <div class="btn"><a href="<?php echo home_url('/'); ?>news/">一覧にもどる</a></div>
  </div>
    <?php endwhile; ?>
<?php endif; ?>

  <div class="copy">
    <p><img src="<?php echo get_template_directory_uri(); ?>/common/image/copy_left.png" alt="copyright(c) HIRANO IRON WORKS CO.,LTD."></p>
  </div>
</div>

<?php get_footer(); ?>
