<?php
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
if (!$id) {
    echo "Invalid issue ID";
    die();
}

/// Dummy json Data ///


//$imagesArray = getImagesarray($issue);
//
//function getImagesarray($data) {
//    $arr_result = NULL;
//    foreach ($data as $key => $value) {
//        $exp_key = explode('_', $key);
//        if ($exp_key[0] == 'image') {
//            $arr_result[] = $value;
//        }
//    }
//    return $arr_result;
//}

/////
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
                <div class="col-md-2">
                    <span class="isseuAuthor"> <?= $issue['author']; ?> </span>
                    <div><?= $issue['created_ts']; ?></div>
                </div>
                <div class="col-md-8">
                    <div class="issueBox">
                        <div class="issueDetailTitle"><?= $issue['title']; ?> <span class="pull-right"><?= $issue['status']; ?></span></div>
                        <div class="issueDescription"><?= $issue['description']; ?></div>
                        <hr/>
                        <div class="imageCollection">
                            <?php
                            if ($imagesArray) {
                                foreach ($imagesArray as $img) {
                                    echo "<a href='$img' target='_blank'><img src='$img' class='imgIssueThumnail' /></a>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="commentsArea" id="commentsSection">
<?php foreach ($comments as $comm) { ?>
                            <div class="panel panel-white post panel-shadow">
                                <div class="post-heading">
                                    <div class="pull-left image">
                                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                                    </div>
                                    <div class="pull-left meta">
                                        <div class="title h5">
                                            <a href="#"><b><?= $comm['author'] ?></b></a>
                                            made a comment.
                                        </div>
                                        <h6 class="text-muted time"><?= $comm['created_ts'] ?></h6>
                                    </div>
                                </div>
                                <div class="post-description">
                                    <p><?= $comm['text'] ?></p>
                                </div>
                            </div>
<?php } ?>
                    </div>
                </div>

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

                        <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
                            <div id="formdiv">
                                <form method="post" role="form" onsubmit="return validateaddcommentform(this);">
                                    <fieldset>

                                        <div class="form-group">
                                            <label>Comment:</label>
                                            <textarea name="text" id="text" class="form-control input-lg" placeholder="Enter comment here" required=""></textarea>
                                        </div>

                                        <input type="hidden" name="author" value="Tester1" />
                                        <input type="hidden" name="action" value="addcomment" />

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

    <script src="js/settings.js" type="text/javascript"></script>
    <script  src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap_3.3.7.js"  type="text/javascript"></script>
    <script src="js/velocity.min.js" type="text/javascript"></script>
    <script src="js/AjaxController.js?v=<?= $version ?>" type="text/javascript"></script>
    <script src="js/NotificationController.js" type="text/javascript"></script>
    <script src="js/tracker.js?v=<?= $version ?>" type="text/javascript"></script>


</body>
</html>
