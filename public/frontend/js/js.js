$(function(){

    /* build and append preformated code examples */
    $("div#content").find("p").last().after(buildCodeBlocks);

    /* toggle/collapse preformated code blocks */
    $("pre").bind("click", function(){
        this.className = this.className.indexOf("collapse") === -1 ?
    		( "collapse " + this.className ) : this.className.replace("collapse ", "");
    });
    
    /* apply code highlight */
    $('pre code').each( function(i, e) {
        hljs.highlightBlock(e, '    ');
    });

});

function buildCodeBlocks() {
    return "<div class='codeBlocks clearfix'>" +
    "<pre class='html'><code>" + getHtml() + "</code></pre>" +
    "<pre class='javascript'><code>" + cleanJson( $("head script").last().text() ) + "</code></pre>" +
    "<pre class='css'><code>" + cleanCSS( $("head style").text() ) + "</code></pre>" +
    "</div>";
}


function getHtml() {
    var clone, ul, li, code;

    clone = $("<div />").append($("div#content").contents().not("h2, p").clone());
    ul = clone.find("ul");
    li = ul.find("li");

    li.slice(3, li.length).remove();
    ul.append("...");

    code = clone.html();

    return cleanHTML(code).replace(/</gi, "&lt;").replace(/>/gi, "&gt;");;
    //code = $.tabifier(code, "HTML").replace(/</gi, "&lt;").replace(/>/gi, "&gt;");

}
  $(function() {
    $("div.holder").jPages({
      containerID: "itemContainer",
      previous : "←",
      next : "→",
      perPage:20,
      midRange: 3,
      direction: "random",
      animation: "flipInY"
    });
  });
  ///youtube video player
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          videoId: 'pdtsOCWChaA',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
