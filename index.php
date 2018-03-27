<?php

file_put_contents( '/var/1.log', var_export( $_POST, true ) . PHP_EOL, FILE_APPEND );
if ( ! \app\tool\Tool::checkSignature( $_POST ) ) {
	echo 'signature error';
}

