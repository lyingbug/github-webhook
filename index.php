<?php
require_once( './vendor/autoload.php' );

$raw_data = file_get_contents( 'php://input', 'r' );
file_put_contents( '/usr/local/code/msg/log/1.log', var_export( $_POST, true ) . PHP_EOL, FILE_APPEND );


if ( ! \app\tool\Tool::checkSignature( $_POST ) ) {
	echo 'signature error : ' . 'request sign : '
	     . \app\tool\Tool::getRequestSign() . 'server sign : ' . \app\tool\Tool::getSignature( $_POST );

	return;
}
$data = json_decode( $raw_data, true );

if ( ! in_array( $data['repository']['full_name'], array_keys( \app\Config::$triggerRepository ) ) ) {
	echo 'this repository need nothing todo';

	return;
}
echo exec( \app\Config::$triggerRepository[ $data['repository']['full_name'] ] );
