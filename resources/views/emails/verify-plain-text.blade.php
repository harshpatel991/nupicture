{{Config::get('app.name')}}

Hey there!

Thanks so much for joining {{Config::get('app.name')}}. Confirm your email by clicking the link below.
{{ URL::to('verify/' . $confirmationCode) }}

<br><br>
-The {{Config::get('app.name')}} Team
<br>
http://topicloop.com