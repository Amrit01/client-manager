@extends('layout.master')

@section('content')
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="{{ action('ClientController@create') }}" class="btn btn-primary">Add New Client</a>
            </div>
            <i class="ion ion-ios-people"></i>&nbsp;Clients List
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
                @forelse($clients as $client)
                    <tr>
                        <td>{{ e(ucwords($client['name'])) }}</td>
                        <td>{{ ucwords($client['gender']) }}</td>
                        <td><a href="mailto:{{$client['email']}}">{{ $client['email'] }}</a></td>
                        <td>{{ e($client['phone']) }}</td>
                        <td>{{ e($client['address']) }}</td>
                        <td>{{ $client['nationality'] }}</td>
                        <td>{{ $client['date_of_birth'] }}</td>
                        <td>{{ e($client['qualification']) }}</td>
                        <td>{{ ucwords($client['preferred_contact_mode']) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="alert alert-warning" role="alert" colspan="9">No record to show.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            </div>
            {!! $clients->render() !!}
        </div>
    </div>
</div>
@endsection