<?php

define('ROOT', get_template_directory_uri());
define('IMAGES', ROOT . '/assets/images/');
define('SCRIPTS', ROOT . '/assets/scripts/');


define('SEARCH_JOBS_LINK', '/search-travel-jobs');


function tlc_assets() {
  wp_enqueue_style('global-css', ROOT . '/assets/styles/global.css');
  wp_enqueue_style('swiper-css', ROOT . '/assets/styles/swiper-bundle.min.css');
  wp_enqueue_style('jobs-css', ROOT . '/assets/styles/pages/jobs.css');

  if (is_single()) {
    wp_enqueue_style('single-css', ROOT . '/assets/styles/pages/single.css');
  } else if (is_front_page()) {
    wp_enqueue_style('index-css', ROOT . '/assets/styles/pages/index.css');
  } else if (is_404()) {
    wp_enqueue_style('not-found-css', ROOT . '/assets/styles/pages/404.css');
  } else {
    $page = preg_replace('/^page-(.*).php$/', '$1', get_page_template_slug());
    wp_enqueue_style($page . '-css', ROOT . '/assets/styles/pages/' . $page . '.css');
  }
  

  wp_enqueue_script('swiper-js', SCRIPTS . 'swiper-bundle.min.js', array(), '1.0', true);
  wp_enqueue_script('gsap-js', SCRIPTS . 'gsap.min.js', array(), '1.0', true);
  wp_enqueue_script('gsap-scroll-to-js', SCRIPTS . 'ScrollToPlugin.min.js', array(), '1.0', true);
  wp_enqueue_script('gsap-trigger-js', SCRIPTS . 'ScrollTrigger.min.js', array(), '1.0', true);
  wp_enqueue_script('animation-js', SCRIPTS . 'animation.js', array(), '1.0', true);
  wp_enqueue_script('dropdown-js', SCRIPTS . 'newDropdown.js', array(), '1.0', true);
  wp_enqueue_script('modal-js', SCRIPTS . 'modal.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'tlc_assets');

show_admin_bar(false);
remove_filter('template_redirect', 'redirect_canonical');

add_theme_support('post-thumbnails');
add_theme_support('post-thumbnails', array('team'));
add_theme_support('post-thumbnails', array('post_testimonials'));
add_theme_support('post-thumbnails', array('post_academy'));
add_theme_support('post-thumbnails', array('licensing_states'));

function remove_default_page_fields() {
  remove_post_type_support('page', 'editor');
  remove_post_type_support('testimonials', 'editor');
  remove_post_type_support('post_academy', 'editor');
  remove_post_type_support('licensing_states', 'editor');
}
add_action('init', 'remove_default_page_fields');


function custom_image_sizes() {
  add_image_size('min_thumbnail', 450, 300, true);
}
add_action('after_setup_theme', 'custom_image_sizes');


// post request
function handle_post_request() {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = get_field('mail_to', 'option');
    $subject = 'New Message!!!';

    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $speciality = trim($_POST['speciality']);

    if (!empty($fullname) && !empty($email) && !empty($message) && !empty($speciality)) {
      $headers = array();
      $msg = "fullname: $fullname \nemail: $email \nspeciality: $speciality \nmessage: $message";
        
      wp_mail($to, $subject, $msg, $headers);

      echo 'success';
      exit();
    };
  }
}
add_action('init', 'handle_post_request');


function wpse_298888_posts_where( $where, $query ) {
  global $wpdb;

  $starts_with = esc_sql( $query->get( 'starts_with' ) );

  if ( $starts_with ) {
      $where .= " AND $wpdb->posts.post_title LIKE '$starts_with%'";
  }

  return $where;
}
add_filter( 'posts_where', 'wpse_298888_posts_where', 10, 2 );


function custom_rewrite_rules() {
  // after changes: wp-admin => Settings => Permalinks => press Save Changes
  add_rewrite_rule('^search-travel-jobs/search-jobs-in-([^/]+)/?$', 'index.php?pagename=search-travel-jobs&state=$matches[1]', 'top');
  add_rewrite_rule('^nursing-jobs-by-specialty/([^/]+)/?$', 'index.php?pagename=search-travel-jobs&specialty_link=$matches[1]', 'top');
  add_rewrite_rule('^allied-jobs-by-specialty/([^/]+)/?$', 'index.php?pagename=search-travel-jobs&specialty_link=$matches[1]', 'top');
  add_rewrite_rule('^travel-nursing-job/([^/]+)/?$', 'index.php?pagename=job&vacancy_link=$matches[1]', 'top');
}
add_action('init', 'custom_rewrite_rules');

add_filter( 'query_vars', 'wpa66452_query_vars' );
function wpa66452_query_vars( $query_vars ){
    $query_vars[] = 'state';
    $query_vars[] = 'specialty_link';
    $query_vars[] = 'vacancy_link';
    return $query_vars;
}



// shortcodes

function work_us_shortcode() {
  return '<div class="work-us-card container"><img src="' . IMAGES . 'work-us.jpeg' . '"><div class="card-content"><div class="card-title">Let\'s start work with Us!</div><div class="card-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</div><a href="' . SEARCH_JOBS_LINK . '" class="card-button button">Search Job</a></div></div>';
}
add_shortcode('work_us', 'work_us_shortcode');

function breadcrumbs_shortcode() {
  $index_title = get_the_title(get_option('page_on_front'));
  $index_link = get_the_permalink(get_option('page_on_front'));
  $paths = [
    $index_link => $index_title,
  ];

  $ancestors = get_post_ancestors(get_the_ID());
  foreach ($ancestors as $ancestor_id) {
    $page_url = get_permalink($ancestor_id);
    $paths[$page_url] = get_the_title($ancestor_id);
  }

  try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
  }
  
  if (get_the_title() == 'job') {
    $job = $pdo->query("SELECT title FROM api_vacancies WHERE vacancy_link = '" . get_query_var('vacancy_link') . "'  ")->fetch(PDO::FETCH_ASSOC);
    $paths[strtok($_SERVER['REQUEST_URI'], '?')] = $job['title'];
  } else {
    $paths[get_permalink()] = get_the_title();
  }

  $keys = array_keys($paths);
  $values = array_values($paths);
  for ($i = 0; $i < count($paths); $i++) {
    echo '<a href=\'' . rtrim($keys[$i], '/') . '\' class=\'' . (($i == count($paths) - 1) ? 'last' : '') .'\'>' . $values[$i] . '</a>';
    if ($i != count($paths) - 1) {
      echo '<svg width="5" height="7" viewBox="0 0 5 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 0.5L4 3.5L1 6.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    }
  }
}
add_shortcode('breadcrumbs', 'breadcrumbs_shortcode');