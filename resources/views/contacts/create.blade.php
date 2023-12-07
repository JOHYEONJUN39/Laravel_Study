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
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <section class="text-gray-600 body-font relative">
                  <form action="{{ route('contacts.store') }}" method="post">
                    @csrf
                    <div class="container px-5 mx-auto">
                      <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="-m-2">
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="title" class="leading-7 text-sm text-gray-600">제목 *</label>
                              <input type="text" id="title" name="title" value="{{ old('title') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                          
                          <div class="p-2 w-full">
                              <div class="relative">
                                <label for="language" class="leading-7 text-sm text-gray-600">사용언어 *</label>
                                <select id="language" name="language" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" onchange="showOtherLanguageField()">
                                    <option value="JavaScript">JavaScript</option>
                                    <option value="TypeScript">TypeScript</option>
                                    <option value="Python">Python</option>
                                    <option value="Java">Java</option>
                                    <option value="C#">C#</option>
                                    <option value="C++">C++</option>
                                    <option value="PHP">PHP</option>
                                    <option value="Ruby">Ruby</option>
                                    <option value="Swift">Swift</option>
                                    <option value="Kotlin">Kotlin</option>
                                    <option value="Go">Go</option>
                                    <option value="Rust">Rust</option>
                                    <option value="Dart">Dart</option>
                                    <option value="Objective-C">Objective-C</option>
                                    <option value="Shell">Shell</option>
                                    <option value="C">C</option>
                                    <option value="">기타</option>
                                </select>
                                
                                <input type="text" id="otherLanguage" name="otherLanguage" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" style="display: none;">
                              </div>
                          </div>
                        
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="url" class="leading-7 text-sm text-gray-600">참고 페이지</label>
                              <input type="url" id="url" name="url" value="{{ old('url') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              <label class="leading-7 text-sm text-gray-600">성별 *</label>
                              <br>
                              <input type="radio" name="gender" value="0" {{ old('gender') == 0 ? 'checked' : '' }} >남성
                              <input type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : '' }}>여성
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="url" class="leading-7 text-sm text-gray-600">연령 *</label>
                              <select name="age">
                                <option value="">선택해주세요</option>
                                <option value="1" {{ old('age') == 1 ? 'selected' : '' }}>19세 미만</option>
                                <option value="2" {{ old('age') == 2 ? 'selected' : '' }}>20세〜29세</option>
                                <option value="3" {{ old('age') == 3 ? 'selected' : '' }}>30세〜39세</option>
                                <option value="4" {{ old('age') == 4 ? 'selected' : '' }}>40세〜49세</option>
                                <option value="5" {{ old('age') == 5 ? 'selected' : '' }}>50세〜59세</option>
                                <option value="6" {{ old('age') == 6 ? 'selected' : '' }}>60세 이상</option>
                              </select>
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="contact" class="leading-7 text-sm text-gray-600">질문 내용 *</label>
                              <textarea id="contact" name="contact"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{  old('contact') }}</textarea>
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              <input type="checkbox" id="caution" name="caution" > 작성글 정보수집에 동의합니다.
                            </div>
                          </div>
                          
                          <div class="p-2 w-full">
                            <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">신규등록</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </section>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>

<script>
function showOtherLanguageField() {
  const languageSelect = document.getElementById('language');
  const otherLanguageInput = document.getElementById('otherLanguage');
  if (languageSelect.value === '') {
      otherLanguageInput.style.display = 'block';
      otherLanguageInput.name = 'language'; // 이름을 'language'로 변경
      languageSelect.name = '';
  } else {
      otherLanguageInput.style.display = 'none';
      languageSelect.name = 'language';
  }
}
</script>