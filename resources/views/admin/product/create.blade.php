@extends('master')

@section('content')
   <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
                        <div class="pull-left">
                        <h2>Create Product </h2>
                        </div>
                        
                        <br>
                        <div class="pull-right">
                        <a href="{{ url('/admin/product') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        </div>
                        <br><br><br>
                        <!-- @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif -->

                        <form method="POST" action="{{ url('/admin/product') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.product.form', ['formMode' => 'create'])

                        </form>

        </div>
    </div>
            
@endsection
@section('scripts')
<script type="text/javascript">

  $('.colorpicker').colorpicker();


   $('#category').on('change', function(e){

    var cat_id = e.target.value;
     //alert(cat_id);
       //ajax

       $.get('/category-dropdown?cat+id=' + cat_id, function(data){
            
           //success data
           $('#subcategory').empty();

           $('#subcategory').append(' Please choose one');

           $.each(data, function(index, subcatObj){

               $('#subcategory').append('<option value="'+ subcatObj.id +'">'+ subcatObj.category +'</option>');
             

           });



       });


   });
</script>
@endsection
