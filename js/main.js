$(document).ready(function() {

    $('.loading-image, .nim-input, .kelas-input').hide();
    $('.show_transaksi, .show_cicilan, .show_jumlah, .show_bayar , .show_lain, .show_status, .show_status_bayar').hide();

	$(".tip").tooltip({
        placement: "bottom"
    });

    $('#message1').toggleClass('in');
    setTimeout(function() {
        $('#message1').css('margin-right', "-1000px");
    }, 3000);

    $(".nidSingle").select2({
        allowClear: true,
    });  

    $('.kelasSingle').change(function(){
        var selected = $(this).find('option:selected');
        var id_kelas = selected.val();
        var i = 1;
        $('.loading-image').show('fast');
        $.ajax({
            url:'json.php?rec=absen&action=getSiswa&data='+id_kelas,
            type:'POST',
            dataType: 'json',
            success: function(data) {
                $('.loading-image').hide('fast');
                $(".table-absensi tbody tr").remove();
                $.each(data, function(index, item) {
                    $(".table-absensi tbody").append("<tr>"
                                                        +"<td class='bs-checkbox'>"+i+"</td>"
                                                        +"<td>"+item.nim+"</td>"
                                                        +"<td>"+item.nama+"</td>"
                                                        +"<td>"+item.kelas_asal+"</td>"
                                                        +"<td><input class='aksiAbsensiM' type='checkbox' name='aksi["+item.nim+"]' value='1,"+item.id_kelas+"'></td>"
                                                        +"<td><input class='aksiAbsensiS' type='checkbox' name='aksi["+item.nim+"]' value='2,"+item.id_kelas+"'></td>"
                                                        +"<td><input class='aksiAbsensiI' type='checkbox' name='aksi["+item.nim+"]' value='3,"+item.id_kelas+"'></td>"
                                                        +"<td><input class='aksiAbsensiT' type='checkbox' name='aksi["+item.nim+"]' value='4,"+item.id_kelas+"'></td>"
                                                    +"</tr>");
                    i++;
                });
                
            }
        });       
    }).change();

    $("#pilltab3 .cariBynim, #pilltab3 .cariBykelas").hide();
    $("#pilltab3 [name=cariBy]").change(function() {
        if(this.value == "siswa")
        {
            $("#pilltab3 .cariBynim").show('fast');
            $("#pilltab3 .cariBykelas").hide('fast');
        }
        else if(this.value == "kelas")
        {
            $("#pilltab3 .cariBykelas").show('fast');
            $("#pilltab3 .cariBynim").hide('fast');
        }
    });

    $(".btncari-absen").click(function(event) {
        
        var cari = $("#pilltab3 [name=cariBy]:checked").val();
        var url;
        var tanggal_kuliah  = $(".cari_data [name=tanggal_kuliah]").val();
        
        if(cari == "siswa")
        {
            var nim    = $(".cariBynim [name=nim]").val();
            url = 'json.php?rec=absen&action=cariAbsen&data='+nim+','+tanggal_kuliah+',siswa'
        }
        else if(cari = "kelas")
        {
            var kelas   = $(".cari_data [name=kelas]").val();
            var nid     = $(".cari_data [name=nid]").val();
            var matkul  = $(".cari_data [name=matkul]").val();
            url = 'json.php?rec=absen&action=cariAbsen&data='+kelas+','+tanggal_kuliah+',kelas'+','+nid+','+matkul
        }
        

        var i = 1;
            $('.loading-image').show('fast');
            $.ajax({
                url: url,
                type:'POST',
                dataType: 'json',
                success: function(data) {
                    $('.loading-image').hide('fast');
                    $(".table-cari tbody tr").remove();
                    $.each(data, function(index, item) {
                    
                        if(item.kehadiran == "1")
                        {
                            var M = "checked=checked";
                        }else{
                            var M = "";
                        }
                        
                        if(item.kehadiran == "2")
                        {
                            var S = "checked=checked";
                        }else{
                            var S = "";
                        }

                        if(item.kehadiran == "3")
                        {
                            var I = "checked=checked";
                        }else{
                            var I = "";
                        }

                        if(item.kehadiran == "4")
                        {
                            var T = "checked=checked";
                        }else{
                            var T = "";
                        }

                        $(".table-cari tbody").append("<tr>"
                                                            +"<td class='bs-checkbox'>"+i+"</td>"
                                                            +"<td>"+item.nim+"</td>"
                                                            +"<td>"+item.nama+"</td>"
                                                            +"<td>"+item.kelas_asal+"</td>"
                                                            +"<td>"+item.nama_dosen+"</td>"
                                                            +"<td>"+item.mata_kuliah+"</td>"
                                                            +"<td><input class='aksiAbsensiM' type='checkbox' "+M+" name='update["+item.id_absen+"]' value='1'></td>"
                                                            +"<td><input class='aksiAbsensiS' type='checkbox' "+S+" name='update["+item.id_absen+"]' value='2'></td>"
                                                            +"<td><input class='aksiAbsensiS' type='checkbox' "+I+" name='update["+item.id_absen+"]' value='3'></td>"
                                                            +"<td><input class='aksiAbsensiS' type='checkbox' "+T+" name='update["+item.id_absen+"]' value='4'></td>"
                                                            +"<td><a type='button' class='btn btn-danger tip' data-href='dash.php?rec=absen&action=hapusData&data="+item.id_absen+"' data-toggle='modal' data-target='#confirm-delete'>"
                                                            +"<span class='glyphicon glyphicon-remove'></span>"
                                                            +"</a></td>"
                                                        +"</tr>");
                        
                        i++;
                    });
                    
                }
            });       
        });         

    $(".checkAllM").click(function(event) {
        if(this.checked) {
            $('.aksiAbsensiM').each(function() {
                this.checked = true;
            });
        }else{
            $('.aksiAbsensiM').each(function() {
                this.checked = false;
            });
        }
    });

    $(".checkAllS").click(function(event) {
        if(this.checked) {
            $('.aksiAbsensiS').each(function() {
                this.checked = true;
            });
        }else{
            $('.aksiAbsensiS').each(function() {
                this.checked = false;
            });
        }
    });

    $(".checkAllI").click(function(event) {
        if(this.checked) {
            $('.aksiAbsensiI').each(function() {
                this.checked = true;
            });
        }else{
            $('.aksiAbsensiI').each(function() {
                this.checked = false;
            });
        }
    });

    $(".checkAllT").click(function(event) {
        if(this.checked) {
            $('.aksiAbsensiT').each(function() {
                this.checked = true;
            });
        }else{
            $('.aksiAbsensiT').each(function() {
                this.checked = false;
            });
        }
    });

    $('.thn_ajaranSearch, .nidSingle').change(function(){
        var selectNid = $('.nidSingle').find('option:selected');
        var selectThn = $('.thn_ajaranSearch').find('option:selected');
        var nid = selectNid.val();
        var thn_ajaran = selectThn.val();
        $('.loading-image').show('fast');
        $.ajax({
            url:'json.php?rec=absen&action=getMatkul&data='+nid+','+thn_ajaran,
            type:'POST',
            dataType: 'json',
            success: function(data) {
            $('.loading-image').hide('fast');
            $(".matkulSingle option").remove();
                $.each(data, function(index, item) {
                    $('.matkulSingle').append($('<option>').text(item.mata_kuliah).attr('value', item.kode_matkul));
                });
            }
        });       
    }).change();

    $('#pilltab3 .thn_ajaranSearch, #pilltab3 .nidSingle').change(function(){
        var selectNid = $('#pilltab3 .nidSingle').find('option:selected');
        var selectThn = $('#pilltab3 .thn_ajaranSearch').find('option:selected');
        var nid = selectNid.val();
        var thn_ajaran = selectThn.val();
        $('.loading-image').show('fast');
        $.ajax({
            url:'json.php?rec=absen&action=getMatkul&data='+nid+','+thn_ajaran,
            type:'POST',
            dataType: 'json',
            success: function(data) {
            $('.loading-image').hide('fast');
            $("#pilltab3 .matkulSingle option").remove();
                $.each(data, function(index, item) {
                    $('#pilltab3 .matkulSingle').append($('<option>').text(item.mata_kuliah).attr('value', item.kode_matkul));
                });
            }
        });       
    }).change();

    $(".matkulAuto").select2({
        placeholder: "Kode Mata Kuliah",
        allowClear: true,
        ajax: {
            url: "json.php?rec=detailDosen&action=getMatkul",
            dataType: 'json',
            quietMillis: 100,
            data: function (term, page) {
                return {
                    term: term, //search term
                    page_limit: 10 // page size
                };
            },
            results: function (data, page) {
                return { results: data.results, more: (data.results && data.results.length == 10 ? true: false) };
            }
        },
        initSelection: function(element, callback) {
            return $.getJSON("json.php?rec=detailDosen&action=getMatkul&id="+(element.val()), null, function(data) {
                return callback();
            });
        },
    });

    $(".nimAuto").select2({
        placeholder: "NIM",
        allowClear: true,
        minimumInputLength: 7,
        ajax: {
            url: "json.php?rec=bayar&action=getNim",
            dataType: 'json',
            quietMillis: 100,
            data: function (term, page) {
                return {
                    term: term, //search term
                    page_limit: 10 // page size
                };
            },
            results: function (data, page) {
                return { results: data.results, more: (data.results && data.results.length == 10 ? true: false) };
            }
        },
        initSelection: function(element, callback) {
            return $.getJSON("json.php?rec=bayar&action=getNim&id="+(element.val()), null, function(data) {
                return callback();
            });
        },
    }).on('select2-selecting',function(e) {
        //console.log("selecting val=" + e.val + " choice=" + e.object.text+" nim="+e.object.id);
        $('.show_transaksi').show('fast');

        $('.show_transaksi').change(function() {
            /* Act on the event */
            var app = $('.show_transaksi [name=jenis_transaksi]').val();

            if(app == "SPP")
            {
                $('.show_jumlah [name=jumlah_pembayaran]').val(e.object.jumlah_spp).attr('readonly', true);
                $('.show_lain').hide('fast');
                $('.show_cicilan .control-label').text('Semester Ke');
                $('.show_jumlah [name=jumlah_pembayaran], .show_jumlah .control-label').show('fast');
            }
            else if(app == "AAL")
            {
                $('.show_jumlah [name=jumlah_pembayaran]').val(e.object.jumlah_aal).attr('readonly', true);
                $('.show_lain').hide('fast');
                $('.show_cicilan .control-label').text('Semester Ke');
                $('.show_jumlah [name=jumlah_pembayaran], .show_jumlah .control-label').show('fast');
            }
            else if(app == "DPP")
            {
                $('.show_jumlah [name=jumlah_pembayaran]').val(e.object.jumlah_dpp).attr('readonly', true);
                $('.show_lain').hide('fast');
                $('.show_cicilan .control-label').text('Cicilan Ke');
                $('.show_jumlah [name=jumlah_pembayaran], .show_jumlah .control-label').show('fast');
            }
            else
            {
                $('.show_lain').show('fast');
                $('.show_cicilan .control-label').text('Cicilan Ke');
                $('.show_jumlah [name=jumlah_pembayaran], .show_jumlah .control-label').hide();
            }

            $('.show_cicilan').show('fast');
            $('.show_jumlah').show('fast');
            $('.show_bayar').show('fast');
            $('.show_status').show('fast');
            $('.show_status_bayar').show('fast');
        });
    }).on("select2-removed", function(e) {
        //console.log("removed val=" + e.val + " choice=" + e.choice.text);
        $('.show_jumlah [name=jumlah_pembayaran]').val("");
        $('.show_transaksi [name=jenis_transaksi]').prop('selectedIndex',0);
        $('.show_cicilan').hide('fast');
        $('.show_jumlah').hide('fast');
        $('.show_bayar').hide('fast');
        $('.show_transaksi').hide('fast');
        $('.show_status').hide('fast');
        $('.show_lain').hide('fast');
        $('.show_status_bayar').hide('fast');
        $("#formAdd")[0].reset();

    });

    $(".btn-modal").click(function(){
        $('#addModal').modal({show:true})
        $(".btn-save").attr("value","Simpan");
    });

    $('#addModal, #updateModal').on('hidden.bs.modal', function () {
        $("#formAdd")[0].reset();
        $("#formUpdate")[0].reset();
    });

    $(".btn-reset").click(function(){
        $("#formAdd")[0].reset();
        $('.placehold').attr('src', 'image/placehold.gif');
        $('.show_transaksi, .show_cicilan, .show_jumlah, .show_lain, .show_status').hide("fast");
        $('.show_jumlah [name=jumlah_pembayaran]').val("");
        $('.show_transaksi [name=jenis_transaksi]').prop('selectedIndex',0);
    });

    $(".btn-hapus").click(function(){
       var selected = [];
       var id_data = [];
        $('.table-data tbody .bs-checkbox input:checked').each(function() {
            selected.push($(this).attr('data-index'));
        });

        for(i = 0; i < selected.length; i++)
        {
            var value = $(".table-data tbody").find("tr[data-index="+selected[i]+"]").find('.btn-perbarui').attr('data-id');
            id_data.push(value);
        }
        $('#confirm-delete').modal({show:true})
        
        var href     = $(".btn-hapus").data('href')+"&data="+id_data;
        
        $('#confirm-delete').find('.danger').attr('href', href);

    });
    
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
    });    

    $(".btn-export").click(function(){
       var selected = [];
       var id_data = [];
        $('.table-data tbody .bs-checkbox input:checked').each(function() {
            selected.push($(this).attr('data-index'));
        });

        for(i = 0; i < selected.length; i++)
        {
            var value = $(".table-data tbody").find("tr[data-index="+selected[i]+"]").find('.btn-perbarui').attr('data-id');
            id_data.push(value);
        }
        $('#confirm-export').modal({show:true})
        
        var href     = $(this).data('href')+"&data="+id_data;
        
        $('#confirm-export').find('.btn-info').attr('href', href);

    });
    
    $('#confirm-export').on('show.bs.modal', function(e) {
        $(this).find('.btn-info').attr('href', $(e.relatedTarget).data('href'));
    });

    $(".btn-import").click(function(){
       
        $('#upload-csv').modal({show:true})
        
        var action     = $(this).data('href');
        
        $('#upload-csv').find('#formImport').attr('action', action);

    });
    
    $('#upload-csv').on('show.bs.modal', function(e) {
        $(this).find('#formImport').attr('action', $(e.relatedTarget).data('href'));
    });

    $('#updateModal').on('show.bs.modal', function(e) {
        var id_data     = $(e.relatedTarget).data('id');
        var fungsi      = $(e.relatedTarget).data('function');
        $("#formUpdate")[0].reset();
        $(".loading-image").show();

        
            $.ajax({
            url:"json.php?rec="+fungsi+"&action=perbarui",
            dataType:"json",
            data: {"data":id_data},
            type: "GET",
            success:function(data){
                $(".loading-image").hide('fast');
                $.each(data, function(index){

                    if(fungsi == 'jurusan')
                    {
                      $('[name=kode_jurusan]').val(data.id_jurusan);
                      $('[name=jurusan]').val(data.jurusan);
                    }
                    else if(fungsi == 'tahun_ajaran')
                    {
                      $('[name=tahun_ajaran]').val(data.thn_ajaran);
                      $('[name=keterangan]').val(data.keterangan);
                    }
                    else if(fungsi == 'dosen')
                    {
                      $('[name=nid]').val(data.nid);
                      $('[name=nama]').val(data.nama_dosen);
                    }
                    else if(fungsi == 'matkul')
                    {
                      $('[name=kode_matkul]').val(data.kode_matkul);
                      $('[name=matkul]').val(data.mata_kuliah);
                      $('[name=sks]').val(data.sks);
                    }
                    else if(fungsi == 'kelas')
                    {
                      $('[name=kode_kelas]').val(data.id_kelas);
                      $('[name=kelas]').val(data.kelas);
                    }
                    else if(fungsi == 'mahasiswa')
                    {
                      $('[name=nama]').val(data.nama);
                      $('[name=nim]').val(data.nim);
                      $('[name=tempat_lahir]').val(data.tempat_lahir);
                      $('[name=tanggal_lahir]').val(data.tanggal);
                      $('[name=jenis_kelamin]').filter('[value="'+data.jenis_kelamin+'"]').prop('checked', true);
                      $('[name=agama] option[value="'+data.agama+'"]').prop('selected', true);
                      $('[name=asal_sma]').val(data.asal_sma);
                      $('[name=jurusan]').val(data.jurusan);
                      $('[name=tahun_lulus] option[value="'+data.tahun_lulus+'"]').prop('selected', true);
                      $('[name=alamat]').val(data.alamat);
                      $('[name=kota]').val(data.kota);
                      $('[name=kelas] option[value="'+data.id_kelas+'"]').prop('selected', true);
                      $('[name=gelombang] option[value="'+data.gelombang+'"]').prop('selected', true);

                      /*if(data.foto == "")
                      {
                        $('.placehold').attr('src', 'image/placehold.gif');  
                      }
                      else
                      {
                        $('.placehold').attr('src', 'image/upload/foto/'+data.foto);   
                      }*/
                      
                    }
                    else if(fungsi == 'absen')
                    {
                        $('#formUpdate [name=kelas] option[value="'+data.id_kelas+'"]').prop('selected', true);
                        $('#formUpdate [name=nid] option[value="'+data.nid+'"]').prop('selected', true);
                        $('#formUpdate [name=matkul] option[value="'+data.kode_matkul+'"]').prop('selected', true);
                        $('#formUpdate [name=tahun_ajaran] option[value="'+data.id_thn_ajaran+'"]').prop('selected', true);
                        $('#formUpdate [name=pertemuan] option[value="'+data.pertemuan+'"]').prop('selected', true);
                        $('#formUpdate [name=tanggal_kuliah]').val(data.tanggal_kuliah);
                        $('#formUpdate [name=jam_mulai]').val(data.jam_mulai);
                        $('#formUpdate [name=jam_akhir]').val(data.jam_akhir);
                    }
                    else if(fungsi == 'spp')
                    {
                        $('[name=angkatan] option[value="20'+data.id_angkatan+'"]').prop('selected', true);
                        $('[name=jumlah_aal]').val(data.jumlah_aal);
                        $('[name=jumlah_spp]').val(data.jumlah_spp);
                    }
                    else if(fungsi == 'dpp')
                    {
                        $('[name=angkatan] option[value="20'+data.id_angkatan+'"]').prop('selected', true);
                        $('[name=gelombang] option[value="'+data.gelombang+'"]').prop('selected', true);
                        $('[name=jumlah_dpp]').val(data.jumlah_dpp);
                    }
                    else if(fungsi == 'administrator')
                    {
                      $('[name=nip]').val(data.nip);
                      $('[name=nama]').val(data.nama);
                      $('[name=alamat]').val(data.alamat);
                      $('[name=jenis_kelamin]').filter('[value="'+data.jenis_kelamin+'"]').prop('checked', true);
                      $('[name=email]').val(data.email);
                      $('[name=status_bagian] option[value="'+data.status_bagian+'"]').prop('selected', true);
                      $('[name=last_foto]').val(data.foto);

                      if(data.foto == "")
                      {
                        $('.placehold').attr('src', 'image/placehold.gif');  
                      }
                      else
                      {
                        $('.placehold').attr('src', 'image/upload/foto/'+data.foto);   
                      }
                      
                    }
                    else if(fungsi == 'bayar')
                    {
                        $('[name=no_transaksi]').val(data.no_transaksi);
                        $('[name=nim]').val(data.nim);
                        $('[name=jenis_transaksi]').val(data.jenis_transaksi);
                        $('[name=status_pembayaran]').filter('[value="'+data.status_pembayaran+'"]').prop('checked', true);
                        //$('[name=status_pembayaran] input[value="'+data.status_pembayaran+'"]').prop('checked', true);
                        $('[name=cicilan_ke] option[value="'+data.cicilan_ke+'"]').prop('selected', true);

                        var app = data.jenis_transaksi;

                        if(app == 'SPP')
                        {
                            $('[name=jumlah_pembayaran]').val(data.jumlah_spp);
                        }
                        else if(app == 'DPP')
                        {
                            $('[name=jumlah_pembayaran]').val(data.jumlah_dpp);   
                        }
                        else if(app == 'AAL')
                        {
                            $('[name=jumlah_pembayaran]').val(data.jumlah_aal);      
                        }
                        else 
                        {
                            $('[name=jumlah_pembayaran]').val("");   
                        }
                        
                        $('.show_last').hide();
                        
                        if(data.status == "Belum")
                        {
                            $('.show_last').show();
                            $('[name=last_bayar]').val(data.jumlah_pembayaran);   
                        }
                        else
                        {
                            $('[name=pembayaran]').val(data.jumlah_pembayaran);      
                        }
                        $('[name=status] option[value="'+data.status+'"]').prop('selected', true);
                        
                    }
                    $('.form').attr('action', 'dash.php?rec='+fungsi+'&action=update&data='+id_data);
                });
              //alert("Success");
            }
          });
        
    });    

    $(".foto-mahasiswa").change(function(){
        $('.loading-image').show();
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.placehold').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
            $('.loading-image').hide();
        }
    }
    
    $(function () {
        $('#kalender').datetimepicker({
            pickTime: false,
            minDate: '1/1/1900',
        });
    });

    $(function () {
        $('#kalender1').datetimepicker({
            pickTime: false,
            minDate: '1/1/1900',
        });
    });

    $(function () {
        $('#kalender2').datetimepicker({
            pickTime: false,
            minDate: '1/1/1900',
        });
    });

    $(function () {
        $('#jam_mulai , #jam_akhir').datetimepicker({
            pickDate: false,
            use24hours: true,
            format: 'HH:mm',
        });
    });
    
    $(function () {
        $('#hover, #striped, #condensed').click(function () {
            var classes = 'table';

            if ($('#hover').prop('checked')) {
                classes += ' table-hover';
            }
            if ($('#condensed').prop('checked')) {
                classes += ' table-condensed';
            }
            $('#table-style').bootstrapTable('destroy')
                .bootstrapTable({
                    classes: classes,
                    striped: $('#striped').prop('checked')
                });
        });
    });
	
    function rowStyle(row, index) {
        var classes = ['active', 'success', 'info', 'warning', 'danger'];

        if (index % 2 === 0 && index / 2 < classes.length) {
            return {
                classes: classes[index / 2]
            };
        }
        return {};
    }
			
	!function ($) {

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) {
			$('#sidebar-collapse').collapse('hide');
			}
		})
	}

});