<!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" --><?php 
 session_start(); 
include($_SERVER['DOCUMENT_ROOT'].'/../top/anche/title.inc.php'); 

?>
<!DOCTYPE html>

 <?php

include($_SERVER['DOCUMENT_ROOT'].'/../top/canin/inc.check_icode.php') ;  // check icode for injections *
include($_SERVER['DOCUMENT_ROOT'].'/../top/anche/favicon.inc.php');         // include favicon  diff devices
include_once($_SERVER['DOCUMENT_ROOT'].'/../top/anche/analyticstracking.php');
?>




<!--[if lt IE 7]><html class="no-js ie ie6 lte8 lte7" prefix="og: http://ogp.me/ns#"><![endif]--> 
<!--[if IE 7]><html class="no-js ie ie7 lte8 lte7" prefix="og: http://ogp.me/ns#"><![endif]--> 
<!--[if IE 8]><html class="no-js ie ie8 lte8" prefix="og: http://ogp.me/ns#"><![endif]--> 
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->      

<!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" --><!--<![endif]-->   
  
<head>

<?php $page = ($_SERVER['SCRIPT_NAME']); ?>
<?php $url_array[0] = parse_url( $_SERVER['QUERY_STRING'] );
$myurl=$_SERVER['REQUEST_URI'];
//$myurl=urlencode($myurl);
 ?>
<?php 
  
  include($_SERVER['DOCUMENT_ROOT'].'/../top/anche/set_lang.inc.php');
//  include_once($_SERVER['DOCUMENT_ROOT'].'/../top/anche/analyticstracking.php');



 //include($_SERVER['DOCUMENT_ROOT'].'/../top/anche/title.inc.php');

?>



<?php 

//include ($_SERVER['DOCUMENT_ROOT'].'/../top/anche/dateformat.inc.php');

if (!empty($_GET['icode']))
	{ 
	   $V1 = $_GET["icode"];
 
		  if (is_numeric($V1) && ($V1>0)){
			  $icode = $_GET["icode"];
			  
			include($_SERVER['DOCUMENT_ROOT'].'/../top/canin/inc.news2.php');  // news data
 			include($_SERVER['DOCUMENT_ROOT'].'/../top/canin/inc.images_news.php');  // data for photos slide show 

			  
			  
							   }

							   
	}
  
else {
	
	$icode =0 ;
		 
	 include($_SERVER['DOCUMENT_ROOT'].'/../top/anche/news.list_con.inc.php');  
	 
	 }







?>
   


<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" >-->

    <meta http-equiv="content-type" content="text/html; charset=utf-8"> 
    <title>NDC <?php if (isset($Title)) {echo "- {$Title}";} else { echo "$title"; } ?><?php echo "-"."$news_title"; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="index,follow" />
    <meta name="revisit-after" content="1 days" />
    <meta name="author" content="NATO Defense College" />
    <meta name="keywords" lang="en" content="NDC, NATO Defense College, Defense College, NATO, OTAN, Coll&egrave;ge de D&eacute;fense de l'OTAN, Coll&egrave;ge de D&eacute;fense, NATO Rome, OTAN Roma" />
    
    
    
 



    
    
    
    <!-- InstanceBeginEditable name="meta" -->
    	<meta name="twitter:card" content="summary_large_image" />
    	<meta name="twitter:site" content="@NATO_DefCollege"/>
   	<meta name="twitter:creator" content="NATO Defense College"/>
	<meta name="twitter:title" content="<?php echo "$news_title"; ?>" />
	<meta name="twitter:description" content="NATO Defense College news" />   
	<meta name="twitter:image" content="https://www.ndc.nato.int<?php echo "$image_name1"; ?>" />

    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="NDC" />
    <meta property="og:description" content="NATO Defense College news" /> 
    <meta property="og:title" content="<?php echo "$news_title"; ?>" />
    <meta property="og:url" content="https://www.ndc.nato.int<?php echo  htmlspecialchars($myurl);?>" /> 
    <meta property="og:image" content="https://www.ndc.nato.int<?php echo "$image_name1"; ?>" />


