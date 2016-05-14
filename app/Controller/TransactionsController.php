<?php

App::uses('AppController', 'Controller');
App::uses('CakeNumber', 'Utility');

/**
 * Transactions Controller
 *
 * @property Transaction $Transaction
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class TransactionsController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Flash', 'Session', "Cookie");
    var $helpers = array('Html', 'Form', 'Csv', 'Pdf', "Number");

    const RECORD_PER_PAGE = 40;

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $conditions = array();
		//$conditions["Transaction.is_hidden"] = 0;
        $type = !empty($this->params["named"]["type"]) ? $this->params["named"]["type"] : "T";
        if ($type == "I") {
            $conditions["Transaction.is_interest"] = 1;
            $typeStr = "Interests";
        }
        else {
            $conditions["Transaction.is_interest"] = 0;
            $typeStr = "Transactions";
        }

        //Transform POST into GET
        if (($this->request->is('post') || $this->request->is('put')) && isset($this->data['Transaction'])) {

            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];
            $filter_url['type'] = $type;
            // We need to overwrite the page every time we change the parameters
//            $filter_url['page'] = 1;

            // for each filter we will add a GET parameter for the generated url
            foreach ($this->data['Transaction'] as $name => $value) {
                if ($value) {
                    // You might want to sanitize the $value here
                    // or even do a urlencode to be sure
                    $filter_url[$name] = urlencode($value);
                }
            }
            if (isset($this->data["exportToexcel"]))
                $filter_url["exportToexcel"] = urlencode(1);
            // now that we have generated an url with GET parameters, 
            // we'll redirect to that page
            return $this->redirect($filter_url);
        } else {
            if (!empty($this->params['named']["transaction_from"]) || !empty($this->params['named']["transaction_to"])) {
                if (!empty($this->params['named']["transaction_from"]) && !empty($this->params['named']["transaction_to"])) {
                    $conditions["Transaction.transaction_date >= "] = $this->getDBDate($this->params['named']["transaction_from"]);
                    $conditions["Transaction.transaction_date <= "] = $this->getDBDate($this->params['named']["transaction_to"]);
                } elseif (!empty($this->params['named']["transaction_from"])) {
                    $conditions["Transaction.transaction_date >= "] = $this->getDBDate($this->params['named']["transaction_from"]);
                } elseif (!empty($this->params['named']["transaction_to"])) {
                    $conditions["Transaction.transaction_date <= "] = $this->getDBDate($this->params['named']["transaction_to"]);
                }
            }
            $ignoreFields = array("transaction_from", "transaction_to", "exportToexcel", "type");
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
                            //array('Transaction.id=' => $value),
                            array('Transaction.remarks LIKE' => '%' . $value . '%'),
                            array('User.first_name LIKE' => '%' . $value . '%'),
                            array('User.last_name LIKE' => '%' . $value . '%'),
                            array('User.username LIKE' => '%' . $value . '%'),
                            array('User.email LIKE' => '%' . $value . '%'),
                        );
                    } else {
                        if ($param_name == "is_interest" && $value == 2)
                            $conditions['Transaction.' . $param_name] = 0;
                        else
                            $conditions['Transaction.' . $param_name] = $value;
                    }
                    $this->request->data['Transaction'][$param_name] = $value;
                }
            }
        }

        if (!empty($this->params['named']["exportToexcel"])) {
            $searchedTransactions = $this->Transaction->find('all', array("conditions" => $conditions));
            ///pr($searchedTransactions);exit;
            if (!empty($searchedTransactions)) {
                $filename = "transactions-" . time() . ".xls";
                $this->exportToExcel($searchedTransactions, $filename);
            }
        }
        /*
          $this->Transaction->recursive = 0;
          $this->paginate = array(
          'limit' => self::RECORD_PER_PAGE,
          'conditions' => $conditions,
          'order' => 'Transaction.modified desc'
          );
          $this->set('transactions', $this->paginate()); */
