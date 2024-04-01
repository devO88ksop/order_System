@extends('admin.layout.masterL')
@section('title', 'Category List Page')

@section('content')
    {{-- MAIN CONTENT  --}}
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="col-lg-6 offset-3">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Change Your Password</h3>
                            </div>
                            @if(session('changeSuccess'))
                            <div class="col-12">
                                <div class="alert alert-success  alert-dismissible fade show" role="alert">
                                    <i class="fa-solid fa-circle-check fa-beat"></i>   {{ session('changeSuccess') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            @endif
                            @if(session('notMatch'))
                            <div class="col-12">
                                <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                                    <i class="fa-solid fa-triangle-exclamation me-2"></i>  {{ session('notMatch') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            @endif
                            <hr>
                            <form action="{{ route('admin#changePassword') }}" method="post" novalidate="novalidate">

                                @csrf

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Old Password </label>
                                    <input id="cc-pament" name="oldPassword" type="password"
                                        class="form-control @error('oldPassword') is-invalid @enderror" aria-required="true"
                                        aria-invalid="false" placeholder="Enter Old Password...">

                                    @error('oldPassword')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">New Password </label>
                                    <input id="cc-pament" name="newPassword" type="password"
                                        class="form-control @error('newPassword') is-invalid @enderror" aria-required="true"
                                        aria-invalid="false" placeholder="Enter New password...">

                                    @error('newPassword')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Confirm Password </label>
                                    <input id="cc-pament" name="confirmPassword" type="password"
                                        class="form-control @error('confirmPassword') is-invalid @enderror"
                                        aria-required="true" aria-invalid="false" placeholder="Enter Confirm Password...">

                                    @error('confirmPassword')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class=" my-3">
                                    <button id="payment-button" type="submit" class="btn btn-success w-100"
                                        style="border-radius: 10px">
                                        <span id="payment-button-amount">Change Password</span>
                                        {{-- <span id="payment-button-sending" style="display:none;">Sending…</span>  --}}
                                        <i class="fa-solid fa-key"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
