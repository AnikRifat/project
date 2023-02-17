<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div><img src="{{ $content->favicon }}" alt="user-img" class="img-circle"></div>
                {{-- <div class="dropdown">
                    <h4 class="text-center">{{ Auth::user()->name }}</h4>
            </div> --}}
        </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">

            {{-- <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-align-left"></i>
                        <span class="hide-menu">Multi level dd</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="javascript:void(0)">item 1.1</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">item 1.2</a>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">Menu
                                1.3</a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="javascript:void(0)">item 1.3.1</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">item 1.3.2</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">item 1.3.3</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">item 1.3.4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)">item 1.4</a>
                        </li>
                    </ul>
                </li>
                 --}}



            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="ti-align-left"></i>
                    <span class="hide-menu">news</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    @can('Add News')
                    <li>
                        <a href="{{ route('news.create') }}">Create news</a>
                    </li>
                    @endcan
                    @can('Review News')
                    <li>
                        <a href="{{ route('news.index') }}">View news</a>
                    </li>
                    @endcan
                </ul>
            </li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="ti-align-left"></i>
                    <span class="hide-menu">Category</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    @can('Add Category')
                    <li>
                        <a href="{{ route('category.create') }}">Create Category</a>
                    </li>
                    <li>
                        <a href="{{ route('subcategory.create') }}">Create subcategory</a>
                    </li>
                    @endcan

                    <li>
                        <a href="{{ route('category.index') }}">View Categories</a>
                    </li>
                    <li>
                        <a href="{{ route('subcategory.index') }}">View subCategories</a>
                    </li>

                </ul>
            </li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="ti-align-left"></i>
                    <span class="hide-menu">tag</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <li>
                        <a href="{{ route('tag.create') }}">Create tag</a>
                    </li>
                    <li>
                        <a href="{{ route('tag.index') }}">View tag</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="ti-align-left"></i>
                    <span class="hide-menu">Editor</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <li>
                        <a href="{{ route('user.create') }}">Create Editor</a>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}">View Editor</a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="ti-align-left"></i>
                    <span class="hide-menu">Settings</span>
                </a>
                <ul aria-expanded="false" class="collapse">

                    <li>
                        <a href="{{ route('website.index') }}">website</a>
                    </li>

                    <li>
                        <a href="{{ route('contact.index') }}">contact</a>
                    </li>
                </ul>
            </li>

            <li class="nav-small-cap">--- SUPPORT</li>

            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger waves-effect waves-dark" type="submit" aria-expanded="false">
                        <i class="far fa-circle text-success"></i>
                        <span class="hide-menu">Log Out</span>
                    </button>
                </form>

            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
