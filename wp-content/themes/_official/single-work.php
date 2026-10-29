<?php get_header(); ?>

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
	        <li><a href="<?php echo home_url('/'); ?>work">施工実績一覧</a></li>
          <li><?php the_title(); ?></li>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="workdetail">
      <div class="dlwrap">
        <dl>
          <dt>設備名</dt>
          <dd class="name">
            <p><?php echo the_title(); ?><span>DATE/<?php echo date( 'Y.m.d', strtotime( CFS()->get( 'date' ) ) ); ?></span></p>
          </dd>
        </dl>
        <dl>
          <dt>構造</dt>
          <dd><?php echo CFS()->get( 'type' ); ?></dd>
        </dl>
        <dl>
          <dt>工事現場</dt>
          <dd><?php echo CFS()->get( 'place' ); ?></dd>
        </dl>
        <dl>
          <dt>屯数</dt>
          <dd><?php echo CFS()->get( 'area' ); ?></dd>
        </dl>
      </div>
      <img src="<?php echo CFS()->get( 'image' ); ?>">
    </div>
    <div class="pic">
      <ul>
      <?php $gallery = CFS()->get('gallery');
			foreach ($gallery as $images) { ?>
				<li><img src="<?php echo $images['gallery_image']; ?>"></li>
			<?php }	?>
      </ul>
    </div>
    <a href="../" class="more">一覧に戻る</a>
  </section>
</div>


  
  
<?php get_footer(); ?>
