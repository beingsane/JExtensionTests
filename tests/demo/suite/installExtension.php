<?php
/**
 * @package		Joomla.SystemTest
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Does a standard Joomla! installation
 */

require_once 'SeleniumJoomlaTestCase.php';

class InstallExtension extends SeleniumJoomlaTestCase
{
	function testInstallExtension()
	{
		$this->setUp();
		$cfg = $this->cfg;

		$extensionDir = dirname(__DIR__).'/packages';

		$extensionPackage = 'com_testone_1.0__20120717_1904.zip';

		echo 'Extension Dir: '.$extensionDir."\n";
		echo 'Extension    : '.$extensionPackage."\n";

		$path = $extensionDir . '/' . $extensionPackage;

		echo "Login to back end\n";
		$this->gotoAdmin();
		$this->doAdminLogin();

		$this->open("/jextensiontests/administrator/index.php?option=com_installer");
		$this->click("link=Extension Manager");
		$this->waitForPageToLoad("30000");
		$this->type("id=install_directory", $path);
		$this->click("//input[@value='Install']");
		$this->waitForPageToLoad("30000");
		$this->verifyTextPresent("Please enter a package directory");

		$this->doAdminLogout();
		$this->deleteAllVisibleCookies();
	}
}
