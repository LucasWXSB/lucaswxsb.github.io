<?
$data =array(
'request'=>'success',

'msg'=>'35235'

);

$data_json = json_encode($data);

header('Content-type:text/json');

echo $data_json;