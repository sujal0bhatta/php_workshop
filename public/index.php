<?php 
require_once __DIR__ . '/../src/models/User.php';
use App\models\User as U
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP1</title>
</head>
<body>

<?php
$user1 = new U("Jhonthedon", "jhon@banega.don","17675752");
$user1->displayUser();


?>
    
</body>
</html>