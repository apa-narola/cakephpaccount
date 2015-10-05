<?php

App::uses('AppController', 'Controller');

/**
 * Transactions Controller
 *
 * @property Transaction $Transaction
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class TransactionsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Flash', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $conditions = array();
        //Transform POST into GET
        if (($this->request->is('post') || $this->request->is('put')) && isset($this->data['Transaction'])) {
            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];
            // We need to overwrite the page every time we change the parameters
            $filter_url['page'] = 1;

            // for each filter we will add a GET parameter for the generated url
            foreach ($this->data['Transaction'] as $name => $value) {
                if ($value) {
                    // You might want to sanitize the $value here
                    // or even do a urlencode to be sure
                    $filter_url[$name] = urlencode($value);
                }
            }
            // now that we have generated an url with GET parameters, 
            // we'll redirect to that page
            return $this->redirect($filter_url);
        } else {
            if (!empty($this->params['named']["transaction_from"]) || !empty($this->params['named']["transaction_to"])) {
                if (!empty($this->params['named']["transaction_from"]) && !empty($this->params['named']["transaction_to"])) {
                    $conditions[] = array('Transaction.transaction_date >= ' => $this->params['named']["transaction_from"],
                        'Transaction.transaction_date <= ' => $this->params['named']["transaction_to"]
                    );
                } elseif (!empty($this->params['named']["transaction_from"])) {
                    $conditions[] = array('Transaction.transaction_date >= ' => $this->params['named']["transaction_from"]);
                } elseif (!empty($this->params['named']["transaction_to"])) {
                    $conditions[] = array('Transaction.transaction_date <= ' => $this->params['named']["transaction_to"]);
                }
            }
            $ignoreFields = array("transaction_from", "transaction_to");
            // Inspect all the named parameters to apply the filters
            foreach ($this->params['named'] as $param_name => $value) {
                // Don't apply the default named parameters used for pagination
                if (!in_array($param_name, array('page', 'sort', 'direction', 'limit'))) {
                    // You may use a switch here to make special filters
                    // like "between dates", "greater than", etc
                    if (in_array($param_name, $ignoreFields))
                        continue;

                    if ($param_name == "search") {
                        $conditions['OR'] = array(
                            array('Transaction.id=' => $value),
                            array('Transaction.remarks LIKE' => '%' . $value . '%'),
                            array('User.first_name LIKE' => '%' . $value . '%'),
                            array('User.last_name LIKE' => '%' . $value . '%'),
                            array('User.username LIKE' => '%' . $value . '%'),
                            array('User.email LIKE' => '%' . $value . '%'),
                        );
                    } else {
                        if ($param_name == "is_interest" && $value == 2)
                            $value = 0;
                        $conditions['Transaction.' . $param_name] = $value;
                    }
                    $this->request->data['Transaction'][$param_name] = $value;
                }
            }
        }
        //pr($conditions);
        $this->Transaction->recursive = 0;
        $this->paginate = array(
            'limit' => 5,
            'conditions' => $conditions,
            'order' => 'Transaction.modified desc'
        );
        $this->set('transactions', $this->paginate());
        // Pass the search parameter to highlight the text
        $this->set('search', isset($this->params['named']['search']) ? $this->params['named']['search'] : "");

//        $this->Transaction->recursive = 0;
//        $this->set('transactions', $this->Paginator->paginate());
    }

    public function userTransactions($user_id = null) {
        if (empty($user_id))
            $user_id = $this->request->params["named"]["user_id"];

        $transactionUser = $this->Transaction->User->find('first', array("conditions" => array("id" => $user_id)));
        $conditions = array();
        //Transform POST into GET
        if (($this->request->is('post') || $this->request->is('put')) && isset($this->data['Transaction'])) {
            $filter_url['user_id'] = $user_id;
            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];
            // We need to overwrite the page every time we change the parameters
            $filter_url['page'] = 1;

            // for each filter we will add a GET parameter for the generated url
            foreach ($this->data['Transaction'] as $name => $value) {
                if ($value) {
                    // You might want to sanitize the $value here
                    // or even do a urlencode to be sure
                    $filter_url[$name] = urlencode($value);
                }
            }
            // now that we have generated an url with GET parameters,
            // we'll redirect to that page
            return $this->redirect($filter_url);
        } else {
            if (!empty($this->params['named']["transaction_from"]) || !empty($this->params['named']["transaction_to"])) {
                if (!empty($this->params['named']["transaction_from"]) && !empty($this->params['named']["transaction_to"])) {
                    $conditions[] = array('Transaction.transaction_date >= ' => $this->params['named']["transaction_from"],
                        'Transaction.transaction_date <= ' => $this->params['named']["transaction_to"]
                    );
                } elseif (!empty($this->params['named']["transaction_from"])) {
                    $conditions[] = array('Transaction.transaction_date >= ' => $this->params['named']["transaction_from"]);
                } elseif (!empty($this->params['named']["transaction_to"])) {
                    $conditions[] = array('Transaction.transaction_date <= ' => $this->params['named']["transaction_to"]);
                }
            }
            $ignoreFields = array("transaction_from", "transaction_to");
            // Inspect all the named parameters to apply the filters
            foreach ($this->params['named'] as $param_name => $value) {
                // Don't apply the default named parameters used for pagination
                if (!in_array($param_name, array('page', 'sort', 'direction', 'limit'))) {
                    // You may use a switch here to make special filters
                    // like "between dates", "greater than", etc
                    if (in_array($param_name, $ignoreFields))
                        continue;

                    if ($param_name == "search") {
                        $conditions['OR'] = array(
                            array('Transaction.id' => $value),
                            array('Transaction.remarks LIKE' => '%' . $value . '%'),
                            array('User.first_name LIKE' => '%' . $value . '%'),
                            array('User.last_name LIKE' => '%' . $value . '%'),
                            array('User.username LIKE' => '%' . $value . '%'),
                            array('User.email LIKE' => '%' . $value . '%'),
                        );
                    } else {
                        if ($param_name == "is_interest" && $value == 2)
                            $value = 0;
                        $conditions['Transaction.' . $param_name] = $value;
                    }
                    $this->request->data['Transaction'][$param_name] = $value;
                }
            }
        }
        $conditions[] = array("Transaction.user_id" => $user_id);
        $this->Transaction->recursive = 0;
        $this->paginate = array(
            'limit' => 5,
            'conditions' => $conditions,
            'order' => 'Transaction.id desc'
        );
        $transactions = $this->paginate();
        $fullname = "NA";
        if (isset($transactionUser["User"]["first_name"]))
            $fullname = $transactionUser["User"]["first_name"] . " " . $transactionUser["User"]["last_name"];
        $this->set(compact('fullname', 'transactions', "user_id"));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Transaction->exists($id)) {
            throw new NotFoundException(__('Invalid transaction'));
        }
        $options = array('conditions' => array('Transaction.' . $this->Transaction->primaryKey => $id));
        $this->set('transaction', $this->Transaction->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            if (isset($this->request->data["Transaction"]["transaction_date"]))
                $this->request->data["Transaction"]["transaction_date"] = date("Y-m-d", strtotime($this->request->data["Transaction"]["transaction_date"]));
            $this->Transaction->create();
            if ($this->Transaction->save($this->request->data)) {
                $this->Flash->success(__('The transaction has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
            }
        }
        if ($this->UserAuth->isAdmin())
            $users = $this->Transaction->User->find('list', array("fields" => array("id", "first_name")));
        else
            $users = $this->Transaction->User->find('list', array("fields" => array("id", "first_name"), "conditions" => array("user_group_id <>" => 1)));

        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Transaction->exists($id)) {
            throw new NotFoundException(__('Invalid transaction'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if (isset($this->request->data["Transaction"]["transaction_date"]))
                $this->request->data["Transaction"]["transaction_date"] = date("Y-m-d", strtotime($this->request->data["Transaction"]["transaction_date"]));

            if ($this->Transaction->save($this->request->data)) {
                $this->Flash->success(__('The transaction has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Transaction.' . $this->Transaction->primaryKey => $id));
            $this->request->data = $this->Transaction->find('first', $options);
        }
        if ($this->UserAuth->isAdmin())
            $users = $this->Transaction->User->find('list', array("fields" => array("id", "first_name")));
        else
            $users = $this->Transaction->User->find('list', array("fields" => array("id", "first_name"), "conditions" => array("user_group_id <>" => 1)));

        $this->set(compact('users'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Transaction->id = $id;
        if (!$this->Transaction->exists()) {
            throw new NotFoundException(__('Invalid transaction'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Transaction->delete()) {
            $this->Flash->success(__('The transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function getAllTransactionCount() {
        return $this->Transaction->find('count');
    }

    public function getPaymentTransactionCount() {
        return $this->Transaction->find('count', array('conditions' => array('Transaction.transaction_type' => 'Payment')));
    }

    public function getReceiptTransactionCount() {
        return $this->Transaction->find('count', array('conditions' => array('Transaction.transaction_type' => 'Receipt')));
    }

    public function getAllMainTransactionCount() {
        return $this->Transaction->find('count', array('conditions' => array('Transaction.is_interest' => 0)));
    }

    public function getMainPaymentTransactionCount() {
        return $this->Transaction->find('count', array('conditions' => array('Transaction.transaction_type' => 'Payment','Transaction.is_interest' => 0)));
    }

    public function getMainReceiptTransactionCount() {
        return $this->Transaction->find('count', array('conditions' => array('Transaction.transaction_type' => 'Receipt','Transaction.is_interest' => 0)));
    }

    public function getAllInterestTransactionCount() {
        return $this->Transaction->find('count', array('conditions' => array('Transaction.is_interest' => 1)));
    }

    public function getInterestPaymentTransactionCount() {
        return $this->Transaction->find('count', array('conditions' => array('Transaction.transaction_type' => 'Payment','Transaction.is_interest' => 1)));
    }

    public function getInterestReceiptTransactionCount() {
        return $this->Transaction->find('count', array('conditions' => array('Transaction.transaction_type' => 'Receipt','Transaction.is_interest' => 1)));
    }

}
