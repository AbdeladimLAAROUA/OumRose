<?php 
function welcomeEmail($user,$baby){
	$PRENOM=$user['prenom'];
	$NOM=$user['nom'];
	$DATE_NAISSANCE=$user['naissance'];
	$GSM=$user['gsm'];
	$ADRESSE=$user['adresse'];
	$VILLE=$user['ville'];
	$TYPE=$user['type'];
	$NAISSANCE_BEBE=$baby['naissance'];
	$PRENOM_BEBE=$baby['prenom'];
	$GYNECO=$baby['GYNECO'];
	$MATERNITE=$baby['MATERNITE'];
	try {

$message1 = <<<EOT
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="viewport" content="width=device-width, initial-scale=1" /><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="apple-mobile-web-app-capable" content="yes" /><meta name="apple-mobile-web-app-status-bar-style" content="black" /><meta name="format-detection" content="telephone=no" /><title>$PRENOM, Bienvenue chez Oumbox</title><link href="https://fonts.googleapis.com/icon?family=Roboto" rel="stylesheet" type="text/css" /><style type="text/css">
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

<table border="0" align="center" width="100%" cellpadding="0" cellspacing="0" class="main-template" bgcolor="FFFFFF" style="background-color:FFFFFF;">

	<tbody><tr style="display:none !important; font-size:1px; mso-hide: all;"><td>Le programme qui chouchoute les mamans.</td><td></td></tr>
    <tr>
        <td align="center" valign="top">
        <!--[if gte mso 9]>
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="590" style="width:590px;">
                        <tr>
                        <td align="center" valign="top" width="590" style="width:590px;">
                        <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer" style="max-width:590px!important; width: 590px;">
        <tbody><tr>

        <td align="center" valign="top" bgcolor="FFFFFF" style="background-color:FFFFFF;">

            <div>
                <!--[if mso]>
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
                <tr>
                <![endif]-->
                
                <!--[if mso]>
                <td valign="top" width="590" style="width:590px;">
                <![endif]-->
            <table class="rnb-del-min-width" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="FFFFFF" style="min-width:590px; background-color:FFFFFF;" name="Layout_1" id="Layout_1">
                <tbody><tr>
                    <td class="rnb-del-min-width" align="center" valign="top" bgcolor="FFFFFF" style="min-width:590px; background-color: FFFFFF;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="rnb-container" bgcolor="#FFFFFF" style="background-color: rgb(255, 255, 255); border-radius: 0px; padding-left: 20px; padding-right: 20px; border-collapse: separate;">
                            <tbody><tr>
                                <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td valign="top" class="rnb-container-padding" bgcolor="#FFFFFF" style="background-color: #FFFFFF;" align="left">
                                    <table width="100%" cellpadding="0" border="0" align="center" cellspacing="0">
                                        <tbody><tr>
                                            <td valign="top" align="center">
                                                <table cellpadding="0" border="0" align="center" cellspacing="0" ng-class="{'logo-img-center':col.td.align}" class="logo-img-center"> 
                                                    <tbody><tr>
                                                        <td valign="middle" align="center">
                                                            <div style="border-top:0px None #000;border-right:0px None #000;border-bottom:0px None #000;border-left:0px None #000;display:inline-block;"><img width="300" vspace="0" hspace="0" border="0" alt="[&quot;Oumbox&quot;]" style="max-width:300px;display:block;" class="rnb-logo-img" src="http://img.mailinblue.com/1614237/images/rnb/original/5887c7e5150ba051028b4600.png"></div></td>
                                                    </tr>
                                                </tbody></table>
                                                </td>
                                        </tr>
                                    </tbody></table></td>
                            </tr>
                            <tr>
                                <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
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

        <td align="center" valign="top" bgcolor="FFFFFF" style="background-color:FFFFFF;">

            <div>
                <!--[if mso]>
                <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
                <tr>
                <![endif]-->
                
                <!--[if mso]>
                <td valign="top" width="590" style="width:590px;">
                <![endif]-->
            <table class="rnb-del-min-width" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="FFFFFF" style="min-width:100%; background-color:FFFFFF;" name="Layout_5">
                <tbody><tr>
                    <td class="rnb-del-min-width" align="center" valign="top" bgcolor="FFFFFF" style="background-color: FFFFFF;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="rnb-container" bgcolor="#ffffff" style="background-color: rgb(255, 255, 255); padding-left: 20px; padding-right: 20px; border-collapse: separate; border-radius: 0px; border-bottom: 0px none rgb(200, 200, 200);">

                                        <tbody><tr>
                                            <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td valign="top" class="rnb-container-padding" bgcolor="#ffffff" style="background-color: #ffffff;" align="left">

                                                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="rnb-columns-container">
                                                    <tbody><tr>
                                                        <td class="rnb-force-col" valign="top" style="padding-right: 0px;">

                                                            <table border="0" valign="top" cellspacing="0" cellpadding="0" width="100%" align="left" class="rnb-col-1">

                                                                <tbody><tr>
                                                                    <td style="font-size:14px; font-family:Arial,Helvetica,sans-serif, sans-serif; color:#555;"><div><span style="background-color: transparent;">Chère $PRENOM,</span>

<div>
<div>&nbsp;</div>

<div>Votre inscription est confirmée et nous vous remercions d'avoir choisi Oumbox.</div>

<div>&nbsp;</div>

<div><span style="color:#800080;"><em><strong>DESCRIPTIF DU PROGRAMME OUMBOX:</strong></em></span></div>

<ul>
	<li><font color="#800080">Guide "Mon Journal de Grossesse" est disponible chez nos <a href="https://www.google.com/maps/d/embed?mid=1zaLQdFtnDuKtMm7gWTmkhLDerWU" style="text-decoration: solid; color: rgb(153, 153, 153);">gynécologues partenaires</a>.&nbsp;</font></li>
	<li><font color="#800080"><font color="#800080"><span style="color:#800080;">La Box "Je suis enceinte" remise entre le 5e et 8e mois de grossesse.&nbsp;</span></font></font></li>
	<li><font color="#800080"><span style="color:#800080;"><span style="color:#800080;"><span style="color:#800080;">La Box "Bébé est là!" remise de la naissance au 2 mois du bébé.</span></span></span></font></li>
	<li><span style="color:#800080;">La Box "Bébé Grandit" remise quand votre bébé a entre 6 et 8 mois.</span></li>
</ul>

<div>&nbsp;</div>

<div><span style="color:#800080;"><strong><em>PROCHAINE ETAPE:</em></strong></span></div>

<ol>
	<li>Dès que vous êtes éligible à l'une des box, vous serez sur liste d'attente pour recevoir votre <strong>BON DE RETRAIT par EMAIL.</strong></li>
	<li>Il faut obligatoirement l'imprimer + copie de votre CIN pour récuperer votre Box.&nbsp;</li>
	<li>Détails du point retrait ou livraison sur votre <strong>BON DE RETRAIT</strong>.</li>
	<li>Profitez de vos avantages et partagez autour de vous et sur<span style="color:#0000CD;"> </span><a href="http://www.facebook.com/oumbox" style="text-decoration: solid; color: rgb(153, 153, 153);"><span style="color:#0000CD;">FB</span></a>.</li>
</ol>

<div>&nbsp;</div>

<div style="text-align: justify;"><span style="background-color: transparent;"><span style="color:#800080;"><em>IMPORTANT:</em></span> <em>Toute fausse information communiquée lors de votre inscription remettra en cause votre éligibilité au programme #Oumbox. Oumbox se reserve le droit d’annuler toute inscription suspecte et d’exiger un justificatif pour bénéficier gratuitement des box. </em></span></div>

<div style="text-align: justify;">&nbsp;</div>

<div style="text-align: justify;"><span style="background-color: transparent;"><u>Prière de vérifier vos données:</u></span></div>

<div><span style="background-color: transparent;">Nom de Famille:&nbsp; $NOM</span></div>

<div><span style="background-color: transparent;">Date de Naissance:&nbsp;</span> $DATE_NAISSANCE</div>

<div>Numéro de Portable:&nbsp; $GSM</div>

<div>Adresse:&nbsp; $ADRESSE</div>

<div>Ville:&nbsp; $VILLE</div>

<div>Status:&nbsp; $TYPE</div>

<div>Date d'accouchement/Naissance Bébé:&nbsp;<span style="background-color: transparent;">$NAISSANCE_BEBE&nbsp;</span></div>

<div>Prénom Bébé:&nbsp; $PRENOM_BEBE</div>

<div><span style="background-color: transparent;">Gynécologue:&nbsp;</span> $GYNECO</div>

<div><span style="background-color: transparent;">Maternité:&nbsp; $MATERNITE</span></div>

<div><em>Pour modifier ces données, merci de répondre à cet email.&nbsp;</em></div>

<div>&nbsp;</div>

<div><span style="background-color: transparent;">N'oubliez pas d'aimer et suivre&nbsp;</span><a href="http://www.facebook.com/oumbox" style="text-decoration: solid; color: rgb(153, 153, 153);"><span style="color:#0000CD;">notre page facebook</span></a><span style="background-color: transparent;"> pour toutes nos actualités et offres.</span></div>

<div>&nbsp;</div>

<div>Très Belle Journée !</div>

<div>&nbsp;</div>

<div>L'équipe Oumbox</div>
</div>
</div>
</td>
                                                                </tr>
                                                                </tbody></table>

                                                            </td></tr>
                                                </tbody></table></td>
                                        </tr>
                                        <tr>
                                            <td height="20" style="font-size:1px; line-height:1px;border-bottom:0px;">&nbsp;</td>
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

        <td align="center" valign="top" bgcolor="FFFFFF" style="background-color:FFFFFF;">

            <table class="rnb-del-min-width" width="100%" cellpadding="0" border="0" cellspacing="0" style="min-width:590px; background-color:FFFFFF;" name="Layout_" id="Layout_">
                <tbody><tr>
                    <td class="rnb-del-min-width" valign="top" align="center" bgcolor="FFFFFF" style="min-width:590px; background-color:FFFFFF;">
                        <table width="100%" cellpadding="0" border="0" height="30" cellspacing="0" bgcolor="FFFFFF" style="background-color:FFFFFF;">
                            <tbody><tr>
                                <td valign="top" height="30">
                                    <img width="20" height="30" style="display:block; max-height:30px; max-width:20px;" alt="" src="http://img.mailinblue.com/new_images/rnb/rnb_space.gif">
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody></table>
            </td>
    </tr><tr>

        <td align="center" valign="top" bgcolor="FFFFFF" style="background-color:FFFFFF;">

            <table class="rnb-del-min-width rnb-tmpl-width" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="FFFFFF" style="min-width:590px; background-color:FFFFFF;" name="Layout_3" id="Layout_3">
                <tbody><tr>
                    <td class="rnb-del-min-width" align="center" valign="top" bgcolor="#4DB6AC" style="min-width:590px; background-color: #4DB6AC;">
                        <table width="590" class="rnb-container" cellpadding="0" border="0" align="center" cellspacing="0" style="padding-right:20px; padding-left:20px;">
                            <tbody><tr>
                                <td height="10" style="font-size:1px; line-height:1px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="font-size:14px; color:#827f7f; font-weight:normal; text-align:center; font-family:Arial,Helvetica,sans-serif;"><div>&nbsp;
<div><span style="font-size:12px;"><span style="background-color: transparent;">Vous avez reçu cet email car vous vous êtes inscrite sur Oumbox sous&nbsp;</span><span style="background-color: transparent;">{EMAIL}.</span></span>
<div>&nbsp;</div>
</div>
</div>
</div>
                                    <div style="font-size:14px; font-weight:normal; text-align:center; font-family:Arial,Helvetica,sans-serif;">
                                        <a style="text-decoration:none; color:#ccc;font-size:14px;font-weight:normal;font-family:Arial,Helvetica,sans-serif;" target="_blank" href="[UNSUBSCRIBE]">Se désinscrire</a></div>
                                </td></tr>
                            <tr>
                                <td height="10" style="font-size:1px; line-height:1px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="text-align:center;">
                                        <div style="font-family:Arial, Helvetica, sans-serif;color:#aaaaaa;opacity:0.8">Sent by</div><a href="https://www.sendinblue.com/?utm_source=logo_mailin&amp;utm_campaign=14c9c680b61b8aa0f591a51367eabf9b&amp;utm_medium=email" target="_blank"><img border="0" hspace="0" vspace="0" alt="SendinBlue" style="margin:auto;" src="http://img.mailinblue.com/new_images/rnb/logo_nb_en.png"></a>
                                    </div></td>
                            </tr><tr>
                                <td height="10" style="font-size:1px; line-height:1px;">&nbsp;</td>
                            </tr></tbody></table>
                    </td>
                </tr>
            </tbody></table>
            </td>
    </tr><tr>

        <td align="center" valign="top" bgcolor="FFFFFF" style="background-color:FFFFFF;">

            <table class="rnb-del-min-width rnb-tmpl-width" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="FFFFFF" style="min-width:590px; background-color:FFFFFF" name="Layout_0" id="Layout_0">
                <tbody><tr>
                    <td class="rnb-del-min-width" valign="top" align="center" style="min-width: 590px;">
                        <table width="100%" cellpadding="0" border="0" align="center" cellspacing="0" style="background-color: rgb(220, 147, 190);">
                            <tbody><tr>
                                <td height="10" style="font-size:1px; line-height:1px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center" height="20" style="font-size: 13px; color: rgb(255, 255, 255); font-weight: normal; text-align: center; font-family: Arial, Helvetica, sans-serif;">
                                    <span style="color: rgb(255, 255, 255); text-decoration: none;">
                                        <a target="_blank" href="[MIRROR]" style="text-decoration: none; color: rgb(255, 255, 255);">Voir la version en ligne</a></span>
                                </td>
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

        <td align="center" valign="top" bgcolor="FFFFFF" style="background-color:FFFFFF;">

            <table class="rnb-del-min-width rnb-tmpl-width" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="FFFFFF" style="min-width:590px; background-color:FFFFFF;" name="Layout_4" id="Layout_4">
                <tbody><tr>
                    <td class="rnb-del-min-width" align="center" valign="top" bgcolor="#fff" style="min-width:590px; background-color: #fff;">
                        <table width="590" class="rnb-container rnb-yahoo-width" cellpadding="0" border="0" align="center" cellspacing="0" style="padding-right:20px; padding-left:20px;">
                            <tbody><tr>
                                <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font-size:14px; color:#919191; font-weight:normal; text-align:center; font-family:Arial,Helvetica,sans-serif;">
                                    <div>© 2017 Oumbox</div>
                                </td></tr>
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
EOT;
    //echo $message1;
    $semi_rand = md5(time());
        $mime_boundary = "Oumbx_Mpart_Bound_x{$semi_rand}x";
        $headers= "Sender: contact@oumbox.com\n";
//      $headers.= "Return-Path: lead@dclabs.fr\n";
        $headers.= "From: contact@oumbox.com\n";

        $headers .= "MIME-Version: 1.0\n" .
             "Content-Type: text/html; charset=UTF-8;format=flowed\n" .
                 "Content-Transfer-Encoding: 8bit\n".
                                 "X-Mailer: PHP\n".
                                 " boundary=\"{$mime_boundary}\"";
  
      $subj = "Bienvenue";
      $to ="khalid.essalhi8@gmail.com";
      $ok = mail($to, $subj, $message1, $headers);
    return $ok;
  } catch (Exception $ex) {
    echo $msg = $ex->getMessage();
  }
}



 ?>