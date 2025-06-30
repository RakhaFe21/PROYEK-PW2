<?php helper('text'); ?>

<?= $this->include('layout/header') ?>

<div class="container-fluid mt-4">
    <div class="row">
        <?= $this->include('layout/sidebar') ?>
        
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2><i class="fas fa-newspaper me-2"></i><?= $title ?></h2>
                <a href="<?= base_url('artikel/create') ?>" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>Tambah Artikel
                </a>
            </div>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i><?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <?php if (!empty($articles)): ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="40%">Judul</th>
                                        <th width="15%">Status</th>
                                        <th width="20%">Dibuat</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($articles as $i => $article): ?>
                                        <tr>
                                            <td><?= $i + 1 ?></td>
                                            <td>
                                                <strong><?= esc($article['title']) ?></strong>
                                                <br>
                                                <small class="text-muted">
                                                    <?= character_limiter(esc($article['content']), 100) ?>
                                                </small>
                                            </td>
                                            <td>
                                                <?php if ($article['status'] == 'published'): ?>
                                                    <span class="badge bg-success">Published</span>
                                                <?php else: ?>
                                                    <span class="badge bg-warning">Draft</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <small><?= date('d/m/Y H:i', strtotime($article['created_at'])) ?></small>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('artikel/edit/' . $article['id']) ?>" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button onclick="confirmDelete('<?= base_url('artikel/delete/' . $article['id']) ?>')" 
                                                        class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Belum ada artikel</h5>
                            <p class="text-muted">Mulai dengan menambahkan artikel pertama Anda.</p>
                            <a href="<?= base_url('artikel/create') ?>" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i>Tambah Artikel Pertama
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/footer') ?> 