<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_welcome', 'model');
        $this->load->helper('url');
        $this->load->library('session');
    }
	
    public function index($id = FALSE) {
        if ($id === false) {
            $data['home_post'] = $this->model->read();
            $this->load->view('header');
            $this->load->view('home', $data);
            $this->load->view('footer');
        } else {
            $data['post'] = $this->model->read($id);
            if (!$data['post']) {
                show_404();
                return;
            }
            $this->load->view('header');
            $this->load->view('post', $data);
            $this->load->view('footer');
        }
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Judul Karya', 'required|max_length[255]');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('create');
            $this->load->view('footer');
        } else {
            $config['upload_path']   = './upload/post/';
            $config['encrypt_name']  = TRUE; 
            $config['max_size']      = '500000'; // Maks ~500MB
            $this->load->library('upload');

            // 1. Upload Thumbnail
            $config['allowed_types'] = 'jpg|jpeg|png';
            $this->upload->initialize($config); 

            if (!$this->upload->do_upload('thumbnail')) {
                $this->session->set_flashdata('error', 'Gagal upload Thumbnail: ' . $this->upload->display_errors('', ''));
                redirect('welcome/create');
            } else {
                $thumb_data = $this->upload->data();
                $nama_thumbnail = $thumb_data['file_name'];

                // 2. Upload File Media (Video/Audio)
                $config['allowed_types'] = 'mp4|webm|mov|ogg|mp3|wav|avi';
                $this->upload->initialize($config); 

                if (!$this->upload->do_upload('file_media')) {
                    @unlink($config['upload_path'] . $nama_thumbnail);                    
                    $this->session->set_flashdata('error', 'Gagal upload Media: ' . $this->upload->display_errors('', ''));
                    redirect('welcome/create');
                } else {
                    $media_data = $this->upload->data();
                    $nama_media = $media_data['file_name'];                  
                    $this->model->create($nama_media, $nama_thumbnail);                  
                    $this->session->set_flashdata('success', 'Karya multimedia berhasil diunggah!');
                    redirect('');
                }
            }
        }
    }

    public function update($id = NULL) {
        if (!$id) {
            redirect('');
            return;
        }

        $post = $this->model->read($id);
        if (!$post) {
            show_404();
            return;
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Judul Karya', 'required|max_length[255]');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['post'] = $post; 
            $this->load->view('header');
            $this->load->view('update', $data);
            $this->load->view('footer');
        } else {
            $filename  = null;
            $thumbnail = null;

            $config['upload_path']  = './upload/post/';
            $config['encrypt_name'] = TRUE;
            $config['max_size']     = '500000'; // Ukuran maks ~500MB

            $this->load->library('upload');

            // Upload Video/Media Baru (Jika ada)
            if (!empty($_FILES['filename']['name'])) {
                $config['allowed_types'] = 'mp4|webm|mov|ogg|mp3|wav|avi';
                $this->upload->initialize($config);

                if ($this->upload->do_upload('filename')) {
                    $file_data = $this->upload->data();
                    $filename  = $file_data['file_name'];

                    if (!empty($post->filename)) {
                        $old_file = './upload/post/' . $post->filename;
                        if (file_exists($old_file)) {
                            @unlink($old_file);
                        }
                    }
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload video baru: ' . $this->upload->display_errors('', ''));
                    redirect('welcome/update/' . $id);
                    return;
                }
            }

            // Upload Thumbnail Baru (Jika ada)
            if (!empty($_FILES['image1']['name'])) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image1')) {
                    $thumb_data = $this->upload->data();
                    $thumbnail  = $thumb_data['file_name'];

                    if (!empty($post->thumbnail)) {
                        $old_thumb = './upload/post/' . $post->thumbnail;
                        if (file_exists($old_thumb)) {
                            @unlink($old_thumb);
                        }
                    }
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload thumbnail baru: ' . $this->upload->display_errors('', ''));
                    redirect('welcome/update/' . $id);
                    return;
                }
            }

            $this->model->update($id, $filename, $thumbnail);
            $this->session->set_flashdata('success', 'Karya berhasil diperbarui!');
            redirect('welcome/index/' . $id);
        }
    }

    // Controller hapus satu data
    public function delete($id = NULL) {
        if ($id) {
            $this->model->delete($id);
            $this->session->set_flashdata('success', 'Karya berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'ID karya tidak valid.');
        }
        redirect('');
    }

    // Controller hapus semua data
    public function delete_all() {
        $this->model->delete_all();
        $this->session->set_flashdata('success', 'Semua karya berhasil dihapus!');
        redirect('');
    }
}
