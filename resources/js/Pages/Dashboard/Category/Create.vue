<template>
    <form class="w-lg space-y-5" @submit.prevent="submit">
        <div>
            <label
                for="name"
                :class="[
                    'block mb-2 text-sm font-medium  dark:text-white',
                    form.errors.name ? 'text-red-600' : 'text-gray-900',
                ]"
            >
                {{ $t("name") }}</label
            >
            <div class="relative">
                <div
                    class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none"
                >
                    <svg
                        :class="[
                            'w-4 h-4  dark:text-gray-400',
                            form.errors.name ? 'text-red-600' : 'text-gray-500',
                        ]"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-6"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </div>
                <input
                    type="text"
                    id="name"
                    v-model="form.name"
                    :class="[
                        'bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                        form.errors.name ? 'border-red-600' : 'border-gray-300',
                    ]"
                    placeholder="....."
                />
            </div>
            <p v-if="form.errors.name" class="p-1 text-red-600">
                {{ form.errors.name }}
            </p>
        </div>
        <div>
            <button class="btn-primary">
                <span v-if="form.processing"> {{ $t("submit") }} ☕ </span>
                <span v-else>
                    {{ $t("submit") }}
                </span>
            </button>
        </div>
    </form>
</template>

<script lang="ts" setup>
import { useForm } from "@inertiajs/vue3";
import { useI18n } from "vue-i18n";
import { useToast } from "vue-toastification";

const form = useForm({
    name: "",
});

const toast = useToast();
const { t } = useI18n();

const submit = () => {
    form.post(route("category.store"), {
        onSuccess: () => {
            toast.success(t("dataCreated"), { timeout: 2000 });
        },
    });
};
</script>
