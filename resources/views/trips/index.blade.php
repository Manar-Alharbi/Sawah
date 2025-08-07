@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Cairo', sans-serif;
        background-color: #fdf6f9;
    }

    h2 {
        font-weight: bold;
        color: #7a5c91;
        text-align: center;
        margin-bottom: 30px;
        position: relative;
    }

    h2::after {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 100%;
        font-size: 1.5rem;
        color: #b497bd;
    }

    .btn-success {
        background-color: #a0c4b7;
        border: none;
        font-weight: 600;
        border-radius: 8px;
        padding: 8px 16px;
    }

    .btn-success:hover {
        background-color: #8db3a7;
    }

    .btn-primary {
        background-color: #b497bd;
        border: none;
        font-weight: 600;
        border-radius: 8px;
        padding: 6px 12px;
    }

    .btn-primary:hover {
        background-color: #a07aa8;
    }

    .btn-danger {
        background-color: #c08ca3;
        border: none;
        font-weight: 600;
        border-radius: 8px;
        padding: 6px 12px;
    }

    .btn-danger:hover {
        background-color: #a06c85;
    }

    .table {
        background-color: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(180, 151, 189, 0.15);
    }

    .table th {
        background-color: #b497bd;
        color: #ffffff;
        font-weight: 600;
        text-align: center;
    }

    .table td {
        vertical-align: middle;
        text-align: center;
        color: #5a4b5e;
    }
</style>

<div class="container mt-4">
    <h2>إدارة الرحلات</h2>
    <div class="text-end mb-4">
        <a href="{{ route('admin.trips.create') }}" class="btn btn-success">إضافة رحلة جديدة +</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>العنوان</th>
                <th>الوصف</th>
                <th>الموقع</th>
                <th>السعر</th>
                <th>التحكم</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trips as $trip)
            <tr>
                <td>{{ $trip->title }}</td>
                <td>{{ $trip->description }}</td>
                <td>{{ $trip->location }}</td>
                <td>{{ $trip->price }}</td>
                <td>
                    <a href="{{ route('admin.trips.edit', $trip->id) }}" class="btn btn-primary btn-sm">تعديل</a>
                    <form action="{{ route('admin.trips.destroy', $trip->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection