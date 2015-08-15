{{--{{$publisherId}}--}}
{{--<img src="/images/large-rectangle.png" width="336" height="280" class="center-block" >--}}

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