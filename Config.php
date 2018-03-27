<?php
/**
 * app\Config
 *
 * @author wizardchen <wizardchen@tencent.com>
 * @date 2018/3/27 下午5:03
 */

namespace app;


class Config {

	const TOKEN = '123';

	public static $triggerRepository = [
		'lyingbug/blog-posts' => '/bin/bash /usr/local/task/sync_blog_posts.sh'
	];

}