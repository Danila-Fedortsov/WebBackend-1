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
   <input type="radio" name="count" checked value="1">
                    1
</label>
                <label>
                    <input type="radio" name="count" value="2">
                    2
                </label>
                <label>
                    <input type="radio" name="count" value="3">
                    3
                </label>
                 <label>
                    <input type="radio" name="count" value="4">
                    4
                </label>
                 
<p>Сверхспособности:</p>
<select id="form-select" multiple size="3" name="powers[]">
<option value="immortality">Бессмертие</option>
<option value="levitation">Левитация</option>
<option value="walls-walking">Хождение сквозь стены</option>
</select>
     
<p>Биография.</p>

<textarea name="bio" cols="30" rows="4" placeholder="Расскажите о себе"></textarea>

<div class="checkbox">
<p><input type="checkbox" name="check" checked> С контрактом ознакомлен(-а).</p> 
</div>

<button>Отправить!</button>
</form>
</div>

</div>


</div>
</body>
</html>
