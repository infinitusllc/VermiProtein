
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Vermi </title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<?php
  $lang = "ge";
  if (isset($_GET['lang'])){
  	$lang = $_GET['lang'];
  }

  //Strings
  include 'includes/str.inc.php';

  include 'includes/publicitems.inc.php';

?>

<!--Navigation bar-->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Ver<span>mi</span></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">

        <li><a href="#news"> <?php echo $navBar_news; ?> </a></li>
        <li><a href="#products"> <?php echo $navBar_products; ?> </a></li>
        <li><a href="#faculity-member"> <?php echo $navBar_members; ?> </a></li>
        <li><a href="#pricing"> <?php echo $navBar_partners; ?> </a></li>
        <li><a href="#contact">  <?php echo $navBar_contact; ?> </a></li>
        
        <?php

            $langSwitch = "<li><a href='?lang=rus'>RUS</a></li>\n"."<li><a href='?lang=eng'>ENG</a></li>";
            if ($lang == "rus"){
                $langSwitch = "<li><a href='?lang=ge'>GEO</a></li>\n"."<li><a href='?lang=eng'>ENG</a></li>";
            } else if ($lang == "eng"){
                $langSwitch = "<li><a href='?lang=ge'>GEO</a></li>\n"."<li><a href='?lang=rus'>RUS</a></li>";
            }

            echo $langSwitch;

        ?>

      </ul>
    </div>
  </div>
</nav>
<!--/ Navigation bar-->
<!--Banner-->
<div class="banner">
  <div class="bg-color">
    <div class="container">
      <div class="row">
        <div class="banner-text text-center">
          <div class="text-border">
            <h2 class="text-dec">Trust & Quality</h2>
          </div>
          <div class="intro-para text-center quote">
            <p class="big-text">Learning Today . . . Leading Tomorrow.</p>
            <p class="small-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium enim repellat sapiente quos architecto<br>Laudantium enim repellat sapiente quos architecto</p>
            <a href="#footer" class="btn get-quote">GET A QUOTE</a>
          </div>
          <a href="#feature" class="mouse-hover"><div class="mouse"></div></a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Banner-->
<?php
    $onclickNews = "allItems.php?lang=".$lang."&itemType=news";
    $onclickProducts = "allItems.php?lang=".$lang."&itemType=products";
    $onclickPartners = "allItems.php?lang=".$lang."&itemType=partners";
    $onclickMembers = "allItems.php?lang=".$lang."&itemType=members";
?>

