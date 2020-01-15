<?php
/**
 * Страница автора (author.php)
 * @package WordPress
 * @subpackage start-with-bootstrap-4
 */
get_header(); ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="<?php content_class_by_sidebar(); ?>">
                    <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
                    <h1 class="display-3">Посты автора <?php echo $curauth->display_name; ?></h1>
                    <div class="media">
                        <?php echo get_avatar($curauth->ID, 64, '', $curauth->nickname, array('class' => 'mr-3')); ?>
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo $curauth->display_name; ?></h5>
                            <?php if ($curauth->user_url) echo '<a href="' . $curauth->user_url . '">' . $curauth->user_url . '</a>'; ?>
                            <?php if ($curauth->description) echo '<p>' . $curauth->description . '</p>'; ?>
                        </div>
                    </div>

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php get_template_part('loop'); ?>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <p>Нет записей.</p>
                    <? endif; ?>
                    <?php pagination(); ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>