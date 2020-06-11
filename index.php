<?php
//check if user coming from request
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Assign variables
    $name =filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $message =filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone =filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    $message =filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $formErrors = array();
    if (strlen($name) <= 3){
        $formErrors[] = "name must be larger than <strong>3</strong> characters";
    }
    if(strlen($message) < 10){
        $formErrors[] = "message can't be less than <strong>10</strong> characters";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- start form -->
    <div class="container">
        <h1 class="text-center">contact me</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <?php if(! empty($formErrors)){ ?>
                <div class="alert alert-danger alert-dismissible" role="start">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            <?php
                foreach($formErrors as $error){
                        echo $error . "</br>";
                    }
                    ?>
                    </div>
               <?php } ?>
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="type your name"
                value="<?php if(isset($name)){echo $name;} ?>">
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                    name must be larger than <strong>3</strong> characters
                </div>
            </div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="type your email"
                value="<?php if(isset($email)){echo $email;} ?>">
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                    Email can't be <strong>empty</strong>
                </div>
            </div>
            <input class="form-control" type="text" name="phone" placeholder="type your phone"
            value="<?php if(isset($phone)){echo $phone;} ?>">
            <textarea class="form-control" name="message" placeholder="your message!"
            value="<?php if(isset($message)){echo $message;} ?>"></textarea>
            <div class="alert alert-danger custom-alert">
                message can't be less than <strong>10</strong> characters
            </div>
            <input class="btn btn-success btn-block" type="submit" value="send message">
        </form>
    </div>    
    <!-- End form -->



    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/file.js"></script>
</body>
</html>