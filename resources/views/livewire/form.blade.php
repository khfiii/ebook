<div>
<form wire:submit="checkout">
    <input type="hidden" name="" wire:model="id">
    <label class="form-control w-full max-w-xs">
        <div class="label">
            <label for="nama"  class="label-text">Nama Lengkap</label>
        </div>
        <input id="nama" wire:model="nama" type="text" placeholder="Masukan nama lengkap" class="input input-bordered input-sm bg-white w-full max-w-xs focus:outline-none" />
        <small class="text-red-500" >@error('nama') {{ $message }} @enderror</small>
    </label>
    <label class="form-control w-full max-w-xs">
        <div class="label">
            <label for="email" class="label-text">Email</label>
        </div>
        <input id="email" wire:model="email" type="email" placeholder="Masukan email" class="input input-bordered input-sm bg-white w-full max-w-xs focus:outline-none" />
        <small class="text-red-500" >@error('email') {{ $message }} @enderror</small>
    </label>
    <label class="form-control w-full max-w-xs">
        <div class="label">
            <label for="email" class="label-text">Whatsapp</label>
        </div>
        <input id="email" wire:model="whatsapp" type="text" inputmode="numeric" placeholder="Masukan whatsapp" class="input input-bordered input-sm bg-white w-full max-w-xs focus:outline-none" />
        <small class="text-red-500" >@error('whatsapp') {{ $message }} @enderror</small>
    </label>
    <button type="submit" class="btn btn-sm bg-black mt-4">Bayar</button>
</form>

<div id="snap-container"></div>
</div>