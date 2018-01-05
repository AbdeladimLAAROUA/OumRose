<?php
session_start();
$posts = '';
if (isset($_GET['search'])) {

    $search = htmlspecialchars($_GET['search']);
    include('gestion/lib/util.php');
    $posts = json_decode(searchPost($search), true);
    $posts = $posts['result'];


} else {
    header('Location:index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Oumbox</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/blogFont-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/blogAnimate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/blogFont.css">
    <link rel="stylesheet" type="text/css" href="assets/css/blogLi-scroller.css">
    <link rel="stylesheet" type="text/css" href="assets/css/blogSlick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/blogJquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="assets/css/blogTheme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/blogStyle.css">


    <!--<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/component.css">-->
    <!-- header -->


    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/component.css"/>
    <link href="css/style.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        #navbarCollapse {
            padding-right: 15px;
            padding-left: 15px;
        }

        .logo {
            width: 200px;
        }
    </style>
</head>
<body>
<!-- <div id="preloader">
  <div id="status">&nbsp;</div>
</div> -->
<!-- <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a> -->
<?php include('header3.php'); ?>
<div class="containerr">
  
  
  
  <section id="newsSection">
  </section>
  <section id="sliderSection">

  </section>
  <section id="contentSection" style="height: 700px;">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8" style="height:650px;">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>Résultat de la recherche</span></h2>
            <div class="single_post_content_left">
              <ul class="spost_nav articlesList">
                  <?php foreach ($posts as $key => $post) { if($key==7) break; ?>
                    <li class="articlesItem" data-id="<?php echo $key; ?>">
                      <div class="media wow fadeInDown"> <a href="blogs.php?id=<?php echo $post['postID']; ?>" class="media-left"> <img alt="" src="img/<?php echo $post['image']; ?>"> </a>
                        <div class="media-body"> <a href="blogs.php?id=<?php echo $post['postID']; ?>" class="catg_title"><?php echo $post['postTitle']; ?></a> </div>
                      </div>
                    </li>
                  <?php }?>
              </ul>
            </div>
          </div>

          <div class="fashion_technology_area">


          </div>

        </div>
      </div>


    </div>
      <?php if (count($posts) > 7) {
          $pages = ceil(count($posts) / 7);
          ?>
          <div class="text-center">
              <ul class="pagination">
                  <li data-id="0"><a>&laquo;</a></li>
                  <li data-id="0"><a>1</a></li>
                  <?php
                  for ($i = 2; $i <= $pages; $i++) {
                      echo "<li data-id='" . ($i - 1) . "'><a>" . $i . "</a></li>";
                  }
                  ?>
                  <li data-id="<?php echo $pages - 1; ?>"><a>&raquo;</a></li>
              </ul>
          </div>
      <?php } ?>
  </section>
  
</div>

<li class="articlesItemModel" data-id="<?php echo $key; ?>" hidden>
    <div class="media wow fadeInDown"><a href="blogContent-g5.php" class="media-left"> <img alt="" src="img/<?php echo $post['image']; ?>">
        </a>
        <div class="media-body"><a href="blogContent-g5.php" class="catg_title"><?php echo $post['postTitle']; ?></a>
        </div>
    </div>
</li>

<!-- <script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.min.js"></script> --> 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="assets/js/blogWow.min.js"></script> 
 
<script src="assets/js/blogSlick.min.js"></script> 
<script src="assets/js/blogJquery.li-scroller.1.0.js"></script> 
<script src="assets/js/blogJquery.newsTicker.min.js"></script> 
<script src="assets/js/blogJquery.fancybox.pack.js"></script> 
<script src="assets/js/blogCustom.js"></script>
<script src="assets/js/selectChange.js"></script>



<script type="text/javascript">


    <?php
    $js_array = json_encode($posts);
    echo "var posts = " . $js_array . ";\n";
    ?>

    $(".pagination li").click(function () {
        console.log($(this).attr('data-id'));
        var from = $(this).attr('data-id') * 7;
        var to = from + 6;
        if (posts.length < to) {
            to = posts.length;
        }
        var liModel = $('articlesItemModel').clone();
        liModel.removeAttr('hidden');

        $('.articlesList').empty();
        console.log('from', from, 'to', to);
        for (from; from < to; from++) {
            var post = posts[from];
            var li = liModel;
            li.data('data-id', from);
            var li2 = '<li class="articlesItemModel"> <div class="media wow fadeInDown"><a href="blogContent-g5.php" class="media-left"> <img alt="" src="img/' + post['image'] + '">  </a><div class="media-body"><a href="blogContent-g5.php" class="catg_title">' + post['postTitle'] + '</a></div></div></li>';
            console.log(post);
            if (post) {
                li.find(".media-body a").html(post['postTitle']);
                li.find("div.media a img").attr("src", post['image']);
                li.find("div.media a.media-left").attr("href", "blogContent-g10.php");
                console.log(li2);
                $('.articlesList').append(li2);
                console.log("here");
            }
        }
    });
</script>




</body>
</html>