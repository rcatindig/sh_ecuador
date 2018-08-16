<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Logo</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($serviceProviders as $prov)

      <tr>
        <td>{{$prov['id']}}</td>
        <td>{{$prov['name']}}</td>
        <td>{{$prov['logo_url']}}</td>

        <td><a href="{{action('ServiceProviderController@edit', $prov['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('ServiceProviderController@destroy', $prov['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
