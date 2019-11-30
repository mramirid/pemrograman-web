<?php

class Mahasiswa
{
    private $npm = NULL;
    private $nama = NULL;
    private $prodi = NULL;
    private $fakultas = NULL;
    private $listMataKuliah = NULL;
    private $listNilai = NULL;

    public function setNPM($npm)
    {
        $this->npm = $npm;
    }

    public function getNPM()
    {
        return $this->npm;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setProdi($prodi)
    {
        $this->prodi = $prodi;
    }

    public function getProdi()
    {
        return $this->prodi;
    }

    public function setFakultas($fakultas)
    {
        $this->fakultas = $fakultas;
    }

    public function getFakultas()
    {
        return $this->fakultas;
    }

    public function setListMataKuliah($listMataKuliah)
    {
        $this->listMataKuliah = $listMataKuliah;
    }

    public function getListMataKuliah()
    {
        return $this->listMataKuliah;
    }

    public function setListNilai($listNilai)
    {
        $this->listNilai = $listNilai;
    }

    public function getListNilai()
    {
        return $this->listNilai;
    }
}
