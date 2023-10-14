<?php
include "./frontend_inc/header.php";
include "./database/env.php";
$bannerQuery = "SELECT * FROM banner_add WHERE statas = 1 limit 1 ";
$res = mysqli_query($conn, $bannerQuery);
$banners = mysqli_fetch_assoc($res);
// print_r($banners);
// exit();

$food_category = "SELECT * FROM store_category";
$food_ex = mysqli_query($conn,$food_category);
$all_food_category = mysqli_fetch_all($food_ex,1);
// print_r($all_food_category);
// for category_banner
$category_banner = "SELECT * FROM category_banner";
$query = mysqli_query($conn,$category_banner);
$all_banner_category = mysqli_fetch_all($query,1);

// for about
$about_select = "SELECT about_img, number, about_title, video_img, video  FROM about_table WHERE statas=1";

$about_res = mysqli_query($conn,$about_select);

$all_about = mysqli_fetch_assoc($about_res);
// $a = $all_about['video'];

// print_r($a);

// for event

$select_event = "SELECT * FROM event_table WHERE satatas = 1";
$select_query = mysqli_query($conn,$select_event);

$allevent = mysqli_fetch_all($select_query,1);


// foreach($allevent as $res){
//   // print_r($res);
// }
// print_r($allevent);











// for masterchif

$master_chif_query = "SELECT title, details, chif_category, banner_img FROM master_chif WHERE statas = 1";

$master_chif_ex = mysqli_query($conn,$master_chif_query);

$master_res = mysqli_fetch_assoc($master_chif_ex);

// for patista

$patissier_chif_query = "SELECT title, details, chif_category, banner_img FROM patissier_table WHERE statas = 1";

$patissier_chif_ex = mysqli_query($conn,$patissier_chif_query);

$patissier_res = mysqli_fetch_assoc($patissier_chif_ex);

// print_r($patissier_res);
// exit();

// cook

$cook_chif_query = "SELECT title, details, chif_category, banner_img FROM cook_table WHERE satatas = 1";

$cook_chif_ex = mysqli_query($conn,$cook_chif_query);

$cook_res = mysqli_fetch_assoc($cook_chif_ex);





?>

<!-- ======= Hero Section ======= -->
<?php

