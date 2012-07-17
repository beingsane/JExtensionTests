<?php
/**
 * @package		Joomla.FunctionalTest
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_TESTS_GLOBAL') || define('JPATH_TESTS_GLOBAL', dirname(__DIR__).'/global');

require JPATH_TESTS_GLOBAL . '/seleniumhelper.php';

$configPath = __DIR__.'/config.php';

file_exists($configPath) || die('Please create the config.php file in '.$configPath);

require_once $configPath;

class SeleniumJoomlaTestCase extends JoomlaTestsSeleniumhelper
{
	/**
	 * Setup the test case.
	 */
	public function setUp()
	{
		$this->cfg = new SeleniumConfig;

		$this->setBrowser($this->cfg->browser);
		$this->setBrowserUrl($this->cfg->host . $this->cfg->path);

		if (isset($this->cfg->selhost) && $this->cfg->selhost)
		{
			$this->setHost($this->cfg->selhost);
		}

		$this->captureScreenshotOnFailure = $this->cfg->captureScreenshotOnFailure;
		$this->screenshotPath = $this->cfg->screenshotPath;
		$this->screenshotUrl = $this->cfg->screenshotUrl;

		echo ".\n" . 'Starting ' . get_class($this) . ".\n";
	}

}
