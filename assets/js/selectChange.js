/**
 * Created by SERIALIZABLE on 05/09/2017.
 */


$('.catgArchive').on('change', function () {
    var selected = $(".catgArchive option:selected").text();
    console.log(selected);
    if(selected==="Bébé"){
        window.location.replace("blog.php");
    }else if(selected==="Grossesse"){
        window.location.replace("blogGrossesse.php");
    }else if(selected==="Maman"){
        window.location.replace("blogMaman.php");
    }
})