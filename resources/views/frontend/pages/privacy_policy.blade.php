@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
  
  <section class="page_sec_pad_50 page_res_mar pt_25_res">
    <div class="container">
      <div class="row">
        <div class="bg-white box_shadow p-4 rad_5">
          <h3 class="text-center">Our Privacy Policy Here</h3>
          <div class="mt-3">
            {!! $privacy->privacy !!}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
