<?php require 'views/head.php'; ?>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>public/css/dashboard.css">
        <script type="text/javascript" src="<?php echo BASEURL; ?>public/js/dashboard.js"></script>
    </head>
    <body>
        <div class="container-fluid text-center">
            <?php require 'views/header.php'; ?>
            <main>
                <div class="col-12">
                    <?php if (empty($this->articles)): ?>
                        <h1 class="lit-text-heavy">Nincs találat</h1>
                    <?php else: ?>
                        <?php foreach ($this->articles as $article): ?>
                            <article class="row">
                                <div class="col-4 article-small-img">
                                    <img src="<?= BASEURL.$article['img']; ?>">
                                </div>
                                <div class="col-8 article-wrapper text-left">
                                    <div>
                                        <a href="<?php echo BASEURL; ?>articles/article/<?= $article['seo']; ?>" class="lit-text-heavy title"><?= $article['title']; ?></a>
                                    </div>
                                    
                                    <p><?= $article['txt']; ?></p>
                                    <div>
                                        <div class="article-buttons-left">
                                            <span class="lit-text-light"><?= str_replace('-', '.', $article['created_at']); ?></span>
                                        </div>
                                        <div class="article-buttons-right">
                                            <div class="d-inline upvote-count">
                                                <i class="fas fa-thumbs-up"></i>
                                                <span><?= $article['upvote'] == null ? 0 : $article['upvote']; ?></span>
                                            </div>
                                            <div class="d-inline downvote-count">
                                                <i class="fas fa-thumbs-down"></i>
                                                <span><?= $article['downvote'] == null ? 0 : $article['downvote']; ?></span>
                                            </div>
                                            <div class="d-inline comment-count">
                                                <i class="fas fa-comment-alt"></i>
                                                <span class="disqus-comment-count" data-disqus-url="http://localhost/WeBlog/articles/article/<?= $article['seo']; ?>"></span>
                                            </div>
                                            <div class="d-inline visitor-count">
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