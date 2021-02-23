 
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theRevisedCafe
 */

get_header();
?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=218525335696094&autoLogAppEvents=1" nonce="8H79Ri07"></script>
<main id="primary" class="site-main">

  <!-- Start slider  -->
  <section id="mu-slider">
    <div class="mu-slider-area"> 



    


      <!-- Top slider -->

      
    
    
      <div class="mu-top-slider">
      <?php $slider_repeater = get_theme_mod( 'slider_repeater'); ?>
                
                <?php foreach($slider_repeater as $slider): ?>
        <!-- Top slider single slide -->
        <div class="mu-top-slider-single">
          <img src="<?php echo  wp_get_attachment_image_src($slider['slider_image'])[0]; ?>" alt="img">
          <!-- Top slider content -->
          <div class="mu-top-slider-content">
            <span class="mu-slider-small-title"><?php echo $slider['slider_title']; ?></span>
            <h2 class="mu-slider-title"><?php echo $slider['slider_sub_title']; ?></h2>
            <p><?php echo $slider['slider_desc']; ?></p>  

            <a href="#mu-reservation" class="mu-readmore-btn mu-reservation-btn"><?php echo $slider['slider_button']; ?></a>
          </div>
          <!-- / Top slider content -->
        </div>
        <?php endforeach; ?>
           

      </div>
    </div>
  </section>
  <!-- End slider  -->

  <?php 
    $home_about_header = get_theme_mod("about_header");
    $home_about_subheader = get_theme_mod("about_subheader");
    $home_about_description = get_theme_mod("about_editor");
  ?>
  <!-- Start About us -->
  <section id="mu-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">

            <div class="mu-title">
              <span class="mu-subtitle"><?php echo $home_about_header; ?></span>
              <h2><?php echo $home_about_subheader; ?></h2>
            </div>
            <?php
            $image = get_theme_mod( 'image_setting_url', '' ); 
            

?>
            <div class="row">
              <div class="col-md-6">
               <div class="mu-about-us-left">
               
              
                <img src="<?php echo $image;  ?>" alt="img">           
                </div>
              </div>
              <div class="col-md-6">
                 <div class="mu-about-us-right">
                 <?php echo $home_about_description; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End About us -->
<?php
  $counterbg = get_theme_mod( 'counter_bg_image', '' ); 
  ?>
  <!-- Start Counter Section -->
  <section id="mu-counter" style="background-image: url('<?php echo $counterbg; ?>'  );">
    <div class="mu-counter-overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="mu-counter-area">

              <ul class="mu-counter-nav">

        
                <?php $counter_repeater = get_theme_mod( 'counter_repeater'); ?>
                
                <?php foreach($counter_repeater as $counter): ?>
                <li class="col-md-3 col-sm-3 col-xs-12">
                  <div class="mu-single-counter">
                    <span><?php echo $counter['counter_item']; ?></span>
                    <h3><span class="counter-value" data-count="160"><?php echo $counter['counter_number']; ?></span><sup>+</sup></h3>
                    <p><?php echo $counter['counter_sub-item']; ?></p>
                  </div>
                </li>
                <?php endforeach; ?>
            

              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Counter Section --> 

    <?php
        $discover_menu_header = get_theme_mod("discover_menu_header");
        $discover_menu_subheader = get_theme_mod("discover_menu_subheader");
    ?>
  <!-- Start Restaurant Menu -->
  <section id="mu-restaurant-menu">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-restaurant-menu-area">

            <div class="mu-title">
              <span class="mu-subtitle"><?php echo $discover_menu_header; ?></span>
              <h2><?php echo $discover_menu_subheader; ?></h2>
            </div>
            
            <div class="mu-restaurant-menu-content">
              <ul class="nav nav-tabs mu-restaurant-menu">
              <?php echo "what"; ?>