if (mysqli_num_rows($res) > 0) {
?>
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">
            <?= $banners['title'] ?>
          </h2>
          <p data-aos="fade-up" data-aos-delay="100">
            <?= $banners['details'] ?>
          </p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="<?= $banners['cta_ltitle'] ?>" class="btn-book-a-table"><?= $banners['cta_ltitle'] ?></a>
            <a href="<?= $banners['video_link'] ?>" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="./uploads/users/<?= $banners['banner_img'] ?>" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->


<?php

}
?>

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>About Us</h2>
        <p>Learn More <span>About Us</span></p>
      </div>

      <div class="row gy-4">
        <div class="col-lg-7 position-relative about-img" style="background-image: url(./uploads/about_img/<?= $all_about['about_img'] ?>) ;" data-aos="fade-up" data-aos-delay="150">
          <div class="call-us position-absolute">
            <h4>Book a Table</h4>
            <p>+88<?=$all_about['number']?></p>
          </div>
        </div>
        <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
          <div class="content ps-0 ps-lg-5">
            <!-- <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
            </p> -->

            <?= $all_about['about_title']?>

            <div class="position-relative mt-4">
              <img src="./uploads/video_img/<?=$all_about['video_img'] ?>" class="img-fluid" alt="">



              <!-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a> -->

              <a href="./uploads/videos/<?=$all_about['video']?>" class="glightbox play-btn"></a>
              
            
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us section-bg">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="why-box">
            <h3>Why Choose Yummy?</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
            </p>
            <div class="text-center">
              <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
        </div><!-- End Why Box -->

        <div class="col-lg-8 d-flex align-items-center">
          <div class="row gy-4">

            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-clipboard-data"></i>
                <h4>Corporis voluptates officia eiusmod</h4>
                <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
              <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-gem"></i>
                <h4>Ullamco laboris ladore pan</h4>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
              <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-inboxes"></i>
                <h4>Labore consequatur incidid dolore</h4>
                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
              </div>
            </div><!-- End Icon Box -->

          </div>
        </div>

      </div>

    </div>
  </section><!-- End Why Us Section -->

  <!-- ======= Stats Counter Section ======= -->
  <section id="stats-counter" class="stats-counter">
    <div class="container" data-aos="zoom-out">

      <div class="row gy-4">

        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Clients</p>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
            <p>Projects</p>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hours Of Support</p>
          </div>
        </div><!-- End Stats Item -->

        <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
            <p>Workers</p>
          </div>
        </div><!-- End Stats Item -->

      </div>

    </div>
  </section><!-- End Stats Counter Section -->





  <!-- ======= Menu Section ======= -->
  <section id="menu" class="menu">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Our Menu</h2>
        <p>Check Our <span>Yummy Menu</span></p>
      </div>

      <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

      <?php
      foreach($all_food_category as $key => $food){  ?>

       <li class="nav-item">
          <a class="nav-link <?= $key==0 ? " active show" : "" ?> " data-bs-toggle="tab" data-bs-target="#manu-<?= str_replace(" ","-",$food['title']) ?>">
            <h4><?= $food['title']?></h4>
          </a>
        </li>



     <?php }
      
      
      
      
      ?>

       
        
        
        <!-- End tab nav item -->

        <!-- <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
            <h4>Breakfast</h4>
          </a> -->
          <!-- End tab nav item -->

        <!-- <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
            <h4>Lunch</h4>
          </a>
        </li> -->
        <!-- End tab nav item -->

        <!-- <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
            <h4>Dinner</h4>
          </a>
        </li> -->
        
        <!-- End tab nav item -->

      </ul>

      

      <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

        

        <?php
        foreach($all_food_category as $key => $food){  ?>

          <div class="tab-pane fade <?= $key==0? "active show" : "" ?>" id="manu-<?= str_replace(" ","-",$food['title']) ?>">
         <div class="tab-header text-center">
            <p>Menu</p>
            <h3><?= $food['title']?></h3>
          </div>

          <div class="row gy-5">
          <?php
          foreach($all_banner_category as $key=> $banner_all){

            if($banner_all['category_id'] == $food['id'] ){ ?>
              <div class="col-lg-4 menu-item">
              <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="./uploads/banner_img/<?=$banner_all['banner_img'] ?>" class="menu-img img-fluid" alt=""></a>
              <h4>  <?=$banner_all['title'] ?></h4>
              <p class="ingredients">
              <?=$banner_all['details'] ?>
              </p>
              <p class="price">
             $ <?=$banner_all['price'] ?>
              </p>
            </div><!-- Menu Item -->

         <?php 
         
        } else{ ?>

          <!-- <h1 class="text-danger">" Taka ki base hoi gaca tomar ,akana taka dea kawabar pawa jai na dolar nia ai sala !</h1> -->
       
      <?php  }

          }?>

         


          </div>
          </div>
        <!-- End Starter Menu Content -->


       <?php

                  }?>

         




        

      </div>

    </div>
  </section><!-- End Menu Section -->








  

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Testimonials</h2>
        <p>What Are They <span>Saying About Us</span></p>
      </div>

      <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="row gy-4 justify-content-center">
                <div class="col-lg-6">
                  <div class="testimonial-content">
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                    <h3>Saul Goodman</h3>
                    <h4>Ceo &amp; Founder</h4>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-2 text-center">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="img-fluid testimonial-img" alt="">
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="row gy-4 justify-content-center">
                <div class="col-lg-6">
                  <div class="testimonial-content">
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                    <h3>Sara Wilsson</h3>
                    <h4>Designer</h4>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-2 text-center">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="img-fluid testimonial-img" alt="">
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="row gy-4 justify-content-center">
                <div class="col-lg-6">
                  <div class="testimonial-content">
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                    <h3>Jena Karlis</h3>
                    <h4>Store Owner</h4>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-2 text-center">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="img-fluid testimonial-img" alt="">
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="row gy-4 justify-content-center">
                <div class="col-lg-6">
                  <div class="testimonial-content">
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-2 text-center">
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="img-fluid testimonial-img" alt="">
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->

  <!-- ======= Events Section ======= -->
  <section id="events" class="events">
    <div class="container-fluid" data-aos="fade-up">

      <div class="section-header">
        <h2>Events</h2>
        <p>Share <span>Your Moments</span> In Our Restaurant</p>
      </div>

      <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">


                    <?php
                    foreach($allevent as $key=>$event){?>

                    <div id="back_img" class="swiper-slide event-item d-flex flex-column justify-content-end " style="background-image: url(./uploads/event_img/<?= $event['banner_img']?>)">
                  <h3><?= $event['title']?></h3>
                  <div class="price align-self-start">$<?=$event['taka']?></div>
                  <p class="description">
                   <?= $event['details'] ?>
                  </p>
                </div>


              
          
          
          
          <!-- End Event item -->





                   <?php }
                    
                    
                    ?>



          <!-- <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/img/events-1.jpg)">
            <h3>Custom Parties</h3>
            <div class="price align-self-start">$99</div>
            <p class="description">
              Quo corporis voluptas ea ad. Consectetur inventore sapiente ipsum voluptas eos omnis facere. Enim facilis veritatis id est rem repudiandae nulla expedita quas.
            </p>
          </div> -->
          
          
          
          <!-- End Event item -->

          <!-- <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/img/events-1.jpg)">
            <h3>Custom Parties</h3>
            <div class="price align-self-start">$99</div>
            <p class="description">
              Quo corporis voluptas ea ad. Consectetur inventore sapiente ipsum voluptas eos omnis facere. Enim facilis veritatis id est rem repudiandae nulla expedita quas.
            </p>
          </div> -->
          <!-- End Event item -->








          <!-- <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/img/events-2.jpg)">
            <h3>Private Parties</h3>
            <div class="price align-self-start">$289</div>
            <p class="description">
              In delectus sint qui et enim. Et ab repudiandae inventore quaerat doloribus. Facere nemo vero est ut dolores ea assumenda et. Delectus saepe accusamus aspernatur.
            </p>
          </div> -->
          <!-- End Event item -->

          <!-- <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/img/events-3.jpg)">
            <h3>Birthday Parties</h3>
            <div class="price align-self-start">$499</div>
            <p class="description">
              Laborum aperiam atque omnis minus omnis est qui assumenda quos. Quis id sit quibusdam. Esse quisquam ducimus officia ipsum ut quibusdam maxime. Non enim perspiciatis.
            </p>
          </div> -->
          <!-- End Event item -->















        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Events Section -->

  <!-- ======= Chefs Section ======= -->
  <section id="chefs" class="chefs section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Chefs</h2>
        <p>Our <span>Proffesional</span> Chefs</p>
      </div>

      <div class="row gy-4">

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="chef-member">
            <div class="member-img">
              <img src="./uploads/chif_img/<?= $master_res['banner_img']?>" class="img-fluid" alt="">
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4><?= $master_res['title']?></h4>
              <span><?= $master_res['chif_category']?></span>
              <p><?= $master_res['details']?></p>
            </div>
          </div>
        </div><!-- End Chefs Member -->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="chef-member">
            <div class="member-img">
              <img src="./uploads/patissier_img/<?=$patissier_res['banner_img']?>" class="img-fluid" alt="">
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4><?= $patissier_res['title']?></h4>
              <span><?= $patissier_res['chif_category']?></span>
              <p><?= $patissier_res['details']?></p>
            </div>
          </div>

          <!-- Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit corporis. Voluptate sed quas reiciendis animi neque sapiente. -->
        </div><!-- End Chefs Member -->




        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
          <div class="chef-member">
            <div class="member-img">
              <img src="./uploads/cook_img/<?=$cook_res['banner_img']?>" class="img-fluid" alt="">
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4><?= $cook_res['title']?></h4>
              <span><?= $cook_res['chif_category']?></span>
              <p><?= $cook_res['details']?></p>
            </div>
          </div>
        </div><!-- End Chefs Member -->


       










      </div>

    </div>
  </section><!-- End Chefs Section -->

  <!-- ======= Book A Table Section ======= -->
  <section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Book A Table</h2>
        <p>Book <span>Your Stay</span> With Us</p>
      </div>

      <div class="row g-0">

        <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);" data-aos="zoom-out" data-aos-delay="200"></div>

        <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
          <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
              <div class="col-lg-4 col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6">
                <input type="text" name="date" class="form-control" id="date" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6">
                <input type="text" class="form-control" name="time" id="time" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6">
                <input type="number" class="form-control" name="people" id="people" placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Book a Table</button></div>
          </form>
        </div><!-- End Reservation Form -->

      </div>

    </div>
  </section><!-- End Book A Table Section -->

  <!-- ======= Gallery Section ======= -->
  <section id="gallery" class="gallery section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>gallery</h2>
        <p>Check <span>Our Gallery</span></p>
      </div>

      <div class="gallery-slider swiper">
        <div class="swiper-wrapper align-items-center">
          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-1.jpg"><img src="assets/img/gallery/gallery-1.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-2.jpg"><img src="assets/img/gallery/gallery-2.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-3.jpg"><img src="assets/img/gallery/gallery-3.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-4.jpg"><img src="assets/img/gallery/gallery-4.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-5.jpg"><img src="assets/img/gallery/gallery-5.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-6.jpg"><img src="assets/img/gallery/gallery-6.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-7.jpg"><img src="assets/img/gallery/gallery-7.jpg" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-8.jpg"><img src="assets/img/gallery/gallery-8.jpg" class="img-fluid" alt=""></a></div>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Gallery Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Contact</h2>
        <p>Need Help? <span>Contact Us</span></p>
      </div>

      <div class="mb-3">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div><!-- End Google Maps -->

      <div class="row gy-4">

        <div class="col-md-6">
          <div class="info-item  d-flex align-items-center">
            <i class="icon bi bi-map flex-shrink-0"></i>
            <div>
              <h3>Our Address</h3>
              <p>A108 Adam Street, New York, NY 535022</p>
            </div>
          </div>
        </div><!-- End Info Item -->

        <div class="col-md-6">
          <div class="info-item d-flex align-items-center">
            <i class="icon bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email Us</h3>
              <p>contact@example.com</p>
            </div>
          </div>
        </div><!-- End Info Item -->

        <div class="col-md-6">
          <div class="info-item  d-flex align-items-center">
            <i class="icon bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Call Us</h3>
              <p>+1 5589 55488 55</p>
            </div>
          </div>
        </div><!-- End Info Item -->

        <div class="col-md-6">
          <div class="info-item  d-flex align-items-center">
            <i class="icon bi bi-share flex-shrink-0"></i>
            <div>
              <h3>Opening Hours</h3>
              <div><strong>Mon-Sat:</strong> 11AM - 23PM;
                <strong>Sunday:</strong> Closed
              </div>
            </div>
          </div>
        </div><!-- End Info Item -->

      </div>

      <form action="forms/contact.php" method="post" role="form" class="php-email-form p-3 p-md-4">
        <div class="row">
          <div class="col-xl-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
          </div>
          <div class="col-xl-6 form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        <div class="my-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>
        <div class="text-center"><button type="submit">Send Message</button></div>
      </form>
      <!--End Contact Form -->

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->




