@extends('adminLTE.dashboard')

@section('content')
<style>

</style>
@foreach($user as $u)

<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-bottom:35px;">
            <h3>Profil użytkownika</h3>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">

                  <div class="d-flex flex-column align-items-center text-center ">
                    <img style="border-radius:50%; width:150px; height:150px;" class="profile-user-img" src="../../images/{{ DB::table('avatars')->where('user_id', $u->id)->value('hashName') }}" class="rounded-circle">
                    <div class="mt-3">
                        <h4>
                            {{ $u->name }}
                        </h4>
                      <p class="text-secondary mb-1">Głos kraju bez pracy - to my Polacy</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Strona</h6>
                    <span class="text-secondary"><a href="# ">Jakiś link</a></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nazwa użytkownika</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                            {{ $u->name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                            {{ $u->mail }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Utworzone zadania</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ DB::table('task')->where('createdBy', $u->id)->count()}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Utworzone arkusze</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ DB::table('sheets')->where('user_id', $u->id)->count()}}
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
              
            </div>
          </div>
        </div>
    </div>
    @endforeach




@endsection