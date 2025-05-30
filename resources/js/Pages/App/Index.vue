<template>
    <div
        class="bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center min-h-screen p-4"
    >
        <div
            class="bg-white p-8 sm:p-10 md:p-12 rounded-3xl shadow-2xl w-full max-w-4xl flex flex-col md:flex-row justify-center items-center gap-8 md:gap-12 lg:gap-16"
        >
            <div
                class="flex-shrink-0 w-48 h-48 sm:w-56 sm:h-56 md:w-64 md:h-64 lg:w-72 lg:h-72 bg-gray-100 rounded-3xl shadow-xl flex items-center justify-center overflow-hidden"
            >
                <img
                    :src="AppIcon"
                    alt="Your App Icon"
                    class="w-full h-full object-cover rounded-3xl"
                    onerror="this.onerror=null;this.src='https://placehold.co/300x300/E0E0E0/666666?text=Image+Error';"
                />
            </div>

            <div class="flex-grow text-center md:text-left space-y-6">
                <h1
                    class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight"
                >
                    Get Our App!
                </h1>
                <p
                    class="text-lg sm:text-xl text-gray-700 max-w-prose mx-auto md:mx-0"
                >
                    Please log in to your account to access and begin the exam.
                </p>

                <div class="flex justify-center md:justify-start mt-8">
                    <a :href="route('app.download')" class="bg-gradient-to-br from-indigo-500 to-purple-600 text-white py-2 px-6 rounded-md "> Download App </a>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup lang="ts">
import AppIcon from '@images/quiz-app.png'
</script>