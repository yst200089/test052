<?php
header('Content-Type: application/json; charset=UTF-8');
$AllData = array();
if (file_exists("edu.txt")) {
    $ff = fopen("edu.txt", "r");
    while ($line = fgets($ff)) {
        $convert = mb_convert_encoding($line,"utf-8","big5");
        $con = str_replace('"','', $convert);
        $data = explode(",", $con);
        $m = $data[3].$data[4].$data[5].$data[6];
        $data[3] = $m;
        while (count($data) > 4) {
            array_pop($data);
        }
        if(count($AllData) == 0) {
            $data[4] = "公私立";
            array_push($AllData, array("category"=> $data[0], "code" => $data[1], "name" => $data[2], "money" => $data[3], "type" => $data[4]));
        } else {
            if (strpos($data[2], "國立") !== false) {
                $data[4] = "公立";
            } else {
                $data[4] = "私立";
            }
            array_push($AllData, array("category"=> $data[0], "code" => $data[1], "name" => $data[2], "money" => $data[3], "type" => $data[4]));
        }
    }
    fclose($ff);
}
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if ($_GET["code"] == "") {
        FindAns($AllData);
    } else {
        FindCode($AllData);
    }
}
function FindAns($AllData) {
    $result = FindCategory($AllData);
    $result1 = FindP($result);
    echo json_encode($result1);
}
function FindCategory($AllData) {
    $result = array();
    if ($_GET["category"] == 1) {
        array_push($result, $AllData[0]);
        for ($i = 1; $i < count($AllData); $i++) {
            if ($AllData[$i]["category"] == "一般大學") {
                array_push($result, $AllData[$i]);
            }
        }
    } else if ($_GET["category"] == 2) {
        array_push($result, $AllData[0]);
        for ($i = 1; $i < count($AllData); $i++) {
            if ($AllData[$i]["category"] == "技專校院") {
                array_push($result, $AllData[$i]);
            }
        }
    } else {
        $result = $AllData;
    }
    return $result;
}
function FindP($AllData) {
    $result = array();
    if ($_GET["P"] == 1) {
        array_push($result, $AllData[0]);
        for ($i = 1; $i < count($AllData); $i++) {
            if ($AllData[$i]["type"] == "公立") {
                array_push($result, $AllData[$i]);
            }
        }
    } else if ($_GET["P"] == 2) {
        array_push($result, $AllData[0]);
        for ($i = 1; $i < count($AllData); $i++) {
            if ($AllData[$i]["type"] == "私立") {
                array_push($result, $AllData[$i]);
            }
        }
    } else {
        $result = $AllData;
    }
    return $result;
}
function FindCode($AllData) {
    $result = array();
    array_push($result, $AllData[0]);
    for ($i = 1;$i < count($AllData); $i++) {
        if ($_GET["code"] == $AllData[$i]["code"]) {
            array_push($result, $AllData[$i]);
        }
    }
    echo json_encode($result);
}
?>