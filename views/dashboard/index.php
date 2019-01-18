<?php require 'views/head.php'; ?>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>public/css/dashboard.css">
        <script type="text/javascript" src="<?php echo BASEURL; ?>public/js/dashboard.js"></script>
    </head>
    <body class="<?php echo $this->scheme['color_scheme'] == null ? 'body-scheme-0' : 'body-'.$this->scheme['color_scheme']; ?>">
        <div class="container-fluid text-center">
            <?php require 'views/header.php'; ?>
            <main>
                <div class="col-12">
                    <?php if (empty($this->articles)): ?>
                        <h1 class="<?php echo $this->scheme['color_scheme'] == null ? 'text-large-scheme-0' : 'text-large-'.$this->scheme['color_scheme']; ?>">Nincs találat</h1>
                    <?php else: ?>
                        <div id="select" class="row <?php echo $this->scheme['color_scheme'] == null ? 'text-small-scheme-0' : 'text-small-'.$this->scheme['color_scheme']; ?>">
                            <div class="select-items <?php echo $this->scheme['color_scheme'] == null ? 'search-scheme-0' : 'search-'.$this->scheme['color_scheme']; ?>">
                                <span>Legújabb</span>
                                <i class="fas fa-angle-down select-arrow"></i>
                            </div>
                            <div id="options" class="hidden">
                                <div class="option <?php echo $this->scheme['color_scheme'] == null ? 'menu-scheme-0' : 'menu-'.$this->scheme['color_scheme']; ?>" data-option="0">Legújabb</div>
                                <div class="option <?php echo $this->scheme['color_scheme'] == null ? 'menu-scheme-0' : 'menu-'.$this->scheme['color_scheme']; ?>" data-option="1">Legkedveltebb</div>
                                <div class="option <?php echo $this->scheme['color_scheme'] == null ? 'menu-scheme-0' : 'menu-'.$this->scheme['color_scheme']; ?>" data-option="2">Leglátogatottabb</div>
                            </div>
                        </div>
                        <?php foreach ($this->articles as $article): ?>
                            <article class="row <?php echo $this->scheme['color_scheme'] == null ? 'scheme-0' : $this->scheme['color_scheme']; ?>">
                                <div class="col-4 article-small-img">
                                    <img src="<?= BASEURL.$article['img']; ?>">
                                </div>
                                <div class="col-8 article-wrapper text-left">
                                    <div>
                                        <a href="<?php echo BASEURL; ?>Articles/article/<?= $article['seo']; ?>" class="title <?php echo $this->scheme['color_scheme'] == null ? 'text-large-scheme-0' : 'text-large-'.$this->scheme['color_scheme']; ?>"><?= $article['title']; ?></a>
                                    </div>
                                    <p><?= $article['txt']; ?></p>
                                    <div>
                                        <div class="article-buttons-left">
                                            <span class="text-small <?php echo $this->scheme['color_scheme'] == null ? 'text-small-scheme-0' : 'text-small-'.$this->scheme['color_scheme']; ?>"><?= str_replace('-', '.', $article['created_at']); ?></span>
                                        </div>
                                        <div class="article-buttons-right">
                                            <div class="d-inline count">
                                                <i class="fas fa-thumbs-up"></i>
                                                <span><?= $article['upvote'] == null ? 0 : $article['upvote']; ?></span>
                                            </div>
                                            <div class="d-inline count">
                                                <i class="fas fa-thumbs-down"></i>
                                                <span><?= $article['downvote'] == null ? 0 : $article['downvote']; ?></span>
                                            </div>
                                            <div class="d-inline count">
                                                <i class="fas fa-comment-alt"></i>
                                                <span class="disqus-comment-count" data-disqus-url="https://csalex.herokuapp.com/Articles/article/<?= $article['seo']; ?>"></span>
                                            </div>
                                            <div class="d-inline count">
                                                <i class="fas fa-eye"></i>
                                                <span><?= $article['visitor'] == null ? 0 : $article['visitor']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </main>
        </div>
<?php require 'views/footer.php';