<?php
$version = (time());
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
            <button class="btn btn-success" data-toggle="modal" data-target="#newIssuePopup">New Issue</button>
            &nbsp;
            <button class="btn btn-success" data-toggle="modal" data-target="#searchPopup">Search</button>
        </div>
    </div>

    <div class="container-fluid topmargin">
        <div class="row isseusListContainer">
            <table class="table table-bordered table-striped" id="issuesList">
                
                
            </table>
            <div id="paginationContainer"></div>
        </div>        
    </div>


    <!-- show new issue popup -->
    <div id="newIssuePopup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create new issue</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">                                
                            <div id="formdiv">
                                <form enctype="multipart/form-data" method="post" role="form" onsubmit="return validateissuecreateform(this);">
                                    <fieldset>                                   

                                        <div class="form-group">
                                            <label>Title:</label>
                                            <input type="text" name="title" id="title" class="form-control input-lg" placeholder="Title" required="">
                                        </div>                                      
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <textarea name="description" id="description" class="form-control input-lg" placeholder="Enter issue description here" required=""></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Assigned To:</label>
                                            <select name="assignee" id="assignee" class="form-control input-lg assigntolist">
                                                
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Tags:</label>
                                            <input type="text" name="tags" id="tags" class="form-control input-lg" placeholder="comma sperated tags">
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label for="fileselect">Image Files to upload:</label>
                                                <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" accept="image/x-png,image/gif,image/jpeg" />
                                            </div>
                                            <div class="row">                                                
                                                    <div id="imageCollection">

                                                    </div>                                                
                                            </div>
                                        </div>

                                        <input type="hidden" name="author" class="author" value="" />
                                        <input type="hidden" name="action" value="createissue" />
                                        <input type="hidden" name="status" value="open" />

                                        <div class="form-group">
                                            <div class="text-center">
                                                <button class="btn btn-danger" type="submit">Create</button>
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

    <!-- show edit issue popup -->
    <div id="editIssuePopup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit issue</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">                                
                            <div id="formdiv">
                                <form id="editIssueForm" method="post" role="form" onsubmit="return validateissueeditform(this);">
                                    <fieldset>                                   

                                        <div class="form-group">
                                            <label>Title:</label>
                                            <input type="text" name="title" id="title_edit" class="form-control input-lg" placeholder="Title" required="">
                                        </div>                                      
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <textarea name="description" id="description_edit" class="form-control input-lg" placeholder="Enter issue description here" required=""></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Assigned To:</label>
                                            <select name="assignee" id="assignee_edit" class="form-control input-lg assigntolist">
                                                
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Status:</label>
                                            <select name="status" id="status_edit" class="form-control input-lg">
                                                <option value="open">open</option>
                                                <option value="closed">closed</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Tags:</label>
                                            <input type="text" name="tags" id="tags_edit" class="form-control input-lg" placeholder="comma sperated tags">
                                        </div>

                                        <input type="hidden" name="author" class="author" value="" />
                                        <input type="hidden" name="action" value="editissue" />


                                        <div class="form-group">
                                            <div class="text-center">
                                                <button class="btn btn-danger" type="submit">Update</button>
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
    
      <!-- show issue popup -->
    <div id="isseuDetailPopup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="isseuTitle"></h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="col-md-12">                                
                            <span id="createdby">                                
                            </span>
                            <span id="createdate">                                
                            </span>
                            <span id="status">                                
                            </span>
                        </div>
                        <hr/>
                        
                        <div class="col-md-12" id="issueDescription">
                            
                        </div>
                        <br/>
                        <br/>
                        <div class="col-md-12 text-center">
                            <a class="btn btn-info" href="" id="issueLink" target="_blank">More Detail</a>
                        </div>

                    </div>
                </div>                   
            </div>

        </div>
    </div>
      
            
        <!-- show issue popup -->
    <div id="searchPopup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Search Issues</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                           <div class="col-xs-12 col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-2">                                
                            <div>
                                <form id="searchIssueForm" method="post" role="form" onsubmit="return validatesearchissueform(this);">
                                    <fieldset>                                   

                                        <div class="form-group">
                                            <label>Search Text:</label>
                                            <input type="text" name="text" id="searchtext" class="form-control input-lg" placeholder="enter text to search" required="">
                                        </div>                                      
                                        
                                         <div class="form-group">
                                            <label>Search by:</label>
                                            <select name="searchby" id="searchby" class="form-control input-lg">
                                                <option value="title">Title</option>
                                                <option value="tags">Tags</option>
                                                <option value="description">Description</option>
                                                <option value="author">Created By</option>
                                                <option value="assignedto">Assigned To</option>
                                            </select>
                                        </div>
                                      
                                        <div class="form-group">
                                            <label>Status:</label>
                                            <select name="status" id="searchstatus" class="form-control input-lg">
                                                <option value="any">Any</option>
                                                <option value="open">Open</option>
                                                <option value="closed">Closed</option>
                                                <option value="assigned">Assigned</option>
                                            </select>
                                        </div>

                                       

                                        <div class="form-group">
                                            <div class="text-center">
                                                <button class="btn btn-danger" type="submit">Search</button>
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
      

    <script src="js/settings.js?v=<?= $version ?>" type="text/javascript"></script>    
    <script  src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap_3.3.7.js"  type="text/javascript"></script>
    <script src="js/velocity.min.js" type="text/javascript"></script>    
    <script src="js/AjaxController.js?v=<?= $version ?>" type="text/javascript"></script>
    <script src="js/NotificationController.js" type="text/javascript"></script>
    <script src="js/tracker.js?v=<?= $version ?>" type="text/javascript"></script>
    <script src="js/imageupload.js?v=<?= $version ?>" type="text/javascript"></script>

    <script>
                                    //////// Dummy Json Data ////
                                    getIssuesList();
                                    getAssignToUsersList();
                                    //////
    </script>


</body>
</html>