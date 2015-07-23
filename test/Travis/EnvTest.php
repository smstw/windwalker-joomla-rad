<?php
/**
 * Part of Windwalker project Test files.
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Windwalker\Test\Travis;

/**
 * Test class for Travis environment
 */
class EnvTest extends \PHPUnit_Framework_TestCase
{
	public function testEnv()
	{
		var_dump($_SERVER);

		$this->assertEquals('rad.windwalker.io', $_SERVER['HTTP_HOST']);
		$this->assertEquals('/flower/sakura', $_SERVER['REQUEST_URI']);
	}
}
