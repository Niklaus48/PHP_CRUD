<?php
require_once 'DbConfig.php';

if (isset($_POST['update'])){
    $userId = intval($_GET['id']);
    $Name = $_POST['Name'];
    $Family = $_POST['Family'];
    $Email = $_POST['Email'];
    $Phone = $_POST['PhoneNumber'];
    $Age = $_POST['Age'];


    $sql = "UPDATE users SET Name=:name,Family=:family,Email=:email,PhoneNumber=:phoneNumber,Age=:age WHERE Id=:id";
    $query = $connection->prepare($sql);
    $query->bindParam(':name',$Name,PDO::PARAM_STR);
    $query->bindParam(':family',$Family,PDO::PARAM_STR);
    $query->bindParam(':email',$Email,PDO::PARAM_STR);
    $query->bindParam(':phoneNumber',$Phone,PDO::PARAM_STR);
    $query->bindParam(':age',$Age,PDO::PARAM_STR);
    $query->bindParam(':id',$userId,PDO::PARAM_STR);
    $query->execute();

    echo '<script> alert("user Edited Successfuly") </script>';
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container border p-4 mt-4">

        <div class="row">
            <div class="col-md-12">
                <h3 class="p-4">ویرایش اطلاعات</h3>
                <hr />
            </div>
        </div>
        <?php
        $id = intval($_GET['id']);
        $sql = "SELECT *From users WHERE Id=:Id";
        $query = $connection->prepare($sql);
        $query->bindParam(':Id',$id,PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();
        ?>

        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>نام</label>
                    <input type="text" class="form-control" name="Name" value="<?php echo htmlentities($result['Name'])?>">
                </div>
                <div class="form-group col-md-6">
                    <label>نام خانوادگی</label>
                    <input type="text" class="form-control" name="Family" value="<?php echo htmlentities($result['Family'])?>">
                </div>
            </div>
            <div class="form-group">
                <label>ایمیل</label>
                <input type="email" class="form-control" name="Email" value="<?php echo htmlentities($result['Email'])?>">
            </div>
            <div class="form-group">
                <label>شماره</label>
                <input type="number" class="form-control" name="PhoneNumber" value="<?php echo htmlentities($result['PhoneNumber'])?>">
            </div>
            <div class="form-group">
                <div class="form-group col-md-6">
                    <label>سن</label>
                    <input type="number" class="form-control" name="Age" value="<?php echo htmlentities($result['Age'])?>">

                </div>
            </div>
            <button type="submit" class="btn btn-warning" name="update">ویرایش</button>

        </form>


    </div>
</body>
</html>