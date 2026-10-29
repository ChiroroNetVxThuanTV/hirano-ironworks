<?php get_header(); ?>

<div id="second">

<div class="secondTitle">
    <h2>TECHNICAL <br class="sp">REPORT<span>技報</span></h2>
    <img src="<?php echo get_template_directory_uri(); ?>/common/image/tech-01.jpg">
    <ol class="pan">
      <li><a href="<?php echo home_url('/'); ?>">TOP</a>&ensp;&gt;&ensp;</li>
      <li>技報</li>
    </ol>
  </div>

  <div class="techList">
    <?php
      $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
      query_posts( 'post_type=techs&posts_per_page=-1&paged=' . $paged );
    ?>
    <?php if (have_posts()) : ?>
    <p>平野鐵工所の技報をPDFでご覧いただけます。</p>
    <?php while (have_posts()) :the_post(); ?>
    <div>
      <?php $filename = $cfs->get('tech_file'); ?>
      <h3><a href="<?php echo $filename; ?>" target="_blank" rel="noopener noreferrer"><?php the_title(); ?></a></h3>
        <?php the_content(); ?>
      <p class="date">公開日：<?php echo date('Y/m/d', strtotime($cfs->get('tech_date'))); ?></p>
    </div>
    <?php endwhile; ?>
    <?php else: ?>
      <p>準備中です。</p>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
  </div>
  <div class="copy">
    <p><img src="<?php echo get_template_directory_uri(); ?>/common/image/copy_left.png" alt="copyright(c) HIRANO IRON WORKS CO.,LTD."></p>
  </div>
</div>

<?php get_footer(); ?>
