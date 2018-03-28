<?
  $barge_info = file_get_contents('http://barges.etracinc.com:8011/btc/getallbarge');
  $barge_info = json_decode($barge_info, true)[0];
?>

<!-- BEGIN PAGE HEADER-->
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <? if($page === "dashboard") {?>
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Dashboard</span>
            </li>
        </ul>
    <? }?>

    <div class="page-toolbar">
      <div class="barge_info_name">
        <span class="barge_info_name_val"><?=$barge_info["Barge Name"]?> : </span>
        <span class="barge_info_id">Barge Id: <?=$barge_info["Barge ID"]?></span>
        <span class="barge_info_timestamp">(<?=$barge_info["Datetime"]?>)</span>
      </div>

        <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp;
            <span class="thin uppercase hidden-xs"></span>&nbsp;
            <i class="fa fa-angle-down"></i>
        </div>
    </div>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> <span class="page_title"></span>
    <!-- <small>statistics, charts, recent events and reports</small> -->
</h1>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->