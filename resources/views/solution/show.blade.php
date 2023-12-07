<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          해결
      </h2>
  </x-slot>

  <div class="bg-gray-100 min-h-screen pt-12 sm:pt-20 pb-12 px-2 sm:px-0">
    <div class="max-w-7xl mx-auto">
        <div class="max-w-4xl mx-auto bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="p-8 space-y-8">
                <div class="pb-8 border-b border-gray-200 mb-8">
                    <div class="mb-4 rounded-lg p-4 border border-gray-200 bg-blue-100">
                      <h2 class="text-2xl font-bold">{{ $contact->title }}</h2>
                      <p class="text-sm text-blue-900 font-extrabold">유저명: {{ $contact->name }}</p>
                      <p class="text-sm text-blue-900 font-extrabold">이메일: {{ $contact->email }}</p>
                      @if($contact->url)
                        <p class="text-sm text-blue-900 font-extrabold">참고 페이지: {{ $contact->url }}</p>
                      @endif
                      <p class="text-sm text-blue-900 font-extrabold">성별: {{ $gender }}</p>
                      <p class="text-sm text-blue-900 font-extrabold">연령: {{ $age }}</p>
                      <p class="text-sm text-blue-900 font-extrabold">사용언어: {{ $contact->language }}</p>
                      <p class="text-lg text-blue-900">{{ $contact->contact }}</p>
                      <div class="flex justify-between items-end">
                          <p class="text-s">{{ $comment->created_at->format('Y-m-d H:i') }}</p>
                      </div>
                    </div>
                </div>

                <div class="mb-4 rounded-lg p-4 border border-gray-200 bg-blue-100">
                  <h2 class="text-2xl font-bold">작성자가 채택한 솔루션</h2>
                  <p class="text-xl text-blue-900 font-extrabold">유저명: {{ $commenter->name }}</p>
                  <p class="text-lg text-blue-900">{{ $comment->content }}</p>
                  <div class="flex justify-between items-end">
                      <p class="text-s">{{ $comment->created_at->format('Y-m-d H:i') }}</p>
                  </div>
                </div>

                <div class="pt-4">
                  @if(auth()->user()->email == $contact->email)
                  <a href="#" data-id="{{ $contact->id }}" onClick="deletePost(this)" class="text-red-600 hover:text-red-800">삭제</a>
                  <form id="delete_{{ $contact->id }}" action="{{ route('solution.destroy', $contact->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                  </form>
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
