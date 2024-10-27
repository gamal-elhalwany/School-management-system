@extends('layouts.master')
@section('css')

@section('title')
{{__('Educational Stages')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{__('Educational Stages')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{__('Home')}}</a></li>
                <span class="mr-2 ml-2">{{__('\\')}}</span>
                <li class="breadcrumb-item active">{{__('Educational Stages')}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @error('name_en')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        @error('name_ar')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        @error('notes')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="card card-statistics h-100">
            <div class="card-body">
                <button type="button mb-3" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">{{__('Add Stage')}}</button>
                <div class="table-responsive mt-3">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Notes')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stages as $stage)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$stage->name}}</td>
                                <td>{{$stage->notes}}</td>
                                <td>
                                    <form action="{{route('stages.destroy', $stage->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Start Stages Form Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form action="{{route('stages.store')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name_en" class="form-control" id="name"
                                            placeholder="{{__('Name in English')}}">
                                        @error('name_en')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="name">{{__('Name')}}</label>
                                        <input type="text" name="name_ar" class="form-control" id="name"
                                            placeholder="{{__('Name in Arabic')}}">
                                        @error('name_ar')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="notes">{{__('Notes')}}</label>
                                        <textarea name="notes" class="form-control" id="notes"
                                            placeholder="{{__('Notes')}}"></textarea>
                                        @error('notes')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">{{__('Enter Data')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Stages Form Modal -->
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection