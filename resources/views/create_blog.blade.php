@extends('layouts.master')
@section('title')
| Create Blog
@endsection
@push('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/quill.snow.css') }}">
<link href="{{ asset('css/select2.css') }}" rel="stylesheet" />
<style type="text/css">
#description {
  height: 200px;
}
</style>
@endpush
@section('content')
<div class="container margin-top">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <h1 class="text-center">Hi {{ Auth::user()->name }}, start Creating exciting Blog</h1>
      <form name="sentMessage" id="blogForm">
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Title</label>
            <input type="text" class="form-control" placeholder="Title" name="title" required>            
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <select class="form-control categories" name="categories[]" multiple="multiple">
              <option value = "-1">--select--</option>
              @forelse ($categories as $cat)
              <option value = "{{ $cat->id }}">{{ $cat->title }}</option>
              @empty
              @endforelse                 
            </select>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Description</label>
            <div id = "description" class="form-control"></div>
          </div>
        </div>
        <br>
        <div class="form-group text-center">
          <button type="submit" class="btn btn-primary">Post</button>
        </div>
        <div class="alert hidden" id = "formAlert"></div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('footer')
<script src="{{ asset('js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/quill.min.js') }}"></script>
<script>  
  var options = {      
    placeholder: 'Blog description...',    
    theme: 'snow'
  };
  var description = new Quill('#description', options);

  function multiSelect(id, link) {
    var self = id;
    $(id).select2({
      tags:true,
      placeholder: 'Select Multiple Categories (hit enter for adding new)',
      allowClear: true,
      createTag: function (params) {
        var term = $.trim(params.term);

        if (term === '') {
          return null;
        }

        return {
          id: term,
          text: term,
          newTag: true
        }
      }
    });
    $(id).on('select2:select', function (e) {
      var data = e.params.data;
      var old = data.id;
      // console.log(old);
      if(data.newTag){
        $.post(geturl(link), {title: data.text}, function(data) {
            // console.log(data);
            $(self).find("option[value='" + old + "']").remove();
            var newOption = new Option(data.d.title, data.d.id, true, true);
            $(self).append(newOption).trigger('change');        
          });
      }
    });
  }
  function geturl(name) {
    var link = '{{ route('index') }}/'+name;
    return link;
  }

  multiSelect('.categories', 'category');

  $('#blogForm').on({
    'submit' : function(e){
      e.preventDefault();
      $('#formAlert').removeClass('hidden').addClass('alert-warning').html('Creating your Awesome Blog, please wait!!');
      var fd = new FormData(this);
      fd.append('text', document.querySelector(".ql-editor").innerHTML);
      $.ajax({
        url : '{{ route('blog.store') }}',
        type : 'post',
        data : fd,
        processData : false,
        contentType : false,
        success : function(data){
          if(data.msg == 'success'){
            $('#formAlert').removeClass('alert-warning').addClass('alert-success').html('Blog created successfully, please take a look <a href = "'+data.location+'" class = "btn btn-secondary">here</a>');            
          }
        }
      });
    }
  });
</script>
@endpush