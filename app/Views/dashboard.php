<?php helper('text'); ?>

<?= $this->include('layout/header') ?>

<div class="container-fluid mt-4">
    <div class="row">
        <?= $this->include('layout/sidebar') ?>
        
        <div class="col-md-9">
            <h2><i class="fas fa-tachometer-alt me-2"></i><?= $title ?></h2>
            
            <!-- Statistik Cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="card-title"><?= $total_articles ?></h4>
                                    <p class="card-text">Total Artikel</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-newspaper fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="card-title"><?= $published_articles ?></h4>
                                    <p class="card-text">Artikel Published</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-check-circle fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="card-title"><?= $draft_articles ?></h4>
                                    <p class="card-text">Artikel Draft</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-edit fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="card-title"><?= $total_feedback ?></h4>
                                    <p class="card-text">Total Feedback</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-comments fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Data -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-newspaper me-2"></i>Artikel Terbaru
                            </h5>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($recent_articles)): ?>
                                <div class="list-group list-group-flush">
                                    <?php foreach ($recent_articles as $article): ?>
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1"><?= esc($article['title']) ?></h6>
                                                <small class="text-muted">
                                                    <?= date('d/m/Y H:i', strtotime($article['created_at'])) ?>
                                                </small>
                                            </div>
                                            <span class="badge bg-<?= $article['status'] == 'published' ? 'success' : 'warning' ?> rounded-pill">
                                                <?= ucfirst($article['status']) ?>
                                            </span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <p class="text-muted text-center">Belum ada artikel</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-comments me-2"></i>Feedback Terbaru
                            </h5>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($recent_feedback)): ?>
                                <div class="list-group list-group-flush">
                                    <?php foreach ($recent_feedback as $feedback): ?>
                                        <div class="list-group-item">
                                            <h6 class="mb-1"><?= esc($feedback['name']) ?></h6>
                                            <p class="mb-1"><?= character_limiter(esc($feedback['message']), 100) ?></p>
                                            <small class="text-muted">
                                                <?= esc($feedback['email']) ?> • 
                                                <?= date('d/m/Y H:i', strtotime($feedback['created_at'])) ?>
                                            </small>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <p class="text-muted text-center">Belum ada feedback</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/footer') ?> 