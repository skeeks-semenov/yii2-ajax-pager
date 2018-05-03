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
 * @deprecated
 */
class SimplePaginationAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/yii2/ajaxpager/assets/src/simplePagination';

    public $css = [
        'simplePagination.css',
    ];
    public $js = [
        'jquery.simplePagination.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}

