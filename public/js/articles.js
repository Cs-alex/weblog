$(document).ready(function() {
	
	var seo = window.location.pathname.split('/');

    // Like és dislike
    $('.upvote, .downvote').click(function() {
        var $this = $(this);
        var vote = $(this).attr('class').split(' ')[1];
        $.ajax({
            type: 'POST',
            url: '/vote/' + seo[3],
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: { data: vote },
            success: function(result) {
                var count = JSON.parse(result);
                if (vote == 'upvote') {
                    if ($this.hasClass('upvoted')) {
                        $this.removeClass('upvoted');
                    } else {
                        $this.addClass('upvoted');
                    }
                    $('.downvote').removeClass('downvoted');
                    $this.siblings('.upvote-count').text(count.upvote);
                    $this.siblings('.downvote-count').text(count.downvote);
                } else {
                    if ($this.hasClass('downvoted')) {
                        $this.removeClass('downvoted');
                    } else {
                        $this.addClass('downvoted');
                    }
                    $('.upvote').removeClass('upvoted');
                    $this.siblings('.upvote-count').text(count.upvote);
                    $this.siblings('.downvote-count').text(count.downvote);
                }
            }
        });
    });

    // Disqus
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://http-localhost-weblog.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();

});