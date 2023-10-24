<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="w-full">
        <div class="flex bg-white" style="height:90vh">
            <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
                <div>
                    <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl">세상 모든 문제와 답이 모여드는 <span class="text-indigo-600">코드파티</span></h2>
                    <p class="mt-2 text-sm text-gray-500 md:text-base">코드파티에서는 질문하고 답할 수 있습니다! 답변채택시 작성글은 해결 게시판으로 이동됩니다.</p>
                    <p class="mt-2 text-sm text-gray-500 md:text-base"><b>※ 답변은 누구나 작성할 수 있기 때문에 전문성을 보장할 수 없습니다.</b></p>
                    <div class="flex justify-center lg:justify-start mt-6">
                        <a href="{{ route('contacts.index') }}" class="px-4 py-3 bg-gray-900 text-gray-200 text-xs font-semibold rounded hover:bg-gray-800">질문하러 가기</a>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block lg:w-1/2" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
                <div class="h-full object-cover" style="background-image: url(https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80)">
                    <div class="h-full bg-black opacity-25"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
