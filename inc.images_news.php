<?php
 if (!empty($_GET['icode'])){  
 $V1 = $_GET["icode"];
 }
if (is_numeric($V1))	
 
 
  {


//include_once($_SERVER['DOCUMENT_ROOT'].'/../top/mero.php');

  
   
/*  $table_info = 'news' ; */ 

//  include($_SERVER['DOCUMENT_ROOT'].'/../top/canin/inc.counters.php');  

  
  
  
if ($_SESSION['lange']=="eng")
    {  
  
  
   $query ="SELECT photo_slide_title AS slide_title , DATE_FORMAT(news_date,'%d %b. %Y') AS date, DATE_FORMAT(date_updated,'%d %b. %Y %H:%i ') AS updated, images.title AS image1_title, images.image_name1 AS image1_name,
   
   (SELECT images.title
		 
		   FROM
		   
		  news , images 
		  
		  WHERE
		  
		  news_image2 = image_id AND  news_id  =$codeget) AS image2_title,
		  
	(SELECT image_name1
		 
		   FROM
		   
		  news , images 
		  
		  WHERE
		  
		  news_image2 = image_id AND  news_id  =$codeget) AS image2_name,
   
    (SELECT images.title
		 
		   FROM
		   
		  news , images 
		  
		  WHERE
		  
		  news_image3 = image_id AND  news_id  =$codeget) AS image3_title,
		  
	(SELECT image_name1
		 
		   FROM
		   
		  news , images 
		  
		  WHERE
		  
		  news_image3 = image_id AND  news_id  =$codeget) AS image3_name,
		  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image4 = image_id AND  news_id  =$codeget) AS image4_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image4 = image_id AND  news_id  =$codeget) AS image4_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image5 = image_id AND  news_id  =$codeget) AS image5_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image5 = image_id AND  news_id  =$codeget) AS image5_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image6 = image_id AND  news_id  =$codeget) AS image6_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image6 = image_id AND  news_id  =$codeget) AS image6_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image7 = image_id AND  news_id  =$codeget) AS image7_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image7 = image_id AND  news_id  =$codeget) AS image7_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image8 = image_id AND  news_id  =$codeget) AS image8_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image8 = image_id AND  news_id  =$codeget) AS image8_name,
	  
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image9 = image_id AND  news_id  =$codeget) AS image9_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image9 = image_id AND  news_id  =$codeget) AS image9_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image10 = image_id AND  news_id  =$codeget) AS image10_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image10 = image_id AND  news_id  =$codeget) AS image10_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image11 = image_id AND  news_id  =$codeget) AS image11_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image11 = image_id AND  news_id  =$codeget) AS image11_name,
	  
	  
	 
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 

	  
	  WHERE
	  
	  news_image12 = image_id AND  news_id  =$codeget) AS image12_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image12 = image_id AND  news_id  =$codeget) AS image12_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image13 = image_id AND  news_id  =$codeget) AS image13_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image13 = image_id AND  news_id  =$codeget) AS image13_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image14 = image_id AND  news_id  =$codeget) AS image14_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image14 = image_id AND  news_id  =$codeget) AS image14_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image15 = image_id AND  news_id  =$codeget) AS image15_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image15 = image_id AND  news_id  =$codeget) AS image15_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image16 = image_id AND  news_id  =$codeget) AS image16_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image16 = image_id AND  news_id  =$codeget) AS image16_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image17 = image_id AND  news_id  =$codeget) AS image17_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image17 = image_id AND  news_id  =$codeget) AS image17_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image18 = image_id AND  news_id  =$codeget) AS image18_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image18 = image_id AND  news_id  =$codeget) AS image18_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image19 = image_id AND  news_id  =$codeget) AS image19_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image19 = image_id AND  news_id  =$codeget) AS image19_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image20 = image_id AND  news_id  =$codeget) AS image20_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image20 = image_id AND  news_id  =$codeget) AS image20_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image21 = image_id AND  news_id  =$codeget) AS image21_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image21 = image_id AND  news_id  =$codeget) AS image21_name		
	  
  
		  
		  
  
    FROM
	
	 news , images 
  
	
	
