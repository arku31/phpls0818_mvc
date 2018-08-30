Привет, <?=$data['username']?>

Список пользователей

<?php
foreach ($data['users'] as $user) :
?>
    <li>
        <?=$user?></li>
<?php endforeach; ?>
