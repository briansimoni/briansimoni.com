<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <?php global $post;

    echo "<h1>" . $post->post_title . "</h1>";



    ?>
</div><!-- .content-area -->

<?php get_footer(); ?>
