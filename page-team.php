<?php get_header(); ?>

<?php /* Template Name: team */ ?>

<div class='team-page'>
  <div class='animate-header'>
    <div class='team-first'>
      <div class='page-info'>
        <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
      </div>

      <div class='container'>
        <div class='H1'><?php echo get_field('title') ?></div>
        <div class='body-1'><?php echo get_field('description') ?>​</div>
      </div>
    </div>
  </div>

  <div class='animate-content'>
    <div class='team-second container'>
    
      <div class='list' id='team-page-list'>
      <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $my_posts = get_posts(array(
          'numberposts' => 12,
          'offset'      => ($paged == 1) ? 0 : (12 * $paged) - 1,
          'category'    => 0,
          'orderby'     => 'date',
          'order'       => 'DESC',
          'include'     => array(),
          'exclude'     => array(),
          'meta_key'    => '',
          'meta_value'  => '',
          'post_type'   => 'team_post',
          'suppress_filters' => true,
        ));

        global $post;

        foreach ($my_posts as $post) {
          setup_postdata( $post );?>

        <div class='block'>
          <img src='<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>' />
          <div class='content'>
          <div class='H3'><?php the_title() ?></div>
          <div class='H5'><?php echo get_post_meta($post->ID, 'position', true); ?></div>
          <div class='more-details'>
          <span class='H5'>More details</span>
          <div class='icon'><svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.5 17.5L15.5 12L10.5 6.5" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          </div>
          </div>
          <div class='more-info' style='display: none;'>
          <div class='image'>
          <img src='<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>' />
          </div>
          <div class='right'>
          <div class='H2 blue'><?php the_title() ?></div>
          <div class='H5 blue'><?php echo get_post_meta($post->ID, 'position', true); ?></div>
          <p class='body-2'><?php the_content() ?></p>
          </div>
          <div class='close'><svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M10.8033 9.6967L21.4099 20.3033M21.4099 9.6967L10.8033 20.3033" stroke="#606C77" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g></svg></div>
          </div>
        </div>
        <?php }
        wp_reset_postdata();?>
      </div>

      <div class='page-pagination'>
        <div class='wrapper'>
        <?php
        if ($paged != 1) { ?>
          <a href='<?php echo explode("?", $_SERVER['REQUEST_URI'])[0].'?paged='.($paged-1) ?>' class='item'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M14 6.5L9 12L14 17.5" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        <?php } else { ?>
          <div class='item'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M14 6.5L9 12L14 17.5" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <?php }
          $total_pages = ceil(wp_count_posts('team_post')->publish / 12);
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

    <div class='third'>
      <?php echo do_shortcode('[work_us]'); ?>
    </div>
  </div>
  
</div>

<script>

const teamPageList = document.querySelector('#team-page-list');

const getNumber = (elem) => {
  const parent = elem.parentElement;
  const children = Array.from(parent.children);
  return children.indexOf(elem) + 1;
};

const closeBox = (e) => {
  e.currentTarget.parentElement.remove();
};

const openBox = (elem, index) => {
  const newElem = elem.querySelector('.more-info').cloneNode(true);
  const referenceElement = teamPageList.children[index];

  newElem.removeAttribute('style');
  newElem.classList.add('opened-box');

  const closeButton = newElem.querySelector('.close');
  closeButton.addEventListener('click', closeBox);

  teamPageList.insertBefore(newElem, referenceElement);
}

const blockListener = (e) => {
  const boxes = document.querySelectorAll('.opened-box');
  boxes.forEach(e => e.remove());
  
  const containerWidth = teamPageList.offsetWidth;
  const gap = 30;
  const minWidth = 280;

  let currentRowSize = 1;
  let currentRow = 1;

  if ((4 * minWidth) + (3 * gap) <= containerWidth) currentRowSize = 4;
  else if ((3 * minWidth) + (2 * gap) <= containerWidth) currentRowSize = 3;
  else if ((2 * minWidth) + (1 * gap) <= containerWidth) currentRowSize = 2;
  else currentRowSize = 1;

  const index = getNumber(e.currentTarget.parentElement.parentElement);
  
  if (index > currentRowSize) currentRow = Math.ceil(index/currentRowSize);

  const x = (currentRow * currentRowSize)-index;

  openBox(e.currentTarget.parentElement.parentElement, index+x);

  console.log(e.currentTarget.parentElement.parentElement.parentElement.children.length);

  console.log(x);
};

const blocks = document.querySelectorAll('.more-details');
blocks.forEach(e => e.addEventListener('click', blockListener));

</script>

<?php get_footer(); ?>