<?php
/**
 * @package        Joomla.SystemTest
 * @copyright      Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 *                 Does a standard Joomla! installation
 */

if (false == defined('JPATH_TESTS_GLOBAL'))
{
	// Direct call
	define('JPATH_TESTS_GLOBAL', realpath(dirname(dirname(__DIR__)).'/global'));

	require_once '../SeleniumJoomlaTestCase.php';
}
else
{
	require_once 'SeleniumJoomlaTestCase.php';
}

/**
 *
 */
class Backend extends SeleniumJoomlaTestCase
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

		$this->assertTextPresent("I am just a dummy :~|");

		$this->doAdminLogout();

		$this->deleteAllVisibleCookies();
	}
}
