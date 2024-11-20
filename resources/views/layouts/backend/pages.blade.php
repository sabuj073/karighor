@can('edit general info')
    <li>
        <a href="{{ route('backend.general_info.edit', 1) }}" class="has-arrow waves-effect">
            <i class="fa-solid fa-circle-info"></i>
            <span key="t-dashboards">General Info</span>
        </a>
        
    </li>
@endcan

{{-- @canany(['edit banner', 'create banner'])
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="fa-solid fa-table-list"></i>
            <span key="t-dashboards">Category</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            @can('edit banner')
                <li><a href="{{ route('backend.category.index') }}" key="t-tui-calendar">View</a></li>
            @endcan
            @can('create banner')
                <li><a href="{{ route('backend.category.create') }}" key="t-tui-calendar">Create</a></li>
            @endcan
        </ul>
    </li>
@endcan --}}

@canany(['edit banner', 'create banner'])
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="fa-solid fa-store"></i>
            <span key="t-dashboards">Product</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            @can('edit banner')
                <li><a href="{{ route('backend.product.index') }}" key="t-tui-calendar">View</a></li>
            @endcan
            @can('create banner')
                <li><a href="{{ route('backend.product.create') }}" key="t-tui-calendar">Create</a></li>
            @endcan
            {{-- <li>
                <a href="{{ route('backend.type.index') }}" class="has-arrow waves-effect">
                    <i class="fa-regular fa-circle"></i>
                    <span key="t-dashboards">Type</span>
                </a>

            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fa-regular fa-circle"></i>
                    <span key="t-dashboards">Specification</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    @can('edit banner')
                        <li><a href="{{ route('backend.specification.index') }}" key="t-tui-calendar">View</a></li>
                    @endcan
                    @can('create banner')
                        <li><a href="{{ route('backend.specification.create') }}" key="t-tui-calendar">Create</a></li>
                    @endcan
                </ul>

            </li> --}}
        </ul>
    </li>
@endcan
@canany(['edit banner', 'create banner'])
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="fa-solid fa-circle"></i>
            <span key="t-dashboards">Banner</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            @can('edit banner')
                <li><a href="{{ route('backend.banner.index') }}" key="t-tui-calendar">View</a></li>
            @endcan
            @can('create banner')
                <li><a href="{{ route('backend.banner.create') }}" key="t-tui-calendar">Create</a></li>
            @endcan
        </ul>
    </li>
@endcan
@can('edit about')
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="fa-solid fa-address-card"></i>
            <span key="t-dashboards">About</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            @can('edit why choose')
                <li><a href="{{ route('backend.aboutUs.edit') }}" key="t-tui-calendar">About Us</a></li>
            @endcan
            @can('edit why choose')
                <li><a href="{{ route('backend.mission.edit', 1) }}" key="t-tui-calendar">Mission</a></li>
            @endcan
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fa-regular fa-circle"></i>
                    <span key="t-dashboards">Team</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
            
                    <li><a href="{{ route('backend.team.index') }}" key="t-tui-calendar">View</a></li>
                    <li><a href="{{ route('backend.team.create') }}" key="t-tui-calendar">Create</a></li>
                    <li><a href="{{ route('backend.requirementType.index') }}" key="t-tui-calendar">Type</a></li>
            
                </ul>
            </li>
            
        </ul>



    </li>
@endcan
{{-- @can('edit general info')
    <li>
        <a href="{{ route('backend.achievement.edit', 1) }}" class="has-arrow waves-effect">
            <img src="{{ asset('backend/images/icon/info.png') }}" class="property_icon" alt="">
            <span key="t-dashboards">Achievement</span>
        </a>
    </li>
@endcan --}}
@can('edit partner')
    <li>
        <a href="{{ route('backend.partner.index') }}" class="has-arrow waves-effect">
            <i class="fa-solid fa-handshake"></i>
            <span key="t-dashboards">Concern</span>
        </a>
    </li>
@endcan
@can('edit partner')
    <li>
        <a href="{{ route('backend.client.index') }}" class="has-arrow waves-effect">
            <i class="fa-regular fa-circle"></i>
            <span key="t-dashboards">Glance</span>
        </a>
    </li>
@endcan

{{-- @canany(['edit why choose', 'create why choose'])
    <li>
        <a href="{{ route('backend.whyChoose.index') }}" class="has-arrow waves-effect">
            <i class="fa-regular fa-circle"></i>
            <span key="t-dashboards">Why Choose</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            @can('edit why choose')
                <li><a href="{{ route('backend.whyChoose.index') }}" key="t-tui-calendar">View</a></li>
            @endcan
            @can('create why choose')
                <li><a href="{{ route('backend.whyChoose.create') }}" key="t-full-calendar">Create</a></li>
            @endcan
        </ul>
    </li>
@endcan --}}
{{-- @canany(['edit concern', 'create concern'])
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="fa-regular fa-circle"></i>
            <span key="t-dashboards">Our Concern</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            @can('edit concern')
                <li><a href="{{ route('backend.concern.index') }}" key="t-tui-calendar">View All</a></li>
            @endcan
            @can('create concern')
                <li><a href="{{ route('backend.concern.create') }}" key="t-full-calendar">Create</a></li>
            @endcan
        </ul>
    </li>
@endcan --}}


