<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <!--<div class="navbar-header">
                <a class="navbar-brand" href="{{ route('voyager.dashboard') }}">
                    <div class="logo-icon-container" >
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if($admin_logo_img == '')
                            <img src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="Logo Icon">
                        @else
                            <img src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                        @endif
                        
                    </div>
                    <div class="title">{{Voyager::setting('admin.title', 'Lumen CMS')}}</div>
                </a>
            </div><!-- .navbar-header -->

            <div class="panel widget center bgimage"
                 style="background-image:url({{ Voyager::image( Voyager::setting('admin.bg_image'), config('voyager.assets_path') . '/images/bg.jpg' ) }}); background-size: cover; background-position: 0px;">
                 
                <div class="dimmer"></div>
                <div class="panel-content">
                     <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if($admin_logo_img == '')
                            <img src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="Logo Icon" style="height:30px; width:30px; float:left; margin-left:15px;">
                        @else
                            <img src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon" style="height:30px; width:30px; float:left; margin-left:15px;">
                        @endif
                    <h4 style="margin-top:10px; margin-left:5px">{{Voyager::setting('admin.title', 'Lumen CMS')}}</h4>
                    <p>{{ Auth::user()->email }}</p>

                    <div style="clear:both"></div>
                </div>
            </div>

        </div>

        {!! menu('admin_fr', 'admin_menu') !!}
    </nav>
</div>
