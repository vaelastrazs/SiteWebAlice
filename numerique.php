<!DOCTYPE html>
<html>
	<?php
	static $NBRS_PAGES_VIDEO = 9;
	static $NBRS_PAGES_GRAPH = 2;
	
	$index_page_video = 1;
	$index_page_graph = 1;
	
	if (isset($_GET['p1'])){
		$index_page_video = htmlspecialchars($_GET["p1"]);
	}
	if (isset($_GET['p2'])){
		$index_page_graph = htmlspecialchars($_GET["p2"]);
	}
	
	/* Pour que l'affichage soit chronologique decroissant */
	$page_video = $NBRS_PAGES_VIDEO - $index_page_video;	
	$page_graph = $NBRS_PAGES_GRAPH - $index_page_graph;
	
	?>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="acceuil.css" />
        <link rel="stylesheet" href="works.css" />
        
        <script src="lightbox/js/jquery-1.10.2.min.js"></script>
        <script src="lightbox/js/lightbox-2.6.min.js"></script>
        <link href="lightbox/css/lightbox.css" rel="stylesheet" />
        
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="js/modernizr.custom.97074.js"></script>
        <noscript><link rel="stylesheet" type="text/css" href="css/noJS.css"/></noscript>
        
        	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="js/modernizr.custom.97074.js"></script>
		<script type="text/javascript" src="js/jquery.hoverdir.js"></script> 	
		<script type="text/javascript">
			$(function() {
			
				$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

			});
		</script>
		<script language="JavaScript" type="text/javascript">
		// showMenu function 
		function showRanksSubmenu() {
			document.getElementById("rankSubMenu").style.visibility = "visible";
			document.getElementById("rankSubMenu").style.display = "block";
		}
		
		// hideAll function 
		function hideRanksSubmenu() {
			document.getElementById("rankSubMenu").style.visibility = "hidden";
			document.getElementById("rankSubMenu").style.display = "none";
		}
		</script>
        
		<title>Alice BENOIT - Numérique</title>
	</head>
		
	
	<body>

	<div id="page">
	
	<header>
		<div id="banniere">
			<img src="imgmenu/titre.png"/>
		</div>

		<nav>
			<ul id="menu-main-navigation" class="menu">
				<li id="home" class="menuItem"><a href="index.html">Home</a></li>
				<li id="work" class="menuItem"><a href="" onmouseover="showRanksSubmenu();" onmouseout="hideRanksSubmenu();">Work</a>
					<ul id="rankSubMenu" onmouseover="showRanksSubmenu();"  onmouseout="hideRanksSubmenu();">
						<li id="numerique" class="rankSubItem"><a href="numerique.php" style="width: auto; align-self: center;">Numérique</a></li>
						<li id="print" class="rankSubItem"><a href="print.php" style="width: auto; align-self: center;">Print</a></li>
					</ul>
				</li>
				
				<li id="cv" class="menuItem"><a href="cv.html">CV & Contact</a></li>
			</ul>	
		</nav><!-- /#access -->
	</header><!-- /#header -->
	
	
	
	<div id="contentworks">
		<table id="Videos" class="mainTable" summary="Videos"> 
			<CAPTION> <img  class="titrepage" src="imgmenu/videotitre.png"/> </CAPTION> 
			<?php
			
			if((@include 'pages_numerique/videos/page_video'.$page_video.'.html') === false)
			{
				$index_page_video = 1;
				$page_video = $NBRS_PAGES_VIDEO - 1 ;
				include 'pages_numerique/videos/page_video'.$page_video.'.html';
			}
			?>
		</table>
		
		<div class="pagesManager">
			<?php
			echo '<a ';
			if ($index_page_video == 1){
				echo 'style="text-decoration : underline;"';
			}
			echo 'href="numerique.php?p1=1&p2='.$index_page_graph.'">1</a>';
			if ($index_page_video > 3){
				echo "...";
			}
			if ($index_page_video > 2){
				echo '<a href="numerique.php?p1='.($index_page_video-1).'&p2='.$index_page_graph.'">'.($index_page_video-1).'</a>';
			}
			if ($index_page_video != 1 and $index_page_video != $NBRS_PAGES_VIDEO){
				echo '<a href="" style="text-decoration : underline;">'.($index_page_video).'</a>';
			}
			if ($index_page_video < $NBRS_PAGES_VIDEO-1){
				echo '<a href="numerique.php?p1='.($index_page_video+1).'&p2='.$index_page_graph.'">'.($index_page_video+1).'</a>';
			}
			if ($index_page_video < $NBRS_PAGES_VIDEO-2){
				echo "...";
			}
			echo '<a ';
			if ($index_page_video == $NBRS_PAGES_VIDEO){
				echo 'style="text-decoration : underline;"';
			}
			echo 'href="numerique.php?p1='.$NBRS_PAGES_VIDEO.'&p2='.$index_page_graph.'">'.$NBRS_PAGES_VIDEO.'</a>';
			?>
		</div> 
		
		<table id="Graphismes" class="mainTable" summary="Graphismes"> 
			<CAPTION> <img class="titrepage" src="imgmenu/graphismetitle.png"/> </CAPTION> 
			<?php
			if((@include 'pages_numerique/graphismes/page_graphisme'.$page_graph.'.html') === false)
			{
				$index_page_graph = 1;
				$page_graph = $NBRS_PAGES_GRAPH - 1;
				include 'pages_numerique/graphismes/page_graphisme'.$page_graph.'.html';
			}
			?>
		</table>
		
		<div class="pagesManager">
			<?php
			echo '<a ';
			if ($index_page_graph == 1){
				echo 'style="text-decoration : underline;"';
			}
			echo 'href="numerique.php?p1='.$index_page_video.'&p2=1">1</a>';
			if ($index_page_graph > 3){
				echo "...";
			}
			if ($index_page_graph > 2){
				echo '<a href="numerique.php?p1='.$index_page_video.'&p2='.($index_page_graph-1).'">'.($index_page_graph-1).'</a>';
			}
			if ($index_page_graph != 1 and $index_page_graph != $NBRS_PAGES_GRAPH){
				echo '<a href="" style="text-decoration : underline;">'.($index_page_graph).'</a>';
			}
			if ($index_page_graph < $NBRS_PAGES_GRAPH-1){
				echo '<a href="numerique.php?p1='.$index_page_video.'&p2='.($index_page_graph+1).'">'.($index_page_graph+1).'</a>';
			}
			if ($index_page_graph < $NBRS_PAGES_GRAPH-2){
				echo "...";
			}
			echo '<a ';
			if ($index_page_graph == $NBRS_PAGES_GRAPH){
				echo 'style="text-decoration : underline;"';
			}
			echo 'href="numerique.php?p1='.$index_page_video.'&p2='.$NBRS_PAGES_GRAPH.'">'.$NBRS_PAGES_GRAPH.'</a>';
			
			?>
			</div> 
		</table>
                 
	</div><!-- /#content -->
		
	</div><!-- /#page -->

	
	</body>
	
</html>