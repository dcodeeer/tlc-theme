<?php
get_header();
/* Template Name: academy */
?>
<div class='academy-page'>
  <div class='animate-header'>
    <div class='page-info'>
      <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
    </div>

    <div class='header'>
      <div class='container'>
        <img src='<?php echo get_field('logo'); ?>' />
        <div class='title H1'><?php echo get_field('title'); ?></div>
        <div class='description body-1'><?php echo get_field('description'); ?></div>
      </div>
    </div>
  </div>
  

  <div class='animate-content'>
    <div class='first container'>
      <div class='video'>
        <iframe src="https://www.youtube.com/embed/<?php echo get_field('youtube_video_id'); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
      <div class='bottom'>
        <a class='H3' href='<?php echo get_field('bottom_link'); ?>' target='_blank'><?php echo get_field('bottom_link'); ?></a>
        <div class='H3'><?php echo get_field('bottom_text'); ?></div>
      </div>
    </div>

    <div class='second'>
      <div class='container'>
        <div class='title H1'>All videos</div>

        <div class='list'>

        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $my_posts = get_posts(array(
          'numberposts' => 6,
          'offset'      => ($paged == 1) ? 0 : (6 * $paged) - 1,
          'category'    => 0,
          'orderby'     => 'date',
          'order'       => 'DESC',
          'include'     => array(),
          'exclude'     => array(),
          'meta_key'    => '',
          'meta_value'  => '',
          'post_type'   => 'post_academy',
          'suppress_filters' => true,
        ));

        global $post;

        foreach ($my_posts as $post) :
          setup_postdata( $post );?>

          <a class='block' href='<?php echo get_field('youtube_video_url'); ?>' target='_blank'>
            <div class='top'>
              <img src='<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>' />
              <div class='icon'><svg width="100" height="63" viewBox="0 0 100 63" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="100" height="63" rx="14" fill="#4D9FFF"/><path d="M40.3337 16.0068C40.9033 16.0418 41.4508 16.2105 41.916 16.4944L63.6959 29.8291C64.0992 30.0758 64.428 30.4015 64.6548 30.7791C64.8817 31.1567 65 31.5753 65 32C65 32.4247 64.8817 32.8433 64.6548 33.2209C64.428 33.5985 64.0992 33.9242 63.6959 34.1709L41.916 47.5056C41.4508 47.7895 40.9033 47.9582 40.3337 47.9932C39.764 48.0282 39.1941 47.9281 38.6864 47.7039C38.1787 47.4797 37.7528 47.14 37.4554 46.7221C37.1579 46.3042 37.0004 45.8242 37 45.3347V18.6653C37.0004 18.1758 37.1579 17.6958 37.4554 17.2779C37.7528 16.86 38.1787 16.5203 38.6864 16.2961C39.1941 16.0719 39.764 15.9718 40.3337 16.0068Z" fill="white"/></svg></div>
            </div>
            <div class='name H4'><?php the_title(); ?></div>
          </a>

          <?php
            endforeach;
            wp_reset_postdata();
          ?>
        </div>

        <div class='page-pagination'>
          <div class='wrapper'>
          <?php
          if ($paged != 1) { ?>
            <a href='<?php echo explode("?", $_SERVER['REQUEST_URI'])[0].'?paged='.($paged-1) ?>' class='item'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M14 6.5L9 12L14 17.5" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
          <?php } else { ?>
            <div class='item'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M14 6.5L9 12L14 17.5" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <?php }
            $total_pages = ceil(wp_count_posts('post_academy')->publish / 6);
            for ($i = 1; $i <= $total_pages; $i++) {
              if ($i == $paged) {?>
              <div class='item active'><?php echo $i ?></div>
              <?php } else {?>
              <a class='item' href='<?php echo explode("?", $_SERVER['REQUEST_URI'])[0].'?paged='.$i ?>'><?php echo $i ?></a>
              <?php }
            }
            if ($paged != $total_pages) {
            ?>
              <a href='<?php echo explode("?", $_SERVER['REQUEST_URI'])[0].'?paged='.($paged+1) ?>' class='item'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 17.5L15 12L10 6.5" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
            <?php } else {?>
              <div class='item'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 17.5L15 12L10 6.5" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <div class='third container'>
      <?php
        $args = array(
          'numberposts' => 3,
          'category'    => 0,
          'orderby'     => 'date',
          'order'       => 'DESC',
          'include'     => array(),
          'exclude'     => array(),
          'meta_key'    => '',
          'meta_value'  => '',
          'post_type'   => 'post',
          'suppress_filters' => true,
          'post_status' => 'publish',
        );
      
          $posts = get_posts($args);
          foreach ($posts as $post) :
            setup_postdata( $post );
      
        ?>
          <div class='article-card-component'>
            <img src='<?php the_post_thumbnail_url('min_thumbnail');?>' />
            <div class='content'>
              <div class='tag'><?php echo wp_get_post_categories(get_the_ID(), array('fields' => 'names'))[0]; ?></div>
              <a class='name H4' href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
              <div class='bottom body-3'>
                <div class='author'><?php the_author(); ?></div>
                <div class='right'>
                  <span><?php the_time('d/m/Y'); ?></span>
                  <span><?php the_time('g:i A'); ?></span>
                </div>
              </div>
            </div>
          </div>
        <?php
          endforeach;
          wp_reset_postdata();
        ?>
    </div>
  </div>

</div>
<?php get_footer(); ?>