    <i><span style="font-style:italic;"><span style="font-style:italic;"><span style="font-style:italic;"><span style="font-style:italic;"><span style="font-style:italic;"><?php
    ob_start(); // ensures anything dumped out will be caught

       $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password,"digixforce");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected successfully";

    $email=$_POST["email"];
    $pass=$_POST["pass"];
    //echo $email;
    //echo $pass;

          $sql = "SELECT id FROM registration WHERE email = '$email' and password = '$pass'";
          $result = mysqli_query($conn,$sql);

        $rows = mysqli_num_rows($result);
    //echo "Rows: " ; echo $rows;
            if($rows==1){
    //            echo "Login Success"
    //                ob_start(); // ensures anything dumped out will be caught
                 $sql = "SELECT status FROM registration WHERE email = '$email' and password = '$pass' LIMIT 1";
                $result = mysqli_query($conn,$sql);
                 $value = mysqli_fetch_object($result);
//                echo $value->status;
                if($value->status == 'paid') {
                    echo "Paid - Thank You";
                    
                } else { 

                // Chek if user exist

                    echo "Unpaid. Please Contact US!!!";
                    // do stuff here
        $url = 'contact.html'; // this can be set based on whatever

        // clear out the output buffer
        while (ob_get_status()) 
        {
            ob_end_clean();
        }

    // no redirect
    header( "Location: $url" );
                }
   
        } else {
                $error = "username/password incorrect";
//                echo "Fail to login - Verify your Username or password!!!";
                $failed=$_GET["failes-login"];
                $_SESSION["error"]=$error ;
                $url = "index.html";
header( "Location: $url" );
               }
    ?>