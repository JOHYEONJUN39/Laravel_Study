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
                    <p class="mt-2 text-sm text-gray-500">유저명: {{ $contact->name }}</p>
                    <div class="mt-4 text-sm text-gray-500">
                        <p>이메일: {{ $contact->email }}</p>
                        @if($contact->url)
                        <p>참고 페이지: {{ $contact->url }}</p>
                        @endif
                        <p>성별: {{ $gender }}</p>
                        <p>연령: {{ $age }}</p>
                        <p>사용언어: {{ $contact->language }}</p>
                    </div>
                </div>
                <div>
                    <p class="text-gray-700">{{ $contact->contact }}</p>
                </div>
                <div class="pt-4">
                    @if(auth()->user()->email != $contact->email)
                    <form class="mb-6" method="POST" action="/contact-forms/{{ $contact->id }}/comments">
                        @csrf
                        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="content" name="content" rows="6"
                                class="px-0 w-full text-s text-blue-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                placeholder="도와주세요!" required></textarea>
                        </div>
                        <button type="submit"
                            class="inline-flex items-center py-2.5 px-4 text- font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            솔루션 제공
                        </button>
                    </form>
                    @endif
                    @if(auth()->user()->email == $contact->email)
                    <a href="{{ route('contacts.edit', ['id' => $contact->id ])}}" class="text-blue-600 hover:text-blue-800">편집</a>
                    <a href="#" data-id="{{ $contact->id }}" onClick="deletePost(this)" class="text-red-600 hover:text-red-800 ml-4">삭제</a>
                    <form id="delete_{{ $contact->id }}" action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>      
                    @endif
                    <div class="mt-6">
                        @foreach($contact->comments as $comment)
                            <div class="mb-4 rounded-lg p-4 border border-gray-200 bg-blue-100">
                                <p class="text-xl text-blue-900 font-extrabold">유저명: {{ $comment->user->name }}</p>
                                <p class="text-lg text-blue-900">{{ $comment->content }}</p>
                                <div class="flex justify-between items-end">
                                    <p class="text-s">{{ $comment->created_at->format('Y-m-d H:i') }}</p>
                                    @if(auth()->user()->email == $contact->email)
                                    <form action="/contact-forms/{{ $contact->id }}/comments/{{ $comment->id }}/adopt" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center py-2.5 px-4 text- font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                            채택
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
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
