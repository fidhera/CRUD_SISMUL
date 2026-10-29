<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row" style="margin-top: 20px; margin-bottom: 40px;">
    <div class="col s12 m10 offset-m1 l8 offset-l2">
        
        <!-- Header -->
        <div class="center-align" style="margin-bottom: 25px;">
            <h4 class="text-gradient" style="font-weight: 800; letter-spacing: -0.5px;">Edit Karya</h4>
            <p class="grey-text text-darken-1" style="font-size: 1.05rem;">Perbarui informasi atau ganti file multimedia karya Anda.</p>
        </div>

        <!-- Alert Error Validation / Upload -->
        <?php if(validation_errors() || $this->session->flashdata('error')): ?>
            <div class="card-panel red lighten-5 red-text text-darken-4" style="border-radius: 12px; border-left: 5px solid #d32f2f; margin-bottom: 20px;">
                <?= validation_errors(); ?>
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div class="card z-depth-0" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.04); padding: 20px 10px;">
            <div class="card-content">
                <form action="<?= site_url('welcome/update/' . $post->id); ?>" method="post" enctype="multipart/form-data">
                    
                    <!-- Title Input -->
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix" style="color: #4facfe;">title</i>
                            <input name="name" id="name" type="text" value="<?= htmlspecialchars(set_value('name', $post->name)); ?>" required>
                            <label for="name" class="active">Judul Karya</label>
                        </div>
                    </div>

                    <!-- Description Input -->
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix" style="color: #4facfe;">description</i>
                            <textarea name="description" id="description" class="materialize-textarea" required><?= htmlspecialchars(set_value('description', $post->description)); ?></textarea>
                            <label for="description" class="active">Deskripsi Karya</label>
                        </div>
                    </div>

                    <!-- Input Video/Media -->
                    <div class="row">
                        <div class="file-field input-field col s12">
                            <div class="btn blue darken-1 waves-effect waves-light" style="border-radius: 20px;">
                                <span><i class="material-icons left">movie</i>Ganti Video/Media</span>
                                <input name="filename" type="file" accept=".mp4,.webm,.mov,.mp3,.wav,.avi">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Kosongkan jika tidak ingin mengubah video / audio">
                            </div>
                        </div>
                        <?php if (!empty($post->filename)): ?>
                            <div class="col s12">
                                <p class="grey-text" style="font-size: 0.85rem; margin-top: -10px; margin-left: 10px;">
                                    <i class="material-icons tiny left" style="vertical-align: middle;">attach_file</i> Berkas saat ini: <strong><?= htmlspecialchars($post->filename); ?></strong>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Thumbnail Preview -->
                    <?php if (!empty($post->thumbnail)): ?>
                        <div class="center col s12" style="margin-bottom: 20px;">
                            <p class="grey-text" style="font-weight: 600;">Thumbnail Saat Ini:</p>
                            <img class="responsive-img" id="thumbnail-preview" style="max-height: 200px; border-radius: 12px; display: block; margin: 0 auto; box-shadow: 0 4px 15px rgba(0,0,0,0.08);" src="<?= base_url('upload/post/' . $post->thumbnail); ?>" alt="Thumbnail Preview">
                        </div>
                    <?php endif; ?>

                    <!-- Input Thumbnail -->
                    <div class="row">
                        <div class="file-field input-field col s12">
                            <div class="btn waves-effect waves-light" style="border-radius: 20px; background-color: #4facfe;">
                                <span><i class="material-icons left">image</i>Ganti Thumbnail</span>
                                <input name="image1" type="file" id="image1" accept=".jpg,.jpeg,.png" onchange="previewThumbnail(event)">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Kosongkan jika tidak ingin mengubah thumbnail">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="row center" style="margin-top: 30px; margin-bottom: 0;">
                        <div class="col s12">
                            <button class="btn-large btn-gradient waves-effect waves-light" type="submit" style="width: 100%; border-radius: 30px;">
                                <i class="material-icons right">save</i>Simpan Perubahan
                            </button>
                            <a href="<?= site_url('welcome/index/' . $post->id); ?>" class="btn-large btn-flat waves-effect" style="width: 100%; margin-top: 10px; border-radius: 30px; color: #64748b;">
                                Batal
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewThumbnail(event) {
    var input = event.target;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = document.getElementById('thumbnail-preview');
            if (img) {
                img.src = e.target.result;
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
