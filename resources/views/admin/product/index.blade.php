@extends('master')

@section('content')

   <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
                
                <h2> Products </h2>
                
               <div class="pull-right"> 
                @can('product-create')
                <a href="{{ url('/admin/product/create') }}" class="btn btn-success btn-sm" title="Add New Product">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                </a>
                @endcan
               </div>
                <form method="GET" action="{{ url('/admin/product') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}" style="margin-left: -42px;">
                        <span class="input-group-append">
                            <button class="btn btn-secondary" type="submit" style="">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Product Img</th>
                                <th>Product Price</th>
                                <th>Product Category</th>
                                <th>Product Color</th>
                                <th>Product Quantity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $prod)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $prod->product_name }}</td>
                                <td><img src="{{asset('product/'.$prod->product_Image->product_img)}}" height=60 width=50></Img></td>
                                <td>{{ $prod->product_price }}</td>
                                <td>{{ $prod->category->categories->category}}</td>
                                <td> {{ $prod->product_Attributes->color}}</td><td>
                                {{ $prod->product_Attributes->quantity}}</td>

                                   <td>
                                
                                    <a href="{{ url('/admin/product/' . $prod->id) }}" title="View Product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                               
                                    @can('product-edit')
                                    <a href="{{ url('/admin/product/' . $prod->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                    @endcan
                                    @can('product-delete')
                                    <form method="POST" action="{{ url('/admin/product' . '/' . $prod->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button></td>
                                    </form>
                                     @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $product->appends(['search' => Request::get('search')])->render() !!} </div>
                
               </div>

            </div>
       
@endsection
