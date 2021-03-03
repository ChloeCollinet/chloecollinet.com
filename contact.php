<?php
						// define variables and set to empty values
						$nameErr = $emailErr = $phoneErr = $inquiryErr = "";
						$name = $email = $phone = $inquiry = $email_message = "";
						$submitted = 0;

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
						   if (empty($_POST["name"])) {
							 $nameErr = "Name is required";
						   } else {
							 $name = clean_data($_POST["name"]);
							 $fill["name"] = $name;
							 // check if name only contains letters and whitespace
							 if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
							   $nameErr = "Only letters and white space allowed"; 
							 }
						   }
						   
						   if (empty($_POST["email"])) {
							 $emailErr = "Email is required";
						   } else {
							 $email = clean_data($_POST["email"]);
							 $fill["email"] = $email;
							 // check if e-mail address is well-formed
							 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							   $emailErr = "Invalid email format"; 
							 }
						   }
							
						   if (empty($_POST["inquiry"])) {
							 $inquiryErr = "You Cannot Submit an Empty Inquiry";
						   } else {
							 $inquiry = clean_data($_POST["inquiry"]);
							 $fill["inquiry"] = $inquiry;
						   }
						}

						function clean_data($data) {
							// Strip whitespace (or other characters) from the beginning and end of string
							$data = trim($data);
							// Un-quotes quoted string
							$data = stripslashes($data);
							// Convert special characters to HTML entities
							$data = htmlspecialchars($data);
							return $data;
						}
						// Send email if no errors
						if (isset($fill)) {
							if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($inquiryErr)) {
								// Inquiry sent from address below
								$email_from = "no-reply@emailadress.com";
								
								// Send form contents to address below
								$email_to = "info@emailadress.com";
								
								// Email message subject
								$today = date("j F, Y. H:i:s");
								$email_subject = "Website Submission [$today]";
								
								function clean_string($string) {

									$bad = array("content-type","bcc:","to:","cc:","href");

									return str_replace($bad,"",$string);

								}

								$email_message .= "Name: ".clean_string($name)."\n";

								$email_message .= "Email: ".clean_string($email)."\n";

								$email_message .= "Phone: ".clean_string($phone)."\n";

								$email_message .= "Inquiry: ".clean_string($inquiry)."\n";
								
								// create email headers
								$headers = 'From: '.$email_from."\r\n".
								 
								'Reply-To: '.$email_from."\r\n" .
								 
								'X-Mailer: PHP/' . phpversion();
								 
								@mail($email_to, $email_subject, $email_message, $headers);
								
								$submitted = 1;
							}
						}
					?>
