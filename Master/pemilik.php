<?php

namespace Master;

use Config\Query_builder;

class pemilik
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('pemilik')->get()->resultArray();
        $res = ' <a href="?target=pemilik&act=tambah_pemilik" class="btn btn-info btn-sm">Tambah pemilik</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>id</th>
                    <th>nama</th>
                    <th>alamat</th>
                    <th>no_hp</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                    <td width="10">' . $no . '</td>
                    <td>' . $r['id'] . '</td>
                    <td>' . $r['nama'] . '</td>
                    <td>' . $r['alamat'] . '</td>
                    <td width="10">' . $r['no_hp'] . '</td>
                    <td width="150">
                        <a href="?target=pemilik&act=edit_pemilik&id=' . $r['id'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=pemilik&act=delete_pemilik&id=' . $r['id'] . '" class="btn btn-danger btn-sm">
                            Hapus
                        </a>
                    </td>
                </tr>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }

    public function tambah()
    {
        $res = '<a href="?target=pemilik" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=pemilik&act=simpan_pemilik" method="post">
                    <div class="mb-3">
                        <label for="id" class="form-label">id</label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="mb-3">
                    <label for="no_hp" class="form-label">no_hp</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp">
                </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];

        $data = array(
            'id' => $id,
            'nama' => $nama,
            'alamat' => $alamat,
            'no_hp' => $no_hp
            );
        return $this->db->table('pemilik')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('pemilik')->where("id='$id'")->get()->rowArray();

        $res = '<a href="?target=admin" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=admin&act=update_admin" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['id'] . '">
                        <label for="id" class="form-label">id pemilik usaha</label>
                        <input type="text" class="form-control" id="id" name="id" value="' . $r['id'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="' . $r['nama'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="' . $r['alamat'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">no_hp</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="' . $r['no_hp'] . '">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>';
        return $res;
    }

    public function update()
    {
        $param = $_POST['param'];
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];

        $data = array(
            'id' => $id,
            'nama' => $nama,
            'alamat' => $alamat,
            'no_hp' => $no_hp
        );

        return $this->db->table('pemilik')->where("id='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('pemilik')->where("id='$id'")->delete();
    }
}
