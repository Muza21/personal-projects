<?php

use Core\App;
use Core\Database;
use Core\Session;

$currentUserId = Session::get('user')['id'];

$db = App::resolve(Database::class);

$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
    'heading' => 'My Note',
    'note' => $note,
]);
