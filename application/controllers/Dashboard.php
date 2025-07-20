<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('m_login');
        $this->load->model('m_data');

        /*
        * Cek session yang login,
        * jika session status tidak sama dengan 'telah_login', 
        * berarti pengguna belum login, maka halaman akan dialihkan ke halaman login.
        */
        if ($this->session->userdata('status') != "telah_login") {
            redirect('login?alert=belum_login');
        }
    }
    function tabel()
    {
        $data['title'] =  'DataTable';
        // memanggil view full.php
        $this->load->view('full', $data);
    }

    function index()
    {

        $data['jumlah_artikel'] = $this->m_data->get_data('artikel')->num_rows();
        $data['jumlah_kategori'] = $this->m_data->get_data('kategori')->num_rows();
        $data['jumlah_pengguna'] = $this->m_data->get_data('pengguna')->num_rows();
        $data['jumlah_halaman'] = $this->m_data->get_data('halaman')->num_rows();

        // Kirim $data ke v_header
        $this->load->view('dashboard/v_header', $data);
        $this->load->view('dashboard/v_index', $data);
        $this->load->view('dashboard/v_footer');
    }

    function keluar()
    {
        $this->session->sess_destroy();
        redirect('login?alert=logout');
    }

    // Fitur ganti password
    function ganti_password()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_ganti_password');
        $this->load->view('dashboard/v_footer');
    }

    function ganti_password_aksi()
    {
        // Set form validation
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[8]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password_baru]');

        if ($this->form_validation->run() !== false) {
            $password_lama       = $this->input->post('password_lama');
            $password_baru       = $this->input->post('password_baru');
            $konfirmasi_password = $this->input->post('konfirmasi_password');

            $where = array(
                'pengguna_id'       => $this->session->userdata('id'),
                'pengguna_password' => md5($password_lama)
            );

            $cek = $this->m_login->cek_login('pengguna', $where);

            if ($cek->num_rows() > 0) {
                $data = array(
                    'pengguna_password' => md5($password_baru)
                );
                $this->m_data->update_data('pengguna', $data, $where);
                redirect('dashboard/ganti_password?alert=sukses');
            } else {
                redirect('dashboard/ganti_password?alert=gagal');
            }
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_ganti_password');
            $this->load->view('dashboard/v_footer');
        }
    }

    // Fitur mengelola kategori
    function kategori()
    {
        $data['kategori'] = $this->m_data->get_data('kategori')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_kategori', $data);
        $this->load->view('dashboard/v_footer');
    }

    function kategori_tambah()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_kategori_tambah');
        $this->load->view('dashboard/v_footer');
    }

    function kategori_tambah_aksi()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() != false) {
            $kategori = $this->input->post('kategori');
            $data = array(
                'kategori_nama' => $kategori,
                'kategori_slug' => strtolower(url_title($kategori))
            );
            $this->m_data->insert_data('kategori', $data);
            redirect(base_url() . 'dashboard/kategori');
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_kategori_tambah');
            $this->load->view('dashboard/v_footer');
        }
    }

    public function kategori_edit($id)
    {
        $where = array('kategori_id' => $id);
        $data['kategori'] = $this->m_data->edit_data('kategori', $where)->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_kategori_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function kategori_update()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id');
            $kategori = $this->input->post('kategori');
            $where = array('kategori_id' => $id);
            $data = array(
                'kategori_nama' => $kategori,
                'kategori_slug' => strtolower(url_title($kategori))
            );
            $this->m_data->update_data('kategori', $data, $where);
            redirect(base_url() . 'dashboard/kategori');
        } else {
            $id = $this->input->post('id');
            $where = array('kategori_id' => $id);
            $data['kategori'] = $this->m_data->edit_data('kategori', $where)->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_kategori_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function kategori_hapus($id)
    {
        $where = array('kategori_id' => $id);
        $this->m_data->delete_data('kategori', $where);
        redirect(base_url() . 'dashboard/kategori');
    }

    // Fitur mengelola artikel
    public function artikel()
    {
        $data['artikel'] = $this->db->query(
            'SELECT * FROM artikel, kategori, pengguna 
             WHERE artikel_kategori=kategori_id AND artikel_author=pengguna_id 
             ORDER BY artikel_id DESC'
        )->result();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_artikel', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function artikel_tambah()
    {
        $data['kategori'] = $this->m_data->get_data('kategori')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_artikel_tambah', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function artikel_aksi() {
    // Validasi form: judul wajib diisi dan unik, konten & kategori wajib diisi
    $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[artikel.artikel_judul]');
    $this->form_validation->set_rules('konten', 'Konten', 'required');
    $this->form_validation->set_rules('kategori', 'Kategori', 'required');

    // Jika gambar tidak diupload, buat error validasi juga
    if (empty($_FILES['sampul']['name'])) {
        $this->form_validation->set_rules('sampul', 'Gambar Sampul', 'required');
    }

    // Jika validasi lolos
    if ($this->form_validation->run() != false) {
        // Konfigurasi upload
        $config['upload_path'] = './gambar/artikel/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        // Proses upload file
        if ($this->upload->do_upload('sampul')) {
            $gambar = $this->upload->data();

            $tanggal    = date('Y-m-d H:i:s');
            $judul      = $this->input->post('judul');
            $slug       = strtolower(url_title($judul));
            $konten     = $this->input->post('konten');
            $sampul     = $gambar['file_name'];
            $author     = $this->session->userdata('id');
            $kategori   = $this->input->post('kategori');
            $status     = $this->input->post('status');

            $data = array(
                'artikel_tanggal'   => $tanggal,
                'artikel_judul'     => $judul,
                'artikel_slug'      => $slug,
                'artikel_konten'    => $konten,
                'artikel_sampul'    => $sampul,
                'artikel_author'    => $author,
                'artikel_kategori'  => $kategori,
                'artikel_status'    => $status
            );

            $this->m_data->insert_data('artikel', $data);
            redirect(base_url() . 'dashboard/artikel');
        } else {
            // Jika upload gagal
            $data['gambar_error'] = $this->upload->display_errors();
            $data['kategori'] = $this->m_data->get_data('kategori')->result();

            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_artikel_tambah', $data);
            $this->load->view('dashboard/v_footer');
        }
    } else {
        // Jika validasi form gagal
        $data['kategori'] = $this->m_data->get_data('kategori')->result();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_artikel_tambah', $data);
        $this->load->view('dashboard/v_footer');
    }
}

    public function artikel_edit($id)
    {
        $where = array('artikel_id' => $id);
        $data['artikel'] = $this->m_data->edit_data('artikel', $where)->result();
        $data['kategori'] = $this->m_data->get_data('kategori')->result();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_artikel_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function artikel_update()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id');
            $judul = $this->input->post('judul');
            $slug = strtolower(url_title($judul));
            $konten = $this->input->post('konten');
            $kategori = $this->input->post('kategori');
            $status = $this->input->post('status');

            $where = array('artikel_id' => $id);
            $data = array(
                'artikel_judul' => $judul,
                'artikel_slug' => $slug,
                'artikel_konten' => $konten,
                'artikel_kategori' => $kategori,
                'artikel_status' => $status
            );

            $this->m_data->update_data('artikel', $data, $where);

            if (!empty($_FILES['sampul']['name'])) {
                $config['upload_path'] = './gambar/artikel/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('sampul')) {
                    $gambar = $this->upload->data();
                    $data = array(
                        'artikel_sampul' => $gambar['file_name']
                    );
                    $this->m_data->update_data('artikel', $data, $where);
                    redirect(base_url() . 'dashboard/artikel');
                } else {
                    $this->form_validation->set_message('sampul', $this->upload->display_errors());
                    $data['artikel'] = $this->m_data->edit_data('artikel', $where)->result();
                    $data['kategori'] = $this->m_data->get_data('kategori')->result();

                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_artikel_edit', $data);
                    $this->load->view('dashboard/v_footer');
                }
            } else {
                redirect(base_url() . 'dashboard/artikel');
            }
        } else {
            $id = $this->input->post('id');
            $where = array('artikel_id' => $id);
            $data['artikel'] = $this->m_data->edit_data('artikel', $where)->result();
            $data['kategori'] = $this->m_data->get_data('kategori')->result();

            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_artikel_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function artikel_hapus($id)
    {
        $where = array('artikel_id' => $id);
        $this->m_data->delete_data('artikel', $where);
        redirect(base_url() . 'dashboard/artikel');
    }
    //fitur mengelola halaman
    public function pages()
    {
        $data['halaman'] = $this->m_data->get_data('halaman')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pages', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function pages_tambah()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pages_tambah');
        $this->load->view('dashboard/v_footer');
    }

    public function pages_aksi()
    {
        // Wajib isi judul dan konten
        $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[halaman.halaman_judul]');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        if ($this->form_validation->run() != false) {
            $judul = $this->input->post('judul');
            $slug = strtolower(url_title($judul));
            $konten = $this->input->post('konten');
            $data = array(
                'halaman_judul' => $judul,
                'halaman_slug' => $slug,
                'halaman_konten' => $konten
            );
            $this->m_data->insert_data('halaman', $data);
            redirect(base_url() . 'dashboard/pages');
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_pages_tambah');
            $this->load->view('dashboard/v_footer');
        }
    }

    public function pages_edit($id)
    {
        $where = array('halaman_id' => $id);
        $data['halaman'] = $this->m_data->edit_data('halaman', $where)->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pages_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    function pages_update()
    {
        // Wajib isi judul dan konten
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id');
            $judul = $this->input->post('judul');
            $slug = strtolower(url_title($judul));
            $konten = $this->input->post('konten');
            $where = array(
                'halaman_id' => $id
            );
            $data = array(
                'halaman_judul' => $judul,
                'halaman_slug' => $slug,
                'halaman_konten' => $konten
            );
            $this->m_data->update_data('halaman', $data, $where);
            redirect(base_url() . 'dashboard/pages');
        } else {
            $id = $this->input->post('id');
            $where = array('halaman_id' => $id);
            $data['halaman'] = $this->m_data->edit_data('halaman', $where)->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_pages_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function pages_hapus($id)
    {
        $where = array(
            'halaman_id' => $id
        );
        $this->m_data->delete_data('halaman', $where);
        redirect(base_url() . 'dashboard/pages');
    }

    //fitur profil pengguna
    public function profil()
    {
        //ambil id pengguna yang sedang login
        $id_pengguna = $this->session->userdata('id');
        $where = array(
            'pengguna_id' => $id_pengguna
        );
        $data['pengguna'] = $this->m_data->edit_data('pengguna', $where)->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_profil', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function profil_update()
    {
        //rules form wajib diisi untuk nama dan email
        $this->form_validation->set_rules('nama', 'Nama', 'Required');
        $this->form_validation->set_rules('email', 'Email', 'Required');
        if ($this->form_validation->run() != false) {
            $id = $this->session->userdata('id');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $where = array(
                'pengguna_id' => $id
            );
            $data = array(
                'pengguna_nama' => $nama,
                'pengguna_email' => $email
            );
            $this->m_data->update_data('pengguna', $data, $where);
            redirect(base_url() . 'dashboard/profil/?alert=sukses');
        } else {
            //id pengguna yang sedang login
            $id_pengguna = $this->session->userdata('id');
            $where = array(
                'pengguna_id' => $id_pengguna
            );
            $data['pengguna'] = $this->m_data->edit_data('pengguna', $where)->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_profil', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    //fitur untuk pengaturan website
    public function pengaturan()
    {
        $data['pengaturan'] = $this->m_data->get_data('pengaturan')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pengaturan', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function pengaturan_update()
    {
        // Validasi form
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() !== false) {
            // Ambil input dari form
            $nama            = $this->input->post('nama');
            $deskripsi       = $this->input->post('deskripsi');
            $link_facebook   = $this->input->post('link_facebook');
            $link_twitter    = $this->input->post('link_twitter');
            $link_instagram  = $this->input->post('link_instagram');
            $link_github     = $this->input->post('link_github');

            $data = array(
                'nama'            => $nama,
                'deskripsi'       => $deskripsi,
                'link_facebook'   => $link_facebook,
                'link_twitter'    => $link_twitter,
                'link_instagram'  => $link_instagram,
                'link_github'     => $link_github
            );

            // Update data utama
            $this->m_data->update_data('pengaturan', $data, array());

            // Handle upload logo jika ada
            if (!empty($_FILES['logo']['name'])) {
                $upload_path = FCPATH . 'gambar/website/';

                // Pastikan folder ada dan bisa ditulis
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0755, true);
                    chmod($upload_path, 0755);
                }

                $config['upload_path']   = $upload_path;
                $config['allowed_types'] = 'jpg|png|jpeg|webp';
                $config['overwrite']     = true;
                $config['file_name']     = 'logo_' . time(); // nama unik
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('logo')) {
                    $gambar = $this->upload->data();
                    $logo = $gambar['file_name'];

                    // Update logo ke database
                    $this->db->set('logo', $logo);
                    $this->db->limit(1); // Ambil 1 baris saja
                    $this->db->update('pengaturan');
                } else {
                    $data['error'] = $this->upload->display_errors();
                    $data['pengaturan'] = $this->m_data->get_data('pengaturan')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_pengaturan', $data);
                    $this->load->view('dashboard/v_footer');
                    return;
                }
            }

            redirect(base_url('dashboard/pengaturan/?alert=sukses'));
        } else {
            $data['pengaturan'] = $this->m_data->get_data('pengaturan')->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_pengaturan', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    //fitur untuk mengelola pengguna
    public function pengguna()
    {
        $data['pengguna'] = $this->m_data->get_data('pengguna')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pengguna', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function pengguna_tambah()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pengguna_tambah');
        $this->load->view('dashboard/v_footer');
    }

    public function pengguna_tambah_aksi()
    {
        //rules untuk wajib diisi
        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('email', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('username', 'Username Pengguna', 'required');
        $this->form_validation->set_rules('password', 'Password Pengguna', 'required|min_length[8]');

        $this->form_validation->set_rules('level', 'Level Pengguna', 'required');
        $this->form_validation->set_rules('status', 'Status Pengguna', 'required');
        if ($this->form_validation->run() != false) {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $level = $this->input->post('level');
            $status = $this->input->post('status');
            $data = array(
                'pengguna_nama' => $nama,
                'pengguna_email' => $email,
                'pengguna_username' => $username,
                'pengguna_password' => $password,
                'pengguna_level' => $level,
                'pengguna_status' => $status
            );
            $this->m_data->insert_data('pengguna', $data);
            redirect(base_url() . 'dashboard/pengguna');
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_pengguna_tambah');
            $this->load->view('dashboard/v_footer');
        }
    }

    public function pengguna_edit($id)
    {
        $where = array(
            'pengguna_id' => $id
        );
        $data['pengguna'] = $this->m_data->edit_data('pengguna', $where)->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pengguna_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function pengguna_update()
    {
        //rules untuk wajib diisi
        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('email', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('username', 'Username Pengguna', 'required');
        $this->form_validation->set_rules('level', 'Level Pengguna', 'required');
        $this->form_validation->set_rules('status', 'Status Pengguna', 'required');
        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $level = $this->input->post('level');
            $status = $this->input->post('status');

            //cek apabila password tidak diisi, maka kolom password tidakakan diupdate
            if ($this->input->post('password') == "") {
                $data = array(
                    'pengguna_nama' => $nama,
                    'pengguna_email' => $email,
                    'pengguna_username' => $username,
                    'pengguna_level' => $level,
                    'pengguna_status' => $status
                );
            } else {
                $data = array(
                    'pengguna_nama' => $nama,
                    'pengguna_email' => $email,
                    'pengguna_username' => $username,
                    'pengguna_password' => $password,
                    'pengguna_level' => $level,
                    'pengguna_status' => $status
                );
            }
            $where = array(
                'pengguna_id' => $id
            );
            $this->m_data->update_data('pengguna', $data, $where);
            redirect(base_url() . 'dashboard/pengguna');
        } else {
            $id = $this->input->post('id');
            $where = array(
                'pengguna_id' => $id
            );
            $data['pengguna'] = $this->m_data->get_data('pengguna', $where)->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_pengguna_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function pengguna_hapus($id)
    {
        $where = array(
            'pengguna_id' => $id
        );
        $data['pengguna_hapus'] = $this->m_data->edit_data('pengguna', $where)->row();
        $data['pengguna_lain'] = $this->db->query("SELECT * FROM pengguna WHERE pengguna_id != '$id'")->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pengguna_hapus', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function pengguna_hapus_aksi()
    {
        $pengguna_hapus = $this->input->post('pengguna_hapus');
        $pengguna_tujuan = $this->input->post('pengguna_tujuan');
        //hapus data pengguna
        $where = array(
            'pengguna_id' => $pengguna_hapus
        );
        $this->m_data->delete_data('pengguna', $where);
        //pindahkan semua artikel pengguna yang dihapus pada pengguna tujuan
        $w = array(
            'artikel_author' => $pengguna_hapus
        );
        $d = array(
            'artikel_author' => $pengguna_tujuan
        );
        $this->m_data->update_data('artikel', $d, $w);
        redirect(base_url() . 'dashboard/pengguna');
    }

    public function layanan()
    {
        $data['layanan'] = $this->db->query(
            "SELECT * FROM layanan, pengguna WHERE layanan_author = pengguna_id ORDER BY layanan_id DESC"
        )->result();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_layanan', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function layanan_tambah()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_layanan_tambah');
        $this->load->view('dashboard/v_footer');
    }

    public function layanan_aksi()
    {
        if (!$this->session->userdata('id')) {
            redirect(base_url('login'));
        }

        $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[layanan.layanan_judul]');
        $this->form_validation->set_rules('konten', 'Konten', 'required');

        if ($this->form_validation->run()) {
            $upload_path = './gambar/layanan/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }

            if (!empty($_FILES['sampul']['name'])) {
                $config['upload_path']   = $upload_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']      = 2048;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('sampul')) {
                    $gambar  = $this->upload->data();
                    $judul   = $this->input->post('judul', true);
                    $konten  = $this->input->post('konten'); // tidak pakai true di sini!
                    $slug    = url_title(strtolower($judul));
                    $author  = $this->session->userdata('id');
                    $status  = $this->input->post('status');
                    $tanggal = date('Y-m-d H:i:s');

                    $data = array(
                        'layanan_judul'   => $judul,
                        'layanan_slug'    => $slug,
                        'layanan_konten'  => $konten,
                        'layanan_sampul'  => $gambar['file_name'],
                        'layanan_author'  => $author,
                        'layanan_status'  => $status,
                        'layanan_tanggal' => $tanggal
                    );

                    $this->m_data->insert_data('layanan', $data);
                    $this->session->set_flashdata('success', 'Layanan berhasil ditambahkan.');
                    redirect(base_url('dashboard/layanan'));
                } else {
                    $data['gambar_error'] = $this->upload->display_errors();
                }
            } else {
                $data['gambar_error'] = '<p>Gambar harus diupload.</p>';
            }
        }

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_layanan_tambah', isset($data) ? $data : null);
        $this->load->view('dashboard/v_footer');
    }



    public function layanan_edit($id)
    {
        $where = array('layanan_id' => $id);
        $data['layanan'] = $this->m_data->edit_data('layanan', $where)->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_layanan_edit', $data);
        $this->load->view('dashboard/v_footer');
    }


    public function layanan_update()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');

        if ($this->form_validation->run() != false) {
            $id     = $this->input->post('id');
            $judul  = $this->input->post('judul');
            $slug   = strtolower(url_title($judul));
            $konten = $this->input->post('konten');
            $status = $this->input->post('status');

            $where = array('layanan_id' => $id);

            // Update data utama layanan
            $data = array(
                'layanan_judul'  => $judul,
                'layanan_slug'   => $slug,
                'layanan_konten' => $konten,
                'layanan_status' => $status
            );
            $this->m_data->update_data('layanan', $data, $where);

            // Cek apakah ada gambar baru di-upload
            if (!empty($_FILES['sampul']['name'])) {
                $config['upload_path']   = './gambar/layanan/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']      = 10240;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('sampul')) {
                    // Hapus gambar lama
                    $layanan = $this->m_data->edit_data('layanan', $where)->row();
                    $old_image = './gambar/layanan/' . $layanan->layanan_sampul;
                    if (file_exists($old_image) && is_file($old_image)) {
                        unlink($old_image);
                    }

                    // Simpan gambar baru
                    $gambar = $this->upload->data();
                    $data_gambar = array('layanan_sampul' => $gambar['file_name']);
                    $this->m_data->update_data('layanan', $data_gambar, $where);
                } else {
                    // Jika upload gagal, tampilkan kembali halaman edit beserta error
                    $data['gambar_error'] = $this->upload->display_errors();
                    $data['layanan'] = $this->m_data->edit_data('layanan', $where)->result();

                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_layanan_edit', $data);
                    $this->load->view('dashboard/v_footer');
                    return;
                }
            }

            // Berhasil, redirect ke daftar layanan
            redirect(base_url('dashboard/layanan'));
        } else {
            // Jika validasi gagal, tampilkan kembali form edit
            $id = $this->input->post('id');
            $where = array('layanan_id' => $id);
            $data['layanan'] = $this->m_data->edit_data('layanan', $where)->result();

            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_layanan_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function layanan_hapus($id)
    {
        $where = array('layanan_id' => $id);
        $this->m_data->delete_data('layanan', $where);
        redirect(base_url() . 'dashboard/layanan');
    }

    public function portofolio()
    {
        // Ambil data portofolio + nama pengguna
        $data['portofolio'] = $this->db->query("
        SELECT portofolio.*, pengguna.pengguna_nama 
        FROM portofolio 
        LEFT JOIN pengguna ON portofolio.portofolio_author = pengguna.pengguna_id
        ORDER BY portofolio_id DESC")->result();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_portofolio', $data);
        $this->load->view('dashboard/v_footer');
    }


    public function portofolio_tambah()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_portofolio_tambah');
        $this->load->view('dashboard/v_footer');
    }

    public function portofolio_aksi()
    {
        if (!$this->session->userdata('id')) {
            redirect(base_url('login'));
        }

        $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[portofolio.portofolio_judul]');
        $this->form_validation->set_rules('konten', 'Konten', 'required');

        if ($this->form_validation->run()) {
            $upload_path = './gambar/portofolio/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }

            if (!empty($_FILES['sampul']['name'])) {
                $config['upload_path']   = $upload_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']      = 2048;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('sampul')) {
                    $gambar  = $this->upload->data();
                    $judul   = $this->input->post('judul', true);
                    $konten  = $this->input->post('konten');
                    $slug    = url_title(strtolower($judul));
                    $author  = $this->session->userdata('id');
                    $status  = $this->input->post('status');
                    $tanggal = date('Y-m-d H:i:s');

                    $data = array(
                        'portofolio_judul'   => $judul,
                        'portofolio_slug'    => $slug,
                        'portofolio_konten'  => $konten,
                        'portofolio_sampul'  => $gambar['file_name'],
                        'portofolio_author'  => $author,
                        'portofolio_status'  => $status,
                        'portofolio_tanggal' => $tanggal
                    );

                    $this->m_data->insert_data('portofolio', $data);
                    $this->session->set_flashdata('success', 'Portofolio berhasil ditambahkan.');
                    redirect(base_url('dashboard/portofolio'));
                } else {
                    $data['gambar_error'] = $this->upload->display_errors();
                }
            } else {
                $data['gambar_error'] = '<p>Gambar harus diupload.</p>';
            }
        }

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_portofolio_tambah', isset($data) ? $data : null);
        $this->load->view('dashboard/v_footer');
    }

    public function portofolio_edit($id)
    {
        $where = array('portofolio_id' => $id);
        $data['portofolio'] = $this->m_data->edit_data('portofolio', $where)->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_portofolio_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function portofolio_update()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');

        if ($this->form_validation->run() != false) {
            $id     = $this->input->post('id');
            $judul  = $this->input->post('judul');
            $slug   = strtolower(url_title($judul));
            $konten = $this->input->post('konten');
            $status = $this->input->post('status');
            $where = array('portofolio_id' => $id);

            // Update data utama portofolio
            $data = array(
                'portofolio_judul'  => $judul,
                'portofolio_slug'   => $slug,
                'portofolio_konten' => $konten,
                'portofolio_status' => $status
            );
            $this->m_data->update_data('portofolio', $data, $where);

            // Cek apakah ada gambar baru di-upload
            if (!empty($_FILES['sampul']['name'])) {
                $config['upload_path']   = './gambar/portofolio/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']      = 10240;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('sampul')) {
                    // Hapus gambar lama
                    $portofolio = $this->m_data->edit_data('portofolio', $where)->row();
                    $old_image = './gambar/portofolio/' . $portofolio->portofolio_sampul;
                    if (file_exists($old_image) && is_file($old_image)) {
                        unlink($old_image);
                    }

                    // Simpan gambar baru
                    $gambar = $this->upload->data();
                    $data_gambar = array('portofolio_sampul' => $gambar['file_name']);
                    $this->m_data->update_data('portofolio', $data_gambar, $where);
                } else {
                    $data['gambar_error'] = $this->upload->display_errors();
                    $data['portofolio'] = $this->m_data->edit_data('portofolio', $where)->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_portofolio_edit', $data);
                    $this->load->view('dashboard/v_footer');
                    return;
                }
            }

            redirect(base_url('dashboard/portofolio'));
        } else {
            $id = $this->input->post('id');
            $where = array('portofolio_id' => $id);
            $data['portofolio'] = $this->m_data->edit_data('portofolio', $where)->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_portofolio_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function portofolio_hapus($id)
    {
        $where = array('portofolio_id' => $id);
        $this->m_data->delete_data('portofolio', $where);
        redirect(base_url('dashboard/portofolio'));
    }

    public function testimonial()
    {
        $data['testimonial'] = $this->db
            ->order_by('testimonial_tanggal', 'DESC')
            ->get('testimonial')
            ->result();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_testimonial', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function testimonial_approve($id)
    {
        $this->db->where('testimonial_id', $id)->update('testimonial', ['testimonial_status' => 'publish']);
        $this->session->set_flashdata('success', 'Testimonial berhasil disetujui.');
        redirect('dashboard/testimonial');
    }

    public function testimonial_delete($id)
    {
        $data = $this->db->get_where('testimonial', ['testimonial_id' => $id])->row();
        if ($data && $data->testimonial_foto) {
            @unlink('./gambar/testimonial/' . $data->testimonial_foto); // hapus gambar jika ada
        }
        $this->db->delete('testimonial', ['testimonial_id' => $id]);
        $this->session->set_flashdata('success', 'Testimonial berhasil dihapus.');
        redirect('dashboard/testimonial');
    }

    public function testimonial_set_status($id, $status)
    {
        // Validasi status
        if (!in_array($status, ['draft', 'publish'])) {
            show_404();
        }

        $this->db->where('testimonial_id', $id)
            ->update('testimonial', ['testimonial_status' => $status]);

        $this->session->set_flashdata('success', 'Status testimonial berhasil diubah.');
        redirect('dashboard/testimonial');
    }

	// Menampilkan form tambah testimonial
	public function testimonial_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_testimonial_tambah');
		$this->load->view('dashboard/v_footer');
	}

	// Menyimpan testimonial baru
	public function testimonial_aksi()
	{
		if (!$this->session->userdata('id')) {
			redirect(base_url('login'));
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('konten', 'Pesan', 'required');

		if ($this->form_validation->run()) {
			$upload_path = './gambar/testimonial/';
			if (!is_dir($upload_path)) {
				mkdir($upload_path, 0777, true);
			}

			if (!empty($_FILES['foto']['name'])) {
				$config['upload_path']   = $upload_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size']      = 2048;
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {
					$gambar  = $this->upload->data();
					$nama    = $this->input->post('nama', true);
					$konten  = $this->input->post('konten');
					$status  = $this->input->post('status');
					$tanggal = date('Y-m-d H:i:s');

					$data = array(
						'testimonial_nama'    => $nama,
						'testimonial_konten' => $konten,
						'testimonial_foto'   => $gambar['file_name'],
						'testimonial_status' => $status,
						'testimonial_tanggal'=> $tanggal
					);

					$this->m_data->insert_data('testimonial', $data);
					$this->session->set_flashdata('success', 'Testimonial berhasil ditambahkan.');
					redirect(base_url('dashboard/testimonial'));
				} else {
					$data['gambar_error'] = $this->upload->display_errors();
				}
			} else {
				$data['gambar_error'] = '<p>Foto harus diupload.</p>';
			}
		}

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_testimonial_tambah', isset($data) ? $data : null);
		$this->load->view('dashboard/v_footer');
	}

	// Menampilkan form edit testimonial
	public function testimonial_edit($id)
	{
		$where = array('testimonial_id' => $id);
		$data['testimonial'] = $this->m_data->edit_data('testimonial', $where)->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_testimonial_edit', $data);
		$this->load->view('dashboard/v_footer');
	}

	// Memperbarui testimonial
	public function testimonial_update()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('konten', 'Pesan', 'required');

		if ($this->form_validation->run() != false) {
			$id     = $this->input->post('id');
			$nama   = $this->input->post('nama');
			$konten = $this->input->post('konten');
			$status = $this->input->post('status');
			$where  = array('testimonial_id' => $id);

			// Update data utama
			$data = array(
				'testimonial_nama'   => $nama,
				'testimonial_konten' => $konten,
				'testimonial_status' => $status
			);
			$this->m_data->update_data('testimonial', $data, $where);

			// Cek upload foto baru
			if (!empty($_FILES['foto']['name'])) {
				$config['upload_path']   = './gambar/testimonial/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size']      = 10240;
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {
					// Hapus gambar lama
					$testimonial = $this->m_data->edit_data('testimonial', $where)->row();
					$old_image = './gambar/testimonial/' . $testimonial->testimonial_foto;
					if (file_exists($old_image) && is_file($old_image)) {
						unlink($old_image);
					}

					// Simpan gambar baru
					$gambar = $this->upload->data();
					$data_gambar = array('testimonial_foto' => $gambar['file_name']);
					$this->m_data->update_data('testimonial', $data_gambar, $where);
				} else {
					$data['gambar_error'] = $this->upload->display_errors();
					$data['testimonial'] = $this->m_data->edit_data('testimonial', $where)->result();
					$this->load->view('dashboard/v_header');
					$this->load->view('dashboard/v_testimonial_edit', $data);
					$this->load->view('dashboard/v_footer');
					return;
				}
			}

			redirect(base_url('dashboard/testimonial'));
		} else {
			$id = $this->input->post('id');
			$where = array('testimonial_id' => $id);
			$data['testimonial'] = $this->m_data->edit_data('testimonial', $where)->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_testimonial_edit', $data);
			$this->load->view('dashboard/v_footer');
		}
	}

	// Menghapus testimonial
	public function testimonial_hapus($id)
	{
        $where = array('testimonial_id' => $id);
        $this->m_data->delete_data('testimonial', $where);
        redirect(base_url('dashboard/testimonial'));
	}


    // Tampilkan daftar produk
    // Tampilkan daftar produk
    public function produk()
    {
        $data['produk'] = $this->db->get_where('produk', ['produk_status !=' => 'hapus'])->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_produk', $data);
        $this->load->view('dashboard/v_footer');
    }
    // Form tambah produk
    public function produk_tambah()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_produk_tambah');
        $this->load->view('dashboard/v_footer');
    }

    // Aksi simpan produk
    public function produk_aksi()
    {
        // Konfigurasi upload foto
        $config['upload_path']   = './assets/uploads/produk/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['file_name']     = 'produk_' . time();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            redirect('dashboard/produk_tambah');
            return false;
        }

        $upload_data = $this->upload->data();
        $foto = $upload_data['file_name'];

        $data = array(
            'produk_nama'       => $this->input->post('nama'),
            'produk_kategori'   => $this->input->post('kategori'),
            'produk_harga'      => $this->input->post('harga'),
            'produk_keterangan' => $this->input->post('keterangan'),
            'produk_foto'       => $foto,
            'produk_status'     => $this->input->post('status')
        );

        $this->db->insert('produk', $data);
        $this->session->set_flashdata('success', 'Produk berhasil ditambahkan.');
        redirect('dashboard/produk');
    }

    // Form edit produk
    public function produk_edit($id)
    {
        $where = array('produk_id' => $id);
        $data['produk'] = $this->db->get_where('produk', $where)->row();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_produk_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    // Aksi update produk
    public function produk_update()
    {
        $id = $this->input->post('id');

        // Cek apakah ada file foto baru diupload
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './assets/uploads/produk/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['file_name']     = 'produk_' . time();

            // Pastikan folder upload tersedia
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', strip_tags($error['error']));
                redirect('dashboard/produk_edit/' . $id);
                return;
            }

            $upload_data = $this->upload->data();
            $foto = $upload_data['file_name'];

            // Hapus foto lama jika ada
            $old_file = $this->db->get_where('produk', ['produk_id' => $id])->row()->produk_foto;
            if ($old_file && file_exists('./assets/uploads/produk/' . $old_file)) {
                unlink('./assets/uploads/produk/' . $old_file);
            }
        } else {
            // Gunakan foto lama jika tidak ada upload baru
            $foto = $this->input->post('foto_lama');
        }

        $data = array(
            'produk_nama'       => $this->input->post('nama'),
            'produk_kategori'   => $this->input->post('kategori'),
            'produk_harga'      => $this->input->post('harga'),
            'produk_stok'       => $this->input->post('stok'),
            'produk_keterangan' => $this->input->post('keterangan'),
            'produk_foto'       => $foto,
            'produk_status'     => $this->input->post('status')
        );

        $this->db->where('produk_id', $id);
        $this->db->update('produk', $data);
        $this->session->set_flashdata('success', 'Produk berhasil diperbarui.');
        redirect('dashboard/produk');
    }

    // Hapus produk
    public function produk_hapus($id)
    {
        // Soft delete
        // $this->db->where('produk_id', $id);
        // $this->db->update('produk', ['produk_status' => 'hapus']);

        // Atau hard delete:
        $this->db->where('produk_id', $id);
        $this->db->delete('produk');

        $this->session->set_flashdata('success', 'Produk berhasil dihapus.');
        redirect('dashboard/produk');
    }
}
