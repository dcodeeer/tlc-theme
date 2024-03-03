<?php get_header(); ?>
<div class='blog-article'>

  <div class='animate-header'>
    <div class='blog-article-first'>
      <div class='page-info'>
        <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
      </div>
      <img src='<?php the_post_thumbnail_url('full');?>' />
    </div>
  </div>
  <div class='animate-content'>
    <div class='blog-article-second container'>
      <div class='title H1'><?php the_title(); ?></div>
      <div class='description body-2'><?php the_content(); ?></div>
    </div>
    <div class='third'>
      <?php echo do_shortcode('[work_us]'); ?>
    </div>
  </div>

</div>

<?php get_footer(); ?>