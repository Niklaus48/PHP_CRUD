<?php
require_once ("DbConfig.php");

if(isset($_POST['insert'])){

    $Name = $_POST['Name'];
    $Family = $_POST['Family'];
    $Email = $_POST['Email'];
    $Phone = $_POST['PhoneNumber'];
    $Age = $_POST['Age'];

    $sql = "INSERT INTO users(Name,Family,Email,PhoneNumber,Age) values(:name,:family,:email,:phoneNumber,:age)";
    $query = $connection->prepare($sql);
    $query->bindParam(':name',$Name,PDO::PARAM_STR);
    $query->bindParam(':family',$Family,PDO::PARAM_STR);
    $query->bindParam(':email',$Email,PDO::PARAM_STR);
    $query->bindParam(':phoneNumber',$Phone,PDO::PARAM_STR);
    $query->bindParam(':age',$Age,PDO::PARAM_STR);
    $query->execute();

    echo '<script> alert("user Added Successfuly") </script>';
    echo '<script> window.location.href = "index.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHP CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <style type="text/css">

    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container border p-4 mt-4">

        <div class="row">
            <div class="col-md-12">
                <h3 class="p-4">وارد کردن اطلاعات</h3>
                <hr />
            </div>
        </div>

        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>نام</label>
                    <input type="text" class="form-control" name="Name" placeholder="مثال : علی">
                </div>
                <div class="form-group col-md-6">
                    <label>نام خانوادگی</label>
                    <input type="text" class="form-control" name="Family" placeholder="مثال : کریمی">
                </div>
            </div>
            <div class="form-group">
                <label>ایمیل</label>
                <input type="email" class="form-control" name="Email" placeholder="مثال : ali@gmail.com">
            </div>
            <div class="form-group">
                <label>شماره</label>
                <input type="text" class="form-control" name="PhoneNumber" placeholder="مثال : 0912813774">
            </div>
            <div class="form-group">
                    <label>سن</label>
                    <input type="number" class="form-control " name="Age" >
            </div>
            <button type="submit" class="btn btn-success" value="ثبت" name="insert">ثبت</button>
        </form>
    </div>
</body>
</html>