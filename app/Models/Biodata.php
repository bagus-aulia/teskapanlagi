<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Biodata extends Model
{
    public static function getAllFiles()
    {
        //mengambil nama semua file pada folder storage/app/biodata
        $daftarFile = Storage::allFiles('biodata');
        $banyakFile = count($daftarFile);

        //normalisasi data dengan menghapus nama folder dan ekstensi
        for($urutanFile = 0; $urutanFile < $banyakFile; $urutanFile++) {
            //mencari posisi awal nama file
            $posisiNamaFile          = strpos($daftarFile[$urutanFile], "/") + 1;
            //menghitung banyak karakter pada nama file
            $jumlahKarakter          = strrpos($daftarFile[$urutanFile], ".") - $posisiNamaFile;
            //memasukkan nama file ke dalam array
            $daftarFile[$urutanFile] = substr($daftarFile[$urutanFile], $posisiNamaFile, $jumlahKarakter);
        }

        return $daftarFile;
    }

    public static function saveToFile($data = array(), $namaFile)
    {
        $hasil      = "";
        $banyakData = count($data);
        $urutanData = 1;

        //pengecekan perubahan nama
        $namaDariFile = substr($namaFile, 0, strrpos($namaFile, "-") - 1);
        $tglDariFile  = substr($namaFile, strrpos($namaFile, ".") - 14);
        $nama         = $data['nama'];
        //jika nama file dan nama yang diinputkan tidak sama, file lama akan dihapus
        if($namaDariFile != $nama){
          Storage::delete('biodata/'.$namaFile);
          $namaFile = $nama."-".$tglDariFile;
        }

        //menggabungkan data menjadi satu baris
        foreach ($data as $dataCompile) {
          //membedakan data terakhir tidak perlu dipisahkan dengan koma
          if($urutanData == $banyakData){
            $hasil = $hasil.$dataCompile;
          }else{
            $hasil = $hasil.$dataCompile.", ";
          }

          $urutanData++;
        }

        //memasukkan data kedalam file
        return Storage::put('biodata/'.$namaFile, $hasil);
    }

    public static function getFile($namaFile)
    {
        //mengecek keberadaan file tersebut
        $fileExsist = Storage::disk('local')->exists('biodata/'.$namaFile);

        //jika ada, file dibaca.
        if($fileExsist){
            $data         = Storage::get('biodata/'.$namaFile);
            $dataArray    = explode(",", /** @scrutinizer ignore-type */ $data);
            $banyakData   = count($dataArray);
            $dataDanField = array();

            //normalisasi data
            for($urutanData = 0; $urutanData < $banyakData; $urutanData++) {
                //membuang spasi berlebih
                $normalisasi              = trim($dataArray[$urutanData], " ");
                //mengambil nama field pada data
                // $namaField                = substr($normalisasi, 0, strpos($normalisasi, ":"));
                //mengambil isi field pada data
                // $isiField                 = substr($normalisasi, strpos($normalisasi, ":") + 1);
                //memasukkan field dan isi ke dalam variabel dataDanField
                $dataDanField[$urutanData]= $normalisasi;
            }
            return $dataDanField;
        }

        //apabila file tidak ditemukan, mengembalikan nilai kosong
        return $fileExsist;
    }

    public static function deleteFile($namaFile)
    {
        //mengembalikan nilai penghapusan data
        return Storage::delete('biodata/'.$namaFile);
    }
}
