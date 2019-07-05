<?php
if ( ! is_front_page() ) {
    return;
}
echo do_shortcode( '[rev_slider alias="home"]' );
