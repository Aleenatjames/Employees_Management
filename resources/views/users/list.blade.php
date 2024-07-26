<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
        <!-- <a href="{{route('roles.create')}}" class="bg-slate-700 rounded py-2 my-2 px-3 text-white">Create</a> -->
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <x-message></x-message>
           
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left">Roles</th>
                        <th class="px-6 py-3 text-left" >Created</th>
                        <th class="px-6 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if($users->isNotEmpty())
                    @foreach($users as $user)
                    <tr class="border-b">
                        <td class="px-6 py-3 text-left">
                            {{$user->id}}
                        </td>
                        <td class="px-6 py-3 text-left">
                            {{$user->name}}
                        </td>
                        <td class="px-6 py-3 text-left">
                            {{$user->email}}
                        </td>
                        <td class="px-6 py-3 text-left">
                            {{$user->roles->pluck('name')->implode(', ')}}
                        </td>
                        <td class="px-6 py-3 text-left">
                            {{\Carbon\Carbon::parse($user->created_at)->format('d,M,Y')}}
                        </td>
                        <td class="px-6 py-3 text-center">
                            @can('edit users')
                        <a href="{{route('users.edit',$user->id)}}" class="bg-slate-700 rounded py-2 my-2 px-3 text-white hover:bg-slate-600">Edit</a>
                        @endcan
                        @can('delete users')
                        <a href="#"  onclick="deleteProduct('{{ $user->id }}');" class="bg-red-700 rounded py-2 my-2 px-3 text-white hover:bg-red-600">Delete</a>
                        @endcan
                        <form id="delete-product-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="post">
                                    @csrf
                                     @method('delete')
                        </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>

            </table>
          <div class="my-3">
          {{$users->links()}}
          </div>
            
        </div>
    </div>
    <script>
    function deleteProduct(id){
        
        if(confirm("Are you sure you want to delete the role?")){
            document.getElementById("delete-product-form-"+id).submit();
        }
    }
</script>
</x-app-layout>