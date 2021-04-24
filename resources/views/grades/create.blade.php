@extends('layouts.app')
@section('content')
<div class="container">

    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Įvesti naują pažymį</div>
                <div class="card-body">
                    <form action="{{ route('lectures.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Pasirinktas studentas</label>
                            <select name="student_id" id="" class="form-control">
                                 <option value="" selected disabled>Pasirinkite studentą</option>
                                 @foreach ($students as $student)
                                 <option value="{{ $student->id }}">{{ $student->name }} {{ $student->surname }} </option>
                                 @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Paskaitos pavadinimas</label>
                            <select name="lecture_id" id="" class="form-control">
                                 <option value="" selected disabled>Pasirinkite paskaitą</option>
                                 @foreach ($lectures as $lecture)
                                 <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
                                 @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pažymys</label>
                            <input type="number" name="grade" class="form-control" value="{{ old('grade') }}">

                            @error('grade')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Įvesti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
