<?php

App::uses('AppController', 'Controller');

/**
 * Ajax Controller
 *
 * @property Transaction $Transaction
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class AjaxController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Flash', 'Session');
    var $helpers = array('Pdf');
    public $uses = array('Usermgmt.User');
    const RECORD_PER_PAGE = 40;

    public function addNewParty()
    {
        $response = array("userId"=>null,"success" => false,"errors"=>null);
        //pr($this->data);
        if ($this->request->isPost()) {
            $this->User->set($this->data);
            if ($this->User->AddPartyValidate()) {
                $this->request->data['User']['user_group_id'] = 2;
                $this->request->data['User']['email_verified'] = 1;
                $this->request->data['User']['active'] = 1;
                $salt = $this->UserAuth->makeSalt();
                $this->request->data['User']['salt'] = $salt;
                $this->request->data['User']['password'] = $this->UserAuth->makePassword("123456", $salt);
                $this->User->save($this->request->data, false);
                $userId = $this->User->getLastInsertID();
                $response = array("userId"=>$userId,"success" => true);
            }else{
                $errors = $this->User->validationErrors;
                $response["errors"] = $errors;
            }
        }
        echo json_encode($response);
        exit;
    }

}
