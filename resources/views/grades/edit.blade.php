@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeiskime studento pažymį</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('grades.update', $grade->id) }}">
                        @csrf @method("PUT")

                        <div class="form-group">
                            <label>Pasirinktas studentas</label>
                            <select name="student_id" id="" class="form-control">
                                @foreach ($students as $student)
                                <option value="{{ $student->id }}" @if($student->id == $grade->student_id) selected="selected" @endif>{{ $student->name }} {{ $student->surname }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label>Paskaitos pavadinimas</label>
                            <select name="lecture_id" id="" class="form-control">
                                @foreach ($lectures as $lecture)
                                <option value="{{ $lecture->id }}" @if($lecture->id == $grade->lecture_id) selected="selected" @endif>{{ $lecture->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    
                        <div class="form-group">
                            <label for="">Pažymys</label>
                            <input type="number" name="bet" class="form-control" value="{{ $grade->grade }}">

                            @error('grade')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
