<?php
/**
 * Страница архивов записей (archive.php)
 * @package WordPress
 * @subpackage start-with-bootstrap-4
 */
get_header(); ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="<?php content_class_by_sidebar(); ?>">
                    <h1><?php
                        if (is_day()) : printf('Посты за день: %s', get_the_date());
                        elseif (is_month()) : printf('Посты за месяц: %s', get_the_date('F Y'));
                        elseif (is_year()) : printf('Посты за год: %s', get_the_date('Y'));
                        else : 'Archives';
                        endif; ?></h1>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php get_template_part('loop'); ?>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <p>Нет записей.</p>;
                    <?php endif; ?>
                    <?php pagination(); ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>