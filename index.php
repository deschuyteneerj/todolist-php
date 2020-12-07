<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="todo">
    <meta name="keywords" content="HTML, PHP">
    <meta name="author" content="Jonathan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoList</title>
</head>
<body>
<?php include("form.php");?>
<?php include("content.php");?>
    <section class="page">
        <form class="archive" action="index.php" method="post">
            <h1>To do list</h1>
            <h2>ToDo</h2>
            <?php displayTodo(); ?>
            <br />
            <input class="button" type="submit" name="archive" value="Archive">
            <h2>Archive</h2>
            <?php displayDone(); ?>
        </form>
        <form class="add" action="index.php" method="post">
            <h2>Add a task</h2>
            <input type="text" name="addTask"><br />
            <span class="error"><?php echo $taskError; ?></span>
            <br />
            <input class="button" type="submit" name="add" value="Add"><br />
        </form>
    </section>
</body>
</html>