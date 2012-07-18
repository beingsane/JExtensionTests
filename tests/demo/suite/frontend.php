<?php
/**
 * @package        Joomla.SystemTest
 * @copyright      Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 *                 Does a standard Joomla! installation
 */

defined('JPATH_TESTS_GLOBAL') || define('JPATH_TESTS_GLOBAL', realpath(dirname(dirname(__DIR__)).'/global'));

require_once dirname(__DIR__).'/TestCase.php';

/**
 *
 */
class Frontend extends TestCase
{
	/**
	 *
	 */
	function testFrontend()
	{
		$this->open($this->cfg->path.'index.php?option=com_testone');

		$this->waitForPageToLoad("30000");

		$this->out('Verify that a text is present');

		$this->assertTextPresent('Hello World!');

		$this->deleteAllVisibleCookies();
	}
}
