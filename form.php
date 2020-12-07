<?php

// Sanitize the input of "Add a task".
function testInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = preg_replace('/[^a-z0-9 àâéèëîïôöùûüÀÂÉÈËÎÏÔÖÙÛÜ]/i', '', $data);
    $data = mb_convert_case($data, MB_CASE_LOWER, "UTF-8");
    $data = strtolower($data);
    $data = ucfirst($data);
    
    return $data;
  }

// Display the tasks to do from the json into the HTML (ToDo).
function displayTodo() {
    $jsonFileContent = file_get_contents('todo.json');
    $jsonFileContent = json_decode($jsonFileContent, true);
    foreach ($jsonFileContent as $key => $value) {
        if ($jsonFileContent[$key]["done"] == false) {
        echo '<label for="' . $value["task"] . '"><input type="checkbox" name="todo[]" value="' . $value["task"] . '">' . $value["task"] . '</label><br>';
        }
    }
}

// Display the tasks done from the json into the HTML (Archive).
function displayDone() {
    $jsonFileContent = file_get_contents('todo.json');
    $jsonFileContent = json_decode($jsonFileContent, true);
    foreach ($jsonFileContent as $key => $value) {
        if ($jsonFileContent[$key]["done"] == true) {
        echo '<del>' . $value["task"] . '</del><br>';
        }
    }
}

if ($_POST['add']){
    if (empty($_POST["addTask"])) {
        $taskError = "* Please add a task to do.";
    } else {
        $addTask = testInput($_POST["addTask"]);
        $todo = array();
        $todo["task"] = $addTask;
        $todo["done"] = false;
        $jsonFileContent = file_get_contents('todo.json');
        $jsonFileContent = json_decode($jsonFileContent, true);
        $jsonFileContent[] = $todo;
        $jsonFileContent = json_encode($jsonFileContent, JSON_PRETTY_PRINT);
        file_put_contents('todo.json', $jsonFileContent);
    }
} 
?>