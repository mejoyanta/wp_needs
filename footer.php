   
    <footer>
        <div>
            <div class="container">
                <div id="footer_wrapper" class="row">
                    <div class="col-12">
                        <div class="footer_img" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/images/footer_top_bg.png');"></div>
                    </div>
                    <div class="col-7">
                        <div class="footer_menu">
                            <ul class="list-none">
                            <div class="footer_list">
                                <?php  wp_nav_menu(array(
                                        'menu' => "footer_menu",
                                        'menu_class' => "d-flex",
                                        'add_li_class'  => 'nav-item',
                                        'theme_location' => 'footer_menu',
                                    ));
                                ?>
                            </div>
                            </ul>
                        </div>
                        <div class="note">
                            <p>Site was last updated: 2022-02-23 11:32:14</p>
                        </div>
                    </div>
                    <div class="col-5 ">
                        <div class="sup d-flex justify-content-end">
                            <p>Planning and Implementation: a2i, Cabinet Division, BCC, BASIS, DOICT</p>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <p>Technical Support: </p>
                            <div class="tech_sup">
                                <img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/assets/images/np-logo-set.png" alt="logo_set">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
    <?php wp_footer(); ?>
</body>

</html>