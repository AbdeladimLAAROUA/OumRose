<?php 
session_start();
include('../config.php');
$user=getUser($conn,$_SESSION['client_id']);
$validity = date('d/m/Y', strtotime('+1 months'));
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="viewport" content="width=device-width, initial-scale=1" /><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="apple-mobile-web-app-capable" content="yes" /><meta name="apple-mobile-web-app-status-bar-style" content="black" /><meta name="format-detection" content="telephone=no" /><title>IMPORTANT: Votre box vous attend!</title><link href="https://fonts.googleapis.com/icon?family=Roboto" rel="stylesheet" type="text/css" /><style type="text/css">
        /* Resets */
        .ReadMsgBody { width: 100%; background-color: #ebebeb;}
        .ExternalClass {width: 100%; background-color: #ebebeb;}
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100%;}
        body {-webkit-text-size-adjust:none; -ms-text-size-adjust:none;}
        body {margin:0; padding:0;}
        .yshortcuts a {border-bottom: none !important;}
        .rnb-del-min-width{ min-width: 0 !important; }

        /* Add new outlook css start */
        .templateContainer{
            max-width:590px !important;
            width:auto !important;
        }
        /* Add new outlook css end */

        /* Image width by default for 3 columns */
        img[class="rnb-col-3-img"] {
        max-width:170px;
        }

        /* Image width by default for 2 columns */
        img[class="rnb-col-2-img"] {
        max-width:264px;
        }

        /* Image width by default for 2 columns aside small size */
        img[class="rnb-col-2-img-side-xs"] {
        max-width:180px;
        }

        /* Image width by default for 2 columns aside big size */
        img[class="rnb-col-2-img-side-xl"] {
        max-width:350px;
        }

        /* Image width by default for 1 column */
        img[class="rnb-col-1-img"] {
        max-width:550px;
        }

        /* Image width by default for header */
        img[class="rnb-header-img"] {
        max-width:590px;
        }

        /* Ckeditor line-height spacing */
        .rnb-force-col p, ul, ol{margin:0px!important;}
        .rnb-del-min-width p, ul, ol{margin:0px!important;}

        /* tmpl-2 preview */
        .rnb-tmpl-width{ width:100%!important;}

        /* tmpl-11 preview */
        .rnb-social-width{padding-right:15px!important;}

        /* tmpl-11 preview */
        .rnb-social-align{float:right!important;}

        @media only screen and (min-width:590px){
        /* mac fix width */
        .templateContainer{width:590px !important;}
        }

        @media screen and (max-width: 360px){
        /* yahoo app fix width "tmpl-2 tmpl-10 tmpl-13" in android devices */
        .rnb-yahoo-width{ width:360px!important;}
        }

        @media screen and (max-width: 480px) {
        td[class="rnb-container-padding"] {
        padding-left: 10px !important;
        padding-right: 10px !important;
        }

        /* force container nav to (horizontal) blocks */
        td[class="rnb-force-nav"] {
        display: block;
        }
        }

        @media only screen and (max-width : 600px) {

        /* center the address &amp; social icons */
        .rnb-text-center {text-align:center !important;}

        /* force container columns to (horizontal) blocks */
        td[class~="rnb-force-col"] {
        display: block;
        padding-right: 0 !important;
        padding-left: 0 !important;
        width:100%;
        }

        table[class~="rnb-container"] {
         width: 100% !important;
        }

        table[class="rnb-btn-col-content"] {
        width: 100% !important;
        }
        table[class="rnb-col-3"] {
        /* unset table align="left/right" */
        float: none !important;
        width: 100% !important;

        /* change left/right padding and margins to top/bottom ones */
        margin-bottom: 10px;
        padding-bottom: 10px;
        /*border-bottom: 1px solid #eee;*/
        }

        table[class="rnb-last-col-3"] {
        /* unset table align="left/right" */
        float: none !important;
        width: 100% !important;
        }

        table[class="rnb-col-2"] {
        /* unset table align="left/right" */
        float: none !important;
        width: 100% !important;

        /* change left/right padding and margins to top/bottom ones */
        margin-bottom: 10px;
        padding-bottom: 10px;
        /*border-bottom: 1px solid #eee;*/
        }

        table[class="rnb-col-2-noborder-onright"] {
        /* unset table align="left/right" */
        float: none !important;
        width: 100% !important;

        /* change left/right padding and margins to top/bottom ones */
        margin-bottom: 10px;
        padding-bottom: 10px;
        }

        table[class="rnb-col-2-noborder-onleft"] {
        /* unset table align="left/right" */
        float: none !important;
        width: 100% !important;

        /* change left/right padding and margins to top/bottom ones */
        margin-top: 10px;
        padding-top: 10px;
        }

        table[class="rnb-last-col-2"] {
        /* unset table align="left/right" */
        float: none !important;
        width: 100% !important;
        }

        table[class="rnb-col-1"] {
        /* unset table align="left/right" */
        float: none !important;
        width: 100% !important;
        }

        img[class="rnb-col-3-img"] {
        /**max-width:none !important;**/
        width:100% !important;
        }

        img[class="rnb-col-2-img"] {
        /**max-width:none !important;**/
        width:100% !important;
        }

        img[class="rnb-col-2-img-side-xs"] {
        /**max-width:none !important;**/
        width:100% !important;
        }

        img[class="rnb-col-2-img-side-xl"] {
        /**max-width:none !important;**/
        width:100% !important;
        }

        img[class="rnb-col-1-img"] {
        /**max-width:none !important;**/
        width:100% !important;
        }

        img[class="rnb-header-img"] {
        /**max-width:none !important;**/
        width:100% !important;
        margin:0 auto;
        }

        img[class="rnb-logo-img"] {
        /**max-width:none !important;**/
        width:100% !important;
        }

        td[class="rnb-mbl-float-none"] {
        float:inherit !important;
        }

        .img-block-center{text-align:center!important;}

        .logo-img-center
        {
            float:inherit!important;
        }

        /* tmpl-11 preview */
        .rnb-social-align{margin:0 auto!important; float:inherit!important;}

    }@media screen{body{font-family:'Roboto','Arial',Helvetica,sans-serif;}}</style><!--[if gte mso 11]><style type="text/css">table{border-spacing: 0; }table td {border-collapse: separate;}</style><![endif]--><!--[if !mso]><!--><style type="text/css">table{border-spacing: 0;} table td {border-collapse: collapse;}</style> <!--<![endif]--><!--[if gte mso 15]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]--><!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]--></head><body>

