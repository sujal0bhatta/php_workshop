<?php

require_once __DIR__ . "/../src/core/Autoloader.php";

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

$newUserId = User::create(
    "test007",
    "test@vao.com",
    "husj79"
);

echo "<p>Inserted user ID: {$newUserId}</p>";

$db = Database::getInstance();
$pdo = $db->getConnection();

$sqlQuery = "SELECT * FROM users";

$stmt = $pdo->prepare($sqlQuery);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<br>";
print_r($result);
echo "</br>";

$user1 = new User(
    "Jhonthedon",
    "jhon@banega.don",
    "17675752"
);

$user1->displayUser();

?>

</body>
</html>