<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\yii2\ajaxpager;

use skeeks\yii2\ajaxpager\assets\AjaxLinkPagerAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class ScrollAndSpPager extends ScrollPager
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

        $currentPage = $this->pagination->page;

        parent::run();

        $getData = (array) \Yii::$app->request->get();
        ArrayHelper::remove($getData, 'page');
        ArrayHelper::remove($getData, 'id');
        if ($getData)
        {
            $pageUrl = '/' . \Yii::$app->request->pathInfo . "?" . http_build_query($getData) . "&page=";
        } else
        {
            $pageUrl = '/' . \Yii::$app->request->pathInfo . "?page=";
        }

        $paginationOptions = [
            'items' => $this->pagination->totalCount,
            'itemsOnPage' => $this->pagination->pageSize,
            'currentPage' => $this->pagination->page + 1,
        ];

        if ($this->spClientOptions) {
            $paginationOptions = ArrayHelper::merge($paginationOptions, $this->spClientOptions);
        }

        $paginationMobileOptions = [];
        if ($this->spClientMobileOptions) {
            $paginationMobileOptions = ArrayHelper::merge($paginationOptions, $this->spClientMobileOptions);
        }

        $jsOptions = Json::encode([
            'id' => $this->id,
            'basePageUrl' => $pageUrl,
            'pagination' => $paginationOptions,
            'paginationMobile' => $paginationMobileOptions
        ]);


        $this->view->registerJs(<<<JS
new sx.classes.AjaxLinkPager({$jsOptions});
JS
);

        $this->view->registerCss(<<<CSS
.pagination.hidden {
    display: none;
}
CSS
);

        if ($this->pagination->pageCount > 1) {
            echo Html::tag('div', "", [
                 'id' => $this->id,
                 'class' => 'sx-js-pagination'
            ]);
        } else {
            $this->view->registerCss(<<<CSS
.box-paging, .summary {
display: none;
}
.pagination.hidden {
    display: none;
}
CSS
);
        }
    }
}