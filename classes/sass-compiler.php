<?php
/**
 * This simple tool compiles .scss files to .css files.
 * Everything happens right when you run your app, on-the-fly, in pure PHP. No Ruby needed, no configuration needed.
 *
 * @see SASS Wikipedia: http://en.wikipedia.org/wiki/Sass_%28stylesheet_language%29
 * @see SASS Homepage: http://sass-lang.com/
 * @see scssphp, the used compiler (in PHP): http://leafo.net/scssphp/
 */
if ( is_admin() ) {
    return;
}

if ( ! function_exists( 'env' ) ) {
    return;
}
if ( env( 'WP_ENV' ) != 'development' ) {
    return;
}
if ( ! class_exists( '\Leafo\ScssPhp\Compiler' ) ) {
    return;
}

return;
$scss_compiler = new \Leafo\ScssPhp\Compiler();
$scss_compiler->setImportPaths( get_template_directory() );
$scss_compiler->setFormatter( \Leafo\ScssPhp\Formatter\Expanded::class );
$scss_folder        = get_template_directory() . DIRECTORY_SEPARATOR;
$scss_css           = $scss_folder . 'style.css';
$file_path_elements = pathinfo( $scss_css );
$file_name          = $file_path_elements['filename'];
$string_sass        = file_get_contents( $scss_folder . $file_name . ".scss" );
$string_css         = $scss_compiler->compile( $string_sass );
if ( ! class_exists( '\Padaliyajay\PHPAutoprefixer\Autoprefixer' ) ) {
    $string_css = ( new \Padaliyajay\PHPAutoprefixer\Autoprefixer( $string_css ) )->compile();
}
file_put_contents( $scss_folder . $file_name . ".css", $string_css );