//pr($conditions);exit;
        $transactions = $this->Transaction->find('all', array("conditions" => $conditions, 'order' => 'Transaction.transaction_date'));
        $conditions['Transaction.transaction_type'] = "Payment";
        $conditions['Transaction.is_hidden'] = 0;
        $payment_total = $this->Transaction->find('first', array('fields' => array('sum(Transaction.amount) as total'), 'conditions' => $conditions));
        $conditions['Transaction.transaction_type'] = "Receipt";
		$conditions['Transaction.is_hidden'] = 0;
        $receipt_total = $this->Transaction->find('first', array('fields' => array('sum(Transaction.amount) as total'), 'conditions' => $conditions));
        $this->set(compact('transactions', "payment_total", "receipt_total","type",'typeStr'));
        // Pass the search parameter to highlight the text
        $this->set('search', isset($this->params['named']['search']) ? $this->params['named']['search'] : "");

//        $this->Transaction->recursive = 0;
//        $this->set('transactions', $this->Paginator->paginate());
    }

    public function userTransactions($user_id = null, $type = 'T')
    {
        if (empty($user_id))
            $user_id = $this->request->params["named"]["user_id"];
        $db_type = $type == 'T' ? 0 : 1;
        
        $transactionUser = $this->Transaction->User->find('first', array("conditions" => array("User.id" => $user_id)));
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
            if (isset($this->data["exportToexcel"]))
                $filter_url["exportToexcel"] = urlencode(1);
            // now that we have generated an url with GET parameters,
            // we'll redirect to that page
            return $this->redirect($filter_url);
        } else {
            if (!empty($this->params['named']["transaction_from"]) || !empty($this->params['named']["transaction_to"])) {
                if (!empty($this->params['named']["transaction_from"]) && !empty($this->params['named']["transaction_to"])) {
                    $conditions["Transaction.transaction_date >= "] =$this->getDBDate($this->params['named']["transaction_from"]);
                    $conditions["Transaction.transaction_date <= "] = $this->getDBDate($this->params['named']["transaction_to"]);
                } elseif (!empty($this->params['named']["transaction_from"])) {
                    $conditions["Transaction.transaction_date >= "] =$this->getDBDate($this->params['named']["transaction_from"]);
                } elseif (!empty($this->params['named']["transaction_to"])) {
                    $conditions["Transaction.transaction_date <= "] =$this->getDBDate($this->params['named']["transaction_to"]);
                }
            }
            $ignoreFields = array("transaction_from", "transaction_to", "exportToexcel");
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

        $conditions[] = array("Transaction.user_id" => $user_id, "Transaction.is_interest" => $db_type);
        if (!empty($this->params['named']["exportToexcel"])) {
            $searchedTransactions = $this->Transaction->find('all', array("conditions" => $conditions));
            ///pr($searchedTransactions);exit;
            if (!empty($searchedTransactions)) {
                $filename = "transactions-" . time() . ".xls";
                $this->exportToExcel($searchedTransactions, $filename);
            }
        }
        //pr($conditions);exit;
//        $this->Transaction->recursive = 0;
//        $this->paginate = array(
//            'limit' => self::RECORD_PER_PAGE,
//            'conditions' => $conditions,
//            'order' => 'Transaction.id desc'
//        );
//        $transactions = $this->paginate();
        $transactions = $this->Transaction->find('all', array("conditions" => $conditions, 'order' => 'Transaction.transaction_date'));
        $conditions['Transaction.transaction_type'] = "Payment";
		$conditions['Transaction.is_hidden'] = 0;
        $payment_total = $this->Transaction->find('first', array('fields' => array('sum(Transaction.amount) as total'), 'conditions' => $conditions));
        $conditions['Transaction.transaction_type'] = "Receipt";
		$conditions['Transaction.is_hidden'] = 0;
        $receipt_total = $this->Transaction->find('first', array('fields' => array('sum(Transaction.amount) as total'), 'conditions' => $conditions));
        $this->set(compact('transactions', "payment_total", "receipt_total"));
        $fullname = "NA";
        if (isset($transactionUser["User"]["first_name"])){
            $fullname = $transactionUser["User"]["first_name"] . " " . $transactionUser["User"]["last_name"];
			$fullname .= $type == 'T' ? "" : " - Interests";
			}
			
			$paymentTransactionCount = 0;
			$receiptTransactionCount = 0;
			if(!empty($transactions)){
			 foreach ($transactions as $transaction):
              if ($transaction['Transaction']['transaction_type'] == "Receipt")
                                    $receiptTransactionCount++;
									else
									$paymentTransactionCount++;
									
			endforeach;
			}
        $this->set(compact(
            'fullname',
            'transactions',
            "user_id",
            "payment_total",
            "receipt_total",
            "type",
            "typeStr",
			"paymentTransactionCount",
			"receiptTransactionCount"
        ));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
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
    public function add()
    {
        $cookieTransactionType = $this->Cookie->read('transactionType');
        if ($this->request->is('post')) {
            if (isset($this->request->data["Transaction"]["transaction_date"]))
                $this->request->data["Transaction"]["transaction_date"] = $this->getDBDate($this->request->data["Transaction"]["transaction_date"]);

            $this->request->data["Transaction"]["is_interest"] = $this->request->data["Transaction"]["is_interest"] == 1 ? 1 : 0;
            $this->Transaction->create();
            if ($this->Transaction->save($this->request->data)) {
                $this->Cookie->write('transactionType', $this->request->data["Transaction"]["transaction_type"]);
                $this->Flash->success(__('The transaction has been saved.'));
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
            }
        }
        if ($this->UserAuth->isAdmin())
            $users = $this->Transaction->User->find('list', array("fields" => array("id", "first_name")));
        else
            $users = $this->Transaction->User->find('list', array("fields" => array("id", "first_name"), "conditions" => array("user_group_id <>" => 1)));

        $this->set(compact('users', "cookieTransactionType"));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function getDBDate($date = null)
    {
        if (empty($date))
            return;
        $t_date_arr = explode("-", $date);
        $db_date = date("Y-m-d", mktime(0, 0, 0, $t_date_arr[1], $t_date_arr[0], $t_date_arr[2]));
        return $db_date;
    }

    public function edit($id = null)
    {
        //pr($this->request->params["named"]["type"]);
        $user_id = null;
        if (!empty($this->request->params["named"]["user_id"]))
            $user_id = $this->request->params["named"]["user_id"];

        if (!$this->Transaction->exists($id)) {
            throw new NotFoundException(__('Invalid transaction'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if (isset($this->request->data["Transaction"]["transaction_date"]))
                $this->request->data["Transaction"]["transaction_date"] = $this->getDBDate($this->request->data["Transaction"]["transaction_date"]);

            $this->request->data["Transaction"]["is_interest"] = $this->request->data["Transaction"]["is_interest"] == 1 ? 1 : 0;

            if ($this->Transaction->save($this->request->data)) {
                $this->Flash->success(__('The transaction has been saved.'));
                if (!empty($user_id))
                    return $this->redirect(array('action' => 'userTransactions', $user_id, $this->params["named"]["type"]));
                else
                    return $this->redirect(array('action' => 'index', "type" => $this->params["named"]["type"]));
            } else {
                $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Transaction.' . $this->Transaction->primaryKey => $id));
            $this->request->data = $this->Transaction->find('first', $options);
            //pr($this->request->data);
            $this->request->data["Transaction"]["transaction_date"] = date(Configure::read('App.DATE_FORMAT'), strtotime($this->request->data["Transaction"]["transaction_date"]));
            $this->request->data["Transaction"]["is_interest"] = empty($this->request->data["Transaction"]["is_interest"]) ? 0 : 1;

        }
        if ($this->UserAuth->isAdmin())
            $users = $this->Transaction->User->find('list', array("fields" => array("id", "first_name")));
        else
            $users = $this->Transaction->User->find('list', array("fields" => array("id", "first_name"), "conditions" => array("user_group_id <>" => 1)));

        $this->set(compact('users','user_id'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
//        pr($this->request->params["named"]);exit;
        $user_id = null;
        if (!empty($this->request->params["named"]["user_id"]))
            $user_id = $this->request->params["named"]["user_id"];

        $type = "T";
        if (!empty($this->request->params["named"]["type"]))
            $type = $this->request->params["named"]["type"];

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
        if (!empty($user_id))
            return $this->redirect(array('action' => 'userTransactions', $user_id, $type));
        else
            return $this->redirect(array('action' => 'index', "type" => $type));

//        return $this->redirect(array('action' => 'index', "type" => $type));
    }

    public function hide($id = null)
    {

        $is_hidden = isset($this->request->params["named"]["is_hidden"]) ? $this->request->params["named"]["is_hidden"] : 0;
        $user_id = !empty($this->request->params["named"]["user_id"]) ? $this->request->params["named"]["user_id"] : null;
        $type = !empty($this->request->params["named"]["type"]) ? $this->request->params["named"]["type"] : "T";
//        echo "type : $type";exit;
        $this->Transaction->id = $id;
        if (!$this->Transaction->exists()) {
            throw new NotFoundException(__('Invalid transaction'));
        }
        $this->request->allowMethod('post', 'hide');
        $is_hidden = $is_hidden == 0 ? 1 : 0;
        $this->request->data["is_hidden"] = $is_hidden;
        if ($this->Transaction->save($this->request->data)) {
            $this->Flash->success(__('The transaction has been hidden.'));
        } else {
            $this->Flash->error(__('The transaction could not be hidden. Please, try again.'));
        }
        if (!empty($user_id)) {
            return $this->redirect(array('action' => 'userTransactions', $user_id, $type));
        } else {
            return $this->redirect(array('action' => 'index', "type" => $type));
        }
    }

    public function getAllTransactionCount()
    {
        return $this->Transaction->find('count');
    }

    public function getPaymentTransactionCount()
    {
        return $this->Transaction->find('count', array('conditions' => array('Transaction.transaction_type' => 'Payment')));
    }

    public function getReceiptTransactionCount()
    {
        return $this->Transaction->find('count', array('conditions' => array('Transaction.transaction_type' => 'Receipt')));
    }

    public function getAllMainTransactionCount()
    {
        return $this->Transaction->find('count', array('conditions' => array('Transaction.is_interest' => 0)));
    }

    public function getMainPaymentTransactionCount()
    {
        return $this->Transaction->find('count', array('conditions' => array('Transaction.transaction_type' => 'Payment', 'Transaction.is_interest' => 0)));
    }

    public function getMainReceiptTransactionCount()
    {
        return $this->Transaction->find('count', array('conditions' => array('Transaction.transaction_type' => 'Receipt', 'Transaction.is_interest' => 0)));
    }

    public function getAllInterestTransactionCount()
    {
        return $this->Transaction->find('count', array('conditions' => array('Transaction.is_interest' => 1)));
    }

    public function getInterestPaymentTransactionCount()
    {
        return $this->Transaction->find('count', array('conditions' => array('Transaction.transaction_type' => 'Payment', 'Transaction.is_interest' => 1)));
    }

    public function getInterestReceiptTransactionCount()
    {
        return $this->Transaction->find('count', array('conditions' => array('Transaction.transaction_type' => 'Receipt', 'Transaction.is_interest' => 1)));
    }

    public function transactionsPdf()
    {
        $this->layout = 'pdf';
        $transactions = $this->Transaction->find('all');
        $this->set(compact('transactions'));
    }

    public function exportToExcel($data = array(), $filename = null)
    {
        /*
         * Export to excel - php
         */
        // http://www.codexworld.com/export-data-to-excel-in-php/
        $preparedArray = array();
        if (!empty($data)) {
            $payment_total = 0;
            $receipt_total = 0;
            foreach ($data as $signleTransaction) {
                $recordArray = array();
                if ($signleTransaction["Transaction"]["transaction_type"] == "Payment") {
                    $amount = $signleTransaction["Transaction"]["amount"];
                    $recordArray["Payment Amount"] = CakeNumber::currency($amount, "");
                    $recordArray["Payment Particulars"] = $this->getParticulars($signleTransaction);
                    $payment_total += $amount;
                } else {
                    $recordArray["Payment Amount"] = null;
                    $recordArray["Payment Particulars"] = null;
                }

                if ($signleTransaction["Transaction"]["transaction_type"] == "Receipt") {
                    $amount = $signleTransaction["Transaction"]["amount"];
                    $recordArray["Receipt Amount"] = CakeNumber::currency($amount, "");
                    $recordArray["Receipt Particulars"] = $this->getParticulars($signleTransaction);
                    $receipt_total += $amount;
                } else {
                    $recordArray["Receipt Amount"] = null;
                    $recordArray["Receipt Particulars"] = null;
                }
                $preparedArray[] = $recordArray;
            }
            $recordArray = array();
            $recordArray["Payment Amount"] = null;
            $recordArray["Payment Particulars"] = null;
            $recordArray["Receipt Amount"] = null;
            $recordArray["Receipt Particulars"] = null;
            $preparedArray[] = $recordArray;

            $recordArray = array();
            $recordArray["Payment Amount"] = "Total Payment";
            $recordArray["Payment Particulars"] = null;
            $recordArray["Receipt Amount"] = "Total Receipt";
            $recordArray["Receipt Particulars"] = null;
            $preparedArray[] = $recordArray;

            $recordArray["Payment Amount"] = CakeNumber::currency($payment_total, "");
            $recordArray["Payment Particulars"] = null;
            $recordArray["Receipt Amount"] = CakeNumber::currency($receipt_total, "");
            $recordArray["Receipt Particulars"] = null;
            $preparedArray[] = $recordArray;
        }

//        $preparedArray = array();
//        if (!empty($data)) {
//            foreach ($data as $signleTransaction) {
//                $recordArray = array();
//                $recordArray["Amount"] = $signleTransaction["Transaction"]["amount"];
//                $recordArray["Transaction Type"] = $signleTransaction["Transaction"]["transaction_type"];
//                $recordArray["Is Interest Entry"] = $signleTransaction["Transaction"]["is_interest"];
//                $recordArray["Remarks"] = $signleTransaction["Transaction"]["remarks"];
//                $recordArray["Transaction Date"] = $signleTransaction["Transaction"]["transaction_date"];
//                $recordArray["Created Date"] = $signleTransaction["Transaction"]["created"];
//                $recordArray["Modified Date"] = $signleTransaction["Transaction"]["modified"];
//                $preparedArray[] = $recordArray;
//            }
//        }
        if (empty($filename)) {
            // file name for download
            $filename = "export_data" . date('Ymd') . ".xls";
        }
        $columnHeadings = array("Amount", "Particulars(Payment)", "Amount", "Particulars(Receipt)");
        // headers for download
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");

        $flag = false;
        foreach ($preparedArray as $row) {
            if (!$flag) {
                // display column names as first row
                //echo implode("\t", array_keys($row)) . "\n";
                echo implode("\t", $columnHeadings) . "\n";
                $flag = true;
            }
            // filter data
            array_walk($row, array($this, 'filterData'));
            echo implode("\t", array_values($row)) . "\n";
        }
        exit;
    }

    private function filterData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if (strstr($str, '"'))
            $str = '"' . str_replace('"', '""', $str) . '"';
    }

    private function getParticulars($signleTransaction)
    {
        $string = "NA";
        if (!empty($signleTransaction["User"]["first_name"]))
            $string = $signleTransaction["User"]["first_name"];
        if (!empty($signleTransaction["User"]["last_name"]))
            $string .= " " . $signleTransaction["User"]["last_name"];


        if (!empty($signleTransaction["Transaction"]["remarks"]))
            $string .= ", " . $signleTransaction["Transaction"]["remarks"];

        if (!empty($signleTransaction["Transaction"]["transaction_date"]))
            $string .= ", " . date("d-m-Y", strtotime($signleTransaction["Transaction"]["transaction_date"]));

        return $string;
    }

    function export()
    {
        // not used anywhere in code, just for reference
        //http://www.php-dev-zone.com/2013/12/export-data-into-excel-or-csv-file-in.html
        $this->set('transactions', $this->Transacitons->find('all'));
        $this->layout = null;
        $this->autoLayout = false;
        Configure::write('debug', '0');
    }

}
