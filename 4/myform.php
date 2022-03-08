<html lang="ru">
<head>
    <title>Задание 4</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>


<!DOCTYPE html>

<html>
<head>
    <title>form</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div class="main">
    <div class="content">
        <form id="form" action="" method="POST">
            <?php
            //Проходим по массиву messages и выводим все сообщения
            if (!empty($messages)) {
                print('<div id="messages">');
                // Выводим все сообщения.
                foreach ($messages as $message) {
                    print($message);
                }
                print('</div>');
            }

            // Далее выводим форму отмечая элементы с ошибками классом error
            // и задавая начальные значения элементов ранее сохраненными.
            ?>
            <div class="form">
                <div class="form_title">
                    <h1>Обратная связь</h1>
                </div>
                <label for="nameInput">Имя </label>
                <p><input id="nameInput" type="text" name="name" placeholder="Имя" <?php if ($errors['name']) {print 'class="error"';} ?> value="<?php print $values['name']; ?>" /></p>

                <label for="emailInput">Почта </label>
                <p><input id="emailInput" type="email" name="email" placeholder="E-mail"<?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print $values['email']; ?>" />
                </p>

                <label for="selectInput">Год рождения</label>
                <select name="years">
                    <?php
                    // Пробегаем от 2021 до 1965 и вставляем option
                    for ($i = 2021; $i > 1991; $i--) {
                        print('<option value="'.$i.'" ');
                        // Если в values стоит текущий год, то выбираем его
                        if ($values['years'] == $i) print('selected ');
                        print('>'.$i.'</option> ');
                    }
                    ?>
                </select>

                <p>Пол</p>
                <label>М
                    <input type="radio" name="gender" value="male" <?php if ($values['gender'] == 'male') print("checked"); ?> >
                    <span></span>
                </label>
                <label>Ж
                    <input type="radio" name="gender" value="female" <?php if ($values['gender'] == 'female') print("checked"); ?> >
                    <span></span>
                </label>

                <p>Количество конечностей</p>
                <label>1
                    <input type="radio" name="count" value="1" <?php if ($values['count'] == 1) print("checked"); ?> >
                    <span></span>
                </label>
                <label>2
                    <input type="radio" name="count" value="2" <?php if ($values['count'] == 2) print("checked"); ?> >
                    <span></span>
                </label>
                <label>3
                    <input type="radio" name="count" value="3" <?php if ($values['count'] == 3) print("checked"); ?> >
                    <span></span>
                </label>

                <p for="powersSelect">Суперспособности</p>
                <select id="powersSelect" <?php if ($errors['powers']) {print 'class="error"';} ?> name="powers[]" multiple size="4">
                    <?php
                    // Данный код я взял у Синицы с лекции
                    // Бежим по массиву powers, в который мы записали суперспособности
                    // Где key это ключ, а value это значение по этому ключу
                    foreach ($powers as $key => $value) {
                        // Создаем переменную selected, которая равна пустой строке, если
                        // в values по текущему ключу пустой, иначе она равна selected="selected"
                        $selected = empty($values['powers'][$key]) ? '' : ' selected="selected" ';
                        // Вставляем option с данными значениями
                        printf('<option value="%s",%s>%s</option>', $key, $selected, $value);
                    }
                    ?>
                </select>

                <p>Биография.</p>

                <textarea id="bioArea" name="bio" placeholder="Расскажите что-нибудь о себе..." <?php if ($errors['bio']) {print 'class="error"';} ?>><?php print $values['bio']; ?></textarea>

                <!-- Чекбокс -->
                <label <?php if ($errors['check']) {print 'class="error"';} ?>><input type="checkbox" name="check" value="ok"> С контрактом ознакомлен(а)</label>

                <!-- Кнопка -->
                <input type="submit" value="Отправить" />
        </form>
    </div>

</div>


</div>
</body>
</html>
