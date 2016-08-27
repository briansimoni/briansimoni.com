<?php
/**
 * Template Name: Custom Post Type Index
 *
 * @package WordPress
 * @subpackage SimoniTheme
 */
get_header();

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

//Define the loop based on arguments

echo "<h1>test</h1>";

$loop = new WP_Query( $args );

//Display the contents

while ( $loop->have_posts() ) : $loop->the_post();
    global $post
    ?>
    <h1 class="entry-title"><a href="<?php echo $post->guid ?>"><?php the_title(); ?></a></h1>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
<?php endwhile;?>

<?php get_footer() ?>
