<!DOCTYPE html>
<html>
<?php
$thisSection = "Add";
$thisPage = "Course";
 ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Portal UBM</title>
    <!-- Core CSS - Include with every page -->
    <?php include('/assets/resources-css.php'); ?>
    
    <?php include('/assets/resources-js.php'); ?>

    <script type="text/javascript" src="assets/scripts/jquery.form.js"></script>
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    
        <script type='text/javascript'>
            $(document).ready(function(){

               
                $("#major-list").change(function(){
                    var val = $('#major-list').find('option:selected').text();
                    
                    
                    var table = $('#dataTables-content').DataTable( {
                            "processing": true,
                            "serverSide": true,
                            "dataSrc": "dataTable",
                            "ajax": {
                                "url": "http://localhost/php/miniportalubm/api/getListPortalMappingCourse.php",
                                "type": "POST",
                                
                                 "data": {
                                    "major" : val,
                                    "platform" : "web"
                                } 
                            },
                            "orderNum": [[ 1, 'asc']],
                             "columnDefs": [ {
                                "searchable": false,
                                "orderable": false,
                                "targets": 3,
                                "render": function ( data, type, row ) {
                                        return "<a href='add-course.php?action=edit&name=" + data + "&selected=" + val + "'> Edit </a>" ;
                                }
                            } ],
                            
                            "columns": [
                            { "data": null },
                            { "data": "name" },
                            { "data": "code" },
                            { "data": "name" }
                            ],

                           "bDestroy": true
                            
                        } );

                        table.on( 'order.dt search.dt', function () {
                        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                                cell.innerHTML = i+1;
                            } );
                        } ).draw();
                });

                <?php if(isset($_GET['selected'])){?>
                    $("#major-list").val('<?php echo $_GET['selected']?>');
                    $("#major-list" ).trigger("change");
                <?php }?>

            });
            
        </script>




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
                    <h1 class="page-header">Courses</h1>
                </div>
                <!--end page header -->
            </div>



        <!-- TABLE CONTENT -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Course List
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="add-course.php?action=add">Add Course</a>
                                        </li>
                                        <li><a href="add-course.php?action=mapping">Add Mapping</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="add-course.php">Refresh</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <form role="form" method="POST" action="action/delete-data.php">
                                            
                                            <div class="form-group">
                                                <label>Major</label>
                                                <select id="major-list" class="form-control" name="major-list">
                                                    <option value="" disabled selected hidden>-- Major --</option>
                                                    <?php                
                                                        require_once('action/get-data.php');
                                                        $db = new DBHelper();
                                                        $course = $db->getMajor();
                                                        $i = 1;
                                                        foreach ($course as $val) {
                                                        echo "<option value='".$val->name."'>".$val->name."</option>";
                                                        $i++;
                                                    }
                                                    ?>                                                      
                                                </select>  
                                            </div>
                                    </form>
                                 </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-lg-12">
                                     <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-content">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Course Name</th>
                                                    <th>Course Id</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableCourse">
                                           
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
                            Course
                        </div>
                        <div class="panel-body">
                            
                                    <form role="form" method="POST" action="action/insert-data.php">
                                        <div class="form-group">
                                            <label>Course Id</label>
                                            <input class="form-control" name="code" placeholder="Ex: TII02">
                                        </div>
                                        <div class="form-group">
                                            <label>Course Name</label>
                                            <input class="form-control" name="name" placeholder="Ex: Basis Data Enterprise">
                                        </div>
                                        <button type="submit" name="add-course" class="btn btn-primary">Submit Button</button>
                                    </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php
                    break;
                    case 'mapping':
        ?>
        <div class="row">
                <div class="col-lg-6">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Courses Mapping
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="action/delete-data.php">
                                <div class="form-group">
                                    <label>List Courses</label>
                                    <?php                
                                    if(isset($_GET['major'])){
                                        require_once('action/get-data.php');
                                        $db = new DBHelper();
                                        $course = $db->getMappingCourse($_GET['major']);
                                        $i = 1;
                                        foreach ($course as $val) {
                                        ?>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="major[]" value="<?php echo $val->name;?>" type="checkbox"><?php echo $val->getName();?>
                                                </label>
                                            </div>
                                        <?php
                                            $i++;
                                        }
                                    }
                                    ?>
                                </div>
                                <button type="submit" name="edit-matkul" class="btn btn-success">Edit </button>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Course
                        </div>
                        <div class="panel-body">
                              <form role="form" method="POST" action="action/update-data.php">

                               <?php                
                                    if(isset($_GET['name'])){
                                        require_once('action/get-data.php');
                                        $db = new DBHelper();
                                        $course = $db->getCourse($_GET['name'],"name");
                                        foreach ($course as $val) {
                                        ?>
                                        <div class="form-group">
                                            <label>Old Course Name</label>
                                            <input type="hidden" name="name" value="<?php echo $val->name; ?>">
                                            <input class="form-control" disabled="" value="<?php echo $val->name;?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Old Id</label>
                                            <input type="hidden" name="id" value="<?php echo $val->code; ?>">
                                            <input class="form-control" disabled="" value="<?php echo $val->code; ?>">
                                        </div>
                                <?php }
                                    }?>
                                    
                                    <div class="form-group">
                                        <label>New Course Name</label>
                                        <input class="form-control" name="nameNew" placeholder="Ex: Enterprise Programming">
                                    </div> 
                                    <div class="form-group">
                                        <label>New Course Id</label>
                                        <input class="form-control" name="idNew" placeholder="Ex: TII02">
                                    </div>
                                    <button type="submit" name="edit-course" class="btn btn-success">Edit</button>
                                    <button type="submit" name="del-course" class="btn btn-danger">Delete</button>
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


            
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {

        });
    </script>
</body>

</html>