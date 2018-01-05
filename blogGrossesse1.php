<?php
session_start();
$posts = '';
if (isset($_GET['cat'])) {
    $cat = htmlspecialchars($_GET['cat']);
    include('gestion/lib/util.php');
    $posts = json_decode(getPostsDetailsByCatId($cat), true);
    $tags= json_decode(getCatTags($cat),true);
    $tags= $tags['result'];
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
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">

            <?php foreach ($posts as $key => $post) { if($key===4) break; ?>

            <div class="single_iteam"> <a href="blogs.php?id=<?php echo $post['postID']; ?>"> <img src="img/<?php echo $post['image']; ?>" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="blogs.php?id=<?php echo $post['postID']; ?>"><?php echo $post['postTitle']; ?></a></h2>
              <p><?php echo $post['postDesc']; ?></p>
            </div>
            </div>

            <?php } ?>

        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
         <div class="row">
             <div class="col-md-6">
                 <input placeholder="trouer un article" class="form-control" type="text" name="searchBlog"/>
             </div>
             <div class="col-md-6">
                 <button class="btn btn-success" name="searchBlogButton" style="border-radius:4px;">Rechercher</button>
             </div>
         </div>
        <div class="latest_post">
          <h2><span>Derniers articles</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav" >
                <?php foreach ($posts as $key => $post) {
                if ($key === 8) break; ?>
              <li>
                <div class="media"> <a href="blogs.php?id=<?php echo $post['postID']; ?>" class="media-left"> <img alt="" src="img/<?php echo $post['image']; ?>"> </a>
                  <div class="media-body"> <a href="blogs.php?id=<?php echo $post['postID']; ?>" class="catg_title"><?php echo $post['postTitle']; ?></a> </div>
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
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>Tous les articles</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="blogs.php?id=<?php echo $posts[0]['postID']; ?>" class="featured_img"> <img alt="" src="img/<?php echo $posts[0]['image']; ?>"> <span class="overlay"></span> </a>
                    <figcaption> <a href="blogs.php?id=<?php echo $posts[0]['postID']; ?>"><?php echo $posts[0]['postTitle']; ?></a> </figcaption>
                    <p class="catBlogDescrition"><?php echo $posts[0]['postDesc']; ?>

                    </p>
                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav articlesList">
                  <?php foreach ($posts as $key => $post) { if($key==7) break;
                      if ($key < 1) continue; ?>
                    <li class="articlesItem" data-id="<?php echo $key; ?>">
                      <div class="media wow fadeInDown"> <a href="blogs.php?id=<?php echo $post['postID']; ?>" class="media-left"> <img alt="" src="img/<?php echo $post['image']; ?>"> </a>
                        <div class="media-body"> <a href="blogs.php?id=<?php echo $post['postID']; ?>" class="catg_title"><?php echo $post['postTitle']; ?></a> </div>
                      </div>
                    </li>
                  <?php }?>
              </ul>
            </div>
          </div>
            <?php if(count($posts)>7) {
             $pages = ceil(count($posts)/7);
            ?>
            <div class="text-center">
                <ul class="pagination">
                    <li data-id="0"><a>&laquo;</a></li>
                    <li data-id="0"><a>1</a></li>
                    <?php
                        for ($i = 2; $i <= $pages; $i++) {
                            echo "<li data-id='".($i-1)."'><a>".$i."</a></li>";
                        }
                    ?>
                    <li data-id="<?php echo $pages-1;?>"><a>&raquo;</a></li>
                </ul>
            </div>
            <?php } ?>

          <div class="fashion_technology_area">


          </div>

        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Les articles les plus populaires</span></h2>
            <ul class="spost_nav">
                <?php foreach ($posts as $key => $post) {
                if ($key === 4) break; ?>
              <li>
                <div class="media wow fadeInDown"> <a href="blogs.php?id=<?php echo $post['postID']; ?>" class="media-left"> <img alt="" src="img/<?php echo $post['image']; ?>"> </a>
                  <div class="media-body"> <a href="blogs.php?id=<?php echo $post['postID']; ?>" class="catg_title"><?php echo $post['postTitle']; ?></a> </div>
                </div>
              </li>
                <?php } ?>

            </ul>
             
          </div>

          <div class="single_sidebar wow fadeInDown">
            <h2><span>Categories</span></h2>
            <select class="catgArchive">
              <option>Choisissez une catégorie</option>
                <?php foreach ($tags as $tag) { ?>
                    <option value="<?php echo $tag['catID']; ?>"><?php echo $tag['catTitle']; ?></option>
                <?php } ?>
            </select>
          </div>
        </aside>
      </div>
    </div>
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
    var posts='';


  var myData={'methode': 'getPostsDetailsByCatId','id':<?php echo $cat;?>};
  $.ajax({
      url: "/gestion/lib/util.php",
      dataType: "json",
      type: "POST",
      data: myData,
      async: false,
      success: function (data, textStatus, jqXHR) {
          //console.log(data);
          posts = data.result;
          $(".pagination li").click(function () {
              console.log($(this).attr('data-id'));
              var from = $(this).attr('data-id') * 7;
              var to = from + 6;
              if(posts.length<to){
                  to=posts.length;
              }
              var liModel = $('articlesItemModel').clone();
              liModel.removeAttr('hidden');

              $('.articlesList').empty();
                console.log('from',from,'to',to);
              for (from; from < to; from++) {
                  var post = posts[from];
                  var li = liModel;
                  li.data('data-id', from);
                  var li2='<li class="articlesItemModel"> <div class="media wow fadeInDown"><a href="blogContent-g5.php" class="media-left"> <img alt="" src="img/'+ post['image']+'">  </a><div class="media-body"><a href="blogContent-g5.php" class="catg_title">'+ post['postTitle']+'</a></div></div></li>';
                  console.log(post);
                  if(post){
                      li.find(".media-body a").html(post['postTitle']);
                      li.find("div.media a img").attr("src", post['image']);
                      li.find("div.media a.media-left").attr("href", "blogContent-g10.php");
                      console.log(li2);
                      $('.articlesList').append(li2);
                      console.log("here");
                  }
              }
          });
      },
      error: function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
      }
  });
</script>

<script>
    $(document).ready(function () {
        $('button[name="searchBlogButton"]').on('click',searchBlogEvent);
        function searchBlogEvent() {
            var search = $('input[name="searchBlog"]').val();
            document.location.href = "searchBlog.php?search="+search;
        }

        $(document).on('change','.catgArchive',changeCat);
        function changeCat() {
            document.location.href = "blogGrossesse1.php?cat=" + $(this).val();
        }
    });
</script>


</body>
</html>