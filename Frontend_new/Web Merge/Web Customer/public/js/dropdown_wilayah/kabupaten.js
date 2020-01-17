
      $(document).ready(function(){
        var $this = $('#kabupaten')
        var $kec = $('#kecamatan')
        // if($this.find('option:selected').val()==0){
        //   $kec.attr("disabled",true);
  
        // }
        $this.change(function(){
          var url = $kec.attr('data-source')+$this.find('option:selected').attr('value');
          var selectedProvinsi = $this.find('option:selected').attr('value');
        //   console.log(url)
          // console.log("Provinsi : "+selectedProvinsi)
          $.ajax({
            url: url,
            type: 'GET',
            success:function(response){
              $kec.attr('disabled',false);
              
            //   console.log(response);
              var $select = $kec;
  
              $('#kecamatan').find('option').remove();
            $("#kecamatan").append('<option selected>-- Pilih Kecamatan --</option>');

            $('#kelurahan').find('option').remove();
            $("#kelurahan").append('<option selected>-- Pilih Kelurahan --</option>');

             $.each(response,function(key,value){
               $kec.append('<option value ='+value.id+'>' +value.name+'</option>');
             });
             
            }
          })
        })
      })