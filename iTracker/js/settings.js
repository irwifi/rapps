if ( window.location.hostname === "localhost" ) {
    window.site_root_url = "//localhost/p/Work/iTracker/src/";

    window.ITsettings = {
        'fetch_issues_list_url': '//localhost/p/Work/iTracker/src/ajax_api.php?action=getissuesdata',
        'create_issue_url': '//localhost/p/Work/iTracker/src/ajax_api.php',
        'edit_issue_url': '//localhost/p/Work/iTracker/src/ajax_api.php',
        'delete_issue_url': '//localhost/p/Work/iTracker/src/ajax_api.php',
        'comment_add_url': '//localhost/p/Work/iTracker/src/ajax_api.php',
        'fetch_issue_url': '//localhost/p/Work/iTracker/src/ajax_api.php',
        'fetch_assign_to_list': '//localhost/p/Work/iTracker/src/ajax_api.php',
        'set_issue_assignto_url': '//localhost/p/Work/iTracker/src/ajax_api.php',
        'close_issue_url': '//localhost/p/Work/iTracker/src/ajax_api.php',
        'reopen_issue_url': '//localhost/p/Work/iTracker/src/ajax_api.php'
    };
} else {
    window.site_root_url = "http://rapps.herokuapp.com/iTracker/";

    window.ITsettings = {
        'fetch_issues_list_url': '//rapps.herokuapp.com/iTracker/ajax_api.php?action=getissuesdata',
        'create_issue_url': '',
        'edit_issue_url': '',
        'delete_issue_url': '',
        'comment_add_url': '',
        'fetch_issue_url': '',
        'fetch_assign_to_list': '',
        'set_issue_assignto_url': '',
        'close_issue_url': '',
        'reopen_issue_url': ''
    };
}
