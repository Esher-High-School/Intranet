</div>
<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<ul class="nav navbar-nav">
		<?php foreach($categories as $category): ?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?php echo $category['HandbookCategory']['name']; ?>
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu" role="menu">
					<?php foreach($cdocuments[$category['HandbookCategory']['id']][0] as $document): ?>
						<li>
							<?php echo $this->Html->Link(
								$document['HandbookDocument']['name'],
								array(
									'action' => 'view',
									$document['HandbookDocument']['id']
								)
							); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</li>
		<?php endforeach; ?>
	</div>
</nav>

<div class="container">