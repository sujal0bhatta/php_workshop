<?php 
//require_once __DIR__ . '/../src/models/User.php';
require_once __DIR__ . '/../src/core/Autoloader.php';

use App\models\User;
use App\core\Database;
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
$db = Database::getInstance();
$pdo = $db->getConnection();

$sql_query = "SELECT * FROM users";
$stmt = $pdo->prepare($sql_query);
$stmt->execute();

$result = $stmt->fetchAll();
print_r($result);

$user1 = new User("Jhonthedon", "jhon@banega.don","17675752");
$user1->displayUser();

?>
    
</body>
</html>