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
                                <th>Balance (Payment - Receipt)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($data)) { ?>
                                <tr>
                                    <td colspan="4">No records found.</td>
                                </tr>
                                <?php
                            } else {
                                $grand_total_payment = 0;
                                $grand_total_receipt = 0;
                                foreach ($data as $d_key => $d_val) {
                                    $grand_total_payment +=$d_val["total_payment"];
                                    $grand_total_receipt +=$d_val["total_receipt"];
                                    ?>
                                    <tr>
                                        <td><?php echo ++$d_key; ?></td>
                                        <td><?php echo $d_val["party_name"] ?></td>
                                        <td><?php echo $this->Number->currency($d_val["total_payment"],""); ?></td>
                                        <td><?php echo $this->Number->currency($d_val["total_receipt"],""); ?></td>
                                        <td><?php echo $this->Number->currency($d_val["balance"],""); ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2" align="left">Grand Total</th>
                                <th><?php echo $this->Number->currency($grand_total_payment,""); ?></th>
                                <th><?php echo $this->Number->currency($grand_total_receipt,""); ?></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

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