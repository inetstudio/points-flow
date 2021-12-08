<li class="{{ isActiveRoute('back.points-flow-package.*', 'mm-active') }}">
    <a href="#" aria-expanded="false"><i class="fa fa-arrows-alt-v"></i> <span class="nav-label">Движение баллов</span><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        @include('admin.module.points-flow-package.actions::back.includes.package_navigation')
        @include('admin.module.points-flow-package.records::back.includes.package_navigation')
    </ul>
</li>
