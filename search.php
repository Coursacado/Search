<!DOCTYPE html>
<html>

<head>

	<title>Search - <?php echo $_GET["q"] ?></title>
	
	<link rel="icon" href="images/coursacado3.ico" type="image/ico" >
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
		<script src='bootstrap/js/bootstrap.js'></script>
		<link href='bootstrap/css/bootstrap.css' rel='stylesheet'>

</head>

<body>


    <div id="hmm"></div>
    
<!-- begin -->


		<div class="container">

			
			<div class="">
				<center><img src="images/coursacado.svg" height="100px" width="100px"/></center>
				<h1 class="text-center">search - <?php echo $_GET["q"] ?></h1>
				<h3 class="lead text-center">Many free courses and turorials to find here.</h3>
				<center>
 <form class="navbar-form" role="search" action="search.php" target="_top">
        <div class="form-group">
          <input name="q" type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
      </form><br></center>
			</div>
		
		<br>
		<div class="row  well">
		
			<?php 
			
			$urls = array("http://coursacado.gregorywickham.com/navbar.html","http://coursacado.gregorywickham.com/html.html","http://coursacado.gregorywickham.com/javascript.html","http://coursacado.gregorywickham.com/php.html","http://coursacado.gregorywickham.com/api.html","http://coursacado.gregorywickham.com/cvst.html","http://coursacado.gregorywickham.com/c.html","http://coursacado.gregorywickham.com/csharp.html","http://coursacado.gregorywickham.com/c++.html","http://coursacado.gregorywickham.com/java.html","http://coursacado.gregorywickham.com/objective-c.html","http://coursacado.gregorywickham.com/perl.html","http://coursacado.gregorywickham.com/python.html","http://coursacado.gregorywickham.com/ruby.html","http://coursacado.gregorywickham.com/sql.html","http://coursacado.gregorywickham.com/libs.html","http://coursacado.gregorywickham.com/index.html","http://coursacado.gregorywickham.com/about.html","http://coursacado.gregorywickham.com/more.html","http://coursacado.gregorywickham.com/discussion.html");
			
function plaintext($html)
{
    // remove comments and any content found in the the comment area (strip_tags only removes the actual tags).
    $plaintext = preg_replace('#<!--.*?-->#s', '', $html);

    // put a space between list items (strip_tags just removes the tags).
    $plaintext = preg_replace('#</li>#', ' </li>', $plaintext);

    // remove all script and style tags
    $plaintext = preg_replace('#<(script|style)\b[^>]*>(.*?)</(script|style)>#is', "", $plaintext);

    // remove br tags (missed by strip_tags)
    $plaintext = preg_replace("#<br[^>]*?>#", " ", $plaintext);

    // remove all remaining html
    $plaintext = strip_tags($plaintext);

    return $plaintext;
}
	$results = 0;		
for ($i = 1; $i <= 38; $i++) {
    
    $currentURL = plaintext(file_get_contents($urls[$i]));
    if(strpos(strtolower($currentURL), strtolower($_GET["q"]." ")) !== false){
    	echo "<a target='_top' href='".$urls[$i]."'>";//starts the link
    	echo explode(".html", explode("http://coursacado.gregorywickham.com/", $urls[$i])[1])[0]."</a>";//[0] and [1] because explode() retunrs an array
    	echo "<B>$currentURL</b>";//shows page text
    	echo "<hr>";
    	$results++;
    
    }
    
    
}

if($resluts == 0){
	echo "no more results";
}



			
			?>

		</div>

			
		<!-- Importing Bootstrap 
		<script src='bootstrap/js/bootstrap.js'></script>
	
		<!-- Importing Bootstrap

		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
		<script src='bootstrap/js/bootstrap.js'></script>
		<link href='bootstrap/css/bootstrap.css' rel='stylesheet'> -->
		
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
		<script>$("#hmm").load("http://coursacado.gregorywickham.com/navbar.html");</script>
		</div>
		<div id="footermain"></div>
		<script>$("#footermain").load("../footer.html");</script>
</body>

</html>
