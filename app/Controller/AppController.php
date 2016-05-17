<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    var $helpers = array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth');
    public $components = array('Session', 'RequestHandler', 'Usermgmt.UserAuth');

    function beforeFilter() {
        $this->userAuth();
    }

    private function userAuth() {
        $this->UserAuth->beforeFilter($this);
    }

    ## ref link : http://stackoverflow.com/questions/10042485/how-to-display-currency-in-indian-numbering-format-in-php
    public  function moneyFormatIndia($num=null){
        $explrestunits = "" ;
        if(strlen($num)>3){
            $lastthree = substr($num, strlen($num)-3, strlen($num));
            $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
            $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
            $expunit = str_split($restunits, 2);
            for($i=0; $i<sizeof($expunit); $i++){
                // creates each of the 2's group and adds a comma to the end
                if($i==0)
                {
                    $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
                }else{
                    $explrestunits .= $expunit[$i].",";
                }
            }
            $thecash = $explrestunits.$lastthree;
        } else {
            $thecash = $num;
        }
        return $thecash; // writes the final format where $currency is the currency symbol.
    }

    public function getDBDate($date = null)
    {
        if (empty($date))
            return;
        $t_date_arr = explode("-", $date);
        $db_date = date("Y-m-d", mktime(0, 0, 0, $t_date_arr[1], $t_date_arr[0], $t_date_arr[2]));
        return $db_date;
    }

}
