<?php

$id = $_GET['id'];
print($id . PHP_EOL);
if ($id > 10)
{
    echo "id больше 10";
}
else
{
    echo "id меньше или равно 10";
}

?>