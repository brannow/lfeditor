<?php

namespace SGalinski\Lfeditor\ViewHelpers;

/***************************************************************
 *  Copyright notice
 *
 *  (c) sgalinski Internet Services (https://www.sgalinski.de)
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Core\Utility\VersionNumberUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractConditionViewHelper;

/**
 * ExtendedIfViewHelper
 */
class ExtendedIfViewHelper extends AbstractConditionViewHelper {

	/**
	 * Initializes the "then" and "else" arguments
	 */
	public function initializeArguments() {
		parent::initializeArguments();
		$version = VersionNumberUtility::getNumericTypo3Version();

		// ensure compatibility with both TYPO3 versions >= and < 8
		if (VersionNumberUtility::convertVersionNumberToInteger($version) < 8000000) {
			$this->registerArgument(
				'condition', 'boolean', 'Condition expression conforming to Fluid boolean rules', FALSE, FALSE
			);
		}
		$this->registerArgument(
			'or', 'boolean', 'Condition expression conforming to Fluid boolean rules', FALSE, FALSE
		);
		$this->registerArgument(
			'or2', 'boolean', 'Condition expression conforming to Fluid boolean rules', FALSE, FALSE
		);
		$this->registerArgument(
			'or3', 'boolean', 'Condition expression conforming to Fluid boolean rules', FALSE, FALSE
		);
		$this->registerArgument(
			'or4', 'boolean', 'Condition expression conforming to Fluid boolean rules', FALSE, FALSE
		);
		$this->registerArgument(
			'and', 'boolean', 'Condition expression conforming to Fluid boolean rules', FALSE, TRUE
		);
		$this->registerArgument(
			'and2', 'boolean', 'Condition expression conforming to Fluid boolean rules', FALSE, TRUE
		);
		$this->registerArgument(
			'and3', 'boolean', 'Condition expression conforming to Fluid boolean rules', FALSE, TRUE
		);
		$this->registerArgument(
			'and4', 'boolean', 'Condition expression conforming to Fluid boolean rules', FALSE, TRUE
		);
		$this->registerArgument(
			'negate', 'boolean', 'Condition expression conforming to Fluid boolean rules', FALSE, FALSE
		);
	}

	/**
	 * This method decides if the condition is TRUE or FALSE. It can be overriden in extending viewhelpers to adjust functionality.
	 *
	 * @param array $arguments ViewHelper arguments to evaluate the condition for this ViewHelper, allows for flexiblity in overriding this method.
	 * @return bool
	 */
	static protected function evaluateCondition($arguments = NULL) {
		$conditionResult = (
				isset($arguments['condition']) && $arguments['condition'] ||
				isset($arguments['or']) && $arguments['or'] ||
				isset($arguments['or2']) && $arguments['or2'] ||
				isset($arguments['or3']) && $arguments['or3'] ||
				isset($arguments['or4']) && $arguments['or4']
			) && isset($arguments['and']) && $arguments['and'] &&
			isset($arguments['and2']) && $arguments['and2'] &&
			isset($arguments['and3']) && $arguments['and3'] &&
			isset($arguments['and4']) && $arguments['and4'];

		return isset($arguments['negate']) && $arguments['negate'] ? !$conditionResult : $conditionResult;
	}
}
