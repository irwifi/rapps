<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="nav-item start <? if($page === 'dashboard') {echo 'active';}?>">
                <a href="index.php" class="nav-link">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">Menu</h3>
            </li>

            <li class="nav-item <? if(in_array($page, ['barge_live', 'barge_info', 'barge_diagnostic'])) {echo 'active';}?>">
                <a href="javascript:;" class="nav-link nav-toggle ">
                    <!-- <i class="icon-diamond"></i> -->
                    <span class="title">Barge Details</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <? if($page === 'barge_info') {echo 'active';}?>">
                        <a href="index.php?page=barge_info" class="nav-link ">
                            <span class="title">Barge Information</span>
                        </a>
                    </li>
                    <li class="nav-item <? if($page === 'barge_live') {echo 'active';}?>">
                        <a href="index.php?page=barge_live" class="nav-link ">
                            <span class="title">Barge Live Data</span>
                        </a>
                    </li>
                    <li class="nav-item <? if($page === 'barge_diagnostic') {echo 'active';}?>">
                        <a href="index.php?page=barge_diagnostic" class="nav-link ">
                            <span class="title">Barge Diagnostic</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item <? if(in_array($page, ['lut', 'daq', 'live_stream'])) {echo 'active';}?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <!-- <i class="icon-puzzle"></i> -->
                    <span class="title">Data</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <? if($page === 'lut') {echo 'active';}?>">
                        <a href="index.php?page=lut" class="nav-link ">
                            <span class="title">LUTs</span>
                        </a>
                    </li>
                    <li class="nav-item <? if($page === 'daq') {echo 'active';}?>">
                        <a href="index.php?page=daq" class="nav-link ">
                            <span class="title">All Data (DAQ)</span>
                        </a>
                    </li>
                    <li class="nav-item <? if($page === 'live_stream') {echo 'active';}?>">
                        <a href="index.php?page=live_stream" class="nav-link ">
                            <span class="title">Live Stream</span>
                            <!-- <span class="badge badge-danger">2</span> -->
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item <? if($page === 'map') {echo 'active';}?>">
                <a href="index.php?page=map" class="nav-link">
                    <!-- <i class="icon-settings"></i> -->
                    <span class="title">Map</span>
                </a>
            </li>

            <li class="nav-item <? if(in_array($page, ['barge_config', 'draft_cali', 'bin_cali'])) {echo 'active';}?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Settings</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <? if($page === 'barge_config') {echo 'active';}?>">
                        <a href="index.php?page=barge_config" class="nav-link ">
                            <span class="title">Configuration</span>
                        </a>
                    </li>
                    <li class="nav-item <? if($page === 'draft_cali') {echo 'active';}?>">
                        <a href="index.php?page=draft_cali" class="nav-link ">
                            <span class="title">Draft Calibration</span>
                        </a>
                    </li>
                    <li class="nav-item <? if($page === 'bin_cali' && empty($status)) {echo 'active';}?>">
                        <a href="index.php?page=bin_cali" class="nav-link ">
                            <span class="title">Bin Calibration</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item <? if($page === 'debug_info') {echo 'active';}?>">
                <a href="index.php?page=debug_info" class="nav-link">
                    <!-- <i class="icon-settings"></i> -->
                    <span class="title">Debug Information</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR