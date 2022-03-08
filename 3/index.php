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

// Сохранение в базу данных.
$user = 'u20982'; // Логин от БД
$pass = '3345940'; // Пароль от БД

// Создаем класс подключения к БД
$db = new PDO('mysql:host=localhost;dbname=u20982', $user, $pass, array(
    PDO::ATTR_PERSISTENT => true
));

// Подготовленный запрос. Не именованные метки.
try{
    $stmt = $db->prepare("INSERT INTO table1 SET name = ?, email = ?, year = ?, gender = ?, count = ?, powers = ?, bio = ?");
    $stmt->execute(array(
        $_POST['name'],
        $_POST['email'],
        $_POST['year'],
        $_POST['gender'],
        $_POST['count'],
        $powers,
        $_POST['bio'],
    ));
}
catch(PDOException $e){
    // При возникновении ошибки отправления в БД, выводим информацию
    print ('Ошибка: ' . $e->getMessage());
    exit();
}

// Делаем перенаправление.
// Если запись не сохраняется, но ошибок не видно, то можно закомментировать эту строку чтобы увидеть ошибку.
// Если ошибок при этом не видно, то необходимо настроить параметр display_errors для PHP.
header('Location: ?save=1');
