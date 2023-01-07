<?php
		
    $message1= 'Your message has been sent successfuly';
    $message2= 'Failed to send the message';
    if (isset($_POST['reservation_email'])) {
     
        $name= $_POST['reservation_name'];
        $email= $_POST['reservation_email'];
        $phone= $_POST['reservation_phone'];
        $cource= $_POST['person_select'];
        $user_message = $_POST['form_message'];

        $url = 'https://sendemailinition.herokuapp.com/admission-mail';
        //$url = 'http://localhost:8080/admission-mail';

        $data = array(
            "name" => $name,
            "email"=>$email,
            "phone"=>$phone,
            "course"=>$cource,
            "message"=>$user_message
           
        );
        $data_string = json_encode($data);
        $ch=curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array(
                'Content-Type:application/json',
                'Content-Length: ' . strlen($data_string)
            )
        );
        
        curl_exec($ch);
        //echo $result;
        curl_close($ch);
        
       // echo '<script>alert("Your message has been sent successfuly")</script>';
       ob_end_clean();
        echo '{"status":"true","message":"Thanks, we will contact shortly!"}';
	
			
 	    
 	}
 	
 	?>