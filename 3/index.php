<!DOCTYPE html>   

<html>
    <head>
         <title>index</title>
         <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    
<body>
<div class="main">
<div class="content">
<form id="form" action="" method="POST">
<div class="form">
    <div class="form_title">
    <h1>Обратная связь</h1>
    </div>    
<p><input type="text" name="name" placeholder="Имя" /></p>

<p><input type="email" name="email" placeholder="E-mail"/></p>

<p>Год рождения</p>
<p><input type="text" name="year" placeholder="Год" /></p>

 <p>Пол</p>
<label>М
  <input type="radio" name="gender" value="male" checked/>
  <span></span>
</label>
<label>Ж
  <input type="radio" name="gender" value="female" />
  <span></span>
</label>

<p>Количество конечностей</p>
<label>
   <input type="radio" name="numlimbs" checked value="1">
                    1
</label>
                <label>
                    <input type="radio" name="numlimbs" value="2">
                    2
                </label>
                <label>
                    <input type="radio" name="numlimbs" value="3">
                    3
                </label>
                 <label>
                    <input type="radio" name="numlimbs" value="4">
                    4
                </label>
                 
<p>Сверхспособности:</p>
<select multiple name="super-powers[]">
<option value="immortality">Бессмертие</option>
<option value="walkthrough-walls">Прохождение сквозь стены</option>
<option value="levitation">Левитация</option>
</select>
     
<p>Биография.</p>

<textarea name="biography" cols="30" rows="4" placeholder="Расскажите о себе"></textarea>

<div class="checkbox">
<p><input type="checkbox" name="agree" checked> С контрактом ознакомлен(-а).</p> 
</div>

<submit>Отправить!</submit>
</form>
</div>

</div>


</div>
</body>
</html>
