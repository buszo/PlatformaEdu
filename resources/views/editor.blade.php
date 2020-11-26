@extends('adminLTE.dashboard')

@section('content')
<link rel="stylesheet" href={{ asset('plugins/fontawesome-free/css/all.min.css') }}>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        Nowy arkusz zadań
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" data-children-count="14">
                    <textarea id="summernote" style="display: none;">                
                      Place &lt;em&gt;some&lt;/em&gt; &lt;u&gt;text&lt;/u&gt; &lt;strong&gt;here&lt;/strong&gt;
                    </textarea>
                    <div class="note-editor note-frame card">
                        <div class="note-dropzone">
                            <div class="note-dropzone-message"></div>
                        </div>
                        <div class="note-toolbar card-header" role="toolbar">
                            <div class="note-btn-group btn-group note-style">
                                <div class="note-btn-group btn-group">
                                    <button type="button" class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" aria-label="Style" data-original-title="Style" aria-expanded="false">
                                        <i class="fas fa-heading"></i>
                                    </button>
                                    <div class="note-dropdown-menu dropdown-menu dropdown-style" role="list" aria-label="Style" style="">
                                        <a class="dropdown-item" href="#" data-value="p" role="listitem" aria-label="p">
                                            <p>Normal</p>
                                        </a>
                                        <a class="dropdown-item" href="#" data-value="blockquote" role="listitem" aria-label="blockquote">
                                            <blockquote class="blockquote">Blockquote</blockquote>
                                        </a>
                                        <a class="dropdown-item" href="#" data-value="pre" role="listitem" aria-label="pre">
                                            <pre>Code</pre>
                                        </a>
                                        <a class="dropdown-item" href="#" data-value="h1" role="listitem" aria-label="h1">
                                            <h1>Header 1</h1>
                                        </a>
                                        <a class="dropdown-item" href="#" data-value="h2" role="listitem" aria-label="h2">
                                            <h2>Header 2</h2>
                                        </a>
                                        <a class="dropdown-item" href="#" data-value="h3" role="listitem" aria-label="h3">
                                            <h3>Header 3</h3>
                                        </a>
                                        <a class="dropdown-item" href="#" data-value="h4" role="listitem" aria-label="h4">
                                            <h4>Header 4</h4>
                                        </a>
                                        <a class="dropdown-item" href="#" data-value="h5" role="listitem" aria-label="h5">
                                            <h5>Header 5</h5>
                                        </a>
                                        <a class="dropdown-item" href="#" data-value="h6" role="listitem" aria-label="h6">
                                            <h6>Header 6</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="note-btn-group btn-group note-font">
                                <button id="bold" type="button" class="note-btn btn btn-light btn-sm note-btn-bold" tabindex="-1" title="" aria-label="Bold (CTRL+B)" data-original-title="Bold (CTRL+B)">
                                    <i class="fas fa-bold"></i>
                                </button>
                                <button id="italic" type="button" class="note-btn btn btn-light btn-sm note-btn-italic" tabindex="-1" title="" aria-label="Italic (CTRL+I)" data-original-title="Italic (CTRL+I)">
                                    <i class="fas fa-italic"></i>
                                </button>
                                <button id="underline" type="button" class="note-btn btn btn-light btn-sm note-btn-underline" tabindex="-1" title="" aria-label="Underline (CTRL+U)" data-original-title="Underline (CTRL+U)">
                                    <i class="fas fa-underline"></i>
                                </button>
                                
                                <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Remove Font Style (CTRL+\)" data-original-title="Remove Font       Style (CTRL+\)">
                                    <i class="fas fa-eraser"></i>
                                </button>
                            </div>
                            <div class="note-btn-group btn-group note-fontname">
                                <div class="note-btn-group btn-group">
                                    <button type="button" class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" aria-label="Font Family" data-original-title="Font Family" aria-expanded="false">
                                        <span class="note-current-fontname" style="font-family: &quot;Source Sans Pro&quot;;">Source Sans Pro</span>
                                    </button>
                                    <div class="note-dropdown-menu dropdown-menu note-check dropdown-fontname" role="list" aria-label="Font Family" style="">
                                        <a class="dropdown-item" href="#" data-value="Arial" role="listitem" aria-label="Arial">
                                            <i class="note-icon-menu-check"></i>
                                            <span style="font-family: 'Arial'">Arial</span>
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
                                    <button type="button" class="note-btn btn btn-light btn-sm note-current-color-button" tabindex="-1" title="" aria-label="Recent Color" data-original-title="Recent Color" data-backcolor="#FFFF00" data-forecolor="#000000">
                                        <i class="fas fa-palette"></i>
                                    </button>
                                    <button type="button" class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" aria-label="More Color" data-original-title="More Color">
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
                                <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Unordered list (CTRL+SHIFT+NUM7)" data-original-title="Unordered list (CTRL+SHIFT+NUM7)">
                                    <i class="fas fa-list-ul"></i>
                                </button>
                                <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Ordered list (CTRL+SHIFT+NUM8)" data-original-title="Ordered list (CTRL+SHIFT+NUM8)">
                                    <i class="fas fa-list-ol"></i>
                                </button>
                                <div class="note-btn-group btn-group">
                                    <button type="button" class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" aria-label="Paragraph" data-original-title="Paragraph">
                                        <i class="fas fa-align-left"></i>
                                    </button>
                                    <div class="note-dropdown-menu dropdown-menu" role="list">
                                        <div class="note-btn-group btn-group note-align">
                                            <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Align left (CTRL+SHIFT+L)" data-original-title="Align left (CTRL+SHIFT+L)">
                                                <i class="fas fa-align-left"></i>
                                            </button>
                                            <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Align center (CTRL+SHIFT+E)" data-original-title="Align center (CTRL+SHIFT+E)">
                                                <i class="fas fa-align-center"></i>
                                            </button>
                                            <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Align right (CTRL+SHIFT+R)" data-original-title="Align right (CTRL+SHIFT+R)">
                                                <i class="fas fa-align-right"></i>
                                            </button>
                                            <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Justify full (CTRL+SHIFT+J)" data-original-title="Justify full (CTRL+SHIFT+J)">
                                                <i class="fas fa-align-justify"></i>
                                            </button>
                                        </div>
                                        <div class="note-btn-group btn-group note-list">
                                            <button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Outdent (CTRL+[)" data-original-title="Outdent (CTRL+[)">
                                                <i class="note-icon-align-outdent"></i>
                                            </button><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Indent (CTRL+])" data-original-title="Indent (CTRL+])">
                                                <i class="note-icon-align-indent"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="note-btn-group btn-group note-table">
                                <div class="note-btn-group btn-group">
                                    <button type="button" class="note-btn btn btn-light btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" aria-label="Table" data-original-title="Table">
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
                            </div>
                            <div class="note-btn-group btn-group note-insert">
                                <button id="link-button" type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Link (CTRL+K)" data-original-title="Link (CTRL+K)">
                                    <i class="fas fa-link"></i>
                                </button>
                                <button id="image-button" type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Picture" data-original-title="Picture">
                                    <i class="fas fa-image"></i>
                                </button>
                                <button id="video-button" type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Video" data-original-title="Video">
                                    <i class="fas fa-video"></i>
                                </button>
                                <button id="insert-math" type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Video" data-original-title="Video">
                                    <i class="fas fa-square-root-alt"></i>
                                </button>
                            </div>
                            <div class="note-btn-group btn-group note-view">
                                <button id="full-screen" type="button" class="note-btn btn btn-light btn-sm btn-fullscreen note-codeview-keep" tabindex="-1" title="" aria-label="Full Screen" data-original-title="Full Screen">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button id="show-html" type="button" class="note-btn btn btn-light btn-sm btn-codeview note-codeview-keep" tabindex="-1" title="" aria-label="Code View" data-original-title="Code View">
                                    <i class="fas fa-code"></i>
                                </button>
                                <button id="help-button" type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" aria-label="Help" data-original-title="Help">
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
                            <div id="editor-content" class="note-editable card-block" contenteditable="true" aria-multiline="true" spellcheck="true" autocorrect="true" style="min-height: 471.719px;">
                                <p>
                                    <span style="font-family: &quot;Arial Black&quot;;"></span>Rozpocznij pisanie...
                                </p>
                            </div>
                        </div>


                        <output class="note-status-output" role="status" aria-live="polite"></output>
                        <div class="note-statusbar" role="status">
                            <div class="note-resizebar" aria-label="Resize">
                                <div class="note-icon-bar"></div>
                                <div class="note-icon-bar"></div>
                                <div class="note-icon-bar"></div>
                            </div>
                        </div>

                        <!-- Insert link modal button -->
                        <div id="insert-link" class="modal note-modal link-dialog" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Insert Link">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Insert Link</h4>
                                        <button id="close-insert-link" type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group note-form-group" data-children-count="1">
                                            <label for="note-dialog-link-txt-16063198779941" class="note-form-label">Text to display</label>
                                            <input id="note-dialog-link-txt-16063198779941" class="note-link-text form-control note-form-control note-input" type="text">
                                        </div>
                                        <div class="form-group note-form-group" data-children-count="1">
                                            <label for="note-dialog-link-url-16063198779941" class="note-form-label">To what URL should this link go?</label>
                                            <input id="note-dialog-link-url-16063198779941" class="note-link-url form-control note-form-control note-input" type="text" value="http://">
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
                                        <input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-link-btn" value="Insert Link" disabled="">
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
                                        <h4 class="modal-title">Insert Image</h4>
                                        <button id="close-insert-image" type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group note-form-group note-group-select-from-files">
                                            <label for="note-dialog-image-file-16063198779941" class="note-form-label">Select from files</label>
                                            <input id="note-dialog-image-file-16063198779941" class="note-image-input form-control-file note-form-control note-input" type="file" name="files" accept="image/*" multiple="multiple">
                                        </div>
                                        <div class="form-group note-group-image-url" data-children-count="1">
                                            <label for="note-dialog-image-url-16063198779941" class="note-form-label">Image URL</label>
                                            <input id="note-dialog-image-url-16063198779941" class="note-image-url form-control note-form-control note-input" type="text">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-image-btn" value="Insert Image" disabled="">
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
                                        <h4 class="modal-title">Insert Video</h4>
                                        <button id="close-insert-video" type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group note-form-group row-fluid" data-children-count="1">
                                            <label for="note-dialog-video-url-16063198779941" class="note-form-label">
                                                Video URL
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
                                        <h4 class="modal-title">Help</h4>
                                        <button id="close-help-modal" type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body" style="max-height: 300px; overflow: scroll;">
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
                                    <div class="modal-footer">
                                        <p class="text-center">
                                            Coś tam do wpisania
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="option-submit" class="modal note-modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Submit">
                            <div class="modal-dialog mt-5">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Podsumowanie</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <input id="preview" type="button" href="#" class="btn btn-info note-btn note-btn-primary" value="Podgląd" >
                                        <button id="pdf-export" type="button" class="note-btn btn btn-info btn-sm btn-fullscreen note-codeview-keep pl-3 pr-3" tabindex="-1" title="" aria-label="Full Screen" style="margin-right:auto; font-size:19px;" data-original-title="Full Screen">
                                            <i class="fas fa-file-pdf"></i>
                                        </button>
                                        <input id="save-sheet" type="button" href="#" class="btn btn-primary note-btn note-btn-primary" value="Zapisz">
                                        <input id="reject-sheet" type="button" href="#" class="btn btn-danger note-btn note-btn-primary note-video-btn" value="Odrzuć">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button id="submit" class="mt-3 ml-3 pl-5 pr-5 btn btn-primary">Zapisz arkusz</button>

        <!-- /.col-->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src={{ asset('js/editor.js') }}></script>
    @endsection