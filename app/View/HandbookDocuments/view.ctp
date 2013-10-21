<h2><?php echo $document['HandbookDocument']['name']; ?></h2>
<?php echo $this->element('handbookmenu'); ?>
<?php if ($exists !== false){ ?>
	<iframe src="/HandbookDocuments/document/<?php echo $document['HandbookDocument']['id']; ?>.pdf" width="100%" height="700"></iframe>
<?php } else { ?> 
	<p>The document could not be found.</p>
<?php } ?> 
