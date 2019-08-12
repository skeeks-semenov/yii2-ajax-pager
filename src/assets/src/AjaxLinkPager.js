/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

(function (sx, $, _) {
    /**
     * Ajax постраничная навигация
     */
    sx.classes.AjaxLinkPager = sx.classes.Component.extend({

        _init: function () {},

        _onDomReady: function () {
            var self = this;

            this.jWrapper = $('#' + this.get('id'));
            this.Ias = $(this.get('id') + "_ias");

            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
                this.jWrapper.pagination(_.extend({
                    'onPageClick': function (pageNumber) {
                        self.locationPage(pageNumber);
                        return false;
                    }
                }, this.get('paginationMobile')));
            } else {
                this.jWrapper.pagination(_.extend({
                    'onPageClick': function (pageNumber) {
                        self.locationPage(pageNumber);
                        return false;
                    }
                }, this.get('pagination')));
            }


            this.Ias.on('pageChange', function(pageNum, scrollOffset, url) {
                //sx.YandexMetrika.hit(url);
                pageNum = pageNum + self.get('currentPage');
                self.set('currentPage', pageNum);
                self.jWrapper.pagination('drawPage', pageNum);
            });
        },


        locationPage: function (pageNumber) {
            location.href = this.get('basePageUrl') + pageNumber;
            return false;
        }
    });
})(sx, sx.$, sx._);