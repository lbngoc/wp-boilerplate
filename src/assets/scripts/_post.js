const PostPage = {
  init: () => {
    let $oEmbed = $('.hentry iframe');
    $oEmbed.each((i, e) => {
      let url = $(e).attr('src');
      if (url.match(/(http:\/\/|https:\/\/|)(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/)) {
        $(e).wrap('<div class="oembed-container"></div>');
      }
    });
  }
};

export default PostPage;