WHERE  
	
	 news_id = '$codeget' and news_image = image_id AND news.active like '1'  AND (images.type like 'news' OR images.type like 'publications') ";
	 
	
	
  
    }
	
	// END OF QUERY FOR ENGLISH LANGUAGE IN SESSION VARIABLE
	
 elseif ($_SESSION['lange']=="fra") 
    {
	
	$queryf ="SELECT french 
  
     FROM
	
	  news 
  
	WHERE  
	
	 news_id = '$codeget'   "; 
	 
	 $results = DB::mysql_wrapper_query($queryf)
			 
	 or die("Please use menus and links to navigate2") ;
	 while ($row = mysqli_fetch_array($results))
					 {  //2
					
					 extract($row);
					 				   
					 } 
	  if ($french==1)
	  
	 { 
			   
			   
     $query ="SELECT photo_slide_title_fr AS slide_title , DATE_FORMAT(news_date,'%d %b. %Y') AS date, DATE_FORMAT(date_updated,'%d %b. %Y %H:%i ') AS updated, images.title_fr AS image1_title, images.image_name1 AS image1_name,
   
   (SELECT images.title_fr
		 
		   FROM
		   
		  news , images 
		  
		  WHERE
		  
		  news_image2 = image_id AND  news_id  =$codeget) AS image2_title,
		  
	(SELECT image_name1
		 
		   FROM
		   
		  news , images 
		  
		  WHERE
		  
		  news_image2 = image_id AND  news_id  =$codeget) AS image2_name,
   
    (SELECT images.title
		 
		   FROM
		   
		  news , images 
		  
		  WHERE
		  
		  news_image3 = image_id AND  news_id  =$codeget) AS image3_title,
		  
	(SELECT image_name1
		 
		   FROM
		   
		  news , images 
		  
		  WHERE
		  
		  news_image3 = image_id AND  news_id  =$codeget) AS image3_name,
		  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image4 = image_id AND  news_id  =$codeget) AS image4_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image4 = image_id AND  news_id  =$codeget) AS image4_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image5 = image_id AND  news_id  =$codeget) AS image5_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image5 = image_id AND  news_id  =$codeget) AS image5_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image6 = image_id AND  news_id  =$codeget) AS image6_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image6 = image_id AND  news_id  =$codeget) AS image6_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image7 = image_id AND  news_id  =$codeget) AS image7_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image7 = image_id AND  news_id  =$codeget) AS image7_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image8 = image_id AND  news_id  =$codeget) AS image8_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image8 = image_id AND  news_id  =$codeget) AS image8_name,
	  
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image9 = image_id AND  news_id  =$codeget) AS image9_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image9 = image_id AND  news_id  =$codeget) AS image9_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image10 = image_id AND  news_id  =$codeget) AS image10_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image10 = image_id AND  news_id  =$codeget) AS image10_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image11 = image_id AND  news_id  =$codeget) AS image11_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image11 = image_id AND  news_id  =$codeget) AS image11_name,						  
		  
		  
	(SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image12 = image_id AND  news_id  =$codeget) AS image12_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image12 = image_id AND  news_id  =$codeget) AS image12_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image13 = image_id AND  news_id  =$codeget) AS image13_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image13 = image_id AND  news_id  =$codeget) AS image13_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image14 = image_id AND  news_id  =$codeget) AS image14_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image14 = image_id AND  news_id  =$codeget) AS image14_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image15 = image_id AND  news_id  =$codeget) AS image15_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image15 = image_id AND  news_id  =$codeget) AS image15_name,

(SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image16 = image_id AND  news_id  =$codeget) AS image16_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image16 = image_id AND  news_id  =$codeget) AS image16_name,

	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image17 = image_id AND  news_id  =$codeget) AS image17_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image17 = image_id AND  news_id  =$codeget) AS image17_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image18 = image_id AND  news_id  =$codeget) AS image18_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image18 = image_id AND  news_id  =$codeget) AS image18_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image19 = image_id AND  news_id  =$codeget) AS image19_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image19 = image_id AND  news_id  =$codeget) AS image19_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image20 = image_id AND  news_id  =$codeget) AS image20_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image20 = image_id AND  news_id  =$codeget) AS image20_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image21 = image_id AND  news_id  =$codeget) AS image21_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image21 = image_id AND  news_id  =$codeget) AS image21_name	  					  
		  
		  
		  
  
    FROM
	
	 news , images 
  
	
	
