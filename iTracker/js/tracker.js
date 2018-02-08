function validateissuecreateform(form) {
    var fields = $(form).serializeArray();

    var success = function (data) {
        form.reset();
        console.log(data);
        var item=generateIssueJson(fields);
        addIssueToDom(item);
        $('#newIssuePopup').modal('hide');
    };
    var error = function (data) {
        console.log(data);
    };
    var url = window.apiurl;
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
    var url = window.apiurl;
    var data = fields;
    AjaxController.SendAjaxRequest(data, 'POST', 'json', url, success, error);

    return false;
}

function validateaddcommentform(form){
    var fields = $(form).serializeArray();

    var success = function (data) {
        form.reset();
        var json=generateIssueJson(fields);
        console.log(json);
        addCommentToDom(json);
        $('#addCommentPopup').modal('hide');
    };
    var error = function (data) {
        console.log(data);
    };
    var url = window.apiurl;
    var data = fields;
    AjaxController.SendAjaxRequest(data, 'POST', 'json', url, success, error);

    return false;
}


function addIssueToDom(item){
    console.log(item);
        if(item){
            issues.push(item);
            $('#issuesList').append('<tr> '
                    +'<td>'+item.status+' <img data-id="'+item.id+'" class="pull-right editIssue" src="images/edit_icon.png" title="edit"/> </td>'
                    +'<td><div class="issueTitle">'+item.title+'</div><div class="issueDescription">'+item.description.substr(0,40)+'</div></td>'
                    +'<td>'+item.author+'</td>'
                    +'<td>'+item.labels+'</td>'
                    +'<td>'+item.assignee+'</td>'
                    +' </tr>');
        }
}

function getIDTemp(){
    return Math.random().toString(36).substr(2, 5);
}

function generateIssueJson(data){
    var json=[];
    for(var item in data){
        item=data[item];
        if(item){
            json[item.name]=item.value;
        }
    }
    json.id=getIDTemp();
    return json;
}

function openEditIssue(id){
    var data=getIssueData(id);
    console.log(data);

    for(var item in data){
        var key=item;
        item=data[key];
        if(item){
            var edit_id=key+"_edit";
            $('#'+edit_id).val(item);
        }
    }

    $('#editIssuePopup').modal('show');
}

function getIssueData(id){
    for(var issue in issues){
        issue=issues[issue];
        if(issue){
            if(issue.id==id){
                return issue;
            }
        }
    }
}

function updateIssuesData(id,data){
    for(var issue in issues){
        var index=issue;
        issue=issues[issue];
        if(issue){
            if(issue.id==id){
                issues[index]=data;
            }
        }
    }
}

function addCommentToDom(data){
 $('#commentsSection').append('<div class="panel panel-white post panel-shadow">'
                                +'<div class="post-heading">'
                                    +'<div class="pull-left image">'
                                        +'<img src="user_1.jpg" class="img-circle avatar" alt="user profile image">'
                                    +'</div>'
                                    +'<div class="pull-left meta">'
                                        +'<div class="title h5">'
                                            +'<a href="#"><b>'+data.author+'</b></a> made a comment'

                                        +'</div>'
                                    +'</div>'
                                +'</div> '
                                +'<div class="post-description"> '
                                    +'<p>'+data.text+'</p>'
                                +'</div>'
                            +'</div>');
}


$(document).on('click', '.editIssue', function(){
    // do something here
    var id=$(this).attr('data-id');
    openEditIssue(id);
});
