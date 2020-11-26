var bold = false;
var italic = false;
var underline = false;

// foto
$('#image-button').click(() => {
    $('#insert-image').show();
    $('#insert-image').css('background', 'rgba(0,0,0,0.4)');
});

$('#close-insert-image').click(() => {
    $('#insert-image').hide();
});

// video
$('#video-button').click(() => {
    $('#insert-video').show();
    $('#insert-video').css('background', 'rgba(0,0,0,0.4)');
});

$('#close-insert-video').click(() => {
    $('#insert-video').hide();
});

// link
$('#link-button').click(() => {
    $('#insert-link').show();
    $('#insert-link').css('background', 'rgba(0,0,0,0.4)');
});

$('#close-insert-link').click(() => {
    $('#insert-link').hide();
});

// pomoc
$('#help-button').click(() => {
    $('#help-modal').show();
    $('#help-modal').css('background', 'rgba(0,0,0,0.4)');
});

$('#close-help-modal').click(()=>{
    $('#help-modal').hide();
});

// podsumowanie
$('#reject-sheet').click(() => {
    $('#option-submit').hide();
});

$('#submit').click(() => {
    $('#option-submit').show();
    $('#option-submit').css('background', 'rgba(0,0,0,0.4)');
});


// generowanie pdf
$('#pdf-export').click(() => {
    var htmlSheet = $('#editor-content').innerHTML;
    $.ajax({
        url: '/Home/GeneratePdf',
        data: {
            schema : htmlSheet
        },
        contentType: 'json',
        method: 'POST',
        success: function () {
            // wyświetlić komunikat i pobrać plik jeżeli się powiodło
        },
        error: function () {
            console.log('nie działa');
            // wyświetlić komunikat jeśli się nie powiodło
        }
    });
});

// pogrubienie
$('#bold').click(()=>{
    if(!$('#bold').hasClass("active")) {
        $('#bold').addClass("active");
        document.execCommand("bold");
    }
    else {
        $('#bold').removeClass("active");
    }
});

// kursywa
$('#italic').click(()=>{
    if(!$('#italic').hasClass("active")) {
        $('#italic').addClass("active");
        document.execCommand("italic");
    }
    else {
        $('#italic').removeClass("active");
    }
});

// podkreślenie
$('#underline').click(()=>{
    if(!$('#underline').hasClass("active")) {
        $('#underline').addClass("active");
        document.execCommand("underline");
    }
    else {
        $('#underline').removeClass("active");
    }
});

