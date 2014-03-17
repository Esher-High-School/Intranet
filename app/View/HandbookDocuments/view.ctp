<?php echo $this->element('handbookmenu'); ?>
<?php if ($exists !== false){ ?>
	<iframe src="/handbook/download/<?php echo $document['HandbookDocument']['id'] . '/' . $document['HandbookDocument']['filename']; ?>" width="100%" height="800" style="width: 100%"></iframe>
<?php } else { ?> 
	<p>The document could not be found.</p>
<?php } ?> 
