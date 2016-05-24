<section class="sidebar">
    <ul class="sidebar-menu">
        <li class=" treeview">
            <a href="#">
                <i class="fa fa-coffee"></i>
                <span>{{ trans('categories::general.sidebar.categories_management_title') }}</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="">
                    <a href="{!! route('categories.index') !!}">{{ trans('categories::general.sidebar.categories_management_list') }}</a>
                </li>
                <li class="">
                    <a href="{!! route('categories.create') !!}">{{ trans('categories::general.sidebar.categories_management_create') }}</a>
                </li>
            </ul>
        </li>
    </ul><!-- /.sidebar-menu -->
</section>
