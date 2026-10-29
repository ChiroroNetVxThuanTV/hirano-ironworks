<?php get_header(); ?>

<div id="second">
<div class="secondTitle">
    <h2>WORK<span>施工実績</span></h2>
    <img src="<?php echo get_template_directory_uri(); ?>/common/image/work-01.jpg">
    <ol class="pan">
      <li><a href="<?php echo home_url('/'); ?>">TOP</a>&ensp;&gt;&ensp;</li>
      <li><a href="<?php echo home_url('/'); ?>work/">施工実績</a>&ensp;&gt;&ensp;</li>
      <li>施工実績 詳細</li>
    </ol>
  </div>

  <?php if (have_posts()) : ?>
  <?php while (have_posts()) :the_post(); ?>
  <div class="workDetail">
    <h3><?php the_title(); ?></h3>
    <div class="info">
      <div class="text">
        <p class="date">DATE/<?php echo $cfs->get('works_date'); ?></p>
        <dl>
          <dt>構造</dt>
          <dd><?php echo $cfs->get('works_kouzou'); ?></dd>
          <dt>工事現場</dt>
          <dd><?php echo $cfs->get('works_place'); ?></dd>
          <dt>屯数</dt>
          <dd><?php echo $cfs->get('works_ton'); ?></dd>
        </dl>
      </div>
      <div class="photo"><?php $listimage = $cfs->get('work_mainphoto');
          $listimage = wp_get_attachment_image_src($listimage, 'worksthumb'); ?>
          <img src="<?php echo $listimage[0]; ?>"></div>
    </div>
    
    <?php $fields = $cfs->get('work_loop'); ?>
    <?php if ($fields): ?>
    <ul class="workPhoto">
      <?php foreach((array) $fields as $field): ?>
      <?php $worksphoto = $field['works_photo'];
      $worksimage = wp_get_attachment_image_src($worksphoto, 'worksphotos'); ?>
      <li><img src="<?php echo $worksimage[0]; ?>"></li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <div class="btn"><a href="<?php echo home_url('/'); ?>work/">一覧にもどる</a></div>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>

  <div class="copy">
    <p><img src="<?php echo get_template_directory_uri(); ?>/common/image/copy_left.png" alt="copyright(c) HIRANO IRON WORKS CO.,LTD."></p>
  </div>
</div>

<?php get_footer(); ?>
