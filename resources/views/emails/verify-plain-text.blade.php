{{Config::get('app.name')}}

Hey there!

Thanks so much for joining {{Config::get('app.name')}}. Confirm your email by clicking the link below.
{{ URL::to('verify/' . $confirmationCode) }}

-The {{Config::get('app.name')}} Team