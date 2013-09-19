<h2><?php echo $document['HandbookDocument']['name']; ?></h2>
<?php echo $this->element('handbookmenu'); ?>
<?php if ($exists !== false){ ?>
	<iframe src="/files/handbook/<?php echo $document['HandbookDocument']['path']; ?>" width="100%" height="700"></iframe>
<?php } else { ?> 
	<p>The document could not be found.</p>
<?php } ?> 
