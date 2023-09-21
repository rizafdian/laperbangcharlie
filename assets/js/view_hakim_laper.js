$(document).ready(function (){
    $('#nav-rekaplaper-tab').on('click', function () {
        $('#nav-rekaplaper-tab').attr('class', 'nav-link active');
        $('#nav-rekaplaper').attr('class', 'tab-pane fade show active');
        $('#nav-laper-tab').attr('class', 'nav-link');
        $('#nav-laper').attr('class', 'tab-pane fade');
        $('#nav-triwulan-tab').attr('class', 'nav-link');
        $('#nav-triwulan').attr('class', 'tab-pane fade');
        $('#nav-rekaptriwulan-tab').attr('class', 'nav-link');
        $('#nav-rekaptriwulan').attr('class', 'tab-pane fade');
        
    })
    $('#nav-triwulan-tab').on('click', function () {

        $('#nav-triwulan-tab').attr('class', 'nav-link active');
        $('#nav-triwulan').attr('class', 'tab-pane fade show active');
        $('#nav-laper-tab').attr('class', 'nav-link');
        $('#nav-laper').attr('class', 'tab-pane fade');
        $('#nav-rekaplaper-tab').attr('class', 'nav-link');
        $('#nav-rekaplaper').attr('class', 'tab-pane fade');
        $('#nav-rekaptriwulan-tab').attr('class', 'nav-link');
        $('#nav-rekaptriwulan').attr('class', 'tab-pane fade');
    })
    $('#nav-rekaptriwulan-tab').on('click', function () {
        $('#nav-rekaptriwulan-tab').attr('class', 'nav-link active');
        $('#nav-rekaptriwulan').attr('class', 'tab-pane fade show active');
        $('#nav-laper-tab').attr('class', 'nav-link');
        $('#nav-laper').attr('class', 'tab-pane fade');
        $('#nav-rekaplaper-tab').attr('class', 'nav-link');
        $('#nav-rekaplaper').attr('class', 'tab-pane fade');
        $('#nav-triwulan-tab').attr('class', 'nav-link');
        $('#nav-triwulan').attr('class', 'tab-pane fade');
        
    })
    $('#nav-laper-tab').on('click', function () {
        $('#nav-laper-tab').attr('class', 'nav-link active');
        $('#nav-laper').attr('class', 'tab-pane fade show active');
        $('#nav-rekaptriwulan-tab').attr('class', 'nav-link');
        $('#nav-rekaptriwulan').attr('class', 'tab-pane fade');
        $('#nav-rekaplaper-tab').attr('class', 'nav-link');
        $('#nav-rekaplaper').attr('class', 'tab-pane fade');
        $('#nav-triwulan-tab').attr('class', 'nav-link');
        $('#nav-triwulan').attr('class', 'tab-pane fade');
       
        
        
    })
})