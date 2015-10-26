<style type="text/css">
    .typeahead {
        z-index: 1051;
    }
</style>
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
            <div class="bs-example">
                <input type="text" class="typeahead tt-query" autocomplete="off" spellcheck="false">
            </div>

        </div>
    </div>
</div>
<?php echo $this->Html->script('bootstrap-typeahead.js'); ?>
<script type="text/javascript">
    var typeaheadSource = [{
        id: 1, firstName: 'John'}, {
        id: 2, firstName: 'Alex'}, {
        id: 3, firstName: 'Terry'
    }];

    $("input.typeahead").typeahead({
        onSelect: function(item) {
            console.log(item);
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