<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          신규등록
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                <section class="text-gray-600 body-font relative">
                    <div class="container px-5 mx-auto">
                      <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="-m-2">
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
                          </div>
                          <form action="{{ route('solution.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value={{ $contact->id }} />
                              <div class="p-2 w-full">
                                <div class="relative">
                                  <label for="solutionContact" class="leading-7 text-sm text-gray-600">답변 내용</label>
                                  <textarea id="solutionContact" name="solutionContact"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{  old('contact') }}</textarea>

                                </div>
                              </div>
                            
                              <div class="p-2 w-full">
                                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">답변등록</button>
                              </div>
                          </form>
                      </div>
                    </div>
                    </div>
                  
                </section>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
