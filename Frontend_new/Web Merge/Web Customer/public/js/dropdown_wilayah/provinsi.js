
    $(document).ready(function(){
    //   if($('#provinsi').find('option:selected').val()==0){
    //     $("#kabupaten").attr("disabled",true);

    //   }
      $('#provinsi').change(function(){
        var url = $('#kabupaten').attr('data-source')+$('#provinsi').find('option:selected').attr('value');
        var selectedProvinsi = $('#provinsi').find('option:selected').attr('value');
        console.log(url);
        // console.log("Provinsi : "+selectedProvinsi)
        $.ajax({
          url: url,
          type: 'GET',
          success:function(response){
            $("#kabupaten").attr('disabled',false);
            
            // console.log(response);
            var $select = $('#kabupaten');

            $select.find('option').remove();
            $("#kabupaten").append('<option selected>-- Pilih Kabupaten --</option>');

            $('#kecamatan').find('option').remove();
            $("#kecamatan").append('<option selected>-- Pilih Kecamatan --</option>');

            $('#kelurahan').find('option').remove();
            $("#kelurahan").append('<option selected>-- Pilih Kelurahan --</option>');

           $.each(response,function(key,value){
             $("#kabupaten").append('<option value ='+value.id+'>' +value.name+'</option>');
           });
           
          }
        })
      })
    })
 