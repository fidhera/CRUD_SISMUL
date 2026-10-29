<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row" style="margin-top: 20px;">
    <div class="col s12 m10 offset-m1 l8 offset-l2">
        
        <!-- Tombol Kembali ke Beranda -->
        <div style="margin-bottom: 20px;">
            <a href="<?= base_url(); ?>" class="waves-effect waves-light btn-flat" style="padding: 0 10px; font-weight: 600; color: #64748b; display: inline-flex; align-items: center;">
                <i class="material-icons left" style="margin-right: 5px;">arrow_back</i>Kembali ke Beranda
            </a>
        </div>

        <!-- Alert Notifikasi Flashdata -->
        <?php if($this->session->flashdata('success')): ?>
            <div class="card-panel green lighten-5 green-text text-darken-4" style="border-radius: 12px; border-left: 5px solid #2e7d32; margin-bottom: 20px;">
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('error')): ?>
            <div class="card-panel red lighten-5 red-text text-darken-4" style="border-radius: 12px; border-left: 5px solid #d32f2f; margin-bottom: 20px;">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div class="card z-depth-0" style="border-radius: 24px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.04); background: #ffffff;">
            
            <!-- Pemutar Media / Berkas -->
            <div class="card-image" style="background: #0f172a; text-align: center; padding: 10px 0;">
                <?php 
                    $ext = pathinfo($post->filename, PATHINFO_EXTENSION);
                    if(in_array(strtolower($ext), ['mp4', 'webm', 'ogg', 'mov'])): 
                ?>
                    <!-- Pemutar Video -->
                    <video controls preload="metadata" style="width: 100%; max-height: 420px; display: block; background: #000;">
                        <source src="<?= base_url('upload/post/' . $post->filename); ?>" type="video/<?= $ext == 'mov' ? 'mp4' : $ext; ?>">
                        Browser Anda tidak mendukung pemutar video.
                    </video>
                <?php elseif(in_array(strtolower($ext), ['mp3', 'wav', 'aac'])): ?>
                    <!-- Pemutar Audio -->
                    <div style="padding: 40px 20px; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <i class="material-icons" style="font-size: 64px; color: #ffffff; margin-bottom: 15px;">audiotrack</i>
                        <audio controls style="width: 100%; max-width: 400px; display: block; margin: 0 auto;">
                            <source src="<?= base_url('upload/post/' . $post->filename); ?>" type="audio/<?= $ext; ?>">
                            Browser Anda tidak mendukung pemutar audio.
                        </audio>
                    </div>
                <?php else: ?>
                    <!-- Unduh Berkas Umum -->
                    <div style="padding: 50px; color: #fff;">
                        <i class="material-icons" style="font-size: 48px; color: #4facfe; margin-bottom: 10px;">insert_drive_file</i>
                        <p style="margin-bottom: 20px;">Berkas berformat .<?= $ext; ?></p>
                        <a href="<?= base_url('upload/post/' . $post->filename); ?>" target="_blank" class="btn btn-gradient">Unduh Berkas</a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Konten / Detail Karya -->
            <div class="card-content" style="padding: 30px;">
                <h4 style="font-weight: 800; color: #1e293b; margin-top: 0; margin-bottom: 15px; letter-spacing: -0.5px;">
                    <?= htmlspecialchars($post->name); ?>
                </h4>
                
                <p class="grey-text" style="font-size: 0.95rem; margin-bottom: 25px;">
                    Diunggah pada: <?= date('d M Y, H:i', strtotime($post->created_at)); ?>
                </p>

                <div class="divider" style="margin-bottom: 25px;"></div>

                <h6 style="font-weight: 700; color: #475569; margin-bottom: 10px;">Deskripsi Karya</h6>
                <p style="line-height: 1.8; color: #334155; font-size: 1.05rem; white-space: pre-line;">
                    <?= htmlspecialchars($post->description); ?>
                </p>

                <!-- Tombol Aksi (Delete & Update) -->
                <div class="row" style="margin-top: 40px; margin-bottom: 0;">
                    <div class="col s12 right-align">
                        <!-- Tombol Delete -->
                        <a href="<?= site_url('welcome/delete/' . $post->id); ?>" 
                           class="red-text text-darken-2" 
                           style="font-weight: 600; margin-right: 20px;"
                           onclick="return confirm('Apakah Anda yakin ingin menghapus karya ini?');">
                            <i class="material-icons left" style="font-size: 18px; vertical-align: middle;">delete</i>Delete
                        </a>

                        <!-- Tombol Update -->
                        <a href="<?= site_url('welcome/update/' . $post->id); ?>" 
                           class="blue-text text-darken-2" 
                           style="font-weight: 600;">
                            <i class="material-icons left" style="font-size: 18px; vertical-align: middle;">edit</i>Update
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
