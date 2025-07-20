<div class="widget-sidebar sidebar-search">
    <h5 class="sidebar-title">Search</h5>
    <div class="sidebar-content">
        <?php echo form_open(base_url() . 'search'); ?>
        <div class="input-group">
            <input type="text" name="cari" class="form-control" placeholder="Search for..." aria-label="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-secondary btn-search" type="submit">
                    <span class="ion-android-search"></span>
                </button>
            </span>
        </div>
        </form>
    </div>
</div>

<div class="widget-sidebar">
    <h5 class="sidebar-title">Artikel Terbaru</h5>
    <div class="sidebar-content">
        <ul class="list-sidebar">
            <?php
            $artikel = $this->db->query("
                SELECT * FROM artikel, pengguna, kategori
                WHERE artikel_status = 'publish'
                AND artikel_author = pengguna_id
                AND artikel_kategori = kategori_id
                ORDER BY artikel_id DESC
                LIMIT 5")->result();
            foreach ($artikel as $a) {
            ?>
                <li>
                    <a href="<?php echo base_url() . $a->artikel_slug; ?>"><?php echo $a->artikel_judul; ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>

<div class="widget-sidebar">
    <h5 class="sidebar-title">Halaman</h5>
    <div class="sidebar-content">
        <ul class="list-sidebar">
            <?php
            $halaman = $this->m_data->get_data('halaman')->result();
            foreach ($halaman as $h) {
            ?>
                <li>
                    <a href="<?php echo base_url() . 'page/' . $h->halaman_slug; ?>"><?php echo $h->halaman_judul; ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>

<div class="widget-sidebar widget-tags">
    <h5 class="sidebar-title">Kategori Artikel</h5>
    <div class="sidebar-content">
        <div class="kategori-tags">
            <?php
            $kategori = $this->m_data->get_data('kategori')->result();
            foreach ($kategori as $k) { ?>
                <a href="<?php echo base_url() . 'kategori/' . $k->kategori_slug; ?>" class="kategori-tag">
                    <?php echo $k->kategori_nama; ?>
                </a>
            <?php } ?>
        </div>
    </div>
</div>

<style>
    /* Kategori Artikel sebagai Tag Elegan */
.kategori-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.kategori-tag {
    display: inline-block;
    padding: 6px 14px;
    background-color: #c49c61; /* Emas lembut */
    color: #3b2f1e; /* Warna teks gelap */
    font-size: 14px;
    border-radius: 20px;
    text-decoration: none;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.kategori-tag:hover {
    background-color: #a67c52; /* Coklat hangat */
    color: #fffef9;
}

    /* Gaya Umum Sidebar */
    .widget-sidebar {
        background-color: #f2e4c6; /* Warna coklat muda */
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        color: #3b2f1e; /* Teks */
    }

    .widget-sidebar .sidebar-title {
  font-size: 1.6rem;
  font-weight: 600;
  border-left: 5px solid #7B4B00; /* ubah dari #0078ff ke warna lain */
  padding-left: 15px;
  text-transform: uppercase;
  margin-bottom: 1.5rem;
}

    /* Judul Sidebar */
    .sidebar-title {
        position: relative;
        color:rgb(59, 30, 30);
        font-weight: bold;
        border-bottom: 2px solid #7a5710; /* Coklat emas */
        padding-bottom: 5px;
        margin-bottom: 15px;
        padding-left: 12px;
    }

    /* Input Pencarian */
    .input-group .form-control {
        background-color: #fff5dc;
        color: #3b2f1e;
        border: 1px solid #3b2f1e;
    }

    .input-group .form-control::placeholder {
        color: #9c8b6f;
    }

    .input-group-btn .btn-search {
        background-color: #3b2f1e;
        color: #fff5dc;
        border: none;
    }

    /* Link Sidebar */
    .widget-sidebar a {
        color: #3b2f1e;
        text-decoration: none;
    }

    .widget-sidebar a:hover {
        color: #7a5710;
    }

    /* Ikon Search */
    .btn-search span {
        font-size: 18px;
    }

    /* List Styling */
    .list-sidebar {
        list-style-type: none;
        padding-left: 0;
    }

    .list-sidebar li {
        margin-bottom: 8px;
    }
</style>
