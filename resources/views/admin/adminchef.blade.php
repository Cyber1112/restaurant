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

        <div style="position: relative; top:60px; right: -150px">
            <form action="{{ url('/uploadchef') }}" method="post" enctype="multipart/form-data">

                @csrf

                <div>
                    <label for="">Chef Name</label>
                    <input style="color: black" type="text" name="name" placeholder="Enter Name" required>
                </div>
                <div>
                    <label for="">Speciality</label>
                    <input style="color: black" type="text" name="speciality" placeholder="Enter Speciality" required>
                </div>
                <div>
                    <label for="">Image</label>
                    <input type="file" name="image" required>
                </div>

                <div>
                    <input style="color: black; background:white;" type="submit" value="Save">
                </div>

            </form>

            <table bgcolor="black" style="margin-top: 50px">
                <tr>
                    <th style="padding:30px">Name</th>
                    <th style="padding:30px">Speciality</th>
                    <th style="padding:30px">Image</th>
                    <th style="padding:30px">Action</th>
                    <th style="padding:30px">Action</th>
                </tr>
                
                @foreach ($data as $data)
                  <tr align="center">
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->speciality }}</td>
                    <td><img height="200px" width="200px" src="/chefimage/{{ $data->image }}"></td>
                    <td><a href="{{ url('/deletechef', $data->id) }}">Delete</a></td>
                    <td><a href="{{ url('/updatechef', $data->id) }}">Update</a></td>
                </tr>  
                @endforeach

                

                

            </table>
        </div>


            


    </div>

    @include("admin.adminscript")
  </body>
</html>