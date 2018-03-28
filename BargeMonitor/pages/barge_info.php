<?
  $page_title = "Barge Information";
?>

<div class="barge_brg_info">
  <div class="row ui-sortable" id="sortable_portlets">
    <div class="col-md-4 column sortable barge_info_portlet">
        <div class="portlet portlet-sortable light bg-inverse">
            <div class="portlet-title ui-sortable-handle">
                <div class="caption">
                    <i class="icon-puzzle font-red-flamingo"></i>
                    <span class="caption-subject bold font-red-flamingo uppercase"> Aft </span>
                    <span class="caption-helper"></span>
                </div>
                <div class="tools">
                    <a href="" class="collapse" data-original-title="" title=""> </a>
                    <!-- <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                    <a href="" class="reload" data-original-title="" title=""> </a>
                    <a href="" class="fullscreen" data-original-title="" title=""> </a>
                    <a href="" class="remove" data-original-title="" title=""> </a> -->
                </div>
            </div>
            <div class="portlet-body">
              <div><span>Aft  Longitude</span>  <?=$barge_info["aft  longitude"]?></div>
              <div><span>Aft Latitude</span>  <?=$barge_info["aft latitude"]?></div>
              <div><span>Aft Speed</span>  <?=$barge_info["aft speed"]?></div>
              <div><span>Aft Cog</span>  <?=$barge_info["aft cog"]?></div>
            </div>
        </div>
        <!-- empty sortable porlet required for each columns! -->
        <div class="portlet portlet-sortable-empty"> </div>
    </div>

    <div class="col-md-4 column sortable barge_info_portlet">
        <div class="portlet portlet-sortable light bg-inverse">
            <div class="portlet-title ui-sortable-handle">
                <div class="caption">
                    <i class="icon-puzzle font-red-flamingo"></i>
                    <span class="caption-subject bold font-red-flamingo uppercase"> Draft & Bin </span>
                    <span class="caption-helper"></span>
                </div>
                <div class="tools">
                    <a href="" class="collapse" data-original-title="" title=""> </a>
                    <!-- <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                    <a href="" class="reload" data-original-title="" title=""> </a>
                    <a href="" class="fullscreen" data-original-title="" title=""> </a>
                    <a href="" class="remove" data-original-title="" title=""> </a> -->
                </div>
            </div>
            <div class="portlet-body">
              <div><span>Aft Draft</span>  <?=$barge_info["Aft Draft"]?></div>
              <div><span>Fwd Draft</span>  <?=$barge_info["Fwd Draft"]?></div>
              <div><span>Avg Draft</span>  <?=$barge_info["Avg Draft"]?></div>
              <div><span>Aft Bin</span>  <?=$barge_info["Aft Bin"]?></div>
              <div><span>Fwd Bin</span>  <?=$barge_info["Fwd Bin"]?></div>
              <div><span>Avg Bin</span>  <?=$barge_info["Avg Bin"]?></div>
              <div><span>Aft Raw Bin</span>  <?=$barge_info["Aft Raw Bin"]?></div>
              <div><span>Fwd Raw Bin</span>  <?=$barge_info["Fwd Raw Bin"]?></div>
            </div>
        </div>
        <!-- empty sortable porlet required for each columns! -->
        <div class="portlet portlet-sortable-empty"> </div>
    </div>

    <div class="col-md-4 column sortable barge_info_portlet">
        <div class="portlet portlet-sortable light bg-inverse">
            <div class="portlet-title ui-sortable-handle">
                <div class="caption">
                    <i class="icon-puzzle font-red-flamingo"></i>
                    <span class="caption-subject bold font-red-flamingo uppercase"> Other Info </span>
                    <span class="caption-helper"></span>
                </div>
                <div class="tools">
                    <a href="" class="collapse" data-original-title="" title=""> </a>
                    <!-- <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                    <a href="" class="reload" data-original-title="" title=""> </a>
                    <a href="" class="fullscreen" data-original-title="" title=""> </a>
                    <a href="" class="remove" data-original-title="" title=""> </a> -->
                </div>
            </div>
            <div class="portlet-body">
              <div><span>Voltage</span>  <?=$barge_info["Voltage"]?></div>
              <div><span>heading</span>  <?=$barge_info["heading"]?></div>
              <div><span>Displacement</span>  <?=$barge_info["Displacement"]?></div>
              <div><span>Volume</span>  <?=$barge_info["Volume"]?></div>
              <div><span>Hull</span>  <?=$barge_info["Hull"]?></div>
            </div>
        </div>
        <!-- empty sortable porlet required for each columns! -->
        <div class="portlet portlet-sortable-empty"> </div>
    </div>
  </div>
</div>
