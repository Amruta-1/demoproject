@extends('master')

@section('content')
    <div class="form-group row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        <div class="pull-left">
        <h2>Coupons </h2>
        </div>
        <br>
                     <div class="pull-right">
                        @can('coupon-create')
                        <a href="{{ url('/admin/coupon/create') }}" class="btn btn-success btn-sm" title="Add New Coupon">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        @endcan
                    </div>
                        <form method="GET" action="{{ url('/admin/coupon') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Title</th><th>Code</th><th>Type</th><th>Discount</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($coupon as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->discount }}</td>

                                        <td>
                                            <a href="{{ url('/admin/coupon/' . $item->id) }}" title="View Coupon"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            @can('coupon-edit')
                                            <a href="{{ url('/admin/coupon/' . $item->id . '/edit') }}" title="Edit Coupon"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            @endcan
                                            @can('coupon-delete')

                                            <form method="POST" action="{{ url('/admin/coupon' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Coupon" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $coupon->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

        </div>
    </div>
      
@endsection
