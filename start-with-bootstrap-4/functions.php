<?php
/**
 * Функции шаблона (function.php)
 * @package WordPress
 * @subpackage start-with-bootstrap-4
 */

add_theme_support('title-tag');


add_theme_support('post-thumbnails');
set_post_thumbnail_size(250, 150);
add_image_size('big-thumb', 400, 400, true);


register_nav_menus(array(
    'top' => 'Главное меню',
    'bottom' => 'Меню в подвале'
));

register_sidebar(array(
    'name' => 'Колонка',
    'id' => "sidebar",
    'description' => 'Колонка для виджетов справа',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h3 class="widgettitle">',
    'after_title' => "</h3>",
));

add_action('wp_footer', 'add_scripts');
if (!function_exists('add_scripts')) {
    function add_scripts()
    {
        if (is_admin()) return false;
        //wp_deregister_script('jquery');
    }
}

add_action('wp_print_styles', 'add_styles');
if (!function_exists('add_styles')) {
    function add_styles()
    {
        if (is_admin()) return false;
        wp_enqueue_style('main', get_template_directory_uri() . '/style.css');
    }
}


/*
 * Отключаем Emojii
*/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_wp_emojis_in_tinymce' );
function disable_wp_emojis_in_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/*
 * Pagination
*/
if (!function_exists('pagination')) {
    function pagination()
    {
        global $wp_query;
        $big = 999999999;
        $links = paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'type' => 'array',
            'prev_text' => 'Назад',
            'next_text' => 'Вперед',
            'total' => $wp_query->max_num_pages,
            'show_all' => false,
            'end_size' => 1,
            'mid_size' => 2,
            'add_args' => false,
            'add_fragment' => '',
            'before_page_number' => '',
            'after_page_number' => ''
        ));
        if (is_array($links)) {
            echo '<nav aria-label="Page navigation"><ul class="pagination">';
            foreach ($links as $link) {
                $link_with_class= str_replace('<a', '<a class="page-link" ', $link);
                $link_with_class= str_replace('<span', '<span class="page-link" ', $link_with_class);
                if (strpos($link, 'current') !== false) echo "<li class='page-item active'>$link_with_class</li>";
                else echo "<li class='page-item'>$link_with_class</li>";
            }
            echo '</ul></nav>';
        }
    }
}

/*
 * Mark for pages with/without sidebar
*/
if (!function_exists('content_class_by_sidebar')) {
    function content_class_by_sidebar()
    {
        if (is_active_sidebar('sidebar')) {
            echo 'col-sm-8';
        } else {
            echo 'col-sm-12';
        }
    }
}

/*
 * Navs for previous links and next
*/
if (!function_exists('previos_and_next')) {
    function previos_and_next()
    {
        $previous_post = get_adjacent_post(0, '', 0);
        $next_post = get_adjacent_post(0, '', 1);

        if ($previous_post or $next_post) {
            echo '<nav>';
            echo '<ul class="pagination">';
            if ($previous_post) {
                echo '<li class="page-item">';
                echo '<a class="page-link" href="' . get_permalink($previous_post->ID) . '">' . $previous_post->post_title . '</a>';
                echo '</li>';
            }
            if ($next_post) {
                echo '<li class="page-item" aria-current="page">';
                echo '<a class="page-link" href="' . get_permalink($next_post->ID) . '">' . $next_post->post_title . '</a>';
                echo '</li>';
            }
            echo '</ul>';
            echo '</nav>';
        }

    }
}

/*
 * Walker class for mark bootstrap 4 top menu
*/
if (!class_exists('bootstrap_menu4_top')) {
    class bootstrap_menu4_top extends Walker_Nav_Menu
    {
        private $with_dropdown;

        /**
         * bootstrap_menu4 constructor.
         * @param $with_dropdown
         */
        function __construct($with_dropdown = true)
        {
            $this->with_dropdown = $with_dropdown;
            $this->max_depth = 2;
        }

        function start_lvl(&$output, $depth = 0, $args = array())
        {
            $output .= "<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">";
        }

        function end_lvl(&$output, $depth = 0, $args = array())
        {
            $output .= "</div>";
        }

        function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
        {
            $item_html = '';
            parent::start_el($item_html, $item, $depth, $args);
            if ($depth === 0) {
                if ($item->is_dropdown && $this->with_dropdown) {
                    $item_html = str_replace('<a', '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"', $item_html);
                } else {
                    $item_html = str_replace('<a', '<a class="nav-link"', $item_html);
                }
            } else {
                $item_html = strstr($item_html, "<a");
                $item_html = str_replace('<a', '<a class="dropdown-item"', $item_html);
            }
            $output .= $item_html;
        }

        function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
        {
            if ($depth != 0) {
                $output = str_replace('</li>', '', $output);
            }
        }

        function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
        {
            $element->classes[] = 'nav-item';
            if ($element->current) $element->classes[] = 'active';
            $element->is_dropdown = !empty($children_elements[$element->ID]);
            if ($element->is_dropdown and $this->with_dropdown) {
                $element->classes[] = 'dropdown';
            }
            if ($depth === 0 or $this->with_dropdown) {
                parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
            }
        }
    }
}

/*
 * Walker class for mark bootstrap 4 bootom menu
*/
if (!class_exists('bootstrap_menu4_bottom')) {
    class bootstrap_menu4_bottom extends Walker_Nav_Menu
    {
        function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
        {
            $item_html = '';
            parent::start_el($item_html, $item, $depth, $args);
            $item_html = str_replace('<a', '<a class="nav-link"', $item_html);
            $output .= $item_html;
        }

        function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
        {
            $element->classes[] = 'nav-item';
            if ($element->current) $element->classes[] = 'active';
            parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
        }
    }
}
