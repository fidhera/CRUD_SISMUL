# CRUD Sistem Multimedia (SISMUL)

Aplikasi Galeri Multimedia berbasis **CodeIgniter 3** dan **Materialize CSS** untuk mengelola karya multimedia (Audio, Video, Animasi, Gambar).

## Fitur Utama
- **Create**: Unggah karya baru dengan judul, deskripsi, gambar sampul (thumbnail), dan berkas media utama (video/audio).
- **Read**: Eksplorasi galeri karya dan halaman detail karya dengan pemutar video dan audio bawaan.
- **Update**: Memperbarui informasi karya atau mengganti berkas media dan thumbnail dengan preview interaktif.
- **Delete**: Menghapus satu karya beserta berkas fisiknya, atau menghapus seluruh karya secara massal (*Delete All*).

## Kebutuhan Sistem
- Web Server (Apache / Nginx via Laragon, XAMPP, dll.)
- PHP 7.x / 8.x
- MySQL / MariaDB

## Instalasi
1. Pindahkan atau clone folder proyek ke direktori web server (misalnya: `C:\laragon\www\sismul_raffael`).
2. Buat database MySQL dengan nama `sismul_raffael`.
3. Buka browser dan akses:
   ```text
   http://localhost/sismul_raffael/
   ```
