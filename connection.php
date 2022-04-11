<?php

    $connection = mysqli_connect("localhost","root","","demo");

    if(isset($_POST['submit']))
    {
        $file = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        
        //variables for biodata section
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        
        //variables for social link section
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $instagram = $_POST['instagram'];
        $linkedin = $_POST['linkedin'];

        // //variables for social link section
        $objective = $_POST['objective'];
        $experience = $_POST['experience'];
        $qualification = $_POST['qualification'];
       // $profileImage = $_POST['profileImage'];

        $query = "INSERT INTO `resume`(`name`, `phone`, `email`, `address`, `facebook`, `twitter`, `instagram`, 
                                `linkedin`, `objective`, `experience`, `qualification`, `profileImage`) 
                    VALUES ('$name', '$phone', '$email', '$address', '$facebook', '$twitter', '$instagram', 
                            '$linkedin', '$objective', '$experience', '$qualification', '$file')";

        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script type="text/javascript"> alert("Form submitted successfully") </script>';
        }
        else
        {
            echo '<script type="text/javascript">alert("Form submission failed")</script>';
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="styler.css">

    <style>
        /* .row{
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 20px;
            border: 3px solid black;
        } */
        .contain {object-fit: contain;}
        .socialLinks {
            color: whitesmoke;
        }

    </style> 
</head>
<body>
    
    <div class="container contain" id="resumeTemplate">
        <div class="row">

            <!-- first column -->
            <div class="col-md-4 text-center py-5" style="background-color: #00324A; color: white;">  

                <?php

                $query = "SELECT * FROM `resume` ORDER BY id DESC LIMIT 1";
                $query_run = mysqli_query($connection, $query);
                
                    while($row = mysqli_fetch_array($query_run))
                    {
                        ?>
                        <?php echo '<img class="image" src="data:profileImage; base64,'.base64_encode($row['profileImage']).'" alt="Image" style="width: 250px; height: 250px;">' ?>
                        
                <div class="container">
                    <h2 class="mt-2">Personal Information</h2>
                    <p id="nameT1"><b>Full Name: </b> <?php echo $row['name'];?> </p>
                    <p id="contactT"><b>Contact Number: </b> <?php echo $row['phone'];?> </p>
                    <p id="emailT"><b>Email: </b> <?php echo $row['email'];?> </p>
                    <p class="addressT"><b>Address: </b> <?php echo $row['address'];?> </p>
                    <hr />
                    <h2>Contact</h2>
                    <p><a id="fbT" class="socialLinks" href=""> <?php echo $row['facebook'];?> </a></p>
                    <p><a id="twitterT" class="socialLinks" href=""> <?php echo $row['twitter'];?> </a></p>
                    <p><a id="instaT" class="socialLinks" href=""> <?php echo $row['instagram'];?> </a></p>
                    <p><a id="linkedT" class="socialLinks" href=""> <?php echo $row['linkedin'];?> </a></p>
                </div>  
            </div> 
                   
            <!-- second column of the page -->
            <div class="col-md-8 py-5 background2">
                <h1 id="nameT2" style="font-weight: 980;"> <?php echo $row['name'];?> </h1>
                <!-- Card for Objective -->
                <div class="card mt-4">
                    <div class="card-header" style="background-color: #002333; color: white;">
                        <h3>Objective</h3>
                    </div>

                    <div class="card-body">
                        <p id="objectiveT"> 
                        <?php echo $row['objective'];?>
                        <!-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non ea excepturi, provident aliquid quam voluptates nobis culpa, laboriosam accusantium iure hic libero qui labore id pariatur, iste sunt aspernatur odit.
                        Cumque dolore dignissimos deserunt saepe perferendis expedita adipisci maiores distinctio doloribus praesentium neque ut deleniti quidem, reiciendis vero culpa id reprehenderit nulla perspiciatis exerci
                        placeat et voluptatum a dolore distinctio.Consectetur animi dolore voluptate quas quos vitae quisquam asperiores velit modi nostrum expedita distinctio nemo ducimus iure, voluptatum maiores beatae quo possimus 
                        accusamus tenetur, obcaecati ipsum quia libero corrupti? Delectus -->
                        </p>
                    </div>
                </div>

                <!-- Card for Work Experience -->
                <div class="card mt-4">
                    <div class="card-header" style="background-color: #002333; color: white;">
                        <h3>Work Experience</h3>
                    </div>

                    <div class="card-body">
                       <ul id="weT">
                           <li> <?php echo $row['experience'];?> </li>
                           <!-- <li>Lorem ipsum dolor sit amet.</li>
                           <li>Lorem ipsum dolor sit amet.</li> -->
                       </ul>
                    </div>
                </div>

                <!-- Card for Academic Qualification -->
                <div class="card mt-4">
                    <div class="card-header" style="background-color: #002333; color: white;">
                        <h3>Academic Qualification</h3>
                    </div>

                    <div class="card-body">
                       <ul id="aqT">
                           <li><?php echo $row['qualification'];?></li>
                           <!-- <li>Lorem ipsum dolor sit amet.</li>
                           <li>Lorem ipsum dolor sit amet.</li> -->
                       </ul>
                    </div>
                </div>
            </div>

                 

                <!-- first column of the page -->
                <!-- <img src="women avator.jpg" alt="" class="card-img-top myImg"> -->

               <!-- code inside while loop for first column of page was located here -->
                <!-- code for objective, experience and qualification was located here -->

        </div>
    </div>
    <?php
                }

                    ?>

    <div class="container mt-3 text-center">
        <button onclick="printresume()" id="printBtn" class="btn mb-3" style="background-color: #002333; color: white;">PRINT</button>
        <button id="sendBtn" class="btn mb-3" style="background-color: #002333; color: white;"><a href="indexEnd.html" style="text-decoration: none; color: whitesmoke;">SEND</a></button>
    </div>

       
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" 
    crossorigin="anonymous"></script>
    
</body>
</html>