<!--News-->
 <?php
  	if (count($news) > 0) {
  ?>
<section id ="news" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2><?php echo $news_header; ?></h2>
        <h2><?php echo $news_subheader; ?></h2>

        <hr class="bottom-line">
    </div>
        <?php
           if (count($news) > 0) {
                //display first item
                $n_name = $news[0]['title_'.$lang];
                $n_intro = $news[0]['Intro_'.$lang];
                $n_content = $news[0]['Content_'.$lang];

                $output = "<div class='col-lg-4 col-md-4 col-sm-4'>
                  <div class='pm-staff-profile-container' >
                      <div class='pm-staff-profile-details text-center'>
                          <p class='pm-staff-profile-name'> $n_name </p>
                          <p class='pm-staff-profile-title'> $n_intro </p>
                          <p class='pm-staff-profile-bio'> $n_content </p>
                      </div>
                  </div>
              </div>";

              echo $output;
           } else {
              echo "<p style='text-align:center'> ამჟამად სიიახლეები არ არის / No news available at the moment </p>";
           } if (count($news) > 1) {
                //display second item
              $n_name = $news[1]['title_'.$lang];
              $n_intro = $news[1]['Intro_'.$lang];
              $n_content = $news[1]['Content_'.$lang];

              $output = "<div class='col-lg-4 col-md-4 col-sm-4'>
                <div class='pm-staff-profile-container' >
                    <div class='pm-staff-profile-details text-center'>
                        <p class='pm-staff-profile-name'> $n_name </p>
                        <p class='pm-staff-profile-title'> $n_intro </p>
                        <p class='pm-staff-profile-bio'> $n_content </p>
                    </div>
                </div>
            </div>";

              echo $output;
           } if (count($news) > 2) {
                //display third item
                $n_name = $news[2]['title_'.$lang];
                $n_intro = $news[2]['Intro_'.$lang];
                $n_content = $news[2]['Content_'.$lang];

                $output = "<div class='col-lg-4 col-md-4 col-sm-4'>
                  <div class='pm-staff-profile-container' >
                      <div class='pm-staff-profile-details text-center'>
                          <p class='pm-staff-profile-name'> $n_name </p>
                          <p class='pm-staff-profile-title'> $n_intro </p>
                          <p class='pm-staff-profile-bio'> $n_content </p>
                      </div>
                  </div>
              </div>";

              echo $output;

              echo "<div class='header-section text-center'>
                  <a href=$onclickNews > $seeAll </a>
              </div>";
           }
        ?>       
    </div>
  </div>
</section>
 <?php
    }
  if (count($products) > 0) {
     ?>
<!--/ News-->
<!--products-->
<section id="products" class="section-padding" style="background-color: rgb(247, 247, 247);">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2><?php echo $products_header; ?></h2>
        <p><?php echo $products_subheader; ?></p>
        <hr class="bottom-line">
      </div>

        <?php
           if (count($products) > 0) {
                //display first item
                $n_name = $products[0]['title_'.$lang];
                $n_intro = $products[0]['Intro_'.$lang];
                $n_content = $products[0]['Content_'.$lang];

                $output = "<div class='col-lg-4 col-md-4 col-sm-4'>
                  <div class='pm-staff-profile-container' >
                      <div class='pm-staff-profile-details text-center'>
                          <p class='pm-staff-profile-name'> $n_name </p>
                          <p class='pm-staff-profile-title'> $n_intro </p>
                          <p class='pm-staff-profile-bio'> $n_content </p>
                      </div>
                  </div>
              </div>";

              echo $output;
           } else {
              echo "<p style='text-align:center'> ამჟამად პროდუცქია არ არის / No Products available at the moment </p>";
           } 
           if (count($products) > 1) {
                //display second item
              $n_name = $products[1]['title_'.$lang];
              $n_intro = $products[1]['Intro_'.$lang];
              $n_content = $products[1]['Content_'.$lang];

              $output = "<div class='col-lg-4 col-md-4 col-sm-4'>
                <div class='pm-staff-profile-container' >
                    <div class='pm-staff-profile-details text-center'>
                        <p class='pm-staff-profile-name'> $n_name </p>
                        <p class='pm-staff-profile-title'> $n_intro </p>
                        <p class='pm-staff-profile-bio'> $n_content </p>
                    </div>
                </div>
            </div>";

              echo $output;
           } if (count($products) > 2) {
                //display third item
                $n_name = $products[2]['title_'.$lang];
                $n_intro = $products[2]['Intro_'.$lang];
                $n_content = $products[2]['Content_'.$lang];

                $output = "<div class='col-lg-4 col-md-4 col-sm-4'>
                  <div class='pm-staff-profile-container' >
                      <div class='pm-staff-profile-details text-center'>
                          <p class='pm-staff-profile-name'> $n_name </p>
                          <p class='pm-staff-profile-title'> $n_intro </p>
                          <p class='pm-staff-profile-bio'> $n_content </p>
                      </div>
                  </div>
              </div>";

              echo $output;

              echo "</div> <div class='header-section text-center'>
                  <a href=$onclickProducts > $seeAll </a>
              </div>";
           }
        ?>

     </div>
    </div>
</section>
  <?php
  }
     if (count($members) > 0) {
    ?>
<!--/ products-->

<!--members-->
<section id="faculity-member" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2> <?php echo $members_header; ?> </h2>
        <p> <?php echo $members_subheader; ?> </p>
        <hr class="bottom-line">
      </div>

        <?php
           if (count($members) > 0) {
                //display first item
                $n_name = $members[0]['title_'.$lang];
                $n_intro = $members[0]['Intro_'.$lang];
                $n_content = $members[0]['Content_'.$lang];

                $output = "<div class='col-lg-4 col-md-4 col-sm-4'>
                  <div class='pm-staff-profile-container' >
                      <div class='pm-staff-profile-details text-center'>
                          <p class='pm-staff-profile-name'> $n_name </p>
                          <p class='pm-staff-profile-title'> $n_intro </p>
                          <p class='pm-staff-profile-bio'> $n_content </p>
                      </div>
                  </div>
              </div>";

              echo $output;
           } else {
              echo "<p style='text-align:center'> ამჟამად გუნდის წევრები არ არიან / No team members available at the moment </p>";
           } if (count($members) > 1) {
                //display second item
              $n_name = $members[1]['title_'.$lang];
              $n_intro = $members[1]['Intro_'.$lang];
              $n_content = $members[1]['Content_'.$lang];

              $output = "<div class='col-lg-4 col-md-4 col-sm-4'>
                <div class='pm-staff-profile-container' >
                    <div class='pm-staff-profile-details text-center'>
                        <p class='pm-staff-profile-name'> $n_name </p>
                        <p class='pm-staff-profile-title'> $n_intro </p>
                        <p class='pm-staff-profile-bio'> $n_content </p>
                    </div>
                </div>
            </div>";

              echo $output;
           } if (count($members) > 2) {
                //display third item
                $n_name = $members[2]['title_'.$lang];
                $n_intro = $members[2]['Intro_'.$lang];
                $n_content = $members[2]['Content_'.$lang];

                $output = "<div class='col-lg-4 col-md-4 col-sm-4'>
                  <div class='pm-staff-profile-container' >
                      <div class='pm-staff-profile-details text-center'>
                          <p class='pm-staff-profile-name'> $n_name </p>
                          <p class='pm-staff-profile-title'> $n_intro </p>
                          <p class='pm-staff-profile-bio'> $n_content </p>
                      </div>
                  </div>
              </div>";

              echo $output;

              echo "<div class='header-section text-center'>
                  <a href=$onclickMembers > $seeAll </a>
              </div>";

           }
        ?>      

      </div>
    </div>
</section>
<!--/ Members -->
<?php
     }
  if (count($partners) > 0) {
?>
<!--Partners-->
<section id ="pricing" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2> <?php echo $partners_header; ?> </h2>
        <p> <?php echo $partners_subheader; ?> </p>
        <hr class="bottom-line">
      </div>

        <?php
           if (count($partners) > 0) {
                //display first item
                $n_name = $partners[0]['title_'.$lang];
                $n_intro = $partners[0]['Intro_'.$lang];
                $n_content = $partners[0]['Content_'.$lang];

                $output = "<div class='col-lg-4 col-md-4 col-sm-4'>
                  <div class='pm-staff-profile-container' >
                      <div class='pm-staff-profile-details text-center'>
                          <p class='pm-staff-profile-name'> $n_name </p>
                          <p class='pm-staff-profile-bio'> $n_content </p>
                          <p class='pm-staff-profile-title'> $n_intro </p>
                      </div>
                  </div>
              </div>";

              echo $output;
           } if (count($partners) > 1) {
                //display second item
              $n_name = $partners[1]['title_'.$lang];
              $n_intro = $partners[1]['Intro_'.$lang];
              $n_content = $partners[1]['Content_'.$lang];

              $output = "<div class='col-lg-4 col-md-4 col-sm-4'>
                <div class='pm-staff-profile-container' >
                    <div class='pm-staff-profile-details text-center'>
                        <p class='pm-staff-profile-name'> $n_name </p>
                        <p class='pm-staff-profile-bio'> $n_content </p>
                        <p class='pm-staff-profile-title'> $n_intro </p>
                    </div>
                </div>
            </div>";

              echo $output;
           } if (count($partners) > 2) {
                //display third item
                $n_name = $partners[2]['title_'.$lang];
                $n_intro = $partners[2]['Intro_'.$lang];
                $n_content = $partners[2]['Content_'.$lang];

                $output = "<div class='col-lg-4 col-md-4 col-sm-4'>
                  <div class='pm-staff-profile-container' >
                      <div class='pm-staff-profile-details text-center'>
                          <p class='pm-staff-profile-name'> $n_name </p>
                          <p class='pm-staff-profile-bio'> $n_content </p>
                          <p class='pm-staff-profile-title'> $n_intro </p>
                      </div>
                  </div>
              </div>";

              echo $output;

              echo "<div class='header-section text-center'>
                  <a href=$onclickPartners > $seeAll </a>
              </div>";
           }
        ?>      

    </div>
  </div>
</section>
<!--/ Partners-->
<?php
     }
