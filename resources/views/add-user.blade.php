<form action="create-user" method="POST">
    @csrf
    <input type="text" name="name" id="name" placeholder="name" >
    <br>
    <br>
    <input type="email" name="email" id="email" placeholder="email" >
    <br>
    <br>
    <div class="form-group mb-3">
                <select id="country-dd" class="form-control">
                <option value="">Select Country</option>
                @foreach($countries as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
                </select>
    </div>
    <br>
    <button type="submit">Add User</button>
</form>

 <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript">
        
    </script>
    </script>





<!--blog url: https://tutorial101.blogspot.com/2022/09/laravel-9-country-state-city-dropdown.html -->