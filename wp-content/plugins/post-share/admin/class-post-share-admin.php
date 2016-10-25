<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.codeui.io
 * @since      1.0.0
 *
 * @package    Post_Share
 * @subpackage Post_Share/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Post_Share
 * @subpackage Post_Share/admin
 * @author     Nicholas Bellucci <nickdbellucci@gmail.com>
 */
require 'aws/aws-autoloader.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class Post_Share_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Post_Share_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Post_Share_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/post-share-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Post_Share_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Post_Share_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/post-share-admin.js', array( 'jquery' ), $this->version, false );

	}
    
    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */

    public function add_plugin_admin_menu() {

        /*
         * Add a settings page for this plugin to the Settings menu.
         *
         * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
         *
         *        Administration Menus: http://codex.wordpress.org/Administration_Menus
         *
         */
        add_options_page( 'code ui Post Share', 'Post Share', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
        );
    }

     /**
     * Add settings action link to the plugins page.
     *
     * @since    1.0.0
     */

    public function add_action_links( $links ) {
        /*
        *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
        */
       $settings_link = array(
        '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
       );
       return array_merge(  $settings_link, $links );

    }

    /**
     * Render the settings page for this plugin.
     *
     * @since    1.0.0
     */

    public function display_plugin_setup_page() {
        include_once( 'partials/post-share-admin-display.php' );
    }   
    
     public function post_update() {
        register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
     }
    
    public function validate($input) {
        $valid = array();
        
        $type = 'any';
        $args=array(
        'post_type' => $type,
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'ignore_sticky_posts'=> 1);
        
        $my_query = new WP_Query($args); 

        if( $my_query->have_posts() ) {
            while ($my_query->have_posts()) : $my_query->the_post();
                if($_POST['post'] == get_the_ID()){
                    $fname = get_the_author_meta('first_name');
                    $lname = get_the_author_meta('last_name');
                    $full_name = '';

                    if(empty($fname)){
                        $full_name = $lname;
                    } 
                    elseif(empty($lname)){
                        $full_name = $fname;
                    } 
                    else {
                        $full_name = "{$fname} {$lname}";
                    }
                    
                    if ($_POST['size'] == 'excerpt'){
                        if (strlen(get_the_excerpt()) > 0){
                            $string = get_the_excerpt();
                        }
                        else{
                            $string = get_the_content();
                        }
                        $truncated = (strlen($string) > 125) ? substr($string, 0, 125) . '...' : $string;
                        $arr = array('author' => $full_name, 'post' => get_permalink(), 'title' => get_the_title(), 'excerpt' => $truncated);
                    }
                    else{
                        $string = get_the_content();
                        $arr = array('author' => $full_name, 'post' => get_permalink(), 'title' => get_the_title(), 'content' => $string);
                    }
                    
                    $bucket = 'code-ui-post-share';
                    $keyname = str_replace(" ", "_", get_the_title()).'-'.str_replace(" ", "_", $full_name);
                    
                    $s3 = new Aws\S3\S3Client([
                        'version' => 'latest',
                        'region'  => 'us-east-1',
                        'credentials' => array(
                            'key' => 'AKIAJE5TBDQIOYFUUUCQ',
                            'secret'  => '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',
                          )
                    ]);
                }
            endwhile;
            }
            wp_reset_query();  
        
        try {
            $result = $s3->putObject(array(
                'Bucket' => $bucket,
                'Key'    => $keyname,
                'Body'   => json_encode($arr)
            ));
        } catch (S3Exception $e) {
            echo $e->getMessage() . "\n";
        }
        
        return $valid;
    }  

}
