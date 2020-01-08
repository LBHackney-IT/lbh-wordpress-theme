<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');

    // The following aren't used but I've left in for content in the CMS that already has these sizes applied
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // These are used
    add_image_size('full-width', 1920, '', true); // Full width - 960 * 2 for retina
    add_image_size('other-width', 1220, '', true); // Half width / Third / Quarter - biggest when full width on mobile, 610 * 2 for retina
    add_image_size('promo-image', 1536, '', true); // Promo component image
    add_image_size('header-logo', 412, '', true);
    add_image_size('block-icon', 216, '', true);

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('hackney-wordpress', get_template_directory_uri() . '/dist/hackney-wordpress.min.js', array(), '1.4', true); // Custom scripts
        wp_enqueue_script('hackney-wordpress'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('hackney-wordpress', get_template_directory_uri() . '/dist/all.css', array(), '2.8', 'all');
    wp_enqueue_style('hackney-wordpress'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
// add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
// add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
// add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
// add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
// function create_post_type_html5()
// {
//     register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
//     register_taxonomy_for_object_type('post_tag', 'html5-blank');
//     register_post_type('html5-blank', // Register Custom Post Type
//         array(
//         'labels' => array(
//             'name' => __('HTML5 Blank Custom Post', 'html5blank'), // Rename these to suit
//             'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
//             'add_new' => __('Add New', 'html5blank'),
//             'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
//             'edit' => __('Edit', 'html5blank'),
//             'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
//             'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
//             'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
//             'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
//             'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
//             'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
//             'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
//         ),
//         'public' => true,
//         'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
//         'has_archive' => true,
//         'supports' => array(
//             'title',
//             'editor',
//             'excerpt',
//             'thumbnail'
//         ), // Go to Dashboard Custom HTML5 Blank post for supports
//         'can_export' => true, // Allows export in Tools > Export
//         'taxonomies' => array(
//             'post_tag',
//             'category'
//         ) // Add Category and Post Tags support
//     ));
// }

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}



/*---------------------------------------*\
    Added by Mo Mulla : Web Content API 
\*---------------------------------------*/

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
    
    // check function exists
    if( function_exists('acf_register_block') ) {
        
        // register a testimonial block
        acf_register_block(array(
            'name'              => 'testimonial',
            'title'             => __('Testimonial'),
            'description'       => __('A custom testimonial block.'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial', 'quote' ),
        ));
    }
}

//more

function my_acf_block_render_callback( $block ) {
    
    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);
    
    // include a template part from within the "template-parts/block" folder
    if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
        include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
    }
}

// Enable the option show in rest
add_filter( 'acf/rest_api/field_settings/show_in_rest', '__return_true' );

// add options page
acf_add_options_page();


/**
* Removes width and height attributes from image tags
*
* @param string $html
*
* @return string
*/
function remove_image_size_attributes( $html ) {
return preg_replace( '/(width|height)="\d*"/', '', $html );
}

// Remove image size attributes from post thumbnails
add_filter( 'post_thumbnail_html', 'remove_image_size_attributes' );

// Remove image size attributes from images added to a WordPress post
add_filter( 'image_send_to_editor', 'remove_image_size_attributes' );


