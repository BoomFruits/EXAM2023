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
            Edit room
        </div>
        <div class="card-body">
            <form action="{{ route('rooms.update',$room->RoomID) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">RoomNumber</label>
                    <div class="col-sm-10">
                        <input type="text" name="RoomNumber" id="" class="form-control" value="{{ $room->RoomNumber }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">RoomType</label>
                    <div class="col-sm-10">
                        <select name="RoomType" id="">
                            <option value="standard" @if ($room->RoomType === 'standard')
                                {{ 'selected' }}
                            @endif>Standard</option>
                            <option value="deluxe" @if ($room->RoomType === 'deluxe')
                                {{ 'selected' }}
                            @endif>Deluxe</option>
                            <option value="suite" @if ($room->RoomType === 'suite')
                                {{ 'selected' }}
                            @endif>Suite</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Availability</label>
                    <div class="col-sm-10">
                        <select name="Availability" id="">
                            <option value="availble" @if ($room->Availability === 'availble')
                                {{ 'selected' }}
                            @endif>Availble</option>
                            <option value="occupied" @if ($room->Availability === 'occupied')
                                {{ 'selected' }}
                            @endif>Occupied</option>
                            <option value="under maintenance" @if ($room->Availability === 'under maintenance')
                                {{ 'selected' }}
                            @endif>Under Maintenance</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Back</a>
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection