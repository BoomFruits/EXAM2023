@extends('layouts.parent')
@section('content')
    <div class="container mt-5">
        <h1 class="text-primary mt-3 mb-4 text-center"><b>Management Room</b></h1>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="msg">
            {{ $message }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6">
                    <b></b>
                </div>
                <div class="col col-md-6">
                    <a href="{{ route('rooms.create') }}" class="btn btn-success btn-sm float-end">Add new</a>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                    <tr>
                        <th class="col-1">RoomID</th>
                        <th class="text-center">RoomNumber</th>
                        <th class="text-center">RoomType</th>
                        <th class="text-center">Availability</th>
                        <th class="text-center">Action</th>
                    </tr>
                    @if (count($rooms) > 0)
                        @foreach ($rooms as $row)
                            <tr>
                                <td class="col-1">{{ $row->RoomID }}</td>
                                <td class="col-1">{{ $row->RoomNumber }}</td>
                                <td class="text-center">{{ $row->RoomType }}</td>
                                <td class="text-center">{{ $row->Availability }}</td>
                                
                                {{-- <td>@if ($row->StudentGender == 0)
                                    Nam
                                @else Nữ @endif</td> --}}
                                {{-- <td>{{ $row->ClassRoom->ClassRoomName }}</td> --}}
                                <td class="text-center">
                                    
                                        <a href="{{ route('rooms.edit',$row->RoomID) }}" class="btn btn-warning">Edit</a>
                
                                        {{-- <input type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row->RoomID ?>" value="Delete"> --}}
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row->RoomID ?>">Delete</button>
                                    </form>
                                </td>
                            </tr>
                             <td>
                         <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $row->RoomID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete confirm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure want to delete book id = <?php echo $row->RoomID ?>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('rooms.destroy',$row->RoomID) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-success">Yes</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </td>
                        @endforeach
                    @else
                            <tr>
                                <td colspan="3" class="text-center">No Data Found</td>
                            </tr>
                    @endif
                   </table>
                   <nav aria-label="...">
                    <ul class="pagination">
                      @if ($rooms->currentPage() == 1)
                        <li class="page-item disabled">
                            <a class="page-link" href="" tabindex="-1">Previous</a>
                        </li>   
                      @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $rooms->previousPageUrl() }}" tabindex="-1">Previous</a>
                        </li>
                      @endif
                      @for ($i = 1; $i <= $rooms->lastPage(); $i++)
                          @if ($i == $rooms->currentPage())
                            <li class="page-item active">
                                <a class="page-link" href="?page={{ $i }}"><span class="sr-only">{{ $i }}</span></a>
                            </li>
                          @else
                            <li class="page-item ">
                                <a class="page-link" href="{{ $rooms->url($i) }}"> <span class="sr-only">{{ $i }}</span></a>
                                {{-- <a class="page-link" href="?page={{ $i }}"> <span class="sr-only">{{ $i }}</span></a> --}}

                            </li>
                          @endif
                      @endfor       
                      @if ($rooms->currentPage() < $rooms->lastPage())
                        <li class="page-item">
                            <a class="page-link" href="{{ $rooms->nextPageUrl() }}">Next</a>
                        </li>
                      @else
                            <li class="page-item disabled">
                                <a class="page-link" href="" tabindex="-1">Next</a>
                            </li>
                      @endif
                    </ul>
                  </nav>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function(){
         document.getElementById("msg").hidden = true;    
       },3000)
       document.getElementById("msg").hidden = false;    
   </script>
@endsection