<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row" style="margin-bottom: 40px;">
    <div class="col s12 m10 offset-m1 l8 offset-l2">
        
        <!-- Header Form -->
        <div class="center-align" style="margin-bottom: 30px;">
            <h4 class="text-gradient" style="font-weight: 800; letter-spacing: -0.5px;">Unggah Karya Baru</h4>
            <p class="grey-text text-darken-1" style="font-size: 1.1rem;">Lengkapi detail dan unggah file multimedia Anda di bawah ini.</p>
        </div>

        <!-- Alert Error Validation / Upload -->
        <?php if(validation_errors() || $this->session->flashdata('error')): ?>
            <div class="card-panel red lighten-5 red-text text-darken-4" style="border-radius: 12px; border-left: 5px solid #d32f2f;">
                <?= validation_errors(); ?>
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <!-- Card Form -->
        <div class="card z-depth-0" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.04); padding: 20px 10px;">
            <div class="card-content">
                <form action="<?= site_url('welcome/create'); ?>" method="post" enctype="multipart/form-data">
                    
                    <!-- Input Judul -->
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix" style="color: #4facfe;">title</i>
                            <input name="name" id="name" type="text" class="validate" value="<?= htmlspecialchars(set_value('name')); ?>" required>
                            <label for="name" class="<?= set_value('name') ? 'active' : ''; ?>">Judul Karya</label>
                        </div>
                    </div>

                    <!-- Input Deskripsi -->
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix" style="color: #4facfe;">description</i>
                            <textarea name="description" id="description" class="materialize-textarea validate" required><?= htmlspecialchars(set_value('description')); ?></textarea>
                            <label for="description" class="<?= set_value('description') ? 'active' : ''; ?>">Deskripsi Karya</label>
                        </div>
                    </div>

                    <!-- Upload Thumbnail (GIMP) -->
                    <div class="row">
                        <div class="file-field input-field col s12">
                            <div class="btn btn-gradient z-depth-0 waves-effect waves-light">
                                <span><i class="material-icons left">image</i>Thumbnail</span>
                                <input type="file" name="thumbnail" accept=".jpg,.jpeg,.png" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Unggah gambar sampul (Format: JPG/PNG)">
                            </div>
                        </div>
                    </div>

                    <!-- Upload File Media Utama (Audio/Video/Animasi) -->
                    <div class="row">
                        <div class="file-field input-field col s12">
                            <div class="btn btn-gradient z-depth-0 waves-effect waves-light">
                                <span><i class="material-icons left">movie</i>File Media</span>
                                <input type="file" name="file_media" accept=".mp4,.webm,.mov,.ogg,.mp3,.wav,.avi" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Unggah video/audio/animasi utama (MP4, WEBM, MOV, MP3, WAV, AVI)">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row center" style="margin-top: 40px; margin-bottom: 0;">
                        <div class="col s12">
                            <button type="submit" class="btn-large btn-gradient z-depth-0 waves-effect waves-light" style="width: 100%; border-radius: 30px; font-size: 1.1rem;">
                                <i class="material-icons right">send</i>Publikasikan Karya
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
