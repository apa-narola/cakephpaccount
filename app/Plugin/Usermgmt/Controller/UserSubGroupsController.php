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
App::uses('UserMgmtAppController', 'Usermgmt.Controller');

class UserSubGroupsController extends UserMgmtAppController {

    public $uses = array('Usermgmt.UserSubGroup', 'Usermgmt.User');

    /**
     * Used to view all groups by Admin
     *
     * @access public
     * @return array
     */
    public function index() {
        /* $this->UserSubGroup->unbindModel( array('hasMany' => array('UserGroupPermission')));
          $userGroups=$this->UserSubGroup->find('all', array('order'=>'UserSubGroup.id'));
          $this->set('userGroups', $userGroups); */

        $conditions = array();
        if (!empty($this->request->data["UserSubGroup"]["search_text"])) {
            $conditions[] = array(
                "OR" => array(
                    "UserSubGroup.name LIKE '%" . $this->request->data["UserSubGroup"]["search_text"] . "%'",
//					"UserSubGroup.middle_name LIKE '%".$this->request->data["UserSubGroup"]["search_text"]."%'",
//					"UserSubGroup.last_name LIKE '%".$this->request->data["UserSubGroup"]["search_text"]."%'",
                )
            );
        }


        //$this->UserSubGroup->unbindModel(array('hasMany' => array('UserGroupPermission')));
        //$userGroups=$this->UserSubGroup->find('all', array('order'=>'UserSubGroup.id'));
        $userGroups = $this->UserSubGroup->find('all', array("conditions" => $conditions, 'order' => 'UserSubGroup.name asc'));

        $this->set('userGroups', $userGroups);
    }

    /**
     * Used to add group on the site by Admin
     *
     * @access public
     * @return void
     */
    public function addSubGroup() {
        if ($this->request->isPost()) {

            if (!$this->UserAuth->isAdmin()) {
                $this->request->data['UserSubGroup']['alias_name'] = "sub_group_alias_" . time();
                $this->request->data['UserSubGroup']['allowRegistration'] = false;
            }

            $this->UserSubGroup->set($this->data);
            if ($this->UserSubGroup->addValidate()) {
                $this->UserSubGroup->save($this->request->data, false);
                $this->Session->setFlash(__('The sub group is successfully added'));
                $this->redirect('/addSubGroup');
            }
        }
    }

    /**
     * Used to edit group on the site by Admin
     *
     * @access public
     * @param integer $groupId group id
     * @return void
     */
    public function editSubGroup($groupId = null) {
        if (!empty($groupId)) {
            if ($this->request->isPut()) {
                $this->UserSubGroup->set($this->data);
                if ($this->UserSubGroup->addValidate()) {
                    $this->UserSubGroup->save($this->request->data, false);
                    $this->Session->setFlash(__('The sub group is successfully updated'));
                    $this->redirect('/allSubGroups');
                }
            } else {
                $this->request->data = $this->UserSubGroup->read(null, $groupId);
            }
        } else {
            $this->redirect('/allSubGroups');
        }
    }

    public function deletePartyFromSubgroup($userId = null) {
        if (!empty($userId)) {
            $user = $this->User->read(null, $userId);
            if (!empty($user)) {
                $userSubGroupId = $user['User']['user_sub_group_id'];
                $this->request->data['User']['user_sub_group_id'] = 0;
                $this->User->save($this->request->data, false);
                $this->Session->setFlash(__('Party has been deleted successfully.'));
            }
        } else {
            $this->Session->setFlash(__('Sorry something went wrong, party has been delete successfully.'));
        }
        $this->redirect('/subGroupUsers/' . $userSubGroupId);
    }

    /**
     * Used to delete group on the site by Admin
     *
     * @access public
     * @param integer $userId group id
     * @return void
     */
    public function deleteSubGroup($subGroupId = null) {
        if (!empty($subGroupId)) {
            if ($this->request->isPost()) {
                $users = $this->User->isUserAssociatedWithSubGroup($subGroupId);
                if ($users == 1) {
                    $this->Session->setFlash(__('Sorry some users are associated with this group, You cannot delete'));
                    $this->redirect('/allSubGroups');
                } else {
                    if ($this->UserSubGroup->delete($subGroupId, false)) {
                        $this->Session->setFlash(__('Sub Group is successfully deleted'));
                    }
                }
            }
            $this->redirect('/allSubGroups');
        } else {
            $this->redirect('/allSubGroups');
        }
    }

    public function subGroupUsers($subGroupId = null) {
        if (!empty($subGroupId)) {

            $conditions = array("User.user_sub_group_id" => $subGroupId);
            $search_text = null;
            if (!empty($this->request->data["UserSubGroup"]["search_text"])) {
                $search_text = $this->request->data["UserSubGroup"]["search_text"];
                $conditions[] = array(
                    "OR" => array(
                        "User.first_name LIKE '%" . $this->request->data["UserSubGroup"]["search_text"] . "%'",
                        "User.middle_name LIKE '%" . $this->request->data["UserSubGroup"]["search_text"] . "%'",
                        "User.last_name LIKE '%" . $this->request->data["UserSubGroup"]["search_text"] . "%'",
                    //"UserSubGroup.name LIKE '%" . $this->request->data["User"]["search_text"] . "%'",
                    )
                );
            }

            if (!$this->UserAuth->isAdmin()) {
                // $conditions[] = array("User.user_group_id NOT IN" => array(1, 4));
                //    $conditions[] = array("User.user_group_id " => $groupId);
            }
//            echo $this->request->data["UserSubGroup"]["search_text"];exit;
            //$this->UserSubGroup->unbindModel(array('hasMany' => array('UserGroupPermission','User')));
            $subGroup = $this->UserSubGroup->read(null, $subGroupId);
//            pr($subGroup);
            //$this->request->data = null;
            if (!empty($subGroup)) {
                $this->request->data = $subGroup;
            }
            $this->request->data["UserSubGroup"]["search_text"] = $search_text;
            //$this->UserSubGroup->unbindModel(array('hasMany' => array('UserGroupPermission')));
            //$group = $this->UserSubGroup->findById($groupId);
            $users = $this->User->find("all", array("conditions" => $conditions, 'order' => 'User.first_name asc'));
            //pr($users,1);

            $this->set(compact("subGroup", "subGroupId", "users"));
            //$this->redirect('/allSubGroups');
        } else {
            $this->redirect('/allSubGroups');
        }
    }

}
