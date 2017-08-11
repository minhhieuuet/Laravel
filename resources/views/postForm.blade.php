<form action="{!! route('postForm') !!}" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
    <input type="text" name="username" />
    <input type="submit" />
</form>