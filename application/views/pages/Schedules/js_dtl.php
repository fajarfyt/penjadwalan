<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-rowgroup/js/dataTables.rowGroup.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-rowgroup/js/rowGroup.bootstrap4.min.js') ?>"></script>
<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url('assets/script/sweet-alerts.js') ?>"></script>
<!-- Bootsrap Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- Select2 -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script> -->
<script src="<?php echo base_url('assets/script/select2/js/bootstrap-select.min.js') ?>"></script>

<script type="text/javascript">
  var table;
  $(document).ready(function() {

		table = $("#table").DataTable({
	     	
        ajax: "<?php echo site_url('Schedules/ajax_list_dtl')?>",

        "responsive": true,
	     	"autoWidth": false,

        "dom": '<"top"<"row"<"col-md-6 actions action-btns"B><"col-md-6"f>>><"clear">rt<"bottom"<"actions">p>',
        
        "oLanguage": {
         	"sSearch": ""
        },
        
        "aLengthMenu": [
        	[4, 10, 15, 20],
        	[4, 10, 15, 20]
      	],

        bInfo: false,
      	"pageLength": 4,
      	buttons: [{
          	action: function() {
          	},
        }],

        initComplete: function(settings, json) {
          $(".dt-buttons .btn").removeClass("btn-secondary");
      	},

	    });

	    // To append actions dropdown before add new button
  		var actionButtons = $(".actions-buttons")
  		actionButtons.insertBefore($(".top .actions .dt-buttons"))

      //datepicker
      $('.datepicker').datepicker({
          autoclose: true,
          format: "yyyy-mm-dd",
          todayHighlight: true,
          orientation: "bottom auto",
          todayBtn: true,
          todayHighlight: true,  
      });

      // //Initialize Select2 Elements
      // $('.select2bs4').select2({
      //   theme: 'bootstrap4',
      //   dropdownParent: $('#modal-add'),
      //   placeholder: "-- Silahkan Pilih --"
      // })

      // $('.select2edit').select2({
      //   theme: 'bootstrap4',
      //   dropdownParent: $('#modal-edit'),
      //   placeholder: "-- Silahkan Pilih --"
      // })

  })

  function reload_table()
  {
      table.ajax.reload(); //reload datatable ajax
  }

  function clear_all_error()
  {
      $('[name="date_sch"]').removeClass('border-danger');
      $('[name="id_crane"]').removeClass('border-danger');
      $('[name="ehrm"]').removeClass('border-danger');
      $('[name="ohrm"]').removeClass('border-danger');
      $('[name="tangki_bawah"]').removeClass('border-danger');
      $('[name="tangki_atas"]').removeClass('border-danger');

      $('[class="NOTIF_ERROR_date_sch"]').html('');
      $('[class="NOTIF_ERROR_id_crane"]').html('');
      $('[class="NOTIF_ERROR_ehrm"]').html('');
      $('[class="NOTIF_ERROR_ohrm"]').html('');
      $('[class="NOTIF_ERROR_tangki_bawah"]').html('');
      $('[class="NOTIF_ERROR_tangki_atas"]').html('');
  }

  function add()
  {
    clear_all_error();
    save = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal-add').modal('show'); // show bootstrap modal
    // $('.modal-title').text(''); // Set Title to Bootstrap modal title
    $('[name="id_crane"]').val('').trigger('change'); // Reset Select2bs4
  }

  function simpan()
  {
    clear_all_error();
    $('#btnSave').text('SUBMITING...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    
    var url; 
    url = "<?php echo site_url('Schedules/ajax_add')?>";

    $.ajax({
      url : url,
      type: "POST",
      data: $('#form').serialize(),
      dataType: "JSON",
      success: function(data)
      {
          if(data.status) //if success close modal and reload ajax table
          {
              $('#modal-add').modal('hide');
              reload_table();
              swal("Kerja Bagus !", "Data Berhasil Disimpan !", "success");
          }
          else
          {
            for (var i = 0; i < data.inputerror.length; i++)
            {
                let inputerror = $('[name="'+data.inputerror[i]+'"]');
                $('[class="NOTIF_ERROR_'+data.inputerror[i]+'"]').html(data.notiferror[i]);
                inputerror.addClass('border-danger');
            }
            $('[name="'+data.inputerror[0]+'"]').focus();
          }
          $('#btnSave').text('SUBMIT'); //change button text
          $('#btnSave').attr('disabled',false); //set button enable


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Ya Ampun, Maaf !", "Data Gagal Disimpan !", "warning");
            $('#btnSave').text('SUBMIT'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
  }

  function edit(id)
    {
        clear_all_error();
        $('#form-edit')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        $.ajax({
            url : "<?php echo site_url('Schedules/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="id_sch"]').val(data.id_sch);
                $('[name="date_sch"]').val(data.date_sch);
                $('[name="id_crane"]').val(data.id_crane);
                // $('#id_crane').empty().trigger('change');
                // $('#id_crane').append(data.id_crane);
                console.log(data.id_crane);
                $('[name="ehrm"]').val(data.ehrm);
                $('[name="ohrm"]').val(data.ohrm);
                $('[name="tangki_bawah"]').val(data.tangki_bawah);
                $('[name="tangki_atas"]').val(data.tangki_atas);
                // console.log(data.id_sch);
                $('#modal-edit').modal('show'); // show bootstrap modal when complete loaded
                // $('.modal-title').text('Edit Status'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function update()
    {
        clear_all_error();
        $('#btnUpdate').text('UPDATING...'); //change button text
        $('#btnUpdate').attr('disabled',true); //set button disable
        
        var url;
        url = "<?php echo site_url('Schedules/ajax_update')?>";

        // ajax adding data to database
        var formData = new FormData($('#form-edit')[0]);

        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data)
            {
                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal-edit').modal('hide');
                    reload_table();
                    swal("Kerja Bagus !", "Data Berhasil Diperbarui !", "success");
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        let inputerror = $('[name="'+data.inputerror[i]+'"]');
                        $('[class="NOTIF_ERROR_'+data.inputerror[i]+'"]').html(data.notiferror[i]);
                        inputerror.addClass('border-danger');
                    }
                    $('[name="'+data.inputerror[0]+'"]').focus();
                }
                $('#btnUpdate').text('UPDATE'); //change button text
                $('#btnUpdate').attr('disabled',false); //set button enable


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Ya Ampun, Maaf !", "Data Gagal Diperbarui !", "warning");
                $('#btnUpdate').text('UPDATE'); //change button text
                $('#btnUpdate').attr('disabled',false); //set button enable

            }
        });

    }

    function hapus(id) 
    {
        swal({
          title: "Apakah Anda Yakin ?",
          text: "Data Anda Akan Hilang Dari Sistem !",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              url: "<?php echo site_url('Schedules/ajax_delete')?>/" + id,
              type: "POST",
              dataType: "JSON",
              success: function (data) {
                  swal("Sukses !", "Data Berhasil Dihapus !", "success");
                  reload_table();
              },
              error: function (jqXHR, textStatus, errorThrown) {
                  swal("Sorry !", "Data Gagal Dihapus !", "warning");
              }
            });
          }
        });
    }

</script>
