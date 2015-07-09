
<script>
    $(document).ready(function() {
        $("#doctorsTable").tablesorter();
    });
    function removeDoctor(id) {

        if (confirm("Are you sure you want to delete this doctor?")) {
            $("#tableRow" + id).remove();
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/doctors/removeDoctor",
                data: {
                    doctorid: id
                },
                type: "POST",
                dataType: "text",
                success: function (json) {
                    
                },
                error: function (xhr, status, errorThrown) {
                    alert("Sorry, there was a problem!");
                    alert("Error: " + errorThrown);
                    alert("Status: " + status);
                    alert(JSON.stringify(xhr));
                },
                // code to run regardless of success or failure
                complete: function (xhr, status) {
                }
            });
        }
    }
</script>

<div class="modal fade" id="adddoctors-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title"><i class="fa fa-edit fa-lg"></i> Add Doctors </h3>
            </div>
            <div class="modal-body">
                <b>Any doctors imported will be ADDED in the database. Make sure you do not import copies of the same doctor! </b>
                <form method="POST" action="<?php echo base_url(); ?>/index.php/doctors/importDoctorsCsv" enctype="multipart/form-data">
                    <input type="file" name="userfile" style="margin-top: 5px" required>
                    <br>
                    <input type="submit" value="Import" class="btn btn-primary">
                </form>

            </div><!-- /.form-group -->
        </div><!-- /.modal-body -->
    </div><!-- /.modal-content -->
</div>
<div>
    <a class="btn btn-default"  data-toggle="modal" data-target="#adddoctors-modal">Import Doctors</a>
</div>
<br/>
<div class="row">
    <div class="col-lg-12">
        <div class="bs-example">

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="home">
                    <div class="table-responsive" id="doctorsTableContainer" style="overflow: auto; height: 70%;">
                        <table id="doctorsTable" class="table table-bordered table-striped tablesorter family-table" style="max-height: 500px;">
                            <thead>
                                <tr>
                                    <th>ID <i class="fa fa-sort"></i></th>
                                    <th>Name <i class="fa fa-sort"></i></th>
                                    <th>Hospital <i class="fa fa-sort"></i></th>
                                    <th>Number of Recommendations <i class="fa fa-sort"></i></th>

                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody id="AllDoctorsTableBody">

                                <?php
                                foreach ($Doctors as $doctor) {
                                    echo '<tr  id="tableRow' . $doctor['id'] . '">';
                                    echo '<td height="35">' . $doctor['id'] . '</td>';
                                    echo '<td height="35">' . $doctor['name'] . '</td>';
                                    echo '<td height="35">' . $doctor['hospital'] . '</td>';
                                    echo '<td height="35">' . $doctor['recommendationcount'] . '</td>';
                                    echo '<td height="35"><a onclick="removeDoctor(' . $doctor['id'] . ')" href="#"><i class="fa fa-fw fa-trash-o"></i></a></td>';
                                    echo '</tr>';
                                }
                                ?>


                            </tbody>
                        </table>

                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-6" id="numberOfDoctorsShowing">
                                <b>Displaying <?php echo count($Doctors); ?> Doctors</b>
                            </div>

                        </div>
                    </div><!-- /#panel-footer -->
                </div><!-- /.tab-pane -->


            </div>
        </div>
    </div>
</div><!-- /.row -->

