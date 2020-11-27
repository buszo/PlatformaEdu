var e         = undefined;                  // element i pozycja y kursora
var x         = undefined;                  // pozycja x kursora
var bold      = false;
var italic    = false;
var underline = false;
var MQ        = MathQuill.getInterface(2);  // zmienna do działań matematycznych

// zwraca pozycję kursora w wierszu (elemencie)
function getCaretPosition(editableDiv) {
    var caretPos = 0,
      sel, range;
    if (window.getSelection) {
      sel = window.getSelection();
      if (sel.rangeCount) {
        range = sel.getRangeAt(0);
        if (range.commonAncestorContainer.parentNode == editableDiv) {
          caretPos = range.endOffset;
        }
      }
    } 
    else if (document.selection && document.selection.createRange) {
      range = document.selection.createRange();
      if (range.parentElement() == editableDiv) {
    
        var tempEl = document.createElement("span");
        editableDiv.insertBefore(tempEl, editableDiv.firstChild);
        var tempRange = range.duplicate();
        tempRange.moveToElementText(tempEl);
        tempRange.setEndPoint("EndToEnd", range);
        caretPos = tempRange.text.length;
      }
    }
    return caretPos;
  }

  // zwraca wiersz (element), w którym jest kursor
  function getSelectionStart() {
    var node = document.getSelection().anchorNode;
    return (node.nodeType == 3 ? node.parentNode : node);
 }

 // event odpala się w momencie zmiany zawartości
 // ustawia współrzędne kursora
document.getElementById('editor-content').addEventListener("input", function() {
    e = getSelectionStart();
    x = getCaretPosition(e) + 1;

    // if (e.isEqualNode('table')) {
        // jeśli element jest tabelą to inaczej odczytać pozycję kursora
    //}
}, false);


// tabela
$('#add-table').click(() => {
    var rows = $('#table-rows').val();
    var cols = $('#table-cols').val();

    var table = document.createElement('table');
    table.classList.add('table');
    table.classList.add('table-bordered');

    for (i = 0; i < rows; i++) {
        var tr = document.createElement('tr');

        for (j = 0; j < cols; j++) {
            var td = document.createElement('td');
            td.innerText = '    ';
            tr.append(td);
        }
        table.append(tr);
    }
    $('#table-rows').val('');
    $('#table-cols').val('');

    var p = document.createElement('p');
    var br = document.createElement('br');
    var local_table = table;
    console.log(p, br);
    p.append(br);
    console.log(table);
    e.after(table);
    local_table.after(p);
    
    // sformatować tabelę - teraz niewidoczna
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
    var link = document.createElement('a');
    link.href = $('#link-link').val();
    link.innerText = $('#link-text').val();

    console.log(link);
    e.after(link);
    // link nie jest klikalny i nie przenosi na stronę
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
    var p = document.createElement('p');
    var span = document.createElement('span');
    span.innerText = 'x=';
    var local_span = span;

    var answerMathField = MQ.MathField(local_span, {
        handlers: {
            edit: () => {
                var enteredMath = answerMathField.latex();
                checkAnswer(enteredMath);
            }
        }
    });

    var pempty = document.createElement('p');
    var br = document.createElement('br');
    pempty.append(br);

    e.after(span);
    local_span.after(pempty);
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

