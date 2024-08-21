@extends('layouts.admins.app')
@section('content')
<div class="content-wrapper">
  <div class="row page-title-header">
    <div class="col-12">
    <div class="page-header border-0 pb-0 mb-0">
      <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap bg-white p-2 border">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-inverse-primary py-0 px-2 mb-0">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('admin.area.index') }}">Solar</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Add Solar</li>
            </ol>
          </nav>
      </div>
    </div>
  </div>
  </div>
  <div class="row mb-4">
    <div class="col-lg-12">
      <div class="card card-body p-4">
        <form action="{{ route('admin.solar.update', [$solars->id]) }}" method="POST" enctype="multipart/form-data" id="form">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-sm-4 mb-3">
              <label class="font-size-13"><strong>Product Name</strong> <sub class="text-danger font-size-16">*</sub></label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter city name" value="{{ $solars->name }}">
              <div class="errorTxt"></div>
            </div>
            <div class="col-sm-4 mb-3">
              <label class="font-size-13"><strong>Size(sqr-ft.)</strong> <sub class="text-danger font-size-16">*</sub></label>
              <input type="number" class="form-control" value="{{ $solars->sizeinft }}" name="sizeinft" placeholder="Enter size in ft-sqr">
              <div class="errorTxt"></div>
            </div>
            <div class="col-sm-4 mb-3">
              <label class="font-size-13"><strong>Size(sqr-mtr.)</strong> <sub class="text-danger font-size-16">*</sub></label>
              <input type="number" class="form-control" value="{{ $solars->sizeinmtr }}" name="sizeinmtr" placeholder="Enter size in mtr-sqr">
              <div class="errorTxt"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4 mb-3">
              <label class="font-size-13"><strong>Power(kw)</strong> <sub class="text-danger font-size-16">*</sub></label>
              <input type="number" class="form-control" name="kw" value="{{ $solars->kw }}" placeholder="Enter power(kw)">
              <div class="errorTxt"></div>
            </div>
            <div class="col-sm-4 mb-3">
              <label class="font-size-13"><strong>Cost</strong> <sub class="text-danger font-size-16">*</sub></label>
              <input type="number" class="form-control" name="cost" placeholder="Enter cost of the product" value="{{ $solars->cost }}">
              <div class="errorTxt"></div>
            </div>
            <div class="col-sm-4 mb-3">
              <label class="font-size-13"><strong>Description</strong> <sub class="text-danger font-size-16">*</sub></label>
              <input type="text" class="form-control" name="description" placeholder="Enter description about product" value="{{ $solars->description }}">
              <div class="errorTxt"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 mb-3">
              <label class="font-size-13"><strong>Upload image</strong> <sub class="text-danger font-size-16">*</sub></label>
              <div class="field_wrapper m-2">
                <div style="margin-bottom: 5px;">
                  <input type="file" name="image[]" value=""/>
                  <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row my-3 mt-4">
            <div class="col-sm-12 text-center">
              <input type="submit" class="btn btn-primary py-2 px-3 ml-2 px-2 py-1 d-inline-block" value="Submit"/>
              <a href="{{ route('admin.solar.index') }}">
                <button type="button" class="btn btn-success py-2 px-3 ml-2">
                  <span class="px-2 py-1 d-inline-block">Back</span>
                </button>
              </a>
            </div>
          </div>
        </form>
        <label class="font-size-13"><strong>Update image (Delete)</strong> <sub class="text-danger font-size-16">*</sub></label>
        <div class="row">
            @forelse($solars->solarimg as $c)
              <table>
                <tr>
                  <td>
                    <img src="{{ asset($c->url) }}" style="height: 100px; width: 150px; border: solid black 1px; margin: 15px;">    
                  </td>
                  <td>
                    <form method="POST" action="{{ route('admin.solar.imgdlt', [$c->id]) }}" style=" display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash font-size-18"></i></button>
                    </form>
                  </td>
                </tr>
              </table>
            @empty
                <p class="text-danger ml-3"><b>Please upload images.</b></p>
            @endforelse
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
<script type="text/javascript">
  var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="margin-bottom: 5px;"><input type="file" name="image[]" value=""/><a href="javascript:void(0);" class="remove_button"> Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    // Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increase field counter
            $(wrapper).append(fieldHTML); //Add field html
        }else{
            alert('A maximum of '+maxField+' fields are allowed to be added. ');
        }
    });
    
    // Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrease field counter
    });
</script>
@endsection