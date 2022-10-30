<div>
    <form wire:submit.prevent="saveUserInfo">
        <p>{{$userName}}</p>
        <p>{{$userDob}}</p>
        <input wire:model="userName">
        <input type="date" class="form-control h-100" wire:model="userDob">
        <button type="submit" type="button" class="btn modal-btn">Lưu thay đổi</button>
        @error('userName') <span class="text-danger">{{ $message }}</span>@enderror
        @error('userDob') <span class="text-danger">{{ $message }}</span>@enderror

    </form>

</div>
