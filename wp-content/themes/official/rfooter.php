
<?php if(!is_page( array('entry','entry_confirm','entry_error','entry_send'))) : ?>
<div id="fEntry">
  <div class="inner">
    <h2><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/top_entry.png" alt="エントリー　ENTRY"></h2>
    <div class="btn2"><a href="<?php echo home_url('/'); ?>recruit/entry/" class="btn02">エントリーフォーム</a></div>
  </div>
</div>
<?php endif; ?>

<div id="footer">
  <div class="logo"><img src="<?php echo get_template_directory_uri(); ?>/recruit/common/image/f_logo.png" alt="株式会社平野鐵工所"><p>〒714-1224　岡山県小田郡矢掛町本堀626-1<br>電話：0866-82-2813</p></div>
  <ul>
          <li><a href="<?php echo home_url('/'); ?>recruit/">TOP</a></li>
          <li><a href="<?php echo home_url('/'); ?>recruit/profile/">PROFILE</a></li>
          <li><a href="<?php echo home_url('/'); ?>recruit/voice/">VOICE</a></li>
          <li><a href="<?php echo home_url('/'); ?>recruit/requirements/">REQUIREMENTS</a></li>
          <li><a href="<?php echo home_url('/'); ?>recruit/entry/">ENTRY</a></li>
          <li><a href="<?php echo home_url('/'); ?>">CORPORATE SITE</a></li>
  </ul>
</div>

<div id="copy">
  <p>&copy; HIRANO IRON WORKS CO.,LTD.</p>
</div>
<?php wp_footer(); ?>
</body>
</html>
  