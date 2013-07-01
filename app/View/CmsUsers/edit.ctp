<h2>Edit CMS User</h2>
<br>
<div class="row">
	<div class="span4">
		<?php
			echo $this->Form->create('CmsUser', array('action' => 'edit'));
			echo $this->Form->input('user', array('class' => 'span4', 'placeholder' => 'Username', 'label' => false));
			echo $this->Form->input('authlevel', array('class' => 'span4', 'placeholder' => 'Role', 'label' => false));
			echo $this->Form->button('Edit CMS User', array('type' => 'submit', 'class' => 'btn btn-primary btn-block'));
			echo $this->Form->end();
		?>
	</div>
	<div class="span3">
		<p style="padding-top: 4px;">Username</p>
		<p style="padding-top: 14px;">Role</p>
	</div>
</div>