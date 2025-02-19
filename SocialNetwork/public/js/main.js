var url = 'http://social-network.com/';
window.addEventListener('load', function() {
    // using jquery
    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');

    //like button
    // with unbind we avoid multiple clicks
    function like() {
        $('.btn-like').unbind('click').click(function() {
            console.log('like');
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src', url + 'img/heart-red.png');
            // using ajax
            $.ajax({
                // with data we send the id of the post comming from the data-id attribute of HTML
                url: url + 'like/' + $(this).data('id'),
                type: 'GET',
                success: function(response) {
                    if (response.like) {
                        console.log('You liked the post');
                    } else {
                        console.log('Error');
                    }
                }
            });
            dislike();
        });
    }
    like();

    // dislike button
    function dislike() {
        $('.btn-dislike').unbind('click').click(function() {
            console.log('dislike');
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src', url + 'img/heart-black.png');
            // using ajax
            $.ajax({
                // with data we send the id of the post comming from the data-id attribute of HTML
                url: url + 'dislike/' + $(this).data('id'),
                type: 'GET',
                success: function(response) {
                    if (response.like) {
                        console.log('You disliked the post');
                    } else {
                        console.log('Error');
                    }
                }
            });
            like();
        });
    }
    dislike();

    // search
    $('#search-form').submit(function() {
        $(this).attr('action', url + 'people/' + $('#search-form #search').val());
    });
    // end jquery
});