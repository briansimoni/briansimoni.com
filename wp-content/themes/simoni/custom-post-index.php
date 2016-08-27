<?php
/**
 * Template Name: Custom Post Type Index
 *
 * @package WordPress
 * @subpackage SimoniTheme
 */
get_header();

// I made this function so that I didn't have to create other template files based on custom post types
function find_post_type() {
    $url = parse_url( $_SERVER['REQUEST_URI']);
    switch ( $url['path'] ) {

        case '/compsci/' :
            return 'computer-science';
        break;

        case '/ems/' :
            return 'fire-and-ems';
        break;

        case '/software/':
            return 'software-development';
        break;
    }
    return '';
}


$args = array('post_type' => find_post_type() );

$loop = new WP_Query( $args );?>

<div id="content" class="container">
<?php while ( $loop->have_posts() ) : $loop->the_post();
    global $post
    ?>

    <div class="post">
        <div class="row">
            <div class="col-xs-12"><a href="<?php echo $post->guid ?>"><h2><?php echo $post->post_title ?></h2></a></div>
        </div>
        <div class="row">
            <!-- todo conditionals for content existing -->

            <div class="col-md-4"><?php the_post_thumbnail() ?></div>
            <div class="col-md-8">
                <p><?php echo $post->post_excerpt ?></p>
                <p class="read-more"><a href="<?php echo $post->guid ?>">read more</a></p>
            </div>
        </div>
    </div>
<?php endwhile;?>
</div>

<?php get_footer() ?>
