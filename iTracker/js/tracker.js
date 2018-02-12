
function validateissuecreateform(form) {
    var fields = $(form).serializeArray();

    var fdata = new FormData();
    var idata = fields;

    for (var f in $('#fileselect')[0].files) {
        f = $('#fileselect')[0].files[f];
        if (f) {
            var document = f;
            fdata.append('filelist[]', document);
        }
    }

    $.each(idata, function (key, input) {
        fdata.append(input.name, input.value);
    });

    //console.log(fdata);

    var success = function (data) {
        form.reset();
        imageUploader.clearImageCollection();
        console.log(data);
        var item = generateIssueJson(fields);
        window.total_issues_count = window.total_issues_count ? window.total_issues_count : 1;
        addIssueToDom(item, window.total_issues_count);
        window.total_issues_count++;
        $('#newIssuePopup').modal('hide');
    };
    var error = function (data) {
        console.log(data);
    };
    var url = window.ITsettings.create_issue_url;
    var data = fdata;
    var prop = {
        processData: false,
        contentType: false
    };
    AjaxController.SendAjaxRequest(data, 'POST', 'json', url, success, error, null, prop);

    return false;
}

function validatesearchissueform(form) {
    var fields = $(form).serializeArray();

    var success = function (data) {
        form.reset();
        //enable this function and make sure your data is correct
        //displayIssuesList(data);
    };
    var error = function (data) {
        console.log(data);
    };
    var url = window.ITsettings.search_issue_url;
    var data = fields;
    AjaxController.SendAjaxRequest(data, 'POST', 'json', url, success, error);

    return false;
}

function validateissueeditform(form) {
    var fields = $(form).serializeArray();

    var success = function (data) {
        form.reset();
        console.log(data);
        $('#editIssuePopup').modal('hide');
    };
    var error = function (data) {
        console.log(data);
    };
    var url = window.ITsettings.edit_issue_url;
    var data = fields;
    AjaxController.SendAjaxRequest(data, 'POST', 'json', url, success, error);

    return false;
}

function validateaddcommentform(form) {
    var fields = $(form).serializeArray();

    var success = function (data) {
        form.reset();
        var json = generateIssueJson(fields);
        console.log(json);
        addCommentToDom(json);
        $('#addCommentPopup').modal('hide');
    };
    var error = function (data) {
        console.log(data);
    };
    var url = window.ITsettings.comment_add_url;
    var data = fields;
    AjaxController.SendAjaxRequest(data, 'POST', 'json', url, success, error);

    return false;
}

function validatechangeissueassignee(form) {
    var fields = $(form).serializeArray();
    
    var success = function (data) {
        $('#assignToPopup').modal('hide');
    };
    var error = function (data) {
        console.log(data);
    };
    var url = window.ITsettings.set_issue_assignto_url;
    var data = fields;
    AjaxController.SendAjaxRequest(data, 'POST', 'json', url, success, error);

    return false;
}

function validatecloseissue(form) {
    var fields = $(form).serializeArray();
    
    var success = function (data) {
        $('#closePopup').modal('hide');
    };
    var error = function (data) {
        console.log(data);
    };
    var url = window.ITsettings.close_issue_url;
    var data = fields;
    AjaxController.SendAjaxRequest(data, 'POST', 'json', url, success, error);

    return false;
}

function validatereopenissue(form){
    var fields = $(form).serializeArray();
    
    var success = function (data) {
        $('#reopenPopup').modal('hide');
    };
    var error = function (data) {
        console.log(data);
    };
    var url = window.ITsettings.reopen_issue_url;
    var data = fields;
    AjaxController.SendAjaxRequest(data, 'POST', 'json', url, success, error);

    return false;
}


function addIssueToDom(item, count) {

    if (item) {
        issues.push(item);
        $('#issuesList').append('<tr id="row_issue_' + item.id + '"> '
                + '<td>' + count + '</td>'
                + '<td><div class="issueTitle" data-id="' + item.id + '"><span>' + item.title + ' </span> </div></td>'
                + '<td><span class="">' + item.created_ts + '</span>  </td>'
                + '<td>' + item.author + '</td>'
                + '<td>' + item.tags + '</td>'
                + '<td>' + item.assignee + '</td>'
                + '<td>' + item.status + '</td>'
                + '<td><img data-id="' + item.id + '" class="pull-right deleteIssue" src="images/delete_icon.png" title="delete"/>  <img data-id="' + item.id + '" class="pull-right editIssue" src="images/edit_icon.png" title="edit"/> </td>'
                + ' </tr>');
    }
}

function getIDTemp() {
    return Math.random().toString(36).substr(2, 5);
}

function generateIssueJson(data) {
    var json = [];
    for (var item in data) {
        item = data[item];
        if (item) {
            json[item.name] = item.value;
        }
    }
    json.id = getIDTemp();
    json.created_ts = json.date ? json.date : 'yyyy-mm-dd H:i:s';
    return json;
}

