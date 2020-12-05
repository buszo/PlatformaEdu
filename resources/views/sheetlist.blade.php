@extends('adminLTE.dashboard')

@section('content')
<style>
.add-sheet {
    float:right; cursor:pointer; display:inline-block; margin-top:4px; font-size:30px;
}
</style>


<div class="container mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 order-md-2">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-header">
                        <a href="#">Nowy arkusz</a>
                    </div>
                    <div class="card-body">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                        </div>
                        <button class="btn btn-primary" type="submit">Szukaj</button>
                    </form>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="col-md-9 order-md-1">
                <div class="card">
                    <div class="card-header pt-3 pb-3">
                        <h3 style="display:inline-block;">Dodane arkusze</h3>
                        <div class="add-sheet">
                            <a id="submit" role="button" href="{{route('editor')}}">
                                <i class="fas fa-plus-square"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <h5 class="card-header">Featured</h5>
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <h5 class="card-header">Featured</h5>
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <h5 class="card-header">Featured</h5>
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <h5 class="card-header">Featured</h5>
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <h5 class="card-header">Featured</h5>
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <h5 class="card-header">Featured</h5>
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    

                    </div>
                    <div class="card-footer">

                            <ul class="pagination justify-content-center" style="margin-bottom:0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection