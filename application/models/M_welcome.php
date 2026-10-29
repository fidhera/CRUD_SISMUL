<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_welcome extends CI_Model {
    
    public function create($filename, $thumbnail) {
        $data = [
            'name'        => $this->input->post('name', TRUE),
            'description' => $this->input->post('description', TRUE),
            'filename'    => $filename,
            'thumbnail'   => $thumbnail
        ];

        $this->db->insert('post', $data);
    }

    public function read($id = FALSE) {
        if ($id === FALSE) {
            return $this->db->get('post')->result_array();
        } else {
            $query = $this->db->get_where('post', ['id' => $id]);
            return $query->row();
        }
    }
    
    public function update($id, $filename = null, $thumbnail = null) {
        $data = [
            'name'        => $this->input->post('name', TRUE),
            'description' => $this->input->post('description', TRUE)
        ];

        if ($filename !== null) {
            $data['filename'] = $filename;
        }

        if ($thumbnail !== null) {
            $data['thumbnail'] = $thumbnail;
        }

        $this->db->where('id', $id);
        $this->db->update('post', $data);
    }

    public function delete($id) {
        $post = $this->read($id);
        if ($post) {
            if (!empty($post->filename) && file_exists('./upload/post/' . $post->filename)) {
                @unlink('./upload/post/' . $post->filename);
            }
            if (!empty($post->thumbnail) && file_exists('./upload/post/' . $post->thumbnail)) {
                @unlink('./upload/post/' . $post->thumbnail);
            }
        }
        $this->db->where('id', $id);
        return $this->db->delete('post');
    }

    // Hapus SEMUA Data & File
    public function delete_all() {
        $all_posts = $this->db->get('post')->result();
        
        if (!empty($all_posts)) {
            foreach ($all_posts as $post) {
                if (!empty($post->filename) && file_exists('./upload/post/' . $post->filename)) {
                    @unlink('./upload/post/' . $post->filename);
                }
                if (!empty($post->thumbnail) && file_exists('./upload/post/' . $post->thumbnail)) {
                    @unlink('./upload/post/' . $post->thumbnail);
                }
            }
        }

        return $this->db->empty_table('post');
    }
}
