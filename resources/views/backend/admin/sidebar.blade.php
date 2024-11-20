<div class="col-lg-3 col-md-4 col-sm-12 col-12">
  <div class="user_info_box_shadow">
      <div class="img_body">
          <img src="{{ url('storage/user/'.auth()->user()->photo) }}" class="card-img-top rounded-circle"
              alt="...">
          <div class="card-body text-center">
              <div class="mt-2">{{ auth()->user()->name }}</div>
              <div class="user_email">{{ auth()->user()->email }}</div>
          </div>
          <hr>

      </div>
      <div class="user_info">
          <div class="user_info_a">
            <a href="{{ route('admin') }}">
              <div class="user_dashboard">
                  <i class="fa-solid fa-house"></i>Dashboard
              </div>
          </a>
          </div>
          <div class="user_info_a">
            <a href="{{ route('backend.user.profile') }}">
              <div class="user_dashboard">
                  <i class="fa-solid fa-user"></i> Manage Profile
              </div>
          </a>
          </div>
      </div>
  </div>
</div>