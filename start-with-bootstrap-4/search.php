<?php
/**
 * Шаблон поиска (search.php)
 * @package WordPress
 * @subpackage start-with-bootstrap-4
 */
get_header(); ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="<?php content_class_by_sidebar(); ?>">
                    <h1 class="display-3"><?php printf('Поиск по строке: %s', get_search_query()); ?></h1>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php get_template_part('loop'); ?>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <p>Нет записей.</p>
                    <?php endif; ?>
                    <?php pagination(); ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>