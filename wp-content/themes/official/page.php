<?php get_header(); ?>

<div id="second">

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
<?php endif; ?>

  <div class="copy">
    <p><img src="<?php echo get_template_directory_uri(); ?>/common/image/copy_left.png" alt="copyright(c) HIRANO IRON WORKS CO.,LTD."></p>
  </div>
</div>

<?php get_footer(); ?>
