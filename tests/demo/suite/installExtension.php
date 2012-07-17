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

		echo "Login to back end\n";
		$this->gotoAdmin();
		$this->doAdminLogin();

		$this->open("/jextensiontests/administrator/index.php?option=com_installer");
		$this->click("link=Extension Manager");
		$this->waitForPageToLoad("30000");
		$this->type("id=install_directory", "/home/jtester/srv/www/htdocs/jextensiontests/tmp/aaa.zip");
		$this->click("//input[@value='Install']");
		$this->waitForPageToLoad("30000");
		$this->verifyTextPresent("Please enter a package directoryx");

		$this->doAdminLogout();
		$this->deleteAllVisibleCookies();
	}
}
