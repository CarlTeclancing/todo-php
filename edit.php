<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id=$id";
    $result = $conn->query($sql);
    $task = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container">
    <h2>Edit Task</h2>

    <form method="post" action="index.php">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <input type="text" name="title" value="<?php echo $task['title']; ?>" required>
        <textarea name="description" required><?php echo $task['description']; ?></textarea>
        <select name="status">
            <option value="pending" <?php if($task['status'] == 'pending') echo 'selected'; ?>>Pending</option>
            <option value="completed" <?php if($task['status'] == 'completed') echo 'selected'; ?>>Completed</option>
        </select>
        <button type="submit" name="update_task">Update Task</button>
    </form>

    <a href="index.php">Back to List</a>
</div>

</body>
</html>
