<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    public function index()
    {
        return view('biodata/form');
    }

    public function edit($namaFile)
    {
       //normalisasi data
       $namaFile         = urldecode($namaFile).".txt";
       //mengambil data dari namafile yang dimaksud
       $isiFile          = Biodata::getFile($namaFile);

       if(!empty($isiFile)){
           //memasukkan isi file dan nama file ke dalam variabel
           $data['nama']     = $isiFile[0];
           $data['mail']     = $isiFile[1];
           $data['tglLahir'] = $isiFile[2];
           $data['alamat']   = $isiFile[3];
           $data['namaFile'] = $namaFile;

           //sebagai pelengkap informasi form
           $data['judulForm']= "Perbarui Biodata <strong>".$data['nama']."</strong>";
       }else{
           //feedback apabila error
           $data['notFound'] = "File <strong>".$namaFile."</strong> tidak ditemukan! Peng-inputan data ini akan disimpan sebagai file baru.";
       }

       return view('biodata/form', $data);
    }

    public function store(Request $request)
    {
        //validasi data
        $validasi['nama']       = 'required';
        $validasi['mail']       = 'required|email';
        $validasi['tglLahir']   = 'required|date';
        $validasi['alamat']     = 'required';

        $msgError['required']   = 'Tidak boleh kosong!';
        $msgError['date']       = 'Format tanggal salah!';
        $msgError['email']      = 'Alamat email tidak valid!';

        $this->validate($request,$validasi,$msgError);

        //pengambilan data dari form dan pengecekan karakter ,
        $namaFile               = $request->namaFile;
        $data['nama']           = str_replace(",", "", $request->nama);
        $data['mail']           = str_replace(",", "", $request->mail);
        $data['tglLahir']       = $request->tglLahir;
        $data['alamat']         = str_replace(",", "", $request->alamat);

        //penentuan nama file
        if(empty($namaFile)){
            $namaFile           = $data['nama']."-".date('dmYHis').".txt";
        }

        //menyimpan data ke dalam file
        $simpanData             = Biodata::saveToFile($data, $namaFile);

        //pemberian informasi penyimpanan
        if(empty($simpanData)){
          $request->session()->flash('info', 'Data <strong>'.$data['nama'].'</strong> gagal disimpan!');
          $request->session()->flash('class', 'warning');
        }else{
          $request->session()->flash('info', 'Data <strong>'.$data['nama'].'</strong> berhasil disimpan.');
          $request->session()->flash('class', 'success');
        }

        return redirect('/biodata/pesan.html');
    }

    public function destroy($namaFile, Request $request)
    {
       //normalisasi data
       $namaFile         = urldecode($namaFile).".txt";
       //menghapus data berdasarkan namafile yang dimaksud
       $deleteFile       = Biodata::deleteFile($namaFile);

       if(empty($deleteFile)){
         $request->session()->flash('info', 'File <strong>'.$namaFile.'</strong> tidak ditemukan. File tidak bisa dihapus!');
         $request->session()->flash('class', 'warning');
       }else{
         $request->session()->flash('info', 'File <strong>'.$namaFile.'</strong> berhasil dihapus.');
         $request->session()->flash('class', 'success');
       }

       return redirect('biodata/list.html');
    }

    public function show()
    {
        //pengambilan daftar file
        $data['allFile'] = Biodata::getAllFiles();
        $data['no']      = 1;

        return view('biodata/list', $data);
    }

    public function message()
    {
        return view('biodata/message');
    }
}
