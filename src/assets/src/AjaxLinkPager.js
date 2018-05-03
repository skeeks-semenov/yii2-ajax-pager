/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

(function (sx, $, _) {
    sx.classes.AjaxLinkPager = sx.classes.Component.extend({

        _init: function () {

        },

        _onDomReady: function () {
            var self = this;

            this.jWrapper = $('#' + this.get('id'));

            this.jWrapper.pagination(_.extend({
                'onPageClick': function (pageNumber) {
                    self.locationPage(pageNumber);
                    return false;
                }
            }, this.get('pagination')));
            /*
             this.jWrapper.pagination({
             'items': 100,
             'listStyle' : 'paging-list',
             'itemsOnPage': 10,
             'currentPage': 2,
             'prevText': 'prev',
             'nextText': 'next',
             'onPageClick': function(pageNumber)
             {
             self.locationPage(pageNumber);
             return false;
             }
             });*/
        },


        locationPage: function (pageNumber) {
            location.href = this.get('basePageUrl') + pageNumber;
            return false;
        }
    });
})(sx, sx.$, sx._);