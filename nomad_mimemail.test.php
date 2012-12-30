<?php
/**
 * This example, sends a Text + HTML + Embedded Image + Atachment eMail
 * via Auth SMTP
 */

/**
 * We need to include the class and declare it
 */
include ('nomad_mimemail.inc.php');
$mimemail = new nomad_mimemail();


/**
 * Asign SMTP values need to connect
 * Note: SMTP user can be a email if needs
 */
$smtp_host  = "smtp.host.com";	// *Change Value*
$smtp_user	= "user";		// *Change Value*
$smtp_pass	= "pass";		// *Change Value*


/**
 * Asign mail variables to create the mail
 * Check the $html var, have a img tag with src='image.gif'
 */
$from		= "sender@mail.com";	// *Change Value*
$to		= "recipient@mail.com";	// *Change Value*
$subject	= "Nomad MIME Mail example";
$text		= "This is a MIME Mail Plain Text\n\n";
$html		= "<p>This is a <b>MIME</b> Mail with:</p>
		   <ul>
		   <li>Text</li>
		   <li>HTML</li>
		   <li>Embedded Image</li>
		   <li>Attachment</li>
		   </ul>
		   <img src='my_image.jpg' border='0'>";


/**
 * Asign Atachments file path and name variables
 */
$attach_image	= "test_files/image.jpg";
$attach_file	= "test_files/file.gz";


/**
 * Asign all the vars in the class
 */
$mimemail->set_from($from);
$mimemail->set_to($to);
$mimemail->set_subject($subject);
$mimemail->set_text($text);
$mimemail->set_html($html);
// Shortcut to declare the 5 lines above
// $mimemail->new_mail($from, $to, $subject, $text, $html);


/**
 * Adding Atachments with it's file name, you can see the
 * image name in the method is the same declared in the HTML text
 * for the Embedded Image works
 */
$mimemail->add_attachment($attach_image, "my_image.jpg");
$mimemail->add_attachment($attach_file, "my_file.gz");


/**
 * Asign the SMTP values to connect.
 * If you dont need Auth SMTP you can comment the set_smtp_auth method.
 * If you dont need any SMTP you can comment both lines and the mail sends via
 * PHP mail function.
 */
//$mimemail->set_smtp_log(true); // If you need debug SMTP connection
$mimemail->set_smtp_host($smtp_host);
$mimemail->set_smtp_auth($smtp_user, $smtp_pass);

/**
 * Send the mail
 */
if ($mimemail->send()){
   	echo "The MIME Mail has been sent";
}
else {
   	echo "An error has occurred, mail was not sent";
}

//echo "<br><br><textarea cols=80 rows=30>" . $mimemail->get_smtp_log() . "</textarea>"; // If you need debug SMTP connection

?>
