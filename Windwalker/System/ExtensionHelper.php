<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Windwalker\System;

/**
 * Class ExtensionHelper
 *
 * @since 1.0
 */
class ExtensionHelper
{
	/**
	 * The mapper to find extension type.
	 *
	 * @var    array
	 */
	protected static $extMapper = array(
		'com_' => 'component',
		'mod_' => 'module',
		'plg_' => 'plugin',
		'lib_' => 'library',
		'tpl_' => 'template'
	);

	/**
	 * Extract element.
	 *
	 * @param   string  $element  he extension element name, example: com_content or plg_group_name
	 *
	 * @return  array
	 *
	 * @throws  \InvalidArgumentException
	 */
	public static function extractElement($element)
	{
		$prefix = substr($element, 0, 4);

		$ext = static::getExtName($prefix);

		if (!$ext)
		{
			throw new \InvalidArgumentException(sprintf('Need extension prefix, "%s" given.', $element));
		}

		$group = '';
		$name = substr($element, 4);

		// Get group
		if ($ext == 'plugin')
		{
			$name  = explode('_', $name);

			$group = array_shift($name);

			$name  = implode('_', $name);

			if (!$name)
			{
				throw new \InvalidArgumentException(sprintf('Plugin name need group, eg: "plg_group_name", "%s" given.', $element));
			}
		}

		return array(
			'type'  => $ext,
			'name'  => $name,
			'group' => $group
		);
	}

	/**
	 * Get extension type name.
	 *
	 * @param   string  $prefix  The extension prefix.
	 *
	 * @return  string|null  Extension type name.
	 *
	 * @since   3.3
	 */
	protected static function getExtName($prefix)
	{
		if (!empty(static::$extMapper[$prefix]))
		{
			return static::$extMapper[$prefix];
		}

		return null;
	}
}
 