<?php
$search_query = '';
$search_category = '';

if (isset($_GET['query']) && !empty($_GET['query'])) {
  $search_query = sanitize_text_field($_GET['query']);
}
if (isset($_GET['category']) && !empty($_GET['category'])) {
  $search_category = sanitize_text_field($_GET['category']);
}
?>

<?php
get_header();
/* Template Name: blog */
?>
<div class='blog-page'>

  <div class='animate-header'>
    <div class='page-info'>
      <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
    </div>
  
    <div class='header'>
      <div class='container'>
        <div class='title H1'><?php echo get_field('title'); ?></div>
        <div class='description body-1'><?php echo get_field('description'); ?></div>
        <form class='form'>
          <div class='inputs'>
            <div class='input'>
              <label class='H5'>CATEGORIES</label>
              <input type='text' name='category' placeholder='Search Category' value='<?php echo $search_category; ?>' />
            </div>
            <div class='input'>
            <label class='H5'>SEARCH</label>
              <input type='text' name='query' placeholder='<?php echo get_field('input_text'); ?>' value='<?php echo $search_query; ?>' />
            </div>
          </div>
          <button class='button'>SEARCH</button>
        </form>
      </div>
    </div>
  </div>

  <div class='animate-content'>
    <div class='box container'>
      <div class='title H1'>All Articles</div>
      <div class='list'>
        <?php
          $category = get_term_by('name', $search_category, 'category');
          $category_id = $category->term_id;

          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args = array(
            'numberposts'   => 6,
            'offset'        => ($paged == 1) ? 0 : (6 * $paged) - 1,
            'orderby'       => 'date',
            'order'         => 'DESC',
            'include'       => array(),
            'exclude'       => array(),
            'meta_key'      => '',
            'meta_value'    => '',
            'post_type'     => 'post',
            'suppress_filters' => true,
            's' => $search_query,
            'post_status' => 'publish',
            'cat' => $category_id,
          );
      
          $posts = get_posts($args);
          if (count($posts) == 0) {
            echo 'No results.';
          }
          foreach ($posts as $post) {
            setup_postdata( $post );
      
        ?>
          <div class='article-card-component'>
            <img src='<?php the_post_thumbnail_url('min_thumbnail');?>' />
            <div class='content'>
              <div class='tag'><?php echo wp_get_post_categories(get_the_ID(), array('fields' => 'names'))[0]; ?></div>
              <a class='name H4' href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
              <!--<div class='bottom body-3'>
                <div class='author'><?php the_author(); ?></div>
                <div class='right'>
                  <span><?php the_time('d/m/Y'); ?></span>
                  <span><?php the_time('g:i A'); ?></span>
                </div>
              </div>-->
            </div>
          </div>
        <?php
          }
          wp_reset_postdata();
          
          $total_pages = ceil(wp_count_posts('post')->publish / 6);
        ?>
      </div>

      <?php if ($total_pages > 1) { ?>
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
  </div>

</div>
<?php get_footer(); ?>