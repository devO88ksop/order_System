@extends('admin.layout.masterL')
 @section('title','Category List Page')
     
 @section('content')
        {{-- MAIN CONTENT  --}} 
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3 offset-8">
                            <a href="{{ route('category#list') }}">
                                <button class="btn btn-danger text-white my-3 ms-4">List</button>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-3">
                        <div class="card rounded">
                            <div class="card-body">
                                <div class="card-title">    
                                    <h3 class="text-center title-2" style="">Edit Your Category</h3>
                                </div>
                                <hr>
                                <form action="{{route('category#update',$category->category_id)}}" method="post" novalidate="novalidate">

                                    @csrf
                                    
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Name</label>
                                        <input id="cc-pament" name="categoryName" type="text"  value="{{old('categoryName',$category->name)}}" class="form-control @error('categoryName') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Seafood...">

                                         @error('categoryName')

                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>  

                                         @enderror
                                    </div>

                                    <div class=" my-3">
                                        <button id="payment-button" type="submit" class="btn btn-success w-100" style="border-radius: 10px">
                                            <span id="payment-button-amount">Update</span>
                                            {{-- <span id="payment-button-sending" style="display:none;">Sending…</span>  --}}
                                            <i class="fa-solid fa-circle-right"></i>
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