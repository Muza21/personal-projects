<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$currentUserId = Session::get('user')['id'];

$db = App::resolve(Database::class);

$note = $db->query("select * from notes where id = :id", [
    'id' => $_POST['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'body that is no more than 1,000 characters is required';
}

if (count($errors)) {
    view('notes/edit.view.php', [
        'heading' => 'Create Note',
        'note' => $note,
        'errors' => $errors,
    ]);
}

$db->query("update notes set body = :body where id = :id", [
    'id' => $_POST['id'],
    'body' => $_POST['body'],
]);

header('location: /notes');
die();
