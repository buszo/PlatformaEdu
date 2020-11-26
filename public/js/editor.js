    // foto
    $('#image-button').click(() => {
        $('#insert-image').show();
    });

    $('#close-insert-image').click(() => {
        $('#insert-image').hide();
    });

    // video
    $('#video-button').click(() => {
        $('#insert-video').show();
    });

    $('#close-insert-video').click(() => {
        $('#insert-video').hide();
    });

    // link
    $('#link-button').click(() => {
        $('#insert-link').show();
    });

    $('#close-insert-link').click(() => {
        $('#insert-link').hide();
    });


    // podsumowanie
    $('#reject-sheet').click(() => {
        $('#option-submit').hide();
    });

    $('#submit').click(() => {
        $('#option-submit').show();
    });


    // generowanie pdf
    var htmlSheet = $('#editor-content').innerHTML;