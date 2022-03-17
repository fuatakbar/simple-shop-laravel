@extends('layouts.cms')

@section('content')
    <div class="container cms user-list">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1>User List</h1>
                <table class="table table-bordered user-list data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
