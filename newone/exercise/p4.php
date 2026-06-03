<?php
$name = strlen($_POST['name']);
$surname = isset($_POST['surname']);
$terms = empty($_POST['terms']);
if ($name > 3 && $surname && !$terms)
{
    echo "Prawidłowe informacje. Brawo!";
}
else
{
    echo "No cośtu mi się nie zgadza";
};
?>
<form action='../index.php'>
    <button>Return</button>
</form>