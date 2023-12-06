<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          질문 게시판
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                <div class="flex justify-end h-[44px]">
                  <form action="{{ route('contacts.index') }}" method="get" class="mb-8">
                    <input type="text" name="search" placeholder="작성자로 검색">
                    <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">검색</button>
                  </form>
                  <a href="{{ route('contacts.create') }}" class="flex ml-1 text-white bg-pink-500 border-0 py-2 px-8 focus:outline-none hover:bg-pink-600 rounded text-lg">신규등록</a>
                </div>
                  <br>

                  <div class="lg:w-5/6 w-full mx-auto overflow-auto">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                      <thead>
                        <tr>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">No</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">작성자</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">제목</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">작성일</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">링크</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                          <td class="border-t-2 border-gray-200 px-4 py-3">{{ $contact->id }}</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3">{{ $contact->name }}</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3">{{ $contact->title }}</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3">{{ $contact->created_at }}</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3"><a class="text-blue-500" href="{{ route('contacts.show', ['id' => $contact->id]) }}">자세히보기</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  {{ $contacts->links() }}
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
