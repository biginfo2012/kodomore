@extends('layouts.app')

@section('css4page')
    <link rel="stylesheet" href="{{ asset('css/hes-gallery.css') }}">
    <style>
        .page-footer {
            display: none !important;
        }



    </style>
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <div class="card-body d-flex px-0 py-1">
                <img class="mr-2" style="width: 6%; height: auto;" src="{{ asset('img/preview_person.png') }}">
                <p class="text-small" style="font-size: 6px">kodomore-edu.com</p>
            </div>
            <div class="card-body p-1">
                <p id="meta_title" class="text-small" style="font-size: 10px; color: blue"></p>
            </div>
            <div class="card-body d-flex p-1">
                <p class="text-small pr-2" style="font-size: 7px; width: 60%;" id="meta_description"></p>

                <div style="width: 40%">

                        @foreach($topImgList  as $index_img => $img)
                            @if($index_img == 0)
                                <img style="width: 100%; height: auto;" src="{{ asset('img/garden/' . $img->img) }}">
                            @endif
                        @endforeach

                </div>

            </div>



        </div>





@endsection

@section('js4event')
            <script language="javascript" type="text/javascript">
                var currentPage = 1;
                var home_path;

                $(document).ready(function () {
                    var garden_info = JSON.parse(localStorage.getItem("meta_garden"));
                    console.log(garden_info);
                    $('#meta_title').text(garden_info['meta_title']);
                    $('#meta_description').text(garden_info['meta_description']);

                });
            </script>
@endsection
