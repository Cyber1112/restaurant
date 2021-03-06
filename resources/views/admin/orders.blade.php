<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
  </head>
  <body>
    <div class="container-scroller">
      @include("admin.navbar")
        
      <div class="container">

        <h1>Customer Orders</h1>

        <form action="{{ url('/search') }}" method="get">
            <input type="text" name="search" style="color:blue;">
            <input type="submit" value="Search" class="btn btn-success">
        </form>


        <div style="position: relative; top:60px; right:-150px;">
            <table bgcolor="grey" border="3px" >
                <tr>
                    <th style="padding:30px;">Name</th>
                    <th style="padding:30px;">Phone</th>
                    <th style="padding:30px;">Address</th>
                    <th style="padding:30px;">Food Name</th>
                    <th style="padding:30px;">Price</th>
                    <th style="padding:30px;">Quantity</th>
                    <th style="padding:30px;">Total</th>
                    <th style="padding:30px;">Price</th>
                </tr>

                @foreach ($data as $data)
                <tr align="center">
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->phone_number }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->foodname }}</td>
                    <td>{{ $data->price }}</td>
                    <td>{{ $data->quantity }}</td>
                    <td>{{ $data->price * $data->quantity }}</td>

                </tr>
                @endforeach

            </table>
        </div>
    </div>
    
    
    </div>

    @include("admin.adminscript")
  </body>
</html>