<?php
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
if (!$id) {
    echo "Invalid issue ID";
    die();
}

$version = time();
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Issue Tracker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">


    <!--  styles -->    
    <link rel="stylesheet" href="css/bootstrap_3.3.7.css">        
    <link rel="stylesheet" href="css/fontawesome_4.7.css">

    <link rel="stylesheet" href="css/tracker.css?v=<?= $version ?>">
    <link rel="stylesheet" href="css/notification.css?v=<?= $version ?>">       

</head>
<body>

    <div class="container-fluid topmargin">
        <div class="row">
            <button class="btn btn-success" data-toggle="modal" data-target="#addCommentPopup">Add Comment</button>
        </div>
    </div>

    <div class="container-fluid topmargin">
        <div class="row isseusListContainer">

            <div class="col-md-12" id="singlIssueDetail">
              

            </div>



        </div>        
    </div>


    <!-- show new issue popup -->
    <div id="addCommentPopup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Comment</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="col-xs-12 col-sm-12 col-md-12">                                
                            <div id="formdiv">
                                <form method="post" role="form" onsubmit="return validateaddcommentform(this);">
                                    <fieldset>                                   

                                        <div class="form-group">
                                            <label>Comment:</label>
                                            <textarea name="text" rows="5" id="text" class="form-control input-lg" placeholder="Enter comment here" required=""></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Comment By:</label>
                                            <input type="text" name="author" id="" class="form-control input-lg" placeholder="Comment By" required="">
                                        </div>                                         
                                        
                                        <input type="hidden" name="action" value="addcomment" />
                                        <input type="hidden" name="date" value="" />

                                        <input type="hidden" name="id" value="<?= $id ?>" />

                                        <div class="form-group">
                                            <div class="text-center">
                                                <button class="btn btn-danger" type="submit">Add</button>
                                            </div>
                                        </div>

                                        <hr>

                                    </fieldset>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>                   
            </div>

        </div>
    </div>
    
    
     <!-- show assign to popup -->
    <div id="assignToPopup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Assign To</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">                                
                            <div id="formdiv">
                                <form method="post" role="form" onsubmit="return validatechangeissueassignee(this);">
                                    <fieldset>                                   
                                        <div class="form-group">
                                            <label>Assigned By:</label>
                                            <input type="text" name="assignedby" id="assignedby" class="form-control input-lg" placeholder="Assigned by" required="">
                                        </div>  
                                          <div class="form-group">
                                            <label>Assigned To:</label>
                                            <select name="assignee" id="assignee" class="form-control input-lg assigntolist">
                                                
                                            </select>
                                        </div>
                                        <input type="hidden" name="id" class="assignToIssueID" value="" />
                                          <div class="form-group">
                                            <div class="text-center">
                                                <button class="btn btn-danger" type="submit">Submit</button>
                                            </div>
                                        </div>

                                    </fieldset>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>                   
            </div>

        </div>
    </div>
     
        <!-- show close to popup -->
    <div id="closePopup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Close Issue</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">                                
                            <div id="formdiv">
                                <form method="post" role="form" onsubmit="return validatecloseissue(this);">
                                    <fieldset>                                   
                                        <div class="form-group">
                                            <label>Closed By:</label>
                                            <input type="text" name="closedby" id="closedby" class="form-control input-lg" placeholder="Closed by" required="">
                                        </div>  
                                         
                                        <input type="hidden" name="id" class="assignToIssueID" value="" />
                                          <div class="form-group">
                                            <div class="text-center">
                                                <button class="btn btn-danger" type="submit">Submit</button>
                                            </div>
                                        </div>

                                    </fieldset>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>                   
            </div>

        </div>
    </div>
        
          <!-- show close to popup -->
    <div id="reopenPopup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Reopen Issue</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">                                
                            <div id="formdiv">
                                <form method="post" role="form" onsubmit="return validatereopenissue(this);">
                                    <fieldset>                                   
                                        <div class="form-group">
                                            <label>Reopened By:</label>
                                            <input type="text" name="reopenedby" id="reopenedby" class="form-control input-lg" placeholder="Reopened by" required="">
                                        </div>  
                                         
                                        <input type="hidden" name="id" class="assignToIssueID" value="" />
                                          <div class="form-group">
                                            <div class="text-center">
                                                <button class="btn btn-danger" type="submit">Submit</button>
                                            </div>
                                        </div>

                                    </fieldset>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>                   
            </div>

        </div>
    </div>

    <script src="js/settings.js" type="text/javascript"></script>    
    <script  src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap_3.3.7.js"  type="text/javascript"></script>
    <script src="js/velocity.min.js" type="text/javascript"></script>    
    <script src="js/AjaxController.js?v=<?= $version ?>" type="text/javascript"></script>
    <script src="js/NotificationController.js" type="text/javascript"></script>
    <script src="js/tracker.js?v=<?= $version ?>" type="text/javascript"></script>

    <script>
        
        $('#assignedby').val(window.userloggedin);
        getIssueApiData('<?php echo $id ?>');
        getAssignToUsersList();
    </script>
    
</body>
</html>