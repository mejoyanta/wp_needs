<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="content_wrap container">
<div class="header">
        <div class="top_header">
            <div id="top_header_container" class="container">
                <div class="row justify-content-between">
                    <div class="p-1">
                        <p>Bangladesh National Portal</p>
                    </div>
                    <div class="d-flex p-1">
                        <p><?php echo date('j F, Y'); ?> |</p> &nbsp;
                        <p> English</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mid_header">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-4 pt-2 pl-4">
                        <a href="<?php home_url(); ?>">
                            <?php 
                                if(the_custom_logo('the_custom_logo')){
                                    the_custom_logo();
                                }
                            ?>
                        </a>
                    </div>
                    <div class="col-8 p-0">
                        <div class="d-flex justify-content-end">
                            <ul class="d-flex">
                                <li>
                                    <a class="d-flex" href="#">
                                        <span>
                                            58
                                        </span>
                                        <span>
                                            Ministries <br>
                                            &amp;
                                            Divisions
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex" href="#">
                                        <span>
                                            58
                                        </span>
                                        <span>
                                            Ministries <br>
                                            &amp;
                                            Divisions
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex" href="#">
                                        <span>
                                            58
                                        </span>
                                        <span>
                                            Ministries <br>
                                            &amp;
                                            Divisions
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex" href="#">
                                        <span>
                                            58
                                        </span>
                                        <span>
                                            Ministries <br>
                                            &amp;
                                            Divisions
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex" href="#">
                                        <span>
                                            58
                                        </span>
                                        <span>
                                            Ministries <br>
                                            &amp;
                                            Divisions
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex" href="#">
                                        <span>
                                            58
                                        </span>
                                        <span>
                                            Ministries <br>
                                            &amp;
                                            Divisions
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="search-form">
                            <div class="row justify-content-end">
                                <div class="col-8 offset-2 d-flex justify-content-end">
                                    <form action="">
                                        <input type="text" name="search">
                                        <button>Search</button>
                                    </form>
                                </div>
                                <div class="col-2">
                                    <div class="social_icons">
                                        <a href="#">
                                            <img class="img-fluid" src="<?php echo get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt="facebook">
                                        </a>
                                        <a href="#">
                                            <img class="img-fluid" src="<?php  echo get_theme_file_uri()  ?>/assets/images/youtube-icon.png" alt="youtube">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 p-0">
                    
                    <nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
                        <a class="header_logo" href="#">
                            <img class="img-fluid" src="assets/images/logo_en.png" alt="logo_en">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mr-auto">
                            <?php 
                                wp_nav_menu(array(
                                    'menu' => "main_menu",
                                    'menu_class' => "navbar-nav mr-auto",
                                    'theme_location' => 'primary_menu',
                                ));
                            ?>
                            <!-- <li class="nav-item active">
                              <a class="nav-link" href="#">Home <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">About Bangladesh</a>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Services
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">The bangabhaban</a>
                                <a class="dropdown-item" href="#">The national Pirlament</a>
                                <a class="dropdown-item" href="#">Prime minister</a>
                              </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Service sector</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Trade & business</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About Bangladesh</a>
                            </li> -->
                          </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>