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

class UserGroupsController extends UserMgmtAppController
{
    public $uses = array('Usermgmt.UserGroup', 'Usermgmt.User');

    /**
     * Used to view all groups by Admin
     *
     * @access public
     * @return array
     */
    public function index()
    {
        /*$this->UserGroup->unbindModel( array('hasMany' => array('UserGroupPermission')));
        $userGroups=$this->UserGroup->find('all', array('order'=>'UserGroup.id'));
        $this->set('userGroups', $userGroups);*/

        $conditions = array();
        if (!empty($this->request->data["UserGroup"]["search_text"])) {
            $conditions[] = array(
                "OR" => array(
                    "UserGroup.name LIKE '%" . $this->request->data["UserGroup"]["search_text"] . "%'",
//					"UserGroup.middle_name LIKE '%".$this->request->data["UserGroup"]["search_text"]."%'",
//					"UserGroup.last_name LIKE '%".$this->request->data["UserGroup"]["search_text"]."%'",
                )
            );
        }
        if (!$this->UserAuth->isAdmin())
            $conditions[] = array("id >" => 4);


        $this->UserGroup->unbindModel(array('hasMany' => array('UserGroupPermission')));
        //$userGroups=$this->UserGroup->find('all', array('order'=>'UserGroup.id'));
        $userGroups = $this->UserGroup->find('all', array("conditions" => $conditions, 'order' => 'UserGroup.name asc'));

        $this->set('userGroups', $userGroups);
    }

    /**
     * Used to add group on the site by Admin
     *
     * @access public
     * @return void
     */
    public function addGroup()
    {
        if ($this->request->isPost()) {

            if (!$this->UserAuth->isAdmin()) {
                $this->request->data['UserGroup']['alias_name'] = "group_alias_" . time();
                $this->request->data['UserGroup']['allowRegistration'] = false;
            }

            $this->UserGroup->set($this->data);
            if ($this->UserGroup->addValidate()) {
                $this->UserGroup->save($this->request->data, false);
                $this->Session->setFlash(__('The group is successfully added'));
                $this->redirect('/addGroup');
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
    public function editGroup($groupId = null)
    {
        if (!empty($groupId)) {
            if ($this->request->isPut()) {
                $this->UserGroup->set($this->data);
                if ($this->UserGroup->addValidate()) {
                    $this->UserGroup->save($this->request->data, false);
                    $this->Session->setFlash(__('The group is successfully updated'));
                    $this->redirect('/allGroups');
                }
            } else {
                $this->request->data = $this->UserGroup->read(null, $groupId);
            }
        } else {
            $this->redirect('/allGroups');
        }
    }

    /**
     * Used to delete group on the site by Admin
     *
     * @access public
     * @param integer $userId group id
     * @return void
     */
    public function deleteGroup($groupId = null)
    {
        if (!empty($groupId)) {
            if ($this->request->isPost()) {
                $users = $this->User->isUserAssociatedWithGroup($groupId);
                if ($users) {
                    $this->Session->setFlash(__('Sorry some users are associated with this group, You cannot delete'));
                    $this->redirect('/allGroups');
                }
                if ($this->UserGroup->delete($groupId, false)) {
                    $this->Session->setFlash(__('Group is successfully deleted'));
                }
            }
            $this->redirect('/allGroups');
        } else {
            $this->redirect('/allGroups');
        }
    }

    public function groupUsers($groupId = null)
    {
        if (!empty($groupId)) {

            $conditions = array("User.user_group_id"=>$groupId);
            $search_text = null;
            if(!empty($this->request->data["UserGroup"]["search_text"])) {
                $search_text = $this->request->data["UserGroup"]["search_text"];
                $conditions[] = array(
                    "OR" => array(
                        "User.first_name LIKE '%" . $this->request->data["UserGroup"]["search_text"] . "%'",
                        "User.middle_name LIKE '%" . $this->request->data["UserGroup"]["search_text"] . "%'",
                        "User.last_name LIKE '%" . $this->request->data["UserGroup"]["search_text"] . "%'",
                        //"UserGroup.name LIKE '%" . $this->request->data["User"]["search_text"] . "%'",
                    )
                );
            }

            if(!$this->UserAuth->isAdmin()) {
               // $conditions[] = array("User.user_group_id NOT IN" => array(1, 4));
            //    $conditions[] = array("User.user_group_id " => $groupId);
            }
//            echo $this->request->data["UserGroup"]["search_text"];exit;
            $this->UserGroup->unbindModel(array('hasMany' => array('UserGroupPermission','User')));
            $group = $this->UserGroup->read(null, $groupId);
//            pr($group);
            //$this->request->data = null;
            if (!empty($group)) {
                $this->request->data = $group;
            }
            $this->request->data["UserGroup"]["search_text"] = $search_text;
            //$this->UserGroup->unbindModel(array('hasMany' => array('UserGroupPermission')));

            //$group = $this->UserGroup->findById($groupId);
            $users = $this->User->find("all",array("conditions" => $conditions));
            //pr($users,1);

            $this->set(compact("group","groupId","users"));
            //$this->redirect('/allGroups');
        } else {
            $this->redirect('/allGroups');
        }
    }
}