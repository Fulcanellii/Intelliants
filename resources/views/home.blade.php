@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @foreach($news as $new)
                    @if($new->companies->where('status', 1)->isNotEmpty())
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{ $new->title }}</b></h5>
                                <p class="card-text text-muted">{{ $new->description }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($new->companies->where('status', 1) as $company)
                                    <li class="list-group-item">{{ $company->title }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <hr>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

@endsection
