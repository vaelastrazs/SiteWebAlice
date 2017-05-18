<!DOCTYPE html>
<html>
	<?php
	static $NBRS_PAGES_CROQUIS = 9;
	static $NBRS_PAGES_LAB = 2;
	
	$index_page_croquis = 1;
	$index_page_lab = 1;
	
	if (isset($_GET['p1'])){
		$index_page_croquis = htmlspecialchars($_GET["p1"]);
	}
	if (isset($_GET['p2'])){
		$index_page_lab = htmlspecialchars($_GET["p2"]);
	}
	
	/* Pour que l'affichage soit chronologique decroissant */
	$page_croquis = $NBRS_PAGES_CROQUIS - $index_page_croquis;	
	$page_lab = $NBRS_PAGES_LAB - $index_page_lab;
	
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
        
		<title>Alice BENOIT - Print</title>
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
		<table id="Croquis" class="mainTable" summary="Croquis"> 
			<CAPTION> <img  class="titrepage" src="imgmenu/videotitre.png"/> </CAPTION> 
			<?php
			
			if((@include 'pages_print/croquis/page_croquis'.$page_croquis.'.html') === false)
			{
				$index_page_croquis = 1;
				$page_croquis = $NBRS_PAGES_CROQUIS - 1;
				include 'pages_print/croquis/page_croquis'.$page_croquis.'.html';
			}
			?>
			</table>
		
			<div class="pagesManager">
			<?php
			echo '<a ';
			if ($index_page_croquis == 1){
				echo 'style="text-decoration : underline;"';
			}
			echo 'href="print.php?p1=1&p2='.$index_page_lab.'">1</a>';
			if ($index_page_croquis > 3){
				echo "...";
			}
			if ($index_page_croquis > 2){
				echo '<a href="print.php?p1='.($index_page_croquis-1).'&p2='.$index_page_lab.'">'.($index_page_croquis-1).'</a>';
			}
			if ($index_page_croquis != 1 and $index_page_croquis != $NBRS_PAGES_CROQUIS){
				echo '<a href="" style="text-decoration : underline;">'.($index_page_croquis).'</a>';
			}
			if ($index_page_croquis < $NBRS_PAGES_CROQUIS-1){
				echo '<a href="print.php?p1='.($index_page_croquis+1).'&p2='.$index_page_lab.'">'.($index_page_croquis+1).'</a>';
			}
			if ($index_page_croquis < $NBRS_PAGES_CROQUIS-2){
				echo "...";
			}
			echo '<a ';
			if ($index_page_croquis == $NBRS_PAGES_CROQUIS){
				echo 'style="text-decoration : underline;"';
			}
			echo 'href="print.php?p1='.$NBRS_PAGES_CROQUIS.'&p2='.$index_page_lab.'">'.$NBRS_PAGES_CROQUIS.'</a>';
			?>
			</div> 
		
		<table id="Lab" class="mainTable" summary="Lab"> 
			<CAPTION> <img class="titrepage" src="imgmenu/graphismetitle.png"/> </CAPTION>
			<?php
			if((@include 'pages_print/labs/page_lab'.$page_lab.'.html') === false)
			{
				$index_page_lab = 1;
				$page_lab = $NBRS_PAGES_LAB - 1;
				include 'pages_print/labs/page_lab'.$page_lab.'.html';
			}
			?>
		</table>
		
		<div class="pagesManager">
			<?php
			echo '<a ';
			if ($index_page_lab == 1){
				echo 'style="text-decoration : underline;"';
			}
			echo 'href="print.php?p1='.$index_page_croquis.'&p2=1">1</a>';
			if ($index_page_lab > 3){
				echo "...";
			}
			if ($index_page_lab > 2){
				echo '<a href="print.php?p1='.$index_page_croquis.'&p2='.($index_page_lab-1).'">'.($index_page_lab-1).'</a>';
			}
			if ($index_page_lab != 1 and $index_page_lab != $NBRS_PAGES_LAB){
				echo '<a href="" style="text-decoration : underline;">'.($index_page_lab).'</a>';
			}
			if ($index_page_lab < $NBRS_PAGES_LAB-1){
				echo '<a href="print.php?p1='.$index_page_croquis.'&p2='.($index_page_lab+1).'">'.($index_page_lab+1).'</a>';
			}
			if ($index_page_lab < $NBRS_PAGES_LAB-2){
				echo "...";
			}
			echo '<a ';
			if ($index_page_lab == $NBRS_PAGES_LAB){
				echo 'style="text-decoration : underline;"';
			}
			echo 'href="print.php?p1='.$index_page_croquis.'&p2='.$NBRS_PAGES_LAB.'">'.$NBRS_PAGES_LAB.'</a>';
			
			?>
		</div> 
		</table>
                 
	</div><!-- /#content -->
				

		

		
	</div><!-- /#page -->

	
	</body>
	
</html>