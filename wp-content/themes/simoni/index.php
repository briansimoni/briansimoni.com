<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 8/26/16
 * Time: 12:52 PM
 */

get_header();

?>
<div id="content" class="container homepage-content">
    <div class="row section-3-pictures">

        <div class="col-md-4">
            <div>
                <a href="compsci">
                    <img class="img-circle" src="/wp-content/themes/simoni/images/binary.png">
                </a>
            </div>
            <p>Studying Computer Science at Virginia Commonwealth University</p>
        </div>


        <div class="col-md-4">
            <div>
                <a href="software">
                    <img class="img-circle" src="/wp-content/themes/simoni/images/golang.png">
                </a>
            </div>
            <p>Enthusiast for Software Engineering and Development</p>
        </div>


        <div class="col-md-4">
            <div>
                <a href="ems">
                    <img class="img-circle" src="/wp-content/themes/simoni/images/ambulance.jpg">
                </a>
            </div>
            <p>Volunteer Emergency Medical Technician</p>
        </div>
    </div>

    <?php
    global $wpdb;
    $latest_posts = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_type = 'computer-science' 
                                      OR post_type = 'fire-and-ems' OR post_type = 'software-development'
                                      AND post_status = 'publish' ORDER BY post_date;");

    $last = count($latest_posts) - 1;
    $most_recent_post = $latest_posts[$last];

    ?>

    <div class="latest-post-div post">
        <div class="row">
            <div class="col-md-12">
                <h2>Latest Post</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo $most_recent_post->guid ?>">
                    <h3><?php echo $most_recent_post->post_title ?></h3>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <a href="<?php echo $most_recent_post->guid ?>">
                    <?php echo get_the_post_thumbnail( $most_recent_post ) ?>
                </a>
            </div>
            <div class="col-md-8"><p><?php echo $most_recent_post->post_excerpt ?></p></div>
        </div>
    </div>
</div>



<?php

get_footer();