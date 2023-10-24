<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          問い合わせ一覧
          
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                  <a href="{{ route('groups.create') }}" class="text-blue-500">신규등록</a><br>
                  {{-- <form action="{{ route('groups.index') }}" method="get" class="mb-8">
                    <input type="text" name="search" placeholder="検索">
                    <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">検索する</button>
                  </form> --}}
                  <br>

                  <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                      <thead>
                        <tr>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">학번</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">이름</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">성별</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">가입일</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">상세정보</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($groups as $group)
                        <tr>
                          <td class="border-t-2 border-gray-200 px-4 py-3">{{ $group->id }}</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3">{{ $group->name }}</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3">{{ $group->gender === 0 ? "남성" : "여성" }}</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3">{{ $group->created_at }}</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3"><a class="text-blue-500" href="{{ route('groups.show', ['id' => $group->id]) }}">詳細を見る</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  {{-- {{ $contacts->links() }} --}}
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
