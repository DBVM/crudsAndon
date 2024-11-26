
@if (session()->has('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
    {{ session()->get('success') }}
</div>
@endif
@if (isset($errors) && $errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    </ul>
</div>
@endif
@if (session()->has('deleted'))
<script>
    Swal.fire({
        title: "Deleted!",
        text: "The user has been deleted.",
        icon: "success"
    });
</script>
@endif
