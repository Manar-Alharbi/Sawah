@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة رحلة جديدة</h2>

    <form method="POST" action="{{ route('admin.trips.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label>عنوان الرحلة</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>وصف الرحلة</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label>الموقع</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>السعر</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>الصورة الرئيسية</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>صورة الخلفية</label>
            <input type="file" name="background_image" class="form-control">
        </div>

        <div class="form-group mb-4">
            <label>صور متعددة</label>
            <input type="file" name="images[]" class="form-control" multiple>
            <small class="text-muted">يمكنك اختيار أكثر من صورة باستخدام Ctrl أو Shift</small>
        </div>

        <button type="submit" class="btn btn-primary">حفظ الرحلة</button>
    </form>
</div>
@endsection