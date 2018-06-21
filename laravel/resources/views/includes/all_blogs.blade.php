@forelse ($blogs as $blog)
<div class="post-preview">
    <a href="post.html">
        <h2 class="post-title">
            {{ $blog->blog_title }}
        </h2>
        <h3 class="post-subtitle">
            {{ str_limit($blog->blog_text, 100) }}
        </h3>
    </a>
    <p class="post-meta">Posted by <a href="javascript:void(0)">{{ $blog->user->name }}</a> on {{ $blog->blog_created_at->toFormattedDateString() }}</p>
</div>
<hr>
@empty
<div class="text-center">No Blog Found</div>    
@endforelse