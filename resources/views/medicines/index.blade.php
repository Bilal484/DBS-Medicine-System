<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medicine Table</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Medicine Table</h3>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('medicines.create') }}"> Create New Medicine</a>
                </div>
            </div>
        </div>

        <form class="form-inline my-2 my-lg-0 float-right" action="{{ route('medicines.index') }}" method="GET">
            <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search..." aria-label="Search" id="search-input">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Quantity</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($medicines as $medicine)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $medicine->title }}</td>
                    <td>{{ $medicine->description }}</td>
                    <td>{{ $medicine->quantity }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('medicines.show', $medicine->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('medicines.edit', $medicine->id) }}">Edit</a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['medicines.destroy', $medicine->id],
                            'style' => 'display:inline',
                        ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $medicines->links() !!}
    @endsection

</body>

</html>
