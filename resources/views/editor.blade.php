@extends('adminLTE.dashboard')

@section('content')
<link rel="stylesheet" href={{ asset('plugins/fontawesome-free/css/all.min.css') }}>
<link rel="stylesheet" href={{ asset('plugins/mathquill-0.10.1/mathquill.css') }}>
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

</style>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <input type="text" class="form-control" placeholder="Nowy arkusz zadań">
                    </h3>
                    <div style="float:right; color:#757575; margin-top:auto;" class="mt-1">
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
                            <div class="note-btn-group btn-group note-font">
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
                            <div class="note-btn-group btn-group note-fontname">
                                <div class="note-btn-group btn-group">
                                    <button type="button" class="btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" aria-label="Font Family" data-original-title="Font Family" aria-expanded="false">
                                        <span class="note-current-fontname" style="font-family: 'Source Sans Pro';">Source Sans Pro</span>
                                    </button>
                                    <div class="note-dropdown-menu dropdown-menu note-check dropdown-fontname" role="list" aria-label="Font Family" style="">
                                        <a class="dropdown-item" href="#" data-value="Arial" role="listitem" aria-label="Arial">
                                            <i class="note-icon-menu-check"></i>
                                            <span style="font-family: 'Arial'">Arial</span>
                                        </a>
                                        <a class="dropdown-item" href="#" data-value="Arial" role="listitem" aria-label="Arial">
                                            <i class="note-icon-menu-check"></i>
                                            <span style="font-family: 'Source Sans Pro'">Source Sans Pro</span>
                                        </a>
                                        <a class="dropdown-item" href="#" data-value="Arial Black" role="listitem" aria-label="Arial Black">
                                            <i class="note-icon-menu-check"></i>
                                            <span style="font-family: 'Arial Black'">Arial Black</span>
                                        </a>
                                        <a class="dropdown-item" href="#" data-value="Comic Sans MS" role="listitem" aria-label="Comic Sans MS">
                                            <i class="note-icon-menu-check"></i>
                                            <span style="font-family: 'Comic Sans MS'">Comic Sans MS</span>
                                        </a>
                                        <a class="dropdown-item" href="#" data-value="Courier New" role="listitem" aria-label="Courier New">
                                            <i class="note-icon-menu-check"></i>
                                            <span style="font-family: 'Courier New'">Courier New</span>
                                        </a>
                                        <a class="dropdown-item" href="#" data-value="Helvetica" role="listitem" aria-label="Helvetica">
                                            <i class="note-icon-menu-check"></i>
                                            <span style="font-family: 'Helvetica'">Helvetica</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="note-btn-group btn-group note-color">
                                <div class="note-btn-group btn-group note-color note-color-all">
                                    <button type="button" class="btn btn-light btn-sm p-2" tabindex="-1" >
                                        <i class="fas fa-palette"></i>
                                    </button>
                                    <button type="button" class="btn btn-light btn-sm p-2 dropdown-toggle" tabindex="-1" data-toggle="dropdown">
                                    </button>
                                    <div class="note-dropdown-menu dropdown-menu" role="list">
                                        <div class="note-palette">
                                            <div class="note-palette-title">Background Color</div>
                                            <div>
                                                <button type="button" class="note-color-reset btn btn-light btn-default" data-event="backColor" data-value="transparent">Transparent</button>
                                            </div>
                                            <div class="note-holder" data-event="backColor">
                                                <!-- back colors -->
                                                <div class="note-color-palette">
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="backColor" data-value="#FFFFFF" title="" aria-label="White" data-toggle="button" tabindex="-1" data-original-title="White"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn" style="background-color:#FF00FF" data-event="backColor" data-value="#FF00FF" title="" aria-label="Magenta" data-toggle="button" tabindex="-1" data-original-title="Magenta"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn" style="background-color:#E7D6DE" data-event="backColor" data-value="#E7D6DE" title="" aria-label="Twilight" data-toggle="button" tabindex="-1" data-original-title="Twilight"></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-children-count="1">
                                                <button type="button" class="note-color-select btn btn-light btn-default" data-event="openPalette" data-value="backColorPicker">Select</button>
                                                <input type="color" id="backColorPicker" class="note-btn note-color-select-btn" value="#FFFF00" data-event="backColorPalette">
                                            </div>
                                            <div class="note-holder-custom" id="backColorPalette" data-event="backColor">
                                                <div class="note-color-palette">
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="backColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button" tabindex="-1" data-original-title="#FFFFFF"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="note-palette">
                                            <div class="note-palette-title">Text Color</div>
                                            <div>
                                                <button type="button" class="note-color-reset btn btn-light btn-default" data-event="removeFormat" data-value="foreColor">Reset to default</button>
                                            </div>
                                            <div class="note-holder" data-event="foreColor">
                                                <!-- fore colors -->
                                                <div class="note-color-palette">
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn" style="background-color:#000000" data-event="foreColor" data-value="#000000" title="" aria-label="Black" data-toggle="button" tabindex="-1" data-original-title="Black"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn" style="background-color:#FF0000" data-event="foreColor" data-value="#FF0000" title="" aria-label="Red" data-toggle="button" tabindex="-1" data-original-title="Red"></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-children-count="1">
                                                <button type="button" class="note-color-select btn btn-light btn-default" data-event="openPalette" data-value="foreColorPicker">Select</button>
                                                <input type="color" id="foreColorPicker" class="note-btn note-color-select-btn" value="#000000" data-event="foreColorPalette">
                                            </div>
                                            <div class="note-holder-custom" id="foreColorPalette" data-event="foreColor">
                                                <div class="note-color-palette">
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="foreColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button" tabindex="-1" data-original-title="#FFFFFF"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="note-btn-group btn-group note-para">
                                <button id="un-list" type="button" class="btn btn-light btn-sm" tabindex="-1" data-toggle="tooltip" title="Lista">
                                    <i class="fas fa-list-ul"></i>
                                </button>
                                <button id="ol-list" type="button" class="btn btn-light btn-sm" tabindex="-1" data-toggle="tooltip" title="Lista porządkowana">
                                    <i class="fas fa-list-ol"></i>
                                </button>
                                <div class="note-btn-group btn-group">
                                    <button type="button" class="btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" data-toggle="tooltip" title="Wyrównywanie tekstu">
                                        <i class="fas fa-align-left"></i>
                                    </button>
                                    <div class="dropdown-menu" role="list">
                                        <div class="btn-group note-align">
                                            <button type="button" class="btn btn-light btn-sm" tabindex="-1" title="" aria-label="Align left (CTRL+SHIFT+L)" data-original-title="Align left (CTRL+SHIFT+L)">
                                                <i class="fas fa-align-left"></i>
                                            </button>
                                            <button type="button" class="btn btn-light btn-sm" tabindex="-1" title="" aria-label="Align center (CTRL+SHIFT+E)" data-original-title="Align center (CTRL+SHIFT+E)">
                                                <i class="fas fa-align-center"></i>
                                            </button>
                                            <button type="button" class=" btn btn-light btn-sm" tabindex="-1" title="" aria-label="Align right (CTRL+SHIFT+R)" data-original-title="Align right (CTRL+SHIFT+R)">
                                                <i class="fas fa-align-right"></i>
                                            </button>
                                            <button type="button" class="btn btn-light btn-sm" tabindex="-1" title="" aria-label="Justify full (CTRL+SHIFT+J)" data-original-title="Justify full (CTRL+SHIFT+J)">
                                                <i class="fas fa-align-justify"></i>
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
                                <button id="video-button" type="button" class="note-btn btn btn-light btn-sm p-2" tabindex="-1" data-toggle="tooltip" title="Film">
                                    <i class="fas fa-video"></i>
                                </button>
                                <button id="insert-math" type="button" class="note-btn btn btn-light btn-sm p-2" tabindex="-1" data-toggle="tooltip" title="Działanie matematyczne">
                                    <i class="fas fa-square-root-alt"></i>
                                </button>
                                <button id="insert-task" type="button" class="note-btn btn btn-light btn-sm p-2" tabindex="-1" data-toggle="tooltip" title="Wstaw zadanie">
                                    <i class="fas fa-flask"></i>
                                </button>
                            </div>
                            <div class="note-btn-group btn-group note-view">
                                <button id="full-screen" type="button" class="note-btn btn btn-light btn-sm p-2 btn-fullscreen note-codeview-keep" tabindex="-1" title="" aria-label="Full Screen" data-original-title="Full Screen">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button id="show-html" type="button" class="note-btn btn btn-light btn-sm p-2 btn-codeview note-codeview-keep" tabindex="-1" title="" aria-label="Code View" data-original-title="Code View">
                                    <i class="fas fa-code"></i>
                                </button>
                                <button id="help-button" type="button" class="btn btn-light btn-sm p-2" tabindex="-1" data-toggle="tooltip" data-placement="top" title="Pomoc">
                                    <i class="fas fa-question"></i>
                                </button>
                            </div>
                        </div>
                        <div class="note-editing-area" data-children-count="1">
                            <div class="note-handle">
                                <div class="note-control-selection" data-children-count="0" style="display: none;">
                                    <div class="note-control-selection-bg"></div>
                                    <div class="note-control-holder note-control-nw"></div>
                                    <div class="note-control-holder note-control-ne"></div>
                                    <div class="note-control-holder note-control-sw"></div>
                                    <div class="note-control-sizing note-control-se"></div>
                                    <div class="note-control-selection-info"></div>
                                </div>
                            </div>

                            <!-- Zawartość utworzona przez użytkownika -->
                            <div id="editor-content" class="note-editable card-block" contenteditable="true" aria-multiline="true" spellcheck="true" autocorrect="true">
                                <p>
                                    <br>
                                </p>
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
                                    <div class="modal-body" id="search-task">
                                        <div class="form-group">
                                            <label for="task-title">Tytuł zadania</label>
                                            <input type="text" class="form-control" id="task-title" placeholder="Tytuł">
                                        </div>
                                        <div class="form-group">
                                            <label for="key-words">Słowa kluczowe</label>
                                            <input type="input" class="form-control" id="key-words" placeholder="Tagi">
                                            <small id="key-words-help" class="form-text text-muted">Tagi oddzielone przecinkiem lub spacją</small>
                                        </div>
                                        <div class="note-btn-group btn-group " >
                                            <a type="button" id="task-category" class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" data-original-title="Style" aria-expanded="false">
                                                Matematyka
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
                                        <ul class="list-group" style="margin:0 auto; max-height:300px;" id="tasks-list">

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
                                            <label for="note-dialog-link-txt-16063198779941" class="note-form-label">Text to display</label>
                                            <input id="link-text" class="note-link-text form-control note-form-control note-input" type="text">
                                        </div>
                                        <div class="form-group note-form-group" data-children-count="1">
                                            <label for="note-dialog-link-url-16063198779941" class="note-form-label">To what URL should this link go?</label>
                                            <input id="link-link" class="note-link-url form-control note-form-control note-input" type="text" value="http://">
                                        </div>
                                        <div class="form-check sn-checkbox-open-in-new-window">
                                            <label class="form-check-label" data-children-count="1">
                                                <input type="checkbox" class="form-check-input" checked="" aria-label="Open in new window" aria-checked="true"> Open in new window
                                            </label>
                                        </div>
                                        <div class="form-check sn-checkbox-use-protocol">
                                            <label class="form-check-label" data-children-count="1">
                                                <input type="checkbox" class="form-check-input" checked="" aria-label="Use default protocol" aria-checked="true"> Use default protocol
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input id="add-link" type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-link-btn" value="Insert Link" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="note-popover popover in note-link-popover bottom" style="display: none;">
                            <div class="arrow"></div>
                            <div class="popover-content note-children-container">
                                <span>
                                    <a target="_blank"></a>&nbsp;
                                </span>
                                <div class="note-btn-group btn-group note-link">
                                    <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Edit" data-original-title="Edit">
                                        <i class="note-icon-link"></i>
                                    </button>
                                    <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Unlink" data-original-title="Unlink">
                                        <i class="note-icon-chain-broken"></i>
                                    </button>
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
                                            <label for="blob" class="note-form-label">Select from files</label>
                                            <input id="blob" class="note-image-input form-control-file note-form-control note-input" type="file" name="files" accept="image/*" multiple="multiple">
                                        </div>
                                        <div class="form-group note-group-image-url" data-children-count="1">
                                            <label for="image-url" class="note-form-label">Image URL</label>
                                            <input id="image-url" class="note-image-url form-control note-form-control note-input" type="text">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input id="add-image" type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-image-btn" value="Insert Image" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="note-popover popover in note-image-popover bottom" style="display: none;">
                            <div class="arrow"></div>
                            <div class="popover-content note-children-container">
                                <div class="note-btn-group btn-group note-resize">
                                    <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Resize full" data-original-title="Resize full">
                                        <span class="note-fontsize-10">100%</span>
                                    </button>
                                    <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Resize half" data-original-title="Resize half">
                                        <span class="note-fontsize-10">50%</span>
                                    </button>
                                    <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Resize quarter" data-original-title="Resize quarter">
                                        <span class="note-fontsize-10">25%</span>
                                    </button>
                                    <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Original size" data-original-title="Original size">
                                        <i class="note-icon-rollback"></i>
                                    </button>
                                </div>
                                <div class="note-btn-group btn-group note-float">
                                    <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Float Left" data-original-title="Float Left">
                                        <i class="note-icon-float-left"></i>
                                    </button>
                                    <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Float Right" data-original-title="Float Right">
                                        <i class="note-icon-float-right"></i>
                                    </button>
                                    <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Remove float" data-original-title="Remove float">
                                        <i class="note-icon-rollback"></i>
                                    </button>
                                </div>
                                <div class="note-btn-group btn-group note-remove">
                                    <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Remove Image" data-original-title="Remove Image">
                                        <i class="note-icon-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="note-popover popover in note-table-popover bottom" style="display: none;">
                            <div class="arrow">
                            </div>
                            <div class="popover-content note-children-container">
                                <div class="note-btn-group btn-group note-add">
                                    <button type="button" class="note-btn btn btn-light btn-sm btn-md" tabindex="-1" title="" aria-label="Add row below" data-original-title="Add row below">
                                        <i class="note-icon-row-below"></i>
                                    </button>
                                    <button type="button" class="note-btn btn btn-light btn-sm btn-md" tabindex="-1" title="" aria-label="Add row above" data-original-title="Add row above">
                                        <i class="note-icon-row-above"></i>
                                    </button>
                                    <button type="button" class="note-btn btn btn-light btn-sm btn-md" tabindex="-1" title="" aria-label="Add column left" data-original-title="Add column left">
                                        <i class="note-icon-col-before"></i>
                                    </button>
                                    <button type="button" class="note-btn btn btn-light btn-sm btn-md" tabindex="-1" title="" aria-label="Add column right" data-original-title="Add column right">
                                        <i class="note-icon-col-after"></i>
                                    </button>
                                </div>
                                <div class="note-btn-group btn-group note-delete">
                                    <button type="button" class="note-btn btn btn-light btn-sm btn-md" tabindex="-1" title="" aria-label="Delete row" data-original-title="Delete row">
                                        <i class="note-icon-row-remove"></i>
                                    </button>
                                    <button type="button" class="note-btn btn btn-light btn-sm btn-md" tabindex="-1" title="" aria-label="Delete column" data-original-title="Delete column">
                                        <i class="note-icon-col-remove"></i>
                                    </button>
                                    <button type="button" class="note-btn btn btn-light btn-sm btn-md" tabindex="-1" title="" aria-label="Delete table" data-original-title="Delete table">
                                        <i class="note-icon-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Insert video modal box -->
                        <div id="insert-video" class="modal note-modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Insert Video">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Wstaw Film</h4>
                                        <button id="close-insert-video" type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group note-form-group row-fluid" data-children-count="1">
                                            <label for="note-dialog-video-url-16063198779941" class="note-form-label">
                                                Url filmu
                                                <small class="text-muted" data-children-count="0">(YouTube, Vimeo, Vine, Instagram, DailyMotion or Youku)</small>
                                            </label>
                                            <input id="note-dialog-video-url-16063198779941" class="note-video-url form-control note-form-control note-input" type="text">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-video-btn" value="Insert Video" disabled="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Help modal box -->
                        <div id="help-modal" class="modal note-modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Help">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Pomoc</h4>
                                        <button id="close-help-modal" type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body" style="max-height: 300px; overflow: auto;">
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>ESC</kbd>
                                        </label>
                                        <span>Escape</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>ENTER</kbd>
                                        </label>
                                        <span>Insert Paragraph</span>
                                        <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+Z</kbd>
                                        </label>
                                        <span>Undo the last command</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+Y</kbd>
                                        </label>
                                        <span>Redo the last command</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>TAB</kbd>
                                        </label>
                                        <span>Tab</span>
                                        <div class="help-list-item">
                                        </div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>SHIFT+TAB</kbd>
                                        </label>
                                        <span>Untab</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+B</kbd>
                                        </label>
                                        <span>Set a bold style</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+I</kbd>
                                        </label>
                                        <span>Set a italic style</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+U</kbd>
                                        </label>
                                        <span>Set a underline style</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+SHIFT+S</kbd>
                                        </label>
                                        <span>Set a strikethrough style</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+BACKSLASH</kbd>
                                        </label>
                                        <span>Clean a style</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+SHIFT+L</kbd>
                                        </label>
                                        <span>Set left align</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+SHIFT+E</kbd>
                                        </label>
                                        <span>Set center align</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+SHIFT+R</kbd>
                                        </label>
                                        <span>Set right align</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+SHIFT+J</kbd>
                                        </label>
                                        <span>Set full align</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+SHIFT+NUM7</kbd>
                                        </label>
                                        <span>Toggle unordered list</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+SHIFT+NUM8</kbd>
                                        </label>
                                        <span>Toggle ordered list</span>
                                        <div class="help-list-item">
                                        </div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+LEFTBRACKET</kbd>
                                        </label>
                                        <span>Outdent on current paragraph</span>
                                        <div class="help-list-item">
                                        </div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+RIGHTBRACKET</kbd>
                                        </label>
                                        <span>Indent on current paragraph</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+NUM0</kbd>
                                        </label>
                                        <span>Change current block's format as a paragraph(P tag)</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+NUM1</kbd>
                                        </label>
                                        <span>Change current block's format as H1</span>
                                        <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+NUM2</kbd>
                                        </label>
                                        <span>Change current block's format as H2</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+NUM3</kbd>
                                        </label>
                                        <span>Change current block's format as H3</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+NUM4</kbd>
                                        </label>
                                        <span>Change current block's format as H4</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+NUM5</kbd>
                                        </label>
                                        <span>Change current block's format as H5</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+NUM6</kbd>
                                        </label>
                                        <span>Change current block's format as H6</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+ENTER</kbd>
                                        </label>
                                        <span>Insert horizontal rule</span>
                                        <div class="help-list-item"></div>
                                        <label style="width: 180px; margin-right: 10px;">
                                            <kbd>CTRL+K</kbd>
                                        </label>
                                        <span>Show Link Dialog</span>
                                    </div>
                                    <div class="modal-footer" style="text-align:center">
                                        <p class="text-center">
                                            Skróty klawiszowe
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit modal box -->
                        <div id="option-submit" class="modal note-modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Submit">
                            <div class="modal-dialog mt-5">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Podsumowanie</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Cofnij, aby kontytuować pisanie, zobacz jak będzie wyglądał twój dokument PDF generując go lub zapisz swój arkusz zadań
                                        </p>
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
                        <div id="pdf-modal" class="modal note-modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Preview">
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
                                            
            <div class="alert alert-light mt-5">
                <h4>Ostatnio zapisane arkusze</h4>
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div  style="display:inline-block; width:33%;">
                            <div class="card">
                                <div class="card-header">
                                  Featured
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div  style="display:inline-block; width:33%;">
                            <div class="card">
                                <div class="card-header">
                                  Featured
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div style="display:inline-block; width:33%;">
                            <div class="card">
                                <div class="card-header">
                                  Featured
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div  style="display:inline-block; width:33%;">
                            <div class="card">
                                <div class="card-header">
                                  Featured
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div  style="display:inline-block; width:33%;">
                            <div class="card">
                                <div class="card-header">
                                  Featured
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div style="display:inline-block; width:33%;">
                            <div class="card">
                                <div class="card-header">
                                  Featured
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
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
        </div>

        <!-- /.col-->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src={{ asset('plugins/mathquill-0.10.1/mathquill.js') }}></script>
    <script src={{ asset('js/editor.js') }}></script>
    @endsection