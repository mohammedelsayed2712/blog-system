@extends('main-layouts.master')
@section('title', 'My Blog | Home')
@section('content')
<div class="colorlib-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-8 posts-col">
                @foreach ($posts as $post)
                <div class="block-21 d-flex animate-box post">
                    <a href="{{ route('posts.show', $post) }}" class="blog-img" {{--
                        style="background-image: url({{ asset('storage/'.  $post->images->path) }});"></a>
                    --}}
                    style="background-image: url(assets/images/blog-1.jpg);"></a>
                    <div class="text">
                        <h3 class="heading"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
                        <p class="excerpt">{{ $post->excerpt }}</p>
                        <div class="meta">
                            <div><a class="date" href="#"><span class="icon-calendar"></span> {{
                                    $post->created_at->diffForHumans()
                                    }}</a></div>
                            <div><a href="#"><span class="icon-user2"></span> {{ $post->author->name }}</a></div>
                            <div><a class="comments_count" href="#"><span class="icon-chat"></span> {{
                                    $post->comments_count }}</a></div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $posts->links() }}
            </div>

            <!-- SIDEBAR: start -->
            <div class="col-md-4 animate-box">
                <div class="sidebar">
                    <div class="side">
                        <h3 class="sidebar-heading">Categories</h3>
                        <div class="block-24">
                            <ul>
                                @foreach ($categories as $category)
                                <li><a href="#">{{ $category->name }} <span>{{ $category->posts_count }}</span></a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="side">
                        <h3 class="sidebar-heading">Recent Blog</h3>
                        @foreach ($recent_posts as $recent_post)
                        <div class="f-blog">
                            <a href="{{ route('posts.show', $recent_post) }}" class="blog-img"
                                style="background-image: url(assets/images/blog-1.jpg);">
                                {{-- style="background-image: url({{ asset('storage/' .
                                $recent_post->images->first()->path)
                                }});"> --}}
                            </a>
                            <div class="desc">
                                <p class="admin"><span>{{ $recent_post->created_at->diffForHumans() }}</span></p>
                                <h2><a href="blog.html">
                                        {{ \Str::limit($recent_post->title, 20) }}
                                    </a></h2>
                                <p>{{ $recent_post->excerpt }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="side">
                        <h3 class="sidbar-heading">Tags</h3>
                        <div class="block-26">
                            <ul>
                                @foreach ($tags as $tag)
                                <li><a href="#">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection