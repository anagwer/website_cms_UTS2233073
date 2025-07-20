<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('m_data');
		$this->load->helper('text');
	}

	public function index()
	{
		// 3 artikel terbaru
		$data['artikel'] = $this->db->query("
        SELECT * FROM artikel, pengguna, kategori
        WHERE artikel_status = 'publish'
        AND artikel_author = pengguna_id
        AND artikel_kategori = kategori_id
        ORDER BY artikel_id DESC
        LIMIT 3")->result();

		// Di dalam function index()
		$data['portofolio'] = $this->db
			->where('portofolio_status', 'publish')
			->order_by('portofolio_id', 'DESC')
			->limit(6)
			->get('portofolio')
			->result();

		// Ambil testimonial yang statusnya publish
		$data['testimonial'] = $this->db
			->where('testimonial_status', 'publish')
			->order_by('testimonial_tanggal', 'DESC')
			->limit(5)
			->get('testimonial')
			->result();

		// Data layanan
		$data['layanan'] = $this->db->get('layanan')->result();

		// Data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		// Load view
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_homepage', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	//halaman single artikel (detail artikel)
	public function single($slug)
	{
		$data['artikel'] = $this->db->query("
	SELECT * FROM artikel,pengguna,kategori
	WHERE artikel_status = 'publish'
	AND artikel_author = pengguna_id
	AND artikel_kategori = kategori_id
	AND artikel_slug = '$slug'
	")->result();
		//Data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		//SEO Meta
		if (count($data['artikel']) > 0) {
			$data['meta_keyword'] = $data['artikel'][0]->artikel_judul;
			$data['meta_description'] = substr($data['artikel'][0]->artikel_konten, 0, 100);
		} else {
			$data['meta_keyword'] = $data['pengaturan']->nama;
			$data['meta_description'] = $data['pengaturan']->deskripsi;
		}
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_single', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	public function blog()
	{
		//data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		//SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;
		//$this->load->database();
		$jumlah_data = $this->m_data->get_data('artikel')->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'blog/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 3;
		$config['first_link'] = 'first';
		$config['last_link'] = 'last';
		$config['prev_link'] = 'prev';
		$config['next_link'] = 'next';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close'] = '</span>Next</li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] = '</span></li>';
		$FROM = $this->uri->segment(2);
		if ($FROM == "") {
			$FROM = 0;
		}
		$this->pagination->initialize($config);
		$data['artikel'] = $this->db->query("
	SELECT * FROM artikel,pengguna,kategori
	WHERE artikel_status = 'publish'
	AND artikel_author = pengguna_id
	AND artikel_kategori = kategori_id
	ORDER BY artikel_id DESC
	LIMIT $config[per_page] OFFSET $FROM
	")->result();
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_blog', $data);
		$this->load->view('frontend/v_footer', $data);
	}


	public function page($slug)
	{
		$where = array(
			'halaman_slug' => $slug
		);
		$data['halaman'] = $this->m_data->edit_data('halaman', $where)->result();
		//data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		//SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_page', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	public function kategori($slug)
	{
		//data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		//SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;
		$jumlah_artikel = $this->db->query("
	SELECT * FROM artikel,pengguna,kategori
	WHERE artikel_status = 'publish'
	AND artikel_author = pengguna_id
	AND artikel_kategori = kategori_id
	AND kategori_slug = '$slug'
	")->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'kategori/' . $slug;
		$config['total_rows'] = $jumlah_artikel;
		$config['per_page'] = 4;
		$config['first_link'] = 'first';
		$config['last_link'] = 'last';
		$config['prev_link'] = 'prev';
		$config['next_link'] = 'next';
		$config['full_tag_open'] = '<div class="pagging text-center">
	<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item">
	<span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active">
	<span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">
	(current)</span></span></li>';
		$config['next_tag_open'] = '<li class="page-item">
	<span class="page-link">';
		$config['next_tagl_close'] = '<span aria-hidden="true">
	&raquo;</span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item">
	<span class="page-link">';
		$config['prev_tagl_close'] = '</span>Next</li>';
		$config['first_tag_open'] = '<li class="page-item">
	<span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item">
	<span class="page-link">';
		$config['last_tagl_close'] = '</span></li>';
		$FROM = $this->uri->segment(3);
		if ($FROM == "") {
			$FROM = 0;
		}
		$this->pagination->initialize($config);
		$data['artikel'] = $this->db->query("
	SELECT * FROM artikel,pengguna,kategori
	WHERE artikel_status = 'publish'
	AND artikel_author = pengguna_id
	AND artikel_kategori = kategori_id
	AND kategori_slug = '$slug'
	ORDER BY artikel_id DESC
	LIMIT $config[per_page] OFFSET $FROM
	")->result();
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_kategori', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	public function search()
	{
		//mengambil nilai keyword dari form pencarian
		$cari = htmlentities((trim($this->input->post('cari', true))) ? trim($this->input->post('cari', true)) : '');
		//Jika uri segmen 2 ada, maka nilai variabel $search akan diganti dengan nilai uri segmen 2
		$cari = ($this->uri->segment(2)) ? $this->uri->segment(2) : $cari;
		//data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		//SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;
		$jumlah_artikel = $this->db->query("
	SELECT * FROM artikel,pengguna,kategori,portofolio
	WHERE artikel_status = 'publish'
	AND artikel_author = pengguna_id
	AND artikel_kategori = kategori_id
	AND (artikel_judul LIKE '%$cari%' OR artikel_konten LIKE '%$cari
   %')")->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'search/' . $cari;
		$config['total_rows'] = $jumlah_artikel;
		$config['per_page'] = 4;
		$config['first_link'] = 'first';
		$config['last_link'] = 'last';
		$config['prev_link'] = 'prev';
		$config['next_link'] = 'next';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close'] = '</span>Next</li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] = '</span></li>';
		$FROM = $this->uri->segment(3);
		if ($FROM == "") {
			$FROM = 0;
		}
		$this->pagination->initialize($config);
		$data['artikel'] = $this->db->query("
	SELECT * FROM artikel,pengguna,kategori
	WHERE artikel_status = 'publish'
	AND artikel_author = pengguna_id
	AND artikel_kategori = kategori_id
	AND (artikel_judul LIKE '%$cari%' OR artikel_konten LIKE '%$cari%')
	ORDER BY artikel_id DESC
	LIMIT $config[per_page] OFFSET $FROM
	")->result();

		$data['cari'] = $cari;
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_search', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	public function notfound()
	{
		//data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		//SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_notfound', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	// Menampilkan semua layanan (seperti blog)
	public function layanan_list()
	{
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		// Ambil semua data layanan yang berstatus publish
		$data['layanan'] = $this->db
			->where('LOWER(layanan_status)', 'publish') // ← penting
			->order_by('layanan_tanggal', 'DESC')
			->get('layanan')
			->result();

		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_layanan', $data);
		$this->load->view('frontend/v_footer', $data);
	}




	// Menampilkan detail layanan berdasarkan slug
	public function layanan($slug)
	{
		// Data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// Ambil layanan berdasarkan slug
		$query = $this->db->get_where('layanan', ['layanan_slug' => $slug]);
		$layanan = $query->row();

		// Cek apakah ditemukan
		if ($layanan) {
			$data['layanan'] = $layanan;

			// SEO Meta
			$data['meta_keyword'] = $layanan->layanan_judul;
			$data['meta_description'] = strip_tags(substr($layanan->layanan_konten, 0, 100));

			// Tampilkan view
			$this->load->view('frontend/v_header', $data);
			$this->load->view('frontend/v_layanan_detail', $data);
			$this->load->view('frontend/v_footer', $data);
		} else {
			// Jika tidak ditemukan
			show_404();
		}
	}

	// Tambahkan method baru di bawah function layanan()
	public function portofolio_list()
	{
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = substr($data['pengaturan']->deskripsi, 0, 100);

		// Ambil semua portofolio publish
		$data['portofolio'] = $this->db
			->where('portofolio_status', 'publish')
			->order_by('portofolio_tanggal', 'DESC')
			->get('portofolio')
			->result();

		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_portofolio', $data); // pastikan file ini ada
		$this->load->view('frontend/v_footer');
	}

	public function portofolio($slug)
	{
		// Ambil data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// Cari portofolio berdasarkan slug
		$portofolio = $this->db
			->where('portofolio_slug', $slug)
			->where('portofolio_status', 'publish')
			->get('portofolio')
			->row();

		if ($portofolio) {
			$data['portofolio'] = $portofolio;
			$data['meta_keyword'] = $portofolio->portofolio_judul;
			$data['meta_description'] = strip_tags(substr($portofolio->portofolio_konten, 0, 100));

			$data['portofolio_lain'] = $this->db
				->where('portofolio_slug !=', $slug)
				->where('portofolio_status', 'publish')
				->order_by('portofolio_tanggal', 'DESC')
				->limit(4)
				->get('portofolio')
				->result();

			$this->load->view('frontend/v_header', $data);
			$this->load->view('frontend/v_portofolio_detail', $data);
			$this->load->view('frontend/v_footer');
		} else {
			show_404();
		}
	}

	public function testimonial()
	{
		// Ambil data pengaturan dari database
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// Pastikan data meta juga dikirim
		$data['meta_keyword'] = $data['pengaturan']->nama ?? 'Testimonial';
		$data['meta_description'] = substr($data['pengaturan']->deskripsi ?? 'Deskripsi website', 0, 100);

		// Ambil data testimonial yang publish (jika ingin ditampilkan langsung)
		$data['testimonial'] = $this->db
			->where('testimonial_status', 'publish')
			->order_by('testimonial_tanggal', 'DESC')
			->get('testimonial')
			->result();

		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_testimonial', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	public function kirim_testimonial()
	{
		$this->load->library('upload');

		$nama = $this->input->post('nama', true);
		$konten = $this->input->post('konten', true);
		$tanggal = date('Y-m-d');

		// Cek jika nama dan konten kosong
		if (empty($nama) || empty($konten)) {
			$this->session->set_flashdata('error', 'Nama dan pesan wajib diisi.');
			redirect('testimonial/form');
			return;
		}

		// Upload foto jika ada
		$foto = null;
		if (!empty($_FILES['foto']['name'])) {

			// Pastikan folder upload ada
			$upload_path = './gambar/testimonial/';
			if (!is_dir($upload_path)) {
				mkdir($upload_path, 0777, true); // Buat folder jika belum ada
			}

			$config['upload_path']   = $upload_path;
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size']      = 2048;
			$config['file_name']     = 'testimonial_' . time();

			$this->upload->initialize($config);

			if ($this->upload->do_upload('foto')) {
				$foto = $this->upload->data('file_name');
			} else {
				// Jika upload gagal, log dan arahkan kembali dengan pesan
				log_message('error', 'Upload Gagal: ' . $this->upload->display_errors());
				$this->session->set_flashdata('error', strip_tags($this->upload->display_errors()));
				redirect('testimonial/form');
				return;
			}
		}

		// Simpan ke database
		$data = [
			'testimonial_nama'    => $nama,
			'testimonial_konten'  => $konten,
			'testimonial_foto'    => $foto,
			'testimonial_status'  => 'publish',
			'testimonial_tanggal' => $tanggal
		];

		if ($this->db->insert('testimonial', $data)) {
			$this->session->set_flashdata('success', 'Testimonial berhasil dikirim. Akan ditampilkan setelah disetujui admin.');
		} else {
			$this->session->set_flashdata('error', 'Gagal menyimpan testimonial ke database.');
		}

		redirect('testimonial');
	}

	// Welcome.php - Contoh method
	public function produk()
	{
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		$data['meta_keyword'] = 'produk, toko online';
		$data['meta_description'] = 'Daftar produk yang tersedia di toko kami.';

		$data['produk'] = $this->m_data->get_data('produk')->result();

		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_produk', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	public function produk_detail($id)
	{
		// Ambil data produk berdasarkan ID
		$where = array('produk_id' => $id);
		$data['produk'] = $this->m_data->edit_data('produk', $where)->row();

		if (empty($data['produk'])) {
			show_404();
		}

		// Data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO Meta
		$data['meta_keyword'] = $data['produk']->produk_nama;
		$data['meta_description'] = substr($data['produk']->produk_keterangan, 0, 100);

		// Load view
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_produk_detail', $data);
		$this->load->view('frontend/v_footer');
	}
}
