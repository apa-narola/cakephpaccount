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
            Dashboard
            <!--<small>Subheading</small>-->
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>  
                <?php echo $this->Html->link(__("Home", true), "/") ?>
            </li>            
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>
        <div class="col-lg-6">
           Hello <?php echo h($user['User']['first_name']) . ' ' . h($user['User']['last_name']);?>, Welcome !
        </div>
    </div>
</div>
<!-- /.row -->