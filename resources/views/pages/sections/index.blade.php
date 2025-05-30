@extends('layouts.master')
@section('css')
@endsection
@section('title')
    {{ __('Study Sections') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ __('Study Sections') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('Home') }}</a></li>
                    <span class="mr-2 ml-2">{{ __('\\') }}</span>
                    <li class="breadcrumb-item active">{{ __('Study Sections') }}</li>
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
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('Add Study Section') }}</a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            @foreach ($stages as $stage)
                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{ $stage->name }}</a>
                                    <div class="acd-des">

                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                    <tr class="text-dark">
                                                                        <th>#</th>
                                                                        <th>{{ trans('Section Name') }}
                                                                        </th>
                                                                        <th>{{ trans('Classroom Name') }}</th>
                                                                        <th>{{ trans('Status') }}</th>
                                                                        <th>{{ trans('Actions') }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i = 0; ?>
                                                                    @foreach ($stage->sections as $section)
                                                                        <tr>
                                                                            <?php $i++; ?>
                                                                            <td>{{ $i }}</td>
                                                                            <td>{{ $section->section_name }}</td>
                                                                            <td>{{ $section->classroom->name }}
                                                                            </td>
                                                                            <td>
                                                                                @if ($section->status === 1)
                                                                                    <label
                                                                                        class="badge badge-success p-2">{{ trans('Active') }}</label>
                                                                                @else
                                                                                    <label
                                                                                        class="badge badge-danger p-2">{{ __('Inactive')}}</label>
                                                                                @endif

                                                                            </td>
                                                                            <td>

                                                                                <a href="#"
                                                                                    class="btn btn-outline-info btn-sm"
                                                                                    data-toggle="modal"
                                                                                    data-target="#edit{{ $section->id }}">{{ trans('Edit') }}</a>
                                                                                <a href="#"
                                                                                    class="btn btn-outline-danger btn-sm"
                                                                                    data-toggle="modal"
                                                                                    data-target="#delete{{ $section->id }}">{{ trans('Delete') }}</a>
                                                                            </td>
                                                                        </tr>


                                                                        <!--تعديل قسم جديد -->
                                                                        <div class="modal fade"
                                                                            id="edit{{ $section->id }}" tabindex="-1"
                                                                            role="dialog"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title"
                                                                                            style="font-family: 'Cairo', sans-serif;"
                                                                                            id="exampleModalLabel">
                                                                                            {{ trans('Edit Section') }}
                                                                                        </h5>
                                                                                        <button type="button"
                                                                                            class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                            <span
                                                                                                aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">

                                                                                        <form
                                                                                            action="{{ route('sections.update', $section->id) }}"
                                                                                            method="POST">
                                                                                            {{ method_field('patch') }}
                                                                                            {{ csrf_field() }}
                                                                                            <div class="row">
                                                                                                <div class="col">
                                                                                                    <input type="text"
                                                                                                        name="section_name_ar"
                                                                                                        class="form-control"
                                                                                                        value="{{ $section->getTranslation('section_name', 'ar') }}">
                                                                                                </div>

                                                                                                <div class="col">
                                                                                                    <input type="text"
                                                                                                        name="section_name_en"
                                                                                                        class="form-control"
                                                                                                        value="{{ $section->getTranslation('section_name', 'en') }}">
                                                                                                </div>

                                                                                            </div>
                                                                                            <br>


                                                                                            <div class="col">
                                                                                                <label for="inputName"
                                                                                                    class="control-label">{{ trans('Classroom Stage') }}</label>
                                                                                                <select name="stage_id"
                                                                                                    class="custom-select">
                                                                                                    <!--placeholder-->
                                                                                                    <option
                                                                                                        value="{{ $stage->id }}">
                                                                                                        {{ $stage->name }}
                                                                                                    </option>
                                                                                                    @foreach ($stages as $stage)
                                                                                                        <option
                                                                                                            value="{{ $stage->id }}">
                                                                                                            {{ $stage->name }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                            <br>

                                                                                            <div class="col">
                                                                                                <label for="inputName"
                                                                                                    class="control-label">{{ trans('Classroom Name') }}</label>
                                                                                                <select name="class_id"
                                                                                                    class="custom-select">
                                                                                                    <option
                                                                                                        value="{{ $section->classroom->id }}">
                                                                                                        {{ $section->classroom->name }}
                                                                                                    </option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <br>

                                                                                            <div class="col">
                                                                                                <div class="form-check">

                                                                                                    @if ($section->status === 1)
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            checked
                                                                                                            class="form-check-input"
                                                                                                            name="status"
                                                                                                            id="exampleCheck1">
                                                                                                    @else
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            class="form-check-input"
                                                                                                            name="status"
                                                                                                            id="exampleCheck1">
                                                                                                    @endif
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="exampleCheck1">{{__('Status')}}</label>
                                                                                                </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">{{ trans('Close') }}</button>
                                                                                        <button type="submit"
                                                                                            class="btn btn-danger">{{ trans('Save') }}</button>
                                                                                    </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <!-- delete_modal_Grade -->
                                                                        <div class="modal fade"
                                                                            id="delete{{ $section->id }}" tabindex="-1"
                                                                            role="dialog"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                            class="modal-title"
                                                                                            id="exampleModalLabel">
                                                                                            {{ trans('Delete Section') }}
                                                                                        </h5>
                                                                                        <button type="button"
                                                                                            class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                            <span
                                                                                                aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form
                                                                                            action="{{ route('sections.destroy', $section->id) }}"
                                                                                            method="post">
                                                                                            {{ method_field('Delete') }}
                                                                                            @csrf
                                                                                            {{ trans('Are you sure of deleting this?!') }}
                                                                                            <div class="modal-footer">
                                                                                                <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal">{{ trans('Close') }}</button>
                                                                                                <button type="submit"
                                                                                                    class="btn btn-danger">{{ trans('Save') }}</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!--اضافة قسم جديد -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                    {{ trans('Add Study Section') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('sections.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="section_name_ar" class="form-control"
                                                placeholder="{{ trans('Section Name in Arabic') }}">
                                        </div>

                                        <div class="col">
                                            <input type="text" name="section_name_en" class="form-control"
                                                placeholder="{{ trans('Section Name in English') }}">
                                        </div>

                                    </div>
                                    <br>


                                    <div class="col">
                                        <label for="inputName"
                                            class="control-label">{{ trans('Classroom Stage') }}</label>
                                        <select name="stage_id" class="custom-select">
                                            <!--placeholder-->
                                            <option value="" selected disabled>
                                                {{ trans('Classroom Stage') }}
                                            </option>
                                            @foreach ($stages as $stage)
                                                <option value="{{ $stage->id }}"> {{ $stage->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>

                                    <div class="col">
                                        <label for="inputName"
                                            class="control-label">{{ trans('Classroom Name') }}</label>
                                        <select name="class_id" class="custom-select">

                                        </select>
                                    </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('Close') }}</button>
                                <button type="submit" class="btn btn-danger">{{ trans('Save') }}</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection
