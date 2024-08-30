<?php

/** @var $this \laramz\mvcphp\View */
/** @var $model \App\Model\ContactForm */

use laramz\mvcphp\Form\TextAreaField;

$this->title = 'Contact';
?>
<h1>Contact</h1>

<?php $form = \laramz\mvcphp\Form\Form::begin('', 'post'); ?>
<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo new TextAreaField($model, 'body'); ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php \laramz\mvcphp\Form\Form::end(); ?>