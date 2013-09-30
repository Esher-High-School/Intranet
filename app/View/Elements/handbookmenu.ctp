<div class="navigation nav-sub nav-handbook">

	<div class="">

		<?php foreach($categories as $category): ?>

			<li class="dropdown" style="display: inline;">
				<a href="#" class="button-nav" data-toggle="dropdown">
					<?php echo $category['HandbookCategory']['name']; ?>
				</a>
				<ul class="dropdown-menu">
					<?php foreach($category['HandbookDocument'] as $document): ?>
						<li style="text-align: left;">
							<?php echo $this->Html->Link($document['name'], array('action' => 'view', $document['id'])); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</li>

		<?php endforeach; ?>

	</div>

</div>
