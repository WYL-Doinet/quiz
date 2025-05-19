<template>
    <div
        class="w-md absolute right-2.5 flex flex-col shadow-md
         top-1 h-[95%]  z-50 max-w-2xl rounded-2xl p-5 bg-white space-y-5"
    >
        <div class="flex justify-between">
            <h2 class=" text-3xl text-indigo-900 font-bold">Notifications</h2>
            <button class="btn-light" @click="hideModal()">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="size-5"
                >
                    <path
                        fill-rule="evenodd"
                        d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd"
                    />
                </svg>
            </button>
        </div>
        <div class="flex-1 space-y-4">
            <div class="p-4 rounded-lg border border-gray-300">
                <h3 class="text-md font-bold text-indigo-900">Title</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Dolorum blanditiis distinctio accusantium debitis odio nihil
               
                </p>
            </div>
            <div class="p-4 rounded-lg border border-gray-300">
                <h3 class="text-md font-bold text-indigo-900">Title</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Dolorum blanditiis distinctio accusantium debitis odio nihil
               
                </p>
            </div>
        </div>
        <div></div>
    </div>
</template>

<script setup lang="ts">
defineProps<{ hideModal: CallableFunction }>();
</script>
