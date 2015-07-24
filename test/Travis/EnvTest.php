<?php
/**
 * Part of Windwalker project Test files.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Windwalker\Test\Travis;

use Windwalker\String\Utf8String;
use Windwalker\Test\TestHelper;

/**
 * Test class for Travis environment
 */
class EnvTest extends \PHPUnit_Framework_TestCase
{
	public function testEnv()
	{
		var_dump($_SERVER);

		$uri  = \JUri::getInstance();
		$root = $uri::root(true);
		$base = $uri::base(true);

		var_dump(TestHelper::getValue($uri, 'uri'));

		// Get site route
		$route = Utf8String::substr($uri->getPath(), Utf8String::strlen($root));

		var_dump($root, $base, $uri->getPath(), $route);

		$this->assertEquals('rad.windwalker.io', $_SERVER['HTTP_HOST']);
		$this->assertEquals('/flower/sakura', $_SERVER['REQUEST_URI']);
	}
}