<?php
include "./frontend_inc/footer.php";

?>








<!-- 


<div class="tab-pane fade" id="menu-breakfast">

<div class="tab-header text-center">
  <p>Menu</p>
  <h3>Breakfast</h3>
</div>

<div class="row gy-5">

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
    <h4>Magnam Tiste</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $5.95
    </p>
  </div>
  Menu Item 

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-2.png" class="glightbox"><img src="assets/img/menu/menu-item-2.png" class="menu-img img-fluid" alt=""></a>
    <h4>Aut Luia</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $14.95
    </p>
  </div><!-- Menu Item 

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-3.png" class="glightbox"><img src="assets/img/menu/menu-item-3.png" class="menu-img img-fluid" alt=""></a>
    <h4>Est Eligendi</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $8.95
    </p>
  </div><!-- Menu Item 

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-4.png" class="glightbox"><img src="assets/img/menu/menu-item-4.png" class="menu-img img-fluid" alt=""></a>
    <h4>Eos Luibusdam</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $12.95
    </p>
  </div><!-- Menu Item 

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-5.png" class="glightbox"><img src="assets/img/menu/menu-item-5.png" class="menu-img img-fluid" alt=""></a>
    <h4>Eos Luibusdam</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $12.95
    </p>
  </div><!-- Menu Item 

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-6.png" class="glightbox"><img src="assets/img/menu/menu-item-6.png" class="menu-img img-fluid" alt=""></a>
    <h4>Laboriosam Direva</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $9.95
    </p>
  </div><!-- Menu Item -->

