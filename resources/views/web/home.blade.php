@extends('web.layouts.template')
@section('content')
    <main id="main" class="">
        <div id="content" class="content-area page-wrapper" role="main">
            <div class="row row-main">
                <div class="large-12 col">
                    <div class="col-inner">
                        <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1101838167">
                            <a class="" href="https://taikhoanao.info/" target="_blank"
                                rel="noopener noreferrer">
                                <div class="img-inner dark">
                                    <img width="2560" height="1203"
                                        src="data:image/svg+xml,%3Csvg%20viewBox%3D%220%200%202560%201203%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3C%2Fsvg%3E"
                                        data-src="{{ \App\Helper\Common::getImage(\App\Helper\Seo::getSetting('banner'), '','setting') }}"
                                        class="lazy-load attachment-original size-original" alt="" loading="lazy" srcset=""
                                    />
                                </div>
                            </a>
                            <style>
                                #image_1101838167 {
                                    width: 100%;
                                }

                            </style>
                        </div>
                        <div id="gap-1026477811" class="gap-element clearfix" style="display:block; height:auto;">
                            <style>
                                #gap-1026477811 {
                                    padding-top: 30px;
                                }

                            </style>
                        </div>
                        <div id="text-1588104833" class="text">
                            <style>
                                #text-1588104833 {
                                    text-align: center;
                                }

                            </style>
                        </div>
                        <div class="row" id="row-541798396">
                            @if ($category)
                                @foreach ($category as $item)
                                    <div id="col-445015637" class="col  small-12 large-12">
                                        <div class="col-inner">
                                            <h3 class="nz-div-6">
                                                <span class="title-holder">{{ $item->name }}</span>
                                            </h3>
                                            <div
                                                class="row  equalize-box large-columns-4 medium-columns-3 small-columns-2 row-xsmall">
                                                <?php $parent_product = $item->parent_product; ?>
                                                @if (count($parent_product) > 0)
                                                    @foreach ($parent_product as $value)
                                                        @include('web.products.productParent.index',['value'=>$value])
                                                    @endforeach
                                                @endif
                                                <?php $products = $item->products; ?>
                                                @if (isset($products) > 0)
                                                    @foreach ($products as $value)
                                                        @if ($value->parent_product_id == null)
                                                            @include('web.products.productChild',['value'=>$value])
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div id="col-2106513040" class="col small-12 large-12">
                                <div class="col-inner text-center">
                                    <h3 class="nz-div-6">
                                        <span class="title-holder">Tin tức</span>
                                    </h3>
                                    @if (isset($articles))
                                        <div class="row large-columns-4 medium-columns-2 small-columns-2">
                                            @foreach ($articles as $item)
                                                <div class="col post-item">
                                                    <div class="col-inner">
                                                        <a href="{{ route('new.detail', ['slug' => $item->slug]) }}"
                                                            class="plain">
                                                            <div
                                                                class="box box-normal box-text-bottom box-blog-post has-hover">
                                                                <div class="box-image">
                                                                    <div class="image-cover" style="padding-top:56.25%;">
                                                                        <img width="495" height="330"
                                                                            src="{{ \App\Helper\Common::getImage($item->image, 'thumb', 'articles') }}"
                                                                            data-src="{{ \App\Helper\Common::getImage($item->image, 'thumb', 'articles') }}"
                                                                            class="attachment-medium size-medium wp-post-image lazy-load-active"
                                                                            alt="" loading="lazy" srcset="" data-srcset=""
                                                                            sizes="(max-width: 495px) 100vw, 495px" />
                                                                    </div>
                                                                </div>
                                                                <div class="box-text text-center">
                                                                    <div class="box-text-inner blog-post-inner">
                                                                        <h5 class="post-title is-large">{{ $item->title }}
                                                                        </h5>
                                                                        <div class="is-divider"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <a data-animate="bounceInUp" rel="noopener noreferrer" href="/tin-tuc"
                                            target="_blank" class="button primary is-shade reveal-icon"
                                            data-animated="true">
                                            <i class="icon-expand"></i> <span>Xem thêm bài viết</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
