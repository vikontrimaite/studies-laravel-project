@extends('layouts.app')
@section('content')
<div class="card-body">

    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif

    <table class="table">
        <tr>
            <th>Paskaitos pavadinimas</th>
            <th>Aprašymas</th>
        </tr>
        @foreach ($lectures as $lecture)
        <tr>
            <td>{{ $lecture->name }}</td>
            <td>{!! $lecture->about !!}</td>
            <td>
                <form action={{ route('lectures.destroy', $lecture->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('lectures.edit', $lecture->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                        value="Trinti" />
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('lectures.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection
