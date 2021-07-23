<?php
require_once 'connect.php';//style="width:400px; margin-left: auto; margin-right: auto;"
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Контакты</title>
</head>
<body style="background-color: #C8DBFE;">
    <form >
        <div class="container-fluid col-3" id="table">
            <div class="table1">
                <div style="padding-top: 20px; font-size: 16pt;">Добавить контакт</div>
            </div>
                <hr style="width: 100%; border: none; height: 2px; color: #C8DBFE; margin-bottom: 25px;">
            <div class="table1">
                <div class="mb-3" >
                    <input type="text" name="ourName" class="exampleName form-control" id="exampleName" placeholder="Имя" required>
                </div>
                <div class="mb-4">
                    <input type="text" name="ourTel" class="exampleTel form-control" id="exampleTel" placeholder="Телефон" required>
                </div>

                <div>
                    <button type="submit" onclick="add()" class="btn btn-primary btn-lg" style="float: right;">Добавить</button>
                </div>
                <script>
                    function add(){
                        $(document).ready(function (){
                            var ourNamevalue = $('input.exampleName').val();
                            var ourTelvalue = $('input.exampleTel').val();

                            $.ajax({
                                method: "POST",
                                url: "todb.php",
                                data: {ourName:ourNamevalue, ourTel:ourTelvalue}
                            })
                        });
                    }
                </script>
            </div>
        </div>
    </form>
    <form>
    <div class="container-fluid col-3" id="table2">
        <div class="table1" >
            <div style="padding-top: 20px; font-size: 16pt;">Список контактов</div>
        </div>

        <?php
        $query = "SELECT * FROM `contacts`";
        $contacts = mysqli_query($conn, $query);
        $contacts = mysqli_fetch_all($contacts);
        $k = 1;
        foreach($contacts as $contact){
            $name = $k;
            ?>
            <hr style="width: 100%; border: none; height: 2px; color: #C8DBFE; margin-bottom: 20px; margin-top:8px;">

        <div class="table1">
            <div id="<?php echo 'Row'.$name ?>" style="float: left;">
               <?php echo $contact[1] ?>
            </div>
            <button type="submit" onclick="deletefrom('<?php echo $name ?>')" class="btn"><i style="color:blue; position: relative;left: -10px;top:-7px;" class="fa fa-close"></i></button>
            <div style="position: relative;top:-15px;">
               <?php echo $contact[2] ?>
            </div>
        </div>
        <?php
            $k += 1;
        }
        ?>
        <script>
            function deletefrom(number){
                $(document).ready(function (){
                    var getName = $('#Row'+number).html();
                    getName = getName.trim();
                    $.ajax({
                        method: "POST",
                        url: "delete.php",
                        data: {ourName:getName}
                    })
                });
            }
        </script>
        <div style="padding-bottom: 15px;"></div>
    </div>
        </form>
    <div style="height:100px"></div>
</body>
</html>