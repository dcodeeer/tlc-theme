<?php get_header(); ?>

<?php /* Template Name: leap */ ?>

<div class='leap-page'>

  <div class='animate-header'>
    <div class='leap-first'>
      <div class='page-info'>
        <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
      </div>
      <div class='container'>
        <div class='title H1'><?php echo get_field('first_section_title'); ?></div>
        <div class='description body-1'><?php echo get_field('first_section_description'); ?></div>
      </div>
    </div>
  </div>
  
  <div class='animate-content'>

    <div class='leap-second container'>
      <div class='block'>
        <div class='top'>
          <div class='number H4'>1</div>
          <div class='description body-2'><?php echo get_field('second_section_1')['description']; ?></div>
        </div>
        <div class='bottom'>
          <div class='segment'><img src='<?php echo get_field('second_section_1')['screenshot']; ?>' /></div>
        </div>
      </div>

      <div class='block'>
        <div class='top'>
          <div class='number H4'>2</div>
          <div class='description body-2'><?php echo get_field('second_section_2')['description']; ?></div>
        </div>
        <div class='bottom'>
          <div class='segment'><img src='<?php echo get_field('second_section_2')['screenshot']; ?>' /></div>
          <div class='segment'><img src='<?php echo get_field('second_section_2')['screenshot_2']; ?>' /></div>
        </div>
      </div>

      <div class='block'>
        <div class='top'>
          <div class='number H4'>3</div>
          <div class='description body-2'><?php echo get_field('second_section_3')['description']; ?></div>
        </div>
        <div class='bottom'>
          <div class='segment'><img src='<?php echo get_field('second_section_3')['screenshot']; ?>' /></div>
        </div>
      </div>

      <div class='block'>
        <div class='top'>
          <div class='number H4'>4</div>
          <div class='description body-2'><?php echo get_field('second_section_4')['description']; ?></div>
        </div>
        <div class='bottom'>
          <div class='segment'><img src='<?php echo get_field('second_section_4')['screenshot']; ?>' /></div>
        </div>
      </div>
    </div>

    <div class='third'>
      <?php echo do_shortcode('[work_us]'); ?>
    </div>
  </div>

</div>

<?php get_footer(); ?>