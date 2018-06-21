@extends('layouts.master')
@push('header')
<link href="{{ asset('css/select2.css') }}" rel="stylesheet" />
@endpush
@section('content')
<div class="container margin-top">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <h1 class="text-center">Hi {{ Auth::user()->name }}, start Creating exciting Blog</h1>
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Title</label>
            <input type="text" class="form-control" placeholder="Title" id="name" required>            
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
            <textarea rows="5" class="form-control" placeholder="Description" required></textarea>
          </div>
        </div>
        <br>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('footer')
<script src="{{ asset('js/select2.min.js') }}"></script>
<script type="text/javascript">  
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
    var link = '{{ route('home') }}/'+name;
    return link;
  }

  multiSelect('.categories', 'category');
</script>
@endpush