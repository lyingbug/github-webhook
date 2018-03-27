<?php
/**
 * app\tool\Tool
 *
 * @author wizardchen <wizardchen@tencent.com>
 * @date 2018/3/27 下午4:34
 */

namespace app\tool;


use app\Config;

class Tool {

	public static function getSignature( $postField ) {
		return 'sha1=' . hash_hmac( 'sha1', $postField, Config::TOKEN );
	}

	public static function checkSignature( $postFiled ) {
		if ( self::getRequestSign() !== self::getSignature( $postFiled ) ) {
			return false;
		}

		return true;
	}

	public static function getRequestSign() {
		return $_SERVER['HTTP_X_HUB_SIGNATURE'];
	}
}