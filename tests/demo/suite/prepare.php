<?php
/**
 * @package		Joomla.SystemTest
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Does a standard Joomla! installation
 */

defined('JPATH_TESTS_GLOBAL') || define('JPATH_TESTS_GLOBAL', realpath(dirname(dirname(__DIR__)).'/global'));

require_once dirname(__DIR__).'/SeleniumJoomlaTestCase.php';

class Prepare extends SeleniumJoomlaTestCase
{
	function testPrepare()
	{
		$this->out('Login to back end')
			->gotoAdmin()
			->doAdminLogin()
			->out('Change error level to development')
			->jClick('Global Configuration');

		$this->click("server");
		$this->select("jform_error_reporting", "label=Development");
		$this->click("//li[@id='toolbar-save']/a/span");
		$this->waitForPageToLoad("30000");

		$this->setCache($this->cfg->cache);

		// Check admin template -- change to hathor if specified in config file
		if (isset($this->cfg->adminTemplate) && $this->cfg->adminTemplate == 'hathor') {
			$this->click("link=Template Manager");
			$this->waitForPageToLoad("30000");
			$this->click("link=Hathor - Default");
			$this->waitForPageToLoad("30000");
			$this->click("jform_home1");
			$this->click("//li[@id='toolbar-save']/a/span");
			$this->waitForPageToLoad("30000");
		}

		$this->doAdminLogout();

		$this->deleteAllVisibleCookies();
	}
}
