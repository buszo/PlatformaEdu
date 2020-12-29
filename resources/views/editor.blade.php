@extends('adminLTE.dashboard')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href={{ asset('plugins/fontawesome-free/css/all.min.css') }}>
<link rel="stylesheet" href={{ asset('plugins/mathquill-0.10.1/mathquill.css') }}>
<link rel="stylesheet" href={{ asset('css/scrollbar.css') }}>
<style>
    #editor-content p, code, blockquote, h1, h2, h3, h4, h5, h6 {
        margin-bottom: 3px;
    }

    #editor-content {
        min-height: 250px; height:350px; overflow:auto;
    }

    #editor-content:focus {
        outline:none;
    }

    .drag {
        width: 22px;
        height: 2px;
        background-color: #C0C0C0;
        margin: 1px auto;
    }

    .resize-bar {
        background:#eee;
        height:10px;
        cursor:grab;
    }

    .resize-bar:active {
        cursor: grabbing;
    }

    .count-label {
        background: #eee;
        font-size: 0.7em;
        padding: 0.5em 0.7em;
        border-radius: 5px;
    }

    #carouselExampleControls div div div:hover {
        background: #eee;
        cursor:pointer;
    }

    .card-text {
            height:50px;
            overflow: auto;
    }

</style>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h3 class="card-title">
                        <input id="title" type="text" class="form-control" placeholder="Nowy arkusz zadań">
                    </h3>
                    <div style="float:right; color:#757575;" class="mt-1">
                        <a id="submit" class="mr-2" role="button" style="cursor:pointer;">
                            <i class="fas fa-save"></i>
                        </a>
                        <a data-toggle="collapse" href="#collapseExample" style="color:#757575" role="button" aria-expanded="false" aria-controls="collapseExample" >
                            <i class="fas fa-window-minimize"></i>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div id="collapseExample" class="card-body pb-0 collapse show" data-children-count="14" >
                    <div class="card">
                        <div class="note-dropzone">
                            <div class="note-dropzone-message"></div>
                        </div>
                        <div class="note-toolbar card-header" role="toolbar">
                            <div class="note-btn-group btn-group note-style">
                                <div class="note-btn-group btn-group">
                                    <a type="button" class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown">
                                        <i class="fas fa-heading"></i>
                                    </a>
                                    <div class="note-dropdown-menu dropdown-menu dropdown-style" role="list" aria-label="Style" style="">
                                        <a id="style-p" class="dropdown-item" href="#" data-value="p" role="listitem" aria-label="p">
                                            <p>Normal</p>
                                        </a>
                                        <a id="style-quote" class="dropdown-item" href="#" data-value="blockquote" role="listitem" aria-label="blockquote">
                                            <blockquote class="blockquote">Blockquote</blockquote>
                                        </a>
                                        <a id="style-code" class="dropdown-item" href="#" data-value="pre" role="listitem" aria-label="pre">
                                            <pre>Code</pre>
                                        </a>
                                        <a id="style-h1" class="dropdown-item" href="#" data-value="h1" role="listitem" aria-label="h1">
                                            <h1>Header 1</h1>
                                        </a>
                                        <a id="style-h2" class="dropdown-item" href="#" data-value="h2" role="listitem" aria-label="h2">
                                            <h2>Header 2</h2>
                                        </a>
                                        <a id="style-h3" class="dropdown-item" href="#" data-value="h3" role="listitem" aria-label="h3">
                                            <h3>Header 3</h3>
                                        </a>
                                        <a id="style-h4" class="dropdown-item" href="#" data-value="h4" role="listitem" aria-label="h4">
                                            <h4>Header 4</h4>
                                        </a>
                                        <a id="style-h5" class="dropdown-item" href="#" data-value="h5" role="listitem" aria-label="h5">
                                            <h5>Header 5</h5>
                                        </a>
                                        <a id="style-h6" class="dropdown-item" href="#" data-value="h6" role="listitem" aria-label="h6">
                                            <h6>Header 6</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-group">
                                <button id="bold" type="button" class="note-btn btn btn-light btn-sm p-2" tabindex="-1" data-toggle="tooltip" title="Pogrubienie">
                                    <i class="fas fa-bold"></i>
                                </button>
                                <button id="italic" type="button" class="note-btn btn btn-light btn-sm p-2" tabindex="-1" data-toggle="tooltip" title="Kursywa">
                                    <i class="fas fa-italic"></i>
                                </button>
                                <button id="underline" type="button" class="note-btn btn btn-light btn-sm p-2" tabindex="-1" data-toggle="tooltip" title="Podkreślenie">
                                    <i class="fas fa-underline"></i>
                                </button>

                                <button id="style-reset" type="button" class="note-btn btn btn-light btn-sm p-2" tabindex="-1" data-toggle="tooltip" title="Styl domyślny">
                                    <i class="fas fa-eraser"></i>
                                </button>
                            </div>
                            <div class=" btn-group">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" aria-label="Font Family" data-original-title="Font Family" aria-expanded="false">
                                        <span class="note-current-fontname" style="font-family: 'Source Sans Pro';">Source Sans Pro</span>
                                    </button>
                                    <div class="note-dropdown-menu dropdown-menu note-check dropdown-fontname" role="list" aria-label="Font Family">
                                    <a id="sans-pro" class="dropdown-item" href="#" data-value="Arial" role="listitem" aria-label="Arial">
                                            <i class="note-icon-menu-check"></i>
                                            <span style="font-family: 'Source Sans Pro';">Source Sans Pro</span>
                                        </a>
                                        <a id="arial" class="dropdown-item" href="#" data-value="Arial" role="listitem" aria-label="Arial">
                                            <i class="note-icon-menu-check"></i>
                                            <span style="font-family: 'Arial'">Arial</span>
                                        </a>
                                        <a id="arial-black" class="dropdown-item" href="#" data-value="Arial Black" role="listitem" aria-label="Arial Black">
                                            <i class="note-icon-menu-check"></i>
                                            <span style="font-family: 'Arial Black'">Arial Black</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-group">
                                <div class=" btn-group">
                                    <button type="button" class="btn btn-light btn-sm p-2" tabindex="-1" >
                                        <i class="fas fa-palette"></i>
                                    </button>
                                    <button type="button" class="btn btn-light btn-sm p-2 dropdown-toggle" tabindex="-1" data-toggle="dropdown">
                                    </button>
                                    <div class="note-dropdown-menu dropdown-menu pr-2 pl-2" role="list">
                                        <div class="mt-2">
                                            <div ">Background Color</div>

                                            <div data-children-count="1">
                                                <button id="button-back" type="button" class="note-color-select btn btn-light btn-default" data-event="openPalette" data-value="backColorPicker">Select</button>
                                                <input id="background" type="color" id="backColorPicker" class="note-btn note-color-select-btn" value="#FFFFFF" data-event="backColorPalette">
                                            </div>

                                        </div>
                                        <div class="mt-2">
                                            <div>Text Color</div>

                                            <div data-children-count="1">
                                                <button id="button-fore" type="button" class="note-color-select btn btn-light btn-default" data-event="openPalette" data-value="foreColorPicker">Select</button>
                                                <input id="foreground" type="color" id="foreColorPicker" class="note-btn note-color-select-btn" value="#000000" data-event="foreColorPalette">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="note-btn-group btn-group note-para">
                                <div class="note-btn-group btn-group">
                                    <button type="button" class="btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" data-toggle="tooltip" title="Wyrównywanie tekstu">
                                        <i class="fas fa-align-left"></i>
                                    </button>
                                    <div class="dropdown-menu" role="list">
                                        <div class="btn-group note-align">
                                            <button id="left" type="button" class="btn btn-light btn-sm" tabindex="-1" title="" aria-label="Align left (CTRL+SHIFT+L)" data-original-title="Align left (CTRL+SHIFT+L)">
                                                <i class="fas fa-align-left"></i>
                                            </button>
                                            <button id="center" type="button" class="btn btn-light btn-sm" tabindex="-1" title="" aria-label="Align center (CTRL+SHIFT+E)" data-original-title="Align center (CTRL+SHIFT+E)">
                                                <i class="fas fa-align-center"></i>
                                            </button>
                                            <button id="right" type="button" class=" btn btn-light btn-sm" tabindex="-1" title="" aria-label="Align right (CTRL+SHIFT+R)" data-original-title="Align right (CTRL+SHIFT+R)">
                                                <i class="fas fa-align-right"></i>
                                            </button>
                                        </div>
                                        <div class="note-btn-group btn-group note-list">
                                            <button type="button" class="btn btn-light btn-sm" tabindex="-1" title="" aria-label="Outdent (CTRL+[)" data-original-title="Outdent (CTRL+[)">
                                                <i class="note-icon-align-outdent"></i>
                                            </button><button type="button" class="btn btn-light btn-sm" tabindex="-1" title="" aria-label="Indent (CTRL+])" data-original-title="Indent (CTRL+])">
                                                <i class="note-icon-align-indent"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" data-toggle="tooltip" title="Wstaw tabelę">
                                    <i class="fas fa-table"></i>
                                </button>
                                <div class="note-dropdown-menu dropdown-menu note-table p-3" role="list" aria-label="Table">
                                    <label>Rozmiar tabeli</label>
                                    <div class="row ml-1">
                                        <input id="table-rows" type="text" class="col-4 mr-2">x
                                        <input id="table-cols" class="col-4 ml-2" type="text">
                                    </div>
                                    <div class="row">
                                        <div id="add-table" class="btn btn-light btn-sm mt-2 ml-2">Wstaw</div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-group">
                                <button id="link-button" type="button" class="note-btn btn btn-light btn-sm p-2" tabindex="-1" data-toggle="tooltip" title="Link">
                                    <i class="fas fa-link"></i>
                                </button>
                                <button id="image-button" type="button" class="note-btn btn btn-light btn-sm p-2" tabindex="-1" data-toggle="tooltip" title="Zdjęcie">
                                    <i class="fas fa-image"></i>
                                </button>

                                <button id="insert-math" type="button" class="note-btn btn btn-light btn-sm p-2" tabindex="-1" data-toggle="tooltip" title="Działanie matematyczne">
                                    <i class="fas fa-square-root-alt"></i>
                                </button>
                                <button id="insert-task" type="button" class="note-btn btn btn-light btn-sm p-2" tabindex="-1" data-toggle="tooltip" title="Wstaw zadanie">
                                    <i class="fas fa-flask"></i>
                                </button>
                            </div>
                            <div class="note-btn-group btn-group note-view">
                                <button id="help-button" type="button" class="btn btn-light btn-sm p-2" tabindex="-1" data-toggle="tooltip" data-placement="top" title="Pomoc">
                                    <i class="fas fa-question"></i>
                                </button>
                            </div>
                        </div>
                        <div class="note-editing-area" data-children-count="1">

                            @foreach($sheet ?? [] as $item)
                                <input id="hidden-id" type="text" hidden value="{{ $item->id }}">
                            @endforeach
                            <!-- Zawartość utworzona przez użytkownika -->
                            <div id="editor-content" class="note-editable card-block" contenteditable="true" aria-multiline="true" spellcheck="true" autocorrect="true">
                                <p>
                                    <br>
                                </p>
                                @foreach($sheet ?? [] as $item)
                                    {!! $item->content !!}
                                @endforeach
                            </div>
                        </div>

                        <!-- resizer -->
                        <output class="note-status-output"  role="status" aria-live="polite"></output>
                        <div id="resize-bar" class="resize-bar" role="status">
                            <div class="note-resizebar" aria-label="Resize">
                                <div class="drag"></div>
                                <div class="drag"></div>
                                <div class="drag"></div>
                            </div>
                        </div>

                        <!-- Add task modal -->
                        <div id="task-modal" class="modal note-modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Task">
                            <div class="modal-dialog mt-5">
                                <div class="modal-content" style="width:610px; height:auto;">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Lista zadań</h4>
                                        <button id="close-task-modal" type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="note-btn-group btn-group " >
                                            <a type="button" id="task-category" class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" data-original-title="Style" aria-expanded="false">
                                                {{ $categories->first()->name  ?? 'Nie znaleziono żadnej kategorii'}}
                                            </a>
                                            <div id="categories-list" class="note-dropdown-menu dropdown-menu dropdown-style" role="list">
                                                @foreach($categories ?? [] as $item)
                                                <a class="dropdown-item" href="#">
                                                    <p>{{$item->name}}</p>
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div style="display:inline-block;">
                                                <button id="tasks-submit" type="button" class="btn btn-primary pr-4 pl-4">Szukaj</button>
                                            </div>
                                            <div class="form-group" id="hidden-search" style="display:inline-block; float: right; display:none;">
                                                <input type="input" class="form-control" id="search-task" placeholder="Przeszukaj wyniki">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <ul class="list-group" style="width:100%; max-height:500px; overflow:auto;" id="tasks-list">

                                        </ul>
                                    </div>
                                    <div class="modal-footer arrow-down" style="display:none;" id="more-tasks">
                                            <i style="margin:0 auto;" class="fas fa-chevron-circle-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Insert link modal button -->
                        <div id="insert-link" class="modal note-modal link-dialog" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Insert Link">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Wstaw link</h4>
                                        <button id="close-insert-link" type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group note-form-group" data-children-count="1">
                                            <label for="note-dialog-link-txt-16063198779941" class="note-form-label">Tekst do wyświetlenia</label>
                                            <input id="link-text" class="note-link-text form-control note-form-control note-input" type="text">
                                        </div>
                                        <div class="form-group note-form-group" data-children-count="1">
                                            <label for="note-dialog-link-url-16063198779941" class="note-form-label">Gdzie URL powinien przenosić</label>
                                            <input id="link-link" class="note-link-url form-control note-form-control note-input" type="text" value="http://">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input id="add-link" type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-link-btn" value="Insert Link" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Insert image modal box -->
                        <div id="insert-image" class="modal note-modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Insert Image">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Wstaw obraz</h4>
                                        <button id="close-insert-image" type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group note-form-group note-group-select-from-files">
                                            <input id="blob" class="note-image-input form-control-file note-form-control note-input" type="file" name="files" accept="image/*" multiple="multiple">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Help modal box -->
                        <div id="help-modal" class="modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Help">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Pomoc</h4>
                                        <button id="close-help-modal" type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body" style="max-height: 300px; overflow: auto;">
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>POMOCY</kbd>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit modal box -->
                        <div id="option-submit" class="modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Submit">
                            <div class="modal-dialog mt-5">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Podsumowanie</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Cofnij, aby kontytuować pisanie, zobacz jak będzie wyglądał twój dokument PDF generując go lub zapisz swój arkusz zadań
                                        </p>
                                        <textarea id="desc" type="text" class="form-control" placeholder="Opis"></textarea>
                                    </div>
                                    <div class="modal-footer row">
                                        <button id="reject-sheet" type="button" href="#" class="btn btn-secondary col" data-toggle="tooltip" title="Cofnij">
                                            Wstecz
                                        </button>
                                        <button id="pdf-export" type="button" class="note-btn btn btn-secondary col" style="font-size:24px;" data-toggle="tooltip" title="Generuj PDF">
                                            <i class="fas fa-file-pdf"></i>
                                        </button>
                                        <button id="save-sheet" type="button" href="#" class="btn btn-secondary col" data-toggle="tooltip" title="Zapisz">
                                            Zapisz
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Preview modal box -->
                        <div id="pdf-modal" class="modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Preview">
                            <div class="modal-dialog mt-5">
                                <div class="modal-content" style="width:610px; height:900px;">
                                <div class="modal-header">
                                        <h4 class="modal-title">Podgląd</h4>
                                        <button id="close-preview-modal" type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body" id="pdf-preview">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="count-label mb-3 mr-4" style="margin-left:auto;">Liczba słów: <p style="display:inline">0</p></span>
            </div>
            @if(count($sheets) > 0)
                <div class="alert alert-light mt-5">
                    <h4>Ostatnio zapisane arkusze</h4>
                </div>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        @foreach($sheets ?? [] as $item)
                            <div  style="display:inline-block; width:33%;">
                                <a href="/show/{{ $item->id }}">
                                <div class="card" style="height:210px;">
                                    <div class="card-header">
                                    {{ $item->title }}
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->updated_at }}</h5>
                                        <p class="card-text">{{ $item->desc }}</p>
                                        <button class="btn btn-secondary">Podgląd</button >
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="color:#757575">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="font-size:30px;">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="color:#757575">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="font-size:30px;">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            @else
                <div class="alert alert-light mt-5">
                    <h4>Brak ostatnio zapisanych arkuszy</h4>
                </div>
            @endif
        </div>

        <!-- /.col-->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src={{ asset('plugins/mathquill-0.10.1/mathquill.js') }}></script>
    <script src={{ asset('js/editor.js') }}></script>
    @endsection
