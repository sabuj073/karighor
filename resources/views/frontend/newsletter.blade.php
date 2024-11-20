<!--=====cta start=======-->
@php
  $n_leaf = App\Models\Leaf::where('status','publish')->where('section_name','newsletter')->get();
  $bg_img = App\Models\Bradcrumb::first();
@endphp
<div class="cta1 _relative" style="background-image: url('{{ $bg_img->team_photo }}');">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 text-center m-auto">
        <div class="hadding1-w text-center">
          <h1 class="font-f-3">
            {{ @$newsletter_sec_content->header }}
          </h1>
          <div class="space16"></div>
          <p class="font-f-3">
            {{ @$newsletter_sec_content->sub_header }}
          </p>
          <form action="{{ route('backend.subscriber.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div class="d-flex">
              <input type="email" name="email" class="form-control subscribe_input" placeholder="Enter Your Email" required>
              <button type="submit" class="subscribe_btn theme-btn18">Subscribe Now</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <img class="cta1-shape1 aniamtion-key-2" src="{{ $n_leaf[0]->photo }}" width="100" alt="{{ $n_leaf[0]->alt_text }}">
  <img class="cta1-shape2 aniamtion-key-2" src="{{ $n_leaf[1]->photo }}" width="100" alt="{{ $n_leaf[1]->alt_text }}">
</div>

<!--=====cta end=======-->