<table border="0" align="center" width="100%" cellpadding="0" cellspacing="0" class="main-template" bgcolor="#ffffff" style="background-color:#ffffff;">

    <tbody>
    <tr>
        <td align="center" valign="top">
        <!--[if gte mso 9]>
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="590" style="width:590px;">
                        <tr>
                        <td align="center" valign="top" width="590" style="width:590px;">
                        <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer" style="max-width:590px!important; width: 590px;">
        <tbody><tr>

        <td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff;">

            <table class="rnb-del-min-width rnb-tmpl-width" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#ffffff" style="min-width:590px; background-color:#ffffff" name="Layout_0" id="Layout_0">
                <tbody><tr>
                    <td class="rnb-del-min-width" valign="top" align="center" style="min-width: 590px; background-color: rgb(255, 255, 255);">
                        <table width="100%" cellpadding="0" border="0" align="center" cellspacing="0" style="background-color: rgb(85, 85, 85);">
                            <tbody><tr>
                                <td height="10" style="font-size:1px; line-height:1px;">&nbsp;</td>
                            </tr>
                            
                            <tr>
                                <td height="10" style="font-size:1px; line-height:1px;">&nbsp;</td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody></table>
            </td>
    </tr><tr>

        <td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff;">

            <div>
                <!--[if mso]>
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
                <tr>
                <![endif]-->
                
                <!--[if mso]>
                <td valign="top" width="590" style="width:590px;">
                <![endif]-->
            <table class="rnb-del-min-width" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#ffffff" style="min-width:590px; background-color:#ffffff;" name="Layout_1" id="Layout_1">
                <tbody><tr>
                    <td class="rnb-del-min-width" align="center" valign="top" bgcolor="#ffffff" style="min-width:590px; background-color: #ffffff;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="rnb-container" bgcolor="#fafafa" style="background-color: rgb(250, 250, 250); border-radius: 0px; padding-left: 20px; padding-right: 20px; border-collapse: separate;">
                            <tbody><tr>
                                <td height="2" style="font-size:1px; line-height:1px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td valign="top" class="rnb-container-padding" bgcolor="#fafafa" style="background-color: #fafafa;" align="left">
                                    <table width="100%" cellpadding="0" border="0" align="center" cellspacing="0">
                                        <tbody><tr>
                                            <td valign="top" align="center">
                                                <table cellpadding="0" border="0" align="center" cellspacing="0" ng-class="{'logo-img-center':col.td.align}" class="logo-img-center"> 
                                                    <tbody><tr>
                                                        <td valign="middle" align="center">
                                                            <div style="border-top:0px None #9c9c9c;border-right:0px None #9c9c9c;border-bottom:0px None #9c9c9c;border-left:0px None #9c9c9c;display:inline-block;"><a style="text-decoration:none;" target="_blank" href="http://www.facebook.com/oumbox"><img width="550" vspace="0" hspace="0" border="0" alt="[&quot;Oumbox&quot;]" style="max-width:550px;" class="rnb-logo-img" src="http://img.mailinblue.com/1614237/images/rnb/original/58e14d5e140ba031098b45f2.png"></a>
                                                            </div></td>
                                                    </tr>
                                                </tbody></table>
                                                </td>
                                        </tr>
                                    </tbody></table></td>
                            </tr>
                            <tr>
                                <td height="0" style="font-size:1px; line-height:1px;">&nbsp;</td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody></table>
            <!--[if mso]>
                </td>
                <![endif]-->
                
                <!--[if mso]>
                </tr>
                </table>
                <![endif]-->
        </div></td>
    </tr><tr>

        <td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff;">

            <div>

                <!--[if mso]>
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
                <tr>
                <![endif]-->
                
                <!--[if mso]>
                <td valign="top" width="590" style="width:590px;">
                <![endif]-->
            
            <table width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#ffffff" style="background-color:#ffffff;" name="Layout_5" id="Layout_5"><tbody><tr>
                    <td align="center" valign="top" bgcolor="#ffffff" style="background-color: #ffffff;"><table border="0" width="100%" cellpadding="0" cellspacing="0" class="rnb-container" bgcolor="#ffffff" style="height: 0px; background-color: rgb(255, 255, 255); border-radius: 6px; border-collapse: separate; padding-left: 20px; padding-right: 20px;"><tbody><tr>
                                <td class="rnb-container-padding" bgcolor="#ffffff" style="background-color: #ffffff; font-size: px;font-family: ; color: ;">

                                    <table border="0" cellpadding="0" cellspacing="0" class="rnb-columns-container" align="center" style="margin:auto;">
                                        <tbody><tr>

                                            <td class="rnb-force-col" align="center">

                                                <table border="0" cellspacing="0" cellpadding="0" align="center" class="rnb-col-1">

                                                    <tbody><tr>
                                                        <td height="10"></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-size:18px;font-family:'Roboto','Arial',Helvetica,sans-serif; color:#999; font-weight:bold; text-align:center;">

                                                            <span style="color:#999; font-weight:bold;"><span style="font-size:22px"><span style="color:#800080"><u>VOTRE BON DE RETRAIT</u></span></span></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="10"></td>
                                                    </tr>
                                                    </tbody></table>
                                                </td></tr>
                                    </tbody></table></td>
                            </tr>

                        </tbody></table>

                    </td>
                </tr>

            </tbody></table><!--[if mso]>
                </td>
                <![endif]-->
                
                <!--[if mso]>
                </tr>
                </table>
                <![endif]-->
        </div></td>
    </tr><tr>

        <td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff;">

            <div>
                <!--[if mso]>
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
                <tr>
                <![endif]-->
                
                <!--[if mso]>
                <td valign="top" width="590" style="width:590px;">
                <![endif]-->
            <table class="rnb-del-min-width" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#ffffff" style="min-width:100%; background-color:#ffffff;" name="Layout_2" id="Layout_2">
                <tbody><tr>
                    <td class="rnb-del-min-width" align="center" valign="top" bgcolor="#ffffff" style="background-color: #ffffff;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class=" rnb-container" bgcolor="#fafafa" style="max-width: 100%; min-width: 100%; table-layout: fixed; background-color: rgb(250, 250, 250); border-radius: 10px; border-collapse: separate; padding-left: 20px; padding-right: 20px;">
                            <tbody><tr>
                                <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td valign="top" class="rnb-container-padding" bgcolor="#fafafa" style="background-color: #fafafa;" align="left">

                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="rnb-columns-container">
                                        <tbody><tr>
                                            <td class="rnb-force-col" width="550" valign="top" style="padding-right: 0px;">
                                                <table border="0" valign="top" cellspacing="0" cellpadding="0" align="left" class="rnb-col-1" width="550">
                                                    <tbody><tr>
                                                        <td width="100%" class="img-block-center" valign="top" align="center">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="100%" valign="top" align="center" class="img-block-center">

                                                                        <table style="display: inline-block;" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody><tr>
                                                                                <td>
                                                                        <div style="border-top:0px None #9c9c9c;border-right:0px None #9c9c9c;border-bottom:0px None #9c9c9c;border-left:0px None #9c9c9c;display:inline-block;">
                                                                            <a target="_blank" href="http://www.facebook.com/oumbox">
                                                                            <img width="301" border="0" hspace="0" vspace="0" class="rnb-col-1-img" alt="OUMBOX" src="box2.png" style="vertical-align: top; max-width: 301px;"></a>
                                                                            </div></td>
                                                                            </tr>
                                                                        </tbody></table>

                                                                    </td>
                                                                    </tr>
                                                                </tbody>
                                                                </table></td>
                                                    </tr><tr>
                                                        <td height="10" class="col_td_gap" style="font-size:1px; line-height:1px;">&nbsp;</td>
                                                    </tr><tr>
                                                        <td style="font-size:14px; font-family:'Arial',Helvetica,sans-serif, sans-serif; color:#555;">
                                                            <div><div><span style="font-size:14px;">Chère&nbsp; <?php echo $user['prenom']; ?>,</span></div>