\
                <li class="active"><a href="#breakfast" data-toggle="tab">Breakfast</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="breakfast">
                  <div class="mu-tab-content-area">
                    <div class="row">


                      <div class="col-md-6">
                        <div class="mu-tab-content-left">
                          <ul class="mu-menu-item-nav">
                            <li>
                              <div class="media">
                                <div class="media-left">
                                  <a href="#">
                                    <img class="media-object" src="assets/img/menu/item-1.jpg" alt="img">
                                  </a>
                                </div>
                                <div class="media-body">
                                  <h4 class="media-heading"><a href="#">English Breakfast</a></h4>
                                  <span class="mu-menu-price">$15.85</span>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.</p>
                                </div>
                              </div>
                            </li>
                          </ul>   
                        </div>
                      </div>
                    
                     <div class="col-md-6">
                       <div class="mu-tab-content-right">
                          <ul class="mu-menu-item-nav">
                             <li>
                              <div class="media">
                                <div class="media-left">
                                  <a href="#">
                                    <img class="media-object" src="assets/img/menu/item-1.jpg" alt="img">
                                  </a>
                                </div>
                                <div class="media-body">
                                  <h4 class="media-heading"><a href="#">Indian Breakfast</a></h4>
                                  <span class="mu-menu-price">$15.85</span>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nulla aliquid praesentium dolorem commodi illo.</p>
                                </div>
                              </div>
                            </li>
                          </ul>   
                       </div>
                     </div>

                   </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Restaurant Menu -->

  <!-- Start Reservation section -->
  <?php 
    $reservation_title = get_theme_mod("reservation_title");
    
    $reservation_desc = get_theme_mod("reservation_desc");
  ?>
  <section id="mu-reservation">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-reservation-area">

            <div class="mu-title">
              <span class="mu-subtitle"><?php echo $reservation_title; ?></span>
         
            </div>

            <div class="mu-reservation-content">
              <p><?php echo $reservation_desc; ?></p>

              <div class="col-md-6">
                <div class="mu-reservation-left">
                  <form class="mu-reservation-form">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">                       
                          <input type="text" class="form-control" placeholder="Full Name">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">                        
                          <input type="email" class="form-control" placeholder="Email">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">                        
                          <input type="text" class="form-control" placeholder="Phone Number">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <select class="form-control">
                            <option value="0">How Many?</option>
                            <option value="1 Person">1 Person</option>
                            <option value="2 People">2 People</option>
                            <option value="3 People">3 People</option>
                            <option value="4 People">4 People</option>
                            <option value="5 People">5 People</option>
                            <option value="6 People">6 People</option>
                            <option value="7 People">7 People</option>
                            <option value="8 People">8 People</option>
                            <option value="9 People">9 People</option>
                            <option value="10 People">10 People</option>
                          </select>                      
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" class="form-control" id="datepicker" placeholder="Date">              
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea class="form-control" cols="30" rows="10" placeholder="Your Message"></textarea>
                        </div>
                      </div>
                      <button type="submit" class="mu-readmore-btn">Make Reservation</button>
                    </div>
                  </form>    
                </div>
              </div>
              <?php 
    $opening_hours = get_theme_mod("opening_hours");
    $daysTime = get_theme_mod("daysTime");
   
  ?>
              <div class="col-md-5 col-md-offset-1">
                <div class="mu-reservation-right">
                  <div class="mu-opening-hour">
                    <h2><?php echo $opening_hours; ?></h2>
                      <ul class="list-unstyled">
                        <li>
                        <?php echo $daysTime; ?>
                            <!-- <p>Monday &amp; Tuesday</p>
                            <p>9:00 AM - 4:00 PM</p>
                        </li>
                        <li>
                            <p>Wednesday &amp; Thursday</p>
                            <p>9:00 AM - Midnight</p>
                        </li>
                        <li>
                            <p>Friday &amp; Saturday</p>
                            <p>9:00 AM - Midnight</p>
                        </li>
                        <li>
                            <p>Sunday</p>
                            <p>9:00 AM - 11:00 PM</p> -->
                        </li>
                      </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  
  <!-- End Reservation section -->

  <!-- Start Gallery -->

  <?php 
    $gallery_title = get_theme_mod("gallery_title");
    
    
  ?>
  <section id="mu-gallery">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-gallery-area">

            <div class="mu-title">
              <span class="mu-subtitle"><?php echo $gallery_title; ?></span>
              <!-- <h2>Our Gallery</h2> -->
            </div>

            <div class="mu-gallery-content">
            
              <!-- Start gallery image -->
              <div class="mu-gallery-body">
                <!-- start single gallery image -->




                <?php $gallery_repeater = get_theme_mod( 'gallery_repeater'); ?>
                
                <?php foreach($gallery_repeater as $gallery): ?>




                <div class="mu-single-gallery col-md-4">
                    <div class="mu-single-gallery-item">
	                    <figure class="mu-single-gallery-img">
	                      <a class="mu-imglink" href="<?php echo  wp_get_attachment_image_src($gallery['gallery_image'])[0]; ?>">
                          <img alt="img" src="<?php echo  wp_get_attachment_image_src($gallery['gallery_image'])[0]; ?>">
                           <div class="mu-single-gallery-info">
                              <img class="mu-view-btn" src="<?php echo get_template_directory_uri().'/assets/img/plus.png'; ?>" alt="plus icon img">
                          </div> 
                        </a>
	                    </figure>            
                  	</div>
                </div>
                <?php endforeach; ?>
 

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Gallery -->
  
  <!-- Start Client Testimonial section -->
  <?php 
    $testimonials = get_theme_mod("testimonials_section");
    $testimonials_sub_title = get_theme_mod("testimonials_sub_title");
     $image = get_theme_mod( 'image_setting_url', '' ); 
  ?>
  <section id="mu-client-testimonial" style="background-image: url('<?php echo $image; ?>'  );">
    <div class="mu-overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="mu-client-testimonial-area">

              <div class="mu-title">
                <span class="mu-subtitle"><?php echo $testimonials; ?></span>
                <h2><?php echo $testimonials_sub_title; ?></h2>
              </div>

              <!-- testimonial content -->
              <div class="mu-testimonial-content">
                <!-- testimonial slider -->
                <ul class="mu-testimonial-slider">
                <?php $testimonials_repeater = get_theme_mod( 'testimonials_repeater'); ?>
                
                <?php foreach($testimonials_repeater as $testimonial): ?>
                  <li>
                    <div class="mu-testimonial-single">                   
                      <div class="mu-testimonial-info">
                        <p><?php echo $testimonial['client_testimonial'];?></p>
                      </div>
                      <div class="mu-testimonial-bio">
                        <p>- <?php echo $testimonial['client_name']; ?></p>                      
                      </div>
                    </div>
                  </li>
                  <?php endforeach; ?>

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Client Testimonial section -->
  
  <!-- Start Chef Section -->
  <?php 
    $team_section = get_theme_mod("team_section");
    $members_section = get_theme_mod("members_section");
    
  ?>
  <section id="mu-chef">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-chef-area">

            <div class="mu-title">
              <span class="mu-subtitle"><?php echo $team_section; ?></span>
              <h2><?php  echo $members_section; ?></h2>
            </div>

                      

            <div class="mu-chef-content">
            
              <ul class="mu-chef-nav">
              <?php $team_repeater = get_theme_mod( 'team_repeater'); ?>
                
                <?php foreach($team_repeater as $team): ?>
                <li>
                  <div class="mu-single-chef">
                    <figure class="mu-single-chef-img">
                      <img src="<?php echo  wp_get_attachment_image_src($team['team_image'])[0]; ?>" alt="team img">
                    </figure> 
                    <div class="mu-single-chef-info">
                      <h4><?php echo $team['team_name']; ?> </h4>
                      <span><?php echo $team['team_role']; ?></span>
                    </div>
                    <div class="mu-single-chef-social">
                    <?php if($team['team_facebook']) { ?>
                      <a href="<?php echo $team['team_facebook']; ?>"><i class="fa fa-facebook"></i></a>
                    <?php } ?>
                    <?php if($team['team_twitter']) { ?>
                      <a href="<?php echo $team['team_twitter']; ?>"><i class="fa fa-twitter"></i></a>
                    <?php } ?>
                    <?php if($team['team_instagram']) { ?>
                      <a href="<?php echo $team['team_instagram']; ?>"><i class="fa fa-instagram"></i></a>
                    <?php } ?>
                      <!-- <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-google-plus"></i></a>
                      <a href="#"><i class="fa fa-linkedin"></i></a> -->
                      
                    </div>
                  </div>
                </li>
                
                <?php endforeach; ?>
                </ul>
               
                </div>
                
                </div>
                </div>
                </div>
                </div>
                </section>

  <!-- End Chef Section -->

 

  <!-- Start Contact section -->
  <?php 
    $contact_section = get_theme_mod("contact_section");
    $contact_desc = get_theme_mod("contact_desc");
    
  ?>
  <section id="mu-contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-contact-area">

            <div class="mu-title">
              <span class="mu-subtitle"><?php echo $contact_section; ?></span>
              <h2><?php echo $contact_desc; ?></h2>
            </div>

            <div class="mu-contact-content">
              <div class="row">

                <div class="col-md-6">
                  <div class="mu-contact-left">
                    <!-- Email message div -->
                    <div id="form-messages"></div>
                    <!-- Start contact form -->
                    <form id="ajax-contact" method="post" action="mailer.php" class="mu-contact-form">
                      <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                      </div>
                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                      </div>                      
                      <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                      </div>
                      <div class="form-group">
                        <label for="message">Message</label>                        
                        <textarea class="form-control" id="message" name="message"  cols="30" rows="10" placeholder="Type Your Message" required></textarea>
                      </div>                      
                      <button type="submit" class="mu-send-btn">Send Message</button>
                    </form>
                  </div>
                </div>
                <?php 
    $office_details = get_theme_mod("office_details");
    $phone_no = get_theme_mod("phone_no");
    $email = get_theme_mod("email");
    $location= get_theme_mod("location");
      ?>
                <div class="col-md-6">
                  <div class="mu-contact-right">
                    <div class="mu-contact-widget">
                      <h3>Office Address</h3>
                      <p><?php echo $office_details; ?></p>
                      <address>
                        <p><i class="fa fa-phone"></i><?php echo $phone_no; ?></p>
                        <p><i class="fa fa-envelope-o"></i><?php echo $email; ?></p>
                        <p><i class="fa fa-map-marker"></i><?php echo $location; ?></p>
                      </address>
                    </div>
                    <div class="mu-contact-widget">
                      <h3>Follow Us</h3>                      
                      <address>
                        <!-- <p><span>Monday - Friday</span> 9.00 am to 12 pm</p>
                        <p><span>Saturday</span> 9.00 am to 10 pm</p>
                        <p><span>Sunday</span> 10.00 am to 12 pm</p> -->
                        <div class="fb-page" data-href="https://www.facebook.com/therevisedcafe/" data-tabs="timeline" data-width="" data-height="320" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/therevisedcafe/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/therevisedcafe/">The Revised Cafe</a></blockquote></div>
                      </address>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact section -->

  <!-- Start Map section -->
  <?php 
    $google_map = get_theme_mod("google_map");
     
  ?>
  <section id="mu-map">
    <iframe src="<?php echo $google_map; ?> " width="100%" height="100%" frameborder="0"allowfullscreen></iframe>
  </section>
  <!-- End Map section -->
</main><!-- #main -->

<?php
get_footer();