?>
<!--Contact-->
<section id ="contact" class="section-padding">
  <div class="container">
    <div class="row">

      <div class="header-section text-center">
         <h2> <?php echo $contact_header; ?> </h2>
         <p> <?php echo $contact_subheader; ?> </p>
         <hr class="bottom-line">

         	<div class='col-lg-4 col-md-4 col-sm-4'>
                  <div class='pm-staff-profile-container' >
                      <div class='pm-staff-profile-details text-center'>
                      </div>
                  </div>
            </div>
            <div class='col-lg-4 col-md-4 col-sm-4'>
                  <div class='pm-staff-profile-container' >
                      <div class='pm-staff-profile-details text-center'>
                      	<?php $cont = "Content_".$lang;
            					echo $misc[0][$cont];	?>
                      </div>
                  </div>
            </div>
      </div>

    </div>
  </div>
</section>
<!--/ Contact-->
<!--Footer-->
<footer id="footer" class="footer">
  <div class="container text-center">

    
    <ul class="social-links">
      <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
      <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
      <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
      <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
      <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
    </ul>
    ©2016 Mentor Theme. All rights reserved
    <div class="credits">
      <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Mentor
      -->
      Designed by <a href="https://bootstrapmade.com/">Free Bootstrap Themes</a>
    </div>
  </div>
</footer>
<!--/ Footer-->

<script src="js/jquery.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script src="contactform/contactform.js"></script>

</body>
</html>
