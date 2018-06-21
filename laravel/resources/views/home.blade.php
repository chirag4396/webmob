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
            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        @forelse ($categories as $cat)                            
                        <button type="button"  onclick="getBlogs('{{ $cat->id }}');" class="btn btn-secondary btn-margin">{{ $cat->title }} <span class="badge badge-light">{{ $cat->blogs()->count() }}</span></button>
                        @empty
                        @endforelse                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('header')
<script type="text/javascript">
    function getBlogs(cat) {
        $('#blogBox').html('<h1>Loading...</h1>');
        $.ajax({
            url : '{{ route('get-blogs') }}',
            type : 'post',
            data : {cat : cat},
            success : function(data){
                $('#blogBox').html(data);
            }
        });
    }
    getBlogs();
</script>
@endpush