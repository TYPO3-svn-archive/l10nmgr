<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2006 Kasper Skårhøj <kasperYYYY@typo3.com>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
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



/**
 * l10nmgr detail view:
 * 	renders information for a l10ncfg record.
 *
 * @author	Kasper Skaarhoj <kasperYYYY@typo3.com>
 * @package TYPO3
 * @subpackage tx_l10nmgr
 */
class tx_l10nmgr_l10ncfgDetailView {

	var $l10ncfgObj = array();	// Internal array (=datarow of config record)
	
	/**
	* constructor. Set the internal required objects as paramter in constructor (kind of dependency injection, and communicate the dependencies)
	* @param tx_l10nmgr_l10nConfiguration	
	**/
	function tx_l10nmgr_l10ncfgDetailView($l10ncfgObj) {
		$this->l10ncfgObj=&$l10ncfgObj;
	}
	
	/**
	* checks if the internal tx_l10nmgr_l10nConfiguration object is valid
	**/
	function _hasValidConfig() {
		if (is_object($this->l10ncfgObj) && $this->l10ncfgObj->isLoaded()) {
			return true;
		}
		else  {
			return false;
		}
	}
	/**
	* returns HTML table with infos for the l10nmgr config.
	*	(needs valid configuration to be set)
	**/
	function render()	{
		if (!$this->_hasValidConfig()) {
			return 'ERROR: no valid l10nmgr config!';
		}
		$content='
				<table border="1" cellpadding="1" cellspacing="0" width="400">
					<tr class="bgColor5 tableheader">
						<td colspan="4">Configuration: <strong>'.htmlspecialchars($this->l10ncfgObj->getData('title')).' ['.$this->l10ncfgObj->getData('uid').']</strong></td>
					</tr>
					<tr class="bgColor3">
						<td><strong>Depth:</strong></td>
						<td>'.htmlspecialchars($this->l10ncfgObj->getData('depth')).'</td>
						<td><strong>Tables:</strong></td>
						<td>'.htmlspecialchars($this->l10ncfgObj->getData('tablelist')).'</td>
					</tr>
					<tr class="bgColor3">
						<td><strong>Exclude:</strong></td>
						<td>'.htmlspecialchars($this->l10ncfgObj->getData('exclude')).'</td>
						<td><strong>Include:</strong></td>
						<td>'.htmlspecialchars($this->l10ncfgObj->getData('include')).'</td>
					</tr>
				</table>';
		return $content;
		
	}
	
	
}




if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/l10nmgr/views/tx_l10nmgr_l10nmgrconfiguration_detail.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/l10nmgr/views/tx_l10nmgr_l10nmgrconfiguration_detail.php']);
}


?>
