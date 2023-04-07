    <!--Call Start-->
    <div class="call-us" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['cta_background']; ?>)">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-12">
                    <img src="<?php echo base_url();?>/public/uploads/helmet.png" data-no-retina="">
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="call-text">
                        <h3><?php echo $setting['cta_text']; ?></h3>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-12">
                    <div class="button">
                        <a href="<?php echo $setting['cta_button_url']; ?>"><?php echo $setting['cta_button_text']; ?> <i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Call End-->

    <!--Footer-Area Start-->
    <div class="footer-area-bg"><!-- start footer-area-bg -->
    <div class="footer-area pt_60 pb_60">
        <div class="container">
            <div class="row">
                <!-- infos -->
                <div class="col-lg-6 col-md-6">
                    <div class="footer-item">
                        <h3><?php echo $setting['footer_col4_title']; ?></h3>
                        <div class="footer-address-item">
                            <div class="icon"><i class="fa fa-map-marker"></i></div>
                            <div class="text">
                                    <span>
                                        <?php echo nl2br($setting['footer_address']); ?>
                                    </span>
                            </div>
                        </div>
                        <div class="footer-address-item">
                            <div class="icon"><i class="fa fa-phone"></i></div>
                            <div class="text">
                                    <span>
                                        <?php echo nl2br($setting['footer_phone']); ?>
                                    </span>
                            </div>
                        </div>
                        <div class="footer-address-item">
                            <div class="icon"><i class="fas fa-envelope"></i></div>
                            <div class="text">
                                    <span>
                                        <?php echo nl2br($setting['footer_email']); ?>
                                    </span>
                            </div>
                        </div>
                        <ul class="footer-social">
                            <?php foreach ($socials as $social): ?>
                                <?php if($social['social_url']!=''):?>
                                    <li><a href="<?php echo $social['social_url'];?>"><i class="<?php echo $social['social_icon'];?>"></i></a></li>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <!-- ./infos -->
                <!-- newsletter -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item" id="newsletter">
                        <h3><?php echo $setting['footer_col1_title']; ?></h3>
                        <p>
                            <?php echo nl2br($setting['newsletter_text']); ?>
                        </p>
                        <?php if($this->session->flashdata('error')): ?>
                            <div class="error-class"><?php echo $this->session->flashdata('error');?></div>';
                        <?php endif;?>
                        <?php if($this->session->flashdata('success')): ?>
                            <div class="success-class"><?php echo $this->session->flashdata('success');?></div>
                        <?php endif;?>
                        <?php echo form_open(base_url('newsletter/send'), array('class' => '')); ?>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="<?php echo EMAIL_ADDRESS; ?>" name="email_subscribe" required>
                            <span class="input-group-btn">
                                <button class="btn" type="submit" name="form_subscribe"><i class="fa fa-location-arrow"></i></button>
                            </span>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <!-- ./newsletter -->
                <!-- portfolio -->
                <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h3><?php echo $setting['footer_col3_title']; ?></h3>
                            <div class="row pl-10 pr-10">
                                <?php foreach($portfolio_footer as $key => $row):?>
                                    <?php if($key++ > $setting['footer_recent_portfolio_item']) {break;}?>
                                    <div class="col-4 footer-project">
                                        <a href="<?php echo base_url('portfolio/view/'.$row['id']); ?>">
                                            <img src="<?php echo base_url('public/uploads/portfolio/'.$row['photo']); ?>" alt="Portfolio Photo">
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <!-- ./portfolio -->
            </div>
        </div>
    </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="outer-box">
                    <div class="copyright-text">
                        <p> <?php echo $setting['footer_copyright']; ?></p>
                    </div>
                    <div class="footer-menu-bottom">
                        <ul>
                            <li><a href="<?php echo base_url('impressum'); ?>">Impressum</a></li>
                            <li><a href="<?php echo base_url('datenschutz'); ?>">Datenschutz</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <!--Footer-Area End-->
    </div><!-- end footer-area-bg -->

    <!--Scroll-Top-->
    <div class="scroll-top">
        <i class="fa fa-angle-up"></i>
    </div>
    <!--Scroll-Top-->


    <!--Js-->
    <script src="<?php echo base_url('public/'.FRONTEND.'js/jquery-2.2.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/'.FRONTEND.'js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/'.FRONTEND.'js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/'.FRONTEND.'js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/'.FRONTEND.'js/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/'.FRONTEND.'js/jquery.magnific-popup.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/'.FRONTEND.'js/jquery.meanmenu.js'); ?>"></script>
    <script src="<?php echo base_url('public/'.FRONTEND.'js/jquery.filterizr.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/'.FRONTEND.'js/jquery.counterup.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/'.FRONTEND.'js/waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/'.FRONTEND.'js/viewportchecker.js'); ?>"></script>
    <script src="<?php echo base_url('public/'.FRONTEND.'js/custom.js?v=1.0'); ?>"></script>
    <script src="<?php echo base_url('public/plugins/cookie/js/cookiebar.js?v=1.0'); ?>"></script>
</body>
</html>