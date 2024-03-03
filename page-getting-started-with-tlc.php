<?php
  get_header();
  /* Template Name: getting-started-with-tlc */
?>
<div class='getting-started-with-tlc'>
  <div class='animate-header'>
    <div class='getting-started-with-tlc-first'>
      <div class='page-info'>
        <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
      </div>
    
    <img src='<?php the_post_thumbnail_url('full'); ?>' />
  </div>
  </div>
  <div class='animate-content'>
    <div class='getting-started-with-tlc-second container'>
      <div class='title H1'><?php echo get_field('first_title'); ?></div>
      <div class='description body-2'><?php echo get_field('first_description'); ?></div>
      <div class='mini-title H4'><?php echo get_field('first_bottom'); ?></div>
    </div>
    <div class='getting-started-with-tlc-third'>
      <div class='container'>

        <?php
          $items = get_field('second');
          for ($i = 0; $i < count($items); $i++) {
        ?>
        <div class='block'>
          <div class='top'>
            <div class='number H3'><?php echo $i+1; ?></div>
            <div class='title H5'><?php echo $items[$i]['title']; ?></div>
          </div>
          <p class='body-2'><?php echo $items[$i]['description']; ?></p>
          <div class='body-2'><?php echo $items[$i]['content']; ?></div>
        </div>
        <?php } ?>

      </div>
    </div>
    <div class='getting-started-with-tlc-fourth container'>
      <div class='content'>
        <div class='title H3 blue'><?php echo get_field('third_title'); ?></div>
        <div class='body-2'><?php echo wpautop(get_field('third_description')); ?></div>
      </div>
      <img src='<?php echo get_field('third_image'); ?>' />
    </div>
    <div class='getting-started-with-tlc-fifth'>
      <div class='container'>

        <?php
          $items = get_field('fourth');
          foreach ($items as $item):
        ?>
        <div class='block'>
          <div class='title H4'><?php echo $item['title']; ?></div>
          <div class='body-2'><?php echo $item['content']; ?></div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>
    <div class='sixth'>
      <?php echo do_shortcode('[work_us]'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>