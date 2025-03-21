<?php
 if (!empty($_GET['icode'])){ 
	   $V1 = $_GET["icode"];
 
 //$V1 = strpbrk($V1, '`~!@#$^*_+=[]{}\�|><,;?*abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"/');
// $V2 = strpbrk($V1, '%20');			
		
	   
 // if    ( ($V1==false) && ($V2==false) && ($V1!=" ") )
	if (is_numeric($V1))	
 
 
  { //1    $query ="SELECT * , CONCAT_WS(' ', DAYNAME(news_date), DAYOFMONTH(news_date), MONTHNAME(news_date),YEAR(news_date)) AS date, CONCAT_WS(' ', DAYOFMONTH(news_date), MONTHNAME(news_date),YEAR(news_date)) AS updated


include_once($_SERVER['DOCUMENT_ROOT'].'/../top/mero.php'); //connection file to database in out of document-root path in a protected folder
 
  $codeget = $_GET["icode"];

// if ($codeget==6519){

// include_once($_SERVER['DOCUMENT_ROOT'].'/../top/canin/inc.offline.news.php');

// }

// else {

if ($_SESSION['lange']=="eng")
    {

  $query ="SELECT * , DATE_FORMAT(news_date,'%d %b. %Y') AS date, DATE_FORMAT(date_updated,'%d %b. %Y %H:%i ') AS updated, news_title AS title, images.title AS ititle
  
    FROM
	
	 news , images 
  
	WHERE  
	
	 news_id = '$codeget' and news_image = image_id AND news.active like '1'  AND (images.type like 'news' OR images.type like 'publications') ";
  
     }
	 
 elseif ($_SESSION['lange']=="fra")
    {
	
	$queryf ="SELECT french 
  
     FROM
	
	 news 
  
	WHERE  
	
	 news_id = '$codeget' AND  news.active like '1'  ";
	 $results = DB::mysql_wrapper_query($queryf)
			 
	 or die("Please use menus and links to navigate") ;
	 while ($row = mysqli_fetch_array($results))
					 {  //2
					
					 extract($row);
					 
					    
					 
	                 } 
	  if ($french==1)
	  
		       {
	
	// insert first query to check Sif news is available in french  if not -> english query 
	// like $query SELECT NEWS p1 if not empty continue othecase query in english

 /* $query ="SELECT * , DATE( news_date ) AS date, news_title_fra AS news_title, news_p1_fra AS news_p1  
  
    FROM
	
	 news , images 
  
	WHERE  
	
	 news_id = '$codeget' AND news_image = image_id AND news.active like '1'  AND images.type like 'news' ";
  
     }*/
	 
	 
	 $query ="SELECT * , DATE_FORMAT(news_date,'%d %b. %Y') AS date, DATE_FORMAT(date_updated,'%d %b. %Y %H:%i ') AS updated, image_caption_fr AS image_caption, news_title AS title, images.title AS ititle  
  
    FROM
	
	 news_fr , images 
  
	WHERE  
	
	 news_id_fr = '$codeget' AND news_image = image_id AND active like '1'  AND (images.type like 'news' OR images.type like 'publications') ";
  
     }
			
	 else
	 
	
	{

  $query ="SELECT * , DATE_FORMAT(news_date,'%d %b. %Y') AS date, DATE_FORMAT(date_updated,'%d %b. %Y %H:%i ') AS updated, news_title AS title, images.title AS ititle
  
    FROM
	
	 news , images 
  
	WHERE  
	
	 news_id = '$codeget' AND news_image = image_id AND news.active like '1'  AND (images.type like 'news' OR images.type like 'publications') ";
  
     }
	
 }
 
   $codeget = $_GET["icode"];
  $table_info = 'news' ;
  
  include($_SERVER['DOCUMENT_ROOT'].'/../top/canin/inc.counters.php');
	
	// insert first query to check if news is available in french  if not -> english query 
	// like $query SELECT NEWS p1 if not empty continue othecase query in english

			 $results = DB::mysql_wrapper_query($query)
			 
			  or die("Please use menus and links to navigate;") ;
					
					while ($row = mysqli_fetch_array($results))
					 {  //2
					
					 extract($row);
					  
					 
	                 } //2
					 $_SESSION['Rnews']=  htmlspecialchars($related_news1);
					 $_SESSION['Rnews2']= htmlspecialchars($related_news2);
					 $_SESSION['Rnews3']= htmlspecialchars($related_news3);
					 $_SESSION['Rnews4']= htmlspecialchars($related_news4); 
					 $_SESSION['Rnews5']= htmlspecialchars($related_news5); 
					 $_SESSION['Rnews6']=htmlspecialchars($related_news6);
					 $_SESSION['Rnews7']= htmlspecialchars($related_news7);
					 $_SESSION['Rnews-link']= htmlspecialchars($related_news_link);     
	
			    $error="<h1 align='center'>Please use menus and links to navigate.</h1>
				<br>
				<br>
				<h2 align='center'><a href=# onclick=window.history.back() >Go back</a></h2>
				<br>
				<br>";
				
			   

		   
			   
			   
			   
			 
		} //1
		
		}
			else 
				{ //4
			  
			  // exit;
			
			    $error="<h1 align='center'>Please use menus and links to navigate.</h1>
				<br>
				<br>
				<h2 align='center'><a href=# onclick=window.history.back() >Go back</a></h2>
				<br>
				<br>";
				
				
			 
			  
			   //'window.history.back(-3)';
		}  //4
	   
  //	} 
?>