<template>
    <div
        class="fixed top-0 left-0 w-screen h-screen z-10 flex justify-center items-center bg-black/25"
        @click.self="hideModal()"
    >
        <div class="min-w-xl max-w-2xl rounded-lg p-5 bg-white space-y-5">
            <h2 class="font-bold text-indigo-900 text-3xl text-center">
                {{ $t('scanToLogin') }}
            </h2>
            <div
                class="w-full flex flex-col justify-center items-center rounded-lg border-gray-300 p-5 border h-[300px]"
            >
                <Suspense>
                    <template #default>
                        <AsyncQrCode :userId="userId" />
                    </template>
                    <template #fallback>
                        <div class="text-indigo-900">{{ $t('pleaseWait') }}</div>
                    </template>
                </Suspense>
            </div>
            <div class="flex justify-end gap-2">
                <button class="btn-danger" @click="hideModal()">{{ $t('cancel') }}</button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import AsyncQrCode from "./AsyncQrCode.vue";

defineProps<{ hideModal: CallableFunction; userId: any }>();
</script>
