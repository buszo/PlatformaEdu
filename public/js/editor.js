var e         = $('#editor-content').first(); // element i pozycja y kursora
var x         = undefined;                    // pozycja x kursora
var bold      = false;
var italic    = false;
var underline = false;
var MQ        = MathQuill.getInterface(2);    // zmienna do działań matematycznych
var numWord   = 0;

$(function() {
    $('#editor-content').focus();
});


// licznik słów
function countWords(element) {
    if (element.prop('nodeName') == 'TABLE') {
        var tds = element.find('td');
        $.each(tds, function (i, td) {
            var text = td.innerText.trim();

            if (text.length > 0) {
                var split = text.split(' ');
                numWord += split.length;
            }
        });
    }
    else {
        var text = element.text().trim();
        if (text.length > 0) {
            var split = text.split(' ');
            numWord += split.length;
        }
    }
}


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
document.getElementById('editor-content').addEventListener("input", function() {

    // zabezpieczenie przed usunięciem pierwszego elementu <p>
    if ($('#editor-content').children().length == 0) {
        var p = document.createElement('p');
        var br = document.createElement('br');
        p.append(br);
        $('#editor-content').empty();
        $('#editor-content').prepend(p);
    }

    // ustalenie współrzędnych kursora
    e = getSelectionStart();
    x = getCaretPosition(e) + 1;
    // if (e.isEqualNode('table')) {
        // TODO: jeśli element jest tabelą to inaczej odczytać pozycję kursora
    //}

    // obliczenie ilości słów
    numWord = 0;
    $('#editor-content').children().each(function () {
        countWords($(this));
    });
    $('.count-label p').text(numWord);
}, false);


// formatowanie elementu
$('#style-p').click(() => {
    document.execCommand('formatBlock', false, '<p>'); 
});
$('#style-quote').click(() => {
    document.execCommand('formatBlock', false, '<blockquote>'); 
});
$('#style-code').click(() => {
    document.execCommand('formatBlock', false, '<pre>'); 
});
$('#style-h1').click(() => {
    document.execCommand('formatBlock', false, '<h1>');
    console.log('klik h1') 
});
$('#style-h2').click(() => {
    document.execCommand('formatBlock', false, '<h2>'); 
});
$('#style-h3').click(() => {
    document.execCommand('formatBlock', false, '<h3>'); 
});
$('#style-h4').click(() => {
    document.execCommand('formatBlock', false, '<h4>'); 
});
$('#style-h5').click(() => {
    document.execCommand('formatBlock', false, '<h5>'); 
});
$('#style-h6').click(() => {
    document.execCommand('formatBlock', false, '<h6>'); 
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
        document.execCommand('formatBlock', false, '<h1>'); 
    }
    else {
        $('#underline').removeClass("active");
    }
});

// reset stylu
$('#reset-style').click(() => {
    document.execCommand('fontName', false, 'Source Sans Pro');
    document.execCommand('foreColor', false, '#000000');
    document.execCommand('backColor', false, '#ffffff');
});

// czcionka

function setFont(fontName) {
    document.execCommand('fontName', false, fontName);
}

// kolor tekstu i tła

function setColor(color) {
    document.execCommand('styleWithCSS', false, true);
    document.execCommand('foreColor', false, color);
}

// wstawianie nieuporządkowanej listy 
$('#ul-list').click(() => {
    var ul = document.createElement('ul');
    e.after(ul);
});

// wstawianie uporządkowanej listy
$('#ol-list').click(() => {
    var ol = document.createElement('ol');
    e.after(ol);
});


// wyrównanie tekstu

function alignText() {
    document.execCommand();
}

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
    // TODO: link nie jest klikalny i nie przenosi na stronę
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
        // TODO: odczytać obrazek, przekonwertować do base64 i wyświetlić
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
    span.style.border = 'solid 1px #C0C0C0';
    span.style.borderRadius = '5px';
    span.innerText = 'x=';
    var local_span = span;

    var answerMathField = MQ.MathField(local_span, {
        handlers: {
            edit: () => {
                var enteredMath = answerMathField.latex();
                checkAnswer(enteredMath);                       //  <-- tutaj wyrzuca błąd, ale nie uniemożliwia korzystania
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

// wstawianie zadania
$('#insert-task').click(() => {
    $('#task-modal').show();
});
$('#close-task-modal').click(() => {
    $('#task-modal').hide();
});


$('#close-preview-modal').click(() => {
    $('#pdf-modal').hide();

});

// generowanie pdf
$('#pdf-export').click(() => {
    var htmlSheet = $('#editor-content').html().toString();

    
    $.ajax({
        url: '/generatePdf',
        type: 'GET',
        data: {
            html : htmlSheet
        },
        success: function(data) {

            if (data) {
                $('#pdf-preview').empty();

                var object = document.createElement('embed');

                object.setAttribute('src', 'data:application/pdf;base64,' + data);
                object.setAttribute('type', 'application/pdf');
                object.setAttribute('width', '580px');
                object.setAttribute('height', '800px');

                $('#pdf-preview').append(object);
                $('#pdf-modal').show();
            }
        },
        error: function () {
            // TODO: wyświetlić info o niepowodzeniu
        }
    });
});


// resize bar
$('#resize-bar').on('mousedown', function(e){
    var $dragable = $('#editor-content'),
        startHeight = $dragable.height(),
        pY = e.pageY;
    
    $(document).on('mouseup', function(e){
        $(document).off('mouseup').off('mousemove');
    });
    $(document).on('mousemove', function(me){
        var my = (pY - me.pageY);
        
        $dragable.css({
            height: startHeight - my,
            top: my
        });
    });
});

// wyszukiwanie zadań
$('#tasks-submit').click(() => {
    getTasks();
});

$('#more-tasks').click(() => {
    getTasks();
});

// każde zadanie z listy jest przyciskiem
$('#categories-list').children().each(function () {
    $(this).click(() => {
        var name = $(this).find('p').text();
        $('#task-category').text(name);
    });
});

// pobiera listę zadań
function getTasks() {
    var title = $('task-title').val();
    var tags = $('#key-words').val();
    var category = $('#task-category').text().trim();

    $.ajax({
        url: '/getTasks',
        type: 'GET',
        data: {
            category : category,
        },
        success: function (data) {
            if (data.length > 0) {
                $('#hidden-search').show();
                $('#more-tasks').show();
                $.each(data, function (i, item) {
                    var li = document.createElement('li');
                    var a = document.createElement('a');
                    var body = document.createElement('div');
                    var h = document.createElement('h5');
                    var p = document.createElement('p');

                    a.setAttribute('href', '#');
                    li.setAttribute('class', 'list-group-item card');
                    body.setAttribute('class', 'card-body');
                    h.setAttribute('class', 'card-title');
                    p.setAttribute('class', 'card-text');

                    h.innerText = item.title;
                    p.innerText = item.description;

                    body.append(h);
                    body.append(p);
                    a.append(body);
                    li.append(a);
                    $('#tasks-list').append(li);
                });

                $('#tasks-list').children().each(function () {
                    var stuff = $(this).find('a');
                    
                    stuff.click(() => {
                        var title = stuff.find('h5').text();
                        var desc = stuff.find('p').text();

                        var h = document.createElement('h5');
                        var p = document.createElement('p');

                        h.innerText = title;
                        p.innerText = desc;
                        
                        e.after(p);
                        e.after(h);
                    });
                });
            }
            else {
                $('#tasks-list').empty();
                $('#hidden-search').hide();
                $('#more-tasks').hide();
            }
        },
        error: function () {

        }
    });

}
