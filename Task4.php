<?php
function Clean($input)
{

    $input = trim($input);
    $input = strip_tags($input);
    $input = stripslashes($input);   

    return $input;

    

}

 
    if (empty($name)) {

        $errors['Name']  = "Required";
    }

     
    if (empty($email)) {
        $errors['Email']  = "Required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['Email']  = "Invalid Email";
    }


    
    if (empty($password)) {

        $errors['Password']  = "Required";
    } elseif (strlen($password) < 6) {
        $errors['Password']  = "Length must Be >= 6 chars";
    }

    if(empty($address)){
        $errors['address'] = "Required";
    }elseif(strlen($address) < 10){
        $errors['address'] = "Length Must be >= 10 chars";
    }

    if (empty($url)) {
        $errors['url']  = "Required";
    } elseif (!filter_var($url, FILTER_VALIDATE_URL)) {
        $errors['url']  = "Invalid URL";
    }


    if(empty($gender)){
        $errors['gender'] = "Required"; 
      }
    

      if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
        if (!empty($_FILES['image']['name'])) {
    
            $name    = $_FILES['image']['name'];
            $temPath = $_FILES['image']['tmp_name'];
            $size    = $_FILES['image']['size'];
            $type    = $_FILES['image']['type'];
    
            $typesInfo  =  explode('/', $type);    
            $extension  =  strtolower( end($typesInfo));      
    
    
    
            $allowedExtension = ['png', 'jpeg', 'jpg'];  
    
    
            if (in_array($extension, $allowedExtension)) {
    
                
                $FinalName = time() . rand() . '.' . $extension;
    
                $disPath = 'uploads/' . $FinalName;
    
                if (move_uploaded_file($temPath, $disPath)) {
    
                    echo 'Image Uploaded';
                } else {
                    echo 'Error Try Again';
                }
            } else {
                echo 'InValid Extension';
            }
        } else {
            echo 'Image Required';
        }
    }
    



?>






<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Register</h2>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="exampleInputadderss"> address</label>
                <input type="text" class="form-control" id="exampleInputadderss" aria-describedby="emailHelp" name="address" placeholder="Enter address">
            </div>

            <div class="form-group">
                <label for="exampleInputadderss"> linkedin url</label>
                <input type="text" class="form-control" id="exampleInputadderss" aria-describedby="emailHelp" name=" url" placeholder="Enter linkedin url">
            </div>


            <div class="form-group">
                <label for="exampleInputgender"> Gender </label>
                <input type="text" class="form-control" id="exampleInputgender" aria-describedby="gender" name="gender" placeholder="Enter gender">
            </div>


            <div class="container">
        <h2>Upload</h2>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">Image</label>
                <input type="file" name="image">
            </div>
            
            
            
            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
        

        

    </div>



    <br>


    <a href="action.php?id=2013&name=RootAccount ">GO !!</a>


</body>

</html>
