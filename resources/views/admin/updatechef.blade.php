<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
    @include("admin.admincss")
  </head>
  <body>
    <div class="container-scroller">

        @include("admin.navbar")

        <div style="position: relative; top:60px; right: -150px">
            <form action="{{ url('/renew_chef', $data->id) }}" method="post" enctype="multipart/form-data">

                @csrf

                <div>
                    <label for="">Name</label>
                    <input style="color: black" type="text" name="name" value="{{ $data->name }}" required>
                </div>
                <div>
                    <label for="">Price</label>
                    <input style="color: black" type="text" name="speciality" value="{{ $data->speciality }}" required>
                </div>
                <div>
                    <label for="">Old Image</label>
                    <img width="200px" height="200px" src="/chefimage/{{ $data->image }}" alt="">
                    <input type="file" name="image" required>
                </div>
                
                <div>
                    <input style="color: black; background:white;" type="submit" value="Save">
                </div>

            </form>
        </div>

    </div>

    @include("admin.adminscript")
  </body>
</html>