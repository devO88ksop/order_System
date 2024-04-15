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
                            <div class="card-title font-serif">
                                <h1 class="text-center ">Account Profile</h1>
                            </div>
                            <form action="">
                                <div class="row">
                                    <div class="col-4 offset-1 mt-5">
                                        @if (Auth::user()->image == null)
                                            <img src="{{ asset('image/default_user.png') }}"
                                                class="img-fluid img-thumbnail shadow-lg" />
                                        @else
                                            <img src="{{ asset('admin/images/icon/avatar-01.jp') }}" />
                                        @endif
                                        <div class="mt-2">
                                            <input type="file" name="image" class="form-control-file">
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-outline-success mt-3 col-12">
                                                <i class="fa-solid fa-file-pen"></i>
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row col-6 my-4">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Name</label>
                                            <input id="cc-pament" name="name" type="text"
                                                value="{{ old('name', Auth::user()->name) }}"
                                                class="form-control @error('name') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Enter Admin Name...">
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Email</label>
                                            <input id="cc-pament" name="email" type="text"
                                                value="{{ old('email', Auth::user()->email) }}"
                                                class="form-control @error('email') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false"
                                                placeholder="Enter Admin Email...">
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Phone</label>
                                            <input id="cc-pament" name="phone" type="text"
                                                value="{{ old('phone', Auth::user()->phone) }}"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false"
                                                placeholder="Enter Admin Phone...">
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Address</label>
                                            <textarea id="cc-pament" name="address" type="text" style="height: 100px;"
                                                class="form-control @error('address') is-invalid @enderror" aria-required="true" aria-invalid="false"
                                                placeholder="Enter Admin Address...">{{ old('address', Auth::user()->address) }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Role</label>
                                            <input id="cc-pament" name="role" type="text"
                                                value="{{ old('role', Auth::user()->role) }}"
                                                class="form-control @error('role') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" disabled>
                                        </div>

                                    </div>
                                </div>


                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
