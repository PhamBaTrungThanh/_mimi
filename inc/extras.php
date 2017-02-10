<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package mimi
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function mimi_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'mimi_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function mimi_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'mimi_pingback_header' );

function mimi_primary_category_link() {

  global $post;
  $categories = get_the_category( $post->ID );
  $primary = $categories[0];
  echo '<a href="' . esc_url( get_category_link( $primary->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $primary->name ) ) . '" class="category ' . $primary->category_nicename . '">' . esc_html( $primary->name ) . '</a>';
}

function mimi_woo_custom_breadrumb_home_url() {
    return 'http://cats.dev/shop/';
}
add_filter( 'woocommerce_breadcrumb_home_url', 'mimi_woo_custom_breadrumb_home_url' );


function mimi_woo_custom_reviews_tab_content() {
  echo '<div class="fb-comments" data-href="' . get_permalink() . '" data-numposts="5" data-width="100%"></div>';
}
function mimi_woo_custom_description_tab( $tabs ) {

  $tabs['reviews']['callback'] = 'mimi_woo_custom_reviews_tab_content';  // Custom description callback
  $tabs['reviews']['title'] = '<span class="fb-comments-count" data-href="' . get_permalink() . '">0</span> bình luận';
  return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'mimi_woo_custom_description_tab', 98 );

function mimi_woo_custom_cart_button_text() {
        return __( 'Mua', 'woocommerce' );
}
add_filter( 'woocommerce_product_add_to_cart_text', 'mimi_woo_custom_cart_button_text' );    // 2.1 +

function mimi_merge_querystring($url = null,$query = null,$recursive = false)
{
  // $url = 'http://www.google.com.au?q=apple&type=keyword';
  // $query = '?q=banana';
  // if there's a URL missing or no query string, return
  if($url == null)
    return false;
  if($query == null)
    return $url;
  // split the url into it's components
  $url_components = parse_url($url);
  // if we have the query string but no query on the original url
  // just return the URL + query string
  if(empty($url_components['query']))
    return $url.'?'.ltrim($query,'?');
  // turn the url's query string into an array
  parse_str($url_components['query'],$original_query_string);
  // turn the query string into an array
  parse_str(parse_url($query,PHP_URL_QUERY),$merged_query_string);
  // merge the query string
  if($recursive == true)
    $merged_result = array_merge_recursive($original_query_string,$merged_query_string);
  else
    $merged_result = array_merge($original_query_string,$merged_query_string);
  // Find the original query string in the URL and replace it with the new one
  return str_replace($url_components['query'],http_build_query($merged_result),$url);
}

function primary_category_link() {

  global $post;
  $categories = get_the_category( $post->ID );
  $primary = $categories[0];
  echo '<a href="' . esc_url( get_category_link( $primary->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $primary->name ) ) . '" class="category ' . $primary->category_nicename . '">' . esc_html( $primary->name ) . '</a>';
}
add_action( 'after_setup_theme', 'mimi_woocommerce_support' );
function mimi_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
function mimi_post_fields() {
  if(function_exists("register_field_group"))
    {
      register_field_group(array (
        'id' => 'acf_post',
        'title' => 'Post',
        'fields' => array (
          array (
            'key' => 'field_58417c195dcdc',
            'label' => 'Extra post description',
            'name' => 'extra_post_description',
            'type' => 'text',
            'instructions' => 'More text to display under the header',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_5841574c73c90',
            'label' => 'Related Products',
            'name' => 'related_products',
            'type' => 'text',
            'instructions' => 'Related product ids, separated by comma',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_5899b44a3ec4d',
            'label' => 'Post Intro Effect',
            'name' => 'post_intro_effect',
            'type' => 'radio',
            'instructions' => 'Choose one of these effects for this post',
            'required' => 1,
            'choices' => array (
              'normal' => 'Normal',
              'fadeout' => 'Fade out',
              'sliced' => 'Sliced',
              'side' => 'Side',
              'sidefixed' => 'Side Fixed',
              'jam3' => 'Jam3',
            ),
            'other_choice' => 0,
            'save_other_choice' => 0,
            'default_value' => '',
            'layout' => 'vertical',
          ),
        ),
        'location' => array (
          array (
            array (
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'post',
              'order_no' => 0,
              'group_no' => 0,
            ),
          ),
        ),
        'options' => array (
          'position' => 'normal',
          'layout' => 'default',
          'hide_on_screen' => array (
          ),
        ),
        'menu_order' => 0,
      ));
  }
}
add_action( 'init', 'mimi_post_fields', 0 );