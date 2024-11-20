@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    <section class="cat-section page_sec_pad_50 pt_25_res bg-gray">
        <div class="container">
            <h2 class="section-title ls-n-10 pb-3 m-b-4 text-center">All Categories</h2>
            <div class="row">
                @foreach ($categories as $category)
                 <div class="col-lg-2 col-sm-4 col-4 mb-2">
                     <div class="product-category">
                         <a href="{{ route('category_product', [$category->name]) }}">
                             <div class="category-content">
                                 <img src="{{ env('Base_Url') }}/uploads/cms/{{ $category->image }}" alt="{{ $category->name }}">
                                 <h3>{{ $category->name }}</h3>
                             </div>
                         </a>
                     </div>
                 </div>
             @endforeach

            </div>
        </div>
    </section>
@endsection