<div><span style="font-size:14px;">&nbsp;</span></div>

<div><span style="font-size:14px;">Votre box <strong>"Bébé est là!" </strong>vous attend chez OUMBOX!<br>
Vous y trouverez votre guide <strong>"Bébé est là!" by Oumbox</strong> et pleins de surprises pour vous et votre bébé.</span></div>

<div><span style="font-size:14px;">&nbsp;</span></div>

<ul>
    <li><span style="font-size:14px;"><span style="background-color: transparent;"><strong>REF BOX: </strong>&nbsp;Vert "Bébé est là!"</span></span></li>
    <li><span style="font-size:14px;"><span style="background-color: transparent;"><strong>NOM:</strong>&nbsp;<?php echo $user['nom']; ?> &nbsp; &nbsp;&nbsp;<strong>PRENOM:&nbsp;</strong></span></span> <?php echo $user['prenom']; ?></li>
    <li><span style="font-size:14px;"><span style="background-color: transparent;"><strong>DATE DE NAISSANCE:</strong> <?php echo $user['naissance']; ?></span></span></li>
    <li><strong>CODE OUMBOX:&nbsp;</strong> <?php echo $user['id']; ?></li>
    <li><span style="font-size:14px;"><span style="background-color: transparent;">Ce bon est valable juqu'au: <?php echo $validity ?></span></span></li>
