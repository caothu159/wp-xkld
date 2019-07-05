<?php
if ( is_front_page() ) {
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
