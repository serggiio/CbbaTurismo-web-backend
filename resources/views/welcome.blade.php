@extends('template.layoutWelcome')

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-4">Fluid jumbotron <i class="fas fa-map-marker-alt"></i></h1>
                  <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-4">Fluid jumbotron</h1>
                  <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
