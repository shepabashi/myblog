(function () {
    /* import jQuery*/
    window.$ = window.jQuery = require('jquery')

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /**
     * 編集のtextareaの幅を自動調節
     */

    (function () {
        var editForm = $('.edit-area form');
        var content = $(editForm).find('textarea');

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
    })();

    /**
     * カテゴリの編集機能を追加
     */
    (function () {
        var categoryEdit = $('.category-edit')
        var editRows = $('.category-edit table tr:not(:eq(0))')

        $(editRows).each(function () {
            var row = $(this)
            var editButton = $(this).find('.btn:eq(1)')
            $(editButton).click(function () {
                var name_el = $(row).find('td:eq(2)')
                var slug_el = $(row).find('td:eq(3)')
                var name = $(name_el).text()
                var slug = $(slug_el).text()

                var template_el = $('<input>').attr({
                    'type': 'text',
                }).css({
                    'border': '3px solid limegreen',
                    'textAlign': 'center'
                }).keyup(function () {
                    console.log(e)
                })

                var name_inp = $(template_el).clone().val(name).attr('name', 'name')
                var slug_inp = $(template_el).clone().val(slug).attr('name', 'slug')

                name_el.html(name_inp)
                slug_el.html(slug_inp)
                $(editButton).hide()

                name_inp.focus().select()

                $(row).find('input').keyup(function (e) {
                  if(e.keyCode === 13) {
                      $.post('/config/category/' + $(row).attr('data'), {
                          '_method': 'patch',
                          'name': name_inp.val(),
                          'slug': slug_inp.val(),
                      }, function(data){
                          $(name_el).html(name_inp.val())
                          $(slug_el).html(slug_inp.val())
                          editButton.show()
                          console.log(data)
                      }).fail(function () {
                          console.log('error')
                          location.reload()
                      })
                  }
                })

                return false;
            });
        });

    })();


})();