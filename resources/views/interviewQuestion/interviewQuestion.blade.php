@extends('layouts.master')
@section('style')

@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            @foreach($questions as $question)
                <div class="col-xl-12 set-col-12 box-col-12">
                    <div class="card mb-0">
                        <div class="card-header d-flex">
                            <h5 class="mb-0">Interview Questions</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="taskadd">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <h6 class="task_title_0">{{ $question->title }}</h6>
                                            </td>
                                            <td>
                                                <p class="task_desc_0">{!! $question->description !!}</p>
                                            </td>
                                            <td>
                                                <a href="">View</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
@section('js')
    <script>
        var formUrl = '/category';
        var redirect_url = '/category';

        $('.dropify').dropify();
    </script>
    <script src="{{ asset('assets/form.js') }}"></script>
@endsection
