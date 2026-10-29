<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Alert Notifikasi Flashdata -->
<?php if($this->session->flashdata('success')): ?>
    <div class="card-panel green lighten-5 green-text text-darken-4" style="border-radius: 12px; border-left: 5px solid #2e7d32; margin-bottom: 25px;">
        <i class="material-icons left" style="vertical-align: middle;">check_circle</i>
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('error')): ?>
    <div class="card-panel red lighten-5 red-text text-darken-4" style="border-radius: 12px; border-left: 5px solid #d32f2f; margin-bottom: 25px;">
        <i class="material-icons left" style="vertical-align: middle;">error</i>
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<!-- Header Section + Tombol Hapus Semua -->
<div class="row" style="margin-bottom: 35px; align-items: center;">
    <div class="col s12 m8">
        <h3 class="text-gradient" style="font-weight: 800; margin: 0 0 10px 0; letter-spacing: -1px;">Eksplorasi Karya</h3>
        <p class="grey-text text-darken-1" style="font-size: 1.15rem; font-weight: 500; margin: 0;">Galeri kreatif praktikum Sistem Multimedia.</p>
    </div>
    <?php if(!empty($home_post)): ?>
        <div class="col s12 m4 right-align" style="margin-top: 15px;">
            <!-- Tombol HAPUS SEMUA DATA -->
            <a href="<?= site_url('welcome/delete_all'); ?>" 
               class="btn red darken-1 waves-effect waves-light z-depth-0" 
               style="border-radius: 30px; font-weight: 600; text-transform: none; padding: 0 20px;" 
               onclick="return confirm('PERINGATAN: Apakah Anda yakin ingin menghapus SEMUA karya beserta berkasnya? Tindakan ini tidak dapat dibatalkan!');">
                <i class="material-icons left">delete_forever</i>Hapus Semua Karya
            </a>
        </div>
    <?php endif; ?>
</div>

<?php if(empty($home_post)): ?>

    <div class="row">
        <div class="col s12 m10 offset-m1 l8 offset-l2">
            <div class="empty-state">
                <i class="material-icons floating-icon">play_circle_filled</i>
                <h5 style="font-weight: 800; color: #1e293b;">Ruang Pameran Masih Kosong</h5>
                <p class="grey-text" style="font-size: 1.1rem; margin-bottom: 35px;">Tunjukkan kreativitasmu dan jadilah yang pertama mengunggah karya ke galeri ini.</p>
                <a href="<?= site_url('welcome/create'); ?>" class="btn-large btn-gradient z-depth-0 waves-effect waves-light">
                    <i class="material-icons left">cloud_upload</i>Unggah Karya
                </a>
            </div>
        </div>
    </div>

<?php else: ?>

    <div class="row">
        <?php foreach ($home_post as $data): ?>
        <div class="col s12 m6 l4">
            <div class="card hoverable" style="border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06); transition: all 0.3s ease;">
                
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="<?= base_url('upload/post/'.$data['thumbnail']); ?>" style="height: 220px; width: 100%; object-fit: cover;">
                </div>
                
                <div class="card-content" style="padding: 18px 20px;">
                    <span class="card-title activator grey-text text-darken-4 truncate" style="font-size: 1.15rem; font-weight: 700;">
                        <?= htmlspecialchars($data['name']); ?>
                        <i class="material-icons right" style="color: #94a3b8;">more_vert</i>
                    </span>
                    
                    <!-- Baris Tombol Aksi: LIHAT DETAIL & HAPUS -->
                    <div class="row" style="margin-top: 18px; margin-bottom: 0;">
                        <!-- Tombol LIHAT DETAIL -->
                        <div class="col s7" style="padding-left: 0; padding-right: 4px;">
                            <a href="<?= site_url("welcome/index/".$data['id']); ?>" 
                               class="btn-small btn-gradient z-depth-0 waves-effect waves-light" 
                               style="width: 100%; border-radius: 20px; font-weight: 600; text-transform: none; text-align: center;">
                                <i class="material-icons left" style="margin-right: 4px; font-size: 16px;">visibility</i>Detail
                            </a>
                        </div>
                        <!-- Tombol HAPUS SALAH SATU DATA -->
                        <div class="col s5" style="padding-left: 4px; padding-right: 0;">
                            <a href="<?= site_url("welcome/delete/".$data['id']); ?>" 
                               class="btn-small red lighten-1 waves-effect waves-light z-depth-0 white-text" 
                               style="width: 100%; border-radius: 20px; font-weight: 600; text-transform: none; text-align: center;"
                               onclick="return confirm('Apakah Anda yakin ingin menghapus karya: <?= addslashes(htmlspecialchars($data['name'])); ?>?');">
                                <i class="material-icons left" style="margin-right: 4px; font-size: 16px;">delete</i>Hapus
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-reveal" style="padding: 24px;">
                    <span class="card-title grey-text text-darken-4" style="font-size: 1.15rem; font-weight: 700;">
                        <?= htmlspecialchars($data['name']); ?>
                        <i class="material-icons right">close</i>
                    </span>
                    <p style="margin-top: 15px; line-height: 1.6; color: #546e7a;">
                        <small><?= nl2br(htmlspecialchars($data['description'])); ?></small>
                    </p>
                
                    <div style="margin-top: 20px;">
                        <a href="<?= base_url('upload/post/'.$data['filename']); ?>" target="_blank" class="btn-small blue-grey darken-3 z-depth-0" style="width: 100%; border-radius: 20px; margin-bottom: 8px;">
                            <i class="material-icons left">play_circle_outline</i>Buka Media
                        </a>
                        <a href="<?= site_url("welcome/update/".$data['id']); ?>" class="btn-small blue darken-1 z-depth-0" style="width: 100%; border-radius: 20px;">
                            <i class="material-icons left">edit</i>Edit Karya
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>
