<?php

$conn = require_once "connection.php";

$notes = $conn->getNotes();
$currentNote = [
    'id' => '',
    'title' => '',
    'description' => '',
];
if (isset($_GET["id"])) {
    $currentNote = $conn->getNoteById($_GET["id"]);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>notes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div>
    <form class="new-note" action="save.php" method="post">
        <input type="hidden" name="id" value="<?= $currentNote['id']; ?>">
        <input type="text" name="title" placeholder="Note title" autocomplete="off"
               value="<?= $currentNote['title']; ?>">
        <textarea name="description" cols="30" rows="4"
                  placeholder="Note Description"><?= $currentNote['description']; ?></textarea>
        <button>
            <?php if ($currentNote['id']): ?>
                Update Note
            <?php else: ?>
                New note
            <?php endif; ?>
        </button>
    </form>
    <div class="notes">
        <?php foreach ($notes as $note): ?>
            <div class="note">
                <div class="title">
                    <a href="?id=<?= $note['id']; ?>"><?= $note['title']; ?></a>
                </div>
                <div class="description">
                    <?= $note['description']; ?>
                </div>
                <small><?= $note['created_at']; ?></small>
                <form action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?= $note['id']; ?>">
                    <button class="close">X</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>