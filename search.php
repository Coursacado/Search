<!DOCTYPE html>
<html>

<head>

	<title>Search - <?php echo $_GET["q"] ?></title>
	
	<link rel="icon" href="images/coursacado3.ico" type="image/ico" >
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js' async></script>
		<script src='bootstrap/js/bootstrap.js' async></script>
		<link href='bootstrap/css/bootstrap.css' rel='stylesheet'>

</head>

<body>


    <div id="hmm"><?php echo file_get_contents("navbar.html");?></div>
    
<!-- begin -->


		<div class="container">

			
			<div class="">
				<center><img src="images/coursacado.svg" height="100px" width="100px"/></center>
				<h1 class="text-center">search - <?php echo $_GET["q"] ?></h1>
				<h3 class="lead text-center">Many free courses and tutorials to find here.</h3>
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
			
			$urls = array("http://coursacado.gregorywickham.com/navbar.html","http://coursacado.gregorywickham.com/r.php","http://coursacado.gregorywickham.com/c.php","http://coursacado.gregorywickham.com/csharp.php","http://coursacado.gregorywickham.com/c++.php","http://coursacado.gregorywickham.com/html.php","http://coursacado.gregorywickham.com/php.php","http://coursacado.gregorywickham.com/java.php","http://coursacado.gregorywickham.com/javascript.php","http://coursacado.gregorywickham.com/objective-c.php","http://coursacado.gregorywickham.com/perl.php","http://coursacado.gregorywickham.com/squeak.php","http://coursacado.gregorywickham.com/scratch.php","http://coursacado.gregorywickham.com/python.php","http://coursacado.gregorywickham.com/ruby.php","http://coursacado.gregorywickham.com/sql.php","http://coursacado.gregorywickham.com/haskell.php","http://coursacado.gregorywickham.com/libs.php","http://coursacado.gregorywickham.com/api.php","http://coursacado.gregorywickham.com/index.php","http://coursacado.gregorywickham.com/about.php","http://coursacado.gregorywickham.com/more.php","http://coursacado.gregorywickham.com/discussion.html","http://coursacado.gregorywickham.com/cvst.html");
			
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
	$q = $_GET["q"];
	if(strtolower($q) === "java"){
		$q = $q." ";
	}
	if(strtolower($q) === "r"){
		$q = " ".$q." ";
	}
for ($i = 1; $i <= 41; $i++) {
    
    $currentURL = plaintext(file_get_contents($urls[$i]));
    $currentURL = explode(plaintext(file_get_contents("navbar.html")), $currentURL)[1];//[1] because explode() returns array
    $currentURL = explode(plaintext(file_get_contents("footer.html")), $currentURL)[0];//[1] because explode() returns array
    if(strpos(strtolower($currentURL), strtolower($q)) !== false){
    	echo "<b><a target='_top' href='".$urls[$i]."'>";//starts the link
    	echo explode("Coursacado | ", explode("</title>", explode("<title>", file_get_contents($urls[$i]))[1])[0])[1]."</a></b>";//[0] and [1] because explode() retunrs an array
    	echo "<br><p>$currentURL</p>";//shows page text
    	echo "<hr>";
    	$results++;
    
    }
    
    
}

if($results == 0){
	echo "no results";
}



			
			?>

		</div>

			
		<!-- Importing Bootstrap 
		<script src='bootstrap/js/bootstrap.js'></script>
	
		<!-- Importing Bootstrap

		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
		<script src='bootstrap/js/bootstrap.js'></script>
		<link href='bootstrap/css/bootstrap.css' rel='stylesheet'> -->
		
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js' async></script>
		</div>
		<div id="footermain"><?php echo file_get_contents("footer.html");?></div>
</body>

</html>
