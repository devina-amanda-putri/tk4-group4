<?php

class BarangModel
{
    /* Properties */
    private $IdBarang = null;
    private $IdPengguna = null;
    private $IdSupplier = null;
    private $NamaBarang;
    private $Keterangan;
    private $Satuan;
    private $HargaSatuan;
    private $Stok;
    private $JumlahMinimalBarang;
    private $JumlahMaksimalBarang;
    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    function setIdBarang($IdBarang)
    {
        $this->IdBarang = $IdBarang;
    }

    function setIdPengguna($IdPengguna)
    {
        $this->IdPengguna = $IdPengguna;
    }

    function setIdSupplier($IdSupplier)
    {
        $this->IdSupplier = $IdSupplier;
    }

    function setNamaBarang($NamaBarang)
    {
        $this->NamaBarang = $NamaBarang;
    }

    function setKeterangan($Keterangan)
    {
        $this->Keterangan = $Keterangan;
    }

    function setSatuan($Satuan)
    {
        $this->Satuan = $Satuan;
    }
    function setHargaSatuan($HargaSatuan)
    {
        $this->HargaSatuan = $HargaSatuan;
    }

    function setStok($Stok)
    {
        $this->Stok = $Stok;
    }

    function setJumlahMinimalBarang($JumlahMinimalBarang)
    {
        $this->JumlahMinimalBarang = $JumlahMinimalBarang;
    }

    function setJumlahMaksimalBarang($JumlahMaksimalBarang)
    {
        $this->JumlahMaksimalBarang = $JumlahMaksimalBarang;
    }

    function getIdBarang()
    {
        return $this->IdBarang;
    }

    function getIdPengguna()
    {
        return $this->IdPengguna;
    }

    function getIdSupplier()
    {
        return $this->IdSupplier;
    }

    function getNamaBarang()
    {
        return $this->NamaBarang;
    }

    function getKeterangan()
    {
        return $this->Keterangan;
    }

    function getSatuan()
    {
        return $this->Satuan;
    }
    function getHargaSatuan()
    {
        return $this->HargaSatuan;
    }
    function getStok()
    {
        return $this->Stok;
    }

    function getJumlahMinimalBarang()
    {
        return $this->JumlahMinimalBarang;
    }

    function getJumlahMaksimalBarang()
    {
        return $this->JumlahMaksimalBarang;
    }

    public function dasborBarang()
    {
        try {
            $query = "SELECT * FROM Barang 
            INNER JOIN Supplier ON Barang.IdSupplier = Supplier.IdSupplier
            INNER JOIN Penjualan ON Barang.IdBarang = Penjualan.IdBarang
            INNER JOIN Pembelian ON Barang.IdBarang = Pembelian.IdBarang";

            $prepareDB = $this->db->prepare($query);
            $prepareDB->execute();
            $result = $prepareDB->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAllBarang($nama_barang = null)
    {
        try {
            $query = "SELECT * FROM Barang INNER JOIN Supplier ON Barang.IdSupplier = Supplier.IdSupplier";

            if ($nama_barang != null) {
                $query .= " WHERE NamaBarang LIKE '%$nama_barang%'";
            }

            $prepareDB = $this->db->prepare($query);
            $prepareDB->execute();
            $result = $prepareDB->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function saveBarang()
    {
        try {
            $query = "INSERT INTO Barang (IdPengguna, IdSupplier, NamaBarang, Keterangan, Satuan, HargaSatuan, Stok, JumlahMinimalBarang, JumlahMaksimalBarang) VALUES (null, :IdSupplier, :NamaBarang, :Keterangan, :Satuan, :HargaSatuan, :Stok, :JumlahMinimalBarang, :JumlahMaksimalBarang)";
            $prepareDB = $this->db->prepare($query);
            $prepareDB->bindParam(':IdSupplier', $this->IdSupplier);
            $prepareDB->bindParam(':NamaBarang', $this->NamaBarang);
            $prepareDB->bindParam(':Keterangan', $this->Keterangan);
            $prepareDB->bindParam(':Satuan', $this->Satuan);
            $prepareDB->bindParam(':HargaSatuan', $this->HargaSatuan);
            $prepareDB->bindParam(':Stok', $this->Stok);
            $prepareDB->bindParam(':JumlahMinimalBarang', $this->JumlahMinimalBarang);
            $prepareDB->bindParam(':JumlahMaksimalBarang', $this->JumlahMaksimalBarang);
            $prepareDB->execute();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteBarang()
    {
        try {
            require_once 'app/models/penjualanmodel.php';
            require_once 'app/models/pembelianmodel.php';
            
            $model_pebelian = new PembelianModel($this->db);
            $model_pebelian->setIdBarang($this->IdBarang);
            $model_pebelian->deletePembelianByIdAttribute("IdBarang");

            $model_penjualan = new PenjualanModel($this->db);
            $model_penjualan->setIdBarang($this->IdBarang);
            $model_penjualan->deletePenjualanByIdAttribute("IdBarang");

            $query = "DELETE FROM Barang WHERE IdBarang = :IdBarang";
            $prepareDB = $this->db->prepare($query);
            $prepareDB->bindParam(':IdBarang', $this->IdBarang);
            $prepareDB->execute();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getBarangById()
    {
        try {
            $query = "SELECT * FROM Barang WHERE IdBarang = :IdBarang";
            $prepareDB = $this->db->prepare($query);
            $prepareDB->bindParam(':IdBarang', $this->IdBarang);
            $prepareDB->execute();
            $result = $prepareDB->fetch();
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function editBarang()
    {
        try {
            $query = "UPDATE Barang SET IdPengguna = null, IdSupplier = :IdSupplier, NamaBarang = :NamaBarang, Keterangan = :Keterangan, Satuan = :Satuan, HargaSatuan = :HargaSatuan, Stok = :Stok, JumlahMinimalBarang = :JumlahMinimalBarang, JumlahMaksimalBarang = :JumlahMaksimalBarang WHERE IdBarang = :IdBarang";
            $prepareDB = $this->db->prepare($query);
            $prepareDB->bindParam(':IdSupplier', $this->IdSupplier);
            $prepareDB->bindParam(':NamaBarang', $this->NamaBarang);
            $prepareDB->bindParam(':Keterangan', $this->Keterangan);
            $prepareDB->bindParam(':Satuan', $this->Satuan);
            $prepareDB->bindParam(':HargaSatuan', $this->HargaSatuan);
            $prepareDB->bindParam(':Stok', $this->Stok);
            $prepareDB->bindParam(':JumlahMinimalBarang', $this->JumlahMinimalBarang);
            $prepareDB->bindParam(':JumlahMaksimalBarang', $this->JumlahMaksimalBarang);
            $prepareDB->bindParam(':IdBarang', $this->IdBarang);
            $prepareDB->execute();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
