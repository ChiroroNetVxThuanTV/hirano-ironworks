<?php
  /*
    Template Name: 採用情報
  */
?>

<?php get_template_part('rheader'); ?>

<?php if(is_page('recruit')): ?>

<div id="slide">
  <h2><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/title.png" alt="採用情報"></h2>
  <p>私たちが築いていく未来がある</p>
</div>

<div id="tProfile">
  <div class="inner">
    <h2><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/top_profile.png" alt="会社紹介　PROFILE"></h2>
    <div class="waku">
      <div>
        <p>当社は1957年の創業以来、アイアンフレーム（鉄骨）の設計・施工ひと筋に歩み続けています。<br>「鉄とともに、生きる。暮らす。築いていく。」<br>
        私たちは、未来を築く一因を担っていることに熱い誇りを持っています。<br>一緒に未来を創りませんか？</p>
        <div class="btn"><a href="<?php echo home_url('/'); ?>recruit/profile/" class="btn01">MORE</a></div>
      </div>
      <div class="photo"><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/top-01.png"></div>
    </div>
    <h2 class="job"><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/top_job.png" alt="私たちの仕事　ABOUT JOB"></h2>
    <div class="tJob">
      <div class="item">
        <a href="<?php echo home_url('/'); ?>recruit/profile/#job01">
        <div class="photo aka"><h3>製造部</h3></div>
        <div class="text"><p>設計図に基づいて、切断・孔あけ・溶接などを行います。溶接ロボットなどの機械を駆使して、作業工程を進めます。</p></div>
        </a>
      </div>
      <div class="item">
        <a href="<?php echo home_url('/'); ?>recruit/profile/#job02">
        <div class="photo ao"><h3>生産管理部</h3></div>
        <div class="text"><p>鋼材や資材の調達から製品輸送、製品塗装や現地に赴いて鉄骨工事の手配から管理のほか、業務に応じてお客様との打ち合わせが主な業務です。</p>
        </div>
        </a>
      </div>
      <div class="item">
        <a href="<?php echo home_url('/'); ?>recruit/profile/#job03">
        <div class="photo ao"><h3>設計部</h3></div>
        <div class="text"><p>加工する鉄骨、鋼材の工作図作成、部品の発注、製品リストの作成や、業務に必要なお客様との打ち合わせが主な業務です。 </p>
        </div>
        </a>
      </div>
      <div class="item">
        <a href="<?php echo home_url('/'); ?>recruit/profile/#job04">
        <div class="photo aka"><h3>品質管理部</h3></div>
        <div class="text"><p>加工中、加工後の製品寸法検査や溶接外観検査、非破壊検査を行い、諸検査の記録をとるほか、お客様検査に同行し、製品の品質保証を行うことが主業務です。 </p>
        </div>
        </a>
      </div>
      <div class="item">
        <a href="<?php echo home_url('/'); ?>recruit/profile/#job05">
        <div class="photo aka"><h3>技術研究室</h3></div>
        <div class="text"><p>従来の図面作成、切断や孔あけ、溶接、検査など製造に関わる工程を、生産効率の向上と併せて進化させ、新たな製造技術を追求していく部署です。</p>
        </div>
        </a>
      </div>
    </div>
  </div>
</div>

<div id="tVoice">
  <div class="inner">
    <h2><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/top_voice.png" alt="先輩の声　VOICE"></h2>
    <div class="card02">
    <div class="swiper">
      <div class="swiper-wrapper">
        <a href="<?php echo home_url('/'); ?>recruit/voice-01/" class="swiper-slide">
          <article class="slide">
            <div class="slide-media img-cover"><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/voice-01.png"></div>
          </article>
        </a>
        <a href="<?php echo home_url('/'); ?>recruit/voice-02/" class="swiper-slide">
          <article class="slide">
            <div class="slide-media img-cover"><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/voice-02.png"></div>
          </article>
        </a>
        <a href="<?php echo home_url('/'); ?>recruit/voice-03/" class="swiper-slide">
          <article class="slide">
            <div class="slide-media img-cover"><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/voice-03.png"></div>
          </article>
        </a>
        <a href="<?php echo home_url('/'); ?>recruit/voice-04/" class="swiper-slide">
          <article class="slide">
            <div class="slide-media img-cover"><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/voice-04.png"></div>
          </article>
        </a>
        <a href="<?php echo home_url('/'); ?>recruit/voice-05/" class="swiper-slide">
          <article class="slide">
            <div class="slide-media img-cover"><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/voice-05.png"></div>
          </article>
        </a>
        <a href="<?php echo home_url('/'); ?>recruit/voice-06/" class="swiper-slide">
          <article class="slide">
            <div class="slide-media img-cover"><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/voice-06.png"></div>
          </article>
        </a>
      </div>
      <div class="swiper-controller">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
      </div>
    </div>
  </div>
</div>

<div id="req">
  <div class="inner">
    <h2><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/top_req.png" alt="募集要項"></h2>
    <div class="btns">
    <ul>
      <li><a href="<?php echo home_url('/'); ?>recruit/requirements/#new"><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/btn_new.png"alt="新卒採用"></a></li>
      <li><a href="<?php echo home_url('/'); ?>recruit/requirements/#mid"><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/btn_career.png" alt="中途採用"></a></li>
    </ul>
    </div>
  </div>
</div>

<?php else: ?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
<?php endif; ?>

<?php endif; ?>

<?php get_template_part('rfooter'); ?>

