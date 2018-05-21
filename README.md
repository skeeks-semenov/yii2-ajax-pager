Ajax link pager
===========================

Ajax подгрузка страниц + js пагинация

[![Latest Stable Version](https://img.shields.io/packagist/v/skeeks/yii2-ajax-pager.svg)](https://packagist.org/packages/skeeks/yii2-ajax-pager)
[![Total Downloads](https://img.shields.io/packagist/dt/skeeks/yii2-ajax-pager.svg)](https://packagist.org/packages/skeeks/yii2-ajax-pager)


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist skeeks/yii2-ajax-pager "*"
```

or add

```
"skeeks/skeeks/yii2-ajax-pager": "*"
```

Examples
--------

http://www.v3toys.ru/detskij-transport/ehlektromobili/

```php

echo \yii\widgets\ListView::widget([
    //...
    'pager'        => [
        'id'                    => 'sx_v3toys_paginator',
        'class'                 => \skeeks\yii2\ajaxpager\AjaxLinkPager::class,
        'noneLeftText'          => '',
        'item'                  => '.catalog-list__item',
        'container'             => '.catalog-list',
        'paginationSelector'    => '.catalog-list .pagination',
        'triggerTemplate'       => '<div class="ias-trigger main-catalog__btn"><a class="btn btn-grey btn-lg">{text}</a></div>',
        'triggerText'           => 'Показать еще',
        'spClientOptions'       => [
            'listStyle' => 'paging-list',
            'prevText'  => '',
            'nextText'  => '',
            'edges'     => '1',
        ],
        'spClientMobileOptions' => [
            'listStyle'      => 'paging-list',
            'prevText'       => '',
            'nextText'       => '',
            'displayedPages' => '1',
        ],

        'eventOnPageChange' => new \yii\web\JsExpression(<<<JS
function(pageNum, scrollOffset, url) {
sx.App.jLastProduct = jQuery(".catalog-list__item:last");
var getCurrentPage = jQuery('#sx_v3toys_paginator').pagination('getCurrentPage');
var result = getCurrentPage + 1;
jQuery('#sx_v3toys_paginator').pagination('drawPage', result);
}
JS
        ),

        'eventOnRendered' => new \yii\web\JsExpression(<<<JS
function(pageNum, scrollOffset, url) {
sx.App.ImageLazyLoader.update();
sx.App.ImageProductSlider.update();



jQuery('.catalog-list__link-not-ready span').ellipsis({
lines: 2,             // force ellipsis after a certain number of lines. Default is 'auto'
ellipClass: 'ellip',  // class used for ellipsis wrapper and to namespace ellip line
responsive: true      // set to true if you want ellipsis to update on window resize. Default is false
});

jQuery(".catalog-list__link-not-ready").removeClass('catalog-list__link-not-ready');

var getPagesCount = jQuery('#sx_v3toys_paginator').pagination('getPagesCount');
var getCurrentPage = jQuery('#sx_v3toys_paginator').pagination('getCurrentPage');

sx.App.jLastProduct.after('<li class="main-catalog__sepatrator"><span>Страница ' + getCurrentPage + ' из ' + getPagesCount + '</span></li>');

}
JS
        ),
    ],
    //...
]); ?>

```

Links
----------
* [Github](https://github.com/skeeks-semenov/skeeks/yii2-ajax-pager)
* [Changelog](https://github.com/skeeks-semenov/skeeks/yii2-ajax-pager/blob/master/CHANGELOG.md)
* [Issues](https://github.com/skeeks-semenov/skeeks/yii2-ajax-pager/issues)
* [Packagist](https://packagist.org/packages/skeeks/skeeks/yii2-ajax-pager)

___

> [![skeeks!](https://skeeks.com/img/logo/logo-no-title-80px.png)](https://skeeks.com)  
<i>SkeekS CMS (Yii2) — fast, simple, effective!</i>  
[skeeks.com](https://skeeks.com) | [cms.skeeks.com](https://cms.skeeks.com)


