<?php
print_r($_POST);
if ($_POST['archive']){
    $jsonFileContent = file_get_contents("todo.json");
    $jsonFileContent = json_decode($jsonFileContent, true);
    $checked = $_POST["todo"];
    for ($i = 0; $i < count($jsonFileContent); $i++){
        if (in_array($jsonFileContent[$i]["task"],$checked)){
        $jsonFileContent[$i]["done"] = true;
        }
    }
    $jsonFileContent = json_encode($jsonFileContent, JSON_PRETTY_PRINT);
    file_put_contents('todo.json', $jsonFileContent);
}
?>