// Wordpress RestAPI Search initialize : Start
add_action( 'rest_api_init', 'custom_api_get_search_data' );
function custom_api_get_search_data() {
    register_rest_route( 'wp/v2', '/search', array(
        'methods' => 'GET',
        'callback' => 'custom_api_get_search_data_callback'
    ));
}
function custom_api_get_search_data_callback( $data ) {
    $target_url = '/';
    $this_url = site_url();
    // Initialize the array that will receive the posts' data.
    $posts_data = array();
    // Get the posts using the 'post' and 'news' post types
    $posts = get_posts( array(
            'post_type' => 'any',
            'posts_per_page' => -1
        )
    );
    // Loop through the posts and push the desired data to the array we've initialized earlier in the form of an object
    foreach( $posts as $post ) {
        $id = $post->ID;
        
$post->searchData = [];
        // Push post content into search results
        if($post->post_content > ""){
            // Replace wp site url with target url
            $content = str_replace($this_url, $target_url, $post->post_content);
            array_push($post->searchData, $content);
        }
	//Push post exceprt into search results
	if($post->post_excerpt > ""){
		$excerpt = str_replace($this_url, $target_url, $post->post_excerpt);
		array_push($post->searchData, $content);
	}
        // Push all acf fields into search results
        $fields = get_fields($id);
        if($fields){
          $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($fields));
          foreach($iterator as $key => $value) {
              if(
                  $value !== null  && $value !== ""  &&   // check for empty strings
                  strlen($value) > 50 &&                  // remove small strings
                  substr($value, 0, 4 ) !== "http"        // remove links
              ){
                // Replace wp site url with target url
                $content = str_replace($this_url, $target_url, $value);
                array_push($post->searchData, $content);
              }
          }
        }
        $post->pathname = str_replace(site_url(), '', get_permalink($id));
        // Remove unnecessary post properties
        unset($post->post_content);
	unset($post->post_excerpt);
        unset($post->post_date_gmt);
        unset($post->comment_status);
        unset($post->ping_status);
        unset($post->post_password);
        unset($post->post_name);
        unset($post->to_ping);
        unset($post->pinged);
        unset($post->post_modified);
        unset($post->post_modified_gmt);
        unset($post->post_content_filtered);
        unset($post->post_parent);
        unset($post->guid);
        unset($post->menu_order);
        unset($post->post_mime_type);
        unset($post->comment_count);
        unset($post->filter);
        $posts_data[] = $post;
    }
    return $posts_data;
}

//custom terms
// function my_json_prepare_term( $data, $term, $context ) {
//     global $wp_query;
//     $route = $wp_query->query['json_route'];
//     if ( ! preg_match( '/(terms\/.+)/', $route) )
//         return $data;
//     $args = array(
//         'tax_query' => array(
//             array(
//                 'taxonomy' => $term->taxonomy,
//                 'field' => 'slug',
//                 'terms' => $term->slug
//             )
//         ),
//         'posts_per_page' => 5
//     );
//     $posts = get_posts( $args );
//     $posts_arr = array();
//     foreach ( $posts as $p ) {
//         $posts_arr[] = array(
//             'ID' => $p->ID,
//             'title' => $p->post_title
//             );
//     }
//     $data['posts'] = $posts_arr;
//     return $data;
// }
// add_filter( 'json_prepare_term', 'my_json_prepare_term', 10, 3 );

// Wordpress RestAPI Search initialize : End

// Set Empty fields must show as null in rest api
function nullify_empty($value, $post_id, $field)
{
    if (empty($value)) {
        return null;
    }

    return $value;
}

// Nullify empty responses
// sources : https://github.com/gatsbyjs/gatsby/issues/4461
// add_filter('acf/format_value', 'acf_nullify_empty', 100, 3);
add_filter('acf/format_value', 'nullify_empty', 100, 3);
add_filter('acf/format_value/type=image', 'nullify_empty', 100, 3);
add_filter('acf/format_value/type=relationship', 'nullify_empty', 100, 3);
add_filter('acf/format_value/type=repeater', 'nullify_empty', 100, 3);
add_filter('acf/format_value/type=wysiwyg', 'nullify_empty', 100, 3);
add_filter('acf/format_value/type=url', 'nullify_empty', 100, 3);
add_filter('acf/format_value/type=text', 'nullify_empty', 100, 3);
add_filter('acf/format_value/type=number', 'nullify_empty', 100, 3);


// not sure if gallery is internally named gallery as well but this should work
add_filter('acf/format_value/type=gallery', 'nullify_empty', 100, 3); 

/**
 * Do stuff when page is saved : ie. Ensure taxonomy is selected
 * Save post metadata when a post is saved.
 *
 * @param int $post_id The post ID.
 * @param post $post The post object.
 * @param bool $update Whether this is an existing post being updated or not.
 */
// function save_book_meta( $post_id, $post, $update ) {

    /*
     * In production code, $slug should be set only once in the plugin,
     * preferably as a class property, rather than in each function that needs it.
     */
