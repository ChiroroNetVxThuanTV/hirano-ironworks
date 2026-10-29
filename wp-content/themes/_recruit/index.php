<?php get_header(); ?>

<div id="index">
  <div class="01 main">
    <img src="<?php echo get_template_directory_uri(); ?>/common/image/index/mainImage.jpg" alt="">
  </div>
  <div class="02 concept">
    <img src="<?php echo get_template_directory_uri(); ?>/common/image/index/concept.jpg" alt="">
    <div class="bg-H"></div>
    <div class="text">
	    <h2>COMPANY PROFILE</h2>
 	  	<h3>会社紹介</h3>
      <p>当社は1957年の創業以来、<br class="sp">アイアンフレーム（鉄骨）の設計・施工ひと筋に歩み続けています。<br>「鉄とともに、生きる。暮らす。築いていく。」<br>私たちは未来を築く一因を担っていることに熱い誇りを持つ技術者集団です。<br>一緒に未来を創りませんか？</p>
      <a href="profile.html" class="more">More</a>
    </div>
  </div>
  <div class="03 voice">
    <h2>VOICE</h2>
    <h3>先輩の声</h3>
    <ul>
      <li><a href="voice_01.html"><img src="<?php echo get_template_directory_uri(); ?>/common/image/voice/1.png" alt=""></a></li>
      <li><a href="voice_02.html"><img src="<?php echo get_template_directory_uri(); ?>/common/image/voice/2.png" alt=""></a></li>
      <li><a href="voice_03.html"><img src="<?php echo get_template_directory_uri(); ?>/common/image/voice/3.png" alt=""></a></li>
      <li><a href="voice_04.html"><img src="<?php echo get_template_directory_uri(); ?>/common/image/voice/4.png" alt=""></a></li>
      <li><a href="voice_05.html"><img src="<?php echo get_template_directory_uri(); ?>/common/image/voice/5.png" alt=""></a></li>
      <li><a href="voice_06.html"><img src="<?php echo get_template_directory_uri(); ?>/common/image/voice/6.png" alt=""></a></li>
    </ul>
    <a href="voice.html" class="more">More</a>
  </div>
  <div class="04 recruit">
    <a href="new.html" class="new" style="display:none;">
      <div class="bg"></div>
      <h2>NEW GRADUATES</h2>
      <h3>新卒採用募集要項</h3>
    </a>
    <a href="career.html" class="career" style="width:100%">
      <div class="bg"></div>
      <h2>MID-CAREER</h2>
      <h3>中途採用募集要項</h3>
    </a>
  </div>
  <div class="05 entry">
    <img src="<?php echo get_template_directory_uri(); ?>/common/image/index/entry.jpg" alt="">
    <div>
	    <h2>ENTRY</h2>
	    <h3>エントリー</h3>
	    <a href="entry.html" class="more">ENTRY</a>
    </div>
  </div>
</div>


<?php get_footer(); ?>