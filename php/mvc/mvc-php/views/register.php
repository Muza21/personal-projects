<?php

/** @var $model \App\Models\User; */
?>

<h1>Create an account</h1>
<?php $form =  \laramz\mvcphp\Form\Form::begin('', 'post') ?>
<?php echo $form->field($model, 'firstname');  ?>
<?php echo $form->field($model, 'lastname');  ?>
<?php echo $form->field($model, 'email');  ?>
<?php echo $form->field($model, 'password')->passwordField();  ?>
<?php echo $form->field($model, 'confirmPassword')->passwordField();  ?>
<button type="submit" class="btn btn-primary">Submit</button>

<?php \laramz\mvcphp\Form\Form::end(); ?>