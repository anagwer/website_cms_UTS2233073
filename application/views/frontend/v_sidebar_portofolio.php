<div class="widget-sidebar">
  <h5 class="sidebar-title">Portofolio Terbaru</h5>
  <div class="sidebar-content">
    <ul class="list-sidebar">
      <?php
      $portofolio = $this->db->query("
          SELECT * FROM portofolio
          WHERE portofolio_status = 'publish'
          ORDER BY portofolio_id DESC
          LIMIT 5
      ")->result();

      foreach ($portofolio as $p): ?>
        <li>
          <a href="<?= base_url('portofolio/' . $p->portofolio_slug); ?>">
            <?= $p->portofolio_judul; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>