</ul>

<div><span style="font-size:14px;">&nbsp;</span></div>

<div><span style="font-size:14px;"><strong>CONDITIONS:</strong></span></div>

<ol>
    <li><span style="font-size:14px;"><span style="color:#696969;"><span style="background-color: transparent;">&nbsp;Il faut </span><strong style="background-color: transparent;">OBLIGATOIREMENT</strong><span style="background-color: transparent;">&nbsp;présenter:&nbsp;<br>
    <strong>Ce bon imprimé + Copie de votre CIN<span style="background-color: transparent;">&nbsp;au point retrait</span></strong></span></span></span></li>
    <li><span style="font-size:14px;"><span style="color:#696969;"><span style="background-color: transparent;"><strong><span style="background-color: transparent;">Vous pouvez envoyer quelqu'un avec ce bon imprimé+ copie de votre CIN</span></strong></span></span></span></li>
    <li><span style="font-size:14px;"><span style="color:#696969;"><span style="background-color: transparent;"><strong><span style="background-color: transparent;">Un seul bon par membre par box</span></strong></span></span></span></li>
</ol>

<ul>
</ul>



<div>
<div><span style="font-size:14px;"><span style="color:#696969;">&nbsp;</span></span></div>
</div>

<div style="text-align: center;"><span style="font-size:14px;"><u><strong>VOTRE POINT RETRAIT :</strong></u><strong>&nbsp;</strong></span></div>

