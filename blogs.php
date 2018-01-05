<?php
session_start();
$posts = '';
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    include('gestion/lib/util.php');
    $postResponse = json_decode(getPostById($id), true);
    $post = $postResponse['result'][0];
    $posts = json_decode(getPostsDetailsByCatId($post['catID']), true);
    $posts = $posts['result'];

}else{
    header('Location:blogGrossesse.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Oumbox</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="<?php echo $post['postTitle']; ?>">
    <meta property="og:image" content="http://www.beta.oumbox.com/img/<?php echo $post['image']; ?>">
    <meta property="og:description" content="<?php echo $post['postDesc']; ?>">
    <meta property="og:url" content="http://beta.oumbox.com/blogs.php?id=<?php echo $post['postID']; ?>">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/blogFont-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/blogAnimate.css">
<link rel="stylesheet" type="text/css" href="assets/css/blogFont.css">
<link rel="stylesheet" type="text/css" href="assets/css/blogLi-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/blogSlick.css">
<link rel="stylesheet" type="text/css" href="assets/css/blogJquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/blogTheme.css">
<link rel="stylesheet" type="text/css" href="assets/css/blogStyle.css">


<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/component.css">
<!-- header -->
<link rel="stylesheet" type="text/css" href="css/header.css">
<!--[if lt IE 9]>

<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->

    <style>
        .tags a {
            text-transform: uppercase;
            color: #df5b79;
            font-size: 18px;
        }

        .tags a:hover {
            color: black;
        }
    </style>
</head>
<body>
<div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style"
     data-a2a-title="<?php echo $post['postTitle']; ?>" style="left:0px; top:150px;">
    <a class="a2a_button_facebook"></a>
    <a class="a2a_button_twitter"></a>
    <a class="a2a_button_google_plus"></a>
    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
</div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- <div id="preloader">
  <div id="status">&nbsp;</div>
</div> -->
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<?php include('header3.php'); ?>
<div class="containerr">



  <section id="newsSection">

   
  </section>
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
          <div class="single_iteam"> <a href="blogContent.php"> <img src="img/<?php echo $post['image']; ?>" alt=""></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Derniers articles</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
              <ul class="latest_postnav">
                  <?php foreach ($posts as $key => $postItem) {
                      if ($key === 8) break; ?>
                      <li>
                          <div class="media"><a href="blogs.php?id=<?php echo $postItem['postID']; ?>" class="media-left">
                                  <img alt="" src="img/<?php echo $postItem['image']; ?>"> </a>
                              <div class="media-body"><a href="blogs.php?id=<?php echo $postItem['postID']; ?>"
                                                         class="catg_title"><?php echo $postItem['postTitle']; ?></a></div>
                          </div>
                      </li>
                  <?php } ?>

              </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 content">
        <h2><?php echo $post['postTitle'];?></h2>


          <?php
          $trimmed = str_replace("<pre>", "", $post['postCont']);
          $trimmed = str_replace("</pre>", "", $trimmed
          );
          echo $trimmed;
          ?>
          <i class="fa fa-tags"></i>
          <span class="tags">
              <?php foreach ($postResponse['result'] as $postItem) { ?>
                <a href="blogGrossesse1.php?cat=<?php echo $postItem['catID']; ?>"><?php echo $postItem['catTitle']; ?>,</a>
              <?php } ?>
          </span>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Les articles les plus populaires</span></h2>
              <ul class="spost_nav">
                  <?php foreach ($posts as $key => $postItem) {
                      if ($key === 4) break; ?>
                      <li>
                          <div class="media wow fadeInDown"><a href="blogs.php?id=<?php echo $postItem['postID']; ?>"
                                                               class="media-left"> <img alt=""
                                                                                        src="img/<?php echo $postItem['image']; ?>">
                              </a>
                              <div class="media-body"><a href="blogs.php?id=<?php echo $postItem['postID']; ?>"
                                                         class="catg_title"><?php echo $postItem['postTitle']; ?></a></div>
                          </div>
                      </li>
                  <?php } ?>

              </ul>
          </div>
         
            <h2><span>Categories</span></h2>
            <select class="catgArchive">

            </select>
          </div>
        </aside>
      </div>
    </div>
  </section>
  
</div>

<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/blogWow.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/blogSlick.min.js"></script> 
<script src="assets/js/blogJquery.li-scroller.1.0.js"></script> 
<script src="assets/js/blogJquery.newsTicker.min.js"></script> 
<script src="assets/js/blogJquery.fancybox.pack.js"></script> 
<script src="assets/js/blogCustom.js"></script>
<script src="assets/js/selectChange.js"></script>

</body>
</html>