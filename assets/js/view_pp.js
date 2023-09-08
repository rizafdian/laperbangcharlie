$(document).ready(function () {

    //data table
    const path = window.location.origin;
    // const path = `${prapath}/laperbang/Panitera_pengganti/`;
    // const path = `../../Panitera_pengganti/`;
    console.log(path);
    //---Tampil data table kegiatan
    let list_perkara = $('#listperkara').DataTable({
        "ajax": `${path}/pp/panitera_pengganti/get_data_banding`,
        "columns": [
            {
                "data": null, "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "nama" },
            { "data": "tgl_register" },
            { "data": "nm_pihak_penggugat" },
            { "data": "nm_pihak_tergugat" },
            { "data": "no_perkara" },
            { "data": "jns_perkara" },
            { "data": "no_perkara_banding" },
            { "data": "tgl_reg_banding" },
            { "data": "status_perkara" },
            {
                "data": null,
                "defaultContent": `<a href="javascript:;" id='view_doc' class="text-satu item_view"'><i class="fas fa-fw fa-eye" title= 'Lihat Berkas'></i> <br>
                `
            }
        ]
    });
    //======

    //tombol view di klik,
    $('#listperkara').on('click', '.item_view', function () {
        let data = list_perkara.row($(this).parents('tr')).data();
        let id_perkara = data['id_perkara'];
        window.location.href = `${path}/pp/pp_laper/view_berkas_admin/${id_perkara}/`;

    });

    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        Swal.fire(

            'Success',
            flashData,
            'success'
        );
    }

    const flashMsg = $('.flash-data2').data('flashdata');
    if (flashMsg) {
        Swal.fire(
            'Error',
            flashMsg,
            'error'
        );
    }


});