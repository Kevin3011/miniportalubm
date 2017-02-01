<!DOCTYPE html>
<html>
<?php
$thisSection = "Add";
$thisPage = "Major";
 ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Portal UBM</title>
    <!-- Core CSS - Include with every page -->
    <?php include('/assets/resources-css.php'); ?>
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

</head>

<body>

    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <?php include('/assets/resources-notification.php'); ?>
        <!-- end navbar top -->
        <!-- navbar side -->
        <?php include('/assets/resources-navbar.php'); ?>
        <!-- end navbar side -->        
        
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Major</h1>
                </div>
                <!--end page header -->
            </div>
            


            <!-- TABLE CONTENT -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Major List
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="add-major.php?action=add">Add Major</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="add-major.php">Refresh</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                     <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-content">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Major Name</th>
                                                    <th>Action</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                               <?php
                                                    require_once('action/get-data.php');
                                                    $db = new DBHelper();
                                                    $major = $db->getMajor();
                                                    $i = 1;
                                                    foreach ($major as $val) {
                                                  ?>
                                                    <tr>
                                                        <td class="center"><?php echo $i;?></td>
                                                        <td><?php echo $val->name;?></td>
                                                        <td class="center"><a href="add-major.php?action=edit&name=<?php echo $val->name;?>">Edit</a></td>
                                                    </tr>
                                                 <?php
                                                        $i++;
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>
            <!--END OF TABLE -->



            <?php
            if(isset($_GET['action'])){
                switch ($_GET['action']) {
                    case 'add':
            ?>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Add Major
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST" action="action/insert-data.php">
                                    <div class="form-group">
                                        <label>Major Name</label>
                                        <input class="form-control" name="name" placeholder="Ex: Computer Science">
                                    </div>
                                    <button type="submit" name="add-major" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                        break;
                    case 'edit':
            ?>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Edit Major
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST" action="action/update-data.php">
                                    <div class="form-group">
                                        <label>Old Major Name</label>
                                        <input type="hidden" name="name" value="<?php if(isset($_GET['name'])) echo $_GET['name'];?>">
                                        <input class="form-control" disabled="" value="<?php if(isset($_GET['name'])) echo $_GET['name'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label>New Major Name</label>
                                        <input class="form-control" name="nameNew" placeholder="Ex: Computer Science">
                                    </div>
                                    <button type="submit" name="edit-major" class="btn btn-success">Edit</button>
                                    <button type="submit" name="del-major" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                        break;
                }
            }
            ?>

            
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <?php include('/assets/resources-js.php'); ?>

    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-content').dataTable();
        });
    </script>
    
</body>

</html>
