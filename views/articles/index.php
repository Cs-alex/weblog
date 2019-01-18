<?php require 'views/head.php'; ?>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>public/css/articles.css">
        <script type="text/javascript" src="<?php echo BASEURL; ?>public/js/articles.js"></script>
    </head>
    <body class="<?php echo $this->scheme['color_scheme'] == null ? 'body-scheme-0' : 'body-'.$this->scheme['color_scheme']; ?>">
        <div class="container-fluid text-center">
            <?php require 'views/header.php'; ?>
            <main>
                <article class="<?php echo $this->scheme['color_scheme'] == null ? 'scheme-0' : $this->scheme['color_scheme']; ?>">
                    <div class="row mb-3 mt-3">
                        <div class="col-12">
                            <h1 class="title <?php echo $this->scheme['color_scheme'] == null ? 'text-large-scheme-0' : 'text-large-'.$this->scheme['color_scheme']; ?>"><?php echo $this->article[0]['title']; ?></h1>
                        </div>
                    </div>
                    <?php foreach ($this->components as $components): ?>
                        <?php if ($components['component_type'] == 'p'): ?>
                            <div class="row mb-3 mt-3">
                                <div class="col-12">
                                    <p class="article-text"><?= $components['article_text']; ?></p>
                                </div>
                            </div>
                        <?php elseif ($components['component_type'] == 'img'): ?>
                            <div class="row mb-3 mt-3">
                                <div class="article-img">
                                    <?php if ($components['article_order'] != 0): ?>
                                        <img src="<?= BASEURL.$components['article_image']; ?>">
                                    <?php endif; ?>
                                    <?php echo $components['image_seo'] != null ? '<span class="text-small font-italic text-small-'.$this->scheme['color_scheme'].'">'.$components['image_seo'].'</span>' : ''; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="row">
                        <div class="col-6">
                            <div class="article-buttons">
                                <div class="article-buttons-left">
                                    <!-- Like -->
                                    <button class="article-btn upvote <?php echo $this->voted['upvote'] == true ? 'upvoted' : ''; ?>">
                                        <i class="fas fa-arrow-up"></i>
                                    </button>
                                    <span class="upvote-count"><?php echo $this->article[0]['upvote'] == null ? 0 : $this->article[0]['upvote']; ?></span>
                                    <!-- Dislike -->
                                    <button class="article-btn downvote <?php echo $this->voted['downvote'] == true ? 'downvoted' : ''; ?>">
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                    <span class="downvote-count"><?php echo $this->article[0]['downvote'] == null ? 0 : $this->article[0]['downvote']; ?></span>
                                    <!-- Comment -->
                                    <div class="article-btn comments" id="new-article-comment">
                                        <i class="fas fa-comment-alt"></i>
                                    </div>
                                    <span class="comment-count disqus-comment-count" data-disqus-url="https://csalex.herokuapp.com/Articles/article/<?php echo $this->article[0]['seo']; ?>"></span>
                                    <!-- Látogatók -->
                                    <div class="article-btn visitors">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <span class="visitor-count"><?php echo $this->article[0]['visitor']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <span class="text-small <?php echo $this->scheme['color_scheme'] == null ? 'text-small-scheme-0' : 'text-small-'.$this->scheme['color_scheme']; ?>"><?php echo str_replace('-', '.', $this->article[0]['created_at']); ?></span>
                        </div>
                        <div class="w-100">
                            <img src="<?php echo BASEURL; ?>/public/img/divider.png">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id="article-comment-wrapper"></div>
                        </div>
                    </div>
                    <div id="disqus_thread"></div>
                </article>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            </main>
        </div>
<?php require 'views/footer.php';