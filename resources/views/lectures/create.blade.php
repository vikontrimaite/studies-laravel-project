@extends('layouts.app')
@section('content')
<div class="container">

    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pridėkime naują paskaitą</div>
                <div class="card-body">
                    <form action="{{ route('lectures.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Paskaitos pavadinimas</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">

                            @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Aprašymas</label>
                            <textarea id="mce" name="about" rows=10 cols=100 class="form-control"
                                value="{{ old('about') }}"></textarea>

                            @error('about')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Pridėti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
