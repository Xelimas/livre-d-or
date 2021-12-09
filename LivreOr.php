<?php
require_once 'class/Message.php';
require_once 'class/GuestBook.php';
$errors = null;
$success = false;
$guestbook = new GuestBook(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'messages.txt');
if (isset($_POST['pseudo'], $_POST['message'])) {
    $message = new Message($_POST['pseudo'], $_POST['message']);
    if ($message->isValid()) {
        $guestbook->addMessage($message);
        $success = true;
        $_POST = [];
    } else {
        $errors = $message->getErrors();
    }
}
$messages = $guestbook->getMessage();
require 'elements/header.php';

?>

<h2>Livre d'or</h2>
<br>
<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        Formulaire invalide
    </div>
<?php endif ?>

<?php if ($success) : ?>
    <div class="alert alert-success">
        Merci pour votre message
    </div>
<?php endif ?>
<br>
<form action="" method="POST" class="form-inline justify-content-center">
    <div class="form-group container col-md-3">
        <label class="text-center" for="exampleFormControlInput1">Votre pseudo</label>
        <input value="<?= htmlentities($_POST['pseudo'] ?? '') ?>" type="text" name="pseudo" placeholder="votre pseudo" class="form-control <?= isset($errors['pseudo']) ? 'is-invalid' : '' ?>">
        <?php if (isset($errors['pseudo'])) : ?>
            <div class="invalid-feedback"><?= $errors['pseudo'] ?></div>
        <?php endif ?>
    </div>
    <div class="form-group container col-md-5">
        <label for="exampleFormControlTextarea1">Votre message</label>
        <textarea name="message" rows="3" placeholder="votre message" class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>"><?= htmlentities($_POST['message'] ?? '') ?></textarea>
        <?php if (isset($errors['message'])) : ?>
            <div class="invalid-feedback"><?= $errors['message'] ?></div>
        <?php endif ?>

    </div>
    <br>
    <button class="btn btn-primary" type="submit">Envoyer</button>
    <br>
    <br>
    

</form>
<?php if (!empty($messages)): ?>
<h1 class="mt-4">Vos Messages</h1>

<?php foreach($messages as $message): ?>
    <?= $message->toHTML()?>
    <?php endforeach ?>
<?php endif ?>
<?php
require 'elements/footer.php';
?>