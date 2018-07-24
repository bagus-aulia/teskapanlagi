function resetInput()
{
  var namaFile = $('#namaFile').val();
  $('form :input').val('');
  $('#btnSimpan').val('Simpan');
  $('#namaFile').val(namaFile);
  $('#nama').focus();
}

  var specialKeys = new Array();
  specialKeys.push(8); //Backspace
  function keyValidate(e) {
      var keyCode = e.which ? e.which : e.keyCode
      var ret = ((keyCode != 58 && keyCode != 59 && keyCode != 44));

      if(ret == true)
      {
        $("#errorCharacter").addClass("hidden");
      }else{
        $("#errorCharacter").removeClass("hidden");
      }
      return ret;
  }

  $(document).ready( function () {
      $('#daftarFile').DataTable(
      );
  } );
