<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
</head>

<body class="font-poppins text-black">
    <section id="content" class="max-w-[640px] w-full mx-auto bg-[#F9F2EF] min-h-screen">
        <div class="w-full min-h-screen flex flex-col items-center justify-center py-[46px] px-4 gap-8">
            <div class="w-[calc(100%-26px)] rounded-[20px] overflow-hidden relative">
                <img src="assets/backgrounds/Asset-signup.png" class="w-full h-full object-contain" alt="background">
            </div>
            <form action="{{ route('register') }}" method="POST" class="flex flex-col w-full bg-white p-[24px_16px] gap-8 rounded-[22px] items-center" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-1 text-center">
                    <h1 class="font-semibold text-2xl leading-[42px] ">Sign Up</h1>
                    <p class="text-sm leading-[25px] tracking-[0.6px] text-darkGrey">Enter valid data to create your account</p>
                </div>
                <div class="flex flex-col gap-[15px] w-full max-w-[311px]">
                    <div class="flex flex-col gap-1 w-full">
                        <p class="font-semibold">Avatar</p>
                        <div class="flex items-center gap-3 p-[16px_12px] border border-[#BFBFBF] rounded-xl focus-within:border-[#4D73FF] transition-all duration-300 overflow-hidden">
                            <div class="w-4 h-4 flex shrink-0">
                                <img src="assets/icons/gallery-2.svg" alt="icon">
                            </div>
                            <button type="button" id="upload-file" class="flex items-center gap-3">
                                <div id="chosse-file-dummy-btn" class="border border-[#8D9397] bg-[#F3F4F8] py-1 px-2 rounded-lg text-nowrap text-sm leading-[22px] tracking-035 h-fit">Choose File</div>
                                <div>
                                    <p id="placeholder" class="text-nowrap text-[#BFBFBF] text-sm tracking-035 leading-[22px] text-left">No file chosen</p>
                                    <div id="file-info" class="hidden flex-row flex-nowrap gap-3 items-center">
                                        <span id="fileName" class="text-sm tracking-035 leading-[22px] text-nowrap"></span>
                                    </div>
                                </div>
                                <input type="file" name="avatar" id="file" class="hidden">
                            </button>
                        </div>
                        @error('avatar')
                        <p class="text-red-600 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 w-full">
                        <p class="font-semibold">Full Name</p>
                        <div class="flex items-center gap-3 p-[16px_12px] border border-[#BFBFBF] rounded-xl focus-within:border-[#4D73FF] transition-all duration-300">
                            <div class="w-4 h-4 flex shrink-0">
                                <img src="assets/icons/user-flat-black.svg" alt="icon">
                            </div>
                            <input type="text" name="name" value="{{ old('name') }}" class="appearance-none outline-none w-full text-sm placeholder:text-[#BFBFBF] tracking-[0.35px]" placeholder="Write your full name">
                        </div>
                        @error('name')
                        <p class="text-red-600 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1 w-full">
                        <p class="font-semibold">Phone Number</p>
                        <div class="flex items-center gap-3 p-[16px_12px] border border-[#BFBFBF] rounded-xl focus-within:border-[#4D73FF] transition-all duration-300">
                            <div class="w-4 h-4 flex shrink-0">
                                <img src="assets/icons/call.svg" alt="icon">
                            </div>
                            <input type="tel" name="phone_number" value="{{ old('phone_number') }}" class="appearance-none outline-none w-full text-sm placeholder:text-[#BFBFBF] tracking-[0.35px]" placeholder="Your valid phone number">
                        </div>
                        @error('phone_number')
                        <p class="text-red-600 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1 w-full">
                        <p class="font-semibold">Email Address</p>
                        <div class="flex items-center gap-3 p-[16px_12px] border border-[#BFBFBF] rounded-xl focus-within:border-[#4D73FF] transition-all duration-300">
                            <div class="w-4 h-4 flex shrink-0">
                                <img src="assets/icons/sms.svg" alt="icon">
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}" class="appearance-none outline-none w-full text-sm placeholder:text-[#BFBFBF] tracking-[0.35px]" placeholder="Your email address">
                        </div>
                        @error('email')
                        <p class="text-red-600 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1 w-full">
                        <p class="font-semibold">Password</p>
                        <div class="flex items-center gap-3 p-[16px_12px] border border-[#BFBFBF] rounded-xl focus-within:border-[#4D73FF] transition-all duration-300">
                            <div class="w-4 h-4 flex shrink-0">
                                <img src="assets/icons/password-lock.svg" alt="icon">
                            </div>
                            <input type="password" id="password" name="password" class="appearance-none outline-none w-full text-sm placeholder:text-[#BFBFBF] tracking-[0.35px]" placeholder="Enter your valid password">
                            <button type="button" class="reveal-password w-4 h-4 flex shrink-0" onclick="togglePasswordVisibility('password', this)">
                                <img src="assets/icons/password-eye.svg" class="see-password" alt="icon">
                                <img src="assets/icons/password-eye-slash.svg" class="hide-password hidden" alt="icon">
                            </button>
                        </div>
                        @error('password')
                        <p class="text-red-600 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1 w-full">
                        <p class="font-semibold">Confirm Password</p>
                        <div class="flex items-center gap-3 p-[16px_12px] border border-[#BFBFBF] rounded-xl focus-within:border-[#4D73FF] transition-all duration-300">
                            <div class="w-4 h-4 flex shrink-0">
                                <img src="assets/icons/password-lock.svg" alt="icon">
                            </div>
                            <input type="password" id="confirm-password" name="password_confirmation" class="appearance-none outline-none w-full text-sm placeholder:text-[#BFBFBF] tracking-[0.35px]" placeholder="Confirm your valid password">
                            <button type="button" class="reveal-password w-4 h-4 flex shrink-0" onclick="togglePasswordVisibility('confirm-password', this)">
                                <img src="assets/icons/password-eye.svg" class="see-password" alt="icon">
                                <img src="assets/icons/password-eye-slash.svg" class="hide-password hidden" alt="icon">
                            </button>
                        </div>
                        @error('password_confirmation')
                        <p class="text-red-600 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <button type="submit" class="bg-[#4D73FF] p-[16px_24px] w-full max-w-[311px] rounded-[10px] text-center text-white font-semibold hover:bg-[#06C755] transition-all duration-300">Sign up</button>
                <p class="text-center text-sm tracking-035 text-darkGrey">Already have account?
                    <a href={{ route('login') }}class="text-[#4D73F] font-semibold tracking-[0.6px]">Sign In</a>
                </p>
            </form>
        </div>
    </section>

    <script src="js/reveal-password.js"></script>
    <script>
        document.getElementById('upload-file').addEventListener('click', function() {
            // Trigger the file input
            document.getElementById('file').click();
        });

        document.getElementById('file').addEventListener('change', function() {
            // Get the file name
            var fileName = this.files[0].name;

            // Update the file name text and show the file info
            document.getElementById('fileName').textContent = fileName;
            document.getElementById('file-info').classList.remove('hidden');
            document.getElementById('placeholder').classList.add('hidden');
            document.getElementById('chosse-file-dummy-btn').classList.add('hidden');
        });
    </script>
</body>

</html>