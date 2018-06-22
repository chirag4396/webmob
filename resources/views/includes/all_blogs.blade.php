@forelse ($blogs as $blog)
<div class="post-preview">
    <a href="{{ route('blog.show',['id' => $blog->id]) }}">
        <h2 class="post-title">
            {{ str_limit($blog->blog_title, 100) }}
        </h2>
        <h3 class="post-subtitle">
            {!! str_limit($blog->blog_text, 100) !!}
        </h3>
    </a>
    <p class="post-meta">Posted by <a href="javascript:void(0)">{{ $blog->user->name }}</a> on {{ \Carbon\Carbon::parse($blog->blog_posted_at)->toFormattedDateString() }}</p>
    
    <p>{{ implode(', ', $blog->categories()->get()->pluck('title')->toArray()) }}</p>

</div>
<hr>
@empty
<div class="text-center">No Blog Found</div>    
@endforelse