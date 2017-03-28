(function () {
    /* import jQuery*/
    window.$ = window.jQuery = require('jquery')

    /**
     * 編集のtextareaの幅を自動調節
     */

    (function () {
        var editForm = $('.edit-area').children().first();
        var content = $('.edit-area textarea');

        var autoFitContent = (function () {
            var editFormHeight = $(editForm).height();
            var contentHeight = $(content).outerHeight(true);

            var sumOthersHeight = 0;
            var others = $(editForm).children();

            for (var i = 0; i < others.length; i++) sumOthersHeight += $(others.get(i)).outerHeight(true);

            contentHeight = editFormHeight - (sumOthersHeight - contentHeight);
            if (contentHeight < 70) contentHeight = 70;
            $(content).height(contentHeight);
        });
        $(window).resize(autoFitContent);
        autoFitContent();
    });


})();