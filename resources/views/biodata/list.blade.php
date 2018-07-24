@extends('biodata.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <a href="{{ secure_url("/") }}"> Halaman Utama</a>
        </div>
        <div class="col-md-5">
          @if (Session::has('info') or count($errors) > 0)
          <div class="alert alert-{{ (Session::has('class') ? session('class') : 'default') }}">
              <h4>Informasi</h4>
              {!! session('info') !!}
          </div>
          @endif
            <div class="card">
                <div class="card-header">Daftar Biodata.</div>

                <div class="card-body">
                    <table id="daftarFile" class="display">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama File</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($allFile as $file)
                          <tr>
                              <td>{{ $no }}</td>
                              <td>{{ $file }}</td>
                              <td>
                                  <a href="{{ secure_url('biodata/'.$file) }}" class="btn btn-primary btn-sm"> Ubah</a>
                                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" onclick="deleteFile('{{ $file }}')"> Hapus</button>
                              </td>
                          </tr>
                          <?php $no++; ?>
                          @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Apakah benar, Anda ingin menghapus <strong id="spanNamaFile"></strong> ?</p>
      </div>
      <div class="modal-footer">
        <a href="{{ secure_url('deletebiodata/') }}" class="btn btn-danger" id="hapus">Hapus</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  function deleteFile(namaFile){
    $("#spanNamaFile").html(namaFile);
    $("#hapus").attr('href', "{{ secure_url('deletebiodata')}}" + '/' + namaFile);
  }
</script>
@endsection
