<?php
    header('Content-Type: application/json');
    $num=$_REQUEST['num'];
    $arr=[
        [
            'id'=>1111,
            'name'=>'Abdelrhman',
            'age'=>21,
        ],
        [
            'id'=>2222,
            'name'=>'Mohammad',
            'age'=>23,
        ],
        [
            'id'=>3333,
            'name'=>'Noman',
            'age'=>26,
        ],
        [
            'id'=>4444,
            'name'=>'Anas',
            'age'=>30,
        ],
    ];
    foreach($arr as $a){
        if($a['id']==$num){
            echo json_encode($a);
            exit;
        }
    }