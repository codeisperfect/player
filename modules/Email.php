<?php

require_once(ROOT.'application/libraries/swift/lib/swift_required.php');

Class Email{
	public static $senderEmail;
	public static $senderPassword;
	public static $mailer;				//OBJECT OF SWIFT MAILER CLASS
	public static $message;

	function __construct(){
		$senderEmail='1196mohitsaini@gmail.com';
		$senderPassword='21116504';
		$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
			->setUsername($senderEmail)
			->setPassword($senderPassword);
		self::$mailer = Swift_Mailer::newInstance($transport);
	}


	public static function sendMessage($userEmail,$body,$subject,$sentFromTitle){
		self::$message = Swift_Message::newInstance('Reset Your Password')
			->setFrom(array(self::$senderEmail => 'Reset Your Password'))
			->setTo(array($userEmail))
			->setBody($body);

		$result = $mailer->send($message);
		if(!$result)
			return -2;
	}
}

?>
