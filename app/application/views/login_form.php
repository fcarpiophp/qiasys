<?php
/*
  $to = 'g37dude@gmail.com';
  $subject = 'Here is the subject from mail() @ '.base_url();
  $message = 'this is my test message';
  $mail = mail($to, $subject, $message);
  $result['to'] = $to;
  $result['subject'] = $subject;
  $result['message'] = $message;
  $result['result'] = $mail;
  var_dump($result);



  //require base_url().'application/libraries/PHPMailer/PHPMailerAutoload.php';
  include(APPPATH.'libraries/PHPMailer/class.phpmailer.php');

  $mail = new PHPMailer();

  $mail->isSMTP();                                        // Set mailer to use SMTP
  $mail->Host = 'smtp.qiasys.com';                        // Specify main and backup server
  $mail->SMTPAuth = true;                                 // Enable SMTP authentication
  $mail->Username = 'fcarpio@qiasys.com';                              // SMTP username
  $mail->Password = 'BBs2EFwud';                             // SMTP password
  $mail->SMTPSecure = 'tls';                              // Enable encryption, 'ssl' also accepted

  $mail->From = 'from@example.com';
  $mail->FromName = 'Mailer';
  $mail->addAddress('g37dude@gmail.com', 'Pancho');    // Add a recipient
  $mail->addAddress('ellen@example.com');                 // Name is optional
  $mail->addReplyTo('info@example.com', 'Information');
  $mail->addCC('cc@example.com');
  $mail->addBCC('bcc@example.com');

  $mail->WordWrap = 50;                                   // Set word wrap to 50 characters
  //$mail->addAttachment('/var/tmp/file.tar.gz');           // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');      // Optional name
  $mail->isHTML(true);                                    // Set email format to HTML

  $mail->Subject = 'Here is the subject from PHPMailer @ '.base_url();
  $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if(!$mail->send()) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
  exit;
  }

  echo 'Message has been sent';
 * 
 */

$username = array(
    'name' => 'username',
    'id' => 'username',
    'class' => 'input-large',
    'value' => '',
    'maxlength' => '100',
    'size' => '15',
    'style' => 'height: 30px',
);

$password = array(
    'name' => 'password',
    'id' => 'password',
    'class' => 'input-large',
    'value' => '',
    'maxlength' => '32',
    'size' => '15',
    'style' => 'height: 30px',
);

mail('g37dude@gmail.com', 'PFS test', 'this is a test');
?>

<HTML>
    <HEAD>
	<link type="text/css" href="<?= base_url() . APPPATH ?>css/bootstrap.css" rel="stylesheet"/>
	<link type="text/css" href="<?= base_url() . APPPATH ?>css/bootstrap-responsive.css" rel="stylesheet" />
	<script type="text/javascript" src="<?= base_url() . APPPATH ?>jquery/jquery-1.8.2.js"></script>
    </HEAD>
    <BODY>
	<noscript>
	    <div class='alert alert-danger center'><strong>Alert!</strong> JavaScript is required to run this site. 
		Please enable it to authenticate.</div></noscript>
	<?= form_open('home_page/auth'); ?>
	<fieldset>
	    <div
		style='margin-left: auto; margin-right: auto; margin-top: auto; margin-bottom: auto; min-height: 800px; 
		width: 210px; position: relative; top: 100px;'>
		<div style="width: auto;">
		    <legend>Login Form</legend>
		    <label>Username</label>

		    <div align="left"><?= form_input($username) ?></div>
		    <div style="white-space: normal;"
			 align="left"><?= form_error('username', '<div class="text-error">', '</div>') ?></div>
		</div>
		<div style="width: auto;">
		    <label>Password</label>

		    <div align="left"><?= form_password($password) ?></div>
		    <div style="white-space: normal;"
			 align="left"><?= form_error('password', '<div class="text-error">', '</div>') ?></div>
		</div>
		<div align="left">
		    <button type="submit" id="auth" class="btn btn-primary pull-right submit-btn" disabled>Submit</button>
		    <img class="preloader pull-right" style="display: none; margin-right: 30px;"
			 src="<?= base_url() . APPPATH ?>images/preloader.gif" alt="Loading...">
		</div>
		<?php
		if (!empty($error_message)) {
		    print '<span class="text-error error-message">' . $error_message . '</span>';
		}
		?>
	    </div>
	</fieldset>
	<?= form_close() ?>

	<script type="text/javascript">
	    $('.submit-btn').click(function() {
		$('.error-message').remove()
		$('.submit-btn').addClass('disabled');
		$('.submit-btn').text('Authenticating...');
		$('.preloader').show();
	    });

	    $(function() {

		// enable login with JavaScript to check if JS is enabled
		$('.submit-btn').removeAttr('disabled');
	    })

	</script>
    </BODY>
</HTML>

