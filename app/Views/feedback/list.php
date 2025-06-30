<?= $this->include('layout/header') ?>
<div class="container-fluid mt-4">
    <div class="row">
        <?= $this->include('layout/sidebar') ?>
        <div class="col-md-9">
            <h2><i class="fas fa-comments me-2"></i>Daftar Feedback</h2>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            <div class="card mt-3">
                <div class="card-body">
                    <?php if (!empty($feedbacks)): ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Pesan</th>
                                        <th>Dikirim</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($feedbacks as $i => $fb): ?>
                                        <tr>
                                            <td><?= $i+1 ?></td>
                                            <td><?= esc($fb['name']) ?></td>
                                            <td><?= esc($fb['email']) ?></td>
                                            <td><?= esc($fb['message']) ?></td>
                                            <td><small><?= date('d/m/Y H:i', strtotime($fb['created_at'])) ?></small></td>
                                            <td>
                                                <button onclick="confirmDelete('<?= base_url('feedback/delete/' . $fb['id']) ?>')" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-info">Belum ada feedback.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('layout/footer') ?> 