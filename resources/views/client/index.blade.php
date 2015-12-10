@extends('layout.master')

@section('content')
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="{{ action('ClientController@create') }}" class="bth btn-sm btn-primary">Add New Client</a>
            </div>
            Clients List
        </div>
        <div class="panel-body">
            <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Nationality</th>
                        <th>DOB</th>
                        <th>Qualification</th>
                        <th>Preferred mode of contact</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client[0] }}</td>
                        <td>{{ $client[1] }}</td>
                        <td>{{ $client[2] }}</td>
                        <td>{{ $client[3] }}</td>
                        <td>{{ $client[4] }}</td>
                        <td>{{ $client[5] }}</td>
                        <td>{{ $client[6] }}</td>
                        <td>{{ $client[7] }}</td>
                        <td>{{ $client[8] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            {!! $clients->render() !!}
        </div>
    </div>
</div>
@endsection