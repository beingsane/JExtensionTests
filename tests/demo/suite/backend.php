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
class Backend extends TestCase
{
	/**
	 *
	 */
	function testBackend()
	{
		$this->out('Login to back end')
			->gotoAdmin()
			->doAdminLogin();

		$this->click("link=TestOne");

		$this->waitForPageToLoad("30000");

		$this->out('Verify that a text is present');

		$this->assertTextPresent("I am just a dummy :~|");

		$this->doAdminLogout();

		$this->deleteAllVisibleCookies();
	}
}
