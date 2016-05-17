<?php

header('Access-Control-Allow-Origin: *');
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array("Usermgmt.User");

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     *   or MissingViewException in debug mode.
     */
    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('page', 'subpage', 'title_for_layout'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    public function ledger()
    {
        $users = $this->User->find('all', array(
            "conditions" => array(
                "User.user_group_id <>" => 1,
//                "PendingTransaction.0.transaction_date >=" => "2015-09-25 00:00:00"//
            ),

        ));
//        pr($users);
        $data = array();
        if (!empty($users)) {
//            pr($users);
            foreach ($users as $u_key => $u_value) {
                $total_payment = $this->getTotalAmountTransaction($u_value["PendingTransaction"]);
                $total_receipt = $this->getTotalAmountTransaction($u_value["ReceiptTransaction"]);
                $arr = array();
                $arr["id"] = $u_value["User"]["id"];
                $arr["party_name"] = $this->prepareUserName($u_value["User"]);
                $arr["total_payment"] = $total_payment;
                $arr["total_receipt"] = $total_receipt;
                $balance = $total_receipt - $total_payment;
                $arr["balance"] = abs($balance);
                if ($balance < 0)
                    $arr["transaction_type"] = "Payment";
                else
                    $arr["transaction_type"] = "Receipt";
                $data[] = $arr;
            }
        }
        //pr($data);
        $this->set(compact("data"));
    }

    private function prepareUserName($user = array())
    {
        $fullname = null;
        if (!empty($user["first_name"]))
            $fullname = $user["first_name"];
        if (!empty($user["middle_name"]))
            $fullname .= " " . $user["middle_name"];
        if (!empty($user["last_name"]))
            $fullname .= " " . $user["last_name"];
        return $fullname;
    }

    private function getTotalAmountTransaction($transactions = array())
    {
        $total = 0;
        if (!empty($transactions)) {
            foreach ($transactions as $key => $value) {
                $total += $value["amount"];
            }
        }
        return $total;
    }

    public function typeaheadSearch()
    {

        $this->autoRender = false;
        $this->RequestHandler->respondAs('json');
        // get the search term from URL
        $term = $this->request->query['search'];

        $users = $this->User->find('all', array(
            'conditions' => array(
                'OR' => array(
                    array('User.first_name LIKE' => '' . $term . '%'),
                    array('User.last_name LIKE' => '' . $term . '%'),
                    array('User.middle_name LIKE' => '' . $term . '%'),
                )
            )
        ));
        // Format the result for select2
        $result = array();
        foreach ($users as $key => $user) {
            $tmp = array("id" => $user['User']['id'], "username" => $user['User']['first_name'] . " " . $user['User']['middle_name'] . " " . $user['User']['last_name']);
            array_push($result, $tmp);
        }
        $users = $result;

        echo json_encode($users);
        exit;
    }

}
