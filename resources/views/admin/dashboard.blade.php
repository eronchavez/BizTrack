<x-layout> 
    <h1>Welcome to Admin , {{Auth::user()->name}}</h1>

    <div>
        <a href="{{route ('admin.manager')}}"> Manager </a>
        <a href=""> Business </a>
        
    </div>
    

</x-layout>