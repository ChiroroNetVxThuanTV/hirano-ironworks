<footer>
  <section>
    <ul>
      <li><a href="<?php echo home_url('/'); ?>about">事業概要</a></li>
      <li><a href="<?php echo home_url('/'); ?>company">会社情報</a>
        <ul>
          <li><a href="<?php echo home_url('/'); ?>company/profile">会社概要</a></li>
          <li><a href="<?php echo home_url('/'); ?>company/message">トップメッセージ</a></li>
          <li><a href="<?php echo home_url('/'); ?>company/philosophy">経営理念</a></li>
          <li><a href="<?php echo home_url('/'); ?>company/history">沿革</a></li>
          <li><a href="<?php echo home_url('/'); ?>company/access">アクセス</a></li>
        </ul>
      </li>
      <li><a href="<?php echo home_url('/'); ?>machine">設備機器</a></li>
      <li><a href="<?php echo home_url('/'); ?>work">施工実績</a></li>
      <li><a href="<?php echo home_url('/'); ?>news">新着情報</a></li>
    </ul>
    <div class="co_re">
      <div>
        <p>お問い合わせはこちらから</p>
        <a href="tel:0866822813" class="tel"><i class="fas fa-phone"></i> 0866-82-2813</a>
        <a href="<?php echo home_url('/'); ?>contact" class="mail"><i class="fas fa-envelope"></i> Contact</a>
      </div>
      <div>
        <p>採用情報特設サイトはこちら</p>
        <a href="<?php echo home_url('/'); ?>recruit" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/common/image/recruit.jpg" alt="RECRUIT"></a>
      </div>
    </div>
    <a href="<?php echo home_url('/'); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/common/image/logo_footer.png" alt="株式会社平野鐵工所"></a>
    <div class="pagetop"></div>
    <p class="add_copy">
      <span class="address">〒714-1224　岡山県小田郡矢掛町本堀626-1</span>
      <span class="copy">&copy;HIRANO IRON WORKS CO.,LTD.</span>
    </p>
  </section>
</footer>

<?php wp_footer(); ?>
</body>
</html>