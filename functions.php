add_action('wp_head', 'wp_head_pagination_mod');
function wp_head_pagination_mod() {
  $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );

  if( ! $page ) return;

  $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $url = substr($url, 0, strpos($url, "page"));

  $link_prev = $url . 'page/' . ($page - 1);
  $link_next = $url  . 'page/' . ($page + 1);

  $output  = '  <link rel="prev" href="'. $link_prev .'" />' . PHP_EOL;
  $output .= '  <link rel="next" href="'. $link_next .'" />' . PHP_EOL;
  echo $output;
}