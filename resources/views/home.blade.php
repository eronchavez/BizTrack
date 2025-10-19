
<x-layout :title="'Log in | Biztrack Management'">

    <h1> Biztrack Management </h1>
    <p> Where business meets clarity.</p>


    <form action="{{ route('role') }}" method="POST">
        @csrf
        <input type="text" name="email" placeholder="EMAIL"> <br> <br>
        <input type="password" name="password" placeholder="PASSWORD"> <br><br>
        <input type="submit">
    </form>

</x-layout>