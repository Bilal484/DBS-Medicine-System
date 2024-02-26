@extends('layouts.app')
@section('content')
    <div class="row d-flex flex-column">
        {!! Form::open(['route' => 'medicines.store']) !!}
        <div class="col-xs-4 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, [
                    'placeholder' => 'description',
                    'class' => 'form-control',
                    'style' => 'height:50px',
                ]) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                {!! Form::text('quantity', null, ['placeholder' => 'Quantity', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
