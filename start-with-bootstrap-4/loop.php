<?php
/**
 * Запись в цикле (loop.php)
 * @package WordPress
 * @subpackage start-with-bootstrap-4
 */ 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 5em; " >
	<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="meta">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><span class="pseudo">&#8249;date&#8250;</span><?php the_time(get_option('date_format')); echo "&nbsp;г."; ?><span class="pseudo">&#8249;/date&#8250;</span></li>
                <?php $cats = get_the_category_list(', '); ?>
                <?php if ($cats) :?><li class="breadcrumb-item"><?= $cats; ?></li><?php endif;?>
                <?php $tags = get_the_tag_list('', ', ', ''); ?>
                <?php if ($tags): ?><li class="breadcrumb-item"><?= $tags; ?></li><?php endif;?>
            </ol>
        </nav>
    </div>
    <?php the_content(''); ?>
</article>