<?php
  get_header();
  /* Template Name: cna-lna-licensing */
?>

<div class='cna-lna-licensing-page'>
  <div class='page-info'>
    <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
  </div>
  <div class='first'>
    <div class='container H1'><?php echo get_field('first_title'); ?></div>
  </div>
  <div class='second container'>
    <div class='H3'><?php echo get_field('second_title'); ?></div>
    <p class='body-1'><?php echo get_field('second_content'); ?></p>
    <div class='H4'><?php echo get_field('second_subtitle'); ?></div>
    <div class='border'></div>
    <div class='letters'>
      <?php
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        foreach (str_split($alphabet) as $letter):
        ?>
        <a href='<?php echo strtok($_SERVER['REQUEST_URI'], '?') . '?query=' . $letter; ?>'><?php echo $letter; ?></a>
        <?php endforeach; ?>
    </div>
    <div class='list' id='list'>

      <?php
      $search_query = '';

      if (isset($_GET['query']) && !empty($_GET['query'])) {
        $search_query = sanitize_text_field($_GET['query']);
      }

      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
        'numberposts' => 9,
        'offset'      => ($paged == 1) ? 0 : (12 * $paged) - 1,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'include'     => array(),
        'exclude'     => array(),
        'post_type'   => 'licensing_states',
        'starts_with' => $search_query
      );
      $query = new WP_Query( $args );
      if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
        ?>

      <div class='block'>
        <img src='<?php the_post_thumbnail_url('min_thumbnail');?>' />
        <div class='content'>
          <div class='H4'><?php the_title(); ?></div>
          <div class='body-2'><?php echo get_field('description'); ?></div>
          <div class='open-details H5'>
            <span>More details</span>
            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.5 17.5L15.5 12L10.5 6.5" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
        </div>
        <div class='details' style='display: none;'>
          <div class='close'><svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M10.8033 9.6967L21.4099 20.3033M21.4099 9.6967L10.8033 20.3033" stroke="#606C77" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g></svg></div>
          <div class='H2'><?php the_title(); ?></div>
          <div class='H5'><?php echo get_field('subtitle'); ?></div>
          <p class='body-2'><?php echo get_field('content'); ?></p>
        </div>
      </div>

      <?php } wp_reset_postdata();
    } else {
        echo 'No results.';
    } ?>

    </div>
    <?php
    $total_pages = ceil(wp_count_posts('licensing_states')->publish / 9);
    if ($total_pages > 1) {
    ?>
    <div class='page-pagination'>
      <div class='wrapper'>
      <?php
      if ($paged != 1) { ?>
        <a href='<?php echo explode("?", $_SERVER['REQUEST_URI'])[0].'?paged='.($paged-1) ?>' class='item'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M14 6.5L9 12L14 17.5" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
      <?php } else { ?>
        <div class='item'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M14 6.5L9 12L14 17.5" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
      <?php }
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
    <?php } ?>
  </div>
  <div class='third container'>
    <?php echo do_shortcode('[work_us]'); ?>
  </div>
</div>

<script type='text/javascript'>
const list = document.querySelector('#list');

const getNumber = (elem) => {
  const parent = elem.parentElement;
  const children = Array.from(parent.children);
  return children.indexOf(elem) + 1;
};

const closeBox = (e) => {
  e.currentTarget.parentElement.remove();
};

const openBox = (elem, index) => {
  const newElem = elem.querySelector('.details').cloneNode(true);
  const referenceElement = list.children[index];

  newElem.removeAttribute('style');
  newElem.classList.add('opened');

  const closeButton = newElem.querySelector('.close');
  closeButton.addEventListener('click', closeBox);

  list.insertBefore(newElem, referenceElement);
}

const blockListener = (e) => {
  const boxes = document.querySelectorAll('.opened');
  boxes.forEach(e => e.remove());
  
  const containerWidth = list.offsetWidth;
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

const blocks = document.querySelectorAll('.open-details');
blocks.forEach(e => e.addEventListener('click', blockListener));
</script>

<?php get_footer(); ?>