<?php
if ( is_front_page() ) {
    return;
}
if ( is_home() ) {
    return;
}
if ( is_page() && get_query_var( 'pagename' ) != 'nganh-nghe' ) {
    return;
}
?>
<div class="the-breadcrumb">
    <div class="container">
        <div class="row">
            <?php the_breadcrumb(); ?>
        </div>
    </div>
</div>
