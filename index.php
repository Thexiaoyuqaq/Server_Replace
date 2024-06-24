<?php
$serverName = isset($_REQUEST['server_name']) ? $_REQUEST['server_name'] : null;

if (empty($serverName)) {
    $response = json_encode(array("code" => 400, "message" => "缺少参数"));
    http_response_code(400);
    header('Content-Type: application/json; charset=UTF-8');
    echo $response;
    exit;
}

$serverGroups = array(
    "servers" => array(
        "new-lobby-1" => "主大厅#1",
        "new-lobby-2" => "主大厅#2",
        "login" => "登入大厅",
        "minihub-1" => "街机大厅",
    )
);

if (isset($serverGroups['servers'][$serverName])) {
    $serverNameResult = $serverGroups['servers'][$serverName];
    $response = json_encode(array("code" => 200, "name" => $serverNameResult, "message" => "获取成功"));
    http_response_code(200);
} else {
    $response = json_encode(array("code" => 404, "message" => "未知服务器"));
    http_response_code(404);
}

header('Content-Type: application/json; charset=UTF-8');
echo $response;
?>
