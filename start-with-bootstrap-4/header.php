<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage start-with-bootstrap-4
 */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://denywhite.ru/css/styles.min.css">
    <link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
    <link rel="alternate" type="application/rss+xml" title="Comments RSS"
          href="<?php bloginfo('comments_rss2_url'); ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <nav class="navbar navbar-expand">
        <div class="container">
            <a class="navbar-brand" href="<?= home_url(); ?>">
                <span id="logo" class="align-top d-none d-sm-inline-block">&lt;/&gt;</span> <? bloginfo('name'); ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php $args = array(
                'container_id' => '',
                'menu_id' => '',
                'theme_location' => 'top',
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'menu_class' => 'navbar-nav mr-auto ',
                'max_depth' => 2,
                'walker' => new bootstrap_menu4_top()
            );
            wp_nav_menu($args);
            ?>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="/">На основной сайт</a>
                </li>
            </ul>
        </div>
    </nav>
</header>