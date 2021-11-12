@extends('web.layouts.template')
@section('content')
    <main id="main" class="">
        <div id="content" class="blog-wrapper blog-single page-wrapper">
            <div class="row row-large ">
                <div class="large-9 col">
                    <article id="post-24390"
                        class="post-24390 post type-post status-publish format-standard has-post-thumbnail hentry category-bai-viet tag-tang-like tag-tang-luot-thich tag-tang-tuong-tac">
                        <div class="article-inner ">
                            <header class="entry-header">
                                <div class="entry-header-text entry-header-text-top text-left">
                                    <h1 class="entry-title">{{ $articles->title }}</h1>
                                    <div class="entry-divider is-divider small"></div>
                                </div>
                            </header>
                            <div class="entry-content single-page">
                                {!! $articles->content !!}
                            </div>
                        </div>
                        <div class="post-views post-34001 entry-meta">
                            <span class="post-views-icon dashicons dashicons-chart-bar"></span>
                            <span class="post-views-label">Views:</span>
                            <span class="post-views-count">{{ $articles->view }}</span>
                        </div>
                    </article>
                    <div id="comments" class="comments-area">
                    </div>
                </div>
                <div class="post-sidebar large-3 col">
                    <div id="secondary" class="widget-area " role="complementary">
                        <style>
                            .rpwe-block ul {
                                background: white;
                                list-style: none !important;
                                margin-left: 0 !important;
                                padding-left: 0 !important;
                                border-radius: 0 10px 10px 10px;
                            }

                            .rpwe-block li {
                                text-align: left;
                                border-bottom: 1px solid #eee;
                                margin-bottom: 0px;
                                padding: 5px 10px;
                                list-style-type: none;
                            }

                            .rpwe-block a {
                                text-decoration: none;
                                font-size: 16px;
                                line-height: 20px;
                                letter-spacing: -0.5px;
                            }

                            .rpwe-block h3 {
                                background: none !important;
                                clear: none;
                                margin-bottom: 0 !important;
                                margin-top: 0 !important;
                                font-weight: 400;
                                font-size: 12px !important;
                                line-height: 1.5em;
                            }

                            .rpwe-thumb {
                                border-radius: 3px;
                                box-shadow: none !important;
                                margin: 2px 10px 2px 0;
                            }

                            .rpwe-summary {
                                font-size: 20px;
                                color: red;
                            }

                            .rpwe-summary:before {
                                font-family: FontAwesome;
                                content: "\f095 ";
                                padding-right: 5px;
                            }

                            .rpwe-time {
                                color: #909090;
                                font-size: 11px;
                            }

                            .rpwe-comment {
                                color: #bbb;
                                font-size: 11px;
                                padding-left: 5px;
                            }

                            .rpwe-alignleft {
                                display: inline;
                                float: left;
                            }

                            .rpwe-alignright {
                                display: inline;
                                float: right;
                            }

                            .rpwe-aligncenter {
                                display: block;
                                margin-left: auto;
                                margin-right: auto;
                            }

                            .rpwe-clearfix:before,
                            .rpwe-clearfix:after {
                                content: "";
                                display: table !important;
                            }

                            .rpwe-clearfix:after {
                                clear: both;
                            }

                            .rpwe-clearfix {
                                zoom: 1;
                            }

                        </style>
                        <aside id="rpwe_widget-2" class="widget rpwe_widget recent-posts-extended">
                            <span class="widget-title "><span>Bài viết mới</span></span>
                            <div class="is-divider small"></div>
                            <div class="rpwe-block ">
                                <ul class="rpwe-ul">
                                    @if (isset($listArrticles))
                                        @foreach ($listArrticles as $key => $item)
                                            @if ($key < 8)
                                                <li class="rpwe-li rpwe-clearfix">
                                                    <a class="rpwe-img"
                                                        href="{{ route('new.detail', ['slug' => $item->slug]) }}"
                                                        rel="bookmark">
                                                        <img class="rpwe-alignleft rpwe-thumb"
                                                            src="{{ \App\Helper\Common::getImage($item->image, 'thumb', 'articles') }}"
                                                            alt="{{ $item->name }}">
                                                    </a>
                                                    <h3 class="rpwe-title">
                                                        <a href="{{ route('new.detail', ['slug' => $item->slug]) }}"
                                                            title="Liên kết đến Dịch Vụ Seeding Trong Digital Marketing &#8211; Kiến thức và kinh nghiệm"
                                                            rel="bookmark">
                                                            {{ $item->title }}
                                                        </a>
                                                    </h3>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            <div class="nz-bvlq-main">
                <div class="nz-bvlq">
                    <div class="row large-columns-4 medium-columns-2 small-columns-1 row-small">
                        <div class="fb-nz">
                            <div class="fb-like"
                                data-href="https://dichvuquangcao.info/tang-like-facebook-keo-tuong-tac-cho-doanh-nghiep/"
                                data-width="100" data-layout="box_count" data-action="like" data-size="small"></div>
                        </div>
                        <div class="td-bvlq">
                            <h3>Bài viết liên quan</h3>
                        </div>
                        @if (isset($listArrticles))
                            @foreach ($listArrticles as $item)
                                <div class="nz-bvlq-content col post-item">
                                    <div class="col-inner">
                                        <a href="{{ route('new.detail', ['slug' => $item->slug]) }}"
                                            title="{{ $item->title }}">
                                            <div class="nz-bvlq-img"><img width="1020" height="679"
                                                    src="{{ \App\Helper\Common::getImage($item->image, 'thumb', 'articles') }}"
                                                    data-src="{{ \App\Helper\Common::getImage($item->image, 'thumb', 'articles') }}"
                                                    class="lazy-load attachment-large size-large wp-post-image"
                                                    alt="{{ $item->name }}" loading="lazy"
                                                    title="Thiết kế Website chuyên nghiệp &#8211; Đảm bảo uy tín, chất lượng của doanh nghiệp"
                                                    srcset="" data-srcset="" sizes="(max-width: 1020px) 100vw, 1020px" />
                                            </div>
                                            <div class="nz-bvlq-td">{{ $item->title }}</div>
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
