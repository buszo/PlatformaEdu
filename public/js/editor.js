var bold = false;
var italic = false;
var underline = false;

// tabela
$('#add-table').click(() => {
    var rows = $('#table-rows').val();
    var cols = $('#table-cols').val();

    var table = document.createElement('table');

    for (i = 0; i < rows; i++) {
        var tr = document.createElement('tr');

        for (j = 0; j < cols; j++) {
            var td = document.createElement('td');
            tr.append(td);
        }
        table.append(tr);
    }
    $('#table-rows').val('');
    $('#table-cols').val('');

    console.log(table);
    
    // wstawić tabelę w miejsce, w którym ostatnio był kursor
});


// link
$('#link-button').click(() => {
    $('#insert-link').show();
    $('#insert-link').css('background', 'rgba(0,0,0,0.4)');
});
$('#close-insert-link').click(() => {
    $('#insert-link').hide();
});

$('#link-link').keyup(() => {
    if ($('#link-link').length > 0) {
        $('#add-link').removeAttr('disabled');
    }
    else {
        $('#add-link').addAttr('disabled');
    }

    var text = $('#link-link').val();
    text = text.substring(7, text.length);
    $('#link-text').val(text);
});
$('#add-link').click(() => {
    var a = document.createElement('a');
    a.href = $('#link-link').val();
    a.innerText = $('#link-text').val();

    console.log(a);

    // wstawić link w miejsce, w którym ostatnio był kursor
});


// foto
$('#image-button').click(() => {
    $('#insert-image').show();
    $('#insert-image').css('background', 'rgba(0,0,0,0.4)');
});
$('#close-insert-image').click(() => {
    $('#insert-image').hide();
});

$('#image-url').keyup(() => {
    if ($('#image-url').length > 0) {
        $('#add-image').removeAttr('disabled');
    }
    else {
        $('#add-image').addAttr('disabled');
    }
});
$('#add-image').click(() => {
    var image = document.createElement('img');
    var blob = $('#blob'); 

     if(blob.files[0] != 0) {
        var file = blob.files[0];

        var fr = new FileReader();
        // odczytać obrazek, przekonwertować do base64 i wyświetlić
     }
});


// video
$('#video-button').click(() => {
    $('#insert-video').show();
    $('#insert-video').css('background', 'rgba(0,0,0,0.4)');
});
$('#close-insert-video').click(() => {
    $('#insert-video').hide();
});




// działania matematyczne
$('#insert-math').click(() => {

});

// pełny ekran
$('#full-screen').click(() => {
    
});

// pokaż kod html
$('#show-html').click(() => {
    
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