//     $post_type = get_post_type($post_id);
    //  $service = "0";
    //       $term = get_term($term_id, $taxonomy);
    //     $term_id = $term->id;
    //      $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
    // If this isn't a 'page' post, don't update it.
    //  if ( "page" != $post_type ) return;
    //  if ($term === null){
    //      $message = "You need to select a taxonomy";
    //      echo "<script type='text/javascript'>alert('$message');</script>";
    //  }else{
    //      return;
    //  }
    // - Update the post's metadata.

    //  if ( $_POST['service']  == "0") {
        
    //      $message = "You need to select a taxonomy";
    //      echo "<script type='text/javascript'>alert('$message');</script>";
    //      return true;
    //     }else{
    //      // update_post_meta( $post_id, 'book_author', sanitize_text_field( $_POST['book_author'] ) );
    //      // Do nothing
//  echo "<script type='text/javascript'>console.log('the cat is "+ $post_id + "')</script>";
//  echo '<script>console.log('.$post_type.')</script>';
//  echo "<script>console.log({$post_type})</script>";
//  echo "<script>console.log(".json_encode($term).")</script>";
    //  }

    //     if ( isset( $_POST['publisher'] ) ) {
    //         update_post_meta( $post_id, 'publisher', sanitize_text_field( $_POST['publisher'] ) );
    //     }

    // Checkboxes are present if checked, absent if not.
    //     if ( isset( $_POST['inprint'] ) ) {
    //         update_post_meta( $post_id, 'inprint', TRUE );
    //     } else {
    //         update_post_meta( $post_id, 'inprint', FALSE );
    //     }
// }
// add_action( 'save_post', 'save_book_meta', 10, 3 );

// Add Netlify to Dashboard
function custom_dashboard_widget() {
    echo "<p>Check Status here</p>";
}
function add_custom_dashboard_widget() {
    wp_add_dashboard_widget('custom_dashboard_widget', 'Netlify Build Status', 'custom_dashboard_widget');
}
add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');

// Set a default service on pages to fix build breaking when no service is set

add_action( 'save_post', 'set_post_default_category', 10,3 );
 
function set_post_default_category( $post_id, $post, $update ) {
    // Only want to set if this is a new post!
    if ( $update ){
        return;
    }
      // Get the default term using the slug, its more portable!
    $term = get_term_by( 'slug', 'pages', 'service' );
	$cat = get_term_by( 'slug', 'uncategorised', 'category' );

    // Only set for post_type = post!
    if ( 'page' == $post->post_type ) {
        	wp_set_post_terms( $post_id, $term->term_id, 'service', true );
    }else if ( 'post' == $post->post_type ) {
        	wp_set_post_terms( $post_id, $cat->term_id, 'category', true );
    }else{
		return;
	}
     
   
 
}


//Run update if page is lbhrobot for services but run every time for pages
  
//   			echo "<script>console.log('Its happening Mo!')</script>";
/*        		function mass_update_posts() {
                        echo "<script>console.log('Posts are being updated!')</script>";
        			$args = array(
        				'post_type'=>'page',
        				'posts_per_page'   => -1
        			);
        			$my_posts = get_posts($args);
        			foreach($my_posts as $key => $my_post) {
        				$meta_values = get_post_meta( $my_post->ID);
        				update_field('order', '3', $my_post->ID);
        				update_field('show_or_hide_from_menu', 'show', $my_post->ID);
        				update_field('redirect_page', 'no', $my_post->ID);
        				update_field('redirect_url', 'none', $my_post->ID);
        			}
        		}
        		add_action( 'init', 'mass_update_posts' );
*/

//$tax ="services";
/*                $terms = get_terms( $tax, [
                  'hide_empty' => false, // do not hide empty terms
                ]);
                echo "<script>console.log('Services are being udpated!')</script>";
                foreach( $terms as $term ) {
					$term_id = $term->term_id;
					update_term_meta($term_id, 'order', '2');
					update_term_meta($term_id, 'show_or_hide_from_menu', 'show');
					update_term_meta($term_id, 'redirect_service', 'no');
					update_term_meta($term_id, 'redirect_url', 'none');
				
	
				}
*/
// End update if page is lbhrobot

// login screen updates
function smallenvelop_login_message( $message ) {
    if ( empty($message) ){
        return "<p><strong>Are you a Hackney Council or Hackney Learning Trust user? <br><br>Login to the intranet by entering your work email and password</strong></p><br><br>";
    } else {
        return $message;
    }
}

