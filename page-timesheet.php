<?php
get_header();
/* Template Name: timesheet */
?>

<div class='timesheet-page'>
  <div class='animate-header'>
    <div class='page-info'>
      <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
    </div>
    <div class='first'>
      <div class='container'>
        <div class='H1'><?php echo get_field('title'); ?></div>
        <div class='description body-1'><?php echo get_field('description'); ?></div>
      </div>
    </div>
  </div>

  <div class='animate-content'>
    <div class='second container'>
      <div class='video'>
        <iframe  src="https://www.youtube.com/embed/<?php echo get_field('youtube_video_id'); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
      <div class='document'>
        <iframe src='<?php echo get_field('document_url'); ?>' frameborder='0' allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>