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
			<?php echo $user["User"]["first_name"]." ". $user["User"]["last_name"];?> - Parties
			<!--<small>Subheading</small>-->
		</h1>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<?php echo $this->Html->link(__("Home", true), "/") ?>
			</li>
			<li>
				<i class="fa fa-user"></i>
				<a href="<?php echo $this->webroot;?>allUsers">Parties</a>
			</li>
			<li class="active">
				<i class="fa fa-users"></i> <?php echo $user["User"]["first_name"]." ". $user["User"]["last_name"];?> - Parties
			</li>
			<!--<li class="pull-right">
				<i class="fa fa-plus-circle"></i> <a href="<?php /*echo $this->webroot */?>addUser">Add Party</a>
			</li>-->
		</ol>
		<?php echo $this->Session->flash(); ?>
		<!--        <div class="row">-->
		<!--<div class="panel panel-default">
            <div class="panel-heading">Employee Search</div>
            <div class="panel-body">

            </div>
        </div>-->

		<?php echo $this->Form->create('User', array('action' => 'userReferences', 'role' => 'form')); ?>
		<?php echo $this->Form->input("id", array('type' => 'hidden', 'label' => false, 'div' => false)) ?>

		<div class="col-lg-2">
			<div class="form-group">
				<?php echo $this->Form->input("search_text", array('label' => false, 'div' => false, 'class' => "form-control","placeholder"=>"Enter party name")) ?>
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
				<?php echo $this->Form->button('Reset', array('type' => 'button', 'class' => "btn btn-default","onclick"=>"window.location='".$this->webroot."userReferences/".$userId."'"));?>
			</div>
		</div>

		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<thead>
					<tr>
						<th><?php echo __('SL'); ?></th>
						<th><?php echo __('Name'); ?></th>
<!--						<th>--><?php //echo __('Group'); ?><!--</th>-->
						<th width="15%"><?php echo __('Action');?></th>
					</tr>
					</thead>
					<tbody>
					<?php

					if (!empty($users)) {
						$sl = 0;
						foreach ($users as  $row) {
							$sl++;
							echo "<tr>";
							echo "<td width='3%'>" . $sl . "</td>";
							echo "<td><a href='" . $this->Html->url('/Transactions/userTransactions/' .  $row['User']['id']) . "/T'>" . h( $row['User']['first_name']) . " " . h( $row['User']['middle_name']) . " " . h( $row['User']['last_name']) . "</a></td>";
//							echo "<td>" . h($user['User']['name']) . "</td>";
							echo "<td>";
							echo "&nbsp;<a href='" . $this->Html->url('/transactions/userTransactions/' .  $row['User']['id'] . '/T') . "'><i class='fa fa-money' title='Transactions'></i></a>";
							echo "&nbsp;<a href='" . $this->Html->url('/transactions/userTransactions/' .  $row['User']['id'] . '/I') . "'><i class='fa fa-percent' title='Interests'></i></a>";

							echo "</td>";
							echo "</tr>";
						}
					} else {
						echo "<tr><td colspan=10><br/><br/>No Data</td></tr>";
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>