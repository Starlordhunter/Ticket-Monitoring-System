<html><h1>testing</h1>
@foreach ($users as $user)
{{$user->id}}</>
{{$user->email}}
{{$user->password}}<br>

@endforeach
</html>