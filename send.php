<?php
use PHPMailer\PHPMailer\PHPMailer;

	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$msg = $_POST['message'];
		$phone=$_POST['phone'];
		$subject=$_POST['subject'];
		

            try{

        $message = "<center><h1>SUBJECT: </h1><h2>$subject</h2><br><br><h1>NAME: </h1><h2>$name</h2><br><br><h1>PHONE: </h1><h2>$phone</h2><br><br><h1>Email: </h1><h2>$email</h2><br><br><h1>Message: </h1><h2>$msg</h2><br><br></center>";
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
		 $mail = new PHPMailer();			  
				        //Server settings
			        $mail->isSMTP();
        $mail->Host = "smtp.hostinger.com";
        $mail->SMTPAuth = true;
        $mail->Username = "support@7softsolution.com"; //enter you email address
        $mail->Password = '@7softBALAJIsolution'; //enter you email password
        $mail->Port = 587;
				        $mail->SMTPOptions = array(
				            'ssl' => array(
				            'verify_peer' => false,
				            'verify_peer_name' => false,
				            'allow_self_signed' => true
				            )
				        );                                                       

				        $mail->setFrom('support@7softsolution.com',$name);
				        
				        //Recipients
				        $mail->addAddress('support@7softsolution.com');              
				       
				        //Content
				        $mail->isHTML(true);                                            
				        $mail->Subject = 'FORM SUBMITION';
				        $mail->Body = $message;
						$mail->send();
                        
                
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
			
	}
	header('location: index.html');

?>