<?php

include('gestion/lib/util.php');
$postsGrossesse = json_decode(getPostsDetailsByCatId(8), true);
$postsGrossesse = $postsGrossesse['result'];

$postsMaman = json_decode(getPostsDetailsByCatId(6), true);
$postsMaman = $postsMaman['result'];

$postsBebe = json_decode(getPostsDetailsByCatId(7), true);
$postsBebe = $postsBebe['result'];
?>
<div class="lastArticles container">

    <div class="row section2">

        <h2><span class="change">Derniers articles</span></h2>

        <div class="grid col-md-4">
            <?php if(isset($postsGrossesse[0])){ ?>
            <figure class="effect-sarah">
                <a href="blogs.php?id=<?php echo $postsGrossesse[0]['postID'] ?>"><img
                            src="img/<?php echo $postsGrossesse[0]['image'] ?>" alt="img1"/></a>
            </figure>
            <h4><?php echo $postsGrossesse[0]['postDesc'] ?></h4>
            <?php } ?>
        </div>

        <div class="grid col-md-4">
            <?php if (isset($postsMaman[0])){ ?>
            <figure class="effect-sarah">
                <a href="blogs.php?id=<?php echo $postsMaman[0]['postID'] ?>"><img
                            src="img/<?php echo $postsMaman[0]['image'] ?>" alt="img1"/></a>
            </figure>
            <h4><?php echo $postsMaman[0]['postDesc'] ?></h4>
            <?php } ?>
        </div>

        <div class="grid col-md-4">
            <?php if (isset($postsBebe[0])){ ?>
            <figure class="effect-sarah">
                <a href="blogs.php?id=<?php echo $postsBebe[0]['postID'] ?>"><img
                            src="img/<?php echo $postsBebe[0]['image'] ?>" alt="img1"/></a>
            </figure>
            <h4><?php echo $postsBebe[0]['postDesc'] ?></h4>
            <?php } ?>
        </div>

    </div>
    <div class="row section1">

        <div class="grid col-md-4">
            <?php if (isset($postsGrossesse[1])){ ?>
            <figure class="effect-sarah">
                <a href="blogs.php?id=<?php echo $postsGrossesse[1]['postID'] ?>"><img
                            src="img/<?php echo $postsGrossesse[1]['image'] ?>" alt="img1"/></a>
            </figure>
            <h4><?php echo $postsGrossesse[1]['postDesc'] ?></h4>
            <?php } ?>
        </div>

        <div class="grid col-md-4">
            <?php if (isset($postsMaman[1])){ ?>
            <figure class="effect-sarah">
                <a href="blogs.php?id=<?php echo $postsMaman[1]['postID'] ?>"><img
                            src="img/<?php echo $postsMaman[1]['image'] ?>" alt="img1"/></a>
            </figure>
            <h4><?php echo $postsMaman[1]['postDesc'] ?></h4>
            <?php } ?>
        </div>

        <div class="grid col-md-4">
            <?php if (isset($postsBebe[0])){ ?>
            <figure class="effect-sarah">
                <a href="blogs.php?id=<?php echo $postsBebe[1]['postID'] ?>"><img
                            src="img/<?php echo $postsBebe[1]['image'] ?>" alt="img1"/></a>
            </figure>
            <h4><?php echo $postsBebe[1]['postDesc'] ?></h4>
            <?php } ?>
        </div>
        </div>

    <div class="text-center"><a href="blogGrossesse1.php?cat=8" style="margin:30px;" class="btn btn-rose text-uppercase btn-infos">+ d'articles</a>

    </div>

</div>