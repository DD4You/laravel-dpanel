<div class="flex flex-col items-center ">

    <div onclick="toggleSubmenu(this)" class="w-full flex justify-between {{ $isActive ? 'active-menu' : 'menu' }}">
        <div class="flex items-center">
            <i class='bx {{ $icon }}'></i>
            <span class="text-[15px] ml-1.5">{{ $name }}</span>
        </div>
        <i class='bx bx-chevron-right duration-300 '></i>
    </div>

    <ul class="w-11/12 ml-auto dropdown">

        {{ $slot }}

    </ul>
</div>
