{{-- resources/views/components/front/header/categories.blade.php --}}
<nav class="w-full border-t border-b border-gray-200 bg-white relative z-20">
    <div class="max-w-6xl mx-auto px-4">
        <ul class="flex items-center gap-7 text-[15px] text-gray-600 py-3">
            <li class="relative group">
                <a href="/serezhky" class="hover:text-gray-900">Сережки</a>
                <ul class="absolute left-0 top-full invisible opacity-0 group-hover:visible group-hover:opacity-100 bg-white shadow-lg min-w-[200px] z-20 transition-opacity duration-150">
                    <li><a href="/serezhky/gvozdyky" class="block px-4 py-2 hover:bg-gray-50">Гвоздики</a></li>
                    <li><a href="/serezhky/protyazhky" class="block px-4 py-2 hover:bg-gray-50">Протяжки</a></li>
                    <li><a href="/serezhky/kilcya" class="block px-4 py-2 hover:bg-gray-50">Кільця</a></li>
                </ul>
            </li>

            <li><a href="/braslety" class="hover:text-gray-900">Браслети</a></li>
            <li><a href="/lancyuzhky" class="hover:text-gray-900">Ланцюжки</a></li>
            <li><a href="/pidvisky" class="hover:text-gray-900">Підвіски</a></li>
            <li><a href="/kulony" class="hover:text-gray-900">Кулони</a></li>

            <li class="relative group">
                <a href="/kilcya" class="hover:text-gray-900">Кільця</a>
                <ul class="absolute left-0 top-full invisible opacity-0 group-hover:visible group-hover:opacity-100 bg-white shadow-lg min-w-[200px] z-20 transition-opacity duration-150">
                    <li><a href="/kilcya/zhinochi" class="block px-4 py-2 hover:bg-gray-50">Жіночі</a></li>
                    <li><a href="/kilcya/cholovichi" class="block px-4 py-2 hover:bg-gray-50">Чоловічі</a></li>
                </ul>
            </li>

            <li><a href="/nabir" class="hover:text-gray-900">Набір</a></li>
            <li><a href="/pirsyng" class="hover:text-gray-900">Пірсинг</a></li>
            <li><a href="/zakolky" class="hover:text-gray-900">Заколки</a></li>
            <li><a href="/soncezahysni-okulyary" class="hover:text-gray-900">Сонцезахисні окуляри</a></li>
            <li><a href="/godynnyky" class="hover:text-gray-900">Годинники</a></li>
            <li><a href="/sumky" class="hover:text-gray-900">Сумки</a></li>
            <li><a href="/shkarpetky" class="hover:text-gray-900">Шкарпетки</a></li>
        </ul>
    </div>
</nav>
