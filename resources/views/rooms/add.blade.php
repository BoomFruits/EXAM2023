@extends('layouts.parent')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header bg-success text-lg-center" style="font-size: 30px; color:white">
            Add new room
        </div>
        <div class="card-body">
            <form action="{{ route('rooms.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">RoomNumber</label>
                    <div class="col-sm-10">
                        <input type="text" name="RoomNumber" id="" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">RoomType</label>
                    <div class="col-sm-10">
                        <select name="RoomType" id="">
                            <option value="standard">Standard</option>
                            <option value="deluxe">Deluxe</option>
                            <option value="suite">Suite</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Availability</label>
                    <div class="col-sm-10">
                        <select name="Availability" id="">
                            <option value="availble">Availble</option>
                            <option value="occupied">Occupied</option>
                            <option value="under maintenance">Under Maintenance</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Back</a>
                    <input type="submit" value="Add" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection