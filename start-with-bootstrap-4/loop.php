<?php
/**
 * Запись в цикле (loop.php)
 * @package WordPress
 * @subpackage start-with-bootstrap-4
 */ 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h1 class="display-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <div class="meta">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><?php the_time(get_option('date_format')." в ".get_option('time_format')); ?></li>
                <li class="breadcrumb-item"><?php the_author_posts_link(); ?></li>
                <li class="breadcrumb-item"><?php the_category(', ') ?></li>
                <li class="breadcrumb-item"><?php the_tags('', ', ', '');?></li>
            </ol>
        </nav>
    </div>
    <?php the_content(''); ?>
</article>