@extends('layouts.app')
@section('content')
<div class="card-body">

    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif

    <table class="table">
        <tr>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>El. paštas</th>
            <th>Tel. numeris</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->surname }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>
                <form action={{ route('students.destroy', $student->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('students.edit', $student->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                        value="Trinti" />
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('students.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection
