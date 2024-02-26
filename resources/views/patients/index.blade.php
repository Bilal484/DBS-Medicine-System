@extends('layouts.app')
@section('content')
    @include('patients.partials.add')
   

    <div class="col-md-12 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Icons</li>
                <li>Student</li>
            </ol>
        </div><br><!--/.row-->
        <!-- Modal -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Student Table<a class="btn btn-success pull-right" data-toggle="modal"
                            href="#addPatient"><span class="glyphicon glyphicon-plus"></span>Add Student</a></div>
                    <div class="panel-body">
                        <table id="example" class="table table-bordered table-condensed" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>DBR</th>
                                    <th>Name</th>
                                    <th data-sortable="true">Phone</th>
                                    <th data-sortable="true">Address</th>
                                    <th data-sortable="true">Email</th>
                                    <th data-sortable="true">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->id }}</td>
                                        <td>{{ $patient->DBR }}</td>
                                        <td>{{ $patient->first_name }}
                                        </td>
                                        <td>{{ $patient->phone }}</td>
                                        <td>{{ $patient->district }}, {{ $patient->location }}</td>
                                        <td>{{ $patient->email }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary glyphicon glyphicon-eye-open"
                                                href="{{ route('patient.show', $patient->id) }}"></a>

                                            {{-- add edit button and delete button --}}
                                            

                                           

                                            {{-- <form id="deleteForm" action="{{ route('patients.destroy', $patient->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form> --}}


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div><!--/.main-->


@endsection

{{-- edit and delete button code  --}}

<script>
    $(document).ready(function() {
        $('#deleteForm').submit(function(e) {
            e.preventDefault(); // Prevent the form from submitting normally
            if (confirm('Are you sure you want to delete this patient?')) {
                this.submit(); // Submit the form
            }
        });
    });
</script>
