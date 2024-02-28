<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	// require '../vendor/PHPMailer/src/Exception.php';
	// require '../vendor/PHPMailer/src/PHPMailer.php';
	// require '../vendor/PHPMailer/src/SMTP.php';
	if (!class_exists('PHPMailer\PHPMailer\Exception')) { require __DIR__ . '/../vendor/PHPMailer/src/Exception.php'; }
	if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) { require __DIR__ . '/../vendor/PHPMailer/src/PHPMailer.php'; }
	if (!class_exists('PHPMailer\PHPMailer\SMTP')) { require __DIR__ . '/../vendor/PHPMailer/src/SMTP.php'; }

	
	// SAVE SYSTEM USERS - ADMIN/ADMIN_MGMT.PHP || ADMIN/USERS_MGMT.PHP
	function saveUser($conn, $page, $user_type = "User", $path = "images-users/") {
		$firstname      = ucwords(mysqli_real_escape_string($conn, $_POST['firstname']));
		$middlename     = ucwords(mysqli_real_escape_string($conn, $_POST['middlename']));
		$lastname       = ucwords(mysqli_real_escape_string($conn, $_POST['lastname']));
		$suffix         = ucwords(mysqli_real_escape_string($conn, $_POST['suffix']));
		$dob            = ucwords(mysqli_real_escape_string($conn, $_POST['dob']));
		$age            = intval($_POST['age']);
		$birthplace     = ucwords(mysqli_real_escape_string($conn, $_POST['birthplace']));
		$gender         = ucwords(mysqli_real_escape_string($conn, $_POST['gender']));
		$civilstatus    = ucwords(mysqli_real_escape_string($conn, $_POST['civilstatus']));
		$occupation     = ucwords(mysqli_real_escape_string($conn, $_POST['occupation']));
		$religion       = ucwords(mysqli_real_escape_string($conn, $_POST['religion']));
		$email          = mysqli_real_escape_string($conn, $_POST['email']);
		$contact        = mysqli_real_escape_string($conn, $_POST['contact']);
		$house_no       = ucwords(mysqli_real_escape_string($conn, $_POST['house_no']));
		$street_name    = ucwords(mysqli_real_escape_string($conn, $_POST['street_name']));
		$purok          = ucwords(mysqli_real_escape_string($conn, $_POST['purok']));
		$zone           = ucwords(mysqli_real_escape_string($conn, $_POST['zone']));
		$barangay       = ucwords(mysqli_real_escape_string($conn, $_POST['barangay']));
		$municipality   = ucwords(mysqli_real_escape_string($conn, $_POST['municipality']));
		$province       = ucwords(mysqli_real_escape_string($conn, $_POST['province']));
		$region         = ucwords(mysqli_real_escape_string($conn, $_POST['region']));
		$password         = md5($_POST['password']);
		$file             = basename($_FILES["fileToUpload"]["name"]);

	    $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
	    if (mysqli_num_rows($check_email) > 0) {
	        displayErrorMessage("Email already exists!", $page);
	    } else {
	        $target_dir = $path;
	        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	        $uploadOk = 1;
	        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	        if ($check == false) {
	            displayErrorMessage("File is not an image.", $page);
	            $uploadOk = 0;
	        } elseif ($_FILES["fileToUpload"]["size"] > 500000) {
	            displayErrorMessage("File must be up to 500KB in size.", $page);
	            $uploadOk = 0;
	        } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
	            displayErrorMessage("Only JPG, JPEG, PNG & GIF files are allowed.", $page);
	            $uploadOk = 0;
	        } elseif ($uploadOk == 0) {
	            displayErrorMessage("Your file was not uploaded.", $page);
	        } else {
	            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	            	$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, dob, age, email, contact, birthplace, gender, civilstatus, occupation, religion, house_no, street_name, purok, zone, barangay, municipality, province, region, image, password, user_type) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$dob', '$age', '$email', '$contact', '$birthplace', '$gender', '$civilstatus', '$occupation', '$religion', '$house_no', '$street_name', '$purok', '$zone', '$barangay', '$municipality', '$province', '$region', '$file', '$password', '$user_type')");
	            	displaySaveMessage($save, $page);
	            } else {
	            	displayErrorMessage("There was an error uploading your profile picture.", $page); 
	            }
	        }
	    }
	}






	// CONTACT EMAIL MESSAGING
	function sendEmail($subject, $message, $recipientEmail, $page) {
	    $mail = new PHPMailer(true);
	    try {
	        // Server settings
	        $mail->isSMTP();
	        $mail->Host = 'smtp.gmail.com';
	        $mail->SMTPAuth = true;
	        $mail->Username = 'tatakmedellin@gmail.com';
	        $mail->Password = 'nzctaagwhqlcgbqq';
	        $mail->SMTPOptions = array(
	            'ssl' => array(
	                'verify_peer' => false,
	                'verify_peer_name' => false,
	                'allow_self_signed' => true
	            )
	        );
	        $mail->SMTPSecure = 'ssl';
	        $mail->Port = 465;

	        // Send Email
	        $mail->setFrom('tatakmedellin@gmail.com', 'System name no-reply');

	        // Recipients
	        $mail->addAddress($recipientEmail);
	        $mail->addReplyTo('tatakmedellin@gmail.com');

	        // Content
	        $mail->isHTML(true);
	        $mail->Subject = $subject;
	        $mail->Body = $message;

	        $mail->send();

	        $_SESSION['message'] = "Email sent successfully!";
			$_SESSION['text'] = "Sent successfully!";
			$_SESSION['status'] = "success";
			header("Location: $page");

	    } catch (Exception $e) {
	        $_SESSION['message'] = "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
	        header("Location: $page");
	    }
	}




	function createBlotter($conn, $postData, $page) {
	    $added_by = mysqli_real_escape_string($conn, $postData['added_by']);
	    $c_firstname         = mysqli_real_escape_string($conn, $_POST['c_firstname']);
		$c_middlename        = mysqli_real_escape_string($conn, $_POST['c_middlename']);
		$c_lastname          = mysqli_real_escape_string($conn, $_POST['c_lastname']);
		$c_suffix            = mysqli_real_escape_string($conn, $_POST['c_suffix']);
		$c_contact           = mysqli_real_escape_string($conn, $_POST['c_contact']);
		$c_address           = mysqli_real_escape_string($conn, $_POST['c_address']);
		$incidentDate        = mysqli_real_escape_string($conn, $_POST['incidentDate']);
		$incidentTime        = mysqli_real_escape_string($conn, $_POST['incidentTime']);
		$incidentNature      = mysqli_real_escape_string($conn, $_POST['incidentNature']);
		$incidentAddress     = mysqli_real_escape_string($conn, $_POST['incidentAddress']);
		$acc_firstname       = mysqli_real_escape_string($conn, $_POST['acc_firstname']);
		$acc_middlename      = mysqli_real_escape_string($conn, $_POST['acc_middlename']);
		$acc_lastname        = mysqli_real_escape_string($conn, $_POST['acc_lastname']);
		$acc_suffix          = mysqli_real_escape_string($conn, $_POST['acc_suffix']);
		$acc_contact         = mysqli_real_escape_string($conn, $_POST['acc_contact']);
		$acc_address         = mysqli_real_escape_string($conn, $_POST['acc_address']);
		$witnesses           = mysqli_real_escape_string($conn, $_POST['witnesses']);
		$witnessesContact    = mysqli_real_escape_string($conn, $_POST['witnessesContact']);
		$incidentDescription = mysqli_real_escape_string($conn, $_POST['incidentDescription']);
		$actionTaken         = mysqli_real_escape_string($conn, $_POST['actionTaken']);

	    $file_name = $_FILES["fileToUpload"]["name"];
	    $location  = "../images-blotter/";
	    $image_name = implode(",", $file_name);

	    if (!empty($file_name)) {
	        foreach ($file_name as $key => $val) {
	            $targetPath = $location . $val;
	            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $targetPath);
	        }
	    }

	    $save = mysqli_query($conn, "INSERT INTO blotter (added_by, c_firstname, c_middlename, c_lastname, c_suffix, c_contact, c_address, incidentDate, incidentTime, incidentNature, incidentAddress, acc_firstname, acc_middlename, acc_lastname, acc_suffix, acc_contact, acc_address, witnesses, witnessesContact, incidentDescription, actionTaken, attachments, date_added) VALUES ('$added_by', '$c_firstname', '$c_middlename', '$c_lastname', '$c_suffix', '$c_contact', '$c_address', '$incidentDate', '$incidentTime', '$incidentNature', '$incidentAddress', '$acc_firstname', '$acc_middlename', '$acc_lastname', '$acc_suffix', '$acc_contact', '$acc_address', '$witnesses', '$witnessesContact', '$incidentDescription', '$actionTaken', '$image_name', NOW())");

	    displaySaveMessage($save, $page);
	}













	function createComplaint($conn, $postData, $page) {
	    $added_by           = mysqli_real_escape_string($conn, $postData['added_by']);
	    $complaint_nature   = mysqli_real_escape_string($conn, $_POST['complaint_nature']);
		$incident_location  = mysqli_real_escape_string($conn, $_POST['incident_location']);
		$date_happened      = mysqli_real_escape_string($conn, $_POST['date_happened']);
		$time_happened      = mysqli_real_escape_string($conn, $_POST['time_happened']);
		$witness            = mysqli_real_escape_string($conn, $_POST['witness']);
		$details            = mysqli_real_escape_string($conn, $_POST['details']);
		$preferred_solution = mysqli_real_escape_string($conn, $_POST['preferred_solution']);

	    $file_name = $_FILES["fileToUpload"]["name"];
	    $location  = "../images-complaints/";
	    $image_name = implode(",", $file_name);

	    if (!empty($file_name)) {
	        foreach ($file_name as $key => $val) {
	            $targetPath = $location . $val;
	            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $targetPath);
	        }
	    }

	    $save = mysqli_query($conn, "INSERT INTO complaint (added_by, complaint_nature, incident_location, date_happened, time_happened, witness, details, attachments, preferred_solution) VALUES ('$added_by', '$complaint_nature', '$incident_location', '$date_happened', '$time_happened', '$witness', '$details', '$image_name', '$preferred_solution') ");

	    displaySaveMessage($save, $page);
	}



	


?>



