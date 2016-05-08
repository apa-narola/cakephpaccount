<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Ledger
            <!--<small>Subheading</small>-->
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <?php echo $this->Html->link(__("Home", true), "/") ?>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Ledger
            </li>
            <!-- <li class="pull-right">
                <i class="fa fa-plus-circle"></i> <a href="<?php /* echo $this->webroot */ ?>transactions/add">Add
                    Transaction</a>
            </li>-->
        </ol>
        <div class="row">
            <div class="col-md-4">
                <input type="text" class="typeahead tt-query form-control input-lg " autocomplete="off"
                       spellcheck="false" placeholder="Type user name">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6" style="min-height: 600px;">
                <div class="col-lg-10"> <h2>Receipt</h2></div>
                <div class="col-lg-2">
                    <!--<h2 class="pull-right">Amount</h2>-->
                </div>
                <table class="table-responsive table-hover table-striped" width="100%">
                    <?php
                    $grand_total_payment = 0;
                    $grand_total_receipt = 0;
                    foreach ($data as $d_key => $d_val):
                        $grand_total_payment +=$d_val["total_payment"];
                        $grand_total_receipt +=$d_val["total_receipt"];
                        if ($d_val['transaction_type'] != "Receipt")
                            continue;
                        ?>
                        <tr>
                            <td class="col-lg-3 bdr-left" valign="top">
                                <div class="text-right"> <?php echo h($d_val['balance']); ?></div>
                            </td>
                            <td class="col-lg-9 bdr-left">
                                <?php echo h($d_val['party_name']); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="col-lg-6" style="min-height: 600px;">
                <div class="col-lg-10"> <h2>Payment</h2></div>
                <div class="col-lg-2">
                    <!--<h2 class="pull-right">Amount</h2>-->
                </div>

                <table class="table-responsive table-hover table-striped" width="100%">
                    <?php
                    $grand_total_payment = 0;
                    $grand_total_receipt = 0;
                    foreach ($data as $d_key => $d_val):
                        $grand_total_payment +=$d_val["total_payment"];
                        $grand_total_receipt +=$d_val["total_receipt"];
                        if ($d_val['transaction_type'] != "Payment")
                            continue;
                        ?>
                        <tr>
                            <td class="col-lg-3 bdr-left" valign="top">
                                <div class="text-right"> <?php echo h($d_val['balance']); ?></div>
                            </td>
                            <td class="col-lg-9 bdr-left">
                                <?php echo h($d_val['party_name']); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="clearfix"></div>
            <div class="row">

                <div class="col-lg-6">
                    <table class="table-responsive table-hover table-striped" width="100%">

                        <?php if (!empty($data)) { ?>
                            <tr style="border-top:2px solid #333;">
                                <th width="10%" class=" bdr-left text-right" valign="top">
                                    <?php echo $this->requestAction('App/moneyFormatIndia/' . $grand_total_receipt); ?>
                                </th>
                                <th class="bdr-left" valign="top"> Cr. Total Receipt</th>
                            </tr>
                            <?php if ($grand_total_receipt> $grand_total_payment) { ?>
								 <tr  class="amount-red" style="border-top:5px double #333;border-bottom:5px double #333;">
                                    <th width="10%" class="bdr-left text-right" valign="top">
									
									
                                        <?php
										$t = $grand_total_receipt - $grand_total_payment;
                                            if (!empty($t))
                                                echo "- ". $this->requestAction('App/moneyFormatIndia/' . $t);
                                            //echo $this->requestAction('App/moneyFormatIndia/' . $grand_total_payment);
                                        ?>
                                    </th>
                                    <th class="bdr-left" valign="top"> Cr. Net Payment</th>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </table>
                </div>
                <div class="col-lg-6">
                    <table class="table-responsive table-hover table-striped" width="100%">
                        <?php if (!empty($data)) { ?>

                            <tr style="border-top:2px solid #333;">
                                <th width="10%" class="bdr-left text-right" valign="top">
                                    <?php
                                    if (!empty($grand_total_payment))
                                        echo $this->requestAction('App/moneyFormatIndia/' . $grand_total_payment);
                                    ?>
                                </th>
                                <th class="bdr-left" valign="top"> Dr. Total Payment</th>
                            </tr>
                            <?php if ($grand_total_payment > $grand_total_receipt) { ?>

                                <tr  class="amount-red" style="border-top:5px double #333;border-bottom:5px double #333;">
                                    <th width="10%" class="bdr-left text-right" valign="top">
									
									
                                        <?php
										$t = $grand_total_payment - $grand_total_receipt;
                                            if (!empty($t))
                                                echo "- ". $this->requestAction('App/moneyFormatIndia/' . $t);
                                            //echo $this->requestAction('App/moneyFormatIndia/' . $grand_total_payment);
                                        ?>
                                    </th>
                                    <th class="bdr-left" valign="top"> Dr. Net Payment</th>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </table>
                </div>

            </div>
        </div>

        <!--<div class="row">
            <div class="col-lg-6">
                <h2>Balance Sheet</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Party Name</th>
                                <th>Payment</th>
                                <th>Receipt</th>
                                <th>Balance (Receipt-Payment)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php /*if (empty($data)) { */?>
                                <tr>
                                    <td colspan="4">No records found.</td>
                                </tr>
                                <?php
/*                            } else {
                                $grand_total_payment = 0;
                                $grand_total_receipt = 0;
                                foreach ($data as $d_key => $d_val) {
                                    $grand_total_payment +=$d_val["total_payment"];
                                    $grand_total_receipt +=$d_val["total_receipt"];
                                    */?>
                                    <tr>
                                        <td><?php /*echo ++$d_key; */?></td>
                                        <td><?php /*echo $d_val["party_name"] */?></td>
                                        <td><?php /*echo $d_val["total_payment"]; */?></td>
                                        <td><?php /*echo $d_val["total_receipt"]; */?></td>
                                        <td><?php /*echo $d_val["balance"]; */?></td>
                                    </tr>
                                    <?php
/*                                }
                            }
                            */?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2" align="left">Grand Total</th>
                                <th><?php /*echo $this->Number->currency($grand_total_payment,""); */?></th>
                                <th><?php /*echo $this->Number->currency($grand_total_receipt,""); */?></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>-->

    </div>
</div>
<?php echo $this->Html->script('bootstrap-typeahead.js'); ?>
<script type="text/javascript">
    $("input.typeahead").typeahead({
        onSelect: function(item) {
            var user_id = item.value;
            if (!user_id) {
                alert("Could not find userID.");
                return false;
            }
            //console.log(item.text);
            window.location = site_url + "/transactions/userTransactions/" + user_id;
        },
        ajax: {
            url: site_url + "typeaheadSearch",
            timeout: 500,
            displayField: "username",
            triggerLength: 1,
            method: "get",
            loadingClass: "loading-circle",
            preDispatch: function(query) {
                //showLoadingMask(true);
                return {
                    search: query
                }
            },
            preProcess: function(data) {
                console.log(data);
                //showLoadingMask(false);
                if (data.success === false) {
                    // Hide the list, there was some error
                    return false;
                }
                // We good!
                return data;
            }
        }
    });
</script>