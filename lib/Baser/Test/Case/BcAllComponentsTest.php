<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.Test.Case
 * @since			baserCMS v 3.0.0-beta
 * @license			http://basercms.net/license/index.html
 */

/**
 * run all component baser tests
 *
 * @package Baser.Test.Case
 */
class BcAllComponentsTest extends CakeTestSuite {

/**
 * Suite define the tests for this suite
 *
 * @return CakeTestSuite
 */
	public static function suite() {
		$suite = new CakeTestSuite('All Component tests');
		$suite->addTestDirectory(BASER_TEST_CASES . DS . 'Controller' . DS . 'Component' . DS);
		return $suite;
	}

}
