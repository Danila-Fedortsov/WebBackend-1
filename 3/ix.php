<?php

// Отправляем браузеру правильную кодировку,
// файл index.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=utf-8');

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    // В суперглобальном массиве $_GET PHP хранит все параметры, переданные в текущем запросе через URL.
    if (!empty($_GET['save'])){
        // Если есть параметр save, то выводим сообщение пользователю.
        print ('<div class="save has-text-info">Спасибо, данные отправлены в базу данных.</div>');
    }
    // Включаем содержимое файла form.php.
    include ('form.php');
    // Завершаем работу скрипта.
    exit();
}

// Иначе, если запрос был методом POST, т.е. нужно проверить данные и сохранить их БД.
// Проверяем ошибки.


$errors = false;

// Ошибка имени
if (empty($_POST['name'])){
    print ('Введите свое имя.<br/>');
    $errors = true;
}

// Ошибка почты
if (empty($_POST['email'])){
    print ('Введите свой email.<br>');
    $errors = true;
}

// Ошибка сверхспособностей
if (empty($_POST['powers'])){
    print ('Выберите хотя бы одну сверхспособность.<br>');
    $errors = true;

}
else {
  $powers = serialize($_POST['powers']);
}

// Ошибка биографии
if (empty($_POST['bio'])){
    print ('Введите что-нибудь о себе.<br>');
    $errors = true;
}

// Ошибка галочки
if (empty($_POST['check'])){
    print ('Вы не можете отправить форму не согласившись с контрактом.<br>');
    $errors = true;
}

// При наличии ошибок завершаем работу скрипта.
if ($errors){
    exit();
}

$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$year = intval(htmlspecialchars($_POST["year"]));
$gender = htmlspecialchars($_POST["gender"]);
$limbs = intval(htmlspecialchars($_POST["numlimbs"]));
$superPowers = $_POST["super-powers"];
$biography = htmlspecialchars($_POST["biography"]);
if (!isset($_POST["agree"])) {
	$agree = 0;
} else {
	$agree = 1;
}

$serverName = 'localhost';
$user = "u47660";
$pass = "1741794";
$dbName = $user;

$db = new PDO("mysql:host=$serverName;dbname=$dbName", $user, $pass, array(PDO::ATTR_PERSISTENT => true));

$lastId = null;
try {
	$stmt = $db->prepare("INSERT INTO user (name, email, date, gender, limbs, biography, agreement) VALUES (:name, :email, :date, :gender, :limbs, :biography, :agreement)");
	$stmt->execute(array('name' => $name, 'email' => $email, 'date' => $year, 'gender' => $gender, 'limbs' => $limbs, 'biography' => $biography, 'agreement' => $agree));
	$lastId = $db->lastInsertId();
} catch (PDOException $e) {
	print('Error : ' . $e->getMessage());
	exit();
}

try {
	if ($lastId === null) {
		exit();
	}
	foreach ($superPowers as $value) {
		$stmt = $db->prepare("INSERT INTO user_power (id, power) VALUES (:id, :power)");
		$stmt->execute(array('id' => $lastId, 'power' => $value));
	}
} catch (PDOException $e) {
	print('Error : ' . $e->getMessage());
	exit();
}
$db = null;
echo "Данные отправлены!";
