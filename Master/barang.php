<?php

namespace Master;

use Config\Query_builder;

class barang
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('barang')->get()->resultArray();
        $res = ' <a href="?target=barang&act=tambah_barang" class="btn btn-info btn-sm">Tambah barang</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>id</th>
                    <th>nama</th>
                    <th>tanggal</th>
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
                    <td width="10">' . $r['tanggal'] . '</td>
                    <td width="150">
                        <a href="?target=barang&act=edit_barang&id=' . $r['id'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=barang&act=delete_barang&id=' . $r['id'] . '" class="btn btn-danger btn-sm">
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
        $res = '<a href="?target=barang" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=barang&act=simpan_barang" method="post">
                    <div class="mb-3">
                        <label for="id" class="form-label">id</label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                    <label for="tanggal" class="form-label">tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal'];

        $data = array(
            'id' => $id,
            'nama' => $nama,
            'tanggal' => $tanggal
            );
        return $this->db->table('barang')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('barang')->where("id='$id'")->get()->rowArray();

        $res = '<a href="?target=barang" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=barang&act=update_barang" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['id'] . '">
                    <div class="mb-3">
                        <label for="id" class="form-label">id barang usaha</label>
                        <input type="text" class="form-control" id="id" name="id" value="' . $r['id'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="' . $r['nama'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="' . $r['tanggal'] . '">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>';
        return $res;
    }

    public function cekRadio($val1, $val2)
    {
        if ($val1 == $val2) {
            return "checked";
        }
        return "";
    }

    public function update()
    {
        $param = $_POST['param'];
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal'];

        $data = array(
            'id' => $id,
            'nama' => $nama,
            'tanggal' => $tanggal,
        );

        return $this->db->table('barang')->where("id='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('barang')->where("id='$id'")->delete();
    }
}
