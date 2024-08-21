@extends('layouts.admins.app')
@section('content')
<div class="content-wrapper">
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header border-0 pb-0 mb-0">
                <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap bg-white p-2 border">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-inverse-primary py-0 px-2 mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.service.index') }}">Service</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Service</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card card-body p-4">
                <form action="{{ route('admin.service.store') }}" method="POST" name="f3" id="f3"  enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="title"><b>Service image</b></label>
                            <input type="file" name="image" class="form-control" required>
                            <div class="validation-error"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="title"><b>Title</b></label>
                            <!-- <textarea class="form-control" placeholder="Enter the Description" rows="10" style="height: 300px;" name="title" id="title">{{ old('body') }}</textarea> -->
                            <input type="text" name="title" placeholder="Enter the Description" class="form-control" required>
                            <div class="validation-error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="content1"><b>Title content</b></label>
                            <!-- <textarea class="form-control" id="content1" placeholder="Enter the Description" rows="10" name="content1" style="height: 300px;">{{ old('body') }}</textarea> -->
                            <input type="text" name="content1" class="form-control" placeholder="Enter the Description" required>
                            <div class="validation-error"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="heading"><b>Heading</b></label>
                            <!-- <textarea class="form-control" placeholder="Enter the Description" rows="10" style="height: 300px;" name="heading" id="heading">{{ old('body') }}</textarea> -->
                            <input type="text" placeholder="Enter the Description" name="heading" class="form-control" required>
                            <div class="validation-error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="headingcontent"><b>Heading content</b></label>
                            <textarea class="form-control" id="headingcontent" placeholder="Enter the Description" rows="10" name="headingcontent" style="height: 300px;">{{ old('body') }}</textarea>
                            <div class="validation-error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{ route('admin.service.index') }}" class="btn btn-danger">Back</a>
                        </div>
                    </div>
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
        .create(document.querySelector('#headingcontent'), {
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
                title: {
            maxlength: 50,
            minlength:2,
            required:true,
        },
              image: {
            required:true,
        },
        content1: {
            maxlength: 200,
            minlength: 5,
            required:true,
        },
        heading: {
            maxlength: 200,
            minlength: 5,
            required:true,
        },
        headingcontent: {
            maxlength: 500,
            minlength: 10,
            required:true,
        }
    },
    messages: {
        title: {
            maxlength: "Characters should not be more than 50 words",
            minlength: "Please enter at least 2 characters",
            required : "Fill the field.",
        },
        image: {
            required : "Fill image.",
        },
        content1: {
            maxlength: "Characters should not be more than 200 words",
            minlength: "Please enter at least 5 characters",
            required : "Fill the field.",
        },
        heading: {
            maxlength: "Characters should not be more than 200 words",
            minlength: "Please enter at least 5 characters",
            required : "Fill the field.",
        },
        headingcontent: {
            maxlength: "Characters should not be more than 500 words",
            minlength: "Please enter at least 10 characters",
            required : "Fill the field.",
        }
    },
    errorPlacement: function(error, element) {
        if (element.attr("name") == "image" || element.attr("name") == "title" || element.attr("name") == "content1" || element.attr("name") == "heading" || element.attr("name") == "headingcontent") {
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
