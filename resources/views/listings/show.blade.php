<x-layout>
@include('partials._search')

<a href="/" class="inline-block text-black ml-4 mb-4"
><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
<x-card class="p-10">
    <div
        class="flex flex-col items-center justify-center text-center"
    >
        <img
            class="w-48 mr-6 mb-6"
            src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}"
            alt=""
        />

        <h3 class="text-2xl mb-2">{{$listing->name}}</h3>
        <div class="text-xl font-bold mb-4">{{$listing->email}}</div>

        {{-- <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"> --}}
            {{-- <div class="text-xl font-bold mb-4">Employees: </div> --}}
            {{-- {{dd($employee)}} --}}

            <div class="flex">

                <div>
                    <h3 class="text-2xl font-bold">
                        Employees
                    </h3>
                    <div class="text-xl mb-4">

                        @foreach ($employees as $employee) 
                            @if($employee->companyId == $listing->id)
                            
                                <a href="/employees/{{$employee->id}}/edit-employee" class="inline float-left">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                <form method="POST" action="/employees/{{$employee->id}}" class="inline float-left pl-5">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i></button>
                                </form>

                                <p class="float-left pl-5">{{$employee->firstname . ' ' . $employee->lastname}}</p> 
                                <br>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>

            {{-- <div class="text-xl font-bold mb-4">
                Employees:
                @foreach ($employees as $employee) 
                    @if($employee->companyId == $listing->id)
                        <p>{{$employee->firstname . ' ' . $employee->lastname}}</p>
                    @endif
                @endforeach
            </div> --}}
        {{-- </li> --}}
        {{-- <x-listing-tags :tagsCsv="$listing->tags"/> --}}
            
        {{-- <div class="text-lg my-4">
            <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
        </div> --}}
        <div class="border border-gray-200 w-full mb-6"></div>
        <div>
            {{-- <h3 class="text-3xl font-bold mb-4">
                Job Description
            </h3> --}}
            <div class="text-lg space-y-6">
                {{-- {{$listing->description}}

                <a
                    href="mailto:{{$listing->email}}"
                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                    ><i class="fa-solid fa-envelope"></i>
                    Contact Employer</a
                > --}}

                <a
                    href="{{$listing->website}}"
                    target="_blank"
                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                    ><i class="fa-solid fa-globe"></i> Visit
                    Website</a
                >
            </div>
        </div>
    </div>
</x-card>
<x-card>
    <a href="/employees/create-employee">
        <i class="fa-solid fa-plus"></i> Add an Employee
    </a>
    <a href="/listings/{{$listing->id}}/edit">
        <i class="fa-solid fa-pencil"></i> Edit Company Details
    </a>
    <form method="POST" action="/listings/{{$listing->id}}">
        @csrf
        @method('DELETE')
        <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete Company</button>
    </form>
</x-card>
</div>

</x-layout>