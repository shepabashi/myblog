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
            var others = $(editForm).children().not('.fixed');

            for (var i = 0; i < others.length; i++) sumOthersHeight += $(others.get(i)).outerHeight(true);

            contentHeight = editFormHeight - (sumOthersHeight - contentHeight);
            if (contentHeight < 70) contentHeight = 70;
            $(content).height(contentHeight);
        });
        $(window).resize(autoFitContent);
        autoFitContent();
    })();


    /**
     * 記事編集画面でのパネルの設定
     */
    (function () {

        var mask = $('#mask');
        var close_btn = $('.close-btn');

        var edit_category_btn = $('#edit-category-btn');
        var edit_category_panel = $('#edit-category-panel');
        var insert_link_btn = $('#insert-link-btn');
        var insert_link_panel = $('#insert-link-panel');

        // 閉じる
        var close_panels = function () {
            $(mask).addClass('hidden');
            $(edit_category_panel).addClass('hidden');
            $(insert_link_panel).addClass('hidden');
        };
        $(mask).click(close_panels);
        $(close_btn).click(close_panels);

        // カテゴリ
        var removeCategory = function () {
            $('[name=categories\\[\\]][value=' + $(this).text() + ']').remove();
            $(this).remove();
        };
        $(edit_category_panel).find('.categories li').click(removeCategory);

        var edit_category_btn_click = function () {
            var category_input_box = $('#category_input_box');

            $(mask).removeClass('hidden');
            $(edit_category_panel).removeClass('hidden');

            $(category_input_box).val('');
            $(category_input_box).focus();

            $(category_input_box).keypress(function (e) {
                var category_name = $(this).val();

                if (e.which === 13) {
                    if (!category_name) return false;
                    var categories = $(edit_category_panel).find('.categories');

                    var el = $('<li>').text(category_name);
                    $(categories).append(el);
                    $(el).click(removeCategory);

                    var el2 = $('<input>').attr({type: 'hidden', name: 'categories[]', value: category_name});
                    $('form').append(el2);
                    $(this).val('');

                    return false;
                }
            });
        };
        $(edit_category_btn).click(edit_category_btn_click);


        // textarea に挿入
        var textarea = $('textarea');
        var pos = 0;

        $(textarea).on('click keyup', function () {
            this.focus();
            pos = this.selectionStart;
        });

        var insert = function (str) {
            if (typeof str !== 'string') return;

            var val = textarea.val();

            if (pos - 1 >= 0 && val[pos - 1] !== '\n')
                str = "\n" + str;
            if (val[pos] !== '\n')
                str += "\n";

            textarea.val(val.substr(0, pos) + str + val.substr(pos));
        };

        // リンク
        var insert_link_btn_click = function () {
            var autoToggle = true;

            var title = $('#insert_link_title'),
                url = $('#insert_link_url'),
                is_blank = $('#is_blank');

            $(insert_link_panel).removeClass('hidden');

            var insertLinkTag = function (e) {
                if (e.keyCode === 13) {
                    if ("" === $(title).val() || "" === $(url).val()) return false;

                    debugger;
                    if ($(is_blank).is(':checked'))
                        insert('<a href="' + $(url).val() + '" target="_blank">' + $(title).val() + '</a>');
                    else
                        insert('[' + title.val() + '](' + url.val() + ')');

                    $(title).val('');
                    $(url).val('');
                    $(insert_link_panel).addClass('hidden');
                    return false;
                }
                return true;
            };

            $(url).keyup(function () {
                var str = $(this).val();
                if (autoToggle) {
                    if (str.match(/^https?:\/\//))
                        $(is_blank).prop('checked', true);
                    else
                        $(is_blank).prop('checked', false);
                }
            });

            $(is_blank).click(function () {
                autoToggle = false;
            });

            $(title).keypress(insertLinkTag);
            $(url).keypress(insertLinkTag);
            $(is_blank).prop('checked', false);


        };
        $(insert_link_btn).click(insert_link_btn_click);
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

                if (slug === '--') slug = '';

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
                    if (e.keyCode === 13) {
                        $.post('/control-panel/category/' + $(row).attr('data'), {
                            '_method': 'patch',
                            'name': name_inp.val(),
                            'slug': slug_inp.val(),
                        }, function (data) {
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