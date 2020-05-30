<?php
class Migrasi_2005_ke_2006 extends CI_model {

	public function up()
	{
		$this->grup_akses_covid19();
		$this->load->model('migrations/migrasi_2004_ke_2005');
		$this->migrasi_2004_ke_2005->up(); // untuk yang sudah terlanjur mengkosongkan DB sebelum kosongkan_db diperbaiki

		// Ubah nama kode status penduduk
		$this->db->where('id', 2)
			->update('tweb_penduduk_status', array('nama' => 'TIDAK TETAP'));

		//Ganti nama folder widget menjadi widgets
		rename('desa/widget', 'desa/widgets');
		rename('desa/upload/widget', 'desa/upload/widgets');
		// Arahkan semua widget statis ubahan desa ke folder desa/widgets
		$list_widgets = $this->db->where('jenis_widget', 2)->get('widget')->result_array();
		foreach ($list_widgets as $widgets)
		{
			$ganti = str_replace('desa/widget', 'desa/widgets', $widgets['isi']); // Untuk versi 20.04-pasca ke atas
			$cek = explode('/', $ganti); // Untuk versi 20.04 ke bawah
			if ($cek[0] !== 'desa' AND $cek[1] === NULL)
			{ // agar migrasi bisa dijalankan berulang kali
				$this->db->where('id', $widgets['id'])->update('widget', array('isi' => 'desa/widgets/'.$widgets['isi']));
			}
		}
		// Sesuaikan dengan sql_mode STRICT_TRANS_TABLES
		$this->db->query("ALTER TABLE outbox MODIFY COLUMN CreatorID text NULL");
		// Hapus field sasaran
		if ($this->db->field_exists('sasaran', 'program_peserta'))
			$this->db->query('ALTER TABLE `program_peserta` DROP COLUMN `sasaran`');
		//tambah kolom email di tabel tweb_penduduk
		if (!$this->db->field_exists('email', 'tweb_penduduk'))
			$this->dbforge->add_column('tweb_penduduk', array(
				'email' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => TRUE,
				),
			));
		//tambah kolom kantor_desa di tabel config
		if (!$this->db->field_exists('kantor_desa', 'config'))
			$this->dbforge->add_column('config', array(
				'kantor_desa' => array(
					'type' => 'VARCHAR',
					'constraint' => 100,
					'null' => TRUE,
				),
			));
		// Modul pembangunan
		$this->pembangunan();
	}

	private function grup_akses_covid19()
	{
		// Menambahkan menu 'Group / Hak Akses' covid19 table 'user_grup'
		$data[] = array(
			'id'=>'5',
			'nama' => 'Satgas Covid-19',
		);

		foreach ($data as $grup)
		{
			$sql = $this->db->insert_string('user_grup', $grup);
			$sql .= " ON DUPLICATE KEY UPDATE
			id = VALUES(id),
			nama = VALUES(nama)";
			$this->db->query($sql);
		}
	}

	private function pembangunan()
	{
		// Buat tabel pembangunan
		$tabel = 'pembangunan';
		if (!$this->db->table_exists($tabel))
		{
			$fields = [
				'id' => [
					'type' => 'INT',
					'constraint' => 11,
					'auto_increment' => TRUE
				],
				
				'judul' => [
					'type' => 'VARCHAR',
					'constraint' => 255,
					'null' => TRUE
				],

				'gambar' => [
					'type' => 'VARCHAR',
					'constraint' => 255,
					'null' => TRUE
				],

				'uraian' => [
					'type' => 'VARCHAR',
					'constraint' => 255,
					'null' => TRUE
				],
				
				'awal_waktu' => [
					'type' => 'TIMESTAMP'
				],

				'akhir_waktu' => [
					'type' => 'TIMESTAMP'
				],

				'lokasi' => [
					'type' => 'INT',
					'constraint' => 11,
					'null' => TRUE
				],

				'map_lokasi' => [
					'type' => 'INT',
					'constraint' => 11,
					'null' => TRUE
				],

				'biaya' => [
					'type' => 'int',
					'constraint' => 11,
					'null' => TRUE
				],

				'sumber_dana' => [
					'type' => 'VARCHAR',
					'constraint' => 255,
					'null' => TRUE
				],

				'tahun_anggaran' => [
					'type' => 'int',
					'constraint' => 4
				],

				'pelaksana_kegiatan' => [
					'type' => 'VARCHAR',
					'constraint' => 255,
					'null' => TRUE
				],

				'status' => [
					'type' => 'tinyint',
					'constraint' => 1,
					'default' => 1
				],

				'log' => [
					'type' => 'INT',
					'constraint' => 11,
					'null' => TRUE
				]
			];

			$this->dbforge->add_field($fields);
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->create_table($tabel, TRUE);
		}

		// Buat tabel dokumentasi_pembangunan
		$tabel = 'dokumentasi_pembangunan';
		if (!$this->db->table_exists($tabel))
		{
			$fields = [
				'id' => [
					'type' => 'INT',
					'constraint' => 11,
					'auto_increment' => TRUE
				],

				'id_pembangunan' => [
					'type' => 'INT',
					'constraint' => 11
				],
				
				'judul' => [
					'type' => 'VARCHAR',
					'constraint' => 255,
					'null' => TRUE
				],
				
				'persentase' => [
					'type' => 'int',
					'constraint' => 3,
					'default' => 0
				],

				'keterangan' => [
					'type' => 'VARCHAR',
					'constraint' => 255,
					'null' => TRUE
				]
			];

			$this->dbforge->add_field($fields);
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_key('id_pembangunan');
			$this->dbforge->create_table($tabel, TRUE);
			$this->dbforge->add_column($tabel, ['CONSTRAINT fk_pembangunan FOREIGN KEY(id_pembangunan) REFERENCES pembangunan(id) ON UPDATE CASCADE ON DELETE CASCADE']);
		}

		// TODO: Untuk selanjutnya yang berkaitan dengan maps bisa disatukan dan menggunakan reff_map (contoh tabel: config, area, garis, tweb_keluarga, tweb_penduduk (tweb_penduduk_maps bisa dihapus), tweb_wil_clausterdesa)
		// Buat tabel reff_map
		$tabel = 'reff_map';
		if (!$this->db->table_exists($tabel))
		{
			$fields = [
				'id' => [
					'type' => 'INT',
					'constraint' => 11,
					'auto_increment' => TRUE
				],
				
				'judul' => [
					'type' => 'VARCHAR',
					'constraint' => 20,
					'null' => TRUE
				],

				'lat' => [
					'type' => 'VARCHAR',
					'constraint' => 20,
					'null' => TRUE
				],

				'lng' => [
					'type' => 'VARCHAR',
					'constraint' => 255,
					'null' => TRUE
				],

				'path' => [
					'type' => 'text',
					'constraint' => 65535,
					'null' => TRUE
				],
				
				'zoom' => [
					'type' => 'int',
					'constraint' => 11,
					'null' => TRUE
				],

				'tipe' => [
					'type' => 'VARCHAR',
					'constraint' => 20,
					'null' => TRUE
				]
			];

			$this->dbforge->add_field($fields);
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->create_table($tabel, TRUE);
		}

		
			$data = [
				'id' => 209,
				'modul' => 'Pembangunan',
				'url' => 'pembangunan',
				'aktif' => 1,
				'ikon' => 'fa-institution',
				'urut' => 9,
				'level' => 2,
				'hidden' => 0,
				'ikon_kecil' => 'fa-institution',
				'parent' => 0
			];
			$sql = $this->db->insert_string('setting_modul', $data);
			$sql .= " ON DUPLICATE KEY UPDATE
				id = VALUES(id),
				modul = VALUES(modul),
				url = VALUES(url),
				aktif = VALUES(aktif),
				ikon = VALUES(ikon),
				urut = VALUES(urut),
				level = VALUES(level),
				hidden = VALUES(hidden),
				ikon_kecil = VALUES(ikon_kecil),
				parent = VALUES(parent)";

			$this->db->query($sql);	
	}

}
