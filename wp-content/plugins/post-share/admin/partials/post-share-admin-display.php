<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.codeui.io
 * @since      1.0.0
 *
 * @package    Post_Share
 * @subpackage Post_Share/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
    <p>Which post would you like to submit to code ui?</p>
    
    <form method="post" name="post_submission" action="options.php">
        
        <?php settings_fields($this->plugin_name); ?>
            
        <fieldset>
            <legend class="screen-reader-text"><span>input type="radio"</span></legend>
            <?php
                $type = 'post';
                $args=array(
                'post_type' => $type,
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'ignore_sticky_posts'=> 1);

                $my_query = new WP_Query($args); 

                if( $my_query->have_posts() ) {
                    $i = 0;
                    while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <label for="<?php echo $this->plugin_name; ?>">
                            <input type="radio" name="post" id="<?php echo $i; ?>-post" value="<?php echo get_the_ID(); ?>" />
                            <span><?php echo get_the_title();  ?></span>
                        </label><br>
                    <?php
                    $i++;
                    endwhile;
                }
                wp_reset_query();  
            ?>
        </fieldset>

        <br>
        <fieldset>
            <legend class="screen-reader-text"><span>input type="radio"</span></legend>
            <label for='<?php echo $this->plugin_name; ?>-post_size'>
                <input type="radio" name="size" id="full-post" value="full" />
                <span><?php esc_attr_e( 'Full Post', 'wp_admin_style' ); ?></span>
            </label><br>
            <label for='<?php echo $this->plugin_name; ?>'>
                <input type="radio" name="size" id="post-excerpt" value="excerpt" />
                <span><?php esc_attr_e( 'Excerpt', 'wp_admin_style' ); ?></span>
            </label>
        </fieldset>

        <br>
        <input class="button-primary" type="submit" name="Example" value="<?php esc_attr_e( 'Submit for Review' ); ?>" />
        
    </form>
    
</div>