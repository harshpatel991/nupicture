{{--{{$publisherId}}--}}
{{--<img src="/images/large-skyscraper.png" width="300" height="600" class="center-block" style="padding-top:10px; padding-bottom:10px;">--}}

@if(!env('APP_DEBUG', true))
    <div class="center-block">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Topic-Large Rectangle-1 -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-{{$publisherId}}"
             data-ad-slot="6430163992"
             data-ad-format="auto"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
@endif