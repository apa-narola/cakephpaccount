<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<?php echo __('Groups'); ?>
			<!--<small>Subheading</small>-->
		</h1>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<?php echo $this->Html->link(__("Home", true), "/") ?>
			</li>
			<li class="active">
				<i class="fa fa-users"></i> <?php echo __('Groups'); ?>
			</li>
			<li class="pull-right">
				<i class="fa fa-plus-circle"></i> <a href="<?php echo $this->webroot ?>addGroup"><?php echo __('Add Group'); ?></a>
			</li>
		</ol>
		<?php echo $this->Session->flash(); ?>
		<!--        <div class="row">-->
		<!--<div class="panel panel-default">
            <div class="panel-heading">Employee Search</div>
            <div class="panel-body">

            </div>
        </div>-->

		<?php echo $this->Form->create('UserGroup', array('action' => 'index', 'role' => 'form')); ?>
		<div class="col-lg-2">
			<div class="form-group">
				<?php echo $this->Form->input("search_text", array('label' => false, 'div' => false, 'class' => "form-control","placeholder"=>"Enter group name")) ?>
			</div>
		</div>
		<?php
		$options = array(
			'div' => array("class" => 'col-lg-1'),
			'label' => __('Search'),
			'class' => "btn btn-default"
		);
		echo $this->Form->end($options);

		?>
		<div class="col-lg-1">
			<div class="form-group">
				<?php echo $this->Form->button('Reset', array('type' => 'button', 'class' => "btn btn-default","onclick"=>"window.location='allGroups'"));?>
			</div>
		</div>

		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<thead>
					<tr>
						<?php if ($this->UserAuth->isAdmin()) { ?>
						<th><?php echo __('Group Id');?></th>
						<th><?php echo __('Alias Name');?></th>
						<th><?php echo __('Allow Registration');?></th>
						<th><?php echo __('Created');?></th>
						<?php } ?>
						<th><?php echo __('Group Name');?></th>
						<th width="8%"><?php echo __('Action');?></th>
					</tr>
					</thead>
					<tbody>
					<?php   if(!empty($userGroups)) {
						foreach ($userGroups as $row) {
							echo "<tr>";
							if ($this->UserAuth->isAdmin()) {
								echo "<td>" . $row['UserGroup']['id'] . "</td>";
								echo "<td>" . h($row['UserGroup']['alias_name']) . "</td>";
								echo "<td>";
								if ($row['UserGroup']['allowRegistration']) {
									echo "Yes";
								} else {
									echo "No";
								}
								echo "</td>";
								echo "<td>" . date('d-M-Y', strtotime($row['UserGroup']['created'])) . "</td>";
							}
							echo "<td>" . h($row['UserGroup']['name']) . "</td>";
							echo "<td>";
							echo "<span class='icon'><a href='".$this->Html->url('/editGroup/'.$row['UserGroup']['id'])."'><i class='fa fa-pencil-square-o' title='Edit'></i></a></span>";
							echo "&nbsp;<span class='icon'><a href='".$this->Html->url('/groupUsers/'.$row['UserGroup']['id'])."'><i class='fa fa-users' title='Group Parties'></i></a></span>";
							if ($row['UserGroup']['id']!=1) {
								echo $this->Form->postLink("&nbsp;<i class='fa fa-trash' title='Delete'></i>", array('action' => 'deleteGroup', $row['UserGroup']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this group? Delete it your own risk')));
							}
							echo "</td>";
							echo "</tr>";
						}
					} else {
						echo "<tr><td colspan=6><br/><br/>No Data</td></tr>";
					} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>