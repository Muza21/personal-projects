<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = Session::get('user')['id'];
$errors = [];


if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'body that is no more than 1,000 characters is required';
}

if (!empty($errors)) {
    return view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors,
    ]);
}

$db->query("insert into notes (body, user_id) values (:body, :user)", [
    'body' => $_POST['body'],
    'user' => $currentUserId
]);

redirect('/notes');
