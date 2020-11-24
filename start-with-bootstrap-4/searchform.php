<?php
/**
 * Шаблон формы поиска (searchform.php)
 * @package WordPress
 * @subpackage start-with-bootstrap-4
 */
?>

<form method="get" action="<?php echo home_url( '/' ); ?>">
    <div class="row">
        <div class="col-9">
            <input type="search" class="form-control" id="search-field" placeholder="Строка для поиска" value="<?php echo get_search_query() ?>" name="s">
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary"><svg height="14px" width="14px" viewBox="0 0 16 16"><path fill="#fff" d="M15.7,14.3l-3.105-3.105C13.473,10.024,14,8.576,14,7c0-3.866-3.134-7-7-7S0,3.134,0,7s3.134,7,7,7  c1.576,0,3.024-0.527,4.194-1.405L14.3,15.7c0.184,0.184,0.38,0.3,0.7,0.3c0.553,0,1-0.447,1-1C16,14.781,15.946,14.546,15.7,14.3z   M2,7c0-2.762,2.238-5,5-5s5,2.238,5,5s-2.238,5-5,5S2,9.762,2,7z"/></svg></button>
        </div>
    </div>
</form>
