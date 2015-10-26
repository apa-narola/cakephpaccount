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
                <i class="fa fa-plus-circle"></i> <a href="<?php /*echo $this->webroot */ ?>transactions/add">Add
                    Transaction</a>
            </li>-->
        </ol>
        <div class="row">
            <div class="col-md-4">
                <input type="text" class="typeahead tt-query form-control input-lg " autocomplete="off"
                       spellcheck="false" placeholder="Type user name">
            </div>
        </div>

    </div>
</div>
<?php echo $this->Html->script('bootstrap-typeahead.js'); ?>
<script type="text/javascript">
    $("input.typeahead").typeahead({
        onSelect: function (item) {
            var user_id = item.value;
            //console.log(item.text);
            window.location = site_url + "/transactions/userTransactions/" + user_id;
        },
        ajax: {
            url: site_url + "/typeaheadSearch",
            timeout: 500,
            displayField: "username",
            triggerLength: 1,
            method: "get",
            loadingClass: "loading-circle",
            preDispatch: function (query) {
                //showLoadingMask(true);
                return {
                    search: query
                }
            },
            preProcess: function (data) {
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