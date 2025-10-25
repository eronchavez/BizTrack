<x-layout>

    @foreach($list as $manager) 
        <p>{{$manager->name}}</p>
        <button>Delete</button>
        <button>Update</button>
    @endforeach

    <button>add Manager</button>

</x-layout>