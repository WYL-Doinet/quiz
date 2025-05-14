<template>
    <DashboardLayout>
        <div class="space-y-5">
            <transition name="fade">
                <div v-if="form.errors.message"
                    class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Alert!</span> {{ form.errors.message }}.
                    </div>
                </div>
            </transition>
            <div class="grid grid-cols-3 gap-3">
                <div class="relative">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-4">
                                <path
                                    d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                            </svg>
                        </div>
                        <input autocomplete="off" :disabled="form.processing" v-model="q" @input="search" type="text"
                            id="assign-user"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Assign to user">
                    </div>
                    <ul v-if="users.length"
                        class="border-gray-300 rounded-lg border mt-2 z-50 absolute w-full bg-white">
                        <li class="cursor-pointer p-3 border-b border-b-gray-300 text-gray-500" v-for="user in users"
                            :key="user.id" @click="assign(user.id)">
                            {{ user.name }}
                        </li>
                    </ul>
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>

                        <th>
                            Assign At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="assign in assigns" :key="assign.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ assign.user.name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ assign.user.email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ assign['assigned_at'] }}
                        </td>
                        
                        <td class="px-6 py-4 flex gap-2">
                              <span
                                class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Score
                                : {{ assign.score }}</span>
                            <span v-if="assign.completed_at"
                                class="bg-red-100 text-red-800 text-xs font-medium  px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                complete
                            </span>
                            <span v-else
                                class="bg-red-100 text-red-800 text-xs font-medium  px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Pending</span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </DashboardLayout>
</template>

<script setup lang="ts">
import DashboardLayout from '@components/layout/DashboardLayout.vue'
import { useDebounce } from '@hooks';
import { router, useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const debounce = useDebounce();
const q = ref('')
const users = ref<any>([])
const page = usePage() as any
const form = useForm({
    _token: page.props['csrf_token'],
    user_id: 0,
    message: null,
})

const props = defineProps({ assigns: Object })

const search = () => {
    if (!q.value) {
        users.value = [];
        return
    }
    debounce(async () => {
        const res = await fetch(route('user.search') + '?q=' + q.value, {
            headers: {
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })

        if (res.ok) {
            users.value = await res.json();
        }
    }, 500)
}


function assign(id: number) {
    if (confirm('Do you want to assign quiz for this user?')) {
        q.value = '';
        users.value = [];
        form['user_id'] = id
        form.post(route('quiz.assign.store', `${page.props.route.id}`), {
            onSuccess() {
                router.reload({
                    only: ['assigns']
                })
            },
            onError() {
                setTimeout(() => {
                    form.errors.message = undefined
                }, 3000)
            }
        })
    }
}

</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>