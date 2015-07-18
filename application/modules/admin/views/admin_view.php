<!DOCTYPE html>
<html lang="en">
    <head>

        <!--Designer Code -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>
            <?php
            //Check if valuye is set, if not give default value
            if (isset($title)) {

                echo $title;
            } else {
                echo 'Keren Danieli';
            }
            ?>
        </title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">


        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link href="<?php echo base_url(); ?>css/fonts.css" rel="stylesheet" type='text/css'>
        <!-- End designer code -->


        <!-- JavaScript -->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script>
            google.load('visualization', '1.0', {'packages': ['corechart']});

        </script>
        <script src="<?php echo base_url(); ?>/jquery.js"></script>
        <script src="<?php echo base_url(); ?>JS/bootstrap.js"></script>

        <!-- Page Specific Plugins -->

        <script src="<?php echo base_url(); ?>JS/tablesorter/jquery.tablesorter.js"></script>
        <script src="<?php echo base_url(); ?>JS/tablesortertables.js"></script>
        <script src="<?php echo base_url(); ?>JS/jquery.bootstrap.wizard.js"></script>
        <script src="<?php echo base_url(); ?>JS/prettify.js"></script>
        <script src="<?php echo base_url(); ?>JS/jquery.form.min.js"></script>

        <script src="<?php echo base_url(); ?>JS/flot/excanvas.min.js"></script>

        <script src="<?php echo base_url(); ?>JS/tablesorter/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>JS/tablesorter/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>JS/modal.js" type="text/javascript"></script>



        <script src="<?php echo base_url(); ?>JS/jquery-ui.js"></script>
        <!-- Bootstrap plugin that turns select elements into bootstrap dropdowns -->
        <script src="<?php echo base_url(); ?>JS/bootstrap-select.js"></script>
        <link href="<?php echo base_url(); ?>css/plugins/bootstrap-select.css" rel="stylesheet">
        <script>
            window.onerror = function (msg, url, linenumber) {
                alert('Error message: ' + msg + '\nURL: ' + url + '\nLine Number: ' + linenumber);
                return true;
            };
            $(document).ready(function () {
                $('select').removeClass('form-control');
                $('select').removeClass('btn');
                $('select').removeClass('btn-primary');
                $('select').removeClass('btn-default');
                $('select').removeClass('btn-danger');
                $('select').removeClass('btn-success');
                $('select').addClass('selectpicker');
                $('select').selectpicker();
                
                <?php if($login!=0){
                    echo '$("#loginModal").modal("show");';
                }
                ?>
            });


<?php
if (isset($Error)) {
    echo "alert('" . $Error . "')";
}
?>
    <?php if($login==2){
        echo "alert('The password is incorrect!')";
    }
    ?>
        </script>   


    </head>


   <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>UIKit/css/uikit.gradient.css" />
    <script src="<?php echo base_url(); ?>jquery.js"></script>
    <script src="<?php echo base_url(); ?>jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>UIKit/js/uikit.min.js"></script>-->

    <body>

        <?php if ($login==1 || $login==2): ?>            
            <!-- Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Login</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="<?php echo base_url()?>index.php/admin/login">
                                <input class="form-control" name="password" type="password" placeholder="Password" />
                                <br/>
                                <input type="submit" value="Login" class="btn btn-primary">
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div id="wrapper">

            <!-- Sidebar -->
            <nav class="navbar navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/doctors"><span style="position:relative; top: 25px;left:35px; font-weight: bold">Keren Danieli</span></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li <?php
                        if ($passData['Name'] == 'Responses') {
                            echo ' class="active"';
                        }
                        ?>><a href="<?php echo base_url(); ?>index.php/responses"><i class="fa fa-dashboard"></i> Responses</a></li>
                        <li class="divider" style="border-top:1px solid #3d3f4b; border-bottom:1px solid #242631; height:2px; width:100%;"></li>
                        <li <?php
                        if ($passData['Name'] == 'Doctors') {
                            echo ' class="active"';
                        }
                        ?>><a href="<?php echo base_url(); ?>index.php/doctors"><i class="fa fa-group"></i> Doctors</a></li>

                    </ul>


                </div><!-- /.navbar-collapse -->
            </nav>

            <?php if (!$login): ?>

                <div id="page-wrapper">

                    <?php
                    $this->load->view(strtolower($passData['Name']) . "/" . $viewPath, $passData);
                    ?>

                </div>

            <?php endif; ?>

        </div>

    </body>

</html>