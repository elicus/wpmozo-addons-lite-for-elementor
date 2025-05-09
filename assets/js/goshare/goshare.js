(function ($) {

    $.fn.goshare = function () {
        let $this = ".wpmozo-search-meyes";
         $('body').append('<div id="social" style=" height:auto; position:absolute; left:-999px; top:-999px;-webkit-transition: opacity 0.8s ease;transition: opacity 0.8s ease;-moz-transition: opacity 0.8s ease;opacity:0.1; line-height: 0;"><a id="goshare-facebook" style="float:left; margin-right:4px; display:block; cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 72 72" viewBox="0 0 72 72"><path d="M41.4 71V39.1h10.7l1.6-12.4H41.4v-7.9c0-3.6 1-6.1 6.2-6.1h6.6V1.5C53 1.3 49.1 1 44.6 1c-9.5 0-16 5.8-16 16.4v9.2H17.8V39h10.7v32h12.9z"/></svg></a><a id="goshare-twitter" style="float:left; margin-right:4px; display:block; cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 72 72" viewBox="0 0 72 72"><path d="m65.3 63.8-23-33.4-2.6-3.8L23.3 2.8l-1.4-2H1.8L6.7 8l21.8 31.7 2.6 3.8L48.7 69l1.4 2h20.2l-5-7.2zm-12.9 2.6L34.2 39.9l-2.6-3.8L10.5 5.4h9.1l17.1 24.9 2.6 3.8 22.3 32.4h-9.2z"/><path d="m31.6 36.2 2.6 3.7-3.1 3.6L7.5 71H1.7l26.8-31.2zM67.8.9 42.3 30.5l-3 3.6-2.6-3.8 3.1-3.6L57 6.6l5-5.7z"/></svg></a><a id="goshare-search" style="float:left; margin-right:4px; display:block; cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 72 72" viewBox="0 0 72 72"><path d="M29.2 1C13.6 1 1 13.6 1 29.2s12.6 28.2 28.2 28.2c6.7 0 12.9-2.4 17.7-6.3l19.1 19c1.1 1.2 3 1.2 4.1.1 1.2-1.1 1.2-3 .1-4.1l-.1-.1L51 46.9c3.9-4.8 6.3-11 6.3-17.7C57.4 13.6 44.7 1 29.2 1zm0 5.8c12.4 0 22.3 10 22.3 22.3 0 6-2.4 11.5-6.2 15.5l-.6.6c-4 3.9-9.5 6.2-15.5 6.2-12.4 0-22.3-10-22.3-22.3S16.8 6.8 29.2 6.8z"/></svg></a><a id="goshare-translate" style="float:left; margin-right:4px; display:block; cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 72 72" viewBox="0 0 72 72"><path d="M5.8 1C3.1 1 1 3.1 1 5.8v31.8c0 2.7 2.1 4.8 4.8 4.8h.6L9 39.2H5.8c-1 0-1.6-.6-1.6-1.6V5.8c0-1 .6-1.6 1.6-1.6h31.8c1 0 1.6.6 1.6 1.6v23.9h-4.8c-2.7 0-4.8 2.1-4.8 4.8v4.8h-8l2.5 3.2h5.4v5.4l3.2 2.7V34.4c0-1 .6-1.6 1.6-1.6h31.8c1 0 1.6.6 1.6 1.6v31.8c0 1-.6 1.6-1.6 1.6H34.4c-1 0-1.6-.6-1.6-1.6V63l-3.2 2.7v.5c0 2.7 2.1 4.8 4.8 4.8h31.8c2.7 0 4.8-2.1 4.8-4.8V34.4c0-2.7-2.1-4.8-4.8-4.8H42.4V5.8c0-2.7-2.1-4.8-4.8-4.8H5.8zm15.9 8v3.2H9v3.2h18.9c-.5 3.5-2.6 6.5-5.2 8.8-4-3.5-6-7.2-6-7.2l-2.8 1.5s2.1 3.8 6.3 7.7c-.1.1-.2.2-.3.2-4.2 2.9-8.4 4.3-8.4 4.3l1 3s4.6-1.5 9.2-4.7c.3-.2.7-.5 1-.7 1.8 1.3 3.9 2.6 6.3 3.5l1.2-3c-1.8-.7-3.5-1.7-4.9-2.7 2.9-2.8 5.3-6.3 5.8-10.8H36v-3.2H24.9V9h-3.2zm-6.4 27-8 9.5h4.8v6.4h6.4v-6.4h4.8l-8-9.5zm33.4 2.2-8.3 21.9h4l1.7-5.1h8.4l1.8 5.1h4L52 38.2h-3.3zm1.6 4.8 3.2 9h-6.4l3.2-9zm-23.8 5.7v4.8H12.1l6.4 6.4h8v4.8l9.5-8-9.5-8z"/></svg></a><br style="clear:both;"/></div>');

        $('#goshare-search').mousedown(function () {
            var selection = getSelected();
            window.open('https://www.google.com/search?q=' + selection, '_blank');
            HideGoShar();
            return false;
        });

        $('#goshare-translate').mousedown(function () {
            var selection = getSelected();
            window.open('https://translate.google.com/#auto/es/' + selection, '_blank');
            HideGoShar();
            return false;
        });

        $('#goshare-facebook').mousedown(function () {
            var selection = getSelected();
            var fbPop = window.open("https://www.facebook.com/sharer/sharer.php?u=" + location.href, "", "width=600,height=400");
            console.log(location.href);
            HideGoShar();
            return false;
        });

        $('#goshare-twitter').mousedown(function () {
            var selection = getSelected();
            console.log(selection);
            var twPop = window.open("https://twitter.com/intent/tweet?&text=" + selection + "&url=" + location.href, "", "width=600,height=400");
            HideGoShar();
            return false;
        });

        function getSelected() {
            if (window.getSelection) { return window.getSelection(); }
            else if (document.getSelection) { return document.getSelection(); }
            else {
                var selection = document.selection && document.selection.createRange();
                if (selection.text) { return selection.text; }
                return false;
            }
            return false;
        }

        function HideGoShar() {
            $("#social").css({ left: "-999px", top: "-999px", opacity: 0.1 });
            return false;
        }

        $(document).ready(function () {
            $($this).mouseup(function () {
                var selection = getSelected();
                var e = window.event;
                var posX = e.clientX;
                var posY = e.clientY;
                posX = posX + 10;
                posY = posY + 10;
                if (selection == "") { HideGoShar(); }
                else { $("#social").css({ left: posX, top: posY, opacity: 1 }); }
            });
        });
        return this;
    };

    $(".wpmozo-search-meyes").goshare();
    

} (jQuery));