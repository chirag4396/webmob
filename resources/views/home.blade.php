@extends('layouts.master')

@section('content')
<!-- Main Content -->
<div class="container margin-top">
    <div class="row">
        <div class="col-lg-8 ">
            <h1 class="my-4">Blogs</h1>
            <hr>
            <div id = "blogBox"></div>            
        </div>
        <div class="col-md-4">
            <form id = "filterForm">
                <div class="card my-4">
                    <h5 class="card-header">Author</h5>
                    <div class="card-body">
                        <input class="form-control" placeholder="Search for author..." type="text" name = "author">
                    </div>
                </div>
                <div class="card my-4">
                    <h5 class="card-header">Date posted</h5>
                    <div class="card-body">
                        <input class="form-control" type="date" name = "posted">                            
                    </div>
                </div>
                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($categories as $cat)                            
                            <label class="btn btn-secondary btn-margin" for = "{{ $cat->title }}">
                                <input type="checkbox" value = "{{ $cat->id }}" name = "categories[]" id = "{{ $cat->title }}"> {{ $cat->title }} <span class="badge badge-light">{{ $cat->blogs()->count() }}</span>
                            </label>
                            @empty
                            @endforelse                        
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('footer')
<script type="text/javascript">
    function getBlogs() {
        $('#blogBox').html('<h1>Loading...</h1>');
        var fd = new FormData($('#filterForm')[0]);
        $.ajax({
            url : '{{ route('get-blogs') }}',
            type : 'post',
            data : fd,
            processData : false,
            contentType : false,
            success : function(data){
                $('#blogBox').html(data);
            }
        });
    }
    
    getBlogs();
    $.each($('#filterForm'),function(k,v){
        $(this).find('input[type="checkbox"]').on({
            'change' : function(){            
                getBlogs();
            } 
        });
        $(this).find('input[type="text"]').on({
            'keyup' : function(){            
                getBlogs();
            } 
        });
        $(this).find('input[type="date"]').on({
            'change' : function(){            
                getBlogs();
            } 
        });
    });
    // $('input[type="checkbox"]').on({
    //     'change' : function(){            
    //         getBlogs();
    //     }
    // });
    // $('input[type="checkbox"]').on({
    //     'change click' : function(){            
    //         getBlogs();
    //     }
    // });
</script>
@endpush