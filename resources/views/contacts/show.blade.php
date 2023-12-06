<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          자세히 보기
      </h2>
  </x-slot>

  <div class="bg-gray-100 min-h-screen pt-12 sm:pt-20 pb-12 px-2 sm:px-0">
    <div class="max-w-7xl mx-auto">
        <div class="max-w-4xl mx-auto bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="p-8 space-y-8">
                <div class="pb-8 border-b border-gray-200 mb-8">
                    <h2 class="text-2xl font-bold">{{ $contact->title }}</h2>
                    <p class="mt-2 text-sm text-gray-500">{{ $contact->name }}</p>
                    <div class="mt-4 text-sm text-gray-500">
                        <p>이메일: {{ $contact->email }}</p>
                        @if($contact->url)
                        <p>참고 페이지: {{ $contact->url }}</p>
                        @endif
                        <p>성별: {{ $gender }}</p>
                        <p>연령: {{ $age }}</p>
                    </div>
                </div>
                <div>
                    <p class="text-gray-700">{{ $contact->contact }}</p>
                </div>
                <div class="pt-4">
                    @if(auth()->user()->email != $contact->email)
                    <a href="{{ route('solution.create', ['id'=>$contact->id])}}" class="text-green-600 hover:text-blue-800">해결하기</a>
                    @endif
                    @if(auth()->user()->email == $contact->email)
                    <a href="{{ route('contacts.edit', ['id' => $contact->id ])}}" class="text-blue-600 hover:text-blue-800">편집</a>
                    <a href="#" data-id="{{ $contact->id }}" onClick="deletePost(this)" class="text-red-600 hover:text-red-800 ml-4">삭제</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function deletePost(e) {
  'use strict'
  if(confirm("정말 삭제하시겠습니까?")) {
    // 미리설정한 data의 id인 글을 지운다는 뜻 data-id="{{ $contact->id }}"
    document.getElementById('delete_' + e.dataset.id).submit()
  }
}
</script>
</x-app-layout>
