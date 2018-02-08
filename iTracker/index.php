<?php
$issues = [];

$issues[] = array(
    'title' => 'This is a test 1',
    'description' => 'test 1 description',
    'author' => 'Tester1',
    'created_ts' => '2018-02-7 11:03:22',
    'status' => 'open',
    'assignee' => 'john',
    'labels' => 'php,frontend,sql',
    'id'=>1
);

$issues[] = array(
    'title' => 'Test title',
    'description' => 'test 2 description',
    'author' => 'Tester3',
    'created_ts' => '2018-02-7 11:03:22',
    'status' => 'open',
    'assignee' => 'steven',
    'labels' => 'sql',
    'id'=>2
);

$issues[] = array(
    'title' => 'Test three issue created',
    'description' => 'test hellow world description',
    'author' => 'john',
    'created_ts' => '2018-02-7 11:03:22',
    'status' => 'closed',
    'assignee' => 'Tester2',
    'labels' => 'sql',
    'id'=>3
);
/////
$version=9;
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>iTracker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">


    <!--  styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/tracker.css?v=<?=$version?>">
    <link rel="stylesheet" href="css/notification.css?v=<?=$version?>">

</head>
<body>

    <div class="container-fluid topmargin">
        <div class="row">
            <button class="btn btn-success" data-toggle="modal" data-target="#newIssuePopup">New Issue</button>
        </div>
    </div>

    <div class="container-fluid topmargin">
        <div class="row isseusListContainer">
            <table class="table table-bordered" id="issuesList">
                <tr>
                    <th>Status</th><th>Issue</th><th>Author</th><th>Labels</th><th>Assignee</th>
                </tr>
                <?php

                foreach ($issues as $issue) {
                    ?>
                    <tr>
                        <td><?= $issue['status']; ?> <img data-id="<?=$issue['id']?>" class="pull-right editIssue" src="images/edit_icon.png" title="edit"/> </td>
                        <td>
                            <div class="issueTitle"><a href ='issue.php?id=<?=$issue['id']?>'><?= $issue['title']; ?></a></div>
                            <div class="issueDescription"><?= substr($issue['description'],0,40); // showing first 40 characters of descirption ?></div>
                        </td>
                        <td>
                            <?= $issue['author']; ?>
                        </td>
                        <td>
                            <?= $issue['labels']; ?>
                        </td>
                        <td>
                            <?= $issue['assignee']; ?>
                        </td>
                    </tr>
                <?php }
                ?>
            </table>

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
                                <form method="post" role="form" onsubmit="return validateissuecreateform(this);">
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
                                            <select name="assignee" class="form-control input-lg">
                                                <option value="none">N/A</option>
                                                <option value="tester2">Tester2</option>
                                                <option value="john">john</option>
                                                <option value="steven">steven</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Labels:</label>
                                            <input type="text" name="labels" id="labels" class="form-control input-lg" placeholder="comma sperated labels">
                                        </div>

                                        <input type="hidden" name="author" value="Tester1" />
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
                                            <select name="assignee" id="assignee_edit" class="form-control input-lg">
                                                <option value="none">N/A</option>
                                                <option value="Tester1">Tester1</option>
                                                <option value="john">john</option>
                                                <option value="steven">steven</option>
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
                                            <label>Labels:</label>
                                            <input type="text" name="labels" id="labels_edit" class="form-control input-lg" placeholder="comma sperated labels">
                                        </div>

                                        <input type="hidden" name="author" value="Tester3" />
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

    <script  src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/velocity.min.js" type="text/javascript"></script>
    <script src="js/AjaxController.js?v=<?=$version?>" type="text/javascript"></script>
    <script src="js/NotificationController.js" type="text/javascript"></script>
    <script src="js/tracker.js?v=<?=$version?>" type="text/javascript"></script>

    <script>
                                    //////// Dummy Json Data ////
                                    var issues = <?php echo json_encode($issues) ?>;
                                    console.log(issues);
                                    //////
    </script>


</body>
</html>
