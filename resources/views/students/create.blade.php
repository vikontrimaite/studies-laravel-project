@extends('layouts.app')
@section('content')
<div class="container">

    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pridėkime naują studentą</div>
                <div class="card-body">
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Vardas</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">

                            @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Pavardė</label>
                            <input type="text" name="surname" class="form-control" value="{{ old('surname') }}">

                            @error('surname')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>El. paštas</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">

                            @error('email')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tel. numeris</label>
                            <input type="number" name="phone" class="form-control" value="{{ old('phone') }}">

                            @error('phone')
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