</div>
</div>
<!-- End Breakfast Menu Content 

<div class="tab-pane fade" id="menu-lunch">

<div class="tab-header text-center">
  <p>Menu</p>
  <h3>Lunch</h3>
</div>

<div class="row gy-5">

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
    <h4>Magnam Tiste</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $5.95
    </p>
  </div><!-- Menu Item 

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-2.png" class="glightbox"><img src="assets/img/menu/menu-item-2.png" class="menu-img img-fluid" alt=""></a>
    <h4>Aut Luia</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $14.95
    </p>
  </div><!-- Menu Item 

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-3.png" class="glightbox"><img src="assets/img/menu/menu-item-3.png" class="menu-img img-fluid" alt=""></a>
    <h4>Est Eligendi</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $8.95
    </p>
  </div><!-- Menu Item 

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-4.png" class="glightbox"><img src="assets/img/menu/menu-item-4.png" class="menu-img img-fluid" alt=""></a>
    <h4>Eos Luibusdam</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $12.95
    </p>
  </div><!-- Menu Item 

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-5.png" class="glightbox"><img src="assets/img/menu/menu-item-5.png" class="menu-img img-fluid" alt=""></a>
    <h4>Eos Luibusdam</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $12.95
    </p>
  </div><!-- Menu Item 

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-6.png" class="glightbox"><img src="assets/img/menu/menu-item-6.png" class="menu-img img-fluid" alt=""></a>
    <h4>Laboriosam Direva</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $9.95
    </p>
  </div><!-- Menu Item

