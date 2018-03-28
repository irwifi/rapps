<?
  $page_title = "Barge Configuration";
?>

<div class="barge_config_content">
  <div class="row ui-sortable" id="sortable_portlets">
    <div class="col-md-6 column sortable barge_config_portlet barge_config_btc">
        <div class="portlet portlet-sortable light bg-inverse">
            <div class="portlet-title ui-sortable-handle">
                <div class="caption">
                    <i class="icon-puzzle font-red-flamingo"></i>
                    <span class="caption-subject bold font-red-flamingo uppercase"> Draft </span>
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
              <div class="portlet_header">
                <span class="portlet_server">Server Config</span>
                <span class="portlet_box">Box Config</span>
              </div>

              <div class="portlet_group">
                <div class="portlet_group_name">Fwd Draft</div>
                <div class="portlet_item portlet_non_btc">
                  <span class="portlet_title">Origin</span>
                  <span class="portlet_server">
                    <select name="sconfig_fwd_draft_origin">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <select name="bconfig_fwd_draft_origin">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item portlet_non_btc">
                  <span class="portlet_title">Channel</span>
                  <span class="portlet_server">
                    <select name="sconfig_fwd_draft_channel">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <select name="bconfig_fwd_draft_channel">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Slope</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Offset</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Uptime</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Downtime</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>
              </div>

              <div class="portlet_group">
                <div class="portlet_group_name">Aft Draft</div>
                <div class="portlet_item portlet_non_btc">
                  <span class="portlet_title">Origin</span>
                  <span class="portlet_server">
                    <select name="sconfig_fwd_draft_origin">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <select name="bconfig_fwd_draft_origin">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item portlet_non_btc">
                  <span class="portlet_title">Channel</span>
                  <span class="portlet_server">
                    <select name="sconfig_fwd_draft_channel">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <select name="bconfig_fwd_draft_channel">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Slope</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Offset</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Uptime</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Downtime</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>
              </div>
            </div>
        </div>

        <div class="portlet portlet-sortable light bg-inverse">
            <div class="portlet-title ui-sortable-handle">
                <div class="caption">
                    <i class="icon-puzzle font-red-flamingo"></i>
                    <span class="caption-subject bold font-red-flamingo uppercase"> GPS </span>
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
              <div class="portlet_header">
                <span class="portlet_server">Server Config</span>
                <span class="portlet_box">Box Config</span>
              </div>

              <div class="portlet_group">
                <div class="portlet_group_name">Fwd GPS</div>
                <div class="portlet_item portlet_non_btc">
                  <span class="portlet_title">Origin</span>
                  <span class="portlet_server">
                    <select name="sconfig_fwd_draft_origin">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <select name="bconfig_fwd_draft_origin">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item portlet_non_btc">
                  <span class="portlet_title">Channel</span>
                  <span class="portlet_server">
                    <select name="sconfig_fwd_draft_channel">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <select name="bconfig_fwd_draft_channel">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Uptime</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Downtime</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>
              </div>

              <div class="portlet_group">
                <div class="portlet_group_name">Aft GPS</div>
                <div class="portlet_item portlet_non_btc">
                  <span class="portlet_title">Origin</span>
                  <span class="portlet_server">
                    <select name="sconfig_fwd_draft_origin">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <select name="bconfig_fwd_draft_origin">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item portlet_non_btc">
                  <span class="portlet_title">Channel</span>
                  <span class="portlet_server">
                    <select name="sconfig_fwd_draft_channel">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <select name="bconfig_fwd_draft_channel">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Uptime</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Downtime</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>
              </div>
            </div>
        </div>
        <!-- empty sortable porlet required for each columns! -->
        <div class="portlet portlet-sortable-empty"> </div>
    </div>

    <div class="col-md-6 column sortable barge_config_portlet barge_config_btc">
        <div class="portlet portlet-sortable light bg-inverse">
            <div class="portlet-title ui-sortable-handle">
                <div class="caption">
                    <i class="icon-puzzle font-red-flamingo"></i>
                    <span class="caption-subject bold font-red-flamingo uppercase"> Bin </span>
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
              <div class="portlet_header">
                <span class="portlet_server">Server Config</span>
                <span class="portlet_box">Box Config</span>
              </div>

              <div class="portlet_group">
                <div class="portlet_group_name">Fwd Bin</div>
                <div class="portlet_item portlet_non_btc">
                  <span class="portlet_title">Origin</span>
                  <span class="portlet_server">
                    <select name="sconfig_fwd_draft_origin">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <select name="bconfig_fwd_draft_origin">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item portlet_non_btc">
                  <span class="portlet_title">Channel</span>
                  <span class="portlet_server">
                    <select name="sconfig_fwd_draft_channel">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <select name="bconfig_fwd_draft_channel">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Slope</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Offset</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Uptime</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Downtime</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>
              </div>

              <div class="portlet_group">
                <div class="portlet_group_name">Aft Bin</div>
                <div class="portlet_item portlet_non_btc">
                  <span class="portlet_title">Origin</span>
                  <span class="portlet_server">
                    <select name="sconfig_fwd_draft_origin">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <select name="bconfig_fwd_draft_origin">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item portlet_non_btc">
                  <span class="portlet_title">Channel</span>
                  <span class="portlet_server">
                    <select name="sconfig_fwd_draft_channel">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <select name="bconfig_fwd_draft_channel">
                      <option value=1>1</option>
                    </select>
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Slope</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Offset</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Uptime</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Downtime</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>
              </div>
            </div>
        </div>

        <div class="portlet portlet-sortable light bg-inverse">
            <div class="portlet-title ui-sortable-handle">
                <div class="caption">
                    <i class="icon-puzzle font-red-flamingo"></i>
                    <span class="caption-subject bold font-red-flamingo uppercase"> Other </span>
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
              <div class="portlet_header">
                <span class="portlet_server">Server Config</span>
                <span class="portlet_box">Box Config</span>
              </div>

              <div class="portlet_group">
                <div class="portlet_group_name">Wireless</div>

                <div class="portlet_item">
                  <span class="portlet_title">XStream DT</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>
              </div>

              <div class="portlet_group">
                <div class="portlet_group_name">Hull</div>

                <div class="portlet_item">
                  <span class="portlet_title">Invert</span>
                  <span class="portlet_server">
                    <button class="barge_config_invert"><i class="fa fa-play"></i></button>
                  </span>
                  <span class="portlet_box">
                    <button class="barge_config_invert"><i class="fa fa-play"></i></button>
                  </span>
                </div>
              </div>

              <div class="portlet_group">
                <div class="portlet_group_name">Miscellaneous Data</div>

                <div class="portlet_item">
                  <span class="portlet_title">Volume</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" class="touchspin" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" class="touchspin" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>

                <div class="portlet_item">
                  <span class="portlet_title">Heading Offset</span>
                  <span class="portlet_server">
                    <input type="text" name="sconfig_fwd_draft_slope" value="" class="touchspin" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                  <span class="portlet_box">
                    <input type="text" name="bconfig_fwd_draft_slope" value="" class="touchspin" />
                    <button class="barge_config_ok"><i class="fa fa-check"></i></button>
                  </span>
                </div>
              </div>
            </div>
        </div>
        <!-- empty sortable porlet required for each columns! -->
        <div class="portlet portlet-sortable-empty"> </div>
    </div>
  </div>
</div>

<script src="../../public/js/touchspin.js" type="text/javascript"></script>
<script>
  $(() => {
    $("input.touchspin").TouchSpin({
      verticalbuttons: true
    });

    $(".bootstrap-touchspin-up, .bootstrap-touchspin-down").on("click", function() {
      $(this).closest(".bootstrap-touchspin").next("button.barge_config_ok").css({"background": "#7ff58e"});
    });

    $(".barge_config_portlet input, .barge_config_portlet select").on("change", function() {
      $(this).css({"background": "#7ff58e"});
      $(this).next("button").css({"background": "#7ff58e"});
    });
  });
</script>
