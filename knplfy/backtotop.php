<a id="back-to-top-btn"></a>

<style>
    #back-to-top-btn {
        display: inline-block;
        background-color: #5CB85C;
        width: 50px;
        height: 50px;
        text-align: center;
        border-radius: 4px;
        position: fixed;
        bottom: 30px;
        right: 30px;
        transition: background-color .3s,
            opacity .5s, visibility .5s;
        opacity: 0;
        visibility: hidden;
        z-index: 1000;
    }

    #back-to-top-btn::after {
        content: "\f077";
        font-family: FontAwesome;
        font-weight: normal;
        font-style: normal;
        font-size: 2em;
        line-height: 50px;
        color: #fff;
    }

    #back-to-top-btn:hover {
        cursor: pointer;
        background-color: #333;
    }

    #back-to-top-btn:active {
        background-color: #555;
    }

    #back-to-top-btn.show {
        opacity: 1;
        visibility: visible;
    }
</style>

<script>
    var btn = $('#back-to-top-btn');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });
</script>