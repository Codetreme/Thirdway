  <?php get_header(); ?>

  <section class="home-slider" style="height:550px">
      <div class="Modern-Slider">
      <!-- Item-3 -->
        <div class="item">
          <div class="slider-overlay"></div>
          <div class="img-fill">
            <img src="<?=bloginfo('template_directory')?>/images/banner-the-match.jpg" alt="slide-item-3">
            <div class="info">
              <div class="slider-overlay"></div>
              <div>
                <div class="slider-tbl">
                  <div class="slider-tbl-cell">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <h3>Assess the Benefits.</h3>
                          <h5>Gain access to best-of-breeds funds and fund managers.</h5>
                          <a href="#">Learn More</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- // Item-3 -->
        <!-- Item-4 -->
        <div class="item">
          <div class="img-fill">
            <img src="<?= bloginfo('template_directory')?>/images/banner-the-umbrella.jpg" alt="slide-item-4">
            <div class="info">
              <div class="slider-overlay"></div>
              <div>
                <div class="slider-tbl">
                  <div class="slider-tbl-cell">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <h3>Invest with Us</h3>
                          <h5>We're a growing specialist asset management company.</h5>
                          <a href="#">Learn More</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <!-- Item-1 -->
        <div class="item">
          <div class="img-fill">
            <img src="<?=bloginfo('template_directory')?>/images/banner-the-box.jpg" alt="slide-item-1">
            <div class="info">
              <div class="slider-overlay"></div>
              <div>
                <div class="slider-tbl">
                  <div class="slider-tbl-cell">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <h3>Core Plus Fund.</h3>
                          <h5>We target a blended return of CPI plus 4%.</h5>
                          <a href="#">Learn How</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- // Item-1 -->
        <!-- Item-2 -->
        <div class="item">
          <div class="slider-overlay"></div>
          <div class="img-fill">
            <img src="<?=bloginfo('template_directory')?>/images/banner-the-light.jpg" alt="slide-item-2">
            <div class="info">
              <div class="slider-overlay"></div>
              <div>
                <div class="slider-tbl">
                  <div class="slider-tbl-cell">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-6 text-left">
                          <h3>See the Opportunity.</h3>
                          <h5>From Solar, to Wind Technology.</h5>
                          <a href="#">Lead The Way</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- // Item-2 -->
        
      </div>
  </section>
    
    <!--============================================
      ==Start service section==      
      ============================================-->
    <section class="service_section">
      <div class="container">
        <div class="row">
    
                <?php if ( have_posts() && is_home() || is_page('investment') ) : ?>
                  <div class="col-md-12 header-text"><span>Latest News in Alternative Investment</span> / <a href="#.">Subscribe to our newsletter</a> to get all the latest investment news.</div>
              <div class="col-lg-8">
                    <?php while ( have_posts() ) : the_post(); ?>
                           <?php get_template_part( 'content', 'page' ); ?>
                      <div class="single_service_container-1 mb-30">
                  
                        <div class="service_image">
                          <figure>
                               <img src="<?=bloginfo('template_directory')?>/images/latest-news-01.jpg" alt="service image">
                          </figure>
                          <div class="date"><?=the_time('j F Y')?></div>
                          <div class="<?=bloginfo('template_directory')?>/image-gradient"></div>
                        </div>
                          <div class="service_content pt-23">
                    <h4 class="font-weight-400">
                      <a href="#"><?=the_title()?></a>
                    </h4>
                    <p><?= the_content()?></p>
                    
                          </div>     
                        <div class="clearfix"></div>
                      </div>
                    <?php endwhile;?> 
              </div>
            <?php elseif(is_page('newsinsights')):?>
                    <div class="col-lg-8">
                    <?php while ( have_posts() ) : the_post(); ?>
                           <?php get_template_part( 'content', 'page' ); ?>
                      <div class="single_service_container-1 mb-30">
                  
                        <div class="service_image">
                          <figure>
                               <img src="<?=bloginfo('template_directory')?>/images/latest-news-01.jpg" alt="service image">
                          </figure>
                          <div class="date"><?=the_time('j F Y')?></div>
                          <div class="<?=bloginfo('template_directory')?>/image-gradient"></div>
                        </div>
                          <div class="service_content pt-23">
                    <h4 class="font-weight-400">
                      <a href="#"><?=the_title()?></a>
                    </h4>
                    <p><?= the_content()?></p>
                    
                          </div>     
                        <div class="clearfix"></div>
                      </div>
                    <?php endwhile;?> 
              </div>
            <?php else: ?>
             <div class="col-lg-8">
                <div class="single_service_container-1 mb-30">
                  
                  <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', 'page' ); ?>

                         <p><?= the_content()?></p>
                  <?php endwhile;?>
                </div>
              </div>
                <?php endif;?>
          <?php get_sidebar(); ?>
          
        </div>
      </div>
      
    </section>
    
    <!--============================================
      End service section==
      
      ============================================-->
   
    
    <!-- start 20 yers business-service -->
    <section class="business-service-section">
      <div class="overlay"></div>
      <div class="business-service-tbl">
        <div class="business-service-tbl-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <h1 class="font-weight-400">Providing best business services from last 20 years.</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end 20 yers business-service -->
    
    <!-- start tesimonial section -->
    <section class="tesimonial-section">
      <div class="container">
        <div class="row">
       		<div class="col-lg-6">
            <div class="youtub-video">
          
                <img src="<?=bloginfo('template_directory')?>/images/windmill.jpg" style="width:100%; height:auto; border-radius:2px" />
             
            </div>
          </div>
          <div class="col-lg-6">
            <div class="faq-wrapper">
              <h3>Something About Third Way IP</h3>
              
              <p>Lorem ipsum dolor sit amet, id his omittam intellegat ullamcorper, vix diceret delenit at, quodsi reformidans et pro. Ea eius sensibus duo, cum facer putant et. An ferri omittantur his, illud partiendo quo te, ancillae molestiae signiferumque qui ex. Ex quis facilisis accommodare nam.</p>

<p>Lorem ipsum dolor sit amet, id his omittam intellegat ullamcorper, vix diceret delenit at, quodsi reformidans et pro. Ea eius sensibus duo, cum facer putant et. An ferri omittantur his, illud partiendo quo te, ancillae molestiae signiferumque qui ex. Ex quis facilisis accommodare nam. Id consul propriae constituto pri. Velit aperiam referrentur ea sit. Ne discere legendos nam, no pri everti persius.</p>

<p><a href="#">Read more<i class="fa fa-caret-right load-more-project-wrap"></i></a></p>
              
            </div>
            <!-- /accordion-wrapper -->
          </div>
          <!-- /col-md-6 -->
          
        </div>
        <!-- /row -->
      </div>
    </section>
    <!-- end tesimonial section -->
    <!-- start contact-section -->
    <section class="contact-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="contact-txt text-center">
              <div class="contact-tbl">
                <div class="contact-tbl-cell">
                  <p class="font-weight-500">Get a free consultation</p>
                  <h2 class="font-weight-400">We design the best path to get a successful business which can make you profitable.</h2>
                  <div class="contact-blue-border load-more-project-wrap"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-md-offset-1">
            
          </div>
          <!-- /col-md-5 -->
        </div>
        <!-- /row -->
      </div>
    </section>
    
<?php get_footer(); ?>