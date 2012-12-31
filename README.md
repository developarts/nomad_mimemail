Nomad MIME Mail
==============

## Description.
Nomad MIME Mail, is a PHP class for handling and sending mail MIME type, with support for the dispatch by SMTP and SMTP Auth

Currently, this class supports:
- Plain Text
- HTML
- Plain Text with Attachments
- HTML with Attachments
- HTML with Embedded Images
- HTML with Attachments and Embedded Images

It also supports multiple e-mail addresses for sending (to), with a copy (cc) and with a blind carbon copy (bcc), as well as several images embedded in HTML and various attachments

## Quick Reference.
Attached to this class and documentation is a file called 'nomad_mimemail.test.php' where is a script with an example of sending mail with text, HTML, Image and Deputy Embedded sent via SMTP. .

To use MIME Mail Nomad is necessary to declare the object as follows:
```php
include ('nomad_mimemail.inc.php');
$mimemail = new nomad_mimemail();
```

### Plain Text.
Normally this is how the function 'mail ()' would operate. PHP, however in this version is created so a little different because it sent the body of the message headers and MIME type

```php
$mimemail->set_from("me@mail.com");
$mimemail->set_to("friend@mail.com");
$mimemail->set_subject("Nomad MIME Mail: Plain Text");
$mimemail->set_text("This is a MIME Mail with:\n\n- Plain Text");

if ($mimemail->send()) {
    echo "The MIME Mail has been sent";
} else {
    echo "An error has occurred, mail was not sent";
} 
```

### Plain Text and HTML.

Example of sending mail with text and HTML
```php
$mimemail->set_from("me@mail.com");
$mimemail->set_to("friend@mail.com");
$mimemail->set_subject("Nomad MIME Mail: Plain Text + HTML");
$mimemail->set_text("This is a MIME Mail with:\n\n- Plain Text\n- HTML");
$mimemail->set_html("<HTML><HEAD></HEAD><BODY>This is a <b>MIME</b> Mail with:<BR><BR>- Plain Text</BR>- HTML</BODY></HTML>");

if ($mimemail->send()) {
    echo "The MIME Mail has been sent";
} else {
    echo "An error has occurred, mail was not sent";
} 
```

### Plain Text with Attachments.

Example of creating an email with an attachment and Plain Text. You can do more than adding attachments with the 'add_attachment' method. For more information, check the function reference guide.
```php
$mimemail->set_from("me@mail.com");
$mimemail->set_to("friend@mail.com");
$mimemail->set_subject("Nomad MIME Mail: Plain Text + Attachment");
$mimemail->set_text("This is a MIME Mail with:\n\n- Plain Text\n- Attachment");
$mimemail->add_attachment("test_attachment.tar.gz", "file.tar.gz");

if ($mimemail->send()) {
    echo "The MIME Mail has been sent";
} else {
    echo "An error has occurred, mail was not sent";
}
```

### Plain Text and HTML with Attachments

Example to create an email with Plain Text, HTML and a deputy. You can add more than one attachment using the 'add_attachment'.
```php
$mimemail->set_from("me@mail.com");
$mimemail->set_to("friend@mail.com");
$mimemail->set_subject("Nomad MIME Mail: Plain Text + HTML + Attachment");
$mimemail->set_text("This is a MIME Mail with:\n\n- Plain Text\n- HTML\n- Attachment");
$mimemail->set_html("<HTML><HEAD></HEAD><BODY>This is a <b>MIME</b> Mail with:<BR><BR>- Plain Text</BR>- HTML</BR>- Attachment</BODY></HTML>");
$mimemail->add_attachment("test_attachment.tar.gz", "file.tar.gz");

if ($mimemail->send()) {
    echo "The MIME Mail has been sent";
} else {
    echo "An error has occurred, mail was not sent";
} 
```

### Plain Text and HTML with Embedded Images

Example of creating an email with HTML, plain text and an Embedded Image. For the image embedded function, the attachment must have the same name as indicated on the tag 'IMG' HTML message.
```php
$mimemail->set_from("me@mail.com");
$mimemail->set_to("friend@mail.com");
$mimemail->set_subject("Nomad MIME Mail: Plain Text + HTML + Embedded Image");
$mimemail->set_text("This is a MIME Mail with:\n\n- Plain Text\n- HTML\n- Embedded Image");
$mimemail->set_html("<HTML><HEAD></HEAD><BODY>This is a <b>MIME</b> Mail with:<BR><BR>- Plain Text</BR>- HTML</BR>- Embedded Image</BR></BR><img src='image.gif' border='0'></BODY></HTML>");
$mimemail->add_attachment("test_image.gif", "image.gif");

if ($mimemail->send()) {
    echo "The MIME Mail has been sent";
} else {
    echo "An error has occurred, mail was not sent";
}
```

### Plain Text and HTML with Embedded Image and Attachments

Example of creating an email with HTML, plain text, an embedded image and an attachment. For the embedded image to work, the attachment archive must have the same name as indicated on the tag 'IMG'
```php
$mimemail->set_from("me@mail.com");
$mimemail->set_to("friend@mail.com");
$mimemail->set_subject("Nomad MIME Mail: Plain Text + HTML + Embedded Image + Attachment");
$mimemail->set_text("This is a MIME Mail with:\n\n- Plain Text\n- HTML\n- Embedded Image\n- Attachment");
$mimemail->set_html("<HTML><HEAD></HEAD><BODY>This is a <b>MIME</b> Mail with:<BR><BR>- Plain Text</BR>- HTML</BR>- Embedded Image</BR>- Attachment</BR></BR><img src='image.gif' border='0'></BODY></HTML>");
$mimemail->add_attachment("test_image", "image.gif");
$mimemail->add_attachment("test_attachment.tar.gz", "file.tar.gz");

if ($mimemail->send()) {
    echo "The MIME Mail has been sent";
} else {
    echo "An error has occurred, mail was not sent";
}
```

### Sending Authenticated SMTP

To send mail via SMTP it is necessary to call the 'set_smtp_host' method and to send mail using SMTP authentication it is necessary to use the 'set_smtp_auth' method. 
```php
$mimemail->set_from("me@mail.com");
$mimemail->set_to("friend@mail.com");
$mimemail->set_subject("Nomad MIME Mail: HTML + Auth SMTP");
$mimemail->set_html("<HTML><HEAD></HEAD><BODY>This is a <b>MIME</b> Mail with:<BR><BR>- Plain Text</BR>- HTML</BODY></HTML>");

$mimemail->set_smtp_host("domain.com");
$mimemail->set_smtp_auth("user", "pass");

if ($mimemail->send()) {
    echo "The MIME Mail has been sent";
} else {
    echo "An error has occurred, mail was not sent";
}
```
At the moment this version is in testing and would appreciate any assistance possible to support such a large amount of SMTP's. If you have a mistake is possible to review the entire conversation that makes this script with SMTP. to do so before the 'send' call to the function 'set_smtp_log' a true, and the verdict can bring everything through 'get_smtp_log' as illustrated below:
```php
$mimemail->set_smtp_log(true);

if ($mimemail->send()) {
    echo "The MIME Mail has been sent";
} else {
    echo $mimemail->get_smtp_log();
}
```
If so, I ask you to leave your report in The Forum where this kind of try to adapt as much as possible the response received from SMTP.
