<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 8/26/16
 * Time: 12:53 PM
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="icon" href="/wp-content/themes/simoni/images/koala.ico">

    <title>Brian Simoni</title>
    <?php wp_head(); ?>

</head>

<body>


<div id="wrapper">

    <div id="header">
        <div class="container">
            <a href="/"><img id="logo" src="/wp-content/themes/simoni/images/koalalogo.png"></a>
<!--            <h1>Brian Simoni</h1>-->

            <nav class="navbar navbar-light bg-faded pull-right">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>


                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'container'      =>  false,
                                'menu_class'     =>  "nav navbar-nav"
                            ) );
                            ?>
                        <?php endif; ?>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

        </div>

    </div><!-- #header -->