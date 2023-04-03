// Products AJAX
// ================================================
$(document).ready(function() {
    var button = $('#productsBtnMore'),
        paged = '',
        postsPerPage = '',
        controlWidth = '',
        maxPages = ''


    firstRenderingPosts(event);
    function firstRenderingPosts(event) {
        if ($(window).width() < 698) {
            paged = 1;
            postsPerPage = 6;
            controlWidth = 698;

        } else {
            paged = '';
            postsPerPage = '';
            controlWidth = 725;
        }

        displayPosts(event);
    }


    function removeItemAndStorage() {
        var objects = $(".products__posts-item");
        $.each(objects,function(index,value){
            value.remove();
        });
        var productsStorage = $(".products__storage");
        productsStorage.remove();
    }


    $(window).resize(function(event) {
        if ($(window).width() < 698) {
            if(controlWidth != 698) {
                removeItemAndStorage();
                paged = 1;
                postsPerPage = 6;
                displayPosts(event);
            }
            controlWidth = 698;
        } else {
            if(controlWidth != 725){
                removeItemAndStorage();
                paged = '';
                postsPerPage = '';
                displayPosts(event);
                button.removeClass("hidden");
            }
            controlWidth = 725;
        }
    });



    button.click(displayPosts);
    function displayPosts (event) {

        event.preventDefault();

        const data = {
            paged: paged,
            action: 'nextPost',
            postsPerPage: postsPerPage
        }

        $.ajax({
            type: 'POST',
            url: ajaxData.ajaxurl,
            data,
            beforeSend: function (xhr) {
                button.text('Loading...');
            },
            success: function (data) {

                if ($.trim(data) != '') {
                    $('#productsPosts').append(data);
                    paged++;
                    maxPages = $('#productsStorage').data('max-pages');
                }
                button.text('Show more');

                // if it's last page, delete button
                if (paged > maxPages) {
                    button.addClass("hidden");
                }
            }
        });
    }

});


// ================================================