@canany(['edit blog', 'create blog'])
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="fa-solid fa-blog"></i>
            <span key="t-dashboards">News</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            @can('edit blog')
                <li><a href="{{ route('backend.blog.index') }}" key="t-tui-calendar">View</a></li>
            @endcan
            @can('create blog')
                <li><a href="{{ route('backend.blog.create') }}" key="t-tui-calendar">Create</a></li>
            @endcan
        </ul>
    </li>
@endcan

{{-- <li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="fa-regular fa-circle"></i>
        <span key="t-dashboards">Career</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">

        <li><a href="{{ route('backend.career.index') }}" key="t-tui-calendar">View</a></li>
        <li><a href="{{ route('backend.career.create') }}" key="t-tui-calendar">Create</a></li>

    </ul>
</li> --}}
{{-- @can('edit mission')
    <li>
        <a href="{{ route('backend.mission.edit', 1) }}" class="has-arrow waves-effect">
            <i class="fa-regular fa-circle"></i>
            <span key="t-dashboards">Mission</span>
        </a>
    </li>
@endcan --}}
@canany(['edit photo', 'create photo'])
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="fa-solid fa-image"></i>
            <span key="t-dashboards">Photo Gallery</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            @can('edit photo')
                <li><a href="{{ route('backend.photoGallery.index') }}" key="t-tui-calendar">View All</a>
                </li>
            @endcan
            <li><a href="{{ route('backend.photoGallery.create') }}" key="t-tui-calendar">Create</a></li>
        </ul>
    </li>
@endcan
@canany(['edit photo', 'create photo'])
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="fa-solid fa-video"></i>
            <span key="t-dashboards">video Gallery</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            @can('edit photo')
                <li><a href="{{ route('backend.videoGallery.index') }}" key="t-tui-calendar">View All</a>
                </li>
            @endcan
            <li><a href="{{ route('backend.videoGallery.create') }}" key="t-tui-calendar">Create</a></li>
        </ul>
    </li>
@endcan
@canany(['edit faq', 'edit privacy policy', 'edit terms'])
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="fa-solid fa-shield"></i>
            <span key="t-dashboards">Policy</span>
        </a>


        <ul class="sub-menu" aria-expanded="false">
            @can('edit privacy policy')
                <li><a href="{{ route('backend.policy.edit', 1) }}" key="t-tui-calendar">Privacy Policy</a></li>
            @endcan
            @can('edit terms')
                <li><a href="{{ route('backend.policy.terms', 1) }}" key="t-tui-calendar">Terms</a></li>
            @endcan
            @can('edit faq', 'create faq')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa-regular fa-circle"></i>
                        <span key="t-dashboards">FAQ</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('edit faq')
                            <li><a href="{{ route('backend.faq.index') }}" key="t-tui-calendar">View All</a></li>
                        @endcan
                        @can('create faq')
                            <li><a href="{{ route('backend.faq.create') }}" key="t-tui-calendar">Create</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
        </ul>
    </li>
@endcan
@can('edit contact')
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
           <i class="fa-regular fa-circle"></i>
            <span key="t-dashboards">Contact Us</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            @can('edit contact')
                <li><a href="{{ route('backend.contactUs.index') }}" key="t-tui-calendar">View All</a></li>
            @endcan
            @can('create contact')
                <li><a href="{{ route('backend.contactUs.create') }}" key="t-full-calendar">Create</a></li>
            @endcan
        </ul>
    </li>
@endcan
@can('edit meta')
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="fa-regular fa-circle"></i>
            <span key="t-dashboards">Meta</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('backend.meta.index') }}" key="t-tui-calendar">Meta Info</a></li>
        </ul>
    </li>
@endcan
@can('edit section content')
    <li>
        <a href="{{ route('backend.sectionContent.index') }}" class="has-arrow waves-effect">
            <i class="fa-regular fa-circle"></i>
            <span key="t-dashboards">Section Content</span>
        </a>
    </li>
@endcan
{{-- @canany(['edit user', 'create user'])
    <li>
        <a href="{{ route('backend.bradcrumb.edit',1) }}" class="has-arrow waves-effect">
            <i class="fa-solid fa-image"></i>
            <span key="t-dashboards">BG Image</span>
        </a>
    </li>
@endcan --}}
{{-- @canany(['edit user', 'create user'])
    <li>
        <a href="{{ route('backend.leaf.index') }}" class="has-arrow waves-effect">
            <i class="fa-regular fa-circle"></i>
            <span key="t-dashboards">Leaf</span>
        </a>
        
    </li>
@endcan --}}
@can('delete subscriber')
    <li>
        <a href="{{ route('backend.subscriber.index') }}" class="has-arrow waves-effect">
            <i class="fa-solid fa-user"></i>
            <span key="t-dashboards">Subscriber</span>
        </a>
    </li>
@endcan
{{-- @canany(['edit user', 'create user'])
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
          <i class="fa-solid fa-user"></i>
            <span key="t-dashboards">User</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            @can('edit user')
                <li><a href="{{ route('backend.user.index') }}" key="t-tui-calendar">View All</a></li>
            @endcan
            @can('create user')
                <li><a href="{{ route('backend.user.create') }}" key="t-full-calendar">Create</a></li>
            @endcan
        </ul>
    </li>
@endcan
 --}}












{{-- @endrole --}}
