<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\yii2\ajaxpager;

use kop\y2sp\ScrollPager;
use skeeks\yii2\ajaxpager\assets\AjaxLinkPagerAsset;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AjaxLinkPager extends ScrollPager
{

    /**
     * @var string
     * @see jquery.simplePagination.js options
     */
    public $spClientOptions = [];
    /**
     * @var array
     */
    public $spClientMobileOptions = [];

    public function run()
    {
        AjaxLinkPagerAsset::register($this->view);
        
        return parent::run();
    }
}