$(document).ready(function (){
    $('#nav-rekaplaper-tab').on('click', function () {
        $('#nav-rekaplaper-tab').attr('class', 'nav-link active');
        $('#nav-rekaplaper').attr('class', 'tab-pane fade show active');
        $('#nav-laper-tab').attr('class', 'nav-link');
        $('#nav-laper').attr('class', 'tab-pane fade');
        
    })
})