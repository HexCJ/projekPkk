<div>
    <form wire:submit.prevent="tambah" enctype="multipart/form-data">
        <input class="text-black" type="text" wire:model="name" id="">
        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        <input class="text-black" type="email" wire:model="email" id="">
        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        <input class="text-black" type="password" wire:model="password" id="">
        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <button class="bg-teal-100" type="submit">simpan</button>
    </form>
    <div class="mb-2">
    <input wire:model.live="search" class="placeholder-shown:border-gray-500 text-black mb-10 rounded-xl border-b-2 border-black" placeholder="Cari User"/>
    </div>
    <div class="mt-1">
        <table class="w-full">
            <thead class="border-2 border-black">
                <th>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Email</td>
                </th>
            </thead>
            <tbody>
                @if(!$users->isEmpty())
                    @foreach ($users as $user)
                        <tr>
                            <td class="">{{$loop->iteration}}</td>
                            <td class="">{{$user->name}}</td>
                            <td class="">{{$user->email}}</td>
                        </tr>
                    @endforeach
                @else
                <tr>
                    <td colspan="3">Tidak ada data</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
