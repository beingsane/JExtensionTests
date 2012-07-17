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
class InstallExtension extends SeleniumJoomlaTestCase
{
	/**
	 *
	 */
	function testInstallExtension()
	{
		//$this->setUp();
		//$cfg = $this->cfg;

		$extensionDir = dirname(__DIR__) . '/packages';

		$extensionPackage = 'com_testone_1.0__20120717_1904.zip';

		echo 'Extension Dir: ' . $extensionDir . "\n";
		echo 'Extension    : ' . $extensionPackage . "\n";

		$path = $extensionDir . '/' . $extensionPackage;

//		$dirWorkspace = '/home/jtester/.jenkins/jobs/Joomla CMS Extension Test/workspace';
//		/tests/demo/packages/com_testone_1.0__20120717_1904.zip

		echo "Login to back end\n";
		$this->gotoAdmin();
		$this->doAdminLogin();

		$this->open("/jextensiontests/administrator/index.php?option=com_installer");
		$this->click("link=Extension Manager");
		$this->waitForPageToLoad("30000");

		//	$this->type("id=install_directory", $path);
		//	$this->click("//input[@value='Install']");

		$this->type("id=install_package", $path);
		$this->click("css=input.button");

		$this->waitForPageToLoad("30000");

		$this->assertTextPresent("Installing component was successful.");

		//$this->click("link=TestOne");
		//$this->waitForPageToLoad("30000");
		//$this->assertTextPresent("I am just a dummy :~|");

		//$this->assertTrue($this->isTextPresent('Notice: Undefined property: JAdministrator::$JComponentTitle'));
		//$this->assertTextPresent('Notice: Undefined property: JAdministrator::$JComponentTitle');

		//$this->click("link=frontpage view of TestOne");
		//$this->waitForPageToLoad("30000");

		//$this->assertTextPresent("Fatal error: Call to undefined method JController::getInstance()");

		//$this->open($cfg->path . '/administrator');
		//$this->waitForPageToLoad("30000");

		$this->doAdminLogout();
		$this->deleteAllVisibleCookies();
	}
}
