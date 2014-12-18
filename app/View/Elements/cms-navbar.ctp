<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
	<div class="navbar-inner">
		<div class="container">
			<a href="/" class="navbar-brand">Staff Intranet</a>
			<ul class="nav navbar-nav pull-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Content <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<?php
						if (
							isset($ugroups['Publishers']) or
							isset($ugroups['Administrators'])
						):
						?>
							<li>
								<?php
								echo $this->Html->Link(
									'<i class="fa fa-file-text-o"></i> Pages',
									array(
										'controller' => 'pages',
										'action' => 'index'
										),
									array(
										'escape' => false
									)
								);
								?>
							</li>
							<li>
								<?php
								echo $this->Html->Link(
									'<i class="fa fa-list-alt"></i> Staff Bulletin',
									array(
										'controller' => 'staffBulletins',
										'action' => 'index'
										),
									array(
										'escape' => false
									)
								);
								?>
							</li>
							<li>
								<?php
								echo $this->Html->Link(
									'<i class="fa fa-book"></i> Staff Handbook',
									array(
										'controller' => 'handbookCategories',
										'action' => 'index'
									),
									array(
										'escape' => false
									)
								); ?>
							</li>
							<li>
								<?php
								echo $this->Html->Link(
									'<i class="fa fa-link"></i> Links',
									array(
										'controller' => 'links',
										'action' => 'index'
									),
									array('escape' => false)
								);
								?>
							</li>
						<?php endif; ?>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Admin
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<?php if (isset($ugroups['Administrators'])): ?>
							<li>
								<?php
								echo $this->Html->Link(
									'<i class="fa fa-user"></i> Users',
									array(
										'controller' => 'users',
										'action' => 'index'
									),
									array(
										'escape' => false
									)
								);
								?>
							</li>
							<li>
								<?php
								echo $this->Html->Link(
									'<i class="fa fa-users"></i> Groups',
									array(
										'controller' => 'groups',
										'action' => 'index'
									),
									array(
										'escape' => false
									)
								);
								?>
							</li>
							<li class="divider"></li>
							<li>
								<?php
								echo $this->Html->Link(
									'<i class="fa fa-cogs"></i> Global Settings',
									array(
										'controller' => 'settings',
										'action' => 'index'
									),
									array(
										'escape' => false
									)
								);
								?>
							</li>
						<?php endif; ?>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
