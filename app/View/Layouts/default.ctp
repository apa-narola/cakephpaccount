<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */
$cakeDescription = __d('cake_dev', 'Money Lender: Transaction management');
?>

<?php if (!$this->UserAuth->isLogged()) { ?>

    <!DOCTYPE html>
    <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Login</title>

            <?php echo $this->Html->css('style'); ?>
            <!-- Bootstrap Core CSS -->
            <?php echo $this->Html->css('/sb-admin/css/bootstrap.min'); ?>
            <!-- Custom CSS -->    
            <?php echo $this->Html->css('/sb-admin/css/sb-admin-2'); ?>
            <!-- Custom Fonts -->
            <?php echo $this->Html->css('/sb-admin/font-awesome/css/font-awesome.min'); ?>

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

        </head>

        <body>

            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php echo $this->Session->flash(); ?>
                        <?php echo $this->fetch('content'); ?>
                    </div>
                </div>
            </div>

            <!-- jQuery -->
            <?php echo $this->Html->script('/sb-admin/js/jquery.js'); ?>
            <!-- Bootstrap Core JavaScript -->
            <?php echo $this->Html->script('/sb-admin/js/bootstrap.min.js'); ?>

            <?php echo $this->Html->script('/js/common.js'); ?>

        </body>

    </html>

<?php } else { ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <?php echo $this->Html->charset(); ?>
            <title>
                <?php echo $cakeDescription ?>:
                <?php echo $this->fetch('title'); ?>
            </title>
            <?php
            echo $this->Html->meta('icon');
            //echo $this->Html->css('cake.generic');
            echo $this->Html->css('style');
            echo $this->Html->css('/usermgmt/css/umstyle');
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
            ?>
            <script type="text/javascript">
            var site_url = "<?php echo $this->webroot;?>";
</script>
            <?php
            // below jquery1.11 is required for bootstrap datepicker
            echo $this->Html->script('jquery-1.11.3.min.js');
            ?>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            <!-- Bootstrap Core CSS -->
            <?php echo $this->Html->css('/sb-admin/css/bootstrap.min'); ?>
            <!-- Custom CSS -->    
            <?php echo $this->Html->css('/sb-admin/css/sb-admin'); ?>
            <!-- Custom Fonts -->
            <?php echo $this->Html->css('/sb-admin/font-awesome/css/font-awesome.min'); ?>
            <!-- Bootstrap datepicker -->
            <?php echo $this->Html->css('bootstrap-datepicker3.css'); ?>
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
        <script type="text/javascript">
        var DATE_FORMAT = '<?php echo Configure::read('App.DATE_FORMAT');?>'
        var DATE_FORMAT_JS = '<?php echo Configure::read('App.DATE_FORMAT_JS');?>'
</script>
        </head>
        <?php
        $controller = $this->params["controller"];
        $action = $this->params["action"];
        //echo "controller : $controller<br/>";echo "action : $action";
        $cls_dashboard_users = null;
        $cls_add_trans = null;
        $cls_list_trans = null;
        $cls_add_user = null;
        $cls_list_users = null;
        $cls_add_group = null;
        $cls_list_groups = null;
        $cls_list_permissions = null;
        $cls_ledger = null;
        $cls_list_interest = null;
        switch ($controller) {
            case "transactions":
                $type = $this->params["pass"][0];
                switch ($action) {
                    case "add":
                        $cls_add_trans = "class='active'";
                        break;
                    case "index":
                        if($type == "T")
                        $cls_list_trans = "class='active'";
                        else
                        $cls_list_interest = "class='active'";
                        break;

                    default:
                        break;
                }
                break;
            case "users":
                switch ($action) {
                    case "addUser":
                        $cls_add_user = "class='active'";
                        break;
                    case "index":
                        $cls_list_users = "class='active'";
                        break;
                    case "dashboard":
                        $cls_dashboard_users = "class='active'";
                        break;
                    default:
                        break;
                }
                break;
            case "user_groups":
                switch ($action) {
                    case "addGroup":
                        $cls_add_group = "class='active'";
                        break;
                    case "index":
                        $cls_list_groups = "class='active'";
                        break;
                    default:
                        break;
                }
                break;
            case "permissions":
                switch ($action) {
                    case "index":
                        $cls_list_permissions = "class='active'";
                        break;
                    default:
                        break;
                }
                break;
            case "pages":
                switch ($action) {
                    case "ledger":
                        $cls_ledger = "class='active'";
                        break;
                    default:
                        break;
                }
                break;

            default:
                $cls_dashboard_users = "class='active'";
                break;
        }
        ?>
        <body>

            <div id="wrapper">

                <!-- Navigation -->
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo $this->webroot; ?>">SimpleMoneyLend</a>
                    </div>
                    <!-- Top Menu Items -->
                    <ul class="nav navbar-right top-nav">
                        <!--                    <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                                                <ul class="dropdown-menu message-dropdown">
                                                    <li class="message-preview">
                                                        <a href="#">
                                                            <div class="media">
                                                                <span class="pull-left">
                                                                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                                                                </span>
                                                                <div class="media-body">
                                                                    <h5 class="media-heading">
                                                                        <strong>John Smith</strong>
                                                                    </h5>
                                                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="message-preview">
                                                        <a href="#">
                                                            <div class="media">
                                                                <span class="pull-left">
                                                                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                                                                </span>
                                                                <div class="media-body">
                                                                    <h5 class="media-heading">
                                                                        <strong>John Smith</strong>
                                                                    </h5>
                                                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="message-preview">
                                                        <a href="#">
                                                            <div class="media">
                                                                <span class="pull-left">
                                                                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                                                                </span>
                                                                <div class="media-body">
                                                                    <h5 class="media-heading">
                                                                        <strong>John Smith</strong>
                                                                    </h5>
                                                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="message-footer">
                                                        <a href="#">Read All New Messages</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                                                <ul class="dropdown-menu alert-dropdown">
                                                    <li>
                                                        <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="#">View All</a>
                                                    </li>
                                                </ul>
                                            </li>-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                                <?php
                                $loginUser = $this->UserAuth->getUser();
                                if ($this->UserAuth->isLogged())
                                    echo h($loginUser['User']['first_name']) . ' ' . h($loginUser['User']['last_name']);
                                else
                                    echo "Guest";
                                ?>                            
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo $this->webroot; ?>myprofile"><i class="fa fa-fw fa-user"></i> Profile</a>
                                </li>                            
                                <li>
                                    <?php echo $this->Html->link(__("<i class=\"fa fa-fw fa-gear\"></i> Settings", true), "/editUser/" . $this->UserAuth->getUserId(), array('escape' => false)) ?>
                                    <!--<a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>-->
                                </li>                            
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo $this->webroot; ?>changePassword"><i class="fa fa-fw fa-envelope"></i> Change password</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot; ?>logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav side-nav">
                            <!--                        <li>
                                                        <a href="<?php echo $this->webroot; ?>sb-admin/index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $this->webroot; ?>sb-admin/charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $this->webroot; ?>sb-admin/tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $this->webroot; ?>sb-admin/forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $this->webroot; ?>sb-admin/bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $this->webroot; ?>sb-admin/bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                                                        <ul id="demo" class="collapse">
                                                            <li>
                                                                <a href="#">Dropdown Item</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Dropdown Item</a>
                                                            </li>
                                                        </ul>
                                                    </li>-->
                            <!--                        <li class="active">
                                                        <a href="<?php echo $this->webroot; ?>sb-admin/blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                                                    </li>-->
                            <li <?php echo $cls_dashboard_users; ?>>
                                <a href="<?php echo $this->webroot ?>dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li <?php echo $cls_ledger;?>>
                                <a href="<?php echo $this->webroot ?>ledger"><i class="fa fa-fw fa-dashboard"></i> Ledger</a>
                            </li>
               <li <?php echo $cls_add_trans; ?>>
                                <a href="<?php echo $this->webroot ?>transactions/add"><i class="fa fa-fw fa-file"></i> Add Transaction</a>
                            </li>
                            <li <?php echo $cls_list_trans; ?>>
                                <a href="<?php echo $this->webroot ?>transactions/index/T"><i class="fa fa-fw fa-money"></i> Transactions</a>
                            </li>
                            <li <?php echo $cls_list_interest; ?>>
                                <a href="<?php echo $this->webroot ?>transactions/index/I"><i class="fa fa-fw fa-money"></i> Interests</a>
                            </li>
                            <li <?php echo $cls_add_user; ?>>
                                <a href="<?php echo $this->webroot ?>addUser"><i class="fa fa-users"></i> Add Party</a>
                            </li>
                            <li <?php echo $cls_list_users; ?>>
                                <a href="<?php echo $this->webroot ?>allUsers"><i class="fa fa-fw fa-users"></i> Parties</a>
                            </li>
                            <?php if ($this->UserAuth->isAdmin()) { ?>
<!--                                <li <?php echo $cls_add_group; ?>>
                                    <a href="<?php echo $this->webroot ?>addGroup"><i class="fa fa-fw fa-group"></i> Add Group</a>
                                </li>-->
                                <li <?php echo $cls_list_groups; ?>>
                                    <a href="<?php echo $this->webroot ?>allGroups"><i class="fa fa-fw fa-futbol-o"></i> Groups</a>
                                </li>
                                <li <?php echo $cls_list_permissions; ?>>
                                    <a href="<?php echo $this->webroot ?>permissions"><i class="fa fa-fw fa-ban"></i> Permissions</a>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="<?php echo $this->webroot ?>logout"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                            </li>
                            <!--                        <li>
                                                        <a href="<?php echo $this->webroot; ?>sb-admin/index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                                                    </li>-->
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>

                <div id="page-wrapper">

                    <div class="container-fluid">
                        <?php echo $this->Session->flash(); ?>

                        <?php echo $this->fetch('content'); ?>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- /#page-wrapper -->

            </div>
            <!-- /#wrapper -->

            <!-- jQuery -->

            <?php echo $this->Html->script('/sb-admin/js/jquery.js'); ?>
            <!-- Bootstrap Core JavaScript -->
            <?php echo $this->Html->script('/sb-admin/js/bootstrap.min.js'); ?>

            <?php echo $this->Html->script('/js/common.js'); ?>

            <?php // echo $this->element('sql_dump'); ?>
        </body>

    </html>

<?php } ?>