@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Uploaded Question Papers</h2>
    <form action="/post-data" method="POST" enctype="multipart/form-data">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subjects</th>
                    <th>Question Papers</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="insert_data">
                @foreach ($users as $user)
                    @php
                        $details = json_decode($user->details, true); // Decode JSON
                    @endphp
                    @foreach ($details['subjects'] as $index => $subject)
                        <tr>
                            <td><input name="details[subjects][]" type="text" class="form-control" value="{{ $subject }}"></td>
                            <td>
                                @if (isset($details['questionpapers'][$index]))
                                    <a href="{{ asset('storage/' . $details['questionpapers'][$index]) }}" target="_blank">
                                        View File
                                    </a>
                                @endif
                                <input name="details[questionpapers][]" type="file" class="form-control">
                            </td>
                            <td>
                                <input type="button" class="btn btn-sm btn-primary addrow" value="Add">
                                <input type="button" class="btn btn-sm btn-danger removerow" value="Remove">
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-success">Save Changes</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
 $(document).ready(function() {

    $(document).on('click', '.addrow', function() {
        // Table Adding Rows
        var add_row = `<tr>
            <td><input name="details[subjects][]" placeholder="Enter Subject" type="text" class="form-control"></td>
            <td><input name="details[questionpapers][]" type="file" class="form-control"></td>
            <td>
                <input type="button" class="btn btn-sm btn-primary addrow" value="Add">
                <input type="button" class="btn btn-sm btn-danger removerow" value="Remove">
            </td>
        </tr>`;
        $("#insert_data").append(add_row);
    });

    // Table Removing Rows
    $(document).on('click', '.removerow', function() {
        $(this).closest("tr").remove();
    });
});
</script>
@endsection