add_filter( 'login_message', 'smallenvelop_login_message' );

function my_custom_login_logo() {
    echo '<style type="text/css">
    h1 a {background-image:url(http://intranet.hackney.gov.uk/wp-content/uploads/lbh-intranet-logo.png)!important;  background-size: contain!important; width: auto!important; height: auto!important; margin: 30px auto!important }
    </style>';
}
add_filter( 'login_head', 'my_custom_login_logo' );

function changeBgColor() {
    echo '
    <style type="text/css">
    body.login{ 
        background-color: #672146!important;
    }
    #login strong{
        color: white;
    }
    .login #backtoblog{
        display: none;
    }
    </style>';
}
add_action('login_head', 'changeBgColor');

function get_term_hierarchy($term) {
    $hierarchy_array = [];
    array_unshift($hierarchy_array, $term);
    while(!empty($term->parent)):
        $term = get_term_by('id', $term->parent, 'service');
        array_unshift($hierarchy_array, $term);
    endwhile;
    return $hierarchy_array;
}

function render_nav_term($term, $level, $hierarchy) { 
    if ($level < 4) {
        $output = "<li class='lbh-nav__item lbh-nav__item--service";
        $output .= !empty($hierarchy) && $hierarchy[($level - 1)]->term_id === $term->term_id ? " lbh-nav__item--selected" : "";
        $output .= "'><a href='" . get_term_link($term) . "' class='lbh-nav__link--service'>" . $term->name . "<svg class='lbh-nav__service-icon' width='5px' height='6px' viewBox='0 0 5 6' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
        <title>Right arrow</title>
        <g stroke='none' stroke-width='1' fill-rule='nonzero' transform='translate(0.625000, 0.166667)'>
            <path d='M0,5.47656805 L0,0.401143984 C0,0.049704142 0.478025148,-0.126291913 0.757588757,0.122209073 L3.61251479,2.6599211 C3.78581361,2.8139645 3.78581361,3.06374753 3.61251479,3.21779093 L0.757588757,5.75550296 C0.478025148,6.00402367 0,5.82800789 0,5.47656805 Z'></path>
        </g><!-- Fallback PNG image for older browsers.
        The <image> element is a valid SVG element. In SVG, you would specify
        the URL of the image file with the xlink:href – as we don't reference an
        image it has no effect. It's important to include the empty xlink:href
        attribute as this prevents versions of IE which support SVG from
        downloading the fallback image when they don't need to.
        In other browsers <image> is synonymous for the <img> tag and will be
        interpreted as such, displaying the fallback image. -->
        <image src='" . get_template_directory_uri() . "/img/icon-search.png' xlink:href='' width='5' height='6'></image></svg></a>";
        $child_terms = get_terms([
            'taxonomy' => 'service',
            'parent' => $term->term_id,
            'hide_empty' => false
        ]);
        $args = array(
            'post_type' => 'page',
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'service',
                    'field'    => 'term_id',
                    'include_children' => false,
                    'terms'    => $term->term_id
                ),
            )
        );
        $query = new WP_Query( $args ); 
        $posts = $query->posts;
        if ($child_terms || $posts) : 
            $output .= "<ul class='lbh-nav__list lbh-nav__list--loading lbh-nav__list--level-" . ($level + 1) . "'  data-level='" . ($level + 1) ."' tabindex='-1'><h2 class='lbh-heading-h5 lbh-nav__list-title'>" . $term->name . "</h2>";
                if ($child_terms): 
                    foreach($child_terms as $term):
                        $output .= render_nav_term($term, $level + 1, $hierarchy);
                    endforeach;
                endif;
                if ($posts):
                    foreach($posts as $post):
                        $permalink = get_the_permalink($post->ID);
                        $page_class = $permalink === get_permalink() ? " lbh-nav__item--selected" : "";
                        $output .= "<li class='lbh-nav__item lbh-nav__item--page" . $page_class . "'><a href='" . $permalink . "'>" . $post->post_title . "</a></li>";
                    endforeach;
                endif;
            $output .= "</ul>";
        endif;
        $output .= "</li>";
        return $output;
    } else {
        return '';
    }
}
?>
