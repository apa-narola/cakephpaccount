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
            Parties
            <!--<small>Subheading</small>-->
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <?php echo $this->Html->link(__("Home", true), "/") ?>
            </li>
            <li class="active">
                <i class="fa fa-users"></i> Parties
            </li>
            <li class="pull-right">
                <i class="fa fa-plus-circle"></i> <a href="<?php echo $this->webroot ?>addUser">Add Party</a>
            </li>
        </ol>
        <?php echo $this->Session->flash(); ?>
        <!--        <div class="row">-->
        <!--<div class="panel panel-default">
            <div class="panel-heading">Employee Search</div>
            <div class="panel-body">

            </div>
        </div>-->

        <?php echo $this->Form->create('User', array('action' => 'index', 'role' => 'form')); ?>
        <div class="col-lg-2">
            <div class="form-group">
                <?php echo $this->Form->input("search_text", array('label' => false, 'div' => false, 'class' => "form-control", "placeholder" => "Enter party name")) ?>
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
                <?php echo $this->Form->button('Reset', array('type' => 'button', 'class' => "btn btn-default", "onclick" => "window.location='allUsers'")); ?>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th><?php echo __('SL'); ?></th>
                            <th><?php echo __('Name'); ?></th>
                            <th><?php echo __('Group'); ?></th>
                            <th><?php echo __('Reference'); ?></th>
                            <th><?php echo __('Sub Group'); ?></th>
                            <?php if ($this->UserAuth->isAdmin()) { ?>
                                <th><?php echo __('Username'); ?></th>
                                <th><?php echo __('Email'); ?></th>
                                <th><?php echo __('Email Verified'); ?></th>
                                <th><?php echo __('Status'); ?></th>
                                <th><?php echo __('Created'); ?></th>
                            <?php } ?>
                            <th width="15%"><?php echo __('Action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
//                    pr($users);
                        if (!empty($users)) {
                            $sl = 0;
                            foreach ($users as $row) {
                                $sl++;
                                echo "<tr>";
                                echo "<td width='3%'>" . $sl . "</td>";
                                echo "<td><a href='" . $this->Html->url('/Transactions/userTransactions/' . $row['User']['id']) . "/T'>" . h($row['User']['first_name']) . " " . h($row['User']['middle_name']) . " " . h($row['User']['last_name']) . "</a></td>";
                                echo "<td>" . h($row['UserGroup']['name']) . "</td>";
                                echo "<td><a href='" . $this->Html->url('/Transactions/userTransactions/' . $row['Reference']['id']) . "/T'>" . h($row['Reference']['first_name']) . " " . h($row['Reference']['middle_name']) . " " . h($row['Reference']['last_name']) . "</a></td>";
                                echo "<td>" . h($row['UserSubGroup']['name']) . "</td>";
                                if ($this->UserAuth->isAdmin()) {
                                    echo "<td>" . h($row['User']['username']) . "</td>";
                                    echo "<td>" . h($row['User']['email']) . "</td>";
                                    echo "<td>";
                                    if ($row['User']['email_verified'] == 1) {
                                        echo "Yes";
                                    } else {
                                        echo "No";
                                    }
                                    echo "</td>";
                                    echo "<td>";
                                    if ($row['User']['active'] == 1) {
                                        echo "Active";
                                    } else {
                                        echo "Inactive";
                                    }
                                    echo "</td>";
                                    echo "<td >" . date('d-M-Y', strtotime($row['User']['created'])) . "</td>";
                                }
                                echo "<td>";
                                if ($this->UserAuth->isAdmin()) {
                                    echo "<a href='" . $this->Html->url('/viewUser/' . $row['User']['id']) . "'><i class='fa fa-eye' title='View'></i></a>";
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href='" . $this->Html->url('/changeUserPassword/' . $row['User']['id']) . "'><i class='fa fa-unlock' title='Change password'></i></a>";
                                    if ($row['User']['active'] != 0) {
                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href='" . $this->Html->url('/usermgmt/users/makeActiveInactive/' . $row['User']['id'] . '/0') . "'><i class='fa fa-times' title='Make Inactive'></i></a>";
                                    }
                                }
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href='" . $this->Html->url('/editUser/' . $row['User']['id']) . "'><i class='fa fa-pencil-square-o' title='Edit'></i></a>";
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href='" . $this->Html->url('/transactions/userTransactions/' . $row['User']['id'] . '/T') . "'><i class='fa fa-money' title='Transactions'></i></a>";
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href='" . $this->Html->url('/transactions/userTransactions/' . $row['User']['id'] . '/I') . "'><i class='fa fa-percent' title='Interests'></i></a>";
                                if ($row['User']['email_verified'] == 0) {
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href='" . $this->Html->url('/usermgmt/users/verifyEmail/' . $row['User']['id']) . "'><i class='fa fa-envelope' title='Verify email'></i></a>";
                                }
                                if ($row['User']['active'] == 0) {
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href='" . $this->Html->url('/usermgmt/users/makeActiveInactive/' . $row['User']['id'] . '/1') . "'> <i class='fa fa-check' title='Make Active'></i></span>";
                                }
                                if ($row['User']['id'] != 1 && $row['User']['username'] != 'Admin') {
                                    echo $this->Form->postLink("&nbsp;&nbsp;&nbsp;<i class='fa fa-trash' title='Delete'></i>", array('action' => 'deleteUser', $row['User']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this user?')));
                                }
//                            echo "&nbsp;&nbsp;<a href='" . $this->Html->url('/userReferences/' . $row['User']['id'] . '/I') . "'><i class='fa fa-search' title='References'></i></a>";

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