<?= $this->include('layout/header') ?>

<div class="container-fluid mt-4">
    <div class="row">
        <?= $this->include('layout/sidebar') ?>
        
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>
                    <i class="fas fa-<?= isset($article) ? 'edit' : 'plus' ?> me-2"></i>
                    <?= $title ?>
                </h2>
                <a href="<?= base_url('artikel') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i>Kembali
                </a>
            </div>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Error:</strong>
                    <ul class="mb-0 mt-2">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <form action="<?= isset($article) ? base_url('artikel/update/' . $article['id']) : base_url('artikel/store') ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Artikel <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control <?= (session()->getFlashdata('errors.title')) ? 'is-invalid' : '' ?>" 
                                   id="title" 
                                   name="title" 
                                   value="<?= old('title', isset($article) ? $article['title'] : '') ?>" 
                                   placeholder="Masukkan judul artikel">
                            <?php if (session()->getFlashdata('errors.title')): ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashdata('errors.title') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Konten Artikel <span class="text-danger">*</span></label>
                            <textarea class="form-control <?= (session()->getFlashdata('errors.content')) ? 'is-invalid' : '' ?>" 
                                      id="content" 
                                      name="content" 
                                      rows="10" 
                                      placeholder="Masukkan konten artikel"><?= old('content', isset($article) ? $article['content'] : '') ?></textarea>
                            <?php if (session()->getFlashdata('errors.content')): ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashdata('errors.content') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select <?= (session()->getFlashdata('errors.status')) ? 'is-invalid' : '' ?>" 
                                    id="status" 
                                    name="status">
                                <option value="">Pilih status</option>
                                <option value="draft" <?= (old('status', isset($article) ? $article['status'] : '') == 'draft') ? 'selected' : '' ?>>Draft</option>
                                <option value="published" <?= (old('status', isset($article) ? $article['status'] : '') == 'published') ? 'selected' : '' ?>>Published</option>
                            </select>
                            <?php if (session()->getFlashdata('errors.status')): ?>
                                <div class="invalid-feedback">
                                    <?= session()->getFlashdata('errors.status') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="<?= base_url('artikel') ?>" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i>Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>
                                <?= isset($article) ? 'Update' : 'Simpan' ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/footer') ?> 