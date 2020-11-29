<?php 

function pageBanner($args = NULL) {
  //  Php logic will live here
  if (!$args['title']) {
    $args['title'] = get_the_title();
  }

  if (!$args['subtitle']) {
    $args['subtitle'] = get_field('page_banner_subtitle');
  }

  if (!$args['photo']) {
    if (get_field('page_banner_background_image') AND !is_archive() AND !is_home()) {
      $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
    } else {
      $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
    }
  }
  ?>
    <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(
        <?= 
          $args['photo']
        ?>);">
      </div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?= $args['title'] ?></h1>
        <div class="page-banner__intro">
          <p><?= $args['subtitle'] ?></p>
        </div>
      </div>  
    </div>


<?php }

function uni_files () {
  wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  // Google Maps JS files
  wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyB4k5_uGwKmC7xmR0Npz1vG3WOuUzig1qw', NULL, '1.0', true);

  if (strstr($_SERVER['SERVER_NAME'], 'fictional-university.local')) {
    wp_enqueue_script('main-uni-js', 'http://localhost:3000/bundled.js', NULL, '1.0', true);
  } else {
    wp_enqueue_script('our-vendors-js', get_theme_file_uri('/bundled-assets/vendors~scripts.64e2c292d6fcbaf95af9.js'), NULL, '1.0', true);
    wp_enqueue_script('main-uni-js', get_theme_file_uri('/bundled-assets/scripts.ba52a498052e5a510282.js'), NULL, '1.0', true);
    wp_enqueue_style('main-uni-styles', get_theme_file_uri('/bundled-assets/styles.ba52a498052e5a510282.css'));
  }
}

function uni_features () {
  // Dynamic Menu
  // register_nav_menu('headerMenuLocation', 'Header Menu Location');
  // register_nav_menu('footerLocationOne', 'Footer Location One');
  // register_nav_menu('footerLocationTwo', 'Footer Location Two');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('professorLandscape', 400, 260, true);
  add_image_size('professorPortrait', 480, 650, true);
  add_image_size('pageBanner', 1500, 350, true);
}

function uni_adjust_queries ($query) {
  $today = date('Ymd');
  if (!is_admin() && is_post_type_archive('campus') && is_main_query()) {
    $query -> set('posts_per_page', -1);
  }

  if (!is_admin() && is_post_type_archive('program') && is_main_query()) {
    $query -> set('orderby', 'title');
    $query -> set('order', 'ASC');
    $query -> set('posts_per_page', -1);
  }

  if (!is_admin() && is_post_type_archive('event') && is_main_query()) {
    $query -> set('meta_key', 'event_date');
    $query -> set('orderby', 'meta_value_num');
    $query -> set('order', 'ASC');
    $query -> set('meta_query', array(
      'key' => 'event_date',
      'compare' => '>=',
      'value' => $today,
      'type' => 'numeric'
    ));
  }
}

add_action('wp_enqueue_scripts', 'uni_files');
add_action('after_setup_theme', 'uni_features');
add_action('pre_get_posts', 'uni_adjust_queries');

function universityMapKey($api) {
  $api['key'] = '';
  return $api;
}

add_filter('acf/fields/google_map/api', 'universityMapKey');

?>
