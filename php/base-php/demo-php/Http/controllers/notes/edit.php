<?php

use Core\App;
use Core\Database;
use Core\Session;

$currentUserId = Session::get('user')['id'];

$db = App::resolve(Database::class);

$note = $db->query("select * from notes where id = :id", [
    'id' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/edit.view.php', [
    'heading' => 'Create Note',
    'note' => $note,
    'errors' => [],
]);