</div>
</div><!-- End Lunch Menu Content 

<div class="tab-pane fade" id="menu-dinner">

<div class="tab-header text-center">
  <p>Menu</p>
  <h3>Dinner</h3>
</div>

<div class="row gy-5">

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
    <h4>Magnam Tiste</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $5.95
    </p>
  </div><!-- Menu Item

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-2.png" class="glightbox"><img src="assets/img/menu/menu-item-2.png" class="menu-img img-fluid" alt=""></a>
    <h4>Aut Luia</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $14.95
    </p>
  </div><!-- Menu Item

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-3.png" class="glightbox"><img src="assets/img/menu/menu-item-3.png" class="menu-img img-fluid" alt=""></a>
    <h4>Est Eligendi</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $8.95
    </p>
  </div><!-- Menu Item 

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-4.png" class="glightbox"><img src="assets/img/menu/menu-item-4.png" class="menu-img img-fluid" alt=""></a>
    <h4>Eos Luibusdam</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $12.95
    </p>
  </div><!-- Menu Item 

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-5.png" class="glightbox"><img src="assets/img/menu/menu-item-5.png" class="menu-img img-fluid" alt=""></a>
    <h4>Eos Luibusdam</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $12.95
    </p>
  </div><!-- Menu Item 

  <div class="col-lg-4 menu-item">
    <a href="assets/img/menu/menu-item-6.png" class="glightbox"><img src="assets/img/menu/menu-item-6.png" class="menu-img img-fluid" alt=""></a>
    <h4>Laboriosam Direva</h4>
    <p class="ingredients">
      Lorem, deren, trataro, filede, nerada
    </p>
    <p class="price">
      $9.95
    </p>
  </div><!-- Menu Item 

</div>
</div>End Dinner Menu Content 






<!-- 

<div class="col-lg-4 menu-item">
              <a href="assets/img/menu/menu-item-2.png" class="glightbox"><img src="assets/img/menu/menu-item-2.png" class="menu-img img-fluid" alt=""></a>
              <h4>Aut Luia</h4>
              <p class="ingredients">
                Lorem, deren, trataro, filede, nerada
              </p>
              <p class="price">
                $14.95
              </p>
            </div>
            
          Menu Item 

            <div class="col-lg-4 menu-item">
              <a href="assets/img/menu/menu-item-3.png" class="glightbox"><img src="assets/img/menu/menu-item-3.png" class="menu-img img-fluid" alt=""></a>
              <h4>Est Eligendi</h4>
              <p class="ingredients">
                Lorem, deren, trataro, filede, nerada
              </p>
              <p class="price">
                $8.95
              </p>
            </div> Menu Item 

            <div class="col-lg-4 menu-item">
              <a href="assets/img/menu/menu-item-4.png" class="glightbox"><img src="assets/img/menu/menu-item-4.png" class="menu-img img-fluid" alt=""></a>
              <h4>Eos Luibusdam</h4>
              <p class="ingredients">
                Lorem, deren, trataro, filede, nerada
              </p>
              <p class="price">
                $12.95
              </p>
            </div> Menu Item

            <div class="col-lg-4 menu-item">
              <a href="assets/img/menu/menu-item-5.png" class="glightbox"><img src="assets/img/menu/menu-item-5.png" class="menu-img img-fluid" alt=""></a>
              <h4>Eos Luibusdam</h4>
              <p class="ingredients">
                Lorem, deren, trataro, filede, nerada
              </p>
              <p class="price">
                $12.95
              </p>
            </div>-- Menu Item --

            <div class="col-lg-4 menu-item">
              <a href="assets/img/menu/menu-item-6.png" class="glightbox"><img src="assets/img/menu/menu-item-6.png" class="menu-img img-fluid" alt=""></a>
              <h4>Laboriosam Direva</h4>
              <p class="ingredients">
                Lorem, deren, trataro, filede, nerada
              </p>
              <p class="price">
                $9.95
              </p>
            </div>Menu Item -->