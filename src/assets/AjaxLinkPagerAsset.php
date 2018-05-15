<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\yii2\ajaxpager\assets;

use yii\web\AssetBundle;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AjaxLinkPagerAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/yii2/ajaxpager/assets/src';

    public $js = [
        'AjaxLinkPager.js',
    ];

    public $css = [
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'skeeks\sx\assets\Custom',
        'skeeks\yii2\ajaxpager\assets\SimplePaginationAsset',
    ];
}