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

// Routes for standard actions

Router::connect('/login', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'login'));
Router::connect('/logout', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'logout'));
Router::connect('/forgotPassword', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'forgotPassword'));
Router::connect('/activatePassword/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'activatePassword'));
Router::connect('/register', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'register'));
Router::connect('/changePassword', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'changePassword'));
Router::connect('/changeUserPassword/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'changeUserPassword'));
Router::connect('/addUser', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'addUser'));
Router::connect('/addReference', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'addReference'));
Router::connect('/editUser/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'editUser'));
Router::connect('/editReference/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'editReference'));
Router::connect('/deleteUser/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'deleteUser'));
Router::connect('/deleteRefrence/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'deleteRefrence'));
Router::connect('/deleteParty/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'deleteParty'));
Router::connect('/viewUser/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'viewUser'));
Router::connect('/userVerification/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'userVerification'));
Router::connect('/allUsers', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'index'));
Router::connect('/allReferences', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'indexReference'));
Router::connect('/dashboard', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'dashboard'));
Router::connect('/permissions', array('plugin' => 'usermgmt', 'controller' => 'user_group_permissions', 'action' => 'index'));
Router::connect('/update_permission', array('plugin' => 'usermgmt', 'controller' => 'user_group_permissions', 'action' => 'update'));
Router::connect('/accessDenied', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'accessDenied'));
Router::connect('/myprofile', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'myprofile'));
Router::connect('/allGroups', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'index'));
Router::connect('/addGroup', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'addGroup'));
Router::connect('/editGroup/*', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'editGroup'));
Router::connect('/deleteGroup/*', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'deleteGroup'));
Router::connect('/deletePartyFromGroup/*', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'deletePartyFromGroup'));
Router::connect('/emailVerification', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'emailVerification'));
Router::connect('/groupUsers/*', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'groupUsers'));
Router::connect('/allSubGroups', array('plugin' => 'usermgmt', 'controller' => 'user_sub_groups', 'action' => 'index'));
Router::connect('/addSubGroup', array('plugin' => 'usermgmt', 'controller' => 'user_sub_groups', 'action' => 'addSubGroup'));
Router::connect('/editSubGroup/*', array('plugin' => 'usermgmt', 'controller' => 'user_sub_groups', 'action' => 'editSubGroup'));
Router::connect('/deleteSubGroup/*', array('plugin' => 'usermgmt', 'controller' => 'user_sub_groups', 'action' => 'deleteSubGroup'));
Router::connect('/subGroupUsers/*', array('plugin' => 'usermgmt', 'controller' => 'user_sub_groups', 'action' => 'subGroupUsers'));
Router::connect('/deletePartyFromSubgroup/*', array('plugin' => 'usermgmt', 'controller' => 'user_sub_groups', 'action' => 'deletePartyFromSubgroup'));
Router::connect('/userReferences/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'userReferences'));




