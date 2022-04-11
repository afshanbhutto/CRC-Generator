<?php

    $connectionCL = mysqli_connect("localhost","root","","demo");

    if(isset($_POST['submitCL']))
    {
        //variables for users' details section
        $namey = $_POST['namey'];
        $addressy = $_POST['addressy'];
        $telephone = $_POST['telephone'];
        $emaily = $_POST['emaily'];
        $date = $_POST['date'];

        //variables for Recipient Details section
        $namer = $_POST['namer'];
        $addressr = $_POST['addressr'];

        //variables for social link section
        $content = $_POST['content'];
        $nameS = $_POST['nameS'];

        $queryCL = "INSERT INTO `coverletter`(`namey`, `addressy`, `telephone`, `emaily`, `date`, `namer`,
                                             `addressr`, `content`, `nameS`) 
                    VALUES ('$namey', '$addressy', '$telephone', '$emaily', '$date', '$namer', 
                            '$addressr', '$content', '$nameS')";

        $query_runCL = mysqli_query($connectionCL, $queryCL);

        if($query_runCL)
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
    <title>Cover Letter Templete</title>
    <link rel="stylesheet" href="stylescl.css">
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" 
    crossorigin="anonymous">

</head>

<body style="text-align: justify">
	<div class="main-content">
        <section class="left-section">
            <div class="left-content">
            
            </div>
        </section>

        <section class="right-section">
			<div class="right-main-content">
				<div>
				<?php

                $query = "SELECT * FROM `coverletter` ORDER BY id DESC LIMIT 1";
                $query_run = mysqli_query($connectionCL, $query);
                
                    while($row = mysqli_fetch_array($query_run))
                    {

                        ?>
					<p><center><p style="font-size: 50px;"> <?php echo $row['namey'];?> </p>
					<br>
					<h5>
						<?php echo $row['addressy'];?> <br>
						<?php echo $row['telephone'];?> <br>
						<?php echo $row['emaily'];?> 
					</h5></center></p>
				</div>
				<br><hr><br><br>

				<div>
					<?php echo $row['date'];?>
				</div> <br>

				<p>
					<b>
					To: <br>
					<?php echo $row['namer'];?> <br>
					<?php echo $row['addressr'];?> <br>
					
					<!-- St. Marry Hospital <br>
					534, Fort Avenue <br>
					baltimore, MD752  -->
					</b>
				</p><br>
				
				<p>
					Dear <?php echo $row['namer'];?> ,<br><br>
					<div>
						<?php echo $row['content'];?> 
						<!-- <div>
							I have send your job vacancy in national times daily about health practitioners. I would like to apply as Dentist in your hospital. I am currently woking in Happy Hospital, New Orleans.
						</div><br>

						<div>
							I am sure I can be the ideal candidate for your Hospital. I have minimally three years experience as dentist in Happy Hospital. I worked as an orthodentists. I have Handeled severeal cases about teth and mouth operations. I received award as the best dentist at Happy Hospital one year ago beacuse of my knowledge and experience. I am certain that my experience is suitable with you requirement.
						</div><br>

						<p>
							I am hard worker that is capable of working under pressure. I have high awareness with patients. I always try to solve patients problem according to my ability.
						</p><br>

						<div>
							I enclosed my resume which can describe deatails of my Qulifications. i am glad if I can meet you for personal interview. you can contact me at (123) 123-4567 or send email to my email id (marryanne@yahoo.com). Thankyou for your attention.
						</div><br> -->
					</div>
				</p>

				<div>
					<br><br><br>
					Sincerely,<br><br>
					<?php echo $row['nameS'];?> 
				</div><br><br>

					<?php
					}
					?>
			</div>     
        </section>
    </div>

	<!-- style="font-size: 25px; border-bottom-style: hidden; padding: 5px;border-color: darkgrey;border-style: solid;" -->
	<div class="container mt-3 text-center">
        <button onclick="printCL()" id="print" class="btn mb-3" style="background-color: #002333; color: white;">PRINT</button>
        <button id="send" class="btn mb-3" style="background-color: #002333; color: white;">
			<a href="../indexEnd.html" style="text-decoration: none; color: whitesmoke;">SEND</a>
		</button>
    </div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" 
    crossorigin="anonymous"></script>
	<script src="script.js"></script>
</body>
</html>