$(document).ready(function (){
    $('#nav-rekaplaper-tab').on('click', function () {
        $('#nav-rekaplaper-tab').attr('class', 'nav-link active');
        $('#nav-rekaplaper').attr('class', 'tab-pane fade show active');
        // $('#nav-laper-tab').attr('class', 'nav-link');
        // $('#nav-laper').attr('class', 'tab-pane fade');
        
    })
    $('#nav-laper-tab').on('click', function () {
        $('#nav-triwulan-tab').attr('class', 'nav-link active');
        $('#nav-triwulan').attr('class', 'tab-pane fade show active');
        // $('#nav-laper-tab').attr('class', 'nav-link');
        // $('#nav-laper').attr('class', 'tab-pane fade');
        
    })
    $('#nav-laper-tab').on('click', function () {
        $('#nav-rekaptriwulan-tab').attr('class', 'nav-link active');
        $('#nav-rekaptriwulan').attr('class', 'tab-pane fade show active');
        // $('#nav-laper-tab').attr('class', 'nav-link');
        // $('#nav-laper').attr('class', 'tab-pane fade');
        
    })
})