<?php
 
include('../src/Rss/CRssFeed.php');

$rss = new \edax\Rss\CRssFeed(array('http://www.smashingmagazine.com/feed/'));
$items = $rss->getRssFeed();

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>RSS</title>
 	<link rel="stylesheet" type="text/css" href="css/rss_style.css">
 </head>
 <body>
 	<h1 class='feedheading'>RSS Feed</h1>
 	<?php foreach ($items->get_items(0,10) as $item): ?>

	<div class='feed'>
		<h3 class='title'><?php echo $item->get_title(); ?></h3>
			<?php if ($author = $item->get_author()): ?>
				<p class='subtitle'><?php echo "Posted by: " . $author->get_name() . ", " . $item->get_date('j F Y'); ?></p>
			<?php endif; ?>
		<hr />	
		<p><?php echo $item->get_description(); ?></p>
	</div>

	<?php endforeach; ?>
 
 </body>
 </html>