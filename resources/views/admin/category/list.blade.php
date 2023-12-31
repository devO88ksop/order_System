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
                                    <td> {{ $category->category_id }} </td>
                                    <td class="col-6"> {{ $category->name }} </td>
                                    <td> {{ $category->created_at->format('j-F-Y') }} </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                <i class="fa-solid fa-eye" style="color: #19be24;"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa-solid fa-pen-to-square" style="color: #3426fd;"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa-solid fa-trash" style="color: #000000;"></i>
                                            </button>
                                        
                                        </div> 
                                    </td> 
                                </tr>
                                  @endforeach   
                                   
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
 @endsection