@extends('Eshopper.master')

@section('content')
    <div class="container">
        <div class="row">
           

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="color:gray;font-size:25px;">Address</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/address/create') }}"  title="Add New address" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <!-- <form method="GET" action="{{ url('/admin/address') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form> -->

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Address1</th><th>Address2</th><th>Country</th><th>State</th><th>Zip code</th><th>Mob no.</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($address as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->customername }}</td><td>{{ $item->address1 }}</td><td>{{ $item->address2 }}</td>
                                        <td>{{ $item->country_name }}</td>
                                        <td>{{ $item->state_name }}</td>
                                        <td>{{ $item->zipcode }}</td>
                                        <td>{{ $item->mobno }}</td>

                                        <td>
                                            <a href="{{ url('/admin/address/' . $item->id) }}" title="View address"><button class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/address/' . $item->id . '/edit') }}" title="Edit address"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/address' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary btn-sm" title="Delete address" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> 
                            
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
