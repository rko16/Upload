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
                            <li class="breadcrumb-item active" aria-current="page">Update Service</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card card-body p-4">
                <form action="{{ route('admin.service.update',[$servicedata->id]) }}" method="POST" name="f3" id="f3"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-2 p-2">
                      <label for="title">Service image</label>
                      <input type="file" name="image" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="title">Title</label>
                            <textarea class="form-control" placeholder="Enter the Description" rows="10" style="height: 300px;" name="title" id="title">{{ $servicedata->title }}</textarea>
                            <div class="validation-error"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="content1">Title content</label>
                            <textarea class="form-control" id="content1" placeholder="Enter the Description" rows="10" name="content1" style="height: 300px;">{{ $servicedata->content1 }}</textarea>
                            <div class="validation-error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="heading">Heading</label>
                            <textarea class="form-control" placeholder="Enter the Description" rows="10" style="height: 300px;" name="heading" id="heading">{{ $servicedata->heading }}</textarea>
                            <div class="validation-error"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="headingcontent">Heading content</label>
                            <textarea class="form-control" id="headingcontent" placeholder="Enter the Description" rows="10" name="headingcontent" style="height: 300px;">{{ $servicedata->headingcontent }}</textarea>
                            <div class="validation-error"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{ route('admin.service.index') }}" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <img src="{{ asset($servicedata->image) }}">
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        let cktextEditor, content1, heading, content2;

        ClassicEditor
            .create(document.querySelector('#title'), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|','htmlEmbed'
                ]
            })
            .then(editor => {
                cktextEditor = editor;
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#content1'), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|'
                ]
            })
            .then(editor => {
                content1 = editor;
            })
            .catch(error => {
                console.error(error);
            });


            ClassicEditor
            .create(document.querySelector('#heading'), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|'
                ]
            })
            .then(editor => {
                heading = editor;
            })
            .catch(error => {
                console.error(error);
            });

            ClassicEditor
            .create(document.querySelector('#headingcontent'), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|'
                ]
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
            minlength: 10
        },
        content1: {
            minlength: 10
        },
        heading: {
            minlength: 10
        },
        headingcontent: {
            minlength: 10
        }
    },
    messages: {
        title: {
            minlength: "Please enter at least 10 characters"
        },
        content1: {
            minlength: "Please enter at least 10 characters"
        },
        heading: {
            minlength: "Please enter at least 10 characters"
        },
        headingcontent: {
            minlength: "Please enter at least 10 characters"
        }
    },
    errorPlacement: function(error, element) {
        if (element.attr("name") == "title" || element.attr("name") == "content1" || element.attr("name") == "heading" || element.attr("name") == "headingcontent") {
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
            $('.validation-error').html('Please fill at least one field.');
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
