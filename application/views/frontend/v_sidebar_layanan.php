<!-- Sidebar Layanan Terbaru -->
<style>
  .widget-sidebar {
    margin-bottom: 2rem;
    padding: 1.2rem;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
  }

  .sidebar-title {
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: #333;
    border-bottom: 2px solid #007bff;
    padding-bottom: 0.5rem;
  }

  .list-sidebar {
    list-style: none;
    padding-left: 0;
    margin: 0;
  }

  .list-sidebar li {
    margin-bottom: 0.75rem;
    padding-left: 1rem;
    position: relative;
  }

  .list-sidebar li::before {
    content: "›";
    position: absolute;
    left: 0;
    color: #007bff;
    font-weight: bold;
  }

  .list-sidebar a {
    color: #333;
    font-size: 0.95rem;
    font-weight: 500;
    text-decoration: none;
    transition: color 0.2s ease-in-out;
  }

  .list-sidebar a:hover {
    color: #007bff;
    text-decoration: underline;
  }
</style>

<div class="widget-sidebar">
  <h5 class="sidebar-title">Layanan Terbaru</h5>
  <div class="sidebar-content">
    <ul class="list-sidebar">
      <?php
      $layanan = $this->db->query("
          SELECT * FROM layanan
          WHERE layanan_status = 'publish'
          ORDER BY layanan_id DESC
          LIMIT 5
      ")->result();

      foreach ($layanan as $l): ?>
        <li>
          <a href="<?= base_url('layanan/' . $l->layanan_slug); ?>">
            <?= $l->layanan_judul; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
