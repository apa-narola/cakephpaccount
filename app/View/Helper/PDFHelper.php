<?php

/**
 * Created by PhpStorm.
 * User: sujav
 * Date: 11/3/2015
 * Time: 5:34 PM
 */
App::import('Vendor','TCPDF',array('file' => 'tcpdf/tcpdf.php'));
class PdfHelper extends AppHelper
{
    var $core;

    function __construct() {
        $this->core = new TCPDF();                                  //3
    }

}