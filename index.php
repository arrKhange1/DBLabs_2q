<!DOCTYPE html>
<html>
    <head>
        <title> Lab 3 Page </title>
        <link rel="stylesheet" type="text/css" href="lab3.css">
    </head>
    <body>
        <div class= "main">
            <div class= "container">
                <form method= "POST" action= "index.php" class="buttons">
                    <input type='submit' name='name' value="Запрос 1" class = 'buttons_butt' />
                    <input type='submit' name='name' value="Запрос 2" class = 'buttons_butt' />
                    <input type='submit' name='name' value="Запрос 3" class = 'buttons_butt' />
                    <input type='submit' name='name' value="Вывод БД" class = 'buttons_butt' />
                </form>
                
                <div class="result">
                    
                    <?php
                        
                        $connection = mysqli_connect('127.0.0.1', 'root', '', 'lab2');
                        if (!$connection)
                        {
                            echo "Error!\n";
                        }
                        
                        if ($_POST['name'] == 'Вывод БД')
                        {
                            $result = mysqli_query($connection, "SELECT * FROM employees");
                            echo '<table align="center" border="3" cellpadding="5" cellspacing="1">
                            <caption>Полная База Данных</caption>
                            <tr align="center" >
                            <th> ID </th>
                            <th>Фамилия</th> 
                            <th>Телефон</th>
                            <th>Зарплата</th>
                            <th>Адрес</th>
                            <th>Стаж</th>
                            </tr>
                            '; 
                            while ($record = mysqli_fetch_assoc($result))
                            {
                            
                                echo
                                '<tr align="center" >
                                <td>' . $record['id_empl'] .
                                '<td>' . $record['name_empl'] .
                                '<td>' . $record['phone_empl'] .
                                '<td>' . $record['salary_empl'] .
                                '<td>' . $record['address_empl'] .
                                '<td>' . $record['exp_empl'] . 
                                '</tr>';
                            }
                            echo '</table>';
                            
                        }
                        else if ($_POST['name'] == 'Запрос 3')
                        {
                            $result = mysqli_query($connection, "SELECT id_empl, name_empl, exp_empl FROM employees WHERE exp_empl > 4");
                            echo '<table align="center" border="3" cellpadding="5" cellspacing="1">
                            <caption>Сотрудники, стаж которых БОЛЕЕ 4 лет</caption>
                            <tr align="center" >
                            <th> ID </th>
                            <th>Фамилия</th> 
                            <th>Стаж</th>
                            </tr>
                            '; 
                            while ($record = mysqli_fetch_assoc($result))
                            {
                            
                                echo
                                '<tr align="center">
                                <td>' . $record['id_empl'] .
                                '<td>' . $record['name_empl'] .
                                '<td>' . $record['exp_empl'] . 
                                '</tr>';
                            }
                            echo '</table>';
                        }
                        else if ($_POST['name'] == 'Запрос 2')
                        {
                            $result = mysqli_query($connection, "SELECT id_empl, name_empl, address_empl FROM employees ORDER BY address_empl");
                            echo '<table align="center" border="3" cellpadding="5" cellspacing="1" >
                            <caption>Сотрудники и их адреса по возрастанию</caption>
                            <tr align="center" >
                            <th> ID </th>
                            <th>Фамилия</th> 
                            <th>Адрес</th>
                            </tr>
                            '; 
                            while ($record = mysqli_fetch_assoc($result))
                            {
                                echo
                                '<tr align="center" >
                                <td>' . $record['id_empl'] .
                                '<td>' . $record['name_empl'] .
                                '<td>' . $record['address_empl'] . 
                                '</tr>';
                            }
                            echo '</table>';
                        }
                        else if ($_POST['name'] == 'Запрос 1')
                        {
                            $result = mysqli_query($connection, "SELECT id_empl, name_empl, phone_empl, salary_empl FROM employees");
                            echo '<table align="center" border="3" cellpadding="5" cellspacing="1" >
                            <caption>Сотрудники, их телефоны и ЗП</caption>
                            <tr align="center" >
                            <th> ID </th>
                            <th>Фамилия</th> 
                            <th>Телефон</th>
                            <th>Зарплата</th>
                            </tr>
                            '; 
                            while ($record = mysqli_fetch_assoc($result))
                            {
                                echo
                                '<tr align="center" >
                                <td>' . $record['id_empl'] .
                                '<td>' . $record['name_empl'] .
                                '<td>' . $record['phone_empl'] .
                                '<td>' . $record['salary_empl'] . 
                                '</tr>';
                            }
                            echo '</table>';
                        }
                        

                        
                    ?>
                </div>
            </div>
        </div>
    
        
    </body>
</html>