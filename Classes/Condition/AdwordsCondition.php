<?php
namespace St9\Websites\Condition;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Adwords Condition
 */
class AdwordsCondition extends \TYPO3\CMS\Core\Configuration\TypoScript\ConditionMatching\AbstractCondition {

	/**
	 * Evaluate condition
	 *
	 * @param array $conditionParameters
	 * @return bool
	 */
	public function matchCondition(array $conditionParameters) {
		
		$result = false;
		$tillendofyear = mktime(0,0,0,1,1,date('Y')+1);
		
		if(empty($conditionParameters)){
			$campaign = 'aw'.date('Y');
			if(isset($_GET[$campaign]) || isset($_COOKIE[$campaign])){
				setcookie($campaign,1,$tillendofyear);
				$result = true;
			}
		}
		
		if(!empty($conditionParameters)){
			foreach($conditionParameters as $campaign){
				if($campaign=='enabled'){$campaign = 'aw'.date('Y');}
				if(isset($_GET[$campaign]) || isset($_COOKIE[$campaign])){
					setcookie($campaign,1,$tillendofyear);
					$result = true;
				}
			}
		}

		return $result;
	}
}