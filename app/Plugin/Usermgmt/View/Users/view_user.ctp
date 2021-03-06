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
            Party Detail
            <!--<small>Subheading</small>-->
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  
                <?php echo $this->Html->link(__("Home", true), "/") ?>                
            </li>
            <li>
                <i class="fa fa-edit fa-fw"></i>  <a href="<?php echo $this->webroot ?>allUsers">Parties</a>
            </li>
            <li class="active">
                <i class="fa fa-user"></i> Party Detail
            </li>
        </ol>
        <table class="table table-hover table-striped" width="100%" cellpadding="5">
            <tbody>
                <?php if (!empty($user)) { ?>
                <?php if ($this->UserAuth->isAdmin()) { ?>
                    <tr>
                        <td class="col-lg-2"><strong><?php echo __('User Id'); ?></strong></td>
                        <td class="col-lg-10"><?php echo $user['User']['id'] ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('User Group'); ?></strong></td>
                        <td><?php echo h($user['UserGroup']['name']) ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Username'); ?></strong></td>
                        <td><?php echo h($user['User']['username']) ?></td>
                    </tr>
                <?php } ?>
                    <tr>
                        <td><strong><?php echo __('First Name'); ?></strong></td>
                        <td><?php echo h($user['User']['first_name']) ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Middle Name'); ?></strong></td>
                        <td><?php echo h($user['User']['middle_name']) ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Last Name'); ?></strong></td>
                        <td><?php echo h($user['User']['last_name']) ?></td>
                    </tr>
                    <?php if ($this->UserAuth->isAdmin()) { ?>
                    <tr>
                        <td><strong><?php echo __('Email'); ?></strong></td>
                        <td><?php echo h($user['User']['email']) ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Email Verified'); ?></strong></td>
                        <td><?php
                            if ($user['User']['email_verified']) {
                                echo 'Yes';
                            } else {
                                echo 'No';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Status'); ?></strong></td>
                        <td><?php
                            if ($user['User']['active']) {
                                echo 'Active';
                            } else {
                                echo 'Inactive';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Ip Address'); ?></strong></td>
                        <td><?php echo h($user['User']['ip_address']) ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo __('Created'); ?></strong></td>
                        <td><?php echo date('d-M-Y', strtotime($user['User']['created'])) ?></td>
                    </tr>
                    <?php } ?>
                <?php
                } else {
                    echo "<tr><td colspan=2><br/><br/>No Data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>