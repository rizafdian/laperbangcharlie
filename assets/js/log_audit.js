$(document).ready(function () {

    //data table
    const path = window.location.origin;
    // const path = `${prapath}/laperbang/`;
    console.log(path);
    //---Tampil data table kegiatan
    let list_perkara = $('#listperkara').DataTable({
        "ajax": `${path}/Admin/get_data_audittrail/`,
        "columns": [
            {
                "data": null, "sortable": false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "isi_log" },
            { "data": "rekam_log" },
            { "data": "nama_log" },
        ]
    });
    //======
});