function openEditIssue(id) {
    var data = getIssueData(id);
    console.log(data);

    for (var item in data) {
        var key = item;
        item = data[key];
        if (item) {
            var edit_id = key + "_edit";
            $('#' + edit_id).val(item);
        }
    }

    $('#editIssuePopup').modal('show');
}

function getIssueData(id) {
    for (var issue in issues) {
        issue = issues[issue];
        if (issue) {
            if (issue.id == id) {
                return issue;
            }
        }
    }
}

function updateIssuesData(id, data) {
    for (var issue in issues) {
        var index = issue;
        issue = issues[issue];
        if (issue) {
            if (issue.id == id) {
                issues[index] = data;
            }
        }
    }
}

function addCommentToDom(data) {
    $('#commentsSection').append('<div class="panel panel-white post panel-shadow">'
            + '<div class="post-heading">'

            + '<div class="pull-left meta">'
            + '<div class="title h5">'
            + '<a href="#"><b>' + data.author + '</b></a> made a comment on ' + data.created_ts

            + '</div>'
            + '</div>'
            + '</div> '
            + '<div class="post-description"> '
            + '<p>' + data.text + '</p>'
            + '</div>'
            + '</div>');
}

function deleteIssue(id) {
    var success = function (data) {
        $('#row_issue_' + id).remove();
        getIssuesList();
    };
    var error = function (data) {
        console.log(data);
    };
    var url = window.ITsettings.delete_issue_url;
    var data = {
        id: id
    };
    AjaxController.SendAjaxRequest(data, 'POST', 'json', url, success, error);
}

function closeIssue(id) {
    var success = function (data) {
        getIssueApiData(id);
    };
    var error = function (data) {
        console.log(data);
    };
    var url = window.ITsettings.close_issue_url;
    var data = {
        id: id,
        'by': window.userloggedin
    };
    AjaxController.SendAjaxRequest(data, 'POST', 'json', url, success, error);
}


function getIssuesList(page) {
    page = page ? page : 1;

    $('#issuesList').empty();
    $('#issuesList').append('<tbody><tr>'
            + '<th>No.</th><th>Title</th><th>Create On</th><th>Posted by</th><th>Tags</th><th>Assigned To</th><th>Status</th><th>Action</th>'
            + '</tr></tbody>');
    var success = function (data) {
        window.issues = data.issues;
        window.pages = data.total_pages;
        window.current_page = data.current_page;
        displayIssuesList(window.issues);
        showPagination('issuesList');
    };
    var error = function (data) {
        console.log(data);
    };
    var url = window.ITsettings.fetch_issues_list_url;
    var data = {
        action: 'getissueslist',
        page: page
    };
    AjaxController.SendAjaxRequest(data, 'POST', 'json', url, success, error);
}

function showPagination(type) {
    $('#paginationContainer').empty();
    $('#paginationContainer').html(generatePaginationHTML(type));
}

function generatePaginationHTML(type) {
    var str = "";

    if (window.pages) {
        str = '<ul class="pagination">';
        var activeclass = "";
        for (var i = 1; i <= window.pages; i++) {
            activeclass = "";
            if (i == window.current_page) {
                activeclass = "active";
            }
            str += '<li class=' + activeclass + '><span class="paginationNumb" data-type="' + type + '" data-page="' + i + '">' + i + '</span></li>';
        }
        str += '</ul>';
    }

    return str;
}

function getIssueApiData(id) {
    window.isseuID = id;
    var success = function (data) {
        showSingleIssuePage(data);
    };
    var error = function (data) {
        console.log(data);
    };
    var url = window.ITsettings.fetch_issue_url;
    var data = {
        action: 'getissuesdata',
        id: id
    };
    AjaxController.SendAjaxRequest(data, 'POST', 'json', url, success, error);
}

function generateStatusActionButtons(status) {
    var str = "";
    if (status === 'open') {
//        str += '<button class="btn btn-default issuestatusBtns btn-sm" data-type="close">Close</button>';
        str += '<button class="btn btn-default issuestatusBtns btn-sm" data-type="assign">Assign</button>';
    }
    else if (status === 'closed') {
        str += '<button class="btn btn-default issuestatusBtns btn-sm" data-type="reopen">Reopen</button>';        
    }
    else if (status === 'reopened') {
        str += '<button class="btn btn-default issuestatusBtns btn-sm" data-type="close">Close</button>';        
    }
    else if (status === 'assigned') {
        str += '<button class="btn btn-default issuestatusBtns btn-sm" data-type="close">Close</button>';        
    }

    return str;
}

