@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px; text-align: center">ID</th>
                <th >Name</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 100px">Thao tác</th>
            </tr>
        </thead>
        <tbody>
                {!! \App\Helpers\Helper::menu($menus) !!}
        </tbody>
    </table>
@endsection
