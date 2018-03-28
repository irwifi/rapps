<?
  session_start();
  ob_start();

  if(isset($_GET["action"]) && $_GET["action"] === "logout") {
    session_destroy();
    header("location: index.php");
    exit;
  }

  if(empty($_SESSION["login_status"]) || empty($_SESSION["login_user_id"])) {
    header("Location: index.php?route=login");
    exit;
  }

  include "../../common/config.php";
  include "../../common/connect.php";

  if(isset($_GET["page"])) {
    $page = $_GET["page"];
  } else {
    $page = "dashboard";
  }
?>

<!DOCTYPE html>
<html lang="en">
  <? include "../../template/head.php";?>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
          <? include "../../template/header.php";?>

            <!-- BEGIN CONTAINER -->
            <div class="page-container">
              <? include "../../template/sidebar.php";?>

                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <? include "../../template/theme_panel.php";?>

                        <? include "../../template/page_header.php";?>

                        <? include $page . ".php";?>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->

                <? include "../../template/footer.php";?>
            </div>
            <!-- END CONTAINER -->

          <? include "../../template/quick_sidebar.php";?>
        </div>

        <? include "../../template/modal.php";?>

      <? include "../../template/scripts.php";?>
    </body>
</html>