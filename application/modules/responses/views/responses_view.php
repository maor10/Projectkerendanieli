
<script>
    $(document).ready(function() {
        $("#responsesTable").tablesorter();
    });
    function viewExplanation(explanationText) {

        $("#explanationText").html(explanationText);
        $('#showexplanation-modal').modal('show');
    }
</script>

<div class="modal fade" id="showexplanation-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title"><i class="fa fa-eye fa-lg"></i> Explanation </h3>
            </div>
            <div class="modal-body">
                <div id="explanationText" >
                </div>

            </div><!-- /.form-group -->
        </div><!-- /.modal-body -->
    </div><!-- /.modal-content -->
</div>

<br/>
<div class="row">
    <div class="col-lg-12">
        <div class="bs-example">

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="home">
                    <div class="table-responsive" id="responsesTableContainer" style="overflow: auto; height: 70%;">
                        <table id="responsesTable" class="table table-bordered table-striped tablesorter family-table" style="max-height: 500px;">
                            <thead>
                                <tr>
                                    <th>ID <i class="fa fa-sort"></i></th>
                                    <th>Responser Name <i class="fa fa-sort"></i></th>
                                    <th>Doctor Name <i class="fa fa-sort"></i></th>
                                    <th>Explanation <i class="fa fa-sort"></i></th>
                                    <th>Hospital<i class="fa fa-sort"></i></th>
                                    <th>Grade<i class="fa fa-sort"></i></th>
                                    <th>Responser ID <i class="fa fa-sort"></i></th>
                                    <th>Responser Type <i class="fa fa-sort"></i></th>
                                    <th>Phone Number</th>
                                    <th>Email <i class="fa fa-sort"></i></th>
                                    <th>Date <i class="fa fa-sort"></i></th>
                                </tr>
                            </thead>

                            <tbody id="AllResponsesTableBody">

                                <?php
                                foreach ($Responses as $response) {
                                    echo '<tr  id="tableRow' . $response['id'] . '">';
                                    echo '<td height="35">' . $response['id'] . '</td>';
                                    echo '<td height="35">' . $response['responsername'] . '</td>';
                                    echo '<td height="35">' . $response['doctorname'] . '</td>';
                                    
                                    if($response['explanation'] != null && $response['explanation'] != ""){
                                        echo '<td height="35"><a onclick="viewExplanation(\'' . str_replace("'", "\\'", str_replace("\r\n", "\\n", $response['explanation'])) . '\')" href="#"><i class="fa fa-fw fa-eye"></i></a></td>';
                                    }else{
                                        echo '<td height="35">N/A</td>';
                                    }
                                    echo '<td height="35">' . $response['hospital'] . '</td>';
                                    echo '<td height="35">' . $response['grade'] . '</td>';
                                    echo '<td height="35">' . $response['responserid'] . '</td>';
                                    echo '<td height="35">' . $response['responsertype'] . '</td>';
                                    echo '<td height="35">' . $response['phonenumber'] . '</td>';
                                    echo '<td height="35">' . $response['email'] . '</td>';
                                    echo '<td height="35">' . $response['datesubmitted'] . '</td>';
                                    echo '</tr>';
                                }
                                ?>


                            </tbody>
                        </table>

                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-6" id="numberOfResponsesShowing">
                                <b>Displaying <?php echo count($Responses); ?> Responses</b>
                            </div>

                        </div>
                    </div><!-- /#panel-footer -->
                </div><!-- /.tab-pane -->


            </div>
        </div>
    </div>
</div><!-- /.row -->

