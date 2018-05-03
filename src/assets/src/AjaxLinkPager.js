/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

(function (sx, $, _) {
    sx.classes.AjaxLinkPager = sx.classes.Component.extend({

        _init: function () {},

        _onDomReady: function () {
            var self = this;

            this.jWrapper = $('#' + this.get('id'));
            this.Ias = this.get('id') + "_ias";

            this.jWrapper.pagination(_.extend({
                'onPageClick': function (pageNumber) {
                    self.locationPage(pageNumber);
                    return false;
                }
            }, this.get('pagination')));

            console.log(this.Ias);

            console.log(window[this.Ias]);

            this.Ias.on('pageChange', function(pageNum, scrollOffset, url) {
                //sx.YandexMetrika.hit(url);
                pageNum = pageNum + self.get('currentPage');
                self.set('currentPage', pageNum);
                console.log(pageNum);
                self.jWrapper.pagination('drawPage', pageNum);
            });
        },


        locationPage: function (pageNumber) {
            location.href = this.get('basePageUrl') + pageNumber;
            return false;
        }
    });
})(sx, sx.$, sx._);