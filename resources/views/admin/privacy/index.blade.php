@extends('layouts.admins.app')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="content-wrapper">
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header border-0 pb-0 mb-0">
                <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap bg-white p-2 border">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-inverse-primary py-0 px-2 mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            @if(request()->is('admin/privacy'))
                            <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                            @else
                            <li class="breadcrumb-item active" aria-current="page">Terms and Conditions</li>
                            @endif
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card card-body p-4">
                <form action="{{ route('admin.privacy.update', [$data->id]) }}" method="POST" name="f3" id="f3"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="content"><b>Content</b></label>
                            <textarea class="form-control" id="content" placeholder="Enter the Description" rows="10" name="content" style="height: 300px;">{{ $data->content }}</textarea>
                            <div class="validation-error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                    @if ($errors->any())
                      <div class="errorTxt">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>
    $(document).ready(function() {
    let content2;

    ClassicEditor
        .create(document.querySelector('#content'), {
            toolbar: [
                'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo', '|'
            ],
        })
        .then(editor => {
            content2 = editor;
        })
        .catch(error => {
            console.error(error);
        });


    $('#f3').validate({
            ignore: [],
            rules: {
        content: {
            minlength: 10,
            required:true,
        }
    },
    messages: {
        content: {
            minlength: "Please enter at least 10 characters",
            required : "Fill the field.",
        }
    },
    errorPlacement: function(error, element) {
        if (element.attr("name") == "title" || element.attr("name") == "content1" || element.attr("name") == "heading" || element.attr("name") == "content") {
            error.appendTo(element.siblings('.validation-error'));
        } else {
            error.insertAfter(element);
        }
    },
    submitHandler: function(form) {
        var formFilled = false;
        $(form).find('textarea').each(function() {
            if ($(this).val().trim() !== '') {
                formFilled = true;
                return false;
            }
        });
        if (formFilled) {
            form.submit();
        } else {
            // Display error message within .validation-error class
            $('.validation-error').html('Please above fields.');
        }
    }
});

});

</script>
<style type="text/css">
    .ck.ck-editor__editable_inline>:last-child {
        margin-bottom: var(--ck-spacing-large);
        height: 150px;
    }
    .validation-error {
        color: red;
        margin-top: 5px;
    }
</style>
@endsection
