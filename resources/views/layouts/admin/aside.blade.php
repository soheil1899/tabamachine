<ul class="sidebar-nav mb-5">
    <li class="sidebar-brand">
        <a href="#" id="panel-title">
            پنل مدیریت
            <strong>SO</strong><strong>MO</strong>
        </a>
    </li>


    <li class="sidebar-dropdown">
        <a href="{{route('admin')}}">
            <i class="fa fa-tachometer-alt ml-1"></i>
            <span>داشبورد</span>
        </a>
    </li>




    @if(Gate::check('edit_user') || Gate::check('add_user') || Gate::check('delete_user'))
        <li class="sidebar-dropdown">
            <a href="{{route('user.list')}}">
                <i class="fas fa-user-shield ml-1"></i>
                <span>کاربران و دسترسی ها</span>
            </a>
        </li>
    @endif


    @if(Gate::check('edit_article') || Gate::check('add_article') || Gate::check('delete_article'))
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="far fa-keyboard ml-2"></i>
                <span>مدیریت مطالب</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="{{route('article.group.list')}}">لیست گروه مطالب</a>
                    </li>
                    <li>
                        <a href="{{route('articles',['id' => '1'])}}">لیست مطالب</a>
                    </li>
                    <li>
                        <a href="{{route('new.content')}}">افزودن مطلب</a>
                    </li>
                </ul>
            </div>
        </li>
    @endif


    <li class="sidebar-dropdown">
        <a href="{{route('tag.list')}}">
            <i class="fas fa-cogs ml-1"></i>
            <span>مدیریت تگ</span>
        </a>
    </li>
    <li class="sidebar-dropdown">
        <a href="{{route('slider')}}">
            <i class="fas fa-cogs ml-1"></i>
            <span>مدیریت اسلایدر</span>
        </a>
    </li>
    <li class="sidebar-dropdown">
        <a href="{{route('customer.list')}}">
            <i class="fas fa-cogs ml-1"></i>
            <span>مدیریت مشتریان</span>
        </a>
    </li>

    <li class="sidebar-dropdown">
        <a href="{{route('posts')}}">
            <i class="fas fa-cogs ml-1"></i>
            <span>مدیریت پیام ها</span>
        </a>
    </li>

    <li class="sidebar-dropdown">
        <a href="{{route('menu')}}">
            <i class="fas fa-cogs ml-1"></i>
            <span>مدیریت منو</span>
        </a>
    </li>

    <li class="sidebar-dropdown">
        <a href="{{route('setting')}}">
            <i class="fas fa-cogs ml-1"></i>
            <span>تنظیمات سایت</span>
        </a>
    </li>

</ul>


<script>


</script>
