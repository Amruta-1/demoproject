@extends('master')

@section('content')
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
                <h2>Categories</h2>
                        <div class="pull-right"> 
                        <a href="{{ url('/admin/category/create') }}" class="btn btn-success btn-sm" title="Add New category">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        </div>
                        <form method="GET" action="{{ url('/admin/category') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}" style="margin-left: -42px;">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Category</th><th>Parent Category</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($category as $item)
                                    

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                       <td>{{ $item->category }}</td>
                                       <td> @if($item->parent_id == 0)
                                            N/A
                                            @elseif($item->parent_id != 0)
                                            @foreach($categories as $parentcategory)
                                            @if($item->parent_id == $parentcategory->id)
                                            {{$parentcategory->category}}
                                            @endif
                                            
                                            @endforeach
                                            @endif
                                             
                                                
                                       </td>
                                        <td>
                                            <a href="{{ url('/admin/category/' . $item->id) }}" title="View category"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/category/' . $item->id . '/edit') }}" title="Edit category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/category' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $category->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

        </div>
    </div>
            
@endsection