function showSingleIssuePage(data) {
    $('#singlIssueDetail').empty();
    $('#singlIssueDetail').append('  <div class="col-md-2">'
            + '<span class="isseuAuthor">' + data.author + ' </span> '
            + '<div>' + data.created_ts + '</div>'
            + '</div>'
            + '<div class="col-md-8">'
            + '<div class="issueBox">'
            + '<div class="issueDetailTitle">' + data.title + ' [' + data.status + '] <span class="pull-right">' + generateStatusActionButtons(data.status) + '</span></div>                    '
            + '<div class="issueDescription">' + data.description + '</div>'
            + '<hr/>'
            + '<div class="imageCollection">'
            + '</div>'
            + '</div>'
            + '<div class="commentsArea" id="commentsSection">'
            + '</div>'
            + '</div>');

    for (var item in data.comments) {
        item = data.comments[item];
        if (item) {
            addCommentToDom(item);
        }
    }

}

function displayIssuesList(data) {
    var count = 1;
    for (var item in data) {
        item = data[item];
        if (item) {
            addIssueToDom(item, count);
            count++;
        }
    }
    window.total_issues_count = count;
}

function getAssignToUsersList() {
    console.log('ss');
    var success = function (data) {
        window.userslist = data;
        $('.assigntolist').empty();


        $('.assigntolist').append('<option value="none">N/A </option>');

        for (var item in data) {
            item = data[item];
            if (item) {
                $('.assigntolist').append('<option value="' + item + '">' + item + ' </option>');
            }
        }
        
        sortDropdownlist('#assignee');
        sortDropdownlist('#assignee_edit');
    };
    var error = function (data) {
        console.log(data);
    };
    var url = window.ITsettings.fetch_issue_url;
    var data = {
        action: 'getuserslist'
    };
    AjaxController.SendAjaxRequest(data, 'POST', 'json', url, success, error);
}

function sortDropdownlist(ele) {
    var sel = $(ele);
    var selected = sel.val(); // cache selected value, before reordering
    var opts_list = sel.find('option');
    opts_list.sort(function (a, b) {
        return $(a).text() > $(b).text() ? 1 : -1;
    });
    sel.html('').append(opts_list);
    sel.val(selected);
}

$(document).on('click', '.editIssue', function () {
    // do something here
    var id = $(this).attr('data-id');
    openEditIssue(id);
});


$(document).on('click', '.deleteIssue', function () {
    // do something here
    var id = $(this).attr('data-id');
    if (id) {
        var r = confirm('Are you sure?');
        if (r) {
            deleteIssue(id);
        }
    }
});


$(document).on('click', '.paginationNumb', function () {
    // do something here
    var type = $(this).attr('data-type');
    var page = $(this).attr('data-page');
    if (type == 'issuesList') {
        getIssuesList(page);
    }
});


$(document).on('click', '.issuestatusBtns', function () {
    // do something here
    var type = $(this).attr('data-type');
    $('.assignToIssueID').val(window.isseuID);
    if (type === 'assign') {        
        $('#assignToPopup').modal('show');
    } else if (type === 'close') {
        $('#closePopup').modal('show');
    } else if (type == 'reopen') {
        //reopenIssue(window.isseuID);
        $('#reopenPopup').modal('show');
    }
});



$(document).on('click', '#filterBtn', function () {
    $('#filterBlock').toggle();
    if ($('#filterBlock').is(":visible")) {
        $('#filterCaret').removeClass('caret');
        $('#filterCaret').addClass('caret-up');
    } else {
        $('#filterCaret').removeClass('caret-up');
        $('#filterCaret').addClass('caret');
    }

});

$('#filterBlock').toggle();

$(document).on('click', '.issueTitle', function () {
    // do something here
    var id = $(this).attr('data-id');
    if (id) {
        var data = getIssueData(id);

        var assg = "";
        if (data.assignee) {
            assg = '<span class="pull-right">Assigned To: ' + data.assignee + '</span>';
        }

        $('#isseuTitle').html(data.title);
        $('#createdby').html('<span>Posted by: ' + data.author + '</span> ' + assg);
        $('#createdate').html(' (' + data.created_ts + ')');
        $('#issueDescription').html(data.description);
        $('#issueLink').attr('href', 'issue.php?id=' + id);

        var tags = data.tags;
        var tags_html = "";
        if (tags) {
            var tags_list = tags.split(',');
            for (var item in tags_list) {
                item = tags_list[item];
                if (item) {
                    tags_html += "<div class='issuetags'>" + item + "</div>";
                }
            }

            tags_html = 'Tags: ' + tags_html;
        }

        $('#issuedetail_statustags').html('<div class="issuestatusText"> ' + data.status + '</div> ' + tags_html);

        $('#isseuDetailPopup').modal('show');
    }
});

$(document).on('hide.bs.modal', '.modal', function () {
    console.log('popup closed');
    $('form').trigger("reset");    
});

$('select').each(function(){   
   sortDropdownlist(this);
});

window.userloggedin = 'steve';
$('.author').val(window.userloggedin);