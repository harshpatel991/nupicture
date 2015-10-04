{{Config::get('app.name')}}
<br>
<br>
Hey there!
<br><br>
You post has been published and can be viewed at this link: {{ URL::to($postLink) }}
<br><br>
@if(!empty($additionalMessage))
    {!! $additionalMessage !!}
    <br><br>
@endif
Feel free to share the link on your social media profiles.
<br><br>
For tips on how to increase your page views, check out this page: {{ URL::to('/increase-views') }}
<br><br>
-The {{Config::get('app.name')}} Team
<br>
http://topicloop.com
<br><br>
---------------------------
<br>
Unsubscribe from these types of emails in your <a href="{{ URL::to('/preferences') }}">Preferences</a>