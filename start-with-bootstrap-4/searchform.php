<?php
/**
 * Шаблон формы поиска (searchform.php)
 * @package WordPress
 * @subpackage start-with-bootstrap-4
 */
?>

<form>
    <div class="form-group" method="get" action="<?php echo home_url( '/' ); ?>">
        <input type="search" class="form-control" id="search-field" placeholder="Строка для поиска" value="<?php echo get_search_query() ?>" name="s">
        <small id="emailHelp" class="form-text text-muted">Что вы хотите найти?</small>
    </div>
    <button type="submit" class="btn btn-primary">Искать</button>
</form>