WHERE  
	
	 news_id = '$codeget' and news_image = image_id AND news.active like '1'  AND (images.type like 'news' OR images.type like 'publications') ";		   
	  }
			
	 else
	 
	
	{
	
	$query ="SELECT photo_slide_title AS slide_title , DATE_FORMAT(news_date,'%d %b. %Y') AS date, DATE_FORMAT(date_updated,'%d %b. %Y %H:%i ') AS updated, images.title AS image1_title, images.image_name1 AS image1_name,
   
   (SELECT images.title
		 
		   FROM
		   
		  news , images 
		  
		  WHERE
		  
		  news_image2 = image_id AND  news_id  =$codeget) AS image2_title,
		  
	(SELECT image_name1
		 
		   FROM
		   
		  news , images 
		  
		  WHERE
		  
		  news_image2 = image_id AND  news_id  =$codeget) AS image2_name,
   
    (SELECT images.title
		 
		   FROM
		   
		  news , images 
		  
		  WHERE
		  
		  news_image3 = image_id AND  news_id  =$codeget) AS image3_title,
		  
	(SELECT image_name1
		 
		   FROM
		   
		  news , images 
		  
		  WHERE
		  
		  news_image3 = image_id AND  news_id  =$codeget) AS image3_name,
		  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image4 = image_id AND  news_id  =$codeget) AS image4_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image4 = image_id AND  news_id  =$codeget) AS image4_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image5 = image_id AND  news_id  =$codeget) AS image5_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image5 = image_id AND  news_id  =$codeget) AS image5_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image6 = image_id AND  news_id  =$codeget) AS image6_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image6 = image_id AND  news_id  =$codeget) AS image6_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image7 = image_id AND  news_id  =$codeget) AS image7_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image7 = image_id AND  news_id  =$codeget) AS image7_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image8 = image_id AND  news_id  =$codeget) AS image8_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image8 = image_id AND  news_id  =$codeget) AS image8_name,
	  
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image9 = image_id AND  news_id  =$codeget) AS image9_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image9 = image_id AND  news_id  =$codeget) AS image9_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image10 = image_id AND  news_id  =$codeget) AS image10_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image10 = image_id AND  news_id  =$codeget) AS image10_name,
	  
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image11 = image_id AND  news_id  =$codeget) AS image11_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image11 = image_id AND  news_id  =$codeget) AS image11_name,
	  
	  (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image12 = image_id AND  news_id  =$codeget) AS image12_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image12 = image_id AND  news_id  =$codeget) AS image12_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image13 = image_id AND  news_id  =$codeget) AS image13_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image13 = image_id AND  news_id  =$codeget) AS image13_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image14 = image_id AND  news_id  =$codeget) AS image14_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image14 = image_id AND  news_id  =$codeget) AS image14_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image15 = image_id AND  news_id  =$codeget) AS image15_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image15 = image_id AND  news_id  =$codeget) AS image15_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image16 = image_id AND  news_id  =$codeget) AS image16_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image16 = image_id AND  news_id  =$codeget) AS image16_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image17 = image_id AND  news_id  =$codeget) AS image17_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image17 = image_id AND  news_id  =$codeget) AS image17_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image18 = image_id AND  news_id  =$codeget) AS image18_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image18 = image_id AND  news_id  =$codeget) AS image18_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image19 = image_id AND  news_id  =$codeget) AS image19_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image19 = image_id AND  news_id  =$codeget) AS image19_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image20 = image_id AND  news_id  =$codeget) AS image20_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image20 = image_id AND  news_id  =$codeget) AS image20_name,
	  
	    (SELECT images.title
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image21 = image_id AND  news_id  =$codeget) AS image21_title,
	  
(SELECT image_name1
	 
	   FROM
	   
	  news , images 
	  
	  WHERE
	  
	  news_image21 = image_id AND  news_id  =$codeget) AS image21_name												  
		  
		  
		  					  
		  
		  
		  
  
    FROM
	
	 news , images 
  
	
	
WHERE  
	
	 news_id = '$codeget' and news_image = image_id AND news.active like '1'  AND (images.type like 'news' OR images.type like 'publications') "  ;
   }
 }
			   

  
  
		//	  { //2*/
			  
			  
			  
			  
			  
			  
			 $results = DB::mysql_wrapper_query($query)
			 
			  or die("Please use menus and links to navigate zz") ;
					
					while ($row = mysqli_fetch_array($results))
					 {  //3
					
					 extract($row);
					 
					    
					 
	                 } //3
		/*				} //2	
			 
			
			
			else 
				{ //4
			   exit;
			   }  //4*/
			   
			   
	
		   
			   
			   
			   
			 
		} //1
		
			
			else 
				{ //4
			  
			  // exit;
			
			    $p2="<h1 align='center'>Please use menus and links to navigate xx.</h1>
				<br>
				<br>
				<h2 align='center'><a href=# onclick=window.history.back() >Go back</a></h2>
				<br>
				<br>";
				
				
			 
			  
			   //'window.history.back(-3)';
		}  //4
	   
	
?>