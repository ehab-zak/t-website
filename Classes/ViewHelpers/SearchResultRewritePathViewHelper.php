<?php

namespace St9\Websites\ViewHelpers;
use TYPO3\CMS\Core\Utility\DebugUtility;

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

class SearchResultRewritePathViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

    /**
     * Disable the escaping interceptor because otherwise the child nodes would be escaped before this view helper
     * can decode the text's entities.
     *
     * @var bool
     */
    protected $escapingInterceptorEnabled = false;

    /**
     * Overwrite markers with contact data
     *
     * @return string
     */
    public function render() {
        $content = $this->renderChildren();
        $content = str_replace('">/', '">', $content);
        return $content;
    }


}
