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
    <div class="form-group mb-3">
        <select id="state-dd" class="form-control">
        </select>
    </div>
    <br>
    <div class="form-group mb-3">
        <select id="city-dd" class="form-control"></select>
    </div>
    <br>
    <button type="submit">Add User</button>
</form>

 <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#country-dd').change(function(event) {
            var idCountry = this.value;
                
            $('#state-dd').html('');

            $.ajax({
                url: "/api/fetch-state",
                type: 'POST',
                dataType: 'json',
                data: {country_id: idCountry,_token:"{{ csrf_token() }}"},
                success:function(response){
                    $('#state-dd').html('<option value="">Select State</option>');
                    $.each(response.states,function(index, val){
                    $('#state-dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
                    });
                    $('#city-dd').html('<option value="">Select City</option>');
                }
            })

            $('#state-dd').change(function(event) {
            var idState = this.value;
            $('#city-dd').html('');
            $.ajax({
            url: "/api/fetch-cities",
            type: 'POST',
            dataType: 'json',
            data: {state_id: idState,_token:"{{ csrf_token() }}"},
            success:function(response){
                $('#city-dd').html('<option value="">Select State</option>');
                $.each(response.cities,function(index, val){
                $('#city-dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
                });
            }
            })
        });


            })
        })
    </script>
    </script>





<!--blog url: https://tutorial101.blogspot.com/2022/09/laravel-9-country-state-city-dropdown.html -->