@extends('admin.layout.masterL')
 @section('title','Category List Page')
     
 @section('content')
        {{-- MAIN CONTENT  --}} 
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <div class="overview-wrap">
                                    <h2 class="title-1"> Category  List</h2>

                                </div>
                            </div>
                            <div class="table-data__tool-right">
                                <a href="{{route('category#createPage')}}">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>Add Category
                                    </button>  
                                </a>
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    CSV download
                                </button>  
                            </div>
                        </div>
                        @if(session('createSuccess'))
                        <div class="col-3 offset-9">
                            <div class="alert alert-success  alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-circle-check fa-beat"></i>   {{ session('createSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif

                        @if(session('deleteSuccess'))
                        <div class="col-3 offset-9">
                            <div class="alert alert-success  alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-trash fa-shake" style="color: #ff1a1a;"></i>   {{ session('deleteSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-3">
                                <h4 class="text-secondary ">Search Key : <span class="text-danger">{{request('key')}}</span>  </h4>
                            </div>

                            <div class="col-3 offset-6 mb-4">
                                <form action="{{route('category#list')}}" method="GET">
                                    @csrf
                                    <div class="d-flex">
                                        <input type="text" name="key" class="form-control" placeholder="Search...." value="{{request('key')}}">
                                    <button class="btn bg-danger text-white" type="submit">
                                        <i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i>
                                    </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                       <div class="row my-2">
                        <div class="col-1  bg-white text-center p-1 shadow-sm">
                            <h3> <i class="fa-solid fa-database mr-8"></i>   {{ $categories->total() }}</h3>
                        </div>
                       </div>

                         @if(count($categories) !=0 )

                         <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Created Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($categories as $category)
                                  <tr class="tr-shadow">
                                    <td>                    {{ $category->id }}                 </td>
                                    <td class="col-6">      {{ $category->name }}                        </td>
                                    <td>                    {{ $category->created_at->format('j-F-Y') }} </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                <i class="fa-solid fa-eye" style="color: #19be24;"></i>
                                            </button>
                                           <a href="{{ route('category#edit',$category->id) }}">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa-solid fa-pen-to-square" style="color: #3426fd;"></i>
                                            </button>
                                           </a>
                                           <a href="{{ route('category#delete' , $category->id) }}">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa-solid fa-trash" style="color: #000000;"></i>
                                            </button>
                                           </a>
                                        
                                        </div> 
                                    </td> 
                                </tr>
                                  @endforeach   
                                   
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{-- {{ $categories->links() }} --}}
                                {{ $categories->appends(request()->query())->links() }}
                            </div>
                        </div>
                        @else 
                        <h2 class="text-secondary text-center mt-5">There is no Categoy Here!</h2>
                         @endif 

                         
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
 @endsection