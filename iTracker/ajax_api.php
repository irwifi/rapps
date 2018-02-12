<?php

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
$limit_per_page=3;

if ($action === 'getissueslist') {
    
    $detail=getIssuesSampleList($page,$limit_per_page);
    

    echo json_encode(array('issues'=>$detail['data'],'total_pages'=>$detail['pages'],'current_page'=>$page));
    exit();
} else if ($action === 'getissuesdata') {
    $issue = array(
        'title' => 'This is a test 1',
        'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
        'author' => 'steve',
        'created_ts' => '2018-02-7 11:03:22',
        'status' => 'open',
        'assignee' => 'john',
        'tags' => 'php,frontend,sql',
        'id' => 1,
        'image_0' => 'http://www.rashflash.com/issue_tracker/images/testimg.png',
        'comments' => array(
            '0' => array(
                'author' => 'john',
                'created_ts' => '2018-02-7 13:13:41',
                'text' => 'This is a comment to test comment section'
            )
        )
    );

    echo json_encode($issue);
    exit();
}
else if($action==='getuserslist'){
    $list=array('steve','john','steven','mark');
    echo json_encode($list);
    exit();
}


echo 1;
exit();




$imagesArray = getImagesarray($issue);

function getIssuesSampleList($page,$limit){
    $issues = [];

    $issues[] = array(
        'title' => 'This is a test 1',
        'description' => 'test 1 description test 1 description test 1 description test 1 description test 1 description',
        'author' => 'steve',
        'created_ts' => '2018-02-7 11:03:22',
        'status' => 'open',
        'assignee' => 'john',
        'tags' => 'php,frontend,sql',
        'id' => 1
    );

    $issues[] = array(
        'title' => '7 DEADLY SINS of a CRYPTO TRADER',
        'description' => 'test 2 description test 2 description test 2 description test 2 description test 2 description test 2 description',
        'author' => 'steve',
        'created_ts' => '2018-02-7 11:03:22',
        'status' => 'open',
        'assignee' => 'steven',
        'tags' => 'sql',
        'id' => 2
    );

    $issues[] = array(
        'title' => 'Test three issue created',
        'description' => 'test hellow world description test hellow world description test hellow world description test hellow world description test hellow world description',
        'author' => 'john',
        'created_ts' => '2018-02-7 11:03:22',
        'status' => 'closed',
        'assignee' => 'steve',
        'tags' => 'sql',
        'id' => 3
    );
    $issues[] = array(
        'title' => 'Test three issue created p2',
        'description' => 'test hellow world description test hellow world description test hellow world description test hellow world description test hellow world description',
        'author' => 'john',
        'created_ts' => '2018-02-7 11:03:22',
        'status' => 'closed',
        'assignee' => 'steve',
        'tags' => 'sql',
        'id' => 3
    );
    $issues[] = array(
        'title' => 'Test three issue created',
        'description' => 'test hellow world description test hellow world description test hellow world description test hellow world description test hellow world description',
        'author' => 'john',
        'created_ts' => '2018-02-7 11:03:22',
        'status' => 'open',
        'assignee' => 'steve',
        'tags' => 'sql',
        'id' => 3
    );
    $issues[] = array(
        'title' => 'Test three issue created',
        'description' => 'test hellow world description test hellow world description test hellow world description test hellow world description test hellow world description',
        'author' => 'john',
        'created_ts' => '2018-02-7 11:03:22',
        'status' => 'closed',
        'assignee' => 'steve',
        'tags' => 'sql',
        'id' => 3
    );
    $issues[] = array(
        'title' => 'Test three issue created p3',
        'description' => 'test hellow world description test hellow world description test hellow world description test hellow world description test hellow world description',
        'author' => 'john',
        'created_ts' => '2018-02-7 11:03:22',
        'status' => 'open',
        'assignee' => 'steve',
        'tags' => 'sql',
        'id' => 3
    );
    $issues[] = array(
        'title' => 'Test three issue created',
        'description' => 'test hellow world description test hellow world description test hellow world description test hellow world description test hellow world description',
        'author' => 'john',
        'created_ts' => '2018-02-7 11:03:22',
        'status' => 'closed',
        'assignee' => 'steve',
        'tags' => 'sql',
        'id' => 3
    );
    $issues[] = array(
        'title' => 'Test three issue created',
        'description' => 'test hellow world description test hellow world description test hellow world description test hellow world description test hellow world description',
        'author' => 'john',
        'created_ts' => '2018-02-7 11:03:22',
        'status' => 'open',
        'assignee' => 'steve',
        'tags' => 'sql',
        'id' => 3
    );
    $issues[] = array(
        'title' => 'Test three issue created p4',
        'description' => 'test hellow world description test hellow world description test hellow world description test hellow world description test hellow world description',
        'author' => 'john',
        'created_ts' => '2018-02-7 11:03:22',
        'status' => 'open',
        'assignee' => 'steve',
        'tags' => 'sql',
        'id' => 3
    );
    
    
    $st_index=($limit*$page)-$limit;
    $end_index=$limit;
        
    $data=array_slice($issues,$st_index,$end_index);

    $total_rows=count($issues);
    $total_pages=  ceil($total_rows/$limit);
    
    return array('pages'=>$total_pages,'data'=>$data);
}

function getImagesarray($data) {
    $arr_result = NULL;
    foreach ($data as $key => $value) {
        $exp_key = explode('_', $key);
        if ($exp_key[0] == 'image') {
            $arr_result[] = $value;
        }
    }
    return $arr_result;
}
