<template>
    <div
        :class="[
            'fixed top-0 left-0 w-screen h-screen flex flex-col z-10 justify-center items-center bg-black/25',
            { 'pointer-events-none': form.processing },
        ]"
        @click.self="hideModal()"
    >
        <div class="min-w-xl max-w-2xl">
            <div class="rounded-lg p-5 bg-white space-y-4">
                <h2
                    class="font-bold text-indigo-900 text-3xl text-center italic"
                >
                    Assign User
                </h2>
                <transition name="fade">
                    <div
                        v-show="form.errors.message"
                        class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert"
                    >
                        <svg
                            class="shrink-0 inline w-4 h-4 me-3"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
                            />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Alert!</span>
                            {{ form.errors.message }}.
                        </div>
                    </div>
                </transition>
                <div class="relative">
                    <div
                        class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="size-4"
                        >
                            <path
                                d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z"
                            />
                        </svg>
                    </div>
                    <input
                        autocomplete="off"
                        :disabled="form.processing"
                        v-model="q"
                        @input="search"
                        type="text"
                        id="assign-user"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Name or email"
                    />
                </div>
                <ul
                    class="w-full rounded-lg space-y-2 border-gray-300 p-3 border h-[300px] overflow-y-scroll"
                >
                    <li
                        v-for="user in users"
                        :key="user.id"
                        @click="assign(user.id)"
                        class="hover:bg-gray-100 cursor-pointer text-sm  bg-gray-50 p-3 rounded-md"
                    >
                        {{ user.name }}
                    </li>
                </ul>
                <div class="flex justify-end gap-2">
                    <button
                        class="btn-danger"
                        @click="hideModal()"
                        :disabled="form.processing"
                    >
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { useDebounce } from "@hooks";
import { router, useForm, usePage } from "@inertiajs/vue3";

const page = usePage() as any;

const props = defineProps<{ hideModal: CallableFunction }>();

const debounce = useDebounce();

const q = ref("");
const users = ref<any>([]);

const form = useForm({
    _token: page.props["csrf_token"],
    user_id: 0,
    message: null,
});

const search = () => {
    if (!q.value) {
        users.value = [];
        return;
    }
    debounce(async () => {
        const res = await fetch(route("user.search") + "?q=" + q.value, {
            headers: {
                Accept: "application/json",
                "X-Requested-With": "XMLHttpRequest",
            },
        });

        if (res.ok) {
            users.value = await res.json();
        }
    }, 500);
};

function assign(id: number) {
    if (confirm("Do you want to assign quiz for this user?")) {
        form["user_id"] = id;
        form.post(route("quiz.assign.store", `${page.props.route.id}`), {
            onSuccess() {
                router.reload({
                    only: ["assigns"],
                });
                props.hideModal();
            },
            onError() {
            },
        });
    }
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
