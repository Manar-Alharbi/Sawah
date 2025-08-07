@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل الرحلة</h2>

    <form method="POST" action="{{ route('admin.trips.update', $trip->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>عنوان الرحلة</label>
            <input type="text" name="title" class="form-control" value="{{ $trip->title }}" required>
        </div>

        <div class="form-group mb-3">
            <label>وصف الرحلة</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $trip->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>الموقع</label>
            <input type="text" name="location" class="form-control" value="{{ $trip->location }}" required>
        </div>

        <div class="form-group mb-3">
            <label>السعر</label>
            <input type="number" name="price" class="form-control" value="{{ $trip->price }}" required>
        </div>

        <div class="form-group mb-3">
            <label>الصورة الرئيسية الحالية:</label><br>
            @if($trip->image)
                <img src="{{ asset('storage/' . $trip->image) }}" class="img-thumbnail mb-2" style="height: 100px;">
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>صورة الخلفية الحالية:</label><br>
            @if($trip->background_image)
                <img src="{{ asset('storage/' . $trip->background_image) }}" class="img-thumbnail mb-2" style="height: 100px;">
            @endif
            <input type="file" name="background_image" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>إضافة صور متعددة جديدة:</label>
            <input type="file" name="images[]" class="form-control" multiple>
            <small class="text-muted">يمكنك رفع أكثر من صورة</small>
        </div>

        @if($trip->images->count())
            <label>الصور الحالية:</label>
            <div class="row">
                @foreach($trip->images as $image)
                    <div class="col-md-3 mb-3">
                        <img src="{{ url($image->image_url) }}" class="img-thumbnail" style="height: 100px;">
                        <form method="POST" action="{{ route('admin.trips.deleteImage', $image->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mt-1">حذف</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif

        <button type="submit" class="btn btn-success mt-3">تحديث الرحلة</button>
    </form>
</div>
@endsection