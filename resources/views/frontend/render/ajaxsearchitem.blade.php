<div class="search_tag">Product</div>
@foreach ($table1Query as $item)
  @if (isset($item->name))
    <a href="{{ route('product_details', $item->slug) }}">
      <img
        src="{{  $item->thumbnail }}" 
        alt="">
      <li>{{ $item->name }}</li>
    </a>
  @endif
@endforeach
<div class="search_tag">News</div>
@foreach ($table2Query as $item)
  @if (isset($item->title))
    <a href="{{ route('blog_details', $item->slug) }}">
      <img
      src="{{  $item->photo }}" 
      alt="">
        {{ $item->title }}</li>
    </a>
  @endif
@endforeach

