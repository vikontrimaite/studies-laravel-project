@extends('layouts.app')
@section('content')
<div class="card-body">

    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif

    <div class="container">
        <p class="h3">Įvesti naują pažymį:</p>
        <a href="{{ route('grades.create') }}" class="btn btn-success font-weight-bold">Įvesti</a>
    </div>

    <form class="form-inline mt-5" action="{{ route('grades.index') }}" method="GET">
        <p class="h3">Pasirinkite studentą, kurio pažymius norite matyti:</p>
        <div class="container">
            <select name="student_id" id="" class="form-control">
            <option value="" selected disabled>Pasirinkite studentą</option>
            @foreach ($students as $student)
            <option value="{{ $student->id }}" 
                @if($student->id == app('request')->input('student_id')) 
                    selected="selected" 
                @endif>{{ $student->name }} {{ $student->surname }}</option>
            @endforeach
        </select>
        </div>
        <div class="container mt-2"> 
            <button type="submit" class="btn btn-primary">Filtruoti</button>
            <a class="btn btn-success" href={{ route('grades.index') }}>Rodyti visus</a>
        </div>
        
    </form>


   <div class="container mt-5">
       <p class="h3">Visi studentų pažymiai:</p>
       <table class="table">
        <tr>
            <th>Studento vardas ir pavardė</th>
            <th>Paskaitos pavadinimas</th>
            <th>Pažymys</th>
        </tr>
        @foreach ($grades as $grade)
        <tr>
            <td>{{ $grade->student->name }} {{ $grade->student->surname }}</td>
            <td>{{ $grade->lecture->name }}</td>
            <td>{{ $grade->grade }}</td>
            <td>
                <form action={{ route('grades.destroy', $grade->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('grades.edit', $grade->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                        value="Trinti" />
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    </div>
    
</div>
@endsection
