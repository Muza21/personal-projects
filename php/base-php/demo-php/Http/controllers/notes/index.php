<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);
$currentUserId = Session::get('user')['id'];
$notes = $db->query("select * from notes where user_id = :user", ['user' => $currentUserId])->get();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes,
]);
