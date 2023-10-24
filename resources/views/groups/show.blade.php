<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          詳細画面
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                <section class="text-gray-600 body-font relative">

                    <div class="container px-5 mx-auto">
                      <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">

                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="name" class="leading-7 text-sm text-gray-600">학번</label>
                              <div class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $group->id }}</div>
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="title" class="leading-7 text-sm text-gray-600">이름</label>
                              <div class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $group->name }}</div>
                            </div>
                          </div>
                          

                          <div class="p-2 w-full">
                            <div class="relative"> 
                              <label for="email" class="leading-7 text-sm text-gray-600">성별</label>
                              <div class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $group->gender ? "여성" : "남성" }}</div>
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              <label class="leading-7 text-sm text-gray-600">email</label>
                              <div class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $group->email }}</div>
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="url" class="leading-7 text-sm text-gray-600">연령</label>
                              <div class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $group->age }}</div>
                            </div>
                          </div>
                          <div class="flex justify-evenly w-full">
                            <form action="{{ route('groups.edit', ['id' => $group->id ]) }}" method="get">
                              <div class="p-2 w-full">
                                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">수정하기</button>
                              </div>
                            </form>
                            <form id="delete_{{ $group->id }}" class="" action="{{ route('groups.destroy', ['id' => $group->id ]) }}" method="post">
                              @csrf
                              <div class="p-2 w-full">
                                <a href="#" data-id="{{ $group->id }}" onClick="deletePost(this)" class="flex mx-auto text-white bg-pink-500 border-0 py-2 px-8 focus:outline-none hover:bg-pink-600 rounded text-lg">삭제하기</a>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                </section>
              </div>
          </div>
      </div>
  </div>
<script>
function deletePost(e) {
  'use strict'
  if(confirm("本当に削除していいですか？")) {
    // 미리설정한 data의 id인 글을 지운다는 뜻 data-id="{{ $group->id }}"
    document.getElementById('delete_' + e.dataset.id).submit()
  }
}
</script>
</x-app-layout>
