@extends('layouts.master')
@section('style')

@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" role="form" id="addEditForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="edit_value" id="edit_value" value="0" />
                        <div class="form theme-form">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="title" id="title"
                                               placeholder="Title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" id="editor1"
                                                  rows="3" required></textarea>
                                    </div>
                                </div>
                            </div>

{{--                            <div class="row">--}}
{{--                                <div class="col">--}}
{{--                                    <div class="mb-3">--}}
{{--                                        <label>Image <span class="text-danger">*</span></label>--}}
{{--                                        <input class="form-control dropify" type="file" name="image" id="name" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="row">
                                <div class="col">
                                    <div class="text-end">
                                        <button class="btn btn-success me-3">Add</button>
                                        <button class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var formUrl = '/save-interview-questions';
        var redirect_url = '/interview-questions';

        $('.dropify').dropify();
    </script>
    <script src="{{ asset('assets/form.js') }}"></script>
    <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/js/editor/ckeditor/adapters/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.custom.js') }}"></script>
    <script src="{{ asset('assets/js/editor/ckeditor/styles.css') }}"></script>
@endsection
