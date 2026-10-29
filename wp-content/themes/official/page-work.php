<?php get_header(); ?>

<div id="second">

<div class="secondTitle">
    <h2>WORK<span>施工実績</span></h2>
    <img src="<?php echo get_template_directory_uri(); ?>/common/image/work-01.jpg">
    <ol class="pan">
      <li><a href="<?php echo home_url('/'); ?>">TOP</a>&ensp;&gt;&ensp;</li>
      <li>施工実績</li>
    </ol>
  </div>
  <p class="workLead">高い品質にこだわり抜いた先に<br class="sp">見えるもの</p>
  <div class="workList">
    <?php
      $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
      query_posts( 'post_type=works&posts_per_page=12&paged=' . $paged );
    ?>
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) :the_post(); ?>
    <div class="item">
      <a href="<?php echo get_permalink(); ?>">
        <figure>
          <?php $listimage = $cfs->get('work_mainphoto');
          $listimage = wp_get_attachment_image_src($listimage, 'worksthumb'); ?>
          <img src="<?php echo $listimage[0]; ?>">
        </figure>
        <h3><span><?php the_title(); ?></span></h3>
      </a>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
    <?php
      if (function_exists("pagination")):
        pagination($wp_query->max_num_pages);
      endif;
    ?>
    <?php wp_reset_query(); ?>
  </div>
  <div class="copy">
    <p><img src="<?php echo get_template_directory_uri(); ?>/common/image/copy_left.png" alt="copyright(c) HIRANO IRON WORKS CO.,LTD."></p>
  </div>
</div>

<?php get_footer(); ?>
