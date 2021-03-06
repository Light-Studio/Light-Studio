<footer class="app-footer">

    <div class="site-footer-right">

		@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)


            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, '/admin', [], true) }}">
                {{ $properties['native'] }}
            </a>
            |

            @endforeach

        @php $version = Voyager::getVersion(); @endphp
        @if (!empty($version))
            {{ $version }}
        @endif
    </div>
</footer>
