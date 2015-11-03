<?php echo $this->Html->css('style'); ?>
<!-- Bootstrap Core CSS -->
<?php echo $this->Html->css('/sb-admin/css/bootstrap.min'); ?>
<!-- Custom CSS -->    
<?php echo $this->Html->css('/sb-admin/css/sb-admin-2'); ?>
<!-- Custom Fonts -->
<?php echo $this->Html->css('/sb-admin/font-awesome/css/font-awesome.min'); ?>
<?php
// set document information
$this->pdf->core->setPageOrientation("L");
$this->pdf->core->SetCreator(PDF_CREATOR);
$this->pdf->core->SetAuthor('Nicola Asuni');
$this->pdf->core->SetTitle('TCPDF Example 061');
$this->pdf->core->SetSubject('TCPDF Tutorial');
$this->pdf->core->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$this->pdf->core->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 061', PDF_HEADER_STRING);

// set header and footer fonts
$this->pdf->core->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$this->pdf->core->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$this->pdf->core->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$this->pdf->core->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$this->pdf->core->SetHeaderMargin(PDF_MARGIN_HEADER);
$this->pdf->core->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$this->pdf->core->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$this->pdf->core->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------
// set font
$this->pdf->core->SetFont('helvetica', '', 10);

// add a page
$this->pdf->core->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */

$html = '<div class="row">
            <div class="col-lg-6">
                <div class="col-lg-10"> <h2>Payment</h2></div>
                <div class="col-lg-2">
				</div>

                <table class="table-responsive table-hover table-striped" width="100%">
                <thead></thead><tbody>
                    ';
foreach ($transactions as $transaction):
    if ($transaction['Transaction']['transaction_type'] != "Payment")
        continue;
    $html .='<tr>
                            <td class="col-lg-3 bdr-left">
                                <div class="text-left"><i class="fa fa-rupee"></i>
                                 ' . h($transaction['Transaction']['amount']) . '
                            </div>
                            </td>
                            <td class="col-lg-9 bdr-left">
                                <p><strong>
                                ' . h($transaction['User']['first_name'] . " " . $transaction['User']['last_name']) . '</strong>,&nbsp';
    if (!empty($transaction['Transaction']['remarks']))
        $html .= h($transaction['Transaction']['remarks']) . ", ";
    $html .= $transaction['Transaction']['transaction_date'] ? date(Configure::read('App.DATE_FORMAT'), strtotime($transaction['Transaction']['transaction_date'])) : "NA";
    $html .='</td>';
    $html .='</tr>';
endforeach;
$html .='</tbody>
</table>
</div>

<div class="col-lg-6">
                <div class="col-lg-10"> <h2>Receipt</h2></div>
                <div class="col-lg-2">
					<!--<h2 class="pull-right">Amount</h2>-->
				</div>

                <table class="table-responsive table-hover table-striped" width="100%">
                <thead></thead><tbody>
                    ';
foreach ($transactions as $transaction):
    if ($transaction['Transaction']['transaction_type'] != "Receipt")
        continue;
    $html .='<tr>
                            <td class="col-lg-3 bdr-left">
                                <div class="text-left"><i class="fa fa-rupee"></i>
                                 ' . h($transaction['Transaction']['amount']) . '
                            </div>
                            </td>
                            <td class="col-lg-9 bdr-left">
                                <p><strong>
                                ' . h($transaction['User']['first_name'] . " " . $transaction['User']['last_name']) . '</strong>,&nbsp';
    if (!empty($transaction['Transaction']['remarks']))
        $html .= h($transaction['Transaction']['remarks']) . ", ";
    $html .= $transaction['Transaction']['transaction_date'] ? date(Configure::read('App.DATE_FORMAT'), strtotime($transaction['Transaction']['transaction_date'])) : "NA";
    $html .='</td>';
    $html .='</tr>';
endforeach;
$html .='
    <tbody>
</table>
</div>
</div>';
// output the HTML content
$this->pdf->core->writeHTML($html, true, false, true, false, '');
ob_end_clean();
// ---------------------------------------------------------
//Close and output PDF document
$this->pdf->core->Output('example_061.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+