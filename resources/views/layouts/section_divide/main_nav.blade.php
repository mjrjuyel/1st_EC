<nav class="main_nav">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="main_nav_content d-flex flex-row">
                    <!-- Categories Menu -->

                    <div class="cat_menu_container">
                        <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                            <div class="cat_burger"><span></span><span></span><span></span></div>
                            <div class="cat_menu_text">categories</div>
                        </div>

                        <ul class="cat_menu">
                            @foreach($category as $cat)
                                <li class="hassubs">
                                    <a href="{{route('category.product',$cat->id)}}">{{ $cat->cat_title }}<i class="ri-arrow-right-line"></i></a>
                                    <ul>
                                        @foreach($cat->subcategory as $subcat)
                                            <li class="hassubs">
                                                <a href="{{route('category.subcategory.product',$subcat->id)}}">{{ $subcat->subcat_title }}<i
                                                        class="fas fa-chevron-right"></i></a>
                                                @php
                                                    $childcat =
                                                    DB::table('child_categories')->where('child_cat_status','1')->where('subcat_id',$subcat->id)->get();
                                                @endphp
                                                <ul>
                                                    @foreach($childcat as $child)
                                                        <li><a href="#">{{ $child->child_cat_title }}<i
                                                                    class="fas fa-chevron-right"></i></a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>

                    </div>

                    <!-- Main Nav Menu -->

                    <div class="main_nav_menu ml-auto">
                        <ul class="standard_dropdown main_nav_dropdown">
                            <li><a href="{{ route('.') }}">Home<i class="fas fa-chevron-down"></i></a>
                            </li>
                            <li class="hassubs">
                                <a href="#">Featured Brands<i class="ri-arrow-down-double-line"></i></a>
                                <ul>
                                    <li>
                                        <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
                            <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
                        </ul>
                    </div>

                    <!-- Menu Trigger -->

                    <div class="menu_trigger_container ml-auto">
                        <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                            <div class="menu_burger">
                                <div class="menu_trigger_text">menu</div>
                                <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
