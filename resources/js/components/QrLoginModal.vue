<template>
    <div
        class="fixed top-0 left-0 w-screen h-screen z-10 flex justify-center items-center bg-black/25"
        @click.self="hideModal()"
    >
        <div class="min-w-xl max-w-2xl rounded-lg p-5 bg-white space-y-5">
            <h2 class="font-bold text-indigo-900 text-3xl text-center">
                {{ $t("scanToLogin") }}
            </h2>
            <div
                class="w-full flex flex-col justify-center items-center rounded-lg border-gray-300 p-5 border h-[300px]"
            >
                <Suspense :key="qrKey">
                    <template #default>
                        <AsyncQrCode :userId="userId" />
                    </template>
                    <template #fallback>
                        <div class="text-indigo-900">
                            {{ $t("pleaseWait") }}
                        </div>
                    </template>
                </Suspense>
            </div>
            <div class="flex justify-end gap-2">
                <button
                    class="btn-blue flex items-center gap-2"
                    @click="qrKey = Date.now()"
                >
                    <span>{{ $t("refresh") }}</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"
                        />
                    </svg>
                </button>
                <button class="btn-danger" @click="hideModal()">
                    {{ $t("cancel") }}
                </button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import AsyncQrCode from "./AsyncQrCode.vue";

defineProps<{ hideModal: CallableFunction; userId: any }>();

const qrKey = ref(Date.now());
</script>