<div style="text-align: center;"><span style="font-size:14px;"><a href="http://www.facebook.com/oumbox" style="text-decoration: none; color: rgb(111, 17, 125);"><b>OUMBOX</b></a><br>
77Bis Boulevard Abdelmoumen<br>
<em>(En face de la station Tram WafaSalaf)<br>
<a href="https://www.google.com/maps?cid=2064576583954403184" style="text-decoration: none; color: rgb(111, 17, 125);">https://www.google.com/maps?cid=2064576583954403184</a></em><br>
CASABLANCA<br>
0522 22 58 50</span></div>

<div style="text-align: center;"><span style="font-size:14px;"><u><strong>HORAIRES :&nbsp;</strong></u><br>
Lundi au Vendredi: 9h -13h et 14h-18h</span></div>

<div style="text-align: center;"><span style="font-size:14px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="background-color: transparent;">&nbsp;</span></div>

<div style="text-align: right;"><em>&nbsp;CODE: 17</em>06OX<?php echo $user['id']; ?></div>
</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="10" class="col_td_gap" style="font-size:1px; line-height:1px;">&nbsp;</td>
                                                    </tr><tr>
                                                        <td valign="top">
                                                            <table cellpadding="0" border="0" align="center" cellspacing="0" class="rnb-btn-col-content" style="border-collapse: separate;margin:0 auto;">
                                                                <tbody><tr>
                                                                    <td width="auto" valign="middle" bgcolor="#a12b8c" align="center" height="26" style="font-size:17px; font-family:'Comic Sans MS',cursive,sans-serif; text-align:center; color:#ffe0e0; font-weight:normal; padding-left:18px; padding-right:18px; background-color:#a12b8c; border-radius:4px;border-top:0px None #9c9c9c;border-right:0px None #9c9c9c;border-bottom:0px None #9c9c9c;border-left:0px None #9c9c9c;">
                                                                        <span style="color:#ffe0e0; font-weight:normal;">
                                                                            <a style="text-decoration:none; color:#ffe0e0; font-weight:normal;" target="_blank" href="http://www.facebook.com/oumbox"><strong>J'AIME, &nbsp;Je PARTAGE &nbsp;#Oumbox sur FB</strong></a>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                            </tbody></table>
                                                        </td>
                                                    </tr></tbody></table>

                                                </td></tr>
                                    </tbody></table></td>
                            </tr>
                            <tr>
                                <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                            </tr>
                        </tbody></table>

                    </td>
                </tr>
            </tbody></table><!--[if mso]>
                </td>
                <![endif]-->
                
                <!--[if mso]>
                </tr>
                </table>
                <![endif]-->
            </div></td>
    </tr><tr>

        <td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff;">

            
            </td>
    </tr><tr>

        <td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff;">

            <table class="rnb-del-min-width rnb-tmpl-width" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#ffffff" style="min-width:590px; background-color:#ffffff;" name="Layout_4" id="Layout_4">
                <tbody><tr>
                    <td class="rnb-del-min-width" align="center" valign="top" bgcolor="#333" style="min-width:590px; background-color: #333;">
                        <table width="590" class="rnb-container rnb-yahoo-width" cellpadding="0" border="0" align="center" cellspacing="0" style="padding-right:20px; padding-left:20px;">
                            <tbody><tr>
                                <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                            </tr>
                           
                            <tr>
                                <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody></table>
            </td>
    </tr></tbody></table>
            <!--[if gte mso 9]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                        </td>
        </tr>
        </tbody></table>

</body></html>