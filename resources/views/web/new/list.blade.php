@extends('web.layouts.template')
@section('content')
    <main id="main" class="">
        <div id="content" class="blog-wrapper blog-archive page-wrapper">
            <div class="row align-center">
                <div class="large-10 col">
                    <div class="row large-columns-3 medium-columns- small-columns-1">
                        @if (isset($articles))
                            @foreach ($articles as $item)
                                <div class="col post-item">
                                    <div class="col-inner">
                                        <a href="{{ route('new.detail', ['slug' => $item->slug]) }}" class="plain">
                                            <div class="box box-text-bottom box-blog-post has-hover">
                                                <div class="box-image">
                                                    <div class="image-cover" style="padding-top:56%;">
                                                        <img width="495" height="330"
                                                            src="{{ \App\Helper\Common::getImage($item->image, 'thumb', 'articles') }}"
                                                            data-src="{{ \App\Helper\Common::getImage($item->image, 'thumb', 'articles') }}"
                                                            class="lazy-load attachment-medium size-medium wp-post-image"
                                                            alt="" loading="lazy" srcset=""
                                                            sizes="(max-width: 495px) 100vw, 495px" />
                                                    </div>
                                                </div>
                                                <div class="box-text text-left">
                                                    <div class="box-text-inner blog-post-inner">
                                                        <h5 class="post-title is-large ">{{ $item->title }}</h5>
                                                        <div class="is-divider"></div>
                                                        <p class="from_the_blog_excerpt ">{!! mb_substr($item->content, 0, 100, 'UTF-8').(strlen($item->content) > 100 ? '...' : '') !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