<!-- InstanceEndEditable -->


<!-- InstanceBeginEditable name="doctitle" -->



<?php // $pagefb = ($_SERVER['SCRIPT_NAME']); ?>

<!-- InstanceEndEditable -->

<?php $page = ($_SERVER['SCRIPT_NAME']); ?>
<?php $url_array[0] = parse_url( $_SERVER['QUERY_STRING'] ); ?>


<link rel="alternate" type="application/rss+xml" title="RSS" href="/rss/ndc_news.php" >

 <?php  /* if ($_SESSION['lange']=="eng") {
echo "<link rel='stylesheet' type='text/css' href='/css/main2.css' media='screen' >";
}
elseif($_SESSION['lange']=="fra") {
echo "<link rel='stylesheet' type='text/css' href='/css/main2f.css' media='screen' >";
} */
?>

<link rel="stylesheet" type="text/css" href="/css/mainNATO.css" media="all">
<link rel="stylesheet" href="/css/mediaelementplayer.min.css" media="all" />

                <!--[if lt IE 9]>
                <script src="/js/html5shiv.min.js"></script>
                <script src="/js/html5shiv-printshiv.min.js"></script>
                <![endif]-->
       
<script integrity="sha256-pC2L+zZQ7F8UetH0haL2yLTk9cTGNx0ghnck7LCBqNU=">(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>

<!-- InstanceBeginEditable name="head" -->

  
<style type="text/css">
/*
.style4 {font-size: 12px}
*/
</style>
<!-- InstanceEndEditable -->
</head>
<body>


<div class="page">
  <div class="inner">
  <div class="header cf" id="top">
      <div class="inner">
            <div class="row">
                
 <?php 
    include($_SERVER['DOCUMENT_ROOT'].'/../top/anche/popNav.inc.php');  // PULL DOWN MENU  + social
    ?>

                 </div><!-- /.row -->
            </div><!-- /.inner -->          
        </div><!-- /.header cf -->
        

	<?php   
     /* include($_SERVER['DOCUMENT_ROOT'].'/../top/anche/header_print.inc.php'); */
    ?>

    
   <!-- InstanceBeginEditable name="EditRegion2" -->
   <?php 
   if ($icode==0) {
	   include($_SERVER['DOCUMENT_ROOT'].'/../top/anche/news.list.inc.php'); // list of news with top & bottom navigation
	   
   }
   
  // else {
	elseif (is_numeric($icode) && ($icode>0)){   
	   
	   include($_SERVER['DOCUMENT_ROOT'].'/../top/anche/current_news.inc.php');  // current selected news
	 
   }
   else {
	   echo 'Please use menus and links to navigate..' ;
   }
   
   ?>
   
   
   
   <!-- InstanceEndEditable --> 

  
        <div id="sidebar2">
        
        <!-- InstanceBeginEditable name="EditRegion4" -->

 <?php  //include($_SERVER['DOCUMENT_ROOT'].'/../top/anche/sidebar2.home.inc.php'); ?>
<!-- InstanceEndEditable -->
       <?php 
       
       //exit here
       
       
       ;?>
        
        </div>
    
         <?php 
                include($_SERVER['DOCUMENT_ROOT'].'/../top/anche/nopd_menu.inc.php');
            ?> 


  <!-- /three last closing divs commented-->
</div>         <!-- /.inner -->
</div>  <!--</div  page>-->

    

     		<script src="/js/libs.js"></script>
		<script src="/js/libs2.js"></script>
		<script src="/js/mediaelement-and-player.min.js"></script>
                <script src="/js/bundle.js"></script>
                <script src="/js/initialize.js"></script> 
            
</body>
<!-- InstanceEnd --></html>