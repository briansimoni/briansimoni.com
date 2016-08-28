<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 8/26/16
 * Time: 1:55 PM
 */

get_header();

global $post;


?>

    <div id="content" class="single-post">
        <div class="container">

            <h1 id="post-title"><?php echo $post->post_title ?></h1>

            <div class="row">

                <div class="col-md-4">
                    <div class="post-image">
                        <?php the_post_thumbnail() ?>
                    </div>
                </div>

                <div class="col-md-8">
                    <p><?php echo $post->post_content ?></p>
                </div>

            </div>
            <?php comments_template(); ?>
        </div>
    </div>

<?php get_footer(); ?>