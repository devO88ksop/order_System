@extends('admin.layout.masterL')
@section('title', 'Category List Page')

@section('content')
    {{-- MAIN CONTENT  --}}
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="col-lg-10  offset-1">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="card-title">
                                <h2 class="text-center title-2 ">Account Info</h2>
                            </div>


                            <div class="row">
                                <div class="col-3 offset-2 ">
                                    @if (Auth::user()->image == null)
                                        <img src="{{ asset('image/default_user.png') }}" />
                                    @else
                                        <img src="{{ asset('admin/images/icon/avatar-01.jp   ') }}" />
                                    @endif
                                </div>
                                <div class="col-5 offset-1">
                                    <h3 class="my-3"> <i class="fa-solid fa-circle-user me-2"></i>
                                        {{ Auth::user()->name }} </h3>
                                    <h3 class="my-3"> <i class="fa-solid fa-envelope me-2"></i>
                                        {{ Auth::user()->email }} </h3>
                                    <h3 class="my-3"> <i class="fa-solid fa-phone-volume me-2"></i>
                                        {{ Auth::user()->phone }} </h3>
                                    <h3 class="my-3"> <i class="fa-solid fa-location-dot me-2"></i>
                                        {{ Auth::user()->address }} </h3>
                                    <h3 class="my-3"> <i class="fa-solid fa-calendar-days me-2"></i></i>
                                        {{ Auth::user()->created_at->format('j - F - Y') }} </h3>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 offset-10 mt-3">
                                    <button class="btn bg-dark text-white">
                                        <i class="fa-solid fa-pen-to-square me-2"></i> Edit Profile

